@extends('user.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{route('user.category.add', [0])}}" data-toggle="modal" data-id="0" data-backdrop="static" class="btn btn-pill btn-success"><i class="fa fa-plus"></i>&nbsp;Add</a>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('user.category') }}">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search Category"  value="{{ @request()->get('search') }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
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
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr id="tr{{ $row->id }}">
                                            <td>
                                                <div><strong>{{@$row->name}}</strong></div>
                                            </td>
                                            <td>
                                                <div><strong>{{$row->description}}</strong></div>
                                            </td>
                                            <td>
                                                @if($row->status == 0)
                                                    <div style="color:red;"><strong>Disabled</strong></div>
                                                @elseif($row->status == 1)
                                                    <div style="color:green;"><strong>Enabled</strong></div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="cursor"> <a href="{{ route('user.category.add', [$row->id, 'page' =>  request()->get('page'), $row->id, 'search' =>  request()->get('search')]) }}" title="Edit"  class="btn btn-info btn-circle btn-sm m-r-5"><i class="fa fa-edit"></i></a> </span>
                                                <span class="cursor"> <a href="{{ route('user.category.delete', [$row->id, 'page' =>  request()->get('page'), $row->id, 'search' =>  request()->get('search')]) }}" title="Delete" onclick="return confirm('Confirm Delete?')"  class="btn btn-danger btn-circle btn-sm m-r-5"><i class="fa fa-trash"></i></a> </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="alert alert-info">No Data found.</div>
                                <div class="return"> <a href="/category"> Return to Dashboard </a> </div>
                            @endif
                        </div>
                        <div class="pagination">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>
@endsection