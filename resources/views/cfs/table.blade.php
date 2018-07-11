<table class="table table-responsive" id="cfs-table">
    <thead>
        <th>Id Penyakit</th>
        <th>Id Gejala</th>
        <th>Cf</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cfs as $cf)
        <tr>
            <td>{!! $cf->id_penyakit !!}</td>
            <td>{!! $cf->id_gejala !!}</td>
            <td>{!! $cf->cf !!}</td>
            <td>
                {!! Form::open(['route' => ['cfs.destroy', $cf->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cfs.show', [$cf->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cfs.edit', [$cf->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>