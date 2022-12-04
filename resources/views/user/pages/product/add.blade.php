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
                                    <div class="col-md-12"><strong>Product</strong></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Name</label>
                                            <input class="form-control" name="name" maxlength="50" type="text" value="{{ @$data_value->name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Category</label>
                                            <select class="form-control" name="category_id" required>
                                                <option value="0" @if(@$data_value->category_id == 0) selected @endif>No Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" @if(@$data_value->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                    @endforeach
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Alter Price</label>
                                            <input class="form-control" name="alter_price" type="number" value="{{ @$data_value->alter_price }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Price</label>
                                            <input class="form-control" name="price" type="number" value="{{ @$data_value->price }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Image</label>
                                            <input class="form-control" type="file" name="image_1" id="image">                                                
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @if(@$data_value->image_1)
                                                <img src="{{ asset('/uploads/product/'.@$data_value->image_1) }}" width="400" height="400">
                                            @else
                                                <p>No image selected</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Is Featured?</label>
                                            <select class="form-control" name="is_featured" required>
                                                <option value="0" @if(@$data_value->is_featured == 0) selected @endif>No</option>
                                                <option value="1" @if(@$data_value->is_featured == 1) selected @endif>Yes</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="remarks">Short Summary</label>
                                            <textarea class="form-control" name="short_description" maxlength="1000" type="text" height="100%" rows="5"> {{ @$data_value->short_description }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="remarks">Long Description</label>
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
