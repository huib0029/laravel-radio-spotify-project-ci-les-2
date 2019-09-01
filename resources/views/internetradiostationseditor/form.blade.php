 <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titel:*</strong>
                {!! Form::text('title', null, array('placeholder' => 'Titel','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stream URL (mp3):*</strong>
                {!! Form::text('url', null, array('placeholder' => 'STREAM URL (mp3) (http(s)//*','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
             <strong>Foto upload:</strong>
             {!! Form::file('logo', array('class' => 'form-control' )) !!}
            </div>
        </div>
        @if ($iscreate === false)
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Huidige foto:</strong>
                {!! Form::label('Geen logo', $internetradiostation['logo'], array('class' => 'form-control' )) !!}
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            @if ($iscreate === true)
            <button type="submit" class="btn btn-success">Internet station toevoegen</button>
            @else
                <button type="submit" class="btn btn-primary">Internet station wijzigen</button>
            @endif
        </div>
    </div>