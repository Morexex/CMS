@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Contact Group</h4><br>

                    <form method="post" id="myForm" action="{{ route('store.contact.group') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Contact Group Name</label>
                            <div class="form-group col-sm-10">
                                <input name="contact_group" class="form-control" type="text" id="title">
                                @error('contact_group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info waves-effect waves-light" value=" Insert Contact Group">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    contact_group: {
                        required: true,
                    },
                },
                messages: {
                    contact_group: {
                        required: 'Please Enter Contact Group',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
