<base href="../../">
@extends('master.master')
@section('main')
    <div class="display-4">Edit an User</div>

    {{--               Begin Form                                             --}}
    <div>
        <form action="{{route('user.update',$each)}}" method="post">
            @csrf
            @method('put')
            <div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                               value="{{$each->first_name}}">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                               value="{{$each->last_name}}">
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="user_name">Username</label>
                    <input type="text" class="form-control" name="user_name" id="user_name"
                           value="{{$each->user_name}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input value="{{$each->email}}" type="email" class="form-control" name="email" id="email"
                           placeholder="Email">
                </div>
                <button style="float:right" class="btn btn-primary">Update</button>
                <input style="float:right" type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
            </div>
        </form>
    </div>
    {{--               End Form                                                            --}}
@endsection
