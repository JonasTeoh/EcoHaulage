@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>


    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="height: 100px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Schedule for {{ $driver->Name }}</h1>
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
                <div class="card-header">Schedule Page
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('driver.index') }}">Back</a>
                    </span>
                </div>
                <div class="card-body">

                    {!! Form::open(['route' => ['schedules.store', $driver->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('driverid', $driver->id) !!} <!-- Add this hidden input field -->
                    <div class="form-group">
                        <strong>Import ID</strong>
                        {!! Form::select('import_id', $imports, null, ['class' => 'form-select']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Export ID</strong>
                        {!! Form::select('export_id', $exports, null, ['class' => 'form-select']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Date:</strong>
                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Start Time:</strong>
                        {!! Form::time('start_time', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>End Time:</strong>
                        {!! Form::time('end_time', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Add other fields related to the schedule as needed -->
                    {!! Form::submit('Add Schedule', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            @endsection
