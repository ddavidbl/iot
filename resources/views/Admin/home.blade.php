@extends('layouts.admin')

@section('content')
<div class="container d-flex flex-wrap justify-content-start" id="Data"></div>
@endsection

@section('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
        var data = function(){$(document).ready(function(){
            $.ajax({
                async:false,
                url:"{{route('adminlatestdata')}}",
                type:'GET',
                dataType:'json',
                success:function(response){
                    $('#Data').html(response.html)
                    
        }})
        })};
    
        data();
        setInterval(() => {
            data();
        }, 5000);
        
    </script>
@endsection
    