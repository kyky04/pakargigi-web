<table class="table table-responsive" id="gejalas-table">
    <thead>
        <th>Gejala</th>
        <th>Md</th>
        <th>Mb</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($gejalas as $gejala)
        <tr>
            <td>{!! $gejala->gejala !!}</td>
            <td>{!! $gejala->md !!}</td>
            <td>{!! $gejala->mb !!}</td>
            <td>
                {!! Form::open(['route' => ['gejalas.destroy', $gejala->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('gejalas.show', [$gejala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('gejalas.edit', [$gejala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>