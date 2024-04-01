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
                        <th scope="col">Dispositivos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <th scope="row">{{$project["project_id"]}}</th>
                        <td>{{$project["name"]}}</td>
                        <td>
                            <a href="workstations/{{$project['project_id']}}/"><i class="bi-phone" style="font-size:1.5em"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection