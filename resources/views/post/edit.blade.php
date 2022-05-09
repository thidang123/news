<base href="../../">
@extends('master.master')
@section('main')
    <div class="display-4">Edit a post</div>

    {{--               Begin Form                                             --}}
    <div>
        <form action="{{route('post.update',$each)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-group col-md-6">
                    <label for="post_title">Title</label>
                    <input type="text" class="form-control" name="post_title" id="post_title"
                           placeholder="Title"
                           value="{{$each->post_title}}">
                </div>
                <br/>
                <div class="form-group col-md-6">
                    <label for="post_author">Author</label>
                    <input type="text" class="form-control" name="post_author" id="post_author"
                           placeholder="Author name"
                           value="{{$each->post_author}}">
                </div>
            </div>
            <div class="form-group">
                <label for="post_desc">Post Details</label><br>
                <textarea class="textinput" id="post_desc" name="post_desc" rows="4" cols="50">
                    {{$each->post_desc}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="post_image_path">Post Image</label>
                <input type="file" name="post_image_path">
            </div>
            <button class="btn btn-primary">Save changes</button>
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
        </form>
    </div>
    {{--               End Form                                                            --}}
@endsection


