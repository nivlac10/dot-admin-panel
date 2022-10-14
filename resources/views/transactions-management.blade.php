@extends('layouts.user_type.auth')

@section('content')
  <style>
    .dataTables_length {
      margin-left: 20px;
    }
    .dataTables_filter {
      margin-right:20px;
    }
    .dataTables_info {
      margin-left: 20px;
    }
  </style>
  
  
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>All Transactions Table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="transaction-table">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transaction ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount (RM)</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Method</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                    @foreach($data as $d)
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{$d->id}}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{$d->username}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{$d->amount}}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$d->method}}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$d->status}}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$d->created_at}}</span>
                        </td>
                        @if($d->status === 'Pending')
                        <td class="text-center">
                        <a class="mx-3" style="cursor:pointer;" data-bs-toggle="modal" data-bs-original-title="Edit Transactions" data-bs-target="#exampleModalMessage" onclick="showTransactionModal( {{ $d->id }} );">
                          <i class="fas fa-user-edit text-secondary"></i>
                        </a>
                        @else
                        <td class="text-center">
                        <a class="mx-3"  data-bs-toggle="modal" data-bs-original-title="Edit Transactions">
                          <i class="fas fa-user-edit text-secondary"></i>
                        </a>
                        @endif
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Transactions</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" role="form" name="update-form" id="update-form">
                                    <input type="text" class="form-control" name="txid" id="txid" disabled style="display:none;">
                                    <input type="text" class="form-control" name="uid" id="uid" disabled style="display:none;">
                                    <div class="form-group" style="text-align:left;">
                                      <label for="recipient-name" class="col-form-label" >Username:</label>
                                      <input type="text" class="form-control" name="username" id="username" disabled>
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                      <label for="message-text" class="col-form-label">Amount:</label>
                                      <input type="text" class="form-control" name="amount" id="amount" disabled>
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                      <label for="message-text" class="col-form-label">Method:</label>
                                      <input type="text" class="form-control" name="method" id="method" disabled>
                                    </div>
                                    @if($d->method == 'Deposit')
                                    <div class="form-group" style="text-align:left; width:100%;">
                                      <a target="_blank" class="btn btn-outline-primary" name="image-url" id="image-url">View Receipt</a>
                                    </div>
                                    @else
                                    <div class="form-group" style="text-align:left; width:100%;">
                                      <a target="_blank" class="btn btn-outline-primary" name="image-url" id="image-url">Upload Receipt</a>
                                    </div>
                                    @endif
                                    <div class="form-group" style="text-align:left;">
                                      <label for="message-text" class="col-form-label">Status:</label>
                                      
                                      <select name="status" id="status">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                      </select>
                                    
                                    </div>

                                    <div id="message">                                                                           
                                    </div>
                              
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                        <button onclick="updateTransaction();" type="button" class="btn bg-gradient-primary">Update Transaction</button>
                                    </div>
                                 </form>
                              </div>
                            </div>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
  </main>

  
  @endsection
