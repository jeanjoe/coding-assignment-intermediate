@extends('layouts.app')

@section('name', 'Home')

@section('content')
<div class="content">
    <h3 class="text-lg text-center">
        Welcome <span>to the Ensibuuko Coding Assignment</span>
    </h3>

    <div class="content">
        <transaction-component></transaction-component>
    </div>

</div>
@endsection