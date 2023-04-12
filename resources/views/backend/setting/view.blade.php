@extends('backend.master.master')

@section('title')
Profile | {{ $ins_name }}
@endsection


@section('body')



                    <!-- start page title -->
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4 class="font-size-18">Admin Information </h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"></a></li>
                                    <!--<li class="breadcrumb-item"><a href="add_new_user.php">Admin</a></li>-->
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                 @if(!empty(Auth::guard('admin')->user()->image))
                                  <img class=" mx-auto d-block" src="{{asset('/')}}{{ Auth::guard('admin')->user()->image }}" alt="" width="60%">

                                 @else
                                    <img class=" mx-auto d-block" src="{{ asset('/') }}public/admin/assets/images/users/user-8.jpg" alt="" width="60%">
                                @endif
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">

                                    <h4>Admin Information </h4>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">

                                            <tbody>
                                                <tr>
                                                    <td>Name:</td>
                                                    <td>{{  Auth::guard('admin')->user()->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td>{{  Auth::guard('admin')->user()->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone:</td>
                                                    <td>{{  Auth::guard('admin')->user()->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>About:</td>
                                                    <td>{{  Auth::guard('admin')->user()->about }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address:</td>
                                                    <td>{{  Auth::guard('admin')->user()->address }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>


                                </div>

                            </div>
                        </div>


                    </div> <!-- end row -->




@endsection
