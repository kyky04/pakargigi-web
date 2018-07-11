<li class="{{ Request::is('penyakits*') ? 'active' : '' }}">
    <a href="{!! route('penyakits.index') !!}"><i class="fa fa-edit"></i><span>Penyakit</span></a>
</li>

<li class="{{ Request::is('gejalas*') ? 'active' : '' }}">
    <a href="{!! route('gejalas.index') !!}"><i class="fa fa-edit"></i><span>Gejala</span></a>
</li>

<li class="{{ Request::is('cfs*') ? 'active' : '' }}">
    <a href="{!! route('cfs.index') !!}"><i class="fa fa-edit"></i><span>CF</span></a>
</li>

