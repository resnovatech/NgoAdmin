@extends('admin.master.master')

@section('title')
প্রজেক্টের বিষয়ের তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>প্রজেক্টের বিষয়ের তালিকা</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
            <li class="breadcrumb-item">প্রজেক্টের বিষয়ের তালিকা</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            @if (Auth::guard('admin')->user()->can('subjectAdd'))
            <button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light mt-5" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                                    <i class="far fa-calendar-plus  mr-2"></i> নতুন প্রজেক্টের বিষয় যোগ করুন
                                                </button>
                                                @endif
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h5>প্রজেক্টের বিষয়ের তালিকা</h5>
          </div>
          <div class="card-body">
            @include('flash_message')
            <div class="table-responsive">
                <table id="basic-1" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                <th>ক্র: নং:</th>
                                                <th>নাম</th>
                                                <th>কার্যকলাপ</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($projectSubjectList as $user)


                                            <tr>
                                               <td>{{ $loop->index+1 }}</td>

                                                <td>{{ $user->name }}</td>
                                                <td>
                                                  @if (Auth::guard('admin')->user()->can('subjectUpdate'))
                                                      <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                                      class="btn btn-primary waves-light waves-effect  btn-sm" >
                                                      <i class="fa fa-pencil"></i></button>

                                                        <!--  Large modal example -->
                                                        <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myLargeModalLabel">দেশ আপডেট করুন</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="form" action="{{ route('projectSubject.update',$user->id ) }}" method="POST" enctype="multipart/form-data">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12 col-sm-12">
                                                                                    <label for="name">নাম</label>
                                                                    <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="নাম" value="{{ $user->name }}">


                                                                                </div>



                                                                            </div>



                                                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">আপডেট করুন </button>
                                                                        </form>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->


            @endif

            {{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                              @if (Auth::guard('admin')->user()->can('subjectDelete'))

            <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('projectSubject.destroy',$user->id) }}" method="POST" style="display: none;">
                                  @method('DELETE')
                                                                @csrf

                                                            </form>
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






  <!--  Large modal example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">নতুন দেশ যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="custom-validation" action="{{ route('projectSubject.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">


                                      <div class="row">
                  <div class="form-group col-md-12 col-sm-12">
                      <label for="name">নাম</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="নাম">
                  </div>



              </div>




                                  </div>

                              </div>
                          </div>



                          <div class="col-lg-12">
                              <div class="float-right d-none d-md-block">
                                  <div class="form-group mb-4">
                                      <div>
                                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                            জমা দিন
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> <!-- end col -->
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    </div>
</div>

@endsection

@section('script')

     <script>
         /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
     </script>

<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'আপনি কি এ ব্যাপারে নিশ্চিত?',
            text: "আপনি এটি ফিরিয়ে আনতে পারবেন না!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, এটি মুছুন!',
            cancelButtonText: 'না, বাতিল করুন!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'বাতিল করা হয়েছে',
                    'আপনার ডেটা নিরাপদ :)',
                    'error'
                )
            }
        })
    }
</script>
@endsection







