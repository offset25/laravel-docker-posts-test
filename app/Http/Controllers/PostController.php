<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sorting = '';
        $direction = 'ASC';
        $filter = '';
        if(isset($request->q)) {
            $filter = $request->q;
        }
        if(isset($request->sorting)) {
            $sorting = $request->sorting;
            if(isset($request->direction)) {
                $direction = $request->direction;    
            }
            if($sorting == "1") {
                if($filter !='') {
                    $posts = Post::where('content','REGEXP','^q+$')->orderByRaw('LENGTH(title) '.$direction)->paginate(10);         
                } else {
                    $posts = Post::orderByRaw('LENGTH(title) '.$direction)->paginate(10);         
                }
            }       
        } else {    
            if($filter !='') {
                $posts = Post::where('content','REGEXP','^q+$')->sortable()->paginate(10);
            } else {
                $posts = Post::sortable()->paginate(10);         
            }
            
        } 
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required|min:3',
            'title' => 'required',
            'content' => 'required',
        ]);   
        $post = Post::create(['name' => $request->name,'title' => $request->title,'content' => $request->content]);
        $request->session()->flash('message', 'Post added successfully');
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $post = Post::find($id)->toArray();
        return view('posts.edit',compact('post',$post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'title' => 'required',
            'content' => 'required',
        ]);   
        $post = Post::where("id",$id)->update(['name' => $request->name,'title' => $request->title,'content' => $request->content]);
        $request->session()->flash('message', 'Post updated successfully');
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //Post::where("id",$id)->delete();
        $model = Post::find( $id );
        $model->delete();
        $request->session()->flash('message', 'Successfully deleted the post!');
        return redirect('/post');
    }
}
