<table class="table table-responsive" id="penyakits-table">
    <thead>
        <th>Penyakit</th>
        <th>Keterangan</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($penyakits as $penyakit)
        <tr>
            <td>{!! $penyakit->penyakit !!}</td>
            <td>{!! $penyakit->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['penyakits.destroy', $penyakit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penyakits.show', [$penyakit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('penyakits.edit', [$penyakit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>