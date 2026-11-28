@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Photos</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('admin.photos.update.save')}}" class="form" id="edit-photos-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$photo->id}}" />
                        @include('shared.alert')
                        @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Photo</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category">Album</label>
                                            <select id="category" name="category" class="form-control">
                                                <option value="">Select Album</option>
                                                @foreach($photoCategories as $cat)
                                                    <option value="{{$cat->id}}" @if($photo->category_id == $cat->id) selected @endif>{{$cat->title}}</option>
                                                @endforeach  
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select Image (allowed only JPG,JPEG &amp; PNG files)</label>
                                            <div class="input-group">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>              
                                            </div>
                                            @if($photo->image)
                                                <img src="{{asset('assets/'.$photo->image)}}" width="100px" class="mt-4 d-block" /> 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btnsubmit" name="btnsubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
        bsCustomFileInput.init();
        $('#edit-photos-form').validate({
            rules:{
                category:{
                    required: true
                },
                image: {
                    extension: "png|jpg|jpeg",
                    maxsize: 2000000,
                },
            },
            messages:{
                category:{
                    required: "Please select album."
                },
                image: {
                    extension: "Please select valid image.",
                    maxsize: "File size must be less than 2MB."
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "image" ) {
                    $(".input-group").after(error);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
@endsection