@extends('layouts.auth') @section('content')
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="auth-form">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('login.submit') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                        placeholder="Username" required="required" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"
                                        value="{{ old('password') }}" placeholder="Password" required="required">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-submit">Sign In</button>
                                <div class="auth-options mt-2 text-center">
                                    <div class="custom-control custom-checkbox form-group">
                                        <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</ @stop
