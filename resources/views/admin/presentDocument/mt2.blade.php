<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="modalforsenderpp{{ $childNoteNewLists->id }}"  role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
    <a id="pp" class="btn btn-outline-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>
    <h4 class="modal-title" id="myModalLabel2">
    পরবর্তী কার্যক্রমের জন্যে প্রেরণ করুন
        <br>
        <small> <span style="background: gray; border-radius: 5px; padding: 2px 5px;">

            @foreach($checkParent as $key=>$checkParents)

            @if($checkParents->id == $id)
            নোট {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}:
            @else

            @endif
            @endforeach


        </span> {{$checkParentFirst->subject }}</small></h4>
</div>

<div class="modal-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('saveNothiPermission') }}" method="post" id="form">

                @csrf


                <?php
                $receiverId = DB::table('nothi_details')
                                            ->where('noteId',$id)
                                            ->where('nothId',$nothiId)
                                            ->where('dakId',$parentId)
                                            ->where('dakType',$status)
                                            ->where('childId',$childNoteNewLists->id)
                                            //->where('')
                                            ->where('sender',Auth::guard('admin')->user()->id)
                                            ->value('receiver');
                ?>

                <input type="hidden" value="{{ $childNoteNewLists->id }}" placeholder="নোট এর বিষয়" class="form-control" name="child_note_id" id=""/>





                <input type="hidden" value="{{ $status }}" placeholder="নোট এর বিষয়" class="form-control" name="status" id=""/>
                <input type="hidden" value="{{ $parentId }}" placeholder="নোট এর বিষয়" class="form-control" name="dakId" id=""/>
                <input type="hidden" value="{{ $nothiId }}" placeholder="নোট এর বিষয়" class="form-control" name="nothiId" id=""/>

                <input type="hidden" value="{{ $id }}" placeholder="নোট এর বিষয়" class="form-control" name="noteId" id=""/>



               @if(Route::is('addChildNote') )

               <input type="hidden" value="first_sender" placeholder="নোট এর বিষয়" class="form-control" name="first_sender" id=""/>
                @else

                @endif
                {{-- <div class="mb-3">
                    <label class="form-label" for="">অগ্রাধিকার বাছাই করুন </label>
                    <select class="js-example-basic-single col-sm-12">
                        <option value="AL">অগ্রাধিকার বাছাই করুন</option>
                        <option value="WY">X</option>
                    </select>
                </div> --}}

				 @if(count($branchListForSerial) == 0)
                <div class="mt-3">
                    <div style="text-align:right;">
                        <a class="btn btn-primary" type="button" href="{{ route('documentPresent.index') }}">
                            অনুমতি সংশোধন
                        </a>


                    </div>
                </div>

                @else
                <div class="row mt-3">
                    <div class="col-1">

                            <i class="fa fa-area-chart" style="padding: 15px; border-radius: 50%; border:1px solid black; font-size:20px;"></i>

                    </div>
                    <div class="col-11">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td>নাম</td>
                                        <td></td>
                                    </tr>

                                    @foreach($branchListForSerial as $branchListForSerials)

                                   <?php

								  // dd($branchListForSerial);
                                $adminList = DB::table('nothi_permissions')
                                                 ->where('designationId',$branchListForSerials->id)->get();

                                                 $convert_name_title1 = $adminList->implode("adminId", " ");
                                                 $separated_data_title1 = explode(" ", $convert_name_title1);



                                    $finalAdminList = DB::table('admins')->whereIn('id',$separated_data_title1)
                                                            ->get();

                                                           // dd($finalAdminList);

                                    ?>
                                    @foreach($finalAdminList as $finalAdminLists)

                                    <?php

$getAlldesignationName = DB::table('designation_lists')
->where('id',$finalAdminLists->designation_list_id)->value('designation_name');

                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="">

                                                    @if(Auth::guard('admin')->user()->id == $finalAdminLists->id )

													@else
                                                    <input style="
                                                    border: 2px solid #333 !important;
                                                    width: 30px;
                                                    height: 30px;
                                                    background-color: #1b4c43 !important;
                                                    border-radius: 4px;
                                                    " id="ccccheck{{ $finalAdminLists->id }}" value="{{ $finalAdminLists->id }}"   name="nothiPermissionId" class="custom_checkbox chb" type="checkbox">

                                                    @endif
                                                    <label  for="ccccheck{{ $finalAdminLists->id }}" style="--d: 30px">
                                                        <svg viewBox="0,0,50,50">
                                                            <path d="M5 30 L 20 45 L 45 5"></path>
                                                        </svg>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width:80%">
                                            {{ $finalAdminLists->admin_name_ban }},
                                            {{ $getAlldesignationName }},{{ $branchListForSerials->branch_name }}, এনজিও বিষয়ক ব্যুরো
                                        </td>
                                        <td>
                                            <span style="color: #7e8ba8"><i class="fa fa-check-square-o"></i> স্বাক্ষরকারী ব্যাক্তি</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div style="text-align:right;">
                        <a class="btn btn-primary" type="button" href="{{ route('documentPresent.index') }}">
                            অনুমতি সংশোধন
                        </a>


                        <button  class="btn btn-primary"  name="button_value" value="send" type="submit">
                            প্রেরণ
                        </button>
                       
                    </div>
                </div>
				@endif
            </form>
        </div>
    </div>
</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
</div>
