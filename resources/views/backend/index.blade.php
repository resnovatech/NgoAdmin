@extends('backend.master.master')

@section('title')
Dashboard
@endsection


@section('body')
 <!-- Container-fluid starts-->
 <div class="container-fluid dashboard-default-sec">
    <div class="row">
        <div class="col-xl-5 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                    <div class="card profile-greeting">
                        <div class="card-header">
                            <div class="header-top">
                                <div class="setting-list bg-primary position-unset">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-white"><i class="icon-user"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center p-t-0">
                            <h3 class="font-light">Wellcome Back, {{ Auth::guard('admin')->user()->name }}!!</h3>
                            <p>we are glad that you are visite this dashboard.</p>
                            {{-- <button class="btn btn-light">Update Your Profile</button> --}}
                        </div>
                        <div class="confetti">
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xl-7 box-col-12 des-xl-100 dashboard-sec">
            <div class="row">
                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-history"></i>
                            </div>
                            <h5>{{ $totalRenewNgoRequest }}</h5>
                            <p>Total Renew Request</p>


                            <div class="parrten">
                                <i class="fa fa-history"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-power-off"></i>
                            </div>
                            <h5>{{ $totalRejectedRenewNgoRequest }}</h5>
                            <p>Total Rejected Renew Request</p>

                            <div class="parrten">
                                <i class="fa fa-power-off"></i>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>

<!--dd-->
<div class="container-fluid dashboard-default-sec">
    <div class="row">
<div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-align-left"></i>
                            </div>
                            <h5>{{ $totalRegisteredNgo }}</h5>
                            <p>Total Ngo Register</p>

                            <div class="parrten">
                                <i class="fa fa-align-left"></i>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-file"></i>
                            </div>
                            <h5>{{ $totalRenewNgoRequest }}</h5>
                            <p>Total Ngo Renew</p>

                            <div class="parrten">
                                <i class="fa fa-file"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <h5>{{ $totalNameChangeNgoRequest }}</h5>
                            <p>Total Ngo Name Change</p>

                            <div class="parrten">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
<!--e-->
<!-- Container-fluid Ends-->
 <div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
  New Registration List
              </div>
                <div class="card-body">
                  <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>NGO Name & Address</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Submit date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list as $all_data_for_new_list_all)

                                <?php
                                  $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$all_data_for_new_list_all->user_id)->value('ngo_type');
                             // dd($getngoForLanguage);
                                  if($getngoForLanguage =='দেশিও'){

                                    $reg_name = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_name_ban');

                                  }else{
                                    $reg_name = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_name');
                                  }

                                  ?>

                                <?php

                                $reg_number = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('registration_number');

                                $reg_address = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_address');

                                ?>
                            <tr>
                                <td>#{{ $reg_number }}</td>
                                <td><h6> NGO Name: {{ $reg_name  }}</h6><span>Address: {{ $reg_address }}</td>
                                <td>Yes</td>
                                <td class="font-success">{{ $all_data_for_new_list_all->status }}</td>
                                <td>{{ $all_data_for_new_list_all->created_at->format('d-M-y') }}</td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registration_view',$all_data_for_new_list_all->user_id) }}';">View</button>
@endif
@if (Auth::guard('admin')->user()->can('register_list_update'))

                                    <button class="btn btn-secondary btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $all_data_for_new_list_all->id }}" data-original-title="btn btn-danger btn-xs" title="">{{ $all_data_for_new_list_all->status }}</button>


                                    <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $all_data_for_new_list_all->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <?php

$get_email_from_user = DB::table('users')->where('id',$all_data_for_new_list_all->user_id)->value('email');

        ?>
        <div class="modal-body">
          <form action="{{ route('update_status_reg_form') }}" method="post">
            @csrf


            <input type="hidden" value="{{ $all_data_for_new_list_all->id }}" name="id" />

            <input type="hidden" value="{{ $get_email_from_user }}" name="email" />

            <label>Registration ID:</label>
            <input type="text" value="" name="reg_no_get_from_admin" class="form-control form-control-sm" />

            <select class="form-control form-control-sm mt-4" name="status" >

                <option value="Ongoing" {{ $all_data_for_new_list_all->status == 'Ongoing' ? 'selected':''  }}>Ongoing</option>
                <option value="Accepted" {{ $all_data_for_new_list_all->status == 'Accepted' ? 'selected':''  }}>Accepted</option>
                <option value="Rejected" {{ $all_data_for_new_list_all->status == 'Rejected' ? 'selected':''  }}>Rejected</option>

            </select>

            <button type="submit" class="btn btn-primary mt-5">Update</button>

          </form>
        </div>

      </div>
    </div>
  </div>
  @endif

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

 <div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
  New Name Change List
              </div>
                <div class="card-body">
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-2">
                            <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Previous NGO Name (Bangla & English)</th>
                                <th>Request NGO Name  (Bangla & English)</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Submit date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list_name_change as $all_data_for_new_list_all)

                                <?php

                                $reg_number = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('registration_number');
                         $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$all_data_for_new_list_all->user_id)->value('ngo_type');
                             // dd($getngoForLanguage);
                                  if($getngoForLanguage =='দেশিও'){

                                    $reg_name = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_name_ban');

                                  }else{
                                    $reg_name = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_name');
                                  }
                                $reg_address = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_address');

                                ?>
                            <tr>
                                <td>#{{ $reg_number }}</td>
                                <td><h6> NGO Name (Bangla): {{ $all_data_for_new_list_all->previous_name_ban }}</h6><span>NGO Name (English): {{ $all_data_for_new_list_all->previous_name_eng }}</td>
                                    <td><h6> NGO Name (Bangla): {{ $all_data_for_new_list_all->present_ban }}</h6><span>NGO Name (English): {{ $all_data_for_new_list_all->present_name_eng }}</td>
                                <td>Yes</td>
                                <td class="font-success">{{ $all_data_for_new_list_all->status }}</td>
                                <td>{{ $all_data_for_new_list_all->created_at->format('d-M-y') }}</td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registration_view',$all_data_for_new_list_all->user_id) }}';">View</button>
