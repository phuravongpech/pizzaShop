@extends('layouts.userLayout')

@section('content')
    <!-- Profile picture card-->
    <div class="row">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <div class="container my-5 ">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid avatar-lg rounded-circle" style="width: 80% " alt="">
                                    </div>
                                </div><!-- end col -->
                                <div class="col-md-9">
                                    <div class="ms-3">
                                        <div>
                                            <h4 class="card-title my-10">Profile</h4>
                                            <h2 class="text-primary font-size-20 mt-3 mb-2"> {{$user->name}}</h2>

                                        </div>
                                        <div class="row my-4">
                                            <div class="col-md-12">
                                                <div>
                                                    <p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i>
                                                        {{$user->email}}
                                                    </p>
                                                    <p class="text-muted fw-medium mb-0"><i class="mdi mdi-phone-in-talk-outline me-2"></i>
                                                        {{$user->phone_num}}
                                                    </p>
                                                    <p class="text-muted fw-medium my-2">
                                                        {{$user->description}}
                                                    </p>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div> 
        </div>   
    </div>
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', $user->id) }}">

                        @csrf
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Username (how your name will appear to other users on the site)</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your username" value="{{$user->name}}"> 
                        </div>
                        <!-- Form Row-->

                        <div class="col-md-6">
                            <label class="small mb-1" for="phone_num">Phone number</label>
                            <input class="form-control" id="phone_num" name="phone_num" type="tel" placeholder="Enter your phone number" value="{{$user->phone_num}}"> 
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3 mt-2">
                            <label class="small mb-1" for="email">Email Address</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email" value="{{$user->email}}" readonly>
                        </div>
                        <div class="mb-3 mt-2">
                            <label class="small mb-1" for="description">About me</label>
                            <textarea class="form-control" id="description" name="description" rows="8" placeholder="Description" value="{{$user->description}}"> </textarea>
                        </div>
                        
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection