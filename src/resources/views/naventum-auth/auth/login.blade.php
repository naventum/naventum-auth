@extends('naventum-auth.layouts.base')

@section('title', 'Login')

@section('content')
<form action="" method="POST" class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="text-center mb-4">
                <h2>{{ config('app')->name }}</h2>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ __('Login') }}
                </div>
                <div class="card-body">
                    @if (session()->getFlashData('errors', null))
                        <div class="mb-2">
                            @foreach (session()->getFlashData('errors', []) as $error)
                            <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <div class="mb-2 text-end">
                        <a href="/auth/register">{{ __('Create a new account') }}</a>
                    </div>
                    <button class="btn btn-primary text-light">{{ __('Login') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection