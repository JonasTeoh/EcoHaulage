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
  <div class="container" style= "margin: left 50;">
<div class="card">
  <div class="card-header">Export View Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ url('/course') }}">Back</a>
                </span>
  </div>
  </div>

  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Date: {{ $courseview->date }}</h5>
<h5 class="card-text">CN: {{ $courseview->cn }}</h5>
<h5 class="card-text">Booking: {{ $courseview->booking }}</h5>
<h5 class="card-text">Container: {{ $courseview->container }}</h5>
<h5 class="card-text">Seal: {{ $courseview->seal }}</h5>
<h5 class="card-text">Size: {{ $courseview->size }}</h5>
<h5 class="card-text">Destination: {{ $courseview->destination }}</h5>
<h5 class="card-text">SCN: {{ $courseview->scn }}</h5>
<h5 class="card-text">CDA: {{ $courseview->cda }}</h5>
<h5 class="card-text">Vessel Name: {{ $courseview->vessel_name }}</h5>
<h5 class="card-text">Req Date: {{ $courseview->req_date }}</h5>
<h5 class="card-text">Gate Open: {{ $courseview->gate_open }}</h5>
<h5 class="card-text">Closing: {{ $courseview->clossing }}</h5>
<h5 class="card-text">Agent: {{ $courseview->agent }}</h5>
<h5 class="card-text">Depot: {{ $courseview->depot }}</h5>
<h5 class="card-text">Depot Date: {{ $courseview->depot_date }}</h5>
<h5 class="card-text">Send Date: {{ $courseview->send_date }}</h5>
<h5 class="card-text">Back Date: {{ $courseview->back_date }}</h5>
<h5 class="card-text">Trailer: {{ $courseview->trailer }}</h5>
<h5 class="card-text">Status: <button class="btn btn-sm {{ $courseview->status === 'Pending' ? 'btn-warning' : ($courseview->status === 'Delivering' ? 'btn-info' : 'btn-success') }}">{{ $courseview->status }}</button>        </div></td>
</h5>
<h5 class="card-text">Confirmation:
    <button
        class="btn btn-sm {{ $courseview->confirmation === 'Disputed' ? 'btn-warning' : ($courseview->confirmation === 'None' ? 'btn-self' : 'btn-success') }}">{{ $courseview->confirmation }}</button>
</h5>
<h5 class="card-text">Photo: <img style="width: 100%" src="{{ asset('imgs/' . $courseview->img_src) }}" />
</h5>
  </div>

    </hr>

  </div>
</div></div>
@stop
