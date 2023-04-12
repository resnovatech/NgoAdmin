@extends('backend.master.master')

@section('title')
Role List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Role List</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Role List</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            @if (Auth::guard('admin')->user()->can('role.create'))
            <a href="{{ route('admin.roles.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect  btn-sm  mt-5" >Add New Role</a>
             @endif
         </div>
        </div>
      </div>
    </div>



    <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')

<div class="table-responsive">
                                    <table id="example" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                               <th>sl</th>
                                    <th>Role Name</th>
                                    <th >Permission List</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($roles as $role)

                                <tr>
                                   <td>

                                    {{ $loop->index+1 }}

                                    <td>{{ $role->name }}</td>
                                    <td >



                                        @foreach ($role->permissions as $key=>$perm)


                                        @if(($key+1) == 6)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 12)
                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 18)
                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 24)

                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 30)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 36)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 42)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 48)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 54)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 60)
                                            {{ $perm->name }},<br>

                                            @else
                                            {{ $perm->name }},
                                            @endif


                                        @endforeach

                                    </td>

                                                <td>
                                                    <div class="btn-group">

@if (Auth::guard('admin')->user()->can('admin.edit'))

                                                        <a href="{{ route('admin.roles.edit',$role->id) }}" type="button" class="btn btn-primary waves-light waves-effect  btn-sm"><i class="fa fa-pencil"></i></a>
@endif
@if (Auth::guard('admin')->user()->can('admin.delete'))


@if($role->id == 3)


@else

                                                        <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="deleteTag({{ $role->id }})"><i class="fa fa-trash-o"></i></button>

 <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.delete',$role->id) }}" method="POST" style="display: none;">
  @method('DELETE')
                                                    @csrf

                                                </form>
                                                @endif
                                                @endif
                                                    </div>
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












