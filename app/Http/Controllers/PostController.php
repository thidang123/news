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
    $post = new Post();
    $post->post_title = $request->get('post_title');
    $post->post_author = $request->get('post_author');
    $post->post_desc = $request->get('post_desc');
    $post->save();
        //Kiểm tra xem file đã được upload chưa
        if(!$request->hasFile('image')) {
            //Nếu chưa có file upload thì báo lỗi
            return 'Hãy chọn file để upload';
        }
        else {
            //Xử lý file upload
            $image = $request->file('image');
            //Lưu trữ file tại public/images
            $imagePath = $image->move('images', $image->getClientOriginalName());
            return 'Lưu trữ file thành công';
        }
    }
}
