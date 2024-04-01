@extends('layout')

@section('content')
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Puntos</h6>
        <div class="table-responsive">
            <table class="table" id="routes">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Novedad</th>
                        <th scope="col">Foto</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($routes as $route)
                    <tr>
                        <th scope="row">{{$route["date"]}}</th>
                        <td>{{$route->points["name_point"]}}</td>
                        <td>{{$route["new"]}}</td>
                        <td>{{$route["percentage"]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new DataTable('#routes', {
        layout: {
            top1Start: {
                buttons: ['excel']
            }
        }
    });
</script>
@endsection