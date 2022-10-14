@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Bank Details Management</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group p-3">
                                        <label for="bank-name" class="col-form-label">Current Bank Name: </label>
                                        <h4 style="margin-left:3px;">{{$data['0']['bank']}}</h4>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group p-3">
                                    <label for="account-number" class="col-form-label">Current Account Number:</label>
                                        <h4>{{$data['0']['account']}}</h4>
                                    </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <form action="updateBankDetails" method="POST">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group p-3">
                                        <label for="bank-name" class="col-form-label">Update Bank Name:</label>
                                        <input type="text" class="form-control" name="bankName" id="bankName" placeholder="Enter the Bank Name">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group p-3">
                                    <label for="account-number" class="col-form-label" >Update Account Number:</label>
                                        <input type="text" placeholder="Enter the Bank Account Number" name="accountNumber" id="accountNumber" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <input type="submit" value="Update Details" class="form-control btn bg-gradient-primary w-25" style="float:right;" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection