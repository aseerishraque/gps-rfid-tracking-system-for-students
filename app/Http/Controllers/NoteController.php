<?php

namespace App\Http\Controllers;


use App\Note;
use Illuminate\Http\Request;

class noteController extends Controller
{

    public function index($classroom_id)
    {
        $notes = Note::groupBy("note_img_id")
                    ->where("classroom_id", $classroom_id)->get();
        $docs = Note::where("classroom_id", $classroom_id)->get();
        foreach ($docs as $doc){
            $documents[$doc->note_img_id][] = $doc->document;
        }
//        dd($documents);
        return view("pages.notes", compact("notes", 'classroom_id', 'documents'));
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
        $obj = new Note();
        $obj->title = $request->title;
        $obj->classroom_id = $request->classroom_id;
        $obj->description = $request->description;

//        if (isset($request->document)){
//            $is_dir = realpath('announcements/');
//            if ($is_dir == false)
//                mkdir('announcements/');
//            $file_ext = $request->document->getClientOriginalExtension();
//            $id = notes::orderBy('id', 'desc')->first();
//            if (isset($id))
//                $id = $id->id + 1;
//            else
//                $id = 1;
//            $fileName = 'announcement_user_'.auth()->user()->id.'_no_'.$id.'.'.$file_ext;
//            $loc = 'announcements';
//            $obj->document = $loc.'/'.$fileName;
//            $request->document->move(public_path($loc), $fileName);
//        }

        if($obj->save()){
            return redirect()->back()->with([
                'success' => "New Note Published!"
            ]);
        }else
            return redirect()->back()->with([
                'error' => "note create error!"
            ]);
    }


    public function show($id)
    {
        //
    }


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
        $obj = new Note();
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
            $id = Note::orderBy('id', 'desc')->first();
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
                'success' => "New note Updated!"
            ]);
        }else
            return redirect()->back()->with([
                'error' => "note update error!"
            ]);
    }


    public function destroy($id)
    {
        $obj = Note::find($id);
        if($obj->delete()){
            if (file_exists($obj->document))
                unlink(public_path($obj->document));
            return redirect()->back()->with([
                'success' => "Note Deleted Successfully!"
            ]);
        }else
            return redirect()->back()->with([
                'error' => "Note delete error!"
            ]);

    }
}
