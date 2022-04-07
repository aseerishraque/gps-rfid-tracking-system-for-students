@extends('layouts.admin_layout')
@section('title')
    Leave Requests
@endsection
@section('content')
    @include('includes.messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="dataTable" class="table text-center">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">SL</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Classroom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Approve</th>
                                </tr>
                                </thead>
                                <tbody>
                           @foreach($requests as $req)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <th scope="row">{{ $req->student_id }}</th>
                                    <td>{{ $req->student_name }}</td>
                                    <td>{{ $req->classroom_name }}</td>
                                    <td>{{ $req->description }}</td>
                                    <td>{{ $req->start_date.'-'.$req->end_date }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aprove_{{ $req->id }}">
                                            View
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="aprove_{{ $req->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Your Application</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <object
                                                                data='{{ asset("$req->document") }}'
                                                                type="application/pdf"
                                                                width="490"
                                                                height="678"
                                                            >
                                                            </object>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($req->is_approve == 1)
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-info">Pending</span>
                                        @endif
                                    </td>

                                </tr>
                           @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('datatable-styles')
{{--    @include('includes.datatable-styles')--}}
@endsection
@section('datatable-scripts')
{{--    @include('includes.datatable-scripts')--}}
@endsection
