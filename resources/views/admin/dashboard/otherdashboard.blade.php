<div class="card-body">
    <ul class="nav nav-dark" id="pills-darktab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab" data-bs-toggle="pill" href="#pills-darkhome" role="tab" aria-controls="pills-darkhome" aria-selected="true"><i class="icofont icofont-ui-home"></i>ডাক</a></li>
    </ul>
    <div class="tab-content" id="pills-darktabContent">
        <div class="tab-pane fade show active" id="pills-darkhome" role="tabpanel" aria-labelledby="pills-darkhome-tab">
            <div class="table-responsive product-table mb-0 m-t-30">
                <table class="display" id="basic-1">
                    <tbody>

                        @foreach($ngoStatusReg as $i=>$allStatusData)

                        @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

                        @else

                        <?php

                        //new code
$orginalReceverId= DB::table('ngo_registration_daks')
->where('registration_status_id',$allStatusData->registration_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('ngo_statuses')->where('id',$allStatusData->registration_status_id)
                            ->value('fd_one_form_id');

                     $form_one_data = DB::table('fd_one_forms')
                     ->where('id',$formOneDataId)->first();


                     $adminNamePrapok = DB::table('admins')
                            ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                            $adminNamePrerok = DB::table('admins')
                            ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


        $decesionName = DB::table('dak_details')
        ->where('id',$allStatusData->dak_detail_id)->where('status','registration')->value('decision_list');
                        ?>
                    <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
                        <td style="text-align:left;">
                            উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                            প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                            মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                            বিষয়ঃ <b> এনজিও নিবন্ধন </b><br>
                            সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                            তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
                        </td>
                        <td style="text-align:right;">

                            @if($allStatusData->original_recipient == 1)


                            <button  type="button" class="btn-xs btn btn-primary"
                            data-toggle="tooltip" data-placement="top"
                            title="নথিতে উপস্থাপন করুন"
                            data-bs-toggle="modal"
                            data-original-title="" data-bs-target="#myModal{{ $allStatusData->id }}">
                        <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                    </button>

                    @include('admin.post.nothiModal')

                            {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'registration','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'registration','id'=>$allStatusData->registration_status_id]) }}';">প্রেরণ</button>
                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registrationView',$formOneDataId) }}';">দেখুন</button>

                            @else
                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registrationView',$formOneDataId) }}';">দেখুন</button>
                            @endif


                            <button  type="button" class="btn-xs btn btn-primary"
                            data-toggle="tooltip" data-placement="top"
                            title="নথি জাত করুন"
                            data-bs-toggle="modal"
                            data-original-title="" data-bs-target="#nothiJatModal{{ $allStatusData->id }}">
                            <i class="icofont icofont-rotation"></i> নথি জাত করুন
                            </button>

                            @include('admin.post.nothiJatModalForRegistration')


                                                                                     <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalreg{{ $i }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalreg{{ $i }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->registration_status_id)->orderBy('id','desc')->first();







                    ?>

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_registration_daks')
->where('registration_status_id',$allStatusData->registration_status_id)->orderBy('id','asc')->get();
//dd($mainDetail);
                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else


                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এনজিও নিবন্ধন</h5>
                                    @if(!$dakDetail->main_file)

                                    @else


                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                     @endif





                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                                                                       <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif



            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
                        </td>
                    </tr>
                    @endif
                    @endforeach

                    @foreach($ngoStatusRenew as $r=>$allStatusData)

                    @if($allStatusData->nothi_jat_status == 1  || $allStatusData->present_status == 1)

                    @else

                    <?php

//new code
$orginalReceverId= DB::table('ngo_renew_daks')
->where('renew_status_id',$allStatusData->renew_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('ngo_renews')->where('id',$allStatusData->renew_status_id)
                        ->value('fd_one_form_id');

                 $form_one_data = DB::table('fd_one_forms')
                 ->where('id',$formOneDataId)->first();


                 $adminNamePrapok = DB::table('admins')
                        ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                        $adminNamePrerok = DB::table('admins')
                        ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


    $decesionName = DB::table('dak_details')
    ->where('id',$allStatusData->dak_detail_id)->where('status','renew')->value('decision_list');
                    ?>
                <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
                    <td style="text-align:left;">
                        উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                        বিষয়ঃ <b> এনজিও নবায়ন</b><br>
                        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
                    </td>
                    <td style="text-align:right;">

                        @if($allStatusData->original_recipient == 1)

                        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#remyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.renothiModal')




                        {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'renew','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'renew','id'=>$allStatusData->renew_status_id]) }}';">প্রেরণ</button>
                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('renewView',$allStatusData->renew_status_id) }}';">দেখুন</button>
                        @else
                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('renewView',$allStatusData->renew_status_id) }}';">দেখুন</button>
                        @endif

                        <button  type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথি জাত করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#nothiJatModalrenew{{ $allStatusData->id }}">
                        <i class="icofont icofont-rotation"></i> নথি জাত করুন
                        </button>

                        @include('admin.post.nothiJatModalForRenew')
                                        <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalrenew{{ $r }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalrenew{{ $r }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->renew_status_id)->orderBy('id','desc')->first();







                    ?>

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_renew_daks')
->where('renew_status_id',$allStatusData->renew_status_id)->orderBy('id','asc')->get();


//dd($mainDetail);

                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এনজিও নবায়ন</h5>
                                    @if(!$dakDetail->main_file)

                                    @else


                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                     @endif





                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                                                                       <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif



            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
                    </td>
                </tr>
                @endif
                @endforeach


                @foreach($ngoStatusNameChange as $k=>$allStatusData)
                @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

                @else
                <?php

                                        //new code
$orginalReceverId= DB::table('ngo_name_change_daks')
->where('name_change_status_id',$allStatusData->name_change_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('ngo_name_changes')->where('id',$allStatusData->name_change_status_id)
                    ->value('fd_one_form_id');

             $form_one_data = DB::table('fd_one_forms')
             ->where('id',$formOneDataId)->first();


             $adminNamePrapok = DB::table('admins')
                    ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                    $adminNamePrerok = DB::table('admins')
                    ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','nameChange')->value('decision_list');
                ?>
            <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
                <td style="text-align:left;">
                    উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                    প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                    মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                    বিষয়ঃ <b> এনজিও'র নাম পরিবর্তন</b><br>
                    সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                    তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
                </td>
                <td style="text-align:right;">

                    @if($allStatusData->original_recipient == 1)

                    <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#nammyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.namnothiModal')


                    {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'nameChange','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'nameChange','id'=>$allStatusData->name_change_status_id]) }}';">প্রেরণ</button>
                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('nameChangeView',$allStatusData->name_change_status_id) }}';">দেখুন</button>
                    @else
                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('nameChangeView',$allStatusData->name_change_status_id) }}';">দেখুন</button>
                    @endif

                    <button  type="button" class="btn-xs btn btn-primary"
                    data-toggle="tooltip" data-placement="top"
                    title="নথি জাত করুন"
                    data-bs-toggle="modal"
                    data-original-title="" data-bs-target="#nothiJatModalNameChange{{ $allStatusData->id }}">
                    <i class="icofont icofont-rotation"></i> নথি জাত করুন
                    </button>

                    @include('admin.post.nothiJatModalNameChange')
                              <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalnameChange{{ $k }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalnameChange{{ $k }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->name_change_status_id)->orderBy('id','desc')->first();







                    ?>

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_name_change_daks')
->where('name_change_status_id',$allStatusData->name_change_status_id)

->orderBy('id','asc')->get();

                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এনজিও'র নাম পরিবর্তন</h5>
                                    @if(!$dakDetail->main_file)

                                    @else


                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                     @endif





                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                                                                       <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif



            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
                </td>
            </tr>
            @endif
            @endforeach


            @foreach($ngoStatusFDNineDak as $m=>$allStatusData)
            @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

            @else
            <?php

                                                                                    //new code
$orginalReceverId= DB::table('ngo_f_d_nine_daks')
->where('f_d_nine_status_id',$allStatusData->f_d_nine_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd9_forms')
// ->join('n_visas', 'n_visas.id', '=', 'fd9_forms.n_visa_id')
// ->join('fd_one_forms', 'fd_one_forms.id', '=', 'n_visas.fd_one_form_id')
// ->select('fd_one_forms.*','fd9_forms.*','fd9_forms.status as mainStatus','n_visas.*','n_visas.id as nVisaId')
->where('id',$allStatusData->f_d_nine_status_id)->value('fd_one_form_id');

         $form_one_data = DB::table('fd_one_forms')
         ->where('id',$formOneDataId)->first();


         $adminNamePrapok = DB::table('admins')
                ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                $adminNamePrerok = DB::table('admins')
                ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','fdNine')->value('decision_list');
            ?>
       <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
            <td style="text-align:left;">
                উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                বিষয়ঃ <b> এফডি৯ (এন-ভিসা)</b><br>
                সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
            </td>
            <td style="text-align:right;">

                @if($allStatusData->original_recipient == 1)

                <button type="button" class="btn-xs btn btn-primary"
                data-toggle="tooltip" data-placement="top"
                title="নথিতে উপস্থাপন করুন"
                data-bs-toggle="modal"
                data-original-title="" data-bs-target="#fdninemyModal{{ $allStatusData->id }}">
            <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
        </button>

        @include('admin.post.fdninenothiModal')



                {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdNine','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
                <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdNine','id'=>$allStatusData->f_d_nine_status_id]) }}';">প্রেরণ</button>
                <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9Form.show',$allStatusData->f_d_nine_status_id) }}';">দেখুন</button>
                @else
                <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9Form.show',$allStatusData->f_d_nine_status_id) }}';">দেখুন</button>
                @endif


                <button  type="button" class="btn-xs btn btn-primary"
                data-toggle="tooltip" data-placement="top"
                title="নথি জাত করুন"
                data-bs-toggle="modal"
                data-original-title="" data-bs-target="#nothiJatModalFdNine{{ $allStatusData->id }}">
                <i class="icofont icofont-rotation"></i> নথি জাত করুন
                </button>

                @include('admin.post.nothiJatModalFdNine')


                     <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalfd9{{ $m }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalfd9{{ $m }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->f_d_nine_status_id)->orderBy('id','desc')->first();







                    ?>

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_f_d_nine_daks')
->where('f_d_nine_status_id',$allStatusData->f_d_nine_status_id)
->orderBy('id','asc')->get();

                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এফডি৯ (এন-ভিসা)</h5>
                                    @if(!$dakDetail->main_file)

                                    @else


                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                     @endif





                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                                                                       <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif



            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
            </td>
        </tr>
        @endif
        @endforeach


        @foreach($ngoStatusFDNineOneDak as $f=>$allStatusData)
        @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

        @else
        <?php

                                                                                               //new code
$orginalReceverId= DB::table('ngo_f_d_nine_one_daks')
->where('f_d_nine_one_status_id',$allStatusData->f_d_nine_one_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd9_one_forms')
->where('id',$allStatusData->f_d_nine_one_status_id)
            ->value('fd_one_form_id');



            $form9OneDataId = DB::table('fd9_one_forms')
->join('n_visas', 'n_visas.fd9_one_form_id', '=', 'fd9_one_forms.id')

->where('n_visas.id',$allStatusData->f_d_nine_one_status_id)
            ->value('n_visas.fd9_one_form_id');


           // dd($formOneDataId);

     $form_one_data = DB::table('fd_one_forms')
     ->where('id',$formOneDataId)->first();


     $adminNamePrapok = DB::table('admins')
            ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

            $adminNamePrerok = DB::table('admins')
            ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','fdNineOne')->value('decision_list');
        ?>
    <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
        <td style="text-align:left;">
            উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
            প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
            মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
            বিষয়ঃ <b> এফডি ৯.১ (ওয়ার্ক পারমিট)</b><br>
            সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
            তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
        </td>
        <td style="text-align:right;">

            @if($allStatusData->original_recipient == 1)

            <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdnineonemyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdnineonenothiModal')



            {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdNineOne','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdNineOne','id'=>$allStatusData->f_d_nine_one_status_id]) }}';">প্রেরণ</button>
            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9OneForm.show',$allStatusData->f_d_nine_one_status_id) }}';">দেখুন</button>
            @else
            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9OneForm.show',$allStatusData->f_d_nine_one_status_id) }}';">দেখুন</button>
            @endif

            <button  type="button" class="btn-xs btn btn-primary"
            data-toggle="tooltip" data-placement="top"
            title="নথি জাত করুন"
            data-bs-toggle="modal"
            data-original-title="" data-bs-target="#nothiJatModalFdNineOne{{ $allStatusData->id }}">
            <i class="icofont icofont-rotation"></i> নথি জাত করুন
            </button>

            @include('admin.post.nothiJatModalFdNineOne')
<!--new code-->
<button type="button" class="btn btn-primary btn-xs"
data-bs-toggle="modal"
data-original-title="" data-bs-target="#myModalfd9one{{ $f }}">
ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd9one{{ $f }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel2">
ডাক গতিবিধি</h4>
</div>

<div class="modal-body">

<?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->f_d_nine_one_status_id)->orderBy('id','desc')->first();







?>

@if(!$dakDetail)

@else

<?php

$mainDetail = DB::table('ngo_f_d_nine_one_daks')
->where('f_d_nine_one_status_id',$allStatusData->f_d_nine_one_status_id)

->orderBy('id','asc')->get();

?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

<div class="d-flex mb-2">
<div class="flex-shrink-0 tracking_img">

@if($key == 0)

@if(empty($senderImage))

<img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
@else

<img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
@else

@if(empty($receiverImage))
<img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

@else

<img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

@endif
</div>
<div class="flex-grow-1">
<div class="card" style="border:2px solid #979797">
  <div class="card-body">
      <div class="tracking_box">
          <h5>বিষয়ঃ এফডি ৯.১ (ওয়ার্ক পারমিট)</h5>
          @if(!$dakDetail->main_file)

          @else


          <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
           @endif





          <hr>
          <ul>
              <li>প্রেরক : {{ $senderName }}</li>
              <li>প্রাপক : {{ $receiverName }}</li>
          </ul>
          <hr>
                                                             <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
      </div>
  </div>
</div>
</div>
</div>

@endforeach

@endif



</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
<!--end new code -->




        </td>
    </tr>
    @endif
    @endforeach


    <!--fdsix code start--->

    @foreach($ngoStatusFdSixDak as $p=>$allStatusData)


    @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

    @else

    <?php


                                                     //new code
                                                     $orginalReceverId= DB::table('ngo_fd_six_daks')
->where('fd_six_status_id',$allStatusData->fd_six_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd6_forms')->where('id',$allStatusData->fd_six_status_id)->value('fd_one_form_id');

 $form_one_data = DB::table('fd_one_forms')
 ->where('id',$formOneDataId)->first();


 $adminNamePrapok = DB::table('admins')
        ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

        $adminNamePrerok = DB::table('admins')
        ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','fdSix')->value('decision_list');
    ?>
<!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
    <td style="text-align:left;">
        উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফডি - ৬ </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdsixmyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdsixnothiModal')

        {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdSix','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdSix','id'=>$allStatusData->fd_six_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd6Form.show',$allStatusData->fd_six_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd6Form.show',$allStatusData->fd_six_status_id) }}';">দেখুন</button>
        @endif

        <button  type="button" class="btn-xs btn btn-primary"
        data-toggle="tooltip" data-placement="top"
        title="নথি জাত করুন"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#nothiJatModalFdSix{{ $allStatusData->id }}">
        <i class="icofont icofont-rotation"></i> নথি জাত করুন
        </button>

        @include('admin.post.nothiJatModalFdSix')


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfd6{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd6{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

        <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->fd_six_status_id)->orderBy('id','desc')->first();







            ?>

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('ngo_fd_six_daks')
->where('fd_six_status_id',$allStatusData->fd_six_status_id)
->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফডি - ৬ </h5>
                            @if(!$dakDetail->main_file)

                            @else


                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                             @endif





                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                                                                               <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif



    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endif
@endforeach

    <!--fdsix code end ---->

    <!--fdseven code start ---->


    @foreach($ngoStatusFdSevenDak as $p=>$allStatusData)
    @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

    @else
    <?php


                                                                               //new code
$orginalReceverId= DB::table('ngo_fd_seven_daks')
->where('fd_seven_status_id',$allStatusData->fd_seven_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd7_forms')->where('id',$allStatusData->fd_seven_status_id)->value('fd_one_form_id');

 $form_one_data = DB::table('fd_one_forms')
 ->where('id',$formOneDataId)->first();


 $adminNamePrapok = DB::table('admins')
        ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

        $adminNamePrerok = DB::table('admins')
        ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','fdSeven')->value('decision_list');
    ?>
<!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
    <td style="text-align:left;">
        উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফডি - ৭  </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdsevenmyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdsevennothiModal')


        {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdSeven','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdSeven','id'=>$allStatusData->fd_seven_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd7Form.show',$allStatusData->fd_seven_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd7Form.show',$allStatusData->fd_seven_status_id) }}';">দেখুন</button>
        @endif


        <button  type="button" class="btn-xs btn btn-primary"
        data-toggle="tooltip" data-placement="top"
        title="নথি জাত করুন"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#nothiJatModalFdSeven{{ $allStatusData->id }}">
        <i class="icofont icofont-rotation"></i> নথি জাত করুন
        </button>

        @include('admin.post.nothiJatModalFdSeven')


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfd7{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd7{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

        <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->fd_seven_status_id)->orderBy('id','desc')->first();







            ?>

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('ngo_fd_seven_daks')
->where('fd_seven_status_id',$allStatusData->fd_seven_status_id)
->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফডি - ৭ </h5>
                            @if(!$dakDetail->main_file)

                            @else


                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                             @endif





                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                                                                               <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif



    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endif
@endforeach

    <!--fdseven code end ---->

    <!-- fc one code start -->

    @foreach($ngoStatusFcOneDak as $p=>$allStatusData)

    @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

    @else

    <?php

                                                                   //new code
                                                                   $orginalReceverId= DB::table('fc_one_daks')
->where('fc_one_status_id',$allStatusData->fc_one_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fc1_forms')->where('id',$allStatusData->fc_one_status_id)->value('fd_one_form_id');

 $form_one_data = DB::table('fd_one_forms')
 ->where('id',$formOneDataId)->first();


 $adminNamePrapok = DB::table('admins')
        ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

        $adminNamePrerok = DB::table('admins')
        ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','fcOne')->value('decision_list');
    ?>
<!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
    <td style="text-align:left;">
        উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফসি-১ </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fconemyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fconenothiModal')
        {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fcOne','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fcOne','id'=>$allStatusData->fc_one_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc1Form.show',$allStatusData->fc_one_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc1Form.show',$allStatusData->fc_one_status_id) }}';">দেখুন</button>
        @endif


        <button  type="button" class="btn-xs btn btn-primary"
        data-toggle="tooltip" data-placement="top"
        title="নথি জাত করুন"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#nothiJatModalFcOne{{ $allStatusData->id }}">
        <i class="icofont icofont-rotation"></i> নথি জাত করুন
        </button>

        @include('admin.post.nothiJatModalFcOne')


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfc1{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfc1{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

        <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->fc_one_status_id)->orderBy('id','desc')->first();







            ?>

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('fc_one_daks')
->where('fc_one_status_id',$allStatusData->fc_one_status_id)
->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফসি-১ </h5>
                            @if(!$dakDetail->main_file)

                            @else


                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                             @endif





                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                                                                               <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif



    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endif
@endforeach

    <!--fc one code end-->


    <!-- fc two code start -->


    @foreach($ngoStatusFcTwoDak as $p=>$allStatusData)
    @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

    @else
    <?php

                                                                     //new code
$orginalReceverId= DB::table('fc_two_daks')
->where('fc_two_status_id',$allStatusData->fc_two_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fc2_forms')->where('id',$allStatusData->fc_two_status_id)->value('fd_one_form_id');

 $form_one_data = DB::table('fd_one_forms')
 ->where('id',$formOneDataId)->first();


 $adminNamePrapok = DB::table('admins')
        ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

        $adminNamePrerok = DB::table('admins')
        ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','fcTwo')->value('decision_list');
    ?>
<!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
    <td style="text-align:left;">
        উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফসি-২ </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fctwomyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fctwonothiModal')


        {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fcTwo','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fcTwo','id'=>$allStatusData->fc_two_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc2Form.show',$allStatusData->fc_two_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc2Form.show',$allStatusData->fc_two_status_id) }}';">দেখুন</button>
        @endif


        <button  type="button" class="btn-xs btn btn-primary"
        data-toggle="tooltip" data-placement="top"
        title="নথি জাত করুন"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#nothiJatModalFcTwo{{ $allStatusData->id }}">
        <i class="icofont icofont-rotation"></i> নথি জাত করুন
        </button>

        @include('admin.post.nothiJatModalFcTwo')


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfc2{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfc2{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

        <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->fc_two_status_id)->orderBy('id','desc')->first();







            ?>

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('fc_two_daks')
->where('fc_two_status_id',$allStatusData->fc_two_status_id)
->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফসি-২ </h5>
                            @if(!$dakDetail->main_file)

                            @else


                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                             @endif





                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                                                                               <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif



    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endif
@endforeach

    <!--fc two code end-->

     <!-- fd three form start -->


     @foreach($ngoStatusFdThreeDak as $p=>$allStatusData)
     @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

     @else
     <?php

                                                                                                   //new code
$orginalReceverId= DB::table('fd_three_daks')
->where('fd_three_status_id',$allStatusData->fd_three_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd3_forms')->where('id',$allStatusData->fd_three_status_id)->value('fd_one_form_id');

  $form_one_data = DB::table('fd_one_forms')
  ->where('id',$formOneDataId)->first();


  $adminNamePrapok = DB::table('admins')
         ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

         $adminNamePrerok = DB::table('admins')
         ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','fdThree')->value('decision_list');
     ?>
 <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
     <td style="text-align:left;">
         উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
         প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
         মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
         বিষয়ঃ <b> এফডি - ৩ <br>
         সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span><br>
         তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
     </td>
     <td style="text-align:right;">

         @if($allStatusData->original_recipient == 1)

         <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdthreemyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdthreenothiModal')


         {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdThree','id'=>$allStatusData->fd_three_status_id]) }}';">প্রেরণ</button>
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd3Form.show',$allStatusData->fd_three_status_id) }}';">দেখুন</button>
         @else
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd3Form.show',$allStatusData->fd_three_status_id) }}';">দেখুন</button>
         @endif


         <button  type="button" class="btn-xs btn btn-primary"
         data-toggle="tooltip" data-placement="top"
         title="নথি জাত করুন"
         data-bs-toggle="modal"
         data-original-title="" data-bs-target="#nothiJatModalFdThree{{ $allStatusData->id }}">
         <i class="icofont icofont-rotation"></i> নথি জাত করুন
         </button>

         @include('admin.post.nothiJatModalFdThree')

              <!--new code-->
      <button type="button" class="btn btn-primary btn-xs"
      data-bs-toggle="modal"
      data-original-title="" data-bs-target="#myModalfd3{{ $p }}">
      ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd3{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel2">
             ডাক গতিবিধি</h4>
     </div>

     <div class="modal-body">

         <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->fd_three_status_id)->orderBy('id','desc')->first();







             ?>

             @if(!$dakDetail)

             @else

             <?php

$mainDetail = DB::table('fd_three_daks')
->where('fd_three_status_id',$allStatusData->fd_three_status_id)
->orderBy('id','asc')->get();

             ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

         <div class="d-flex mb-2">
             <div class="flex-shrink-0 tracking_img">

                 @if($key == 0)

                 @if(empty($senderImage))

                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                 @else

                 <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                 @else

                 @if(empty($receiverImage))
                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                 @else

                 <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                 @endif
             </div>
             <div class="flex-grow-1">
                 <div class="card" style="border:2px solid #979797">
                     <div class="card-body">
                         <div class="tracking_box">
                             <h5>বিষয়ঃ এফডি - ৩ </h5>
                             @if(!$dakDetail->main_file)

                             @else


                             <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                              @endif





                             <hr>
                             <ul>
                                 <li>প্রেরক : {{ $senderName }}</li>
                                 <li>প্রাপক : {{ $receiverName }}</li>
                             </ul>
                             <hr>
                                                                                <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         @endforeach

         @endif



     </div><!-- modal-content -->
 </div><!-- modal-dialog -->
</div><!-- modal -->
      <!--end new code -->
     </td>
 </tr>
 @endif
 @endforeach

      <!-- fd three form end -->

   <!-- duplicate certificate start -->

   @foreach($ngoStatusDuplicateCertificate as $p=>$allStatusData)
   @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

   @else
   <?php

                                                                                                 //new code
$orginalReceverId= DB::table('duplicate_certificate_daks')
->where('duplicate_certificate_id',$allStatusData->duplicate_certificate_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('document_for_duplicate_certificates')->where('id',$allStatusData->duplicate_certificate_id)->value('fd_one_form_id');

$form_one_data = DB::table('fd_one_forms')
->where('id',$formOneDataId)->first();


$adminNamePrapok = DB::table('admins')
       ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

       $adminNamePrerok = DB::table('admins')
       ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','duplicate')->value('decision_list');
   ?>
<!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
   <td style="text-align:left;">
       উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
       প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
       মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
       বিষয়ঃ <b> ডুপ্লিকেট সনদপত্রের আবেদন                                      {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
       সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
   </td>
   <td style="text-align:right;">

       @if($allStatusData->original_recipient == 1)

       <button type="button" class="btn-xs btn btn-primary"
                      data-toggle="tooltip" data-placement="top"
                      title="নথিতে উপস্থাপন করুন"
                      data-bs-toggle="modal"
                      data-original-title="" data-bs-target="#fdthreemyModalduplicate{{ $allStatusData->id }}">
                  <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
              </button>

              @include('admin.post.duplicateNothiModal')


       {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
       <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'duplicate','id'=>$allStatusData->duplicate_certificate_id]) }}';">প্রেরণ</button>
       <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('duplicateCertificate.show',$allStatusData->duplicate_certificate_id) }}';">দেখুন</button>
       @else
       <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('duplicateCertificate.show',$allStatusData->duplicate_certificate_id) }}';">দেখুন</button>
       @endif

       <button  type="button" class="btn-xs btn btn-primary"
       data-toggle="tooltip" data-placement="top"
       title="নথি জাত করুন"
       data-bs-toggle="modal"
       data-original-title="" data-bs-target="#nothiJatModalFdThreedup{{ $allStatusData->id }}">
       <i class="icofont icofont-rotation"></i> নথি জাত করুন
       </button>

       @include('admin.post.nothiJatModalDuplicateCertificate')
            <!--new code-->
    <button type="button" class="btn btn-primary btn-xs"
    data-bs-toggle="modal"
    data-original-title="" data-bs-target="#myModalfd3du{{ $p }}">
    ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd3du{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
   <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel2">
           ডাক গতিবিধি</h4>
   </div>

   <div class="modal-body">

       <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->duplicate_certificate_id)->orderBy('id','desc')->first();







           ?>

           @if(!$dakDetail)

           @else

           <?php

$mainDetail = DB::table('duplicate_certificate_daks')
->where('duplicate_certificate_id',$allStatusData->duplicate_certificate_id)
->orderBy('id','asc')->get();

           ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

       <div class="d-flex mb-2">
           <div class="flex-shrink-0 tracking_img">

               @if($key == 0)

               @if(empty($senderImage))

               <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
               @else

               <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
               @else

               @if(empty($receiverImage))
               <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

               @else

               <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

               @endif
           </div>
           <div class="flex-grow-1">
               <div class="card" style="border:2px solid #979797">
                   <div class="card-body">
                       <div class="tracking_box">
                           <h5>বিষয়ঃ ডুপ্লিকেট সনদপত্রের আবেদন  </h5>
                           @if(!$dakDetail->main_file)

                           @else


                           <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                            @endif





                           <hr>
                           <ul>
                               <li>প্রেরক : {{ $senderName }}</li>
                               <li>প্রাপক : {{ $receiverName }}</li>
                           </ul>
                           <hr>
                                                                              <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       @endforeach

       @endif



   </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
    <!--end new code -->
   </td>
</tr>
@endif
@endforeach

    <!-- duplicate certificate end -->


   <!-- constitution start -->

   @foreach($ngoStatusConstitution as $p=>$allStatusData)
   @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

   @else
   <?php

                                                                                                 //new code
$orginalReceverId= DB::table('constitution_daks')
->where('constitution_id',$allStatusData->constitution_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('document_for_amendment_or_approval_of_constitutions')
->where('id',$allStatusData->constitution_id)->value('fdId');

$form_one_data = DB::table('fd_one_forms')
->where('id',$formOneDataId)->first();


$adminNamePrapok = DB::table('admins')
       ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

       $adminNamePrerok = DB::table('admins')
       ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)->where('status','constitution')->value('decision_list');
   ?>
<!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
   <td style="text-align:left;">
       উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
       প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
       মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
       বিষয়ঃ <b> গঠনতন্ত্র পরিবর্তন/অনুমোদনের জন্য আবেদন                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
       সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
   </td>
   <td style="text-align:right;">

       @if($allStatusData->original_recipient == 1)

       <button type="button" class="btn-xs btn btn-primary"
                      data-toggle="tooltip" data-placement="top"
                      title="নথিতে উপস্থাপন করুন"
                      data-bs-toggle="modal"
                      data-original-title="" data-bs-target="#fdthreemyModalconstitution{{ $allStatusData->id }}">
                  <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
              </button>

              @include('admin.post.constitutionNothiModal')


       {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
       <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'constitution','id'=>$allStatusData->constitution_id]) }}';">প্রেরণ</button>
       <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('constitutionInfo.show',$allStatusData->constitution_id) }}';">দেখুন</button>
       @else
       <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('constitutionInfo.show',$allStatusData->constitution_id) }}';">দেখুন</button>
       @endif
       <button  type="button" class="btn-xs btn btn-primary"
       data-toggle="tooltip" data-placement="top"
       title="নথি জাত করুন"
       data-bs-toggle="modal"
       data-original-title="" data-bs-target="#nothiJatModalFdThreecons{{ $allStatusData->id }}">
       <i class="icofont icofont-rotation"></i> নথি জাত করুন
       </button>

       @include('admin.post.nothiJatModalConstitution')

            <!--new code-->
    <button type="button" class="btn btn-primary btn-xs"
    data-bs-toggle="modal"
    data-original-title="" data-bs-target="#myModalfd3ducon{{ $p }}">
    ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd3ducon{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
   <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel2">
           ডাক গতিবিধি</h4>
   </div>

   <div class="modal-body">

       <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->constitution_id)->orderBy('id','desc')->first();







           ?>

           @if(!$dakDetail)

           @else

           <?php

$mainDetail = DB::table('constitution_daks')
->where('constitution_id',$allStatusData->constitution_id)
->orderBy('id','asc')->get();

           ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

       <div class="d-flex mb-2">
           <div class="flex-shrink-0 tracking_img">

               @if($key == 0)

               @if(empty($senderImage))

               <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
               @else

               <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
               @else

               @if(empty($receiverImage))
               <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

               @else

               <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

               @endif
           </div>
           <div class="flex-grow-1">
               <div class="card" style="border:2px solid #979797">
                   <div class="card-body">
                       <div class="tracking_box">
                           <h5>বিষয়ঃ গঠনতন্ত্র পরিবর্তন/অনুমোদনের জন্য আবেদন  </h5>
                           @if(!$dakDetail->main_file)

                           @else


                           <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                            @endif





                           <hr>
                           <ul>
                               <li>প্রেরক : {{ $senderName }}</li>
                               <li>প্রাপক : {{ $receiverName }}</li>
                           </ul>
                           <hr>
                                                                              <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       @endforeach

       @endif



   </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
    <!--end new code -->
   </td>
</tr>
@endif
@endforeach

    <!-- constitution end -->



       <!-- executive committee start -->

       @foreach($ngoStatusExecutiveCommittee as $p=>$allStatusData)
       @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

       @else
       <?php

                                                                                                     //new code
  $orginalReceverId= DB::table('executive_committee_daks')
  ->where('executive_committee_id',$allStatusData->executive_committee_id)
  ->where('original_recipient',1)
  ->value('receiver_admin_id');

  $orginalReceverName= DB::table('admins')
  ->where('id',$orginalReceverId)
  ->value('admin_name_ban');

  //end new code

  $formOneDataId = DB::table('document_for_executive_committee_approvals')
  ->where('id',$allStatusData->executive_committee_id)->value('fdId');

    $form_one_data = DB::table('fd_one_forms')
    ->where('id',$formOneDataId)->first();


    $adminNamePrapok = DB::table('admins')
           ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

           $adminNamePrerok = DB::table('admins')
           ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


  $decesionName = DB::table('dak_details')
  ->where('id',$allStatusData->dak_detail_id)->where('status','committee')->value('decision_list');
       ?>
   <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
       <td style="text-align:left;">
           উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
           প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
           মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
           বিষয়ঃ <b> নির্বাহী কমিটি অনুমোদনের জন্য আবেদন                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
           সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
       </td>
       <td style="text-align:right;">

           @if($allStatusData->original_recipient == 1)

           <button type="button" class="btn-xs btn btn-primary"
                          data-toggle="tooltip" data-placement="top"
                          title="নথিতে উপস্থাপন করুন"
                          data-bs-toggle="modal"
                          data-original-title="" data-bs-target="#fdthreemyModalcommittee{{ $allStatusData->id }}">
                      <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                  </button>

                  @include('admin.post.committeeNothiModal')


           {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'committee','id'=>$allStatusData->executive_committee_id]) }}';">প্রেরণ</button>
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('executiveCommitteeInfo.show',$allStatusData->executive_committee_id) }}';">দেখুন</button>
           @else
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('executiveCommitteeInfo.show',$allStatusData->executive_committee_id) }}';">দেখুন</button>
           @endif

           <button  type="button" class="btn-xs btn btn-primary"
           data-toggle="tooltip" data-placement="top"
           title="নথি জাত করুন"
           data-bs-toggle="modal"
           data-original-title="" data-bs-target="#nothiJatModalExe{{ $allStatusData->id }}">
           <i class="icofont icofont-rotation"></i> নথি জাত করুন
           </button>

           @include('admin.post.nothiJatModalExeCutive')
                <!--new code-->
        <button type="button" class="btn btn-primary btn-xs"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#myModalfd3duconexe{{ $p }}">
        ডাক গতিবিধি
  </button>


  <!-- Modal -->
  <div class="modal right fade bd-example-modal-lg"
  id="myModalfd3duconexe{{ $p }}" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel2">
               ডাক গতিবিধি</h4>
       </div>

       <div class="modal-body">

           <?php

  $dakDetail = DB::table('dak_details')
  ->where('access_id',$allStatusData->executive_committee_id)->orderBy('id','desc')->first();







               ?>

               @if(!$dakDetail)

               @else

               <?php

  $mainDetail = DB::table('executive_committee_daks')
  ->where('executive_committee_id',$allStatusData->executive_committee_id)
->orderBy('id','asc')->get();

               ?>

  @foreach($mainDetail as  $key=>$allMainDetail)


  <?php



  $senderName = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $senderImage = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiName = DB::table('designation_lists')
  ->where('id',$desiId)->value('designation_name');


  $branchName = DB::table('branches')
  ->where('id',$branchId)->value('branch_name');


  //receiver

  $receiverName = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $receiverImage = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiNames = DB::table('designation_lists')
  ->where('id',$desiIds)->value('designation_name');


  $branchNames = DB::table('branches')
  ->where('id',$branchIds)->value('branch_name');



  ?>

           <div class="d-flex mb-2">
               <div class="flex-shrink-0 tracking_img">

                   @if($key == 0)

                   @if(empty($senderImage))

                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif
                   @else

                   @if(empty($receiverImage))
                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif

                   @endif
               </div>
               <div class="flex-grow-1">
                   <div class="card" style="border:2px solid #979797">
                       <div class="card-body">
                           <div class="tracking_box">
                               <h5>বিষয়ঃ নির্বাহী কমিটি অনুমোদনের জন্য আবেদন  </h5>
                               @if(!$dakDetail->main_file)

                               @else


                               <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                @endif





                               <hr>
                               <ul>
                                   <li>প্রেরক : {{ $senderName }}</li>
                                   <li>প্রাপক : {{ $receiverName }}</li>
                               </ul>
                               <hr>
                                                                                  <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           @endforeach

           @endif



       </div><!-- modal-content -->
   </div><!-- modal-dialog -->
  </div><!-- modal -->
        <!--end new code -->
       </td>
   </tr>
   @endif
   @endforeach

    <!-- executive committee end -->

    <!-- fd five form start -->

    @foreach($ngoStatusFdFive as $p=>$allStatusData)
       @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

       @else
       <?php

                                                                                                     //new code
  $orginalReceverId= DB::table('fd_five_daks')
  ->where('fd_five_status_id',$allStatusData->fd_five_status_id)
  ->where('original_recipient',1)
  ->value('receiver_admin_id');

  $orginalReceverName= DB::table('admins')
  ->where('id',$orginalReceverId)
  ->value('admin_name_ban');

  //end new code

  $formOneDataId = DB::table('fd_five_forms')
  ->where('id',$allStatusData->fd_five_status_id)->value('fdId');

    $form_one_data = DB::table('fd_one_forms')
    ->where('id',$formOneDataId)->first();


    $adminNamePrapok = DB::table('admins')
           ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

           $adminNamePrerok = DB::table('admins')
           ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


  $decesionName = DB::table('dak_details')
  ->where('id',$allStatusData->dak_detail_id)
  ->where('status','fdFive')->value('decision_list');
       ?>
   <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
       <td style="text-align:left;">
           উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
           প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
           মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
           বিষয়ঃ <b> বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
           সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
       </td>
       <td style="text-align:right;">

           @if($allStatusData->original_recipient == 1)

           <button type="button" class="btn-xs btn btn-primary"
                          data-toggle="tooltip" data-placement="top"
                          title="নথিতে উপস্থাপন করুন"
                          data-bs-toggle="modal"
                          data-original-title="" data-bs-target="#fdthreemyModalfdfive{{ $allStatusData->id }}">
                      <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                  </button>

                  @include('admin.post.fdfiveNothiModal')


           {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdFive','id'=>$allStatusData->fd_five_status_id]) }}';">প্রেরণ</button>
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd5Form.show',$allStatusData->fd_five_status_id) }}';">দেখুন</button>
           @else
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd5Form.show',$allStatusData->fd_five_status_id) }}';">দেখুন</button>
           @endif

           <button  type="button" class="btn-xs btn btn-primary"
           data-toggle="tooltip" data-placement="top"
           title="নথি জাত করুন"
           data-bs-toggle="modal"
           data-original-title="" data-bs-target="#nothiJatModalfdFive{{ $allStatusData->id }}">
           <i class="icofont icofont-rotation"></i> নথি জাত করুন
           </button>

           @include('admin.post.nothiJatModalfdFive')
                <!--new code-->
        <button type="button" class="btn btn-primary btn-xs"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#myModalfd5Form{{ $p }}">
        ডাক গতিবিধি
  </button>


  <!-- Modal -->
  <div class="modal right fade bd-example-modal-lg"
  id="myModalfd5Form{{ $p }}" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel2">
               ডাক গতিবিধি</h4>
       </div>

       <div class="modal-body">

           <?php

  $dakDetail = DB::table('dak_details')
  ->where('access_id',$allStatusData->fd_five_status_id)
  ->orderBy('id','desc')->first();







               ?>

               @if(!$dakDetail)

               @else

               <?php

  $mainDetail = DB::table('fd_five_daks')
  ->where('fd_five_status_id',$allStatusData->fd_five_status_id)
->orderBy('id','asc')->get();

               ?>

  @foreach($mainDetail as  $key=>$allMainDetail)


  <?php



  $senderName = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $senderImage = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiName = DB::table('designation_lists')
  ->where('id',$desiId)->value('designation_name');


  $branchName = DB::table('branches')
  ->where('id',$branchId)->value('branch_name');


  //receiver

  $receiverName = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $receiverImage = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiNames = DB::table('designation_lists')
  ->where('id',$desiIds)->value('designation_name');


  $branchNames = DB::table('branches')
  ->where('id',$branchIds)->value('branch_name');



  ?>

           <div class="d-flex mb-2">
               <div class="flex-shrink-0 tracking_img">

                   @if($key == 0)

                   @if(empty($senderImage))

                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif
                   @else

                   @if(empty($receiverImage))
                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif

                   @endif
               </div>
               <div class="flex-grow-1">
                   <div class="card" style="border:2px solid #979797">
                       <div class="card-body">
                           <div class="tracking_box">
                               <h5>বিষয়ঃ বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম  </h5>
                               @if(!$dakDetail->main_file)

                               @else


                               <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                @endif





                               <hr>
                               <ul>
                                   <li>প্রেরক : {{ $senderName }}</li>
                                   <li>প্রাপক : {{ $receiverName }}</li>
                               </ul>
                               <hr>
                                                                                  <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           @endforeach

           @endif



       </div><!-- modal-content -->
   </div><!-- modal-dialog -->
  </div><!-- modal -->
        <!--end new code -->
       </td>
   </tr>
   @endif
   @endforeach

    <!-- executive committee end -->

    <!-- fd five form end -->

    <!-- form no five start --->


    @foreach($ngoStatusFormNoFive as $p=>$allStatusData)
       @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

       @else
       <?php

                                                                                                     //new code
  $orginalReceverId= DB::table('form_no_five_daks')
  ->where('form_no_five_status_id',$allStatusData->form_no_five_status_id)
  ->where('original_recipient',1)
  ->value('receiver_admin_id');

  $orginalReceverName= DB::table('admins')
  ->where('id',$orginalReceverId)
  ->value('admin_name_ban');

  //end new code

  $formOneDataId = DB::table('form_no_fives')
  ->where('id',$allStatusData->form_no_five_status_id)->value('fd_one_form_id');

    $form_one_data = DB::table('fd_one_forms')
    ->where('id',$formOneDataId)->first();


    $adminNamePrapok = DB::table('admins')
           ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

           $adminNamePrerok = DB::table('admins')
           ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


  $decesionName = DB::table('dak_details')
  ->where('id',$allStatusData->dak_detail_id)
  ->where('status','formNoFive')->value('decision_list');
       ?>
   <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
       <td style="text-align:left;">
           উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
           প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
           মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
           বিষয়ঃ <b> বার্ষিক প্রতিবেদন                                    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
           সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
       </td>
       <td style="text-align:right;">

           @if($allStatusData->original_recipient == 1)

           <button type="button" class="btn-xs btn btn-primary"
                          data-toggle="tooltip" data-placement="top"
                          title="নথিতে উপস্থাপন করুন"
                          data-bs-toggle="modal"
                          data-original-title="" data-bs-target="#fdthreemyModalFormNoFive{{ $allStatusData->id }}">
                      <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                  </button>

                  @include('admin.post.formNoFiveNothiModal')


           {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'formNoFive','id'=>$allStatusData->form_no_five_status_id]) }}';">প্রেরণ</button>
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('formNoFive.show',$allStatusData->form_no_five_status_id) }}';">দেখুন</button>
           @else
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('formNoFive.show',$allStatusData->form_no_five_status_id) }}';">দেখুন</button>
           @endif

           <button  type="button" class="btn-xs btn btn-primary"
           data-toggle="tooltip" data-placement="top"
           title="নথি জাত করুন"
           data-bs-toggle="modal"
           data-original-title="" data-bs-target="#nothiJatModalformNoFive{{ $allStatusData->id }}">
           <i class="icofont icofont-rotation"></i> নথি জাত করুন
           </button>

           @include('admin.post.nothiJatModalformNoFive')
                <!--new code-->
        <button type="button" class="btn btn-primary btn-xs"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#myModalformNoFiveForm{{ $p }}">
        ডাক গতিবিধি
  </button>


  <!-- Modal -->
  <div class="modal right fade bd-example-modal-lg"
  id="myModalformNoFiveForm{{ $p }}" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel2">
               ডাক গতিবিধি</h4>
       </div>

       <div class="modal-body">

           <?php

  $dakDetail = DB::table('dak_details')
  ->where('access_id',$allStatusData->form_no_five_status_id)
  ->orderBy('id','desc')->first();







               ?>

               @if(!$dakDetail)

               @else

               <?php

  $mainDetail = DB::table('form_no_five_daks')
  ->where('form_no_five_status_id',$allStatusData->form_no_five_status_id)
->orderBy('id','asc')->get();

               ?>

  @foreach($mainDetail as  $key=>$allMainDetail)


  <?php



  $senderName = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $senderImage = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiName = DB::table('designation_lists')
  ->where('id',$desiId)->value('designation_name');


  $branchName = DB::table('branches')
  ->where('id',$branchId)->value('branch_name');


  //receiver

  $receiverName = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $receiverImage = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiNames = DB::table('designation_lists')
  ->where('id',$desiIds)->value('designation_name');


  $branchNames = DB::table('branches')
  ->where('id',$branchIds)->value('branch_name');



  ?>

           <div class="d-flex mb-2">
               <div class="flex-shrink-0 tracking_img">

                   @if($key == 0)

                   @if(empty($senderImage))

                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif
                   @else

                   @if(empty($receiverImage))
                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif

                   @endif
               </div>
               <div class="flex-grow-1">
                   <div class="card" style="border:2px solid #979797">
                       <div class="card-body">
                           <div class="tracking_box">
                               <h5>বিষয়ঃ বার্ষিক প্রতিবেদন  </h5>
                               @if(!$dakDetail->main_file)

                               @else


                               <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                @endif





                               <hr>
                               <ul>
                                   <li>প্রেরক : {{ $senderName }}</li>
                                   <li>প্রাপক : {{ $receiverName }}</li>
                               </ul>
                               <hr>
                                                                                  <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           @endforeach

           @endif



       </div><!-- modal-content -->
   </div><!-- modal-dialog -->
  </div><!-- modal -->
        <!--end new code -->
       </td>
   </tr>
   @endif
   @endforeach

    <!-- form no five end -->

    <!-- form no seven start --->

    @foreach($ngoStatusFormNoSeven as $p=>$allStatusData)
       @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

       @else
       <?php

                                                                                                     //new code
  $orginalReceverId= DB::table('form_no_seven_daks')
  ->where('form_no_seven_status_id',$allStatusData->form_no_seven_status_id)
  ->where('original_recipient',1)
  ->value('receiver_admin_id');

  $orginalReceverName= DB::table('admins')
  ->where('id',$orginalReceverId)
  ->value('admin_name_ban');

  //end new code

  $formOneDataId = DB::table('form_no_sevens')
  ->where('id',$allStatusData->form_no_seven_status_id)->value('fd_one_form_id');

    $form_one_data = DB::table('fd_one_forms')
    ->where('id',$formOneDataId)->first();


    $adminNamePrapok = DB::table('admins')
           ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

           $adminNamePrerok = DB::table('admins')
           ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


  $decesionName = DB::table('dak_details')
  ->where('id',$allStatusData->dak_detail_id)
  ->where('status','formNoSeven')->value('decision_list');
       ?>
   <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
       <td style="text-align:left;">
           উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
           প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
           মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
           বিষয়ঃ <b> প্রকল্পের প্রত্যয়ন পত্র                                    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
           সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
       </td>
       <td style="text-align:right;">

           @if($allStatusData->original_recipient == 1)

           <button type="button" class="btn-xs btn btn-primary"
                          data-toggle="tooltip" data-placement="top"
                          title="নথিতে উপস্থাপন করুন"
                          data-bs-toggle="modal"
                          data-original-title="" data-bs-target="#fdthreemyModalFormNoSeven{{ $allStatusData->id }}">
                      <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                  </button>

                  @include('admin.post.formNoSevenNothiModal')


           {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'formNoSeven','id'=>$allStatusData->form_no_seven_status_id]) }}';">প্রেরণ</button>
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('formNoSeven.show',$allStatusData->form_no_seven_status_id) }}';">দেখুন</button>
           @else
           <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('formNoSeven.show',$allStatusData->form_no_seven_status_id) }}';">দেখুন</button>
           @endif

           <button  type="button" class="btn-xs btn btn-primary"
           data-toggle="tooltip" data-placement="top"
           title="নথি জাত করুন"
           data-bs-toggle="modal"
           data-original-title="" data-bs-target="#nothiJatModalformNoSeven{{ $allStatusData->id }}">
           <i class="icofont icofont-rotation"></i> নথি জাত করুন
           </button>

           @include('admin.post.nothiJatModalformNoSeven')
                <!--new code-->
        <button type="button" class="btn btn-primary btn-xs"
        data-bs-toggle="modal"
        data-original-title="" data-bs-target="#myModalformNoSevenForm{{ $p }}">
        ডাক গতিবিধি
  </button>


  <!-- Modal -->
  <div class="modal right fade bd-example-modal-lg"
  id="myModalformNoSevenForm{{ $p }}" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel2">
               ডাক গতিবিধি</h4>
       </div>

       <div class="modal-body">

           <?php

  $dakDetail = DB::table('dak_details')
  ->where('access_id',$allStatusData->form_no_seven_status_id)
  ->orderBy('id','desc')->first();







               ?>

               @if(!$dakDetail)

               @else

               <?php

  $mainDetail = DB::table('form_no_seven_daks')
  ->where('form_no_seven_status_id',$allStatusData->form_no_seven_status_id)
