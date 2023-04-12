@extends('backend.master.master')

@section('title')
Country List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Country List</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Country List</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            @if (Auth::guard('admin')->user()->can('country_add'))
            <button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light mt-5" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                                    <i class="far fa-calendar-plus  mr-2"></i> Add New Country
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
            <h5>Country List</h5>
          </div>
          <div class="card-body">
            @include('flash_message')
            <div class="table-responsive">
                <table id="basic-1" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                           <th>SL</th>

                                                <th>Name</th>
                                                <th>Name Bangla</th>
                                                <th>Citizenship</th>
                                                <th>Citizenship (Bangla)</th>
                                                <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($country_list as $user)


                                            <tr>
                                               <td>


                                                {{ $loop->index+1 }}




                                            </td>

                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->name_bn }}</td>
                                                <td>{{ $user->city_eng }}</td>
                                                <td>{{ $user->city_bangla }}</td>
                                                <td>
                                                  @if (Auth::guard('admin')->user()->can('country_update'))
                                                      <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                                      class="btn btn-primary waves-light waves-effect  btn-sm" >
                                                      <i class="fa fa-pencil"></i></button>

                                                        <!--  Large modal example -->
                                                        <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myLargeModalLabel">Update Country</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('admin.country.update') }}" method="POST" enctype="multipart/form-data">

                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12 col-sm-12">
                                                                                    <label for="name">English Name</label>
                                                                    <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">

                                                                    <input type="hidden" class="form-control form-control-sm" id="name" name="id" placeholder="Enter Name" value="{{ $user->id }}">
                                                                                </div>
                                                                                <div class="form-group col-md-12 col-sm-12">
                                                                                    <label for="email">Bangla Name</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="email" name="name_bn" placeholder="Enter Bangla Name" value="{{ $user->name_bn }}">
                                                                                </div>



                                                                                <div class="form-group col-md-12 col-sm-12">
                                                                                    <label for="email">Citizenship</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="email" name="city_eng" placeholder="Enter Citizenship" value="{{ $user->city_eng }}">
                                                                                </div>

                                                                                <div class="form-group col-md-12 col-sm-12">
                                                                                    <label for="email">Citizenship(Bangla)</label>
                                                                                    <input type="text" class="form-control form-control-sm" id="email" name="city_bangla" placeholder="Enter Citizenship(Bangla)" value="{{ $user->city_bangla }}">
                                                                                </div>


                                                                            </div>



                                                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                                        </form>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->


            @endif

            {{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                              @if (Auth::guard('admin')->user()->can('country_delete'))

            <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.country.delete',$user->id) }}" method="POST" style="display: none;">
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
                <h5 class="modal-title" id="myLargeModalLabel">Add New Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.country.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">


                                      <div class="row">
                  <div class="form-group col-md-12 col-sm-12">
                      <label for="name">English Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                  </div>

                  <div class="form-group col-md-12 col-sm-12">
                    <label for="position">Bangla Name</label>
                    <input type="text" class="form-control" id="position" name="name_bn" placeholder="Enter Bangla Name">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label for="email">Citizenship</label>
                    <input type="text" class="form-control form-control-sm" id="email" name="city_eng" placeholder="Enter Citizenship" >
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label for="email">Citizenship(Bangla)</label>
                    <input type="text" class="form-control form-control-sm" id="email" name="city_bangla" placeholder="Enter Citizenship(Bangla)">
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
                                             Submit
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
                title: 'Are you sure?',
                text: "You will not be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
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
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection







