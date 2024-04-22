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
  <div class="container" style= "margin: left 50;">
<div class="card">
  <div class="card-header">Driver View Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ url('/course') }}">Back</a>
                </span>
  </div>
  </div>
  
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Name: {{ $courseview->Name }}</h5>
<h5 class="card-text">Email: {{ $courseview->email }}</h5>
<h5 class="card-text">Contact No: {{ $courseview->contact }}</h5>
<h5 class="card-text">Vechicle No: {{ $courseview->vechicle_no }}</h5>


  </div>
      
    </hr>
  
  </div>
</div></div>
@stop