->orderBy('id','asc')->get();

               ?>

  @foreach($mainDetail as  $key=>$allMainDetail)


  <?php



  $senderName = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $senderImage = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchId = DB::table('admins')
  ->where('id',$allMainDetail->sender_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiName = DB::table('designation_lists')
  ->where('id',$desiId)->value('designation_name');


  $branchName = DB::table('branches')
  ->where('id',$branchId)->value('branch_name');


  //receiver

  $receiverName = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_name_ban');


  $receiverImage = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('admin_image');


  $desiIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('designation_list_id');


  $branchIds = DB::table('admins')
  ->where('id',$allMainDetail->receiver_admin_id)
  ->orderBy('id','desc')->value('branch_id');


  $desiNames = DB::table('designation_lists')
  ->where('id',$desiIds)->value('designation_name');


  $branchNames = DB::table('branches')
  ->where('id',$branchIds)->value('branch_name');



  ?>

           <div class="d-flex mb-2">
               <div class="flex-shrink-0 tracking_img">

                   @if($key == 0)

                   @if(empty($senderImage))

                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif
                   @else

                   @if(empty($receiverImage))
                   <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                   @else

                   <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
  @endif

                   @endif
               </div>
               <div class="flex-grow-1">
                   <div class="card" style="border:2px solid #979797">
                       <div class="card-body">
                           <div class="tracking_box">
                               <h5>বিষয়ঃ প্রকল্পের প্রত্যয়ন পত্র  </h5>
                               @if(!$dakDetail->main_file)

                               @else


                               <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                @endif





                               <hr>
                               <ul>
                                   <li>প্রেরক : {{ $senderName }}</li>
                                   <li>প্রাপক : {{ $receiverName }}</li>
                               </ul>
                               <hr>
                                                                                  <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           @endforeach

           @endif



       </div><!-- modal-content -->
   </div><!-- modal-dialog -->
  </div><!-- modal -->
        <!--end new code -->
       </td>
   </tr>
   @endif
   @endforeach

    <!-- form no seven end --->

     <!-- start form no four --->


     @foreach($ngoStatusFormNoFour as $p=>$allStatusData)
     @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

     @else
     <?php

                                                                                                   //new code
$orginalReceverId= DB::table('form_no_four_daks')
->where('form_no_four_status_id',$allStatusData->form_no_four_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('form_no_fours')
->where('id',$allStatusData->form_no_four_status_id)->value('fd_one_form_id');

  $form_one_data = DB::table('fd_one_forms')
  ->where('id',$formOneDataId)->first();


  $adminNamePrapok = DB::table('admins')
         ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

         $adminNamePrerok = DB::table('admins')
         ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)
->where('status','formNoFour')->value('decision_list');
     ?>
 <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
     <td style="text-align:left;">
         উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
         প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
         মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
         বিষয়ঃ <b> মাসিক অগ্রগতি প্রতিবেদন                                   {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
         সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
     </td>
     <td style="text-align:right;">

         @if($allStatusData->original_recipient == 1)

         {{-- <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdthreemyModalFormNoFour{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button> --}}

                @include('admin.post.formNoFourNothiModal')


         {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'formNoFour','id'=>$allStatusData->form_no_four_status_id]) }}';">প্রেরণ</button>
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('formNoFour.show',$allStatusData->form_no_four_status_id) }}';">দেখুন</button>
         @else
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('formNoFour.show',$allStatusData->form_no_four_status_id) }}';">দেখুন</button>
         @endif

         <button  type="button" class="btn-xs btn btn-primary"
         data-toggle="tooltip" data-placement="top"
         title="নথি জাত করুন"
         data-bs-toggle="modal"
         data-original-title="" data-bs-target="#nothiJatModalformNoFour{{ $allStatusData->id }}">
         <i class="icofont icofont-rotation"></i> নথি জাত করুন
         </button>

         @include('admin.post.nothiJatModalformNoFour')
              <!--new code-->
      <button type="button" class="btn btn-primary btn-xs"
      data-bs-toggle="modal"
      data-original-title="" data-bs-target="#myModalformNoFourForm{{ $p }}">
      ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalformNoFourForm{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel2">
             ডাক গতিবিধি</h4>
     </div>

     <div class="modal-body">

         <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->form_no_four_status_id)
