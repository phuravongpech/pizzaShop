@extends('layouts.userLayout')

@section('content')
<div class="container border border-1 p-5 mb-5 mt-5 me-10" style="border-radius: 20px" >
    <div class="row justify-content-center">
        <div class="col-md-14"  id="edit_new_address_form">
            <div class="theme-card w-100">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <label for="old_password" class="mb-2"> Old Password : </label>
                        <input type="password" class="form-control" style="border-radius: 10px"  id="old_password" name="old_password" placeholder="Current Password" value="">
                    </div>
                    <div class="col-md-12 mb-5">
                        <label for="new_password" class="mb-2" > New Password : </label>
                        <input type="password" class="form-control" style="border-radius: 10px" id="new_password" name="new_password" placeholder="New Password" value="">
                    </div>
                    <div class="col-md-12 mb-5">
                        <label for="confirm_password" class="mb-2"> Confirm Password : </label>
                        <input type="password" class="form-control" style="border-radius: 10px" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
                    </div>
                    <div class="col-md-12 mb-5 d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit" style="width: 30%; border-radius: 50px">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection