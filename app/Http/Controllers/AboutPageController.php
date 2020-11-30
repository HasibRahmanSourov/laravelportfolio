<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\storage;
use App\About;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $abouts =About::all();
        return view('pages.about.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view('pages.about.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request,[
                'title'=> 'required|string',
                'sub_title'=> 'required|string',
                'description'=> 'required|string',
                'image'=> 'required|image',
            ]);
    
            $about =new About;
            $about->title =$request->title;
            $about->sub_title =$request->sub_title;
            $about->description =$request->description;
    
            $image =$request->file("image");
            storage::putFile('public/imag/',$image);
            $about->image = "storage/imag/".$image->hashName();
    
            
    
            $about->save();
             return redirect()->route('admin.abouts.create')->with('success','About Page Has Been Created Successfully');
        }
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
        $abouts = About::find($id);
        return view('pages.about.edit',compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required|string',
            'sub_title'=> 'required|string',
            'description'=> 'required|string',
        ]);

        $about =About::find($id);
        $about->title =$request->title;
        $about->sub_title =$request->sub_title;
        $about->description =$request->description;
        
        if($request->file("image")){
            $image =$request->file("image");
            storage::putFile('public/imag/',$image);
            $portfolio->image = "storage/imag/".$image->hashName();
        }
       
       

        $about->save();
         return redirect()->route('admin.abouts.list')->with('success','About Has Been Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts =About::find($id);
        @unlink(public_path($about->image));
        $abouts->delete();
        return redirect()->route('admin.abouts.list')->with('success','About Page Delete Successfully');
    }
}
