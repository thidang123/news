@extends('master.master')
@section('main')
    @section('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <h2>Post list</h2>
    <table class="table" border="1px" width="100%">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Post Describe</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->post_title}}</td>
                <td>{{$post->post_author}}</td>
                <td style="height: 100px">{{$post->post_desc}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <button href="route('user.create')" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#postModal">
        Add new post
    </button>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalTitle">Add new post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--               Begin Form                                             --}}
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="post_title">Title</label>
                                <input type="text" class="form-control" name="post_title" id="post_title"
                                       placeholder="Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="post_author">Author</label>
                                <input type="text" class="form-control" name="post_author" id="post_author"
                                       placeholder="Author name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="post_desc">Post Details</label>
                            <textarea class="textinput" id="post_desc" name="post_desc" rows="4" cols="50"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_image_path">Post Image</label>
                            <input type="file" multiple name="image_path[]">
                        </div>
                        <textarea name="content" class="form-control tinymce_editor_init"></textarea>
                        <button class="btn btn-primary">Save changes</button>
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                    </form>

                    {{--               End Form                                                            --}}
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection
