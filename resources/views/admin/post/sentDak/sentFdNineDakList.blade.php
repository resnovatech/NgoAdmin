@foreach($ngoStatusFDNineDak as $m=>$allStatusData)

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
    মূল - প্রাপক: {{ $orginalReceverName }}</span>  <br>
    বিষয়ঃ <b> এফডি৯ (এন-ভিসা)   </b>  <br>
    সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
    তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
</td>
<td style="text-align:right;">





    {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('presentDocument',['status'=>'fdNine','id'=>$allStatusData->id]) }}';">নথিতে উপস্থাপন করুন</button> --}}
    {{-- <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdNine','id'=>$allStatusData->f_d_nine_status_id]) }}';">প্রেরণ</button> --}}
    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9Form.show',$allStatusData->f_d_nine_status_id) }}';">দেখুন</button>



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
                        <h5>বিষয়ঃ এফডি৯ (এন-ভিসা)   </h5>
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
@endforeach
