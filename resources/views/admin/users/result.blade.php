<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">All Users</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="100">Action</th>
                        <th>User Type</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Joining Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Action</th>
                        <th>User Type</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Joining Date</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="{{route('users.change', ['id' => $user->id])}}" class="btn btn-outline-dark btn-circle">
                                    <i class="fas fa-unlock"></i>
                                </a>
                                <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-outline-primary btn-circle">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @if(!$user->isAdmin())
                                    <a href="{{route('admin.users.delete', ['id' => $user->id])}}" class="btn btn-outline-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                @php
                                    if($user->role_id == 1) {
                                        $classname = 'bg-danger';
                                    } else if($user->role_id == 2) {
                                        $classname = 'bg-success';
                                    } else if($user->role_id == 3) {
                                        $classname = 'bg-primary';
                                    } else if($user->role_id == 4) {
                                        $classname = 'bg-dark';
                                    }
                                @endphp
                                <div class="{{$classname}} d-inline-flex py-1 px-2">{{$user->role->name}}</div>
                            </td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{($user->status == 1) ? 'Active' : 'Not Active'}}</td>
                            <td>{{Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>