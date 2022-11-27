@extends('user.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ route('user.customer.add', [0]) }}" data-toggle="modal" data-id="0" data-backdrop="static" class="btn btn-pill btn-success"><i class="fa fa-plus"></i>&nbsp;Add</a>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('user.dashboard') }}">
                                        <div class="input-group">
                                        <select class="form-control" name="agent" required>
                                            @foreach($agents as $agent)
                                                <option value="{{ $agent->id }}" @if(@$data_value->agent == $agent->id) selected @endif>{{ $agent->name }}</option>
                                            @endforeach
                                        </select> 
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            </div>
                                        </div>
                                    </form>                                
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('user.dashboard') }}">
                                        <div class="input-group">
                                        <select class="form-control" name="type" required>
                                            @foreach($customer_status as $status)
                                                <option value="{{ $status->id }}" @if(@$data_value->status == $status->id) selected @endif>{{ $status->name }}</option>
                                            @endforeach
                                        </select> 
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            </div>
                                        </div>
                                    </form>                                
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('user.dashboard') }}">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search Customers"  value="{{ @request()->get('search') }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br/>
                            <!-- <div class="row">
                                <div class="col-md-3">
                                    <form action="{{ route('user.dashboard') }}">
                                        <div class="input-group">
                                            <input type="date" name="date" class="form-control"  value="{{ @request()->get('date') }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>                                
                                </div>
                            </div> -->
                            <p> Use form below for nested search </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('user.dashboard') }}">
                                        <input type="hidden" name="nestedForm" class="form-control"  value="1">
                                        <div class="input-group">
                                            <div class="col-md-3">
                                                <input type="date" name="date" class="form-control"  value="{{ @request()->get('date') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <select class="form-control" name="agent">
                                                    <option value="0" selected> Select Agent </option>
                                                        @foreach($agents as $agent)
                                                            <option value="{{ $agent->id }}" @if(@$data_value->agent == $agent->id) selected @endif>{{ $agent->name }}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <select class="form-control" name="type">
                                                    <option value="0" selected> Select Status </option>
                                                        @foreach($customer_status as $status)
                                                            <option value="{{ $status->id }}" @if(@$data_value->status == $status->id) selected @endif>{{ $status->name }}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>                                
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($data) > 0)
                            <table class="table table-responsive-sm table-hover table-outline mb-0">
                                <thead class="thead-light">
                                    <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Remarks</th</>
                                    <th>Agent</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr id="tr{{ $row->id }}">
                                            <td>
                                                <div><strong>{{$row->customer_name}}</strong></div>
                                            </td>
                                            <td>
                                                <div><strong>{{ \Carbon\Carbon::parse($row->created_at)->toDateString() }}</strong></div>
                                            </td>
                                            <td>
                                                <div><strong>{{$row->customer_contact_1}}</strong></div>
                                            </td>
                                            <td>
                                                <div><strong>{{$row->customer_status_name}}</strong></div>
                                            </td>
                                            <td>
                                                <div><strong>{{$row->remarks}}</strong></div>
                                            </td>
                                            <td>
                                                <div><strong>{{$row->agent_name}}</strong></div>
                                            </td>
                                            <td>
                                                <div><strong>{{$row->user_name}}</strong></div>
                                            </td>
                                            <td>
                                                <span class="cursor"> <a href="{{ route('user.customer.add', [$row->id, 'page' =>  request()->get('page'), 'search' =>  request()->get('search')]) }}" title="Edit"  class="btn btn-info btn-circle btn-sm m-r-5"><i class="fa fa-edit"></i></a> </span>
                                                <span class="cursor"> <a href="{{ route('user.customer.delete', [$row->id, 'page' =>  request()->get('page'), 'search' =>  request()->get('search')]) }}" title="Delete" onclick="return confirm('Confirm Delete?')"  class="btn btn-danger btn-circle btn-sm m-r-5"><i class="fa fa-trash"></i></a> </span>
                                                <span class="cursor"> <a href="{{ route('user.customer.followUp', [$row->id]) }}" title="Follow Up" class="btn btn-info btn-circle btn-sm m-r-5"><i class="fa fa-phone"></i></a> </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="alert alert-info">No Data found.</div>
                                <div class="return"> <a href="/categories"> Return to Dashboard </a> </div>
                            @endif
                        </div>
                        <div class="pagination">
                            {{ $data->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>
@endsection