@endif
@if (Auth::guard('admin')->user()->can('register_list_update'))

                                    <button class="btn btn-secondary btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $all_data_for_new_list_all->id }}" data-original-title="btn btn-danger btn-xs" title="">{{ $all_data_for_new_list_all->status }}</button>

                                    <?php

                                    $get_email_from_user = DB::table('users')->where('id',$all_data_for_new_list_all->user_id)->value('email');

                                            ?>
                                    <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $all_data_for_new_list_all->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('update_status_name_change_form') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $all_data_for_new_list_all->id }}" name="id" />
            <input type="hidden" value="{{ $get_email_from_user }}" name="email" />
            <select class="form-control form-control-sm" name="status" >

                <option value="Ongoing" {{ $all_data_for_new_list_all->status == 'Ongoing' ? 'selected':''  }}>Ongoing</option>
                <option value="Accepted" {{ $all_data_for_new_list_all->status == 'Accepted' ? 'selected':''  }}>Accepted</option>
                <option value="Rejected" {{ $all_data_for_new_list_all->status == 'Rejected' ? 'selected':''  }}>Rejected</option>

            </select>

            <button type="submit" class="btn btn-primary mt-5">Update</button>

          </form>
        </div>

      </div>
    </div>
  </div>
  @endif

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


 <div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
  New Ngo Renew List
              </div>
                <div class="card-body">
                   <div class="table-responsive product-table">
                        <table class="display" id="basic-3">
                            <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>NGO Name & Address</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Submit date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list_renew as $all_data_for_new_list_all)

                                <?php

                                $reg_number = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('registration_number');
                                 $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$all_data_for_new_list_all->user_id)->value('ngo_type');
                             // dd($getngoForLanguage);
                                  if($getngoForLanguage =='দেশিও'){

                                    $reg_name = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_name_ban');

                                  }else{
                                    $reg_name = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_name');
                                  }
                                $reg_address = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->value('organization_address');

                                ?>
                            <tr>
                                <td>#{{ $reg_number }}</td>
                                <td><h6> NGO Name: {{ $reg_name  }}</h6><span>Address: {{ $reg_address }}</td>
                                <td>Yes</td>
                                <td class="font-success">{{ $all_data_for_new_list_all->status }}</td>
                                <td>{{ $all_data_for_new_list_all->created_at->format('d-M-y') }}</td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registration_view',$all_data_for_new_list_all->user_id) }}';">View</button>
@endif
@if (Auth::guard('admin')->user()->can('register_list_update'))

                                    <button class="btn btn-secondary btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $all_data_for_new_list_all->id }}" data-original-title="btn btn-danger btn-xs" title="">{{ $all_data_for_new_list_all->status }}</button>

                                    <?php

                                    $get_email_from_user = DB::table('users')->where('id',$all_data_for_new_list_all->user_id)->value('email');

                                            ?>
                                    <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $all_data_for_new_list_all->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('update_status_renew_form') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $all_data_for_new_list_all->id }}" name="id" />
            <input type="hidden" value="{{ $get_email_from_user }}" name="email" />
            <select class="form-control form-control-sm" name="status" >

                <option value="Ongoing" {{ $all_data_for_new_list_all->status == 'Ongoing' ? 'selected':''  }}>Ongoing</option>
                <option value="Accepted" {{ $all_data_for_new_list_all->status == 'Accepted' ? 'selected':''  }}>Accepted</option>
                <option value="Rejected" {{ $all_data_for_new_list_all->status == 'Rejected' ? 'selected':''  }}>Rejected</option>

            </select>

            <button type="submit" class="btn btn-primary mt-5">Update</button>

          </form>
        </div>

      </div>
    </div>
  </div>
  @endif

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
@endsection

@section('script')


@endsection



