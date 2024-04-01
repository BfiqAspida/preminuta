@extends('layout')

@section('content')
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Reportes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workstations as $workstation)
                    <tr>
                        <th scope="row">{{$workstation["workstation_id"]}}</th>
                        <td>{{$workstation["name"]}}</td>
                        <td>{{$workstation["description"]}}</td>
                        @php
                        {{
                        $final = date('Y-m-d');
                        $inicial = date('Y-m-d', strtotime('-30 days'));
                        $modules = $workstation->modules;
                        }}
                        
                        @endphp
                        
                        <td>
                        @foreach($modules as $module)
                            
                        @endforeach
                            @if($module['module_id_id']==2)
                            <a href="vehicles/{{$workstation['workstation_id']}}/{{$inicial}}/{{$final}}/"><i class="bi-car-front-fill" style="font-size:1.5em"></i></a>&nbsp;&nbsp;
                            @endif
                            @if($module['module_id_id']==4)
                            <a href="routes/{{$workstation['workstation_id']}}/{{$inicial}}/{{$final}}/"><i class="bi-binoculars-fill" style="font-size:1.5em"></i></a>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection