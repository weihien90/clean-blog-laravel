@extends('layouts.plain')

@section('content')

<div class="container after-navbar">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-info">
            <div class="panel-heading">Login</div>

            <div class="panel-body">
                <form method="POST" action="/auth/login" class="form-horizontal">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                Login
                            </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
</div>

@endsection
