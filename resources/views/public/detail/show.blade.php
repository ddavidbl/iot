@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="col-8 offset-2 mb-4">
    	    <canvas id='suhu'></canvas>
        </div>
    
        <div class="col-8 offset-2 mb-4">
            <canvas id='ph'></canvas>
        </div>

        <div class="col-8 offset-2 mb-4">
            <canvas id='dochart'></canvas>
        </div>

        <div class="col-8 offset-2 mb-4">
            <canvas id='ultrasonic'></canvas>
        </div>

        <div class="col-8 offset-2 mb-4">
            <canvas id='kekeruhan'></canvas>
        </div>

        <div class="col-8 offset-2 mb-4">
            <canvas id='tds'></canvas>
        </div>

        <div class="col-8 offset-2 mb-4">
            <canvas id='konduktifitas'></canvas>
        </div>

	{{-- add chart here --}}
	</div>
@endsection
@section('scripts')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>

<script>
var update = function() {
    $.ajax({
        url: "{{ route('UpdateChart',$area) }}",
        type: 'GET',
        dataType: 'json',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
        suhuchart.data.labels = data.time;
        suhuchart.data.datasets[0].data = data.suhu;
        suhuchart.update();
        
        phchart.data.labels = data.time;
        phchart.data.datasets[0].data = data.ph;
        phchart.update();

        dochart.data.labels = data.time;
        dochart.data.datasets[0].data = data.do;
        dochart.update();

        ultrasonicchart.data.labels = data.time;
        ultrasonicchart.data.datasets[0].data = data.ultrasonic;
        ultrasonicchart.update();

        kekeruhanchart.data.labels = data.time;
        kekeruhanchart.data.datasets[0].data = data.kekeruhan;
        kekeruhanchart.update();

        tdschart.data.labels = data.time;
        tdschart.data.datasets[0].data = data.tds;
        tdschart.update();

        konduktifitaschart.data.labels = data.time;
        konduktifitaschart.data.datasets[0].data = data.konduktifitas;
        konduktifitaschart.update();

        
        },
        error: function(data){
        console.log(data);
        }
    });
}
    var suhu = document.getElementById("suhu");
    var suhuchart = new Chart(suhu, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Sensor Suhu',
        data: [],
        borderWidth: 1
        }],
    },
    options: {
        scales: {
        xAxes: {
            title:{
                display:true,
                text:'Time'
            }
        },
        yAxes: {
            title:{
                display:true,
                text:'Suhu'
            }
        }
        },      
    }
    });

    var ph = document.getElementById("ph");
    var phchart = new Chart(ph, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Sensor PH',
        data: [],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [],
        yAxes: [{
            ticks: {
            beginAtZero:true
            }
        }]
        }
    }
    });

    var datado = document.getElementById("dochart");
    var dochart = new Chart(datado, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Sensor DO',
        data: [],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [],
        yAxes: [{
            ticks: {
            beginAtZero:true
            }
        }]
        }
    }
    });

    var ultrasonic = document.getElementById("ultrasonic");
    var ultrasonicchart = new Chart(ultrasonic, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Sensor Ultrasonic',
        data: [],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [],
        yAxes: [{
            ticks: {
            beginAtZero:true
            }
        }]
        }
    }
    });

    var kekeruhan = document.getElementById("kekeruhan");
    var kekeruhanchart = new Chart(kekeruhan, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Sensor Kekeruhan',
        data: [],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [],
        yAxes: [{
            
        }]
        }
    }
    });
    

    var tds = document.getElementById("tds");
    var tdschart = new Chart(tds, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Sensor TDS',
        data: [],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [],
        yAxes: [{
            ticks: {
            beginAtZero:true
            }
        }]
        }
    }
    });

    var konduktifitas = document.getElementById('konduktifitas');
    var konduktifitaschart = new Chart(konduktifitas,{
        type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Sensor Konduktifitas',
        data: [],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [],
        yAxes: [{
            ticks: {
            beginAtZero:true
            }
        }]
        }
    }
    
    })

    update();
    setInterval(() => {
    update();
    }, 1000);
</script>

@endsection