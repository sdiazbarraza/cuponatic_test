@extends('app')
@section('js')
{!! Html::script('assets/js/proccessStadistics.js') !!}
@endsection
@section('content')
<div class="container">
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th>Id Producto </th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Palabras</th>
                <th>Tags</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
@endsection