@extends('backend.master.master')

@section('title')
Ngo Registration View | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<?php
$engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );
?>
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>NGO Registration Information</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
    <div class="user-profile">
        <div class="row">
            <!-- user profile header start-->
            <div class="col-sm-12">
                <div class="card profile-header">
                    <img class="img-fluid bg-img-cover" src="{{ asset('/') }}public/new_admin/assets/images/user-profile/slider_01.jpg" alt="">
                    <div class="profile-img-wrrap">
                        <img class="img-fluid bg-img-cover" src="{{ asset('/') }}public/new_admin/assets/images/user-profile/bg-profile.jpg" alt="">
                    </div>
                    <div class="userpro-box">
                        <div class="img-wrraper">
                            <div class="avatar"><img class="img-fluid" alt="" src="{{ asset('/') }}public/new_admin/assets/images/user/7.jpg"></div>
                        </div>
                        <div class="user-designation">
                            <div class="title">
                                <h4>{{ $users_info->name }}</h4>
                                <h6>{{ $users_info->email }}</h6>
                                <p>{{ $users_info->phone }}</p>
                            </div>
                            <div class="follow">
                                <ul class="follow-list">
                                    <li>
                                        <div class="follow-num">{{ $all_data_for_new_list_all->created_at->format('d-M-y') }}</div>
                                        <span>Submit Date </span>
                                    </li>
                                    <li>
                                        <div class="follow-num">{{ $all_data_for_new_list_all->status}}</div>
                                        <span>Status</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user profile header end-->
            <div class="col-xl-12 col-lg-12 col-md-7 xl-65">
                <div class="row">
                    <!-- profile post start-->
                    <div class="col-sm-12">
                        <div class="card height-equal">
                            <div class="card-header pb-0">
                                <h5>NGO Registration All Information</h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab"
                                                            data-bs-toggle="pill" href="#pills-darkhome"
                                                            role="tab" aria-controls="pills-darkhome"
                                                            aria-selected="true" style=""><i
                                                    class="icofont icofont-ui-home"></i>FD01 Form</a></li>
                                    <li class="nav-item"><a class="nav-link" id="pills-darkprofile-tab"
                                                            data-bs-toggle="pill" href="#pills-darkprofile"
                                                            role="tab" aria-controls="pills-darkprofile"
                                                            aria-selected="false" style=""><i
                                                    class="icofont icofont-man-in-glasses"></i>Form 08</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="pills-darkcontact-tab"
                                                            data-bs-toggle="pill" href="#pills-darkcontact"
                                                            role="tab" aria-controls="pills-darkcontact"
                                                            aria-selected="false" style=""><i
                                                    class="icofont icofont-contacts"></i>Committee
                                            Member</a></li>
                                    <li class="nav-item"><a class="nav-link" id="pills-darkinfo-tab"
                                                            data-bs-toggle="pill" href="#pills-darkinfo"
                                                            role="tab" aria-controls="pills-darkinfo"
                                                            aria-selected="false" style=""><i
                                                    class="icofont icofont-address-book"></i>Other's Member</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="pills-darkdoc-tab"
                                                            data-bs-toggle="pill" href="#pills-darkdoc"
                                                            role="tab" aria-controls="pills-darkdoc"
                                                            aria-selected="false" style=""><i
                                                    class="icofont icofont-animal-lemur"></i>Document</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-darktabContent">
                                    <div class="tab-pane fade active show" id="pills-darkhome"
                                         role="tabpanel" aria-labelledby="pills-darkhome-tab">
                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>১.</td>
                                                    <td colspan="3">সংস্থার বিবরণ:</td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td>(i)</td>
                                                    <td>সংস্থার নাম</td>
                                                    <td>: {{ $form_one_data->organization_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ii)</td>
                                                    <td>সংস্থার ঠিকানা</td>
                                                    <td>: {{ $form_one_data->organization_address }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(iii)</td>
                                                    <td>নিবন্ধন নম্বর</td>
                                                    <td>: {{ $form_one_data->registration_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(iv)</td>
                                                    <td>কোন দেশীয় সংস্থা</td>
                                                    <td>: {{ $form_one_data->country_of_origin }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(v)</td>
                                                    <td>প্রধান কার্যালয়ের ঠিকানা</td>
                                                    <td>: {{ $form_one_data->address_of_head_office }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(vi)</td>
                                                    <td>বাংলাদেশস্থ সংস্থা প্রধানের তথ্যাদি</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>ক) নাম</td>
                                                    <td>: {{ $form_one_data->name_of_head_in_bd }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>খ) পূর্ণকালীন/ খণ্ডকালীন</td>
                                                    <td>: {{ $form_one_data->job_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>গ) ঠিকানা,মোবাইল নম্বর, ইমেইল</td>
                                                    <td>:{{ $form_one_data->address }}, {{ $form_one_data->phone }}, {{ $form_one_data->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>ঘ) নাগরিকত্ব (পূর্বতন নাগরিকত্ব যদি থাকে তাও উল্লেখ
                                                        করতে হবে)
                                                    </td>
                                                    <td>: {{ $form_one_data->citizenship }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>ঙ) পেশা (বর্তমান পেশা উল্লেখ করতে হবে)</td>
                                                    <td>: {{ $form_one_data->profession }}</td>
                                                </tr>
                                                <tr>
                                                    <td>২.</td>
                                                    <td colspan="3">প্রস্তাবিত কার্যক্রমের ক্ষেত্র
                                                        (বিস্তারিত বিবরণ সংযুক্ত করতে হবে):
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>ক</td>
                                                    <td>(i) পরিচালন পরিকল্পনা (Plan of Operation)</td>
                                                    <td>:
                                                        @if(empty($form_one_data->plan_of_operation))

                                                        @else




                                                        Attached

                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>(ii) প্রকল্প এলাকা (জেলা ও উপজেলা)</td>
                                                    <td>: {{ $form_one_data->district }},{{ $form_one_data->sub_district }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>খ</td>
                                                    <td>তহবিলের উৎস</td>
                                                    <td></td>
                                                </tr>
                                                @foreach($all_source_of_fund as $all_get_all_source_of_fund_data)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>(i) দাতা/দাতা সংস্থাসমূহের নাম ও ঠিকানা</td>
                                                    <td>: {{ $all_get_all_source_of_fund_data->name }},{{ $all_get_all_source_of_fund_data->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>(ii) দাতা /দাতাসংস্থার অঙ্গীকারপত্রের কপি</td>
                                                    <td>: @if(empty($all_get_all_source_of_fund_data->letter_file))

                                                        @else



                                                        Attached

                                                        @endif</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>৩.</td>
                                                    <td colspan="2">অঙ্গীকারকৃত অনুদানের পরিমাণ (বৈদেশিক
                                                        মুদ্রা/বাংলাদেশ টাকায়)
                                                    </td>
                                                    <td>: {{ $form_one_data->annual_budget }}</td>
                                                </tr>
                                                <tr>
                                                    <td>৪.</td>
                                                    <td colspan="3">কর্মকর্তাদের তথ্যাদি পৃথক কাগজে
                                                        [ঊর্ধ্বতন ৫(পাঁচ) জন কর্মকর্তার]
                                                        উপস্থাপন করতে হবে
                                                    </td>
                                                </tr>
                                                @foreach($all_partiw as $key=>$all_all_parti)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ str_replace($engDATE, $bangDATE, $key+1 )}}.</td>
                                                    <td>কর্মকর্তা {{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ক)</td>
                                                    <td>নাম</td>
                                                    <td>: {{ $all_all_parti->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(খ)</td>
                                                    <td>পদবি</td>
                                                    <td>: {{ $all_all_parti->position }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(গ)</td>
                                                    <td>ঠিকানা</td>
                                                    <td>: {{ $all_all_parti->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঘ)</td>
                                                    <td>নাগরিকত্ব (দ্বৈত নাগরিকত্ব থাকলে উল্লেখ করতে হবে)
                                                    </td>
                                                    <td>: {{ $all_all_parti->citizenship }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঙ)</td>
                                                    <td>যোগদানের তারিখ</td>
                                                    <td>: {{ $all_all_parti->date_of_join }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(চ)</td>
                                                    <td>বেতন ভাতাদি</td>
                                                    <td>: {{ $all_all_parti->salary_statement }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ছ)</td>
                                                    <td>সম্পৃক্ত অন্য পেশার বিবরণ</td>
                                                    <td>: {{ $all_all_parti->other_occupation }}</td>
                                                </tr>
                                                @endforeach

                                                <tr>
                                                    <td>৫.</td>
                                                    <td colspan="2">নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে
                                                        কিনা (চালানের কপি সংযুক্ত করতে
                                                        হবে)
                                                    </td>
                                                    <td>:  @if(empty($form_one_data->attach_the__supporting_papers))

                                                        @else



                                                        Attached

                                                        @endif</td>
                                                </tr>
                                                <tr>
                                                    <td>৬.</td>
                                                    <td colspan="3">নিয়োগের জন্য প্রস্তাবিত
                                                        পরামর্শক/পরামর্শকগণের নাম এবং বিস্তারিত
                                                        তথ্য(যদি থাকে)
                                                    </td>
                                                </tr>
                                                @foreach($get_all_data_adviser as $key=>$all_get_all_data_adviser)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ str_replace($engDATE, $bangDATE, $key+1 )}}.</td>
                                                    <td>পরামর্শক {{ str_replace($engDATE, $bangDATE, $key+1 )}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ক)</td>
                                                    <td>নাম</td>
                                                    <td>: {{ $all_get_all_data_adviser->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(খ)</td>
                                                    <td>বিস্তারিত বর্ণনা</td>
                                                    <td>: {{ $all_get_all_data_adviser->information	 }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>৭.</td>
                                                    <td colspan="3">মাদার একাউন্ট এর বিস্তারিত বিবরণ (হিসাব
                                                        নম্বর, ধরণ, ব্যাংকের
                                                        নাম,শাখা ও বিস্তারিত ঠিকানা)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ক)</td>
                                                    <td>হিসাব নম্বর</td>
                                                    <td>: {{ $get_all_data_adviser_bank->account_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(খ)</td>
                                                    <td>ধরণ</td>
                                                    <td>: {{ $get_all_data_adviser_bank->account_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(গ)</td>
                                                    <td>ব্যাংকের নাম</td>
                                                    <td>: {{ $get_all_data_adviser_bank->name_of_bank }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঘ)</td>
                                                    <td>শাখা</td>
                                                    <td>: {{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঙ)</td>
                                                    <td>বিস্তারিত ঠিকানা</td>
                                                    <td>: {{ $get_all_data_adviser_bank->bank_address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>৮.</td>
                                                    <td colspan="2">অন্য কোন গুরুত্বপূর্ণ তথ্য যা আবেদনকারী
                                                        উল্লেখ করতে ইচ্ছুক (পৃথক
                                                        কাগজে সংযুক্ত করতে হবে)
                                                    </td>
                                                    <td>: @foreach($get_all_data_other as $all_get_all_data_other)

                                                        @if(empty($all_get_all_data_other->information_type))

                                                        @else



                                                        Attached
                                                        @endif


                                                                        @endforeach</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="pills-darkprofile" role="tabpanel"
                                         aria-labelledby="pills-darkprofile-tab">
                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered overflow-scroll">
                                                <tr>
                                                    <th rowspan="2">ক্রঃ নং</th>
                                                    <th rowspan="2">নাম ও পদবী</th>
                                                    <th rowspan="2">জন্ম তারিখ</th>
                                                    <th rowspan="2">এনএইডি এবং মোবাইল নং</th>
                                                    <th rowspan="2">বাবার নাম</th>
                                                    <th colspan="2">ঠিকানা</th>
                                                    <th rowspan="2">স্বামী/স্ত্রীর নাম</th>
                                                    <th rowspan="2">শিক্ষাগত যোগ্যতা</th>
                                                    <th colspan="3">পেশা</th>
                                                    <th rowspan="2">তিনি কি অন্য কোন এনজিওর সদস্য বা
                                                        পরিষেবাধারী ছিলেন (যদি তা হয় তবে অনুগ্রহ করে
                                                        চিহ্নিত করুন)
                                                    </th>
                                                    <th rowspan="2">মন্তব্য</th>
                                                    <th rowspan="2">স্বাক্ষর এবং তারিখ</th>
                                                </tr>
                                                <tr>
                                                    <th>বর্তমান ঠিকানা</th>
                                                    <th>স্থায়ী ঠিকানা</th>
                                                    <th>সরকারী/আধা সরকারী/সরকারি স্বায়ত্তশাসিত</th>
                                                    <th>ব্যক্তিগত সেবা</th>
                                                    <th>স্ব সেবা</th>
                                                </tr>
                                                @foreach($form_eight_data as $key=>$all_all_parti)
    <tr>
        <td>{{  $key+1 }}</td>
        <td>{{ $all_all_parti->name }} & {{ $all_all_parti->desi }}</td>
        <td>

         <?php   $start_date_one = date("d/m/Y", strtotime($all_all_parti->dob)); ?>


         {{  $start_date_one }}


        </td>
        <td>{{ $all_all_parti->nid_no }} & {{ $all_all_parti->phone }}</td>
        <td>{{ $all_all_parti->father_name }}</td>
        <td>{{ $all_all_parti->present_address }}</td>
        <td>{{ $all_all_parti->permanent_address }}</td>
        <td>{{ $all_all_parti->name_supouse }}</td>
        <td>{{ $all_all_parti->edu_quali }}</td>
        <td>

            @if($all_all_parti->profession  == 'Govt./Semi Govt./Govt Autonomous' || $all_all_parti->profession  == 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif


        </td>
        <td>@if($all_all_parti->profession  == 'Private Service' || $all_all_parti->profession  == 'ব্যক্তিগত সেবা')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>@if($all_all_parti->profession  == 'Self Service' || $all_all_parti->profession  == 'স্ব সেবা')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>{{ $all_all_parti->service_status }}</td>
        <td>{{ $all_all_parti->remarks }}</td>
        <td>


        </td>

    </tr>
    @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-darkcontact" role="tabpanel"
                                         aria-labelledby="pills-darkcontact-tab">
                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>NID No. & DOB</th>
                                                    <th>Mobile</th>
                                                    <th>Fathers Name</th>
                                                    <th>Present Address</th>
                                                    <th>Permanent Address</th>
                                                    <th>Name of Spouse</th>
                                                    <th>Remarks</th>
                                                    <th>Signature & Date</th>
                                                </tr>
                                                @foreach($form_eight_data as $key=>$all_all_parti)
                                                <tr>
                                                    <td>{{ $all_all_parti->name }}</td>
                                                    <td><h6> NID No: {{$all_all_parti->nid_no }}</h6><span>DOB: <?php   $start_date_one = date("d/m/Y", strtotime($all_all_parti->dob)); ?>


                                                        {{  $start_date_one }}</span>
                                                    </td>
                                                    <td>{{ $all_all_parti->phone }}</td>
                                                    <td>{{ $all_all_parti->father_name }}</td>
                                                    <td>{{ $all_all_parti->present_address }}</td>
                                                    <td>{{ $all_all_parti->permanent_address }}</td>
                                                    <td>{{ $all_all_parti->name_supouse }}</td>
                                                    <td>{{ $all_all_parti->remarks }}</td>
                                                    <td>

                                                        @if($all_all_parti->s_pdf == 0)


                                                        @else

                                                        Attached

                                                        @endif


                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-darkinfo" role="tabpanel"
                                         aria-labelledby="pills-darkinfo-tab">
                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>NID No. & DOB</th>
                                                    <th>Mobile</th>
                                                    <th>Fathers Name</th>
                                                    <th>Present Address</th>
                                                    <th>Permanent Address</th>
                                                    <th>Name of Spouse</th>
                                                    <th>Remarks</th>
                                                    <th>Signature & Date</th>
                                                </tr>
                                                @foreach($form_member_data as $all_form_member_data)
                                                <tr>
                                                    <td>{{ $all_form_member_data->name }}</td>
                                                    <td><h6> NID: {{ $all_form_member_data->nid_no }} </h6><span>DOB: {{ $all_form_member_data->dob }} </span>
                                                    </td>
                                                    <td>{{ $all_form_member_data->phone }}</td>
                                                    <td>{{ $all_form_member_data->father_name }} </td>
                                                    <td>{{ $all_form_member_data->present_address }}</td>
                                                    <td>{{ $all_form_member_data->permanent_address }}</td>
                                                    <td>{{ $all_form_member_data->name_supouse }}</td>
                                                    <td>{{ $all_form_member_data->remarks }}</td>
                                                    <td>


                                                        @if($all_form_member_data->s_pdf == 0)


                                                        @else

                                                        Attached

                                                        @endif



                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-darkdoc" role="tabpanel"
                                         aria-labelledby="pills-darkdoc-tab">
                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>File name</th>
                                                    <th>File view</th>
                                                </tr>
                                                <tr>
                                                    <td>পরিচালন পরিকল্পনা</td>
                                                    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('form_one_pdf',['main_id'=>$form_one_data->user_id,'id'=>'plan']) }}" >
                                                        <i class="fa fa-eye"></i>
                                                    </a></td>
                                                </tr>
                                                <tr>
                                                    <td>চালানের কপি</td>
                                                    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('form_one_pdf',['main_id'=>$form_one_data->user_id,'id'=>'invoice']) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a></td>
                                                </tr>
                                                <tr>
                                                    <td>ট্রেজারি চালানের মূলকপি</td>
                                                    <td> <a target="_blank" class="btn btn-sm btn-success" href="{{ route('form_one_pdf',['main_id'=>$form_one_data->user_id,'id'=>'treasury_bill']) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a></td>
                                                </tr>

                                                <tr>
                                                    <td>কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম - ০১ এর ফাইনাল কপি </td>
                                                    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('form_one_pdf',['main_id'=>$form_one_data->user_id,'id'=>'final_pdf']) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a></td>
                                                </tr>

                                                <tr>
                                                    <td>কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম - ০৮ এর ফাইনাল কপি</td>
                                                    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('form_eight_pdf',['main_id'=>$form_one_data->user_id]) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a></td>
                                                </tr>
                                                @foreach($all_source_of_fund as $all_get_all_source_of_fund_data)
                                                <tr>
                                                    <td>
                                                    সম্ভাব্য দাতার কাছ থেকে প্রতিশ্রুতির চিঠি(দাতা সংস্থার নাম)
                                                    </td>
                                                    <td> <a target="_blank" class="btn btn-sm btn-success" href="{{ route('source_of_fund',$all_get_all_source_of_fund_data->id ) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>({{ $all_get_all_source_of_fund_data->name }})</td>
                                                </tr>
                                                @endforeach

                                                @foreach($get_all_data_other as $key=>$all_get_all_data_other)

                                                <tr>
                                                <td>অন্যান্য পিডিএফ কপি {{ str_replace($engDATE, $bangDATE,$key+1) }}</td>
                                                <td><a  target="_blank" class="btn btn-sm btn-success" href="{{ route('other_pdf_view',$all_get_all_data_other->id ) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                            @endforeach

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- profile post end-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')
@endsection
