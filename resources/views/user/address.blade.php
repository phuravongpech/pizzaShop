@extends('layouts.userLayout')

@section('content')
    <style>
            
            .img-account-profile {
                height: 10rem;
            }
            .rounded-circle {
                border-radius: 50% !important;
            }
            .card {
                box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
            }
            .card .card-header {
                font-weight: 500;
            }
            .card-header:first-child {
                border-radius: 0.35rem 0.35rem 0 0;
            }
            .card-header {
                padding: 1rem 1.35rem;
                margin-bottom: 0;
                background-color: rgba(33, 40, 50, 0.03);
                border-bottom: 1px solid rgba(33, 40, 50, 0.125);
            }
            .form-control, .dataTable-input {
                display: block;
                width: 100%;
                padding: 0.875rem 1.125rem;
                font-size: 0.875rem;
                font-weight: 400;
                line-height: 1;
                color: #69707a;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #c5ccd6;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.35rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .nav-borders .nav-link.active {
                color: #0061f2;
                border-bottom-color: #0061f2;
            }
            .nav-borders .nav-link {
                color: #69707a;
                border-bottom-width: 0.125rem;
                border-bottom-style: solid;
                border-bottom-color: transparent;
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
                padding-left: 0;
                padding-right: 0;
                margin-left: 1rem;
                margin-right: 1rem;
            }

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
                box-shadow: 0 4px 25px 0 rgb(138 129 124 / 3%)
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
            <div class="box-account box-info order-address">
            <div class="row">
                <div class="col-xl-4 col-md-6 text-center mt-md-2">
                    <a class="outer-box border-dashed d-flex align-items-center justify-content-center add_edit_address_btn" href="javascript:void(0)" data-toggle="modal" data-target="#add_address">
                        <i class="fa fa-plus-circle d-block mr-1" aria-hidden="true"></i>
                        <h6 class="m-0">
                        Add New Address
                        </h6>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6 mt-2">
                    <div class="outer-box px-0" >
                        <div class="address-type w-100">
                            <div class="default_address border-bottom mb-1 px-2">
                                <h6 class="mt-0 mb-2"><i class="fa fa-home mr-1" aria-hidden="true"></i> Home</h6>
                            </div>
                            <div class="px-2">
                                <p class="mb-1">88, 2Q8F+P9 Mulelemba, Zambia</p>
                                <p class="mb-1">h88</p>
                                <p class="mb-1">yes, yes 123</p>
                                <p class="mb-1">YEMEN</p>
                            </div>
                        </div>
                        <div class="address-btn align-items-end justify-content-end w-100 mt-sm-4 px-2">
                            <a class="btn btn-solid bg-primary text-dark mx-1" href="https://order.hungryapp.asia/user/setPrimaryAddress/9519">Set As Primary</a>
                            <a class="btn btn-solid add_edit_address_btn bg-primary text-dark mx-1" href="javascript:void(0)" data-toggle="modal" data-target="#edit_address" >Edit</a>
                            <a class="btn btn-solid delete_address_btn bg-primary text-dark mx-1"  href="javascript:void(0)" data-toggle="modal" data-target="#removeAddressConfirmation" >Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        
        

        
        <!-- Modal for add -->
            <div class="modal fade " id="add_address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="outer-box border-0 p-0">
                            <div class="row">
                                <div class="col-md-14" id="add_new_address_form">
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
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label for="house_number">House / Apartment/ Flat No.</label>
                                                        <input type="text" class="form-control" id="house_number" placeholder="House / Apartment/ Flat No." name="house_number" value="">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="street">Street</label>
                                                        <input type="text" class="form-control" id="street" placeholder="Street" name="street" value="">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <label for="city_province">City/Province</label>
                                                        <input type="text" class="form-control" id="city_province" name="city_province" placeholder="City/Province" value="">
                                                    </div>
                                                </div>

                                                <div class="row">
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
                        
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 mt-2">
                            <button type="button" class="btn btn-solid bg-primary text-dark form-btn" id="...">Save Address</button>
                            <button type="button" class="btn btn-solid bg-light text-dark form-btn" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="edit_address" tabindex="-2" aria-labelledby="editAddressLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAddressLabel">Edit Address</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="outer-box border-0 p-0">
                                <div class="row">
                                    <div class="col-md-14" id="edit_new_address_form">
                                        <div class="theme-card w-100">
                                            <div class="form-row no-gutters">
                                                <div class="col-12">
                                                    <label for="type">Address Type</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="delivery_box pt-0 pl-0 pb-2">
                                                        <label class="radio m-0 mx-4">Home
                                                            <input type="radio" name="type" id="edit_home" checked value="1">
                                                            <span class="checkround"></span>
                                                        </label>
                                                        <label class="radio m-0 mx-4">Work
                                                            <input type="radio" name="type" id="edit_work" value="2">
                                                            <span class="checkround"></span>
                                                        </label>
                                                        <label class="radio m-0 mx-4">Others
                                                            <input type="radio" name="type" id="edit_others" value="3">
                                                            <span class="checkround"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="latitude" id="edit_latitude" value="">
                                            <input type="hidden" name="longitude" id="edit_longitude" value="">

                                            <!-- Other form elements... -->

                                            <div class="form-row">
                                                <div class="col-md-12 mb-2">
                                                    <label for="address">Address</label>
                                                    <div class="input-group address-input-group">
                                                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" aria-label="Recipient's Address" aria-describedby="button-addon2" value="" autocomplete="off" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-12">

                                                    <div class="row">
                                                        <div class="col-md-6 mb-2">
                                                            <label for="house_number">House / Apartment/ Flat No.</label>
                                                            <input type="text" class="form-control" id="house_number" placeholder="House / Apartment/ Flat No." name="house_number" value="">
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label for="street">Street</label>
                                                            <input type="text" class="form-control" id="street" placeholder="Street" name="street" value="">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-2">
                                                            <label for="city_province">City/Province</label>
                                                            <input type="text" class="form-control" id="city_province" name="city_province" placeholder="City/Province" value="">
                                                        </div>
                                                    </div>

                                                    <div class="row">
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
                        </div>    
                        <div class="modal-footer">
                            <div class="col-md-12 mt-2">
                                <button type="button" class="btn btn-solid bg-primary text-dark form-btn" id="edit_save_address">Save Changes</button>
                                <button type="button" class="btn btn-solid bg-light text-dark form-btn" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        {{-- modal delete  --}}

        <div class="modal fade" id="removeAddressConfirmation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="remove_addressLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="remove_addressLabel">Delete Address </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <h6 class="m-0">
                            Do you really want to delete this address ?
                    </h6>
                    </div>
                    <div class="modal-footer flex-nowrap justify-content-center align-items-center">
                    <button type="button" class="btn btn-solid black-btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-solid" id="remove_address_confirm_btn" data-id="">Delete</button>
                    </div>
                </div>
            </div>
        </div>






<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Get the "Add New Address" button element
        var addAddressBtn = document.querySelector('.add_edit_address_btn[data-target="#add_address"]');
        var editAddressBtn = document.querySelector('.add_edit_address_btn[data-target="#edit_address"]');
        var deleteAddressBtn = document.querySelector('.delete_address_btn[data-target="#removeAddressConfirmation"]');

        // Add click event listener to the button
        addAddressBtn.addEventListener('click', function () {
            // Trigger the modal using Bootstrap's modal() method
            $('#add_address').modal('show');
        });
        editAddressBtn.addEventListener('click', function () {
            // Trigger the modal using Bootstrap's modal() method
            $('#edit_address').modal('show');
        });
        deleteAddressBtn.addEventListener('click', function () {
            // Trigger the modal using Bootstrap's modal() method
            $('#removeAddressConfirmation').modal('show');
        });
    });
</script>

@endsection
