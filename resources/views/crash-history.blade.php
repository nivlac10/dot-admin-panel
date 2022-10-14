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
              <h6>Crash Rates History</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="crash-table">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Crash ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start At</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Crash Rate</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                    @foreach($data as $d)
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{$d->id}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{$d->created_at}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{$d->rate_final}}</span>
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