->orderBy('id','desc')->first();







             ?>

             @if(!$dakDetail)

             @else

             <?php

$mainDetail = DB::table('form_no_four_daks')
->where('form_no_four_status_id',$allStatusData->form_no_four_status_id)
->orderBy('id','asc')->get();

             ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

         <div class="d-flex mb-2">
             <div class="flex-shrink-0 tracking_img">

                 @if($key == 0)

                 @if(empty($senderImage))

                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                 @else

                 <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                 @else

                 @if(empty($receiverImage))
                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                 @else

                 <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                 @endif
             </div>
             <div class="flex-grow-1">
                 <div class="card" style="border:2px solid #979797">
                     <div class="card-body">
                         <div class="tracking_box">
                             <h5>বিষয়ঃ মাসিক অগ্রগতি প্রতিবেদন  </h5>
                             @if(!$dakDetail->main_file)

                             @else


                             <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                              @endif





                             <hr>
                             <ul>
                                 <li>প্রেরক : {{ $senderName }}</li>
                                 <li>প্রাপক : {{ $receiverName }}</li>
                             </ul>
                             <hr>
                                                                                <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         @endforeach

         @endif



     </div><!-- modal-content -->
 </div><!-- modal-dialog -->
</div><!-- modal -->
      <!--end new code -->
     </td>
 </tr>
 @endif
 @endforeach


    <!-- end form no four --->

     <!-- start form fd four one--->

     @foreach($ngoStatusFdFourOne as $p=>$allStatusData)
     @if($allStatusData->nothi_jat_status == 1 || $allStatusData->present_status == 1)

     @else
     <?php

                                                                                                   //new code
