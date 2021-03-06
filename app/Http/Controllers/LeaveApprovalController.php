<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\LeaveApproval;
use Illuminate\Http\Request;

class LeaveApprovalController extends Controller
{

    public function create($classroom_id)
    {
        $classroom_name = Classroom::where('id', $classroom_id)->first()->name;
        return view('pages.leave.create', compact('classroom_id', 'classroom_name'));
    }

    public function studentLeaves($classroom_id)
    {
        $classrooms = Classroom::join("enrollments", "enrollments.classroom_id", "classrooms.id")
                                ->where('enrollments.student_id', auth()->user()->id)
                                ->select("classrooms.*")
                                ->get();
        $requests = LeaveApproval::join('classrooms', 'classrooms.id', 'leave_approvals.classroom_id')
                                ->join('users', 'users.id', 'leave_approvals.user_id')
                                 ->where('leave_approvals.user_id', auth()->user()->id)
                                ->where('leave_approvals.classroom_id', $classroom_id)
                                ->select('leave_approvals.*', 'users.id as student_id', 'users.name as student_name', 'classrooms.name as classroom_name')
                                ->get();
//         dd($requests);
        return view('pages.leave.student-leaves', compact('requests', 'classrooms'));
    }

    public function applyLeave(Request $request, $classroom_id)
    {
        $request->validate([
           'subject' => 'required|max:100',
           'description' => 'required|max:250',
           'start_date' => 'required',
           'end_date' => 'required',
        ]);
        $obj = new LeaveApproval();
        $obj->user_id = auth()->user()->id;
        $obj->classroom_id = $classroom_id;
        $obj->subject = $request->subject;
        $obj->description = $request->description;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        if (isset($request->document)){
            $is_dir = realpath('leave_applications/');
            if ($is_dir == false)
                mkdir('leave_applications/');
            $file_ext = $request->document->getClientOriginalExtension();
            $id = LeaveApproval::orderBy('id', 'desc')->first();
            if (isset($id))
                $id = $id->id + 1;
            else
                $id = 1;
            $fileName = 'user_'.auth()->user()->id.'_no_'.$id.'.'.$file_ext;
            $loc = 'leave_applications';
            $obj->document = $loc.'/'.$fileName;
            $request->document->move(public_path($loc), $fileName);
        }
        if ($obj->save())
            return back()->with([
               'success' => 'Leave Applied Successfully!'
            ]);
        else
            return back()->with([
                'error' => 'Something went wrong!'
            ]);
    }
}
