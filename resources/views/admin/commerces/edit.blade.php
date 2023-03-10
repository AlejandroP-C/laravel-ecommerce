@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar el comercio</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>
        {{session('info')}}
    </strong>
</div>
@endif

    <div class="card">

        <div class="card-body">
            {!! Form::model($commerce,['route' => ['admin.commerces.update', $commerce], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
           
            @include('admin.commerces.partials.form')

            {!! Form::submit('Actualizar comercio', ['class' => 'btn btn-primary']) !!}



            {!! Form::close() !!}
        </div>

    </div>
@stop


@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;

        }
    </style>
@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    

        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );

        //cambiar imagen
        
            document.getElementById("file").addEventListener('change', cambiarImagen);
           function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
           }
        

    </script>
@endsection