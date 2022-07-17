
    @foreach ($data_result as $data)
    <div class="card m-2 p-2" style="width: 22rem;">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div><h5 class="card-title">Device {{$data['device_id']}}</h5></div>
            <div><a href="/home/detail/{{$data['device_id']}}" class="btn btn-info p-1">Show Detail</a></div>
        </div>
        <ul class="list-group list-group-horizontal d-flex justify-content-around list-unstyled ">
            <li class="p-2">
                <ul class="list-unstyled list-group border-0">
                    <li class="text-center">Suhu</li>
                    <li class="text-center">{{$data['suhu']}}</li>
                </ul>
            </li>
            <li class="p-2">
                <ul class="list-unstyled list-group">
                <li class="text-center ">PH</li>
                <li class="text-center">{{$data['ph']}}</li>
            </ul>
            </li>
            <li class="p-2">
                <ul class="list-unstyled list-group">
                <li class="text-center ">DO</li>
                <li class="text-center">{{$data['DO']}}</li>
            </ul>
            </li>
        </ul>
        <ul class="list-group list-group-horizontal d-flex justify-content-around list-unstyled border-0">
            <li class="p-2">
                <ul class="list-unstyled list-group">
                    <li class="text-center ">Ultrasonic</li>
                    <li class="text-center">{{$data['ultrasonic']}}</li>
                </ul>
            </li>
            <li class="p-2">
                <ul class="list-unstyled list-group">
                    <li class="text-center ">Kekeruhan</li>
                    <li class="text-center">{{$data['nilaiKeruh']}}</li>
                </ul>
            </li>
            <li class="p-2">
                <ul class="list-unstyled list-group border-0">
                    <li class="text-center">TDS</li>
                    <li class="text-center">{{$data['TDS']}}</li>
                </ul>
            </li>
            <li class="p-2">
                <ul class="list-unstyled list-group border-0">
                    <li class="text-center">Konduktitfas</li>
                    <li class="text-center">{{$data['konduktifitas']}}</li>
                </ul>
            </li>
        </ul>
    </div>
    @endforeach








