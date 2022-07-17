@extends('layouts.admin')

@section('content')
<div class="col-10 offset-1 mb-4">
    <canvas id='suhu'></canvas>
</div>
<div class="col-10 offset-1 mb-4">
    <canvas id='ph'></canvas>
</div>
<div class="col-10 offset-1 mb-4">
    <canvas id='do'></canvas>
</div>
<div class="col-10 offset-1 mb-4">
    <canvas id='ultrasonic'></canvas>
</div>
<div class="col-10 offset-1 mb-4">
    <canvas id='kekeruhan'></canvas>
</div>
<div class="col-10 offset-1 mb-4">
    <canvas id='tds'></canvas>
</div>
<div class="col-10 offset-1 mb-4">
    <canvas id='konduktifitas'></canvas>
</div>

{{-- give sroll for y axes --}}
@endsection

@section('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
            var suhu = document.getElementById('suhu');
            var suhuchart = new Chart(suhu, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                label: 'Sensor Suhu 1',
                data: [],
                borderColor: 'rgb(0, 204, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y',
                },
                {
                label: 'Sensor Suhu 2',
                data: [],
                borderColor: 'rgb(0, 102, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y2',
                },
                {
                label: 'Sensor Suhu 3',
                data: [],
                borderColor: 'rgb(0, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y3',
                },
                {
                label: 'Sensor Suhu 4',
                data: [],
                borderColor: 'rgb(102, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y4',
                },
                {
                label: 'Sensor Suhu 5',
                data: [],
                borderColor: 'rgb(204, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y5',
                }]
            },
                        options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y3: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y4: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y5: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },
                    }
                }
            });

            var ph = document.getElementById('ph');
            var phchart = new Chart(ph, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                label: 'Sensor PH 1',
                borderColor: 'rgb(0, 204, 204)',
                tension:0.2,
                borderWidth:1,
                data: [],
                
                yAxisID: 'y',
                },
                {
                label: 'Sensor PH 2',
                data: [],
                borderColor: 'rgb(0, 102, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y2',
                },
                {
                label: 'Sensor PH 3',
                data: [],
                borderColor: 'rgb(0, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y3',
                },
                {
                label: 'Sensor PH 4',
                data: [],
                borderColor: 'rgb(102, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y4',
                },
                {
                label: 'Sensor PH 5',
                data: [],
                borderColor: 'rgb(204, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y5',
                }]
            },
                        options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y3: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y4: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y5: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },
                    }
                }
            });

            var d = document.getElementById('do');
            var dochart = new Chart(d, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                label: 'Sensor DO 1',
                data: [],
                borderColor: 'rgb(0, 204, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y',
                },
                {
                label: 'Sensor DO 2',
                data: [],
                borderColor: 'rgb(0, 102, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y2',
                },
                {
                label: 'Sensor DO 3',
                data: [],
                borderColor: 'rgb(0, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y3',
                },
                {
                label: 'Sensor DO 4',
                data: [],
                borderColor: 'rgb(102, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y4',
                },
                {
                label: 'Sensor DO 5',
                data: [],
                borderColor: 'rgb(204, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y5',
                }]
            },
                        options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y3: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y4: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y5: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },
                    }
                }
            });

            var ultrasonic = document.getElementById('ultrasonic');
            var ultrasonicchart = new Chart(ultrasonic, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                label: 'Sensor Ultrasonic 1',
                data: [],
                borderColor: 'rgb(0, 204, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y',
                },
                {
                label: 'Sensor Ultrasonic 2',
                data: [],
                borderColor: 'rgb(0, 102, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y2',
                },
                {
                label: 'Sensor Ultrasonic 3',
                data: [],
                borderColor: 'rgb(0, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y3',
                },
                {
                label: 'Sensor Ultrasonic 4',
                data: [],
                borderColor: 'rgb(102, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y4',
                },
                {
                label: 'Sensor Ultrasonic 5',
                data: [],
                borderColor: 'rgb(204, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y5',
                }]
            },
                        options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y3: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y4: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y5: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },
                    }
                }
            });

            var kekeruhan = document.getElementById('kekeruhan');
            var kekeruhanchart = new Chart(kekeruhan, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                label: 'Sensor Kekeruhan 1',
                data: [],
                borderColor: 'rgb(0, 204, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y',
                },
                {
                label: 'Sensor Kekeruhan 2',
                data: [],
                borderColor: 'rgb(0, 102, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y2',
                },
                {
                label: 'Sensor Kekeruhan 3',
                data: [],
                borderColor: 'rgb(0, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y3',
                },
                {
                label: 'Sensor Kekeruhan 4',
                data: [],
                borderColor: 'rgb(102, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y4',
                },
                {
                label: 'Sensor Kekeruhan 5',
                data: [],
                borderColor: 'rgb(204, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y5',
                }]
            },
                        options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y3: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y4: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y5: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },
                    }
                }
            });

            var tds = document.getElementById('tds');
            var tdschart = new Chart(tds, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                label: 'Sensor TDS 1',
                data: [],
                borderColor: 'rgb(0, 204, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y',
                },
                {
                label: 'Sensor TDS 2',
                data: [],
                borderColor: 'rgb(0, 102, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y2',
                },
                {
                label: 'Sensor TDS 3',
                data: [],
                borderColor: 'rgb(0, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y3',
                },
                {
                label: 'Sensor TDS 4',
                data: [],
                borderColor: 'rgb(102, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y4',
                },
                {
                label: 'Sensor TDS 5',
                data: [],
                borderColor: 'rgb(204, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y5',
                }]
            },
                        options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y3: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y4: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y5: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },
                    }
                }
            });

            var konduktifitas = document.getElementById('konduktifitas');
            var konduktifitaschart = new Chart(konduktifitas, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                label: 'Sensor Konduktifitas 1',
                data: [],
                borderColor: 'rgb(0, 204, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y',
                },
                {
                label: 'Sensor Konduktifitas 2',
                data: [],
                borderColor: 'rgb(0, 102, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y2',
                },
                {
                label: 'Sensor Konduktifitas 3',
                data: [],
                borderColor: 'rgb(0, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y3',
                },
                {
                label: 'Sensor Konduktifitas 4',
                data: [],
                borderColor: 'rgb(102, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y4',
                },
                {
                label: 'Sensor Konduktifitas 5',
                data: [],
                borderColor: 'rgb(204, 0, 204)',
                tension:0.2,
                borderWidth:1,
                yAxisID: 'y5',
                }]
            },
                        options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y2: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y3: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y4: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },y5: {
                            type: 'linear',
                            display: false,
                            position: 'left',
                        },
                    }
                }
            });
            
            var updatesuhu = function(){
                $.ajax({
                    type: "GET",
                    url: "/get_all_data",
                    dataType: "json",
                    success: function (data) {
                        
                        var c = data.length;
                        var time = [];
                        var suhu1 = [];
                        var suhu2 = [];
                        var suhu3 = [];
                        var suhu4 = [];
                        var suhu5 = [];

                        var ph1 = [];
                        var ph2 = [];
                        var ph3 = [];
                        var ph4 = [];
                        var ph5 = [];

                        var do1 = [];
                        var do2 = [];
                        var do3 = [];
                        var do4 = [];
                        var do5 = [];

                        var ultrasonic1 = [];
                        var ultrasonic2 = [];
                        var ultrasonic3 = [];
                        var ultrasonic4 = [];
                        var ultrasonic5 = [];

                        var kekeruhan1 = [];
                        var kekeruhan2 = [];
                        var kekeruhan3 = [];
                        var kekeruhan4 = [];
                        var kekeruhan5 = [];

                        var tds1 = [];
                        var tds2 = [];
                        var tds3 = [];
                        var tds4 = [];
                        var tds5 = [];

                        var konduktifitas1 = [];
                        var konduktifitas2 = [];
                        var konduktifitas3 = [];
                        var konduktifitas4 = [];
                        var konduktifitas5 = [];

                        for(t=0;t<c;t++){
                                time.push(data[t].time);
                                suhu1.push(data[t].suhu[1]);
                                suhu2.push(data[t].suhu[2]);
                                suhu3.push(data[t].suhu[3]);
                                suhu4.push(data[t].suhu[4]);
                                suhu5.push(data[t].suhu[5]);

                                ph1.push(data[t].ph[1]);
                                ph2.push(data[t].ph[2]);
                                ph3.push(data[t].ph[3]);
                                ph4.push(data[t].ph[4]);
                                ph5.push(data[t].ph[5]);

                                do1.push(data[t].ph[1]);
                                do2.push(data[t].ph[2]);
                                do3.push(data[t].ph[3]);
                                do4.push(data[t].ph[4]);
                                do5.push(data[t].ph[5]);

                                ultrasonic1.push(data[t].ultrasonic[1]);
                                ultrasonic2.push(data[t].ultrasonic[2]);
                                ultrasonic3.push(data[t].ultrasonic[3]);
                                ultrasonic4.push(data[t].ultrasonic[4]);
                                ultrasonic5.push(data[t].ultrasonic[5]);

                                kekeruhan1.push(data[t].kekeruhan[1]);
                                kekeruhan2.push(data[t].kekeruhan[2]);
                                kekeruhan3.push(data[t].kekeruhan[3]);
                                kekeruhan4.push(data[t].kekeruhan[4]);
                                kekeruhan5.push(data[t].kekeruhan[5]);

                                tds1.push(data[t].tds[1]);
                                tds2.push(data[t].tds[2]);
                                tds3.push(data[t].tds[3]);
                                tds4.push(data[t].tds[4]);
                                tds5.push(data[t].tds[5]);

                                konduktifitas1.push(data[t].konduktifitas[1]);
                                konduktifitas2.push(data[t].konduktifitas[2]);
                                konduktifitas3.push(data[t].konduktifitas[3]);
                                konduktifitas4.push(data[t].konduktifitas[4]);
                                konduktifitas5.push(data[t].konduktifitas[5]);
                            }

                            suhuchart.data.labels = time;
                            suhuchart.data.datasets[0].data = suhu1;
                            suhuchart.data.datasets[1].data = suhu2;
                            suhuchart.data.datasets[2].data = suhu3;
                            suhuchart.data.datasets[3].data = suhu4;
                            suhuchart.data.datasets[4].data = suhu5;

                            phchart.data.labels = time;
                            phchart.data.datasets[0].data = ph1;
                            phchart.data.datasets[1].data = ph2;
                            phchart.data.datasets[2].data = ph3;
                            phchart.data.datasets[3].data = ph4;
                            phchart.data.datasets[4].data = ph5;

                            dochart.data.labels = time;
                            dochart.data.datasets[0].data = do1;
                            dochart.data.datasets[1].data = do2;
                            dochart.data.datasets[2].data = do3;
                            dochart.data.datasets[3].data = do4;
                            dochart.data.datasets[4].data = do5;

                            ultrasonicchart.data.labels = time;
                            ultrasonicchart.data.datasets[0].data = ultrasonic1;
                            ultrasonicchart.data.datasets[1].data = ultrasonic2;
                            ultrasonicchart.data.datasets[2].data = ultrasonic3;
                            ultrasonicchart.data.datasets[3].data = ultrasonic4;
                            ultrasonicchart.data.datasets[4].data = ultrasonic5;

                            kekeruhanchart.data.labels = time;
                            kekeruhanchart.data.datasets[0].data = kekeruhan1;
                            kekeruhanchart.data.datasets[1].data = kekeruhan2;
                            kekeruhanchart.data.datasets[2].data = kekeruhan3;
                            kekeruhanchart.data.datasets[3].data = kekeruhan4;
                            kekeruhanchart.data.datasets[4].data = kekeruhan5;
                            
                            tdschart.data.labels = time;
                            tdschart.data.datasets[0].data = tds1;
                            tdschart.data.datasets[1].data = tds2;
                            tdschart.data.datasets[2].data = tds3;
                            tdschart.data.datasets[3].data = tds4;
                            tdschart.data.datasets[4].data = tds5;

                            konduktifitaschart.data.labels = time;
                            konduktifitaschart.data.datasets[0].data = konduktifitas1;
                            konduktifitaschart.data.datasets[1].data = konduktifitas2;
                            konduktifitaschart.data.datasets[2].data = konduktifitas3;
                            konduktifitaschart.data.datasets[3].data = konduktifitas4;
                            konduktifitaschart.data.datasets[4].data = konduktifitas5;

                            suhuchart.update();
                            phchart.update();
                            dochart.update();
                            ultrasonicchart.update();
                            kekeruhanchart.update();
                            tdschart.update();
                            konduktifitaschart.update();
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            };
            updatesuhu();
            
            setInterval(() => {
                updatesuhu(); 
            }, 10000);
                
                        

    </script>
@endsection
    