@extends('backend.master.master')

@section('title')
Permission  List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Permission List</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Permission List</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6 mt-5">
            @if (Auth::guard('admin')->user()->can('permission.create'))
            <a href="{{ route('admin.permission.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect  btn-sm" >Add Permission</a>
            @endif
        </div>
      </div>
    </div>
  </div>




  <div class="container-fluid">

                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')
<div class="table-responsive">
                                    <table id="basic-1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                               <th>Sl</th>
                                    <th>Group Name</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                         @foreach ($pers as $permission)

                               <tr>
                                <td>




{{ $loop->index+1 }}







                                </td>
                                <td>{{ $permission->group_name}}</td>
                                    <td>
                                      @if (Auth::guard('admin')->user()->can('admin.view'))
                                          <a  type="button" class="btn btn-primary waves-light waves-effect  btn-sm" href="{{ route('admin.permission.view', $permission->group_name) }}"><i class="fa fa-eye"></i></a>
@endif


                                    </td>
                                </tr>
@endforeach


                                        </tbody>
                                    </table>
</div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->



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

















