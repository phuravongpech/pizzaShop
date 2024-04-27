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
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
            }

            .address-btn a, .form-btn {
                border-radius: 30px;
            }

            .d-flex  {
                box-shadow: 0 4px 14px 0 rgb(0 0 0 / 9%);
                border-radius: 30px;
                border: 1px solid#ccc;  
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
                                <p class="mb-1 ps-2">{{$address->address_no}}</p>
                                <p class="mb-1 ps-2">{{$address->street}}</p>
                                <p class="mb-1 ps-2">{{$address->city}}</p>
                            </div>
                        </div>
                        <div class="address-btn align-items-end justify-content-end w-100 mt-sm-4 px-2">
                            <a class="btn btn-solid open-modal bg-primary text-dark mx-1" href="" data-bs-toggle="modal" data-bs-target="#edit_address">Edit</a>
                            <a class="btn btn-solid delete_address_btn bg-primary text-dark mx-1" href="" data-bs-toggle="modal" data-bs-target="#removeAddressConfirmation">Delete</a>
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
<div id="add_address" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                <input type="radio" name="type" id="home" checked value="1">
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio m-0 mx-4" >Work
                                                <input type="radio" name="type" id="work" value="2">
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio m-0 mx-4">Others
                                                <input type="radio" name="type" id="others" value="3">
                                                <span class="checkround"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="latitude" id="latitude" value="">
                                <input type="hidden" name="longitude" id="longitude" value="">

                                <div class="form-row">
                                    <div class="col-md-12 mb-2">
                                        <label for="address">Address</label>
                                        <div class="input-group address-input-group">
                                            <input type="text" name="address" class="form-control" id="address" placeholder="Address" aria-label="Recipient's Address" aria-describedby="button-addon2" value="" autocomplete="off" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-2">
                                        <label for="house_number">House / Apartment/ Flat No.</label>
                                        <input type="text" class="form-control" id="house_number" placeholder="House / Apartment/ Flat No." name="house_number" value="">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="street">Street</label>
                                        <input type="text" class="form-control" id="street" placeholder="Street" name="street" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-2">
                                        <label for="city_province">City/Province</label>
                                        <input type="text" class="form-control" id="city_province" name="city_province" placeholder="City/Province" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-2">
                                        <label for="extra_instruction">Extra Instructions</label>
                                        <input type="text" class="form-control" id="extra_instruction" name="extra_instruction" placeholder="Extra instruction for driver to follow.." value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 mt-2">
                    <button type="button" class="btn btn-solid bg-primary text-dark form-btn" id="save_address_btn">Save Address</button>
                    <button type="button" class="btn btn-solid bg-light text-dark form-btn" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div id="edit_address" class="modal fade" tabindex="-1" aria-labelledby="editAddressLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressLabel">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="outer-box border-0 p-0">
                    <div class="row">
                        <div class="col-md-12" id="edit_new_address_form">
                            <div class="theme-card w-100">
                                <div class="form-row no-gutters">
                                    <div class="col-12">
                                        <label for="edit_type">Address Type</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="delivery_box pt-0 pl-0 pb-2">
                                            <label class="radio m-0 mx-4">Home
                                                <input type="radio" name="edit_type" id="edit_home" checked value="1">
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio m-0 mx-4">Work
                                                <input type="radio" name="edit_type" id="edit_work" value="2">
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio m-0 mx-4">Others
                                                <input type="radio" name="edit_type" id="edit_others" value="3">
                                                <span class="checkround"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="edit_latitude" id="edit_latitude" value="">
                                <input type="hidden" name="edit_longitude" id="edit_longitude" value="">

                                <div class="form-row">
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_address">Address</label>
                                        <div class="input-group address-input-group">
                                            <input type="text" name="edit_address" class="form-control" id="edit_address_input" placeholder="Address" aria-label="Recipient's Address" aria-describedby="button-addon2" value="" autocomplete="off" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-2">
                                        <label for="edit_house_number">House / Apartment/ Flat No.</label>
                                        <input type="text" class="form-control" id="edit_house_number" placeholder="House / Apartment/ Flat No." name="edit_house_number" value="">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="edit_street">Street</label>
                                        <input type="text" class="form-control" id="edit_street" placeholder="Street" name="edit_street" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_city_province">City/Province</label>
                                        <input type="text" class="form-control" id="edit_city_province" name="edit_city_province" placeholder="City/Province" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-2">
                                        <label for="edit_extra_instruction">Extra Instructions</label>
                                        <input type="text" class="form-control" id="edit_extra_instruction" name="edit_extra_instruction" placeholder="Extra instruction for driver to follow.." value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="modal-footer">
                <div class="col-md-12 mt-2">
                    <button type="button" class="btn btn-solid bg-primary text-dark form-btn" id="edit_save_address_btn">Save Changes</button>
                    <button type="button" class="btn btn-solid bg-light text-dark form-btn" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Modal Delete Address -->
<div class="modal fade" id="removeAddressConfirmation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="remove_addressLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="remove_addressLabel">Delete Address</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="m-0">
                    Do you really want to delete this address?
                </h6>
            </div>
            <div class="modal-footer flex-nowrap justify-content-center align-items-center">
                <button type="button" class="btn btn-solid bg-light ext-dark form-btn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-solid bg-danger text-dark form-btn" id="remove_address_confirm_btn" data-id="">Delete</button>
            </div>
        </div>
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
