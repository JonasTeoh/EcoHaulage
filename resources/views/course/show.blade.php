@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>
    <style>
        .btn-self {
            border:none;
            background-color: lightgray;
        }
    </style>

    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="height: 100px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Import</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-10">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container" style= "margin: left 50;">
            <div class="card">
                <div class="card-header">Import View Page
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ url('/course') }}">Back</a>
                    </span>
                </div>
            </div>

            <div class="card-body">

                <div class="card-body">
                    <h5 class="card-title">Date: {{ $course->date }}</h5>
                    <h5 class="card-text">CN: {{ $course->cn }}</h5>
                    <h5 class="card-text">Container No: {{ $course->container_no }}</h5>
                    <h5 class="card-text">ATA: {{ $course->ata }}</h5>
                    <h5 class="card-text">SKP: {{ $course->skp }}</h5>
                    <h5 class="card-text">Expired: {{ $course->expired }}</h5>
                    <h5 class="card-text">Size: {{ $course->size }}</h5>
                    <h5 class="card-text">Destination: {{ $course->destination }}</h5>
                    <h5 class="card-text">Agent: {{ $course->agent }}</h5>
                    <h5 class="card-text">Depot: {{ $course->depot }}</h5>
                    <h5 class="card-text">KB(Date): {{ $course->kb_date }}</h5>
                    <h5 class="card-text">Send Date: {{ $course->send_date }}</h5>
                    <h5 class="card-text">ECO Depot: {{ $course->eco }}</h5>
                    <h5 class="card-text">Back Date: {{ $course->back_date }}</h5>
                    <h5 class="card-text">Trailer: {{ $course->trailer }}</h5>
                    <h5 class="card-text">Status:
                        <button
                            class="btn btn-sm {{ $course->status === 'Pending' ? 'btn-warning' : ($course->status === 'Delivering' ? 'btn-info' : 'btn-success') }}">{{ $course->status }}</button>
                    </h5>
                    <h5 class="card-text">Confirmation:
                        <button
                            class="btn btn-sm {{ $course->confirmation === 'Disputed' ? 'btn-warning' : ($course->confirmation === 'None' ? 'btn-self' : 'btn-success') }}">{{ $course->confirmation }}</button>
                    </h5>
                    <h5 class="card-text">Photo: <img style="width: 100%" src="{{ asset('imgs/' . $course->img_src) }}" />
                    </h5>
                </div>
                </td>
                </h5>


            </div>



        </div>
    </div>
    </div>
@stop
