@extends('backend.master.master')

@section('title')
Other PDF| {{ $ins_name }}
@endsection


@section('css')

@endsection


@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Other PDF </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">PDF</li>
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="user-profile">
        <div class="row">

            <object
            data='{{ $ins_vat }}{{ 'public/'.$form_one_data }}'
            type="application/pdf"
            width="500"
            height="678"
          >

            <iframe
              src='{{ $ins_vat }}{{ 'public/'.$form_one_data }}'
              width="500"
              height="678"
            >
            <p>This browser does not support PDF!</p>
            </iframe>
          </object>

        </div>
    </div>
</div>
@endsection



@section('script')

@endsection
