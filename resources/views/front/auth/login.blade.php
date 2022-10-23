<x-front-layout title="Login">
    <x-slot name="breadcrumb">
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
    </x-slot>
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <!-- Login Form s-->
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            @if ($errors->has(config('fortify.username')))
                            <div class="alert alert-danger">
                                {{ $errors->first(config('fortify.username')) }}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email</label>
                                    <input class="mb-0" type="text"  name= "{{ config('fortify.username') }}" placeholder="Email Address" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" name="remember" value="1" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"> Forgotten pasward?</a>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <button class="register-button mt-0" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
</x-front-layout>
