@extends('layouts.userLayout')

@section('content')
<h1>
</h1>    
    <style>  
            
            .order-address .outer-box.border-dashed {
                border-style: dashed;
                border-width: 2px;
                height: 100%
            }

            .outer-box {
                border: 1px solid #ddd;
                border-radius: 4px;
                flex-direction: column;
                padding: 15px;
                background-color: #fff;
            }

            .address-type h6 {
                font-size: 20px;
                font-weight: 600;
                color: #333;
            }

            .address-btn a, .form-btn {
                border-radius: 30px;
            }

            .d-flex  {
                box-shadow: 0 4px 14px 0 rgb(0 0 0 / 9%);
                border-radius: 30px;
                border: 1px solid#ccc;  
            }

            #removeAddressConfirmation .modal-dialog {
                max-width: 500px;
            }
            
            .modal-content{
                border-radius: 10px
            }

    </style>

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <div class="dashboard">
        <div class="page-title">
            <h2>Address Book</h2>
        </div>
        <div class="box-account box-info order-address mb-5">
            <div class="row">
                <div class="col-xl-4 col-md-6 text-center mt-2 mb-3">
                    <a class="outer-box border-dashed d-flex align-items-center justify-content-center open-modal" href="" data-bs-toggle="modal" data-bs-target="#add_address">
                        <i class="fa fa-plus-circle d-block mr-1" aria-hidden="true"></i>
                        <h6 class="m-0">
                            Add New Address
                        </h6>
                    </a>
                </div>
                {{-- for each here --}}
                @foreach ($addresses as $address)
                <div class="col-xl-4 col-md-6 mt-2 mb-3 box-shadow">
                    <div class="outer-box px-0" style="border-radius: 25px">
                        <div class="address-type w-100">
                            <div class="default_address border-bottom mb-1 ps-3">
                                <h6 class="mt-0 mb-2"><i class="fa fa-home mr-1" aria-hidden="true"></i> {{$address->address_type}}</h6>
                            </div>
                            <div class="px-2">
                                <p class="mb-1 ps-2">{{$address->address_detail}}</p>
                                <p class="mb-1 ps-2">Address No. {{$address->address_no}}</p>
                                <p class="mb-1 ps-2">Street : {{$address->street}}</p>
                                <p class="mb-1 ps-2">City : {{$address->city}}</p>
                                <p class="mb-1 ps-2">Extra Instructions : {{$address->extra_instructions}}</p>
                            </div>
                        </div>
                        <div class="address-btn align-items-end justify-content-end w-100 mt-sm-4 px-2">
                            <a class="btn btn-solid open-modal bg-primary text-dark mx-1" href="{{ route('address.edit', $address->id) }}" 
                                data-bs-toggle="" data-bs-target="" data-address_id="{{ $address->id }}">Edit</a>
                            <a class="btn btn-solid delete_address_btn bg-primary text-dark mx-1" href=" {{ route('address.delete' , $address->id) }} " data-bs-toggle="" 
                            data-bs-target="#" data-address_id="{{ $address->id }}">Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- end foreach --}}
            </div>
        </div>
    </div>
</div>

        
        

        
<!-- Modal for add -->
<form method="POST" action="{{ route('address.store') }}">
    @csrf
    <div id="add_address" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="outer-box border-0 p-0">
                        <div class="row">
                            <div class="col-md-12" id="add_new_address_form">
                                <div class="theme-card w-100">
                                    <div class="form-row no-gutters">
                                        <div class="col-12">
                                            <label for="type">Address Type</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="delivery_box pt-0 pl-0 pb-2">
                                                <label class="radio m-0 mx-4">Home
                                                    <input type="radio" name="address_type" id="home" name="home" checked value="Home">
                                                    <span class="checkround"></span>
                                                </label>
                                                <label class="radio m-0 mx-4" >Work
                                                    <input type="radio" name="address_type" id="work" name="work" value="Work">
                                                    <span class="checkround"></span>
                                                </label>
                                                <label class="radio m-0 mx-4">Others
                                                    <input type="radio" name="address_type" id="others" name="others" value="Others">
                                                    <span class="checkround"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-2">
                                            <label for="address_detail">Address</label>
                                            <div class="input-group address-input-group">
                                                <input type="text" name="address_detail" class="form-control" id="address_detail" name="address_detail" placeholder="Address" aria-label="Recipient's Address" aria-describedby="button-addon2" value="" autocomplete="off" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-2">
                                            <label for="address_no">House / Apartment/ Flat No.</label>
                                            <input type="text" class="form-control" id="address_no" name="address_no" placeholder="House / Apartment/ Flat No." value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" id="street" name="street" placeholder="Street" value="">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 mb-2">
                                            <label for="city">City/Province</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City/Province" value="">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 mb-2">
                                            <label for="extra_instructions">Extra Instructions</label>
                                            <input type="text" class="form-control" id="extra_instructions" name="extra_instructions" placeholder="Extra instruction for driver to follow.." value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12 mt-2">
                        <button type="button" class="btn btn-solid bg-light ext-dark form-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-solid bg-primary text-dark form-btn" id="save_address_btn">Save Address</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal Delete Address -->


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to handle showing modals
    function showModal(targetModal) {
        var modal = new bootstrap.Modal(document.getElementById(targetModal));
        modal.show();
    }

    // Event handler for the "Add New Address" button
    var addAddressBtn = document.querySelector('.open-modal[data-bs-target="#add_address"]');
    addAddressBtn.addEventListener('click', function () {
        showModal('add_address');
    });

    // Event handler for the "Edit Address" button
    var editAddressBtn = document.querySelector('.open-modal[data-bs-target="#edit_address"]');
    editAddressBtn.addEventListener('click', function () {
        showModal('edit_address');
    });

    // Event handler for the "Remove Address Confirmation" button
    var removeAddressConfirmationBtn = document.querySelector('.open-modal[data-bs-target="#removeAddressConfirmation"]');
    removeAddressConfirmationBtn.addEventListener('click', function () {
        showModal('removeAddressConfirmation');
    });

    // Function to handle dismissing modals
    function dismissModal(targetModal) {
        var modal = new bootstrap.Modal(document.getElementById(targetModal));
        modal.hide();
    }

    // Event handler for closing modals
    var closeButtons = document.querySelectorAll('.modal button[data-bs-dismiss="modal"]');
    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var modalId = button.closest('.modal').id;
            dismissModal(modalId);
        });
    });
});


</script>

@endsection
