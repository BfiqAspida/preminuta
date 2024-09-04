@extends('layout')

@section('content')
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="row">
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha Inicial</label>
                    <input type="date" name="inicial" id="inicial" class="form-control" placeholder="Fecha Inicial" value='{{$inicial}}'>    
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha Final</label>
                    <input type="date" name="final" id="final" class="form-control" placeholder="Fecha Final" value='{{$final}}'>    
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <button style="vertical-align: middle;" name="Guardar" class=" btn btn-primary m-2" onclick="sendForm()">Consultar</button>    
                </div>        
            </div>
        </div>
        
    
    </div>
</div>
<div>&nbsp;<br></div>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Recorridos</h6>
        <div class="table-responsive">
            <table class="table" id="routes">
                <thead>
                    <tr>
                        <th scope="col">Inicio</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fin</th>
                        <th scope="col">Marcación</th>
                        <th scope="col">Tiempo(Horas)</th>
                        <th scope="col">Ver</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($routes as $route)
                    <tr>
                        <th scope="row">{{$route["start_time"]}}</th>
                        <td>{{$route->routes["name"]}}</td>
                        <td>{{$route["end_time"]}}</td>
                        <td>{{$route["percentage"]}}%</td>
                        <td>{{$route["time"]}}</td>
                        <td>
                            <a href="../../../../routes1/{{$workstation}}/record/{{$route['route_record_id']}}"><i class="bi-eye-fill" style="font-size:1.5em"></i></a>
                        </td>
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
    function sendForm(){
        let inicial = $("#inicial").val();
        let final = $("#final").val();        
        let relativeURL = 'https://preminuta.azurewebsites.net/workstations/';
        relativeURL = relativeURL+'{{$id}}/routes/{{$workstation}}/'+inicial+'/'+final+'/';
        window.location.href=relativeURL;
    }
</script>
@endsection
