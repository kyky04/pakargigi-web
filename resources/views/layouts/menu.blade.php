<li class="{{ Request::is('penyakits*') ? 'active' : '' }}">
    <a href="{!! route('penyakits.index') !!}"><i class="fa fa-medkit"></i><span>Penyakit</span></a>
</li>

<li class="{{ Request::is('gejalas*') ? 'active' : '' }}">
    <a href="{!! route('gejalas.index') !!}"><i class="fa fa-stethoscope"></i><span>Gejala</span></a>
</li>

<li class="{{ Request::is('cfs*') ? 'active' : '' }}">
    <a href="{!! route('cfs.index') !!}"><i class="fa fa-user-md"></i><span>CF</span></a>
</li>

