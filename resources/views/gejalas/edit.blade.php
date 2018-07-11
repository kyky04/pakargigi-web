@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Gejala
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($gejala, ['route' => ['gejalas.update', $gejala->id], 'method' => 'patch']) !!}

                        @include('gejalas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection