<?php

namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $services =Service::all();
        return view('pages.services.list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'icon'=> 'required|string',
            'title'=> 'required|string',
            'description'=> 'required|string',
        ]);

        $services =new Service;
        $services->icon =$request->icon;
        $services->title =$request->title;
        $services->description =$request->description;

        $services->save();
         return redirect()->route('admin.services.create')->with('success','Service Has Been Created Successfully');
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
        $services = Service::find($id);
        return view('pages.services.edit',compact('services'));
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
        $services =Service::find($id);
        $services->icon =$request->icon;
        $services->title =$request->title;
        $services->description =$request->description;
        $services->save();
        return redirect()->route('admin.services.list')->with('success','Service Uplodated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services =Service::find($id);
        $services->delete();
        return redirect()->route('admin.services.list')->with('success','Service Delete Successfully');
    }
}
