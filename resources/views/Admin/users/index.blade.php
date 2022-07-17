@foreach ($user_array as $user)
        <div class="card mb-4">
        <div class="card-header">
            User ID : {{$user->id}}
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="card-title">Nama : {{$user->name}}</h5>
                    <div>Email :{{$user->email}}</div>
                    <div>Role :{{$user->role}}</div>
                </div>
                <div>
                    <ul class="list list-unstyled list-inline">
                        <li class="list-inline-item"><button class="editbtn btn btn-info" value="{{$user->id}}">Edit</button></li>
                        <li class="list-inline-item"><button class="deleteBtn btn btn-danger" value="{{$user->id}}">Delete</button></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    @endforeach