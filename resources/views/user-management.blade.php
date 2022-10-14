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
              <h6>All Users Table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="user-table">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Balance</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $d)
                    <tr>
                    <td class="align-middle text-center text-sm">
                        
                        <span class="text-secondary text-xs font-weight-bold">{{$d->id}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$d->username}}</p>
                        <p class="text-xs text-secondary mb-0">Real User</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        
                        <span class="text-secondary text-xs font-weight-bold">{{$d->email}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$d->created_at}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">SGD {{$d->balance}}</span>
                      </td>
                      <td class="text-center">
                      
                      <a class="mx-3" data-bs-toggle="modal" data-bs-original-title="Edit user" data-bs-target="#exampleModalMessage">
                          <i class="fas fa-user-edit text-secondary"></i>
                      </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="form-group" style="text-align:left;">
                                    <label for="recipient-name" class="col-form-label" >Recipient:</label>
                                    <input type="text" class="form-control" value="Creative Tim" id="recipient-name">
                                  </div>
                                  <div class="form-group" style="text-align:left;">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn bg-gradient-primary">Send message</button>
                                </div>
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
