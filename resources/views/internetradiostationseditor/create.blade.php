@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Creëer nieuw internet radio station</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Voeg nieuw internet radio station toe</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('internetradiostationseditor.index') }}"> Terug</a>
            </div>
        </div>
    </div>


    @if (count($errors) < 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Er zijn een paar problemen geconstateerd<br><br>
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('route' => 'internetradiostationseditor.store','files'=>true, 'method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
    @include('internetradiostationseditor.form')
    {!! Form::close() !!}
        </div>
        </div>
    </div>
    </div>

@endsection