@extends('layouts.app')

@section('content')
@if(Auth::user()->role->role == 'Cliente')
@include('client.menu')
@elseif(Auth::user()->role->role == 'Adminstrador')
@include('administrator.menu')
@endif
@endsection
