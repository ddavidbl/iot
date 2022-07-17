var suhualat = document.getElementById("suhuAlat");
    var suhualatchart = new Chart(suhualat, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Suhu Alat',
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
        },
        labels:{
            size:14
        }
        
    }
    });

    var updatesuhualat = function() {
    $.ajax({
        url: "{{ route('POSTDATA',$area) }}",
        type: 'GET',
        dataType: 'json',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
        suhualatchart.data.labels = data.time;
        suhualatchart.data.datasets[0].data = data.suhuAlat;
        suhualatchart.update();
        },
        error: function(data){
        console.log(data);
        }
    });
    }
    
    updatesuhualat();
    setInterval(() => {
    updatesuhualat();
    }, 1000);


    var suhuarea = document.getElementById("suhuArea");
    var suhuareachart = new Chart(suhuarea, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Suhu Area',
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

    var updatesuhuarea = function() {
    $.ajax({
        url: "{{ route('POSTDATA',$area) }}",
        type: 'GET',
        dataType: 'json',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
        suhuareachart.data.labels = data.time;
        suhuareachart.data.datasets[0].data = data.suhuArea;
        suhuareachart.update();
        },
        error: function(data){
        console.log(data);
        }
    });
    }
    
    updatesuhuarea();
    setInterval(() => {
    updatesuhuarea();
    }, 1000);

    
    var curahhujan = document.getElementById("curahHujan");
    var curahhujanchart = new Chart(curahhujan, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Curah Hujan',
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

    var updatecurahhujan = function() {
    $.ajax({
        url: "{{ route('POSTDATA',$area) }}",
        type: 'GET',
        dataType: 'json',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
        curahhujanchart.data.labels = data.time;
        curahhujanchart.data.datasets[0].data = data.curahHujan;
        curahhujanchart.update();
        },
        error: function(data){
        console.log(data);
        }
    });
    }
    
    updatecurahhujan();
    setInterval(() => {
    updatecurahhujan();
    }, 1000);

    var arusair = document.getElementById("arusAir");
    var arusairchart = new Chart(arusair, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Arus Air',
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

    var updatearusair = function() {
    $.ajax({
        url: "{{ route('POSTDATA',$area) }}",
        type: 'GET',
        dataType: 'json',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
        arusairchart.data.labels = data.time;
        arusairchart.data.datasets[0].data = data.arusAir;
        arusairchart.update();
        },
        error: function(data){
        console.log(data);
        }
    });
    }
    
    updatearusair();
    setInterval(() => {
    updatearusair();
    }, 1000);

    var kelembapantanah = document.getElementById("kelembapanTanah");
    var kelembapantanahchart = new Chart(kelembapantanah, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
        label: 'Kelembapan Tanah',
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

    var updatekelembapantanah = function() {
    $.ajax({
        url: "{{ route('POSTDATA',$area) }}",
        type: 'GET',
        dataType: 'json',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
        kelembapantanahchart.data.labels = data.time;
        kelembapantanahchart.data.datasets[0].data = data.kelembapanTanah;
        kelembapantanahchart.update();
        },
        error: function(data){
        console.log(data);
        }
    });
    }
    
    updatekelembapantanah();
    setInterval(() => {
    updatekelembapantanah();
    }, 1000);