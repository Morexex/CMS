@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Contact Group Edit Page</h4>

                    <form method="post" action="{{ route('update.contact.group') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $contactgroup->id }}">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Contact Group Name</label>
                            <div class="col-sm-10">
                                <input name="contact_group" class="form-control" type="text"
                                    value="{{ $contactgroup->contact_group }}" id="title">
                                @error('contact_group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info waves-effect waves-light" value=" Update Contact Group">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
