<!-- Id Penyakit Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('id_penyakit', 'Id Penyakit:') !!}
    {!! Form::text('id_penyakit', null, ['class' => 'form-control']) !!}
</div> --}}
{{-- <div class="form-group col-sm-6">
    {!! Form::label('id_gejala', 'Id Gejala:') !!}
    {!! Form::text('id_gejala', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-6">
	{!! Form::label('id_penyakit', 'Penyakit:') !!}
    {{ Form::select('id_penyakit', $items = App\Models\Penyakit::pluck('penyakit', 'id'), null, array('class'=>'form-control','style'=>'' )) }}
</div>

<div class="form-group col-sm-6">
	{!! Form::label('id_gejala', 'Gejala:') !!}
    {{ Form::select('id_gejala', $items = App\Models\Gejala::pluck('gejala', 'id'), null, array('class'=>'form-control','style'=>'' )) }}
</div>

<!-- Id Gejala Field -->

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
