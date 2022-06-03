<?php

namespace App\Http\Controllers;
use App\Models\cat;
use App\Models\Post;
use App\Models\images;
use Illuminate\Http\Request;
use Illuminate\Support\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::paginate(5);
    
        return view('posts.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data2 = cat::paginate(5);
        return view('posts.create',compact('data2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //$request->file->store('product', 'public');
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
        ]);

        $product = new Post([
            "title" => $request->get('title'),
            "description" => $request->get('description'),
           "idimg" => $request->image->hashName(),
            "idCat"=>$request->get('category'),
        ]);
        
        $request->image->store('product', 'public');
        $product->save(); // Finally, save the record.
        
        $imaggge = new images([
            "path" => $request->image->path(),
            "size" => $request->image->getSize(),
           "name" => $request->image->hashName(),
        ]);
        
        //$request->image->store('product', 'public');
        $product->save(); // Finally, save the record.
        $imaggge->save();
        //Post::create($request->all());
     
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
