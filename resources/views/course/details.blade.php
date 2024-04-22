@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>


<!-- Main Sidebar Container -->
@include('layouts.sidebar')

<div class="content-wrapper" style="height: 100px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Course</h1>
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
  <div class="card-header">Course View Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ url('/campus') }}">Back</a>
                </span>
  </div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Date: {{ $courseview->date }}</h5>
<h5 class="card-text">CN: {{ $courseview->cn }}</h5>
<h5 class="card-text">Container No: {{ $courseview->container_no }}</h5>
<h5 class="card-text">ATA: {{ $courseview->ata }}</h5>
<h5 class="card-text">SKP: {{ $courseview->skp }}</h5>
<h5 class="card-text">Expired: {{ $courseview->expired }}</h5>
<h5 class="card-text">Size: {{ $courseview->size }}</h5>
<h5 class="card-text">Destination: {{ $courseview->destination }}</h5>
<h5 class="card-text">Agent: {{ $courseview->agent }}</h5>
<h5 class="card-text">Depot: {{ $courseview->depot }}</h5>
<h5 class="card-text">KB(Date): {{ $courseview->kb_date }}</h5>
<h5 class="card-text">Send Date: {{ $courseview->send_date }}</h5>
<h5 class="card-text">ECO Depot: {{ $courseview->eco }}</h5>
<h5 class="card-text">Back Date: {{ $courseview->back_date }}</h5>
<h5 class="card-text">Trailer: {{ $courseview->trailer }}</h5>

        &nbsp;
        <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Course Introduction
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <li><a href="https://www.youtube.com/watch?v=2dZiMBwX_5Q">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Software Tools Setup
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        First Step
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      </div>
    </div>
  </div>
</div>
        &nbsp;
        <div class="embed-responsive embed-responsive-16by9">
           <iframe class="embed-responsive-item" src='{{ $courseview-> Youtube_Link_1}}' allowfullscreen></iframe>
           
       </div>
       &nbsp;
       <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src='{{ $courseview-> Youtube_Link_2}}' allowfullscreen></iframe>
       </div>
       &nbsp;
      <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src='{{ $courseview-> Youtube_Link_3}}' allowfullscreen></iframe>
      </div>
  </div>
      
    </hr>
  
  </div>
</div></div>
@stop