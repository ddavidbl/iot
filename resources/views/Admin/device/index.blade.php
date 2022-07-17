@extends('layouts.admin')

@section('content')
{{-- Volume Modal --}}
<div class="modal fade" id="volumeModal" tabindex="-1" aria-labelledby="volumeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="volumeModalLabel">Device Volume : <span id="id_device"></span> </h5>
            <input type="hidden" class="d-none" id="iddevice">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="panjang" class="form-label">Panjang</label>
                    <input type="number" class="form-control " id="editpanjang" name="panjang">
                    <ul id="panjang_input"></ul>
                </div>
                <div class="mb-3 form-group">
                    <label for="lebar" class="form-label">Lebar</label>
                    <input type="number" class="form-control " id="editlebar" name="lebar">
                    <ul id="lebar_input"></ul>
                </div>
                <div class="mb-3 form-group">
                    <label for="ultrasonic" class="form-label" >Ultrasonic</label>
                    <input type="number" class="form-control " id="ultrasonicvalue" name="ultrasonic" disabled>
                    <ul id="ultrasonic_input"></ul>
                </div>
                {{-- <div class="mb-3 form-group">
                    <label for="volume" class="form-label" >Volume</label>
                    <input type="text" class="form-control " id="editvolume" name="volume" disabled>
                    <ul id="volume_input"></ul>
                </div> --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update_volume">Update Volume</button>
        </div>
        </div>
    </div>
</div>

{{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Device : <span id="id_device"></span> </h5>
                <input type="hidden" class="d-none" id="iddevice">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="Lat" class="form-label">Lat</label>
                        <input type="number" class="form-control " id="editlat" aria-describedby="latHelp" name="lat">
                        <div id="latHelp" class="form-text">Input Lat Value</div>
                        <ul id="lat_input"></ul>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="Lng" class="form-label">Lng</label>
                        <input type="number" class="form-control " id="editlng" aria-describedby="lngHelp" name="lng">
                        <div id="lngHelp" class="form-text">Input Lng Value</div>
                        <ul id="lng_input"></ul>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control " id="editlokasi" name="lokasi">
                        <ul id="lokasi_input"></ul>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_device">Update Data</button>
            </div>
            </div>
        </div>
    </div>

{{-- Create Modal --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create New Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="Lat" class="form-label">Lat</label>
                        <input type="number" class="form-control " id="lat" aria-describedby="latHelp" name="lat">
                        <div id="latHelp" class="form-text">Input Lat Value</div>
                        <ul id="lat_input"></ul>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="Lng" class="form-label">Lng</label>
                        <input type="number" class="form-control " id="lng" aria-describedby="lngHelp" name="lng">
                        <div id="lngHelp" class="form-text">Input Lng Value</div>
                        <ul id="lng_input"></ul>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control " id="lokasi" name="lokasi">
                        <ul id="lokasi_input"></ul>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_device">Save changes</button>
            </div>
            </div>
        </div>
    </div>

{{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="deleteModalLabel">Delete Device :  <span id="delete_deviceid"></span></h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="d-none" id="delete_dev_id" value="">
                <h2>Please Confirm To Delete This Device and Device Log Data</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger delete_dev" >Confirm</button>
            </div>
            </div>
        </div>
    </div>

<div class="container">
    <button type="button" class="btn btn-primary py-2 px-4 mb-3 add_dev">
        Add New device
    </button>
    <div id="success_alert" role="alert" class="alert alert-dismissible fade show d-none">
        Device <span id="res_id_dev"></span> <span id="resp_status"></span>
        <button type="button" class="btn btn-close btnclosealert" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div id="renderdevices"></div>
</div>

@endsection

@section('scripts')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
<script>

    $(document).ready(function () {

        $(document).on('click','.btnclosealert', function (e) {
            e.preventDefault();
            $('#res_id_dev').html("");
            $('#resp_status').html("");
            $('#success_alert').removeClass('alert-success alert-danger alert-warning');
            $('#success_alert').addClass('d-none');
        });

        // Device Volume
        $(document).on('click','.volumeBtn', function (e) { 
            e.preventDefault();
            var dev_id = $(this).val();
            $('#success_alert').addClass('d-none');
            $('#volumeModal').modal('show');
            $.ajax({
            type: "GET",
            url: "/admin/volume/edit/"+dev_id,
            success: function (response) {
                if(response.status == 500){
                    $('#success_message').html("");
                    $('#success_message').removeClass('alert-success d-none');
                    $('#success_message').addClass('alert-danger');
                    $('#success_message').append('<strong>'+response.message+'</strong>')
                } 
                else{
                    $('#id_device').text(response.device.id);
                    $('#iddevice').val(response.device.id);
                    $('#editpanjang').val(response.device.panjang);
                    $('#editlebar').val(response.device.lebar);
                    $('#ultrasonicvalue').val(response.ultrasonic.ultrasonic);
                    // $('#editvolume').val($('#editlebar').val() * $('#editpanjang').val() * $('#ultrasonicvalue').val());
                }
            }
        });
        });

        $(document).on('click','.update_volume', function (e) {
            e.preventDefault();
            $(this).text('updating');
            var device_id = $('#iddevice').val();
            var volume = $('#editlebar').val() * $('#editpanjang').val() * $('#ultrasonicvalue').val();
            var volume_data = {
                'panjang' : $('#editpanjang').val(),
                'lebar' : $('#editlebar').val(),
                'volume': volume,
            };
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

            $.ajax({
                type: "PATCH",
                url: "/admin/volume/update/"+device_id,
                data: volume_data,
                dataType: "json",
                success: function (response) {
                    if(response.status === 400){
                        $('#panjang_input','#lebar_input').html("");

                        $('#panjang_input').addClass('alert alert-danger');
                        $('#lebar_input').addClass('alert alert-danger');
                        
                        $('#panjang_input').append('<li>'+response.errors.panjang+'</li>');
                        $('#lebar_input').append('<li>'+response.errors.lebar+'</li>');

                        $('.updateVolume').text('Update Data');
                    }else if(response.status == 404){
                        $('#success_message').removeClass('d-none alert-success');
                        $('#success_message').addClass('alert-danger')
                        $('#success_message').append('<strong>'+response.message+'</strong>');
                        $('.update_device').text('Update Data');
                    } else{
                        $('#volumeModal').modal('hide');
                        $('#success_alert').removeClass('d-none');
                        $('#success_alert').addClass('alert-success');
                        $('#res_id_dev').text(device_id);
                        $('#resp_status').text('Updated Successfully');
                        devices();
                    }
                }
            });
        });

        
        
        
        // Delete Device
        $(document).on('click','.deleteBtn', function (e) {
            e.preventDefault();
            var device_id = $(this).val();
            $('#delete_deviceid').text(device_id);
            $('#delete_dev_id').val(device_id);
            $('#deleteModal').modal('show');
            $('#success_alert').addClass("d-none");
        });
        $(document).on('click','.delete_dev', function (e) {
            e.preventDefault();

            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            var device_id = $('#delete_dev_id').val();
            $.ajax({
                type: "get",
                url: "/admin/device/delete/"+device_id,
                data:{"_method":"DELETE","_token": "{{ csrf_token() }}"},
                success: function (response) {
                    $('#deleteModal').modal('hide');
                    $('#success_alert').removeClass('d-none');
                    $('#success_alert').addClass('alert-success');
                    $('#res_id_dev').text(device_id);
                    $('#resp_status').text('Deleted Successfully');
                    devices();
                }
            });
        });
        // End of delete request

        // Show and Render Devices List
        var devices = function(){$(document).ready(function(){
            $.ajax({
                async:false,
                url:"{{route('admindevicelist')}}",
                type:'GET',
                dataType:'json',
                success:function(response){
                    $('#renderdevices').html(response.html)
        }})
        })};
    
        devices();
        
        //End of Show and Render

        // Edit And Update Device
        $(document).on('click','.editbtn', function (e) {
            e.preventDefault();
            var device_id = $(this).val();
            $('#success_alert').addClass("d-none");
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/device/edit/"+device_id,
                success: function (response) {
                    // console.log(response);
                    if(response.status == 500){
                        $('#success_message').html("");
                        $('#success_message').removeClass('alert-success d-none');
                        $('#success_message').addClass('alert-danger');
                        $('#success_message').append('<strong>'+response.message+'</strong>')
                    }
                    else{
                        $('#id_device').text(response.device.id);
                        $('#iddevice').val(response.device.id);
                        $('#editlat').val(response.device.lat);
                        $('#editlng').val(response.device.lng);
                        $('#editlokasi').val(response.device.lokasi);
                    }
                }
            });

        });
        
        $(document).on('click','.update_device', function (e) {
            e.preventDefault();
            $(this).text('updating');
            var id_device = $('#iddevice').val();
            var device_data = {
                'lat' : $('#editlat').val(),
                'lng' : $('#editlng').val(),
                'lokasi' : $('#editlokasi').val(),
            };
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({
                type: "PATCH",
                url: "/admin/device/update/"+id_device,
                data: device_data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400){
                        $('#lokasi_input','#lng_input','#lat_input').html("");

                        $('#lat_input').addClass('alert alert-danger');
                        $('#lng_input').addClass('alert alert-danger');
                        $('#lokasi_input').addClass('alert alert-danger');

                        $('#lat_input').append('<li>'+response.errors.lat+'</li>');
                        $('#lng_input').append('<li>'+response.errors.lng+'</li>');
                        $('#lokasi_input').append('<li>'+response.errors.lokasi+'</li>');
                        $('.update_device').text('Update Data');
                    }
                    else if(response.status == 404){
                        $('#success_message').removeClass('d-none alert-success');
                        $('#success_message').addClass('alert-danger')
                        $('#success_message').append('<strong>'+response.message+'</strong>');
                        $('.update_device').text('Update Data');
                    }
                    else{
                        $('#editModal').modal('hide');
                        $('#success_alert').removeClass('d-none');
                        $('#success_alert').addClass('alert-success');
                        $('#res_id_dev').text(id_device);
                        $('#resp_status').text('Updated Successfully');
                        devices();
                    }
                }
            });
        });

        // Create New Device
        $(document).on('click','.add_dev', function () {
            $('#createModal').modal('show');
            $('#success_alert').addClass("d-none");
        });
        $(document).on('click','.add_device', function (e) {
            e.preventDefault();
            
            var data = {
                'lat': $('#lat').val(),
                'lng': $('#lng').val(),
                'lokasi': $('#lokasi').val(),
            }

            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

            $.ajax({
                type: "POST",
                url: "/admin/device/new/post",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400){

                        $('#lokasi_input','#lng_input','#lokasi_input').html("");


                        $('#lat_input').addClass('alert alert-danger');
                        $('#lng_input').addClass('alert alert-danger');
                        $('#lokasi_input').addClass('alert alert-danger');
                        
                        $('#lat_input').append('<li>'+response.errors.lat+'</li>');
                        $('#lng_input').append('<li>'+response.errors.lng+'</li>');
                        $('#lokasi_input').append('<li>'+response.errors.lokasi+'</li>');
                        
                    }
                    else if(response.status == 200){
                        $('#lokasi_input','#lng_input','#lokasi_input').html("");
                        $('#createModal').modal('hide');
                        $('#createModal').find('input').val("");
                        $('#success_alert').removeClass('d-none');
                        $('#success_alert').addClass('alert-success');
                        $('#resp_status').text('Successfully Added To Database');
                        devices();
                    }
                }
            });
        });
    });
</script>
<script>
    
</script>

@endsection