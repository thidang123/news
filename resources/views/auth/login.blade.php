@extends('master.master')
@section('title','User Login')
@push('csslogin')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css">

@endpush
@section('main')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        @endif
                        <form action="{{route('login')}}" method="post">
                            <div class="card-body p-5 text-center">
                                @csrf
                                <div class="f mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                    <div class="lex-container form-outline form-white mb-4">
                                        <h5 style="text-align: left ;color: #94456c ;font-size: 25px;"
                                            class="form-label" for="typeUsernameX">Username</h5>
                                        <input style="font-size: 18px;" type="text" id="typeUsernameX" name="user_name"
                                               class="form-control form-control-lg" placeholder="Insert username"/>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <h5 style="text-align: left ;color: #94456c; font-size: 25px" class="form-label"
                                            for="typePasswordX">Password</h5>
                                        <input style="font-size: 18px;" type="password" id="typePasswordX"
                                               name="password" class="form-control form-control-lg"
                                               placeholder="Insert password"/>
                                    </div>

                                    <p style="text-align: right;" class="small mb-5 pb-lg-2"><a class="text-white-50"
                                                                                                href="#!">Forgot
                                            password?</a></p>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>


                                </div>
                                <div>
                                    <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign
                                            Up</a>
                                    </p>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
