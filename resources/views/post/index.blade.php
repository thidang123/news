@extends('master.master')
@push('csspost')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endpush
@section('main')
    <h2>Post list</h2>
    <table class="table" id="table-post">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Post Describe</th>
            <th scope="col">Post Images</th>
            <th scope="col">Edit</th>
            <th scope="col">Del</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $apost)
            <tr>
                <th scope="row">{{$apost->id}}</th>
                <td>{{$apost->post_title}}</td>
                <td>{{$apost->post_author}}</td>
                <td style="height: 100px">{{$apost->post_desc}}</td>
                <td><img width="100px" height="100 px" src="img/posts/{{$apost->post_image_path}}" alt=""></td>
                <td>
                    <a class="btn btn-outline-primary" href="{{route('post.edit',$apost)}}">
                        Edit
                    </a>
                </td>
                <td><a class="btn btn-danger" href="{{route('post.destroy',$apost)}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <button href="route('user.create')" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#postModal">
        Add
    </button>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalTitle">Add a new post</h5>
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
                            <input type="file" name="post_image_path">
                        </div>
                        <label>
                            <textarea name="content" class="form-control tinymce_editor_init"></textarea>
                        </label>
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
@push('jspost')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.11.5/dataRender/ellipsis.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $('#table-post').DataTable({
            columnDefs: [ {
                targets: 3,
                render: function ( data, type, row ) {
                    return data.substr( 0, 10 );
                }
            } ]
        } );
    </script>

@endpush
@endsection



