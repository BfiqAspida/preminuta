@extends('layout')

@section('content')
@if($project==6)
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ingreso de Vehículos</h6>
                    </div>
                    <canvas id="worldwide-sales1"></canvas>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
@section('js')
<script>
    // Worldwide Sales Chart
    var ctx1 = $("#worldwide-sales1").get(0).getContext("2d");
    let dates = [
        @foreach($vehicles as $vehicle)
            '{{$vehicle->date}}',
        @endforeach
    ];
    let vehicles = [
        @foreach($vehicles as $vehicle)
            {{$vehicle->vehiculos}},
        @endforeach
    ];
    
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: dates,
            datasets: [{
                    label: "Vehículos",
                    data: vehicles,
                    backgroundColor: "rgba(0, 156, 255, .7)"
                }
            ]
            },
        options: {
            responsive: true
        }
    });
</script>
@endsection