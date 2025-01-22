<?php
    $ngoStatusDuplicateCertificate =DB::table('duplicate_certificate_daks')->where('status',1)
    ->where('duplicate_certificate_id',$allStatusData->id)
    ->where('receiver_admin_id',Auth::guard('admin')->user()->id)
    ->latest()->get();



?>
    <!-- fd three form start -->


    @foreach($ngoStatusDuplicateCertificate as $p=>$allStatusData)

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
<tr>
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
@endforeach

     <!-- fd three form end -->
