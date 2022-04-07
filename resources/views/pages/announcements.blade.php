@extends('layouts.admin_layout')
@section('title')
    Announcements
@endsection
@section('content')
    @include('includes.messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAnnouncement">
                        New Announcement
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="createAnnouncement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Announcement!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('announcements.store', $classroom_id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input name="title" type="text" class="form-control" placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Document(If Any)</label>
                                            <input name="document" type="file" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th width="5%" scope="col">SL</th>
                                    <th width="15%" scope="col">Title</th>
                                    <th width="20%" scope="col">Description</th>
                                    <th width="15%" scope="col">Date</th>
                                    <th width="5%" scope="col">View</th>
                                    <th width="15%" scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($announcements as $req)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td>{{ $req->title }}</td>
                                        <td>{{ $req->description }}</td>
                                        <td>{{ $req->created_at }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doc_{{ $req->id }}">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="doc_{{ $req->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Announcement !</h5>
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
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditAn_{{ $req->id }}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="EditAn_{{ $req->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Announcement</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('announcements.update', $req->id) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method("put")
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Title</label>
                                                                    <input value="{{ $req->title }}" name="title" type="text" class="form-control" placeholder="Enter title">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Description</label>
                                                                    <textarea class="form-control" name="description" cols="30" rows="10">
                                                                        {{ $req->description }}
                                                                    </textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Document(If Any)</label>
                                                                    <input name="document" type="file" class="form-control">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAn_{{ $req->id }}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteAn_{{ $req->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure to delete announcement - "{{ $req->title }}"
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            <form action="{{ route('announcements.destroy', $req->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
