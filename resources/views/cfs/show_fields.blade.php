<!-- Id Field -->
{{-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cf->id !!}</p>
</div> --}}

<!-- Id Penyakit Field -->
<div class="form-group">
    {!! Form::label('id_penyakit', 'Id Penyakit:') !!}
    <p>{!! $cf->penyakit->penyakit !!}</p>
</div>


<!-- Id Gejala Field -->
<div class="form-group">
    {!! Form::label('id_gejala', 'Id Gejala:') !!}
    <p>{!! $cf->gejala->gejala !!}</p>
</div>

<!-- Cf Field -->
<div class="form-group">
    {!! Form::label('cf', 'Cf:') !!}
    <p>{!! $cf->cf !!}</p>
</div>

{{-- <!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cf->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cf->updated_at !!}</p>
</div> --}}

