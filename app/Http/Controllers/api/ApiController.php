<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Enrollment;
use App\Models\RfidLog;
use App\Models\StudentRfidCardInfo;
use App\StudentGpsData;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getNewJoinCode()
    {
        while (true){
            $code = Factory::create();
            $code = $code->regexify('^[0-9A-Z]{6}$');
            $check = $this->checkUniqueCode($code);
            if ($check)
                return response()->json([
                    'join_code' => $code,
                    'success' => true
                ], 200);
        }
    }

    public function checkUniqueCode($code)
    {
        $a = Classroom::where('join_code', $code)->first();
        if (isset($a))
            return false;
        else
            return true;
    }

    public function studentLogin(Request $request){

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password]))
        {
            return response()->json([
                'user' => auth()->user(),
                'error' => false,
                'message' => 'Successfully logged in'
            ], 200);
        }else{
            return response()->json([
               'message' => 'Invalid Username/Password',
               'error' => false
            ], 400);
        }
    }

    public function storeGPS(Request $request, $student_id){
        $obj = new StudentGpsData();
        $obj = $obj->where("user_id", $student_id)->first();
        if(is_null($obj)){
            $obj = new StudentGpsData();
        }
        $obj->user_id = $student_id;
        $obj->lat = $request->lat;
        $obj->lng = $request->lng;
        if($obj->save()){
            return response()->json([
                'message' => "GPS Data stored successfully",
                'error' => false,
                'data' => $obj
            ], 200);
        }else{
            return response()->json([
                'message' => "GPS Data store Error",
                'error' => true
            ], 400);
        }
    }


    public function storeRfidLog($card_id){
        $student = StudentRfidCardInfo::where("card_id", $card_id)->first();
        if(!is_null($student)){
            $in_time_data = RfidLog::whereDate("created_at", Carbon::today())
                                    ->where("student_id", $student->student_id)
                                    ->first();
            if(!is_null($in_time_data)){
                $in_time_data->out_time = Carbon::now();
                $in_time_data->save();

                return response()->json([
                    "message" => $student->name." has exited!",
                    'error' => false,
                    "data" =>$in_time_data
                ], 200);
            }else{
                $obj = new RfidLog();
                $obj->student_id = $student->student_id;
                $obj->in_time = Carbon::now();
                $obj->save();
                return response()->json([
                    "message" => $student->name." has entered!",
                    'error' => false,
                    "data" =>$obj
                ], 200);
            }
        }else{
            return response()->json([
                "message" => "RFID not registered!",
                'error' => false
            ], 200);
        }
    }

    public function fetchGpsData(){
        $students = Enrollment::join("student_gps_data", "student_gps_data.user_id", "enrollments.student_id")
                                ->join("users", "users.id", "enrollments.student_id")
                                ->select("student_gps_data.*", "users.name as name")
                                ->get();
        $gpsData = array();
        $i=0;
        foreach($students as $student){
            $gpsData[$i]['id'] = $student->id;
            $gpsData[$i]['lat'] = $student->lat;
            $gpsData[$i]['lng'] = $student->lng;
            $gpsData[$i]['updated_at'] = $student->updated_at;
            $gpsData[$i]['created_at'] = $student->created_at;

            $gpsData[$i]['student_id'] = $student->user_id;
            $gpsData[$i]['location']['lat'] = floatval($student->lat);
            $gpsData[$i]['location']['lng'] = floatval($student->lng);
            $gpsData[$i]['ImageIcon'] = "https://img.icons8.com/fluency/48/000000/student-male.png";
            $gpsData[$i]['content'] = "<span>".$student->name."</span>";
            $gpsData[$i]['student_name'] = $student->name;
            $i++;
        }
        if(!is_null($students))
            return response()->json([
                'message' => "Student GPS Data retreived",
                "error" => false,
                "gps_data" => $gpsData
            ], 200);
        else
            return response()->json([
                'message' => "No Student Data Found!",
                "error" => true
            ], 400);
    }

}
