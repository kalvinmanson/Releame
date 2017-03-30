<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Register</h4></div>
        <div class="panel-body">
            @include('partials.errors')
            <form method="POST" action="/{{ LaravelLocalization::getCurrentLocale() }}/auth/register">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection