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
        <h6 class="mb-4">Vehículos</h6>
        <div class="table-responsive">
            <table class="table" id="routes">
                <thead>
                    <tr>
                        <th scope="col">Entrada</th>
                        <th scope="col">Salida</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                        <th scope="row">{{$vehicle["created_at"]}}</th>
                        <td>{{date_format(new DateTime($vehicle["date_out"]), 'Y-m-d H:i:s')}}</td>
                        <td>{{$vehicle["plate"]}}</td>
                        <td>{{$vehicle["vehicles_type_id_id"]}}</td>
                        <td>{{$vehicle["document"]}}</td>
                        <td>{{$vehicle["owner_name"]}}</td>
                        
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
        let relativeURL = 'https://reportes.minut.app/workstations/';
        relativeURL = relativeURL+'{{$id}}/vehicle/{{$workstation}}/'+inicial+'/'+final+'/';
        alert(relativeURL);
        //window.location.href=relativeURL;
    }
</script>
@endsection