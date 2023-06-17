@extends('layouts.layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Video List</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('video.create') }}" class="btn float-right btn-primary mb-2">+ Add Video </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Name</th>
                            <th width="25%">Created By</th>
                            <th width="20%">Created At</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $key => $video)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $video->name }}</td>
                                <td>{{ $video->created_by }}</td>
                                <td>{{ date("d-m-Y H:i", strtotime($video->created_at)) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('video.view', $video->id) }}" class="btn btn-primary"><i class="fas fa-fw fa-eye"></i></a>
                                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="{{ route('video.delete', $video->id) }}" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@stop