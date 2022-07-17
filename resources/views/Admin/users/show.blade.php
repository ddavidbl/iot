@extends('layouts.admin')

@section('content')
{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit User : <span id="id_user"></span> </h5>
            <input type="hidden" class="d-none" id="iduser">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control " id="editname" name="name">
                    <ul id="name_input"></ul>
                </div>
                <div class="mb-3 form-group">
                    <label for="Lng" class="form-label">Email</label>
                    <input type="email" class="form-control " id="editemail"  name="email">
                    <ul id="email_input"></ul>
                </div>
                <div class="mb-3 form-group">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="editrole" class="form-select">
                        @foreach ($roles as $role)
                            <option class="form-select" value="{{$role->id}}">{{$role->role}}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update_user">Update Data</button>
        </div>
        </div>
    </div>
</div>

{{-- Create Modal --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Create New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control " id="name" name="name">
                    <ul id="name_input"></ul>
                </div>
                <div class="mb-3 form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control " id="email" name="email">
                    <ul id="email_input"></ul>
                </div>
                <div class="mb-3 form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control " id="password" name="password">
                    <ul id="password_input"></ul>
                </div>
                <div class="mb-3 form-group">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        @foreach ( $roles as $role)
                            <option value="{{$role->id}}">{{$role->role}}</option>
                        @endforeach
                    </select>
                    <ul id="role_input"></ul>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_new_user">Save changes</button>
        </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            
            <h5 class="modal-title" id="deleteModalLabel">Delete User :  <span id="delete_userid"></span></h5>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" class="d-none" id="delete_user_id" value="">
            <h2>Please Confirm To Delete This User</h2>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-danger delete_user" >Confirm</button>
        </div>
        </div>
    </div>
</div>

<div class="container">
    <button type="button" class="btn btn-primary py-2 px-4 mb-3 add_user">Add New User</button>
    <div id="success_alert" role="alert" class="alert alert-dismissible fade show d-none">User <span id="res_id_user"></span> <span id="resp_status"></span>
        <button type="button" class="btn btn-close btnclosealert" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div id="renderusers"></div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>

<script>
    $(document).on('click','.btnclosealert', function (e) {
            e.preventDefault();
            $('#res_id_user').html("");
            $('#resp_status').html("");
            $('#success_alert').removeClass('alert-success alert-danger alert-warning');
            $('#success_alert').addClass('d-none');
        });

    
    // Delete Device
        $(document).on('click','.deleteBtn', function (e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#delete_userid').text(user_id);
            $('#delete_user_id').val(user_id);
            $('#deleteModal').modal('show');
            $('#success_alert').addClass("d-none");
        });
        $(document).on('click','.delete_user', function (e) {
            e.preventDefault();

            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            var user_id = $('#delete_user_id').val();
            $.ajax({
                type: "get",
                url: "/admin/user/delete/"+user_id,
                data:{"_method":"DELETE","_token": "{{ csrf_token() }}"},
                success: function (response) {
                    $('#deleteModal').modal('hide');
                    $('#success_alert').removeClass('d-none');
                    $('#success_alert').addClass('alert-success');
                    $('#res_id_user').text(user_id);
                    $('#resp_status').text('Deleted Successfully');
                    users();
                }
            });
        });
        // End of delete request

        // Show and Render Devices List
        var users = function(){$(document).ready(function(){
            $.ajax({
                
                url:"{{route('adminuserlist')}}",
                type:'GET',
                dataType:'json',
                success:function(response){
                    $('#renderusers').html(response.html)
        }})
        })};

        users();

        // Edit And Update Device
        $(document).on('click','.editbtn', function (e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#success_alert').addClass("d-none");
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/user/edit/"+user_id,
                success: function (response) {
                    // console.log(response);
                    if(response.status == 500){
                        $('#success_message').html("");
                        $('#success_message').removeClass('alert-success d-none');
                        $('#success_message').addClass('alert-danger');
                        $('#success_message').append('<strong>'+response.message+'</strong>')
                    }
                    else{
                        $('#id_user').text(response.user.id);
                        $('#iduser').val(response.user.id);
                        $('#editname').val(response.user.name);
                        $('#editemail').val(response.user.email);
                        $('#editrole').val(response.user.role);
                    }
                }
            });

        });
        
        $(document).on('click','.update_user', function (e) {
            e.preventDefault();
            $(this).text('updating');
            var id_user = $('#iduser').val();
            var user_data = {
                'name' : $('#editname').val(),
                'email' : $('#editemail').val(),
                'role' : $('#editrole').val(),
            };
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({
                type: "PATCH",
                url: "/admin/user/update/"+id_user,
                data: user_data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400){
                        $('#name_input','#email_input','#role_input').html("");

                        $('#name_input').addClass('alert alert-danger');
                        $('#email_input').addClass('alert alert-danger');
                        $('#role_input').addClass('alert alert-danger');

                        $('#name_input').append('<li>'+response.errors.name+'</li>');
                        $('#email_input').append('<li>'+response.errors.email+'</li>');
                        $('#role_input').append('<li>'+response.errors.role+'</li>');
                        $('.update_user').text('Update Data');
                    }
                    else if(response.status == 404){
                        $('#success_message').removeClass('d-none alert-success');
                        $('#success_message').addClass('alert-danger')
                        $('#success_message').append('<strong>'+response.message+'</strong>');
                        $('.update_user').text('Update Data');
                    }
                    else{
                        $('#editModal').modal('hide');
                        $('#success_alert').removeClass('d-none');
                        $('#success_alert').addClass('alert-success');
                        $('#res_id_user').text(id_user);
                        $('#resp_status').text('Updated Successfully');
                        $('.update_user').text('Update Data');
                        users();
                    }
                }
            })
        });
            // Create New Device
        $(document).on('click','.add_user', function () {
            $('#createModal').modal('show');
            $('#success_alert').addClass("d-none");
        });
        $(document).on('click','.add_new_user', function (e) {
            e.preventDefault();
            
            var data = {
                'name': $('#name').val(),
                'email': $('#email').val(),
                'role': $('#role').val(),
                'password': $('#password').val(),
            }

            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

            $.ajax({
                type: "POST",
                url: "/admin/user/new/post",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400){
                        $('#name_input','#email_input','#role_input').html("");
                        $('#name_input').addClass('alert alert-danger');
                        $('#email_input').addClass('alert alert-danger');
                        $('#role_input').addClass('alert alert-danger');
                        $('#password_input').addClass('alert alert-danger');
                        $('#name_input').append('<li>'+response.errors.name+'</li>');
                        $('#email_input').append('<li>'+response.errors.email+'</li>');
                        $('#role_input').append('<li>'+response.errors.role+'</li>');
                        $('#password_input').append('<li>'+response.errors.password+'</li>')
                        
                    }
                    else if(response.status == 200){
                        $('#name_input','#email_input','#role_input').html("");
                        $('#createModal').modal('hide');
                        $('#createModal').find('input').val("");
                        $('#success_alert').removeClass('d-none');
                        $('#success_alert').addClass('alert-success');
                        $('#resp_status').text('Successfully Added To Database');
                        users();
                    }
                }
            });
        });
</script>
@endsection