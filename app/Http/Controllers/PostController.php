<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use App\Models\Category;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $post = Post::orderby('id','desc')->paginate(100);
        Paginator::useBootstrap();
        // dd($post);
        return view('backend.pages.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.post.create');
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
            'post_author' => 'nullable|exists:users,id',
        ]);
        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_export = $request->post_export;
        $post->post_tags = $request->post_tags;
        $post->post_keywords = $request->post_keywords;
        $post->post_author = $request->post_author;
        $post->post_tags = $request->post_tags;
        $post->post_status = $request->post_status;

        $img_name = '';
        $img_path = '';
        if($request->file('post_images')){
            $img_file = $request->file('post_images');
            $img_name = 'post_images'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/post/';
            $success = $img_file->move($img_path,$img_name);

        }
        $post->post_image = $img_path.$img_name;
        if($request->post_slug){
            $post->post_slug = Str::random(2).'-'.now()->format('Y-m-d-his');
        }else{
            $post->post_slug = Str::random(6).'-'. now()->format('Y-m-d-his');
        }

        if($request->is_main){
            $post->is_main = 1;
        }
        $post->save();
        return redirect()->route('admin.post.index')->with('status','post Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function deletepost($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        $post->delete();
        return back()->with('status', 'post has been successfully delete!');
    }

    public function showpost($id)
    {
        $data = Post::find($id);
        return view('backend.pages.post.edit', ['data' => $data])->with('edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_author' => 'nullable|exists:users,id',
        ]);
        $post = Post::find($id);
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_export = $request->post_export;
        $post->post_tags = $request->post_tags;
        $post->post_keywords = $request->post_keywords;
        $post->post_author = $request->post_author;
        $post->post_tags = $request->post_tags;
        $post->post_status = $request->post_status;

        $img_name = '';
        $img_path = '';
        if($request->file('post_images')){
            $img_file = $request->file('post_images');
            $img_name = 'post_images'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/post/';
            $success = $img_file->move($img_path,$img_name);
            $post->post_image = $img_path.$img_name;

        }
        if($request->post_slug){
            $post->post_slug = Str::random(2).'-'.now()->format('Y-m-d-his');
        }else{
            $post->post_slug = Str::random(6).'-'. now()->format('Y-m-d-his');
        }

        if($request->is_main){
            $post->is_main = 1;
        }
        $post->save();
        return redirect()->route('admin.post.index')->with('status','post Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function poststatus($id){
        $post = Post::findorfail($id);
        if($post != null){
            if($post->post_status == 'active'){
                $post->post_status = 'inactive';
            }else{
                $post->post_status = 'active';
            }
            $post->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry post Didnot Found.');
        }
    }



    // update featured
    public function is_featured($id){
        $post = Post::findorfail($id);
        if($post != null){
            if($post->is_featured == 1){
                $post->is_featured = 0;
            }else{
                $post->is_featured = 1;
                $post->is_main = 1;
            }
            $post->save();
            return back()->with('success','Featured Updated Succesfully !');
        }else{
            return back()->with('error','Sorry post Didnot Found.');
        }
    }
}
