<?php

namespace App\Http\Controllers;
//section controller
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('post.index', [
                'posts'=> $posts,
            ]);
    }
    public function create(){
        return view('post.create');
    }
    public function store(Request $request)
    {
        if($request->hasFile('post_image_path')) {
         $file = $request->post_image_path;
         $fileExtension = $file->getClientOriginalExtension();
         $fileName=time().".".$fileExtension;
         $file->move('img/posts',$fileName);
        }
    $post = new Post();
    $post->post_title = $request->get('post_title');
    $post->post_author = $request->get('post_author');
    $post->post_desc = $request->get('post_desc');
    $post->post_image_path=$fileName;
    $post->save();
return redirect('posts');
        //Kiểm tra xem file đã được upload chưa

    }
}
