@extends('layouts.layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Preview Video</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('video.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input value="{{ $video->name}}" type="text" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp" name="name"
                        placeholder="Enter File Name..." disabled>
                                    </div>
                <div class="form-group">
                    <label>Preview</label> <br />
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" controls>
                            <source src="{{$video->path}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@stop