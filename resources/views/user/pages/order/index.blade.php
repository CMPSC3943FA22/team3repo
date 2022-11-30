@extends('user.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($orderlists) > 0)
                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address Line 1</th>
                                        <th>Address Line 2</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($orderlists as $row)
                                        <tr id="tr{{ $row->id }}">
                                            <td>{{$count}}</td>
                                            <td>
                                                {{$row->name}}
                                            </td>
                                            <td>
                                                {{$row->email}}
                                            </td>
                                            <td>
                                                {{$row->mobile_number}}
                                            </td>
                                            <td>
                                                {{$row->address_line1}}
                                            </td>
                                            <td>
                                                {{$row->address_line2}}
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">No Data found.</div>
                            @endif
                        </div>
                        <div class="pagination">
                            {{ $orderlists->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>
@endsection