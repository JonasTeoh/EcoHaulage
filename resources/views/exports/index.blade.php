@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>
    <style>
        .btn-self {
            border: none;
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
                        <h1 class="m-0">Export</h1>
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
                        <div class="card-header">Export</div>
                        <div class="card-body">
                            @can('export-create')
                                <a href="{{ url('/exports/create') }}" class="btn btn-success btn-sm" title="Add New Course">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>

                            <a class="btn btn-success btn-sm" style="background-color: blue"
                                href="{{ URL::to('/exports/pdf') }}">Export to PDF</a>

                                <a class="btn btn-success btn-sm" style="background-color: blue"
                                    href="{{ URL::to('/exports/export') }}">Export to Excel</a>
                            @endcan

                            <br />
                            <br />
                            <div class="table-responsive">
                                <table id="ListCourse" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>CN</th>
                                            <th>Booking</th>
                                            <th>Container</th>
                                            <th>Seal</th>
                                            <th>Size</th>
                                            <th>Destination</th>
                                            <th>SCN</th>
                                            <th>CDA</th>
                                            <th>Vessel Name</th>
                                            <th>Req Date</th>
                                            <th>Gate Open</th>
                                            <th>Closing</th>
                                            <th>Agent</th>
                                            <th>Depot</th>
                                            <th>Depot Date</th>
                                            <th>Send Date</th>
                                            <th>Back Date</th>
                                            <th>Trailer</th>
                                            <th>Status</th>
                                            <th>Confirmation</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>{{ $item->cn }}</td>
                                                <td>{{ $item->booking }}</td>
                                                <td>{{ $item->container }}</td>
                                                <td>{{ $item->seal }}</td>
                                                <td>{{ $item->size }}</td>
                                                <td>{{ $item->destination }}</td>
                                                <td>{{ $item->scn }}</td>
                                                <td>{{ $item->cda }}</td>
                                                <td>{{ $item->vessel_name }}</td>
                                                <td>{{ $item->req_date }}</td>
                                                <td>{{ $item->gate_open }}</td>
                                                <td>{{ $item->clossing }}</td>
                                                <td>{{ $item->agent }}</td>
                                                <td>{{ $item->depot }}</td>
                                                <td>{{ $item->depot_date }}</td>
                                                <td>{{ $item->send_date }}</td>
                                                <td>{{ $item->back_date }}</td>
                                                <td>{{ $item->trailer }}</td>
                                                <td>
                                                    <div class="action-buttons d-flex"
                                                        style="disply: flex; justify-content:center; margin-right:20px;">
                                                        <button
                                                            class="btn btn-sm {{ $item->status === 'Pending' ? 'btn-warning' : ($item->status === 'On the Way' ? 'btn-info' : 'btn-success') }}">{{ $item->status }}</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="action-buttons d-flex"
                                                        style="disply: flex; justify-content:center; margin-right:30px;">
                                                        <button
                                                            class="btn btn-sm {{ $item->confirmation === 'Disputed' ? 'btn-warning' : ($item->confirmation === 'None' ? 'btn-self' : 'btn-success') }}">{{ $item->confirmation }}</button>

                                                    </div>
                                                </td>
                                                <td>

                                                    <div class="action-buttons d-flex">
                                                        @can('export-delete')
                                                        <a href="{{ url('/exports/' . $item->id . '/pdf') }}"
                                                            title="Export pdf" class="mr-2">
                                                            <button class="btn btn-warning btn-sm">
                                                                <i class="fa-regular fa-file" aria-hidden="true"></i> ROT
                                                            </button>
                                                        </a>
                                                        @endcan
                                                        <a href="{{ url('/exports/' . $item->id . '/cn') }}"
                                                            title="Export pdf" class="mr-2">
                                                            <button class="btn btn-warning btn-sm">
                                                                <i class="fa-regular fa-file" aria-hidden="true"></i> CN
                                                            </button>
                                                        </a>
                                                        @can('export-list')
                                                            <a href="{{ url('/exports/' . $item->id) }}" title="View Course"
                                                                class="mr-2">
                                                                <button class="btn btn-info btn-sm">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                                </button>
                                                            </a>
                                                        @endcan
                                                        @can('export-edit')
                                                            <a href="{{ url('/exports/' . $item->id . '/edit') }}"
                                                                title="Edit Course" class="mr-2">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                    Edit
                                                                </button>
                                                            </a>
                                                        @endcan
                                                        @can('export-delete')
                                                            <form method="POST"
                                                                action="{{ url('/exports' . '/' . $item->id) }}"
                                                                accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    title="Delete Course"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                                </button>
                                                            </form>
                                                        @endcan
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
                $('#ListCourse').DataTable({
                    scrollCollapse: true,
                    scrollX: true,
                });
            });
        </script>
    @endsection
