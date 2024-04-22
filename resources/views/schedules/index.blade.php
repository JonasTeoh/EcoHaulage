@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>


    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')

    <div class="content-wrapper" style="height: 100px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                    <div class="col-sm-10">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container" style="margin: left 60px;">
            <h1>Schedules for {{ $driver->Name }}</h1>

            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">Schedule</div>
                        <div class="card-body">
                            @can('driver-manage')
                                <a href="{{ url('/driver/' . $driver->id . '/schedules/create') }}"
                                    class="btn btn-success btn-sm" title="Add New Course">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                                <br />
                                <br />
                            @endcan
                            <div class="table-responsive">
                                <table id="ListCourse" class="table">

                                    <thead>
                                        <tr>
                                            <th>Import ID</th>
                                            <th>Export ID</th>
                                            <th>Date</th>
                                            <th>Duration</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($driver->schedules as $schedule)
                                            <tr>
                                                <td>{{ $schedule->import_id }}</td>
                                                <td>{{ $schedule->export_id }}</td>
                                                <td>{{ $schedule->date }}</td>
                                                <td> {{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                                                <!-- Display other schedule fields here -->
                                                <td>
                                                    <div class="action-buttons d-flex">
                                                        <a href="{{ url('/driver/' . $driver->id . '/schedules/' . $schedule->id . '/edit') }}"
                                                            class="mr-2"> <button class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> Edit
                                                            </button></a>
                                                        <form action="{{ url('schedules/' . $schedule->id . '/delete') }}"
                                                            method="POST" class="d-inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-warning btn-sm"
                                                                title="Delete Driver"
                                                                onclick="return confirm('Confirm delete?')">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </form>
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

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#ListCourse').DataTable();
            });
        </script>
    @endsection
