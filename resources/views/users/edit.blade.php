@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Page</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                        {{ Auth::user()->name }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <form method="POST" action="{{ route('users.update','$user->id') }}" class="mt-5">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                    <div class="col-md-6">

                        <select id="user_role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                            <option >--- Select ---</option>
                            @if($user->role == 1)
                                <option selected value="{{$user->role}}">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">Author</option>
                            @elseif($user->role == 2)
                                <option selected value="{{$user->role}}">Admin</option>
                                <option value="1">Super Admin</option>
                                <option value="3">Author</option>
                            @elseif($user->role == 3)
                                <option selected value="{{$user->role}}">Author</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                            @endif
                        </select>
                        
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection