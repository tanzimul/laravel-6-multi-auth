@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Index Page</div>
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
            <div class="table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sl No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Created At {{ $user->created_at }} <br/> Updated At {{ $user->updated_at }}</td>
                            <td>
                                @if($user->role == 1)
                                    Super Admin
                                @elseif($user->role == 2)
                                    Admin
                                @elseif($user->role == 3)
                                    Author
                                @else
                                    User
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-small btn-info" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $user->id }}">
                                    Edit
                                </button> -->

                                <!-- Modal -->
                                <!-- <div class="modal fade" id="exampleModalCenter{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('users.update',$user->id) }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
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
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection