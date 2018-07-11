<!-- Gejala Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gejala', 'Gejala:') !!}
    {!! Form::text('gejala', null, ['class' => 'form-control']) !!}
</div>

<!-- Md Field -->
<div class="form-group col-sm-6">
    {!! Form::label('md', 'Md:') !!}
    {!! Form::text('md', null, ['class' => 'form-control']) !!}
</div>

<!-- Mb Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mb', 'Mb:') !!}
    {!! Form::text('mb', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gejalas.index') !!}" class="btn btn-default">Cancel</a>
</div>
