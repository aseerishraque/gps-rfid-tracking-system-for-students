<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\LeaveApproval;
use App\User;
use Faker\Factory;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();

        return view('pages.classrooms.index', compact('classrooms'));
    }

    public function rfidLogs()
    {
        return view('pages.rfid-logs');
    }

    public function requests()
    {
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();
        $requests = LeaveApproval::join('classrooms', 'classrooms.id', 'leave_approvals.classroom_id')
                                ->join('users', 'users.id', 'leave_approvals.user_id')
                                ->where('classrooms.user_id', auth()->user()->id)
                                ->where('leave_approvals.is_approve', 0)
                                ->select('leave_approvals.*', 'users.id as student_id', 'users.name as student_name', 'classrooms.name as classroom_name')
                                ->get();
        return view('pages.requests', compact('requests', 'classrooms'));
    }

    public function approveRequest(Request $request, $req_id)
    {
        $obj = LeaveApproval::find($req_id);
        $obj->is_approve = 1;
        $obj->save();

        $period = new \DatePeriod(
            new \DateTime($obj->start_date),
            new \DateInterval('P1D'),
            new \DateTime($obj->end_date)
        );

        foreach ($period as $key => $value) {
            $check = Attendance::where('student_id', $obj->user_id)
                ->where('date', $value->format('Y-m-d'))
                ->first();
            $obj2 = new Attendance();
            if (isset($check))
                $obj2 = $check; //Create or Update
            $obj2->classroom_id = $obj->classroom_id;
            $obj2->student_id = $obj->user_id;
            $obj2->date = $value->format('Y-m-d');
            $obj2->is_present = 1;
            $obj2->save();
        }
        return back()->with([
           'success' => 'Leave Application Approved!'
        ]);

    }

    public function declineRequest(Request $request, $req_id)
    {
        $obj = LeaveApproval::find($req_id);
        if (file_exists($obj->document))
            unlink(public_path($obj->document));
        if ($obj->delete())
            return back()->with([
               'success' => 'Approval Declined!'
            ]);
        else
            return back()->with([
               'error' => 'Something went wrong!'
            ]);
    }
    public function approves()
    {
        return view('pages.approves');
    }

    public function createClassroom()
    {
        while (true){
            $faker = Factory::create();
            $join_code = $faker->regexify('^[0-9,A-Z]{6}$');
            $check = Classroom::where('join_code', $join_code)->first();
            if (!isset($check))
                return view('pages.classrooms.create', compact('join_code'));
        }

    }
    public function editClassroom($id)
    {
        $classroom = Classroom::find($id);
        return view('pages.classrooms.edit', compact('classroom'));

    }

    public function storeClassroom(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'section' => 'required|max:10',
            'send_msg_guardian' => 'required',
            'join_code' => 'required|max:6|unique:classrooms,join_code'
        ]);
        $obj = new Classroom();
        $obj->user_id = auth()->user()->id;
        $obj->user_id = 1;
        $obj->name = $request->name;
        $obj->section = $request->section;
        if (isset($request->working_days))
            $obj->working_days = $request->working_days;
        if (isset($request->marks))
            $obj->marks = $request->marks;
        $obj->send_msg_guardian = $request->send_msg_guardian;
        $obj->join_code = $request->join_code;
        if ($obj->save())
            return back()->with([
                'success' => 'Classroom Created !'
            ]);
        else
            return back()->with([
                'error' => 'Classroom Create Error!'
            ]);

    }

    public function updateClassroom(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'section' => 'required|max:10',
            'send_msg_guardian' => 'required',
            'join_code' => 'required|max:6|unique:classrooms,join_code,'.$id
        ]);
        $obj = new Classroom();
        $obj = $obj->find($id);
        $obj->user_id = auth()->user()->id;
        $obj->name = $request->name;
        $obj->section = $request->section;
        if (isset($request->working_days))
            $obj->working_days = $request->working_days;
        if (isset($request->marks))
            $obj->marks = $request->marks;
        $obj->send_msg_guardian = $request->send_msg_guardian;
        $obj->join_code = $request->join_code;
        if ($obj->save())
            return back()->with([
                'success' => 'Classroom Updated !'
            ]);
        else
            return back()->with([
                'error' => 'Classroom Update Error!'
            ]);
    }

    public function destroyClassroom($id)
    {
        $obj = new Classroom();
        $obj = $obj->find($id);
        if ($obj->delete())
            return back()->with([
               'success' => 'Classroom Deleted !'
            ]);
        else
            return back()->with([
               'error' => 'Classroom Delete Error!'
            ]);
    }

    public function guardianList()
    {
        return view('pages.guardian-list');
    }

    public function studentList()
    {
        return view('pages.student-list');
    }

    public function takeAttendance($classroom_id)
    {
        $students = User::role('student')->join('enrollments', 'enrollments.student_id', 'users.id')
                    ->where('enrollments.classroom_id', $classroom_id)
                    ->get();
        return view('pages.take-attendance', compact('students', 'classroom_id'));
    }
}
