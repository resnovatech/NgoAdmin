@extends('backend.master.master')

@section('title')
General Setting |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">General Setting </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active"> </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
                        <div class="col-sm-6">

                        </div>
</div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')


@if(count($users) == 0)
                                    <form class="custom-validation" action="{{ route('admin.general_information.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <div class="row">

                                              <div class="col-lg-12">
                                                  <div class="card">
                                                      <div class="card-body">

                                                        <div class="row">
                                                            <div class="form-group col-md-4 col-sm-12">
                                                                <label for="name">Decimal Separetor</label>
                                                <select class="form-control form-control-sm" id="name" name="decimal_separator" >
                                                    <option value=".">.</option>
                                                </select>


                                                            </div>
                                                            <div class="form-group col-md-4 col-sm-12">
                                                                <label for="email">Thousand Separetor</label>
                                                                <select class="form-control form-control-sm" id="name" name="thousand_separator" >
                                                                    <option value=",">,</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-4 col-sm-12">
                                                                <label for="email">Number Padding Zeros's For Prefix Format</label>
                                                                <input type="text" class="form-control form-control-sm" id="email" name="number_off_padding_zero" placeholder="Enter Prefix Format" >
                                                            </div>

<hr class="mt-3">
                                                            <div class="form-group col-md-4 col-sm-12 mt-3">
                                                                <label for="name">Show Tax Per Item</label>

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline1" name="show_tax_per_item" class="custom-control-input" value="Yes">
                                                                    <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline2" name="show_tax_per_item" class="custom-control-input" value="No">
                                                                    <label class="custom-control-label" for="customRadioInline2">No</label>
                                                                  </div>

                                                            </div>

                                                            <div class="form-group col-md-4 col-sm-12 mt-3">
                                                                <label for="name">Remove Tax Name From Item Table Row</label>

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline12" name="remove_tax_from_item_table_row" class="custom-control-input" value="Yes">
                                                                    <label class="custom-control-label" for="customRadioInline12">Yes</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline23" name="remove_tax_from_item_table_row" class="custom-control-input" value="No">
                                                                    <label class="custom-control-label" for="customRadioInline23">No</label>
                                                                  </div>

                                                            </div>


                                                            <div class="form-group col-md-4 col-sm-12 mt-3">
                                                                <label for="name">Exclude Currency Symbol From Item Table Amount</label>

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline12" name="exclude_cur_symbol_from_item_table_amount" class="custom-control-input" value="Yes">
                                                                    <label class="custom-control-label" for="customRadioInline12">Yes</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline23" name="exclude_cur_symbol_from_item_table_amount" class="custom-control-input" value="No">
                                                                    <label class="custom-control-label" for="customRadioInline23">No</label>
                                                                  </div>

                                                            </div>


                                                            <hr class="mt-3">


                                                            <div class="form-group col-md-4 col-sm-12">
                                                                <label for="email">Default Tax</label>
                                                                <select class="form-control form-control-sm" id="name" name="default_tax" >
                                                                    <option value="Please Select">Please Select</option>
                                                                    @foreach($tax_list as $all_tax_list)
                                                                    <option value="{{ $all_tax_list->tax_name }}">{{ $all_tax_list->tax_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>




                                                            <div class="form-group col-md-8 col-sm-12 mt-3">
                                                                <label for="name">Remove Decimal On Numbers/Money With Zero Decimal (2.00 wil become 2 ,2.25 will stay 2.25)</label>

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline12" name="remove_dec_on_numbermoney" class="custom-control-input" value="Yes">
                                                                    <label class="custom-control-label" for="customRadioInline12">Yes</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline23" name="remove_dec_on_numbermoney" class="custom-control-input" value="No">
                                                                    <label class="custom-control-label" for="customRadioInline23">No</label>
                                                                  </div>

                                                            </div>

                                                            <hr class="mt-3">


                                                            <label for="name" style="font-size:25px">Amount To Words</label>
                                                            <label for="name" >Output Total Amount To Word in Invoice/estimate</label>


                                                            <div class="form-group col-md-6 col-sm-12 mt-3">
                                                                <label for="name">Enable</label>

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline123" name="output_total_number_in_es_pro" class="custom-control-input" value="Yes">
                                                                    <label class="custom-control-label" for="customRadioInline123">Yes</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline233" name="output_total_number_in_es_pro" class="custom-control-input" value="No">
                                                                    <label class="custom-control-label" for="customRadioInline233">No</label>
                                                                  </div>

                                                            </div>

                                                            <div class="form-group col-md-6 col-sm-12 mt-3">
                                                                <label for="name">Number Words Into Lowercase</label>

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline1234" name="number_word_in_lowercase" class="custom-control-input" value="Yes">
                                                                    <label class="custom-control-label" for="customRadioInline1234">Yes</label>
                                                                  </div>
                                                                  <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline2334" name="number_word_in_lowercase" class="custom-control-input" value="No">
                                                                    <label class="custom-control-label" for="customRadioInline2334">No</label>
                                                                  </div>

                                                            </div>

                                                        </div>



                                                      </div>

                                                  </div>
                                              </div>



                                              <div class="col-lg-12">

                                                      <div class="form-group mb-4">
                                                          <div>
                                                              <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                                                 Submit
                                                              </button>
                                                          </div>

                                                  </div>
                                              </div>
                                          </div> <!-- end col -->
                                      </form>
@else

@foreach($users as $user)

<form class="custom-validation" action="{{ route('admin.general_information.update') }}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="hidden" class="form-control form-control-sm" id="email" value="{{ $user->id }}" name="id" placeholder="Enter Prefix Format" >
      <div class="row">

          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="name">Decimal Separetor</label>
            <select class="form-control form-control-sm" id="name" name="decimal_separator" >
                <option value="." {{ '.' == $user->decimal_separator ? 'selected':''  }}>.</option>
            </select>


                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="email">Thousand Separetor</label>
                            <select class="form-control form-control-sm" id="name" name="thousand_separator" >
                                <option value="," {{ ',' == $user->thousand_separator ? 'selected':''  }}>,</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <label for="email">Number Padding Zeros's For Prefix Format</label>
                            <input type="text" class="form-control form-control-sm" id="email" value="{{ $user->number_off_padding_zero }}" name="number_off_padding_zero" placeholder="Enter Prefix Format" >
                        </div>

<hr class="mt-3">
                        <div class="form-group col-md-4 col-sm-12 mt-3">
                            <label for="name">Show Tax Per Item</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="show_tax_per_item" class="custom-control-input" value="Yes" {{ 'Yes' == $user->show_tax_per_item ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline1">Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="show_tax_per_item" class="custom-control-input" value="No" {{ 'No' == $user->show_tax_per_item ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline2">No</label>
                              </div>

                        </div>

                        <div class="form-group col-md-4 col-sm-12 mt-3">
                            <label for="name">Remove Tax Name From Item Table Row</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline12" name="remove_tax_from_item_table_row" class="custom-control-input" value="Yes" {{ 'Yes' == $user->remove_tax_from_item_table_row ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline12">Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline23" name="remove_tax_from_item_table_row" class="custom-control-input" value="No" {{ 'No' == $user->remove_tax_from_item_table_row ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline23">No</label>
                              </div>

                        </div>


                        <div class="form-group col-md-4 col-sm-12 mt-3">
                            <label for="name">Exclude Currency Symbol From Item Table Amount</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline12" name="exclude_cur_symbol_from_item_table_amount" class="custom-control-input" value="Yes" {{ 'Yes' == $user->exclude_cur_symbol_from_item_table_amount ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline12">Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline23" name="exclude_cur_symbol_from_item_table_amount" class="custom-control-input" value="No" {{ 'No' == $user->exclude_cur_symbol_from_item_table_amount ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline23">No</label>
                              </div>

                        </div>


                        <hr class="mt-3">


                        <div class="form-group col-md-4 col-sm-12">
                            <label for="email">Default Tax</label>
                            <select class="form-control form-control-sm" id="name" name="default_tax" >
                                <option value="Please Select">Please Select</option>
                                @foreach($tax_list as $all_tax_list)
                                <option value="{{ $all_tax_list->tax_name }}"  {{ $all_tax_list->tax_name == $user->default_tax ? 'selected':''  }}>{{ $all_tax_list->tax_name }}</option>
                                @endforeach
                            </select>
                        </div>




                        <div class="form-group col-md-8 col-sm-12 mt-3">
                            <label for="name">Remove Decimal On Numbers/Money With Zero Decimal (2.00 wil become 2 ,2.25 will stay 2.25)</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline12" name="remove_dec_on_numbermoney" class="custom-control-input" value="Yes" {{ 'Yes' == $user->remove_dec_on_numbermoney ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline12">Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline23" name="remove_dec_on_numbermoney" class="custom-control-input" value="No" {{ 'No' == $user->remove_dec_on_numbermoney ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline23">No</label>
                              </div>

                        </div>

                        <hr class="mt-3">


                        <label for="name" style="font-size:25px">Amount To Words</label>
                        <label for="name" >Output Total Amount To Word in Invoice/estimate</label>


                        <div class="form-group col-md-6 col-sm-12 mt-3">
                            <label for="name">Enable</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline123" name="output_total_number_in_es_pro" class="custom-control-input" value="Yes" {{ 'Yes' == $user->output_total_number_in_es_pro ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline123">Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline233" name="output_total_number_in_es_pro" class="custom-control-input" value="No" {{ 'No' == $user->output_total_number_in_es_pro ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline233">No</label>
                              </div>

                        </div>

                        <div class="form-group col-md-6 col-sm-12 mt-3">
                            <label for="name">Number Words Into Lowercase</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1234" name="number_word_in_lowercase" class="custom-control-input" value="Yes" {{ 'Yes' == $user->number_word_in_lowercase ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline1234">Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2334" name="number_word_in_lowercase" class="custom-control-input" value="No" {{ 'No' == $user->number_word_in_lowercase ? 'checked':''  }}>
                                <label class="custom-control-label" for="customRadioInline2334">No</label>
                              </div>

                        </div>

                    </div>



                  </div>

              </div>
          </div>



          <div class="col-lg-12">

                  <div class="form-group mb-4">
                      <div>
                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                             Update
                          </button>
                      </div>

              </div>
          </div>
      </div> <!-- end col -->
  </form>
@endforeach

@endif


                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->







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







