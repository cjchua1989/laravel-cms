@extends('layout.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <form class="user" method="post" action="/">
                                @csrf
                                <div class="form-group">
                                    <input 
                                        name="email" 
                                        type="email" 
                                        class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                                        placeholder="Email"
                                        value="{{ old('email', 'admin@example.com') }}"
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input 
                                        name="password" 
                                        type="password" 
                                        class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : '' }}" 
                                        placeholder="Password"
                                        value="password"
                                    >
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection