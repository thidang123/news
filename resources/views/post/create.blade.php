<base href="../../">
@extends('master.master')
@section('main')

    <h6 class="display-5">Add an User</h6>
    {{--    Bao loi tong--}}
    {{--
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}
    {{--               Begin Form                                             --}}
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Post Title</label>
                    <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Post Title">
                </div>
                <div class="form-group col-md-5">
                    <label>Author</label>
                    <input type="text" class="form-control" name="post_author" id="post_author" placeholder="Author">
                </div>
            </div>

            <button style="float:right" class="btn btn-primary">Save changes</button>
            <input style="float:right" type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
        </div>
    </form>
    {{--               End Form                                                            --}}
@endsection
