@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penyakit
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penyakit, ['route' => ['penyakits.update', $penyakit->id], 'method' => 'patch']) !!}

                        @include('penyakits.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection