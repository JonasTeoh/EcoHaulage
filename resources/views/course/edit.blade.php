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

                <div class="card-header">Import Edit Page
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ url('/course') }}">Back</a>
                    </span>
                </div>
                <div class="card-body">

                    {!! Form::model($course, [
                        'route' => ['course.update', $course->id],
                        'method' => 'PATCH',
                        'enctype' => 'multipart/form-data',
                    ]) !!}
                    <div class="form-group">
                        <strong>Date:</strong>
                        {!! Form::text('date', null, ['placeholder' => 'Date', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>CN:</strong>
                        {!! Form::text('cn', null, ['placeholder' => 'CN', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Container No:</strong>
                        {!! Form::text('container_no', null, ['placeholder' => 'Container No', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>ATA:</strong>
                        {!! Form::text('ata', null, ['placeholder' => 'ATA', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>SKP:</strong>
                        {!! Form::text('skp', null, ['placeholder' => 'SKP', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Expired:</strong>
                        {!! Form::text('expired', null, ['placeholder' => 'Expired', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Size:</strong>
                        {!! Form::text('size', null, ['placeholder' => 'Size', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Destination:</strong>
                        {!! Form::text('destination', null, ['placeholder' => 'Destination', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Agent:</strong>
                        {!! Form::text('agent', null, ['placeholder' => 'Agent', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Depot:</strong>
                        {!! Form::text('depot', null, ['placeholder' => 'Depot', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>KB(Date):</strong>
                        {!! Form::text('kb_date', null, ['placeholder' => 'KB(Date)', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Send Date:</strong>
                        {!! Form::text('send_date', null, ['placeholder' => 'Send Date', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>ECO Depot:</strong>
                        {!! Form::text('eco', null, ['placeholder' => 'ECO Depot', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Back Date:</strong>
                        {!! Form::text('back_date', null, ['placeholder' => 'Back Date', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Trailer:</strong>
                        {!! Form::text('trailer', null, ['placeholder' => 'Trailer', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" onchange="showPhotoUpload(this)">
                            <option value="Pending" {{ $course->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Delivering" {{ $course->status === 'Delivering' ? 'selected' : '' }}>Delivering
                            </option>
                            <option value="Delivered" {{ $course->status === 'Delivered' ? 'selected' : '' }}>Delivered
                            </option>
                        </select>
                    </div>

                    <div class="form-group" id="photo-upload">
                        <label for="photo">Photo:</label>
                        <br>
                        <p style="line-height: 0.5;">Upload evidence of delivery</p>
                        {!! Form::file('img_src', ['class' => 'form-control', 'id' => 'img_src']) !!}
                    </div>

                    <div class="form-group" id="confirmation-choice">
                        <label for="confirmation">Confirmation:</label>
                        <select class="form-control" id="confirmation" name="confirmation">
                            <option value="Disputed" {{ $course->confirmation === 'Disputed' ? 'selected' : '' }}>Disputed</option>
                            <option value="None" {{ $course->confirmation === 'None' ? 'selected' : '' }}>None</option>
                            <option value="Confirmed" {{ $course->confirmation === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <script>
            var uploadGroup = document.getElementById("photo-upload");
            var fileInput = document.getElementById("img_src");
            var confirmationGroup = document.getElementById("confirmation-choice");

            function showPhotoUpload(inputEl) {
                if (inputEl.value == "Delivered") {
                    uploadGroup.hidden = false;
                    fileInput.disabled = false;
                    confirmationGroup.hidden = false;
                } else {
                    uploadGroup.hidden = true;
                    fileInput.disabled = true;
                    confirmationGroup.hidden = true;
                }
            }
            var inputEl = document.getElementById("status")
            showPhotoUpload(inputEl);
        </script>
    @stop
