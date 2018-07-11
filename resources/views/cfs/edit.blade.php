@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cf
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cf, ['route' => ['cfs.update', $cf->id], 'method' => 'patch']) !!}

                        @include('cfs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection