<!-- Penyakit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penyakit', 'Penyakit:') !!}
    {!! Form::text('penyakit', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('penyakits.index') !!}" class="btn btn-default">Cancel</a>
</div>
