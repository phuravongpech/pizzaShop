@extends('layouts.userLayout')

@section('content')
<div class="container border border-1 p-5 mb-5 mt-5 me-10" style="border-radius: 20px">
    <h1> user id = {{$user->id}}</h1>
    <div class="row justify-content-center">
        <div class="col-md-14" id="edit_new_address_form">
            <div class="theme-card w-100">
                <div class="row">
                    <form action="{{ route('password.change', $user->id ) }}" method="POST">
                        @csrf

                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 

                        <div class="col-md-12 mb-5">
                            <label for="old_password" class="mb-2"> Old Password :</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" style="border-radius: 10px" id="old_password" name="old_password" placeholder="Current Password" required autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="new_password" class="mb-2"> New Password :</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" style="border-radius: 10px" id="new_password" name="new_password" placeholder="New Password" required autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="new_password_confirmation" class="mb-2"> Confirm Password :</label>
                            <input type="password" class="form-control" style="border-radius: 10px" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm Password" required autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-5 d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit" style="width: 30%; border-radius: 50px">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
