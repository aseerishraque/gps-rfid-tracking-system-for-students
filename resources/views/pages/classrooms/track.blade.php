@extends('layouts.admin_layout')
@section('title')
    Track Students
@endsection
@section('content')
    <div class="m-3 row justify-content-center">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-body">
                    <button class="btn btn-primary" id="create-polygon">Take Attendace</button>
                    <!-- <button class="btn btn-primary" id="current-location">Get location</button> -->
                    <div id="student-attended"></div>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
   <!-- @include('includes.code-refresh-script') -->
   @include('includes.gmaps.scripts')
@endsection
