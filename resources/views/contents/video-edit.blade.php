@extends('layouts.layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Video</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('video.update', ['id'=>$video->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input value="{{ $video->name}}" type="text" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp" name="name"
                        placeholder="Enter File Name...">
                </div>
                <div class="form-group">
                    <label>Choose File</label> <br />
                    <input type="file" name="file_upload" accept="video/*">
                </div>
                <input type="submit" value="Edit" class="btn btn-primary">
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@stop