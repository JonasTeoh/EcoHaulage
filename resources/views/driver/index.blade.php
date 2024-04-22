@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>

    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')
    <style>
        .schedule-divider {
            margin-top: 10px;
            /* Adjust this value as needed */
            margin-bottom: 10px;
            /* Adjust this value as needed */
            border: none;
            border-top: 1px solid #ddd;
            /* Change the color as needed */
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="height: 100px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Driver</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-10">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container" style="margin: left 60px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Drivers and Schedules</div>
                        <div class="card-body">

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <a href="{{ url('/driver/create') }}" class="btn btn-success btn-sm" title="Add New Course">

                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <br>
                            <br>

                            <div class="table-responsive">
                                <table id="ListCourse" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>

                                            <th>Contact No</th>
                                            <th>Vehicle No</th>
                                            <th>Duration</th>

                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course as $driver)
                                            <tr>
                                                <td>{{ $driver->id }}</td>
                                                <td>{{ $driver->user->name }}</td>

                                                <td>{{ $driver->contact }}</td>
                                                <td>{{ $driver->vechicle_no }}</td>
                                                <td>
                                                    @foreach ($driver->schedules as $index => $schedule)
                                                        {{ $schedule->start_time }} - {{ $schedule->end_time }}<br>
                                                        @if ($index < count($driver->schedules) - 1)
                                                            <hr class="schedule-divider">
                                                        @endif
                                                    @endforeach
                                                <td>
                                                    @foreach ($driver->schedules as $index => $schedule)
                                                        {{ $schedule->date }}<br>
                                                        @if ($index < count($driver->schedules) - 1)
                                                            <hr class="schedule-divider">
                                                        @endif
                                                    @endforeach

                                                </td>
                                                <td>
                                                    <div class="action-buttons d-flex">
                                                        <a href="{{ url('/driver/' . $driver->id) }}" title="View Driver"
                                                            class="mr-2">
                                                            <button class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                                            </button>
                                                        </a>
                                                        <a href="{{ url('/driver/' . $driver->id . '/schedules/index') }}"
                                                            title="Schedule" class="mr-2">
                                                            <button class="btn btn-warning btn-sm">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> Schedule
                                                            </button>
                                                        </a>
                                                        <a href="{{ url('/driver/' . $driver->id . '/edit') }}"
                                                            title="Edit Driver" class="mr-2">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ url('/driver' . '/' . $driver->id) }}"
                                                            accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm"
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

        <!-- REQUIRED SCRIPTS -->
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
