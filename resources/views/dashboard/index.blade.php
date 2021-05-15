@extends('layouts.oldapp')
@section('content')
@isset ( $title )
<h1>{{ $title }}</h1>
<p>Welcome Back {{ Auth::user()->name }}!</p>
@endisset
@endsection
