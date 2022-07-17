@extends('layouts.app')

@section('content')

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

<div class="container">
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

        // Device Volume
        $(document).on('click','.volumeBtn', function (e) { 
            e.preventDefault();
            var dev_id = $(this).val();
            $('#success_alert').addClass('d-none');
            $('#volumeModal').modal('show');
            $.ajax({
            type: "GET",
            url: "/user/volume/edit/"+dev_id,
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
                url: "/user/volume/update/"+device_id,
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

        // Show and Render Devices List
        var devices = function(){$(document).ready(function(){
            $.ajax({
                async:false,
                url:"{{route('render')}}",
                type:'GET',
                dataType:'json',
                success:function(response){
                    $('#renderdevices').html(response.html)
        }})
        })};
    
        devices();
        
</script>
<script>
    
</script>

@endsection