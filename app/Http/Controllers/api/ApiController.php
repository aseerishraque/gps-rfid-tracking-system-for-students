<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
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

}
