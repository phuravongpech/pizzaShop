@extends('layouts.userLayout')

@section('content')
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

            .box_shadow {
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
                border: 1px solid #e5e5e5;
                border-radius: 20px;
                padding: 10px;
                margin-bottom: 10px;
            } 

            .form-control {

                border-radius: 30px;
                border: 1px solid #ccc; 
                margin-top: 10px;
            }
    </style>

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <div class="box_shadow mx-5 p-5">
        <form method="POST" class="" action="{{ route('address.update', $address->id ) }}">
            @csrf
            <input type="hidden" name="address_id" value="{{ $address->id }}">
    
            <div class="outer-box border-0 p-0">
                <div class="row">
                    <div class="col-md-12" id="edit_new_address_form">
                        <div class="theme-card w-100 ">
                            <div class="form-row no-gutters  mb-3">
                                <div class="col-12 mb-3">
                                    <label for="type">Address Type</label>
                                </div>
                                <div class="col-12">
                                    <div class="delivery_box pt-0 pl-0 pb-2">
                                        <label class="radio m-0 mx-4">Home
                                            <input type="radio" name="address_type" id="home" value="Home">
                                            <span class="checkround"></span>
                                        </label>
                                        <label class="radio m-0 mx-4">Work
                                            <input type="radio" name="address_type" id="work" value="Work">
                                            <span class="checkround"></span>
                                        </label>
                                        <label class="radio m-0 mx-4">Others
                                            <input type="radio" name="address_type" id="others" value="Others">
                                            <span class="checkround"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row  mb-3">
                                <div class="col-md-12 mb-2">
                                    <label for="address_detail">Address</label>
                                    <div class="input-group address-input-group">
                                        <input type="text" name="address_detail" class="form-control" id="address_detail" placeholder="Address" aria-label="Recipient's Address" aria-describedby="button-addon2" value="{{ $address->address_detail }}" autocomplete="off" required="required">
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-row  mb-3">
                                <div class="col-md-6 mb-2">
                                    <label for="address_no">House / Apartment/ Flat No.</label>
                                    <input type="text" class="form-control" id="address_no" placeholder="House / Apartment/ Flat No." name="address_no" value="{{ $address->address_no }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="street">Street</label>
                                    <input type="text" class="form-control" id="street" placeholder="Street" name="street" value="{{ $address->street }}">
                                </div>
                            </div>
    
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-2">
                                    <label for="city">City/Province</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City/Province" value="{{ $address->city }}">
                                </div>
                            </div>
    
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-2">
                                    <label for="extra_instructions">Extra Instructions</label>
                                    <input type="text" class="form-control" id="extra_instructions" name="extra_instructions" placeholder="Extra instruction for driver to follow.." value="{{ $address->extra_instructions }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="modal-footer">
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-solid bg-primary text-dark form-btn" id="edit_save_address_btn">Save Changes</button>
                    <button type="button" class="btn btn-solid bg-light text-dark form-btn" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>


</div>

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
