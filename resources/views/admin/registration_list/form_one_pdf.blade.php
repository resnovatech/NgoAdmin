@extends('admin.master.master')

@section('title')
এফডি -০১ ফর্ম| {{ $ins_name }}
@endsection


@section('css')

@endsection


@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>এফডি -০১ ফর্ম</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফডি -০১ ফর্ম </li>
                    <li class="breadcrumb-item active">পিডিএফ</li>
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>

<?php

$getCurrentUrl = url();
//dd($getCurrentUrl);

?>
<div class="container-fluid">
    <div class="user-profile">
        <div class="row">

            <object
            data='{{ $ins_url }}{{ 'public/'.$form_one_data }}'
            type="application/pdf"
            width="500"
            height="678"
          >

            <iframe
              src='{{ $ins_url }}{{ 'public/'.$form_one_data }}'
              width="500"
              height="900"
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