$orginalReceverId= DB::table('fd4_one_form_daks')
->where('fd4_one_form_status_id',$allStatusData->fd4_one_form_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd_four_one_forms')
->where('id',$allStatusData->fd4_one_form_status_id)->value('fd_one_form_id');

  $form_one_data = DB::table('fd_one_forms')
  ->where('id',$formOneDataId)->first();


  $adminNamePrapok = DB::table('admins')
         ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

         $adminNamePrerok = DB::table('admins')
         ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


$decesionName = DB::table('dak_details')
->where('id',$allStatusData->dak_detail_id)
->where('status','formNoFour')->value('decision_list');
     ?>
 <!-- red background start --->

@if(empty($allStatusData->check_status) && ($allStatusData->file_last_check_date < date('Y-m-d')))
<tr style="">
@else
<tr>
@endif
<!-- red background end -->
     <td style="text-align:left;">
         উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
         প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
         মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
         বিষয়ঃ <b> সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন                                   {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
         সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
     </td>
     <td style="text-align:right;">

         @if($allStatusData->original_recipient == 1)

         {{-- <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdthreemyModalFormNofdFour{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button> --}}

                @include('admin.post.formNofdFourNothiModal')


         {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdThree','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdFourOneForm','id'=>$allStatusData->fd4_one_form_status_id]) }}';">প্রেরণ</button>
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd4OneForm.show',$allStatusData->fd4_one_form_status_id) }}';">দেখুন</button>
         @else
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd4OneForm.show',$allStatusData->fd4_one_form_status_id) }}';">দেখুন</button>
         @endif

         <button  type="button" class="btn-xs btn btn-primary"
         data-toggle="tooltip" data-placement="top"
         title="নথি জাত করুন"
         data-bs-toggle="modal"
         data-original-title="" data-bs-target="#nothiJatModalformNofdFour{{ $allStatusData->id }}">
         <i class="icofont icofont-rotation"></i> নথি জাত করুন
         </button>

         @include('admin.post.nothiJatModalformFdFourOne')
              <!--new code-->
      <button type="button" class="btn btn-primary btn-xs"
      data-bs-toggle="modal"
      data-original-title="" data-bs-target="#myModalformNofdFourForm{{ $p }}">
      ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalformNofdFourForm{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel2">
             ডাক গতিবিধি</h4>
     </div>

     <div class="modal-body">

         <?php

$dakDetail = DB::table('dak_details')
->where('access_id',$allStatusData->fd4_one_form_status_id)
->orderBy('id','desc')->first();







             ?>

             @if(!$dakDetail)

             @else

             <?php

$mainDetail = DB::table('fd4_one_form_daks')
->where('fd4_one_form_status_id',$allStatusData->fd4_one_form_status_id)
->orderBy('id','asc')->get();

             ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

         <div class="d-flex mb-2">
             <div class="flex-shrink-0 tracking_img">

                 @if($key == 0)

                 @if(empty($senderImage))

                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                 @else

                 <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                 @else

                 @if(empty($receiverImage))
                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                 @else

                 <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif

                 @endif
             </div>
             <div class="flex-grow-1">
                 <div class="card" style="border:2px solid #979797">
                     <div class="card-body">
                         <div class="tracking_box">
                             <h5>বিষয়ঃ সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন  </h5>
                             @if(!$dakDetail->main_file)

                             @else


                             <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                              @endif





                             <hr>
                             <ul>
                                 <li>প্রেরক : {{ $senderName }}</li>
                                 <li>প্রাপক : {{ $receiverName }}</li>
                             </ul>
                             <hr>
                                                                                <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y h:i:s', strtotime(\Carbon\Carbon::parse($allMainDetail->created_at)))).' '.$allMainDetail->amPmValue }}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         @endforeach

         @endif



     </div><!-- modal-content -->
 </div><!-- modal-dialog -->
</div><!-- modal -->
      <!--end new code -->
     </td>
 </tr>
 @endif
 @endforeach

    <!-- end form no fd four one --->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
