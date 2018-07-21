{{-- <!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $penyakit->id !!}</p>
</div>
 --}}
<!-- Penyakit Field -->
<div class="form-group">
    {!! Form::label('penyakit', 'Penyakit:') !!}
    <p>{!! $penyakit->penyakit !!}</p>
</div>
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $penyakit->keterangan !!}</p>
</div>

{{-- <!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $penyakit->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $penyakit->updated_at !!}</p>
</div>
 --}}
