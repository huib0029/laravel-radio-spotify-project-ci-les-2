@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Pas radio stations aan</div>
            <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('internetradiostationseditor.create') }}">
                    Creëer nieuw internet radio station </a>
            </div>
        </div>
    </div><br>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
                @if ($internetradiostations->isEmpty())  <p>Er zijn Geen internet radio stations geconfigureerd, creëer een internet radio station</p> @else
    <table class="table table-bordered">
        <tr>
            <th width="50px">Nummer</th>
            <th>Titel</th>
            <th>Stream URL</th>
            <th>Logo</th>
            <th width="225px">Actie</th>
        </tr>
        @foreach ($internetradiostations as $internetradiostation)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $internetradiostation->title}}</td>
                <td>{{ $internetradiostation->url}}</td>
                <td>@if(is_null($internetradiostation->logo)) geen logo
                    @else
                    <img src="./logos/{{ $internetradiostation->logo}}">@endif</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('internetradiostationseditor.edit',$internetradiostation->id) }}">Aanpassen</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['internetradiostationseditor.destroy', $internetradiostation->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Verwijderen', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $internetradiostations->links() !!}
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection