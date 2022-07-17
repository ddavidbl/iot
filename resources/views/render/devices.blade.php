@foreach ( $data as $device)
        <div class="card mb-3">
            <div class="card-header">
                Device ID : {{$device->id}}
            </div>
        <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h5 class="card-title">Lokasi : {{$device->lokasi}}</h5>
            </div>
            <div>
                <ul class="list list-unstyled list-inline">
                    @if (Auth::check())
                        <li class="list-inline-item"><button value="{{$device->id}}" class="btn btn-info volumeBtn">Volume</button></li>
                    @endif
                </ul>
            </div>
        </div>
        <div>
            <ul class="list list-unstyled list-inline">
                <li class="list-inline-item">lat {{$device->lat}}</li>
                <li class="list-inline-item">lng {{$device->lng}}</li>
                <li class="list-inline-item">panjang {{$device->panjang}}</li>
                        <li class="list-inline-item">lebar {{$device->lebar}}</li>
                        <li class="list-inline-item">volume {{$device->volume}}</li>

            </ul>
        </div>
        </div>
        </div>
    @endforeach