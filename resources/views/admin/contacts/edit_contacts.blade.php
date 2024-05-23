@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #00b740;
            font-weight: 700px;
        }
    </style>



    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Contacts Page</h4>

                    <form method="post" action="{{ route('update.contact') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $contacts->id }}">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Contact Group Name</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="contact_group_id" aria-label="Default select example">
                                    <option selected="">-------</option>
                                    @foreach ($groups as $grp)
                                        <option value="{{ $grp->id }}"
                                            {{ $grp->id == $contacts->contact_group_id ? 'selected' : '' }}>
                                            {{ $grp->contact_group }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                            <div class="col-sm-10">
                                <input name="contact" value="{{ $contacts->contact }}" class="form-control" type="text"
                                    id="contact">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact_description" class="col-sm-2 col-form-label">Contact Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="contact_description">value="{{ $contacts->contact_description }}"</textarea>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info waves-effect waves-light" value=" Update Contact Data">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
