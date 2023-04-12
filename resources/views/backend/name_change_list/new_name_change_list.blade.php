@extends('backend.master.master')

@section('title')
Ngo Name change List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>New NGO Name change List</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">NGO Name change</li>
                    <li class="breadcrumb-item">New NGO Name change List</li>
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid list-products">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>UserID</th>
                                <th>Previous NGO Name (Bangla & English)</th>
                                <th>Request NGO Name  (Bangla & English)</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Submit date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list as $all_data_for_new_list_all)

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
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('name_change_view',$all_data_for_new_list_all->user_id) }}';">View</button>
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
        <!-- Individual column searching (text inputs) Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')

@endsection
