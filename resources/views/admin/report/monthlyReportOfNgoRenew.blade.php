@extends('admin.master.master')

@section('title')
এনজিও'র  নিবন্ধন নবায়নের মাসিক রিপোর্ট | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>এনজিও'র  নিবন্ধন নবায়নের মাসিক রিপোর্ট</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">রিপোর্ট</li>
                    <li class="breadcrumb-item">এনজিও'র  নিবন্ধন নবায়নের মাসিক রিপোর্ট</li>
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid list-products">

        <div class="card">

            <div class="card-body">

<form method="get" action="{{ route('monthlyReportOfNgoRenewSearch') }}" id="form">
                <div class="row">

                    <div class="col-sm-3">
                    <label>হইতে</label>
                        <select class="form-control" name="from_month_name" required>
                            <option value="">-- মাস নির্বাচন করুন --</option>
                            <option value="01" {{ date('m') == '01' ? 'selected':''}}>জানুয়ারী</option>
                            <option value="02" {{ date('m') == '02' ? 'selected':''}}>ফেব্রুয়ারি</option>
                            <option value="03" {{ date('m') == '03' ? 'selected':''}}>মার্চ</option>
                            <option value="04" {{ date('m') == '04' ? 'selected':''}}>এপ্রিল</option>
                            <option value="05" {{ date('m') == '05' ? 'selected':''}}>মে</option>
                            <option value="06" {{ date('m') == '06' ? 'selected':''}}>জুন</option>
                            <option value="07" {{ date('m') == '07' ? 'selected':''}}>জুলাই</option>
                            <option value="08" {{ date('m') == '08' ? 'selected':''}}>আগস্ট</option>
                            <option value="09" {{ date('m') == '09' ? 'selected':''}}>সেপ্টেম্বর</option>
                            <option value="10" {{ date('m') == '10' ? 'selected':''}}>অক্টোবর</option>
                            <option value="11" {{ date('m') == '11' ? 'selected':''}}>নভেম্বর</option>
                            <option value="12" {{ date('m') == '12' ? 'selected':''}}>ডিসেম্বর</option>
                        </select>

                    </div>


                    <div class="col-sm-3">
                        <label>পর্যন্ত</label>
                        <select class="form-control" name="to_month_name">
                            <option value="">-- মাস নির্বাচন করুন --</option>
                            <option value="01" >জানুয়ারী</option>
                            <option value="02" >ফেব্রুয়ারি</option>
                            <option value="03" >মার্চ</option>
                            <option value="04" >এপ্রিল</option>
                            <option value="05" >মে</option>
                            <option value="06" >জুন</option>
                            <option value="07" >জুলাই</option>
                            <option value="08" >আগস্ট</option>
                            <option value="09" >সেপ্টেম্বর</option>
                            <option value="10" >অক্টোবর</option>
                            <option value="11" >নভেম্বর</option>
                            <option value="12" >ডিসেম্বর</option>
                        </select>

                    </div>


                    <div class="col-sm-3">
                        <label>বছর</label>
                        <select class="form-control" name="year_name" required>
                            <option value="">-- বছর নির্বাচন করুন --</option>
                            <option value="2020" {{ date('Y') == '2020' ? 'selected':''}}>২০২০</option>
                            <option value="2021" {{ date('Y') == '2021' ? 'selected':''}}>২০২১</option>
                            <option value="2022" {{ date('Y') == '2022' ? 'selected':''}}>২০২২</option>
                            <option value="2023" {{ date('Y') == '2023' ? 'selected':''}}>২০২৩</option>
                            <option value="2024" {{ date('Y') == '2024' ? 'selected':''}}>২০২৪</option>
                            <option value="2025" {{ date('Y') == '2025' ? 'selected':''}}>২০২৫</option>
                            <option value="2026" {{ date('Y') == '2026' ? 'selected':''}}>২০২৬</option>
                            <option value="2027" {{ date('Y') == '2027' ? 'selected':''}}>২০২৭</option>
                            <option value="2028" {{ date('Y') == '2028' ? 'selected':''}}>২০২৮</option>
                            <option value="2029" {{ date('Y') == '2029' ? 'selected':''}}>২০২৯</option>
                            <option value="2030" {{ date('Y') == '2030' ? 'selected':''}}>২০৩০</option>
                        </select>
                    </div>


                    <div class="col-sm-3">
                        <label>এনজিও'র  ধরন</label>
                        <select class="form-control" name="ngo_type" required>
                            <option value="">-- নির্বাচন করুন --</option>
                            <option value="সকল" selected>সকল</option>
                            <option value="দেশি">দেশি</option>
                            <option value="বিদেশী">বিদেশী</option>
                        </select>
                    </div>


                    <div class="col-sm-12 mt-3">
                        <div class="text-end">
                        <button type="submit" class="btn btn-primary">অনুসন্ধান করুন</button>
                    </div>
                    </div>

                </div>
</form>

            </div>

        </div>


</div>
<!-- Container-fluid starts-->
<div class="container-fluid list-products">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->

        <div class="col-sm-12">

        </div>

        <div class="col-sm-12"  >
            <div class="card">

                <div class="card-body">


                      <!-- new print button-->
                <a href="{{ route('monthlyReportOfNgoRenewPrint') }}" class="btn btn-primary waves-effect  btn-sm waves-light" type="button" >
                    <i class="far fa-calendar-plus  mr-2"></i> প্রিন্ট করুন
                </a>
                <!-- end new print button -->

                    <div class="table-responsive product-table mt-3" >

                        <table  id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>ক্র: নং:</th>
                                <th>নিবন্ধন নম্বর</th>
                                <th>এনজিওর নাম ও ঠিকানা</th>
                                <th>দেশ</th>
                                <th>নিবন্ধনের তারিখ</th>
                                <th>নিবন্ধন/নবায়নের মেয়াদ</th>
                                <th>এনজিওর অবস্থা</th>
                            </tr>
                            </thead>
                            <tbody id="searchTable">

                                <?php  $i = 1; ?>

                                @foreach($monthlyReportOfNgo as $allFdOneDatas)

                                <?php

                                $ngoAllDataFirst = DB::table('ngo_type_and_languages')
                                                             ->where('user_id',$allFdOneDatas->user_id)
                                                             ->first();



                                $ngoOldNew = DB::table('ngo_type_and_languages')
                                                             ->where('user_id',$allFdOneDatas->user_id)
                                                             ->value('ngo_type_new_old');

                                                             $getngoForLanguageNewO = DB::table('ngo_type_and_languages')
                                                             ->where('user_id',$allFdOneDatas->user_id)->value('registration');

                                ?>
                                @if($ngoOldNew == 'Old')


                                    <?php
                                $mainCheckAll = DB::table('ngo_renews')
                                                             ->where('fd_one_form_id',$allFdOneDatas->id)
                                                             ->value('status');


                                ?>


                                @else
                                <?php
                                $mainCheckAll = DB::table('ngo_statuses')
                                                             ->where('fd_one_form_id',$allFdOneDatas->id)
                                                             ->value('status');

                                ?>

                                @endif



                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>
                                        @if($ngoOldNew == 'Old')
                                        #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($getngoForLanguageNewO) }}
                                        @else

                                    @if($allFdOneDatas->registration_number == 0)

                                        #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($allFdOneDatas->registration_number_given_by_admin) }}
                                        @else
                                        #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($allFdOneDatas->registration_number) }}
                                        @endif
                                @endif

                                    </td>




                                    <td><h6>
                                         {{ $allFdOneDatas->organization_name_ban  }}<br>

                                    </h6><span>ঠিকানা: {{ $allFdOneDatas->organization_address }}</td>


                                          <td>
                                            <?php


                                            $districtName = DB::table('countries')
                                            ->where('id',$allFdOneDatas->district_id)
                                            ->value('country_name_bangla');
                                ?>






                            <span class="badge badge-primary text-light" style="font-size:12px;" > {{ $allFdOneDatas->country_of_origin }}</span>
                                        </td>
                                        @if($ngoOldNew == 'Old')

                                        <td>

                                            @if(!$ngoAllDataFirst)

                                            @else

                                               {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoAllDataFirst->ngo_registration_date))); }}

                                             @endif

                                        </td>
                                        <td>
                                            @if(!$ngoAllDataFirst)

                                            @else

                                            {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoAllDataFirst->last_renew_date))); }}

                                             @endif

                                        </td>
                                        @else
                            <td>

                                <?php


                                $durationSituation = DB::table('ngo_durations')
                                ->where('fd_one_form_id',$allFdOneDatas->id)
                                ->first();
                    ?>

                             @if(!$durationSituation)
                             <span class="badge badge-warning text-dark" style="font-size:12px;" >  অনুরোধ প্রক্রিয়াধীন </span>
                             @else

                                {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($durationSituation->ngo_duration_start_date))); }}

                            @endif


                            </td>
                            <td>

                                @if(!$durationSituation)
                             <span class="badge badge-warning text-dark" style="font-size:12px;" >  অনুরোধ প্রক্রিয়াধীন </span>
                             @else

                                {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($durationSituation->ngo_duration_end_date))); }}

                            @endif


                            </td>
                            @endif

                            @if($ngoOldNew == 'Old')

                            <td>
                                @if(\Carbon\Carbon::parse($ngoAllDataFirst->last_renew_date) <= \Carbon\Carbon::now())

                                <span class="badge badge-danger text-light" style="font-size:12px;" > নিষ্ক্রিয় </span>
                                                                @else

                                                                <span class="badge badge-success text-light" style="font-size:12px;" >  সক্রিয়</span>
                                                                @endif


                            </td>

                            @else

                             <td>


                                @if(!$durationSituation)
                                <span class="badge badge-warning text-dark" style="font-size:12px;" >  অনুরোধ প্রক্রিয়াধীন </span>
                                @else




                                @if(\Carbon\Carbon::parse($durationSituation->ngo_duration_end_date) <= \Carbon\Carbon::now())

                                <span class="badge badge-danger text-light" style="font-size:12px;" > নিষ্ক্রিয় </span>
                                                                @else

                                                                <span class="badge badge-success text-light" style="font-size:12px;" >  সক্রিয়</span>
                                                                @endif



                               @endif


                              </td>

                            @endif

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

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.j"></script>

<script>
    new DataTable('#example', {
    layout: {

        topStart: {
            buttons: ['copy', 'csv', 'excel', 'print']
        }
    }
});
</script>
<script>
    $("#district_id").change(function(){


var district_id = $(this).val();


//alert(dakId+nothiId+status);


$.ajax({
    url: "{{ route('localNgoListSearch') }}",
    method: 'GET',
    data: {district_id:district_id},
    success: function(data) {

         $("#searchTable").html(data);
    }
    });


});
</script>
@endsection
