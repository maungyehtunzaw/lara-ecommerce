@extends('adminlte::page')
@section('title', 'Category List')

@section('content_header')
    <h4>CATEGORY</h4>
@stop

@section('content')
    <div class="bg-white dark:bg-gray-800  p-2">
        {{ $dataTable->table() }}
    </div>
@stop

@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@stop
