@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Change User Password</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('users.password.change')}}" class="form" id="change-users-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}" />
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
                                <h3 class="card-title">Edit Record</h3>
                            </div>
                            <div class="card-body">
                                <h6>
                                    @if($user->role_id == 2)
                                        <div class="bg-success d-inline-flex py-1 px-2 mr-2">{{$user->role->name}}</div>{{ $user->name }}
                                    @elseif($user->role_id == 3)
                                        <div class="bg-primary d-inline-flex py-1 px-2 mr-2">{{$user->role->name}}</div>{{ $user->name }}
                                    @elseif($user->role_id == 4)
                                        <div class="bg-dark d-inline-flex py-1 px-2 mr-2">{{$user->role->name}}</div>{{ $user->name }}
                                    @endif
                                </h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password*</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"  maxlength="16">
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
<script>
    $(function () {
        $('#change-users-form').validate({
            rules:{
                password: {
                    required: true
                }
            },
            messages:{
                password:{
                    required: "Plese enter password.",
                }
            }
        });
    });
</script>
@endsection