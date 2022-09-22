<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    // Validation Rules

    protected $validationRules = [
        // 'author' => 'required|min:5|max:150',
        'title' =>  'required|min:5|max:150',
        'post_img' => 'active_url',
        'post_content' => 'required|min:50|max:255',
        'post_date' => 'required||date'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('user_id', Auth::id())->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate($this->validationRules);


        $post = new Post();
        $post->user_id = $data['user_id'];
        $post->title = $data['title'];
        $post->post_img = $data['post_img'];
        $post->post_content = $data['post_content'];
        $post->post_date = $data['post_date'];

        $post->save();

        return redirect()->route('admin.posts.index')->with('created', $post->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrfail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $categories = Category::all();

        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
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
        $data = $request->all();

        // $validated = $request->validate($this->validationRules);
        $post = Post::findOrfail($id);

        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $post->post_img = $data['post_img'];
        $post->post_content = $data['post_content'];
        $post->post_date = $data['post_date'];

        $post->save();

        return redirect()->route('admin.posts.show', $post->id)->with('created', $post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete($id);

        return redirect()->route('admin.posts.index')->with('delete', $post->title);
    }
}
