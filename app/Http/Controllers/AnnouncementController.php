<?php

namespace App\Http\Controllers;

use App\Announcements;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function index($classroom_id)
    {
        $announcements = Announcements::where("classroom_id", $classroom_id)->get();
        return view("pages.announcements", compact("announcements", 'classroom_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request, $classroom_id)
    {
        $request->validate([
           'title' => "required",
           'description' => "required"
        ]);
        $obj = new Announcements();
        $obj->title = $request->title;
        $obj->classroom_id = $request->classroom_id;
        $obj->description = $request->description;

        if (isset($request->document)){
            $is_dir = realpath('announcements/');
            if ($is_dir == false)
                mkdir('announcements/');
            $file_ext = $request->document->getClientOriginalExtension();
            $id = Announcements::orderBy('id', 'desc')->first();
            if (isset($id))
                $id = $id->id + 1;
            else
                $id = 1;
            $fileName = 'announcement_user_'.auth()->user()->id.'_no_'.$id.'.'.$file_ext;
            $loc = 'announcements';
            $obj->document = $loc.'/'.$fileName;
            $request->document->move(public_path($loc), $fileName);
        }

        if($obj->save()){
            return redirect()->back()->with([
                'success' => "New Announcement Published!"
            ]);
        }else
            return redirect()->back()->with([
                'error' => "Announcement create error!"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => "required",
            'description' => "required"
        ]);
        $obj = new Announcements();
        $obj = $obj->find($id);
        $obj->title = $request->title;
        $obj->description = $request->description;

        if (isset($request->document)){
            if (file_exists($obj->document))
                unlink(public_path($obj->document));

            $is_dir = realpath('announcements/');
            if ($is_dir == false)
                mkdir('announcements/');
            $file_ext = $request->document->getClientOriginalExtension();
            $id = Announcements::orderBy('id', 'desc')->first();
            if (isset($id))
                $id = $id->id + 1;
            else
                $id = 1;
            $fileName = 'announcement_user_'.auth()->user()->id.'_no_'.$id.'.'.$file_ext;
            $loc = 'announcements';
            $obj->document = $loc.'/'.$fileName;
            $request->document->move(public_path($loc), $fileName);
        }

        if($obj->save()){
            return redirect()->back()->with([
                'success' => "New Announcement Updated!"
            ]);
        }else
            return redirect()->back()->with([
                'error' => "Announcement update error!"
            ]);
    }


    public function destroy($id)
    {
        $obj = Announcements::find($id);
        if($obj->delete()){
            if (file_exists($obj->document))
                unlink(public_path($obj->document));
            return redirect()->back()->with([
               'success' => "Announcement Deleted Successfully!"
            ]);
        }else
            return redirect()->back()->with([
                'error' => "Announcement delete error!"
            ]);

    }
}
