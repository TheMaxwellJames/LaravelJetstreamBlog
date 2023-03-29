<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderby('id', 'DESC')->where('post_type', 'post')->get();
        return view('dashboard', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::orderBy('id', 'ASC')->pluck('id');
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_image' => 'image|nullable|max:3048',
            "title" => 'required|unique:posts',
            "details" => "required",
        ],
            [
                'post_image.required' => 'Enter the post image',
                'title.required' => 'Enter title',
                'title.unique' => 'Title already exist',
                'details.required' => 'Enter details',
            ]
        );

         // Handle File Upload
         if($request->hasFile('post_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('post_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('post_image')->storeAs('public/post_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }
       
        $post = new  Post();
        $post->user_id = Auth::id();
        $post->post_image = $fileNameToStore;
        $post->title = $request->title;
        $post->details = $request->details;
        $post->is_published = $request->is_published;
        $post->post_type = 'post';
        $post->save();

        Session::flash('message', 'Post created successfully');
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $posts = Post::orderBy('id', 'ASC')->pluck('id');
        return view('posts.edit', compact('posts', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'post_image' => 'image|nullable|max:1999',
            'title' => 'required|unique:posts,title,' . $post->id . ',id', // ignore this id
            "details" => "required",
        ],
            [
                'post_image.required' => 'Enter the post image',
                'title.required' => 'Enter the title',
                'title.unique' => 'Title already exist',
                'details.required' => 'Enter details',
            ]
        );

        // Handle File Upload
        if($request->hasFile('post_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('post_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('post_image')->storeAs('public/post_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post->user_id = Auth::id();
        $post->post_image = $fileNameToStore;
        $post->title = $request->title;
        $post->details = $request->details;
        $post->is_published = $request->is_published;
        $post->save();
        
        Session::flash('message', 'Post updated successfully');
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('delete-message', 'Post deleted successfully');
        return redirect()->route('dashboard');
    }
}
