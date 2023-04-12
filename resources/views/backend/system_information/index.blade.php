@extends('backend.master.master')

@section('title')
System Information| {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')


<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>System Information</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">System Information</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h5>System Information</h5>
          </div>
          <div class="card-body">
            @include('flash_message')

            <form method="post" action="{{ route('admin.system_information.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control form-control-sm" value="{{ $user->id }}" name="id" placeholder="Enter Name">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="formrow-email-input" class="form-label"> Name</label>
                            <input type="text" name="System_Name" value="{{ $user->System_Name }}" class="form-control" placeholder="Company Name">
                            <small></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="formFile" class="form-label"> Logo</label>
                            <input name="logo" value="" class="form-control" type="file" id="formFile">
                            <small></small>
                            <img src="{{ asset('/') }}{{ $user->logo }}" style="height:20px;"/>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="formFile" class="form-label"> Icon</label>
                            <input name="icon" value="" class="form-control" type="file" id="formFile">
                            <small></small>
                            <img src="{{ asset('/') }}{{ $user->icon }}" style="height:20px;"/>
                        </div>
                    </div>



                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="formrow-inputZip" class="form-label">Phone Number</label>
                            <input name="Phone" value="{{ $user->Phone }}" type="text" class="form-control" id="formrow-inputZip" placeholder="Phone Number">
                            <small></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="formrow-inputZip" class="form-label">Email </label>
                            <input name="Email" value="{{ $user->Email }}" type="email" class="form-control" id="formrow-inputZip" placeholder="Email id">
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="formrow-inputZip" class="form-label">Url</label>
                            <input name="vat" value="{{ $user->vat }}" type="text" class="form-control" id="formrow-inputZip" placeholder="Vat">
                            <small></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="formrow-email-input" class="form-label">Address</label>
                            <input name="Address" value="{{ $user->Address }}" type="text" class="form-control" id="formrow-email-input" placeholder="Address Line 1">
                        </div>
                    </div>


                </div>






                <div>
                    <button type="submit" class="btn btn-primary w-md">Save Changes</button>
                </div>


            </form>
          </div>

        </div>

      </div>
    </div>
  </div>




@endsection

@section('script')




@endsection







