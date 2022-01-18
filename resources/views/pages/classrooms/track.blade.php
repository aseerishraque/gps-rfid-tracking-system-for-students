@extends('layouts.admin_layout')
@section('title')
    Track Students
@endsection
@section('content')
    <div class="m-3 row justify-content-center">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-body">
                    <button class="btn btn-primary mb-2" id="create-polygon">Set Boundary</button>
                    <button class="btn btn-primary mb-2" id="student-gps-fetch-control">
                        <i class="fa fa-map-marker-alt mr-2"></i>
                        Fetch Student GPS
                    </button>
                    <!-- <button class="btn btn-danger mb-2" id="student-gps-fetch-control">
                        <i class="fa fa-stop mr-2"></i>
                        Stop Student Data Fetching
                    </button> -->
                    <button class="btn btn-primary mb-2" id="take-attendance">Take Attendance</button>
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
