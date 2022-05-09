<?php

namespace App\Http\Controllers;
//section controller
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('post_image_path')) {
            $file = $request->post_image_path;
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $fileExtension;
            $file->move('img/posts', $fileName);
        }
        $post = new Post();
        $post->post_title = $request->get('post_title');
        $post->post_author = $request->get('post_author');
        $post->post_desc = $request->get('post_desc');
        $post->post_image_path = $fileName;
        $post->save();
        return redirect('posts');

    }
    public function destroy($id){
        $post = Post::destroy($id);
        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'each' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->hasFile('post_image_path')) {
            $file = $request->file('post_image_path');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $fileExtension;
            $file->move('img/posts', $fileName);
        }

        $data = [
            'post_title' => isset($request->post_title) ? $request->post_title : $post->post_title,
            'post_author' => isset($request->post_author) ? $request->post_author : $post->post_author,
            'post_desc' => isset($request->post_desc) ? $request->post_desc : $post->post_desc,
            'post_image_path' => isset($request->post_image_path) ? $fileName : $post->post_image_path,
        ];
        $post->update($data);
        return redirect()->route('post.index');
    }
}
