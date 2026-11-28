@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Photos</h1>
                        <div>
                            <a href="{{route('admin.photos.add')}}" class="btn btn-primary">Add New Photo</a>
                            <a href="{{route('admin.photos.addbulk')}}" class="btn btn-primary">Upload Bulk Photos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('shared.alert')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Photos</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Image</th>
                                            <th>Album</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Image</th>
                                            <th>Album</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($photos as $photo)
                                            <tr>
                                                <td style="min-width: 100px;">
                                                    <a href="{{route('admin.photos.edit', ['id' => $photo->id])}}" class="btn btn-primary btn-circle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="{{route('admin.photos.delete', ['id' => $photo->id])}}" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td>@if($photo->image) <img src="{{asset('assets/'.$photo->image)}}" width="100px"/> @endif</td>
                                                <td>@if(isset($photo->photo_category->title)) {{$photo->photo_category->title}} @endif</td>
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
    </div>
@endsection
@section('footer')
@endsection