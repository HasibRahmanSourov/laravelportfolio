<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\storage;
use App\Portfolio;

class PortfolioPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $portfolios =Portfolio::all();
        return view('pages.portfolio.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        {
            return view('pages.portfolio.create');
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
        $this->validate($request,[
            'title'=> 'required|string',
            'sub_title'=> 'required|string',
            'big_image'=> 'required|image',
            'small_image'=> 'required|image',
            'description'=> 'required|string',
            'client'=> 'required|string',
            'category'=> 'required|string',
        ]);

        $portfolio =new Portfolio;
        $portfolio->title =$request->title;
        $portfolio->sub_title =$request->sub_title;
        $portfolio->description =$request->description;
        $portfolio->client =$request->client;
        $portfolio->category =$request->category;

        $big_file =$request->file("big_image");
        storage::putFile('public/imag/',$big_file);
        $portfolio->big_image = "storage/imag/".$big_file->hashName();

        $small_file =$request->file("small_image");
        storage::putFile('public/imag/',$small_file);
        $portfolio->small_image = "storage/imag/".$small_file->hashName();

        $portfolio->save();
         return redirect()->route('admin.portfolios.create')->with('success','Portfolio Has Been Created Successfully');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
