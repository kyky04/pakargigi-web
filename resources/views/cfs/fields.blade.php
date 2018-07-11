<!-- Id Penyakit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_penyakit', 'Id Penyakit:') !!}
    {!! Form::text('id_penyakit', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Gejala Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_gejala', 'Id Gejala:') !!}
    {!! Form::text('id_gejala', null, ['class' => 'form-control']) !!}
</div>

<!-- Cf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cf', 'Cf:') !!}
    {!! Form::text('cf', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cfs.index') !!}" class="btn btn-default">Cancel</a>
</div>
