<?php

namespace App\Http\Controllers;

use App\Models\cat;
use Illuminate\Http\Request;

class catController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = cat::paginate(5);
    
        return view('categories.index',compact('data'));
        //return view('categories.index');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        $cate = new cat([
            "title" => $request->get('name'),
            
        ]);
       
        $cate->save(); // Finally, save the record.
        
        //Post::create($request->all());
     
        return redirect()->route('categories.index')
                        ->with('success','categories created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
 
    public function show()
    {
       
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(cat $cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cat $cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy($delete)
    {   
        $data= cat::find($delete);
        $data->delete();
        return redirect()->route('categories.index')
                        ->with('success','categorie deleted successfully');
    }
}
