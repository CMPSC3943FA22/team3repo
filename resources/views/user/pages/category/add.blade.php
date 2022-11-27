@extends('user.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form id="signupForm" method="POST" action="{{ $post_url }}" enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
            {{ csrf_field() }}                
            <div class="row">
                    <div class="col-md-12">
                        <div class="card border-primary">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="col-md-12"><strong>Category</strong></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="ccnumber">Name</label>
                                            <input class="form-control" name="name" maxlength="50" type="text" value="{{ @$data_value->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="ccnumber">Position</label>
                                            <input class="form-control" name="position" type="number" value="{{ @$data_value->position }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="ccnumber">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="0" @if(@$data_value->status == 0) selected @endif>Disabled</option>
                                                <option value="1" @if(@$data_value->status == 1) selected @endif>Enabled</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="remarks">Description</label>
                                            <textarea class="form-control" name="description" maxlength="1000" type="text" height="100%" rows="10"> {{ @$data_value->description }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>  
                <!-- /.col-->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="/dashboard" class="btn btn-danger">Close</a>
                </div>
            <!-- /.row-->
            </form>
        </div>
    </div>
    <hr>
@endsection
