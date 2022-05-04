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
    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}"
                           id="first_name" placeholder="First name">
                </div>
                <div class="form-group col-md-5">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}"
                           placeholder="Last name">
                </div>
            </div>
            @if($errors->has('first_name'))
                <span class="alert alert-danger">
                        {{$errors->first('first_name')}}
                    </span>
            @endif {!! "&nbsp;&nbsp;&nbsp;&nbsp;" !!}
            @if($errors->has('last_name'))
                <span class="alert alert-danger">
                        {{$errors->first('last_name')}}
                    </span>
            @endif
            <div class="form-group col-md-5">
                <label for="user_name">Username</label>
                <input type="text" class="form-control" value="{{old('user_name')}}" name="user_name" id="user_name"
                       placeholder="Username">
            </div>
            @if($errors->has('user_name'))
                <span class="alert alert-danger">
                        {{$errors->first('user_name')}}
                    </span>
            @endif
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password"
                       placeholder="Password">
            </div>
            @if($errors->has('password'))
                <span class="alert alert-danger">
                        {{$errors->first('password')}}
                    </span>
            @endif
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email"
                       placeholder="Email">
            </div>
            @if($errors->has('email'))
                <span class="alert alert-danger">
                        {{$errors->first('email')}}
                    </span>
            @endif
            <div class="image">
                <label>Add image</label>
                <input type="file" class="form-control" name="avatar">
            </div>
            <button style="float:right" class="btn btn-primary">Save changes</button>
            <input style="float:right" type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
        </div>
    </form>
    {{--               End Form                                                            --}}
@endsection

