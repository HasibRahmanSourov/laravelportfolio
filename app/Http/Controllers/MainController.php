<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $main=Main::first();   //'title', 'sub_title', 'bg_img', 'cv'  
      return view('pages.main', compact('main'));
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|string',
            'sub_title'=> 'required|string',
        ]);

        $main =Main::first();
        $main->title =$request->title;
        $main->sub_title =$request->sub_title;

        if($request->file('bg_img')){
            $img_file = $request->file('bg_img');
            $img_file->storeAs('public/image/','bg_img.' . $img_file->getClientOriginalExtension());
            $main->bg_img = 'storage/image/bg_img.' .$img_file->getClientOriginalExtension();
        }

        if($request->file('cv')){
            $pdf_file = $request->file('cv');
            $pdf_file->storeAs('public/pdf/','cv.' . $pdf_file->getClientOriginalExtension());
            $main->cv = 'storage/pdf/cv.' .$pdf_file->getClientOriginalExtension();
        }
        $main->save();
         return redirect()->route('main')->with('success','Main Page Data Has Been Updated Successfully');
    }

}
