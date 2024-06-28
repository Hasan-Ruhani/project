

@extends('layout.app')
@section('content')
    @include('components.topMenu_bar')
    {{-- @include('components.hero') --}}
    @include('components.students')
    @include('components.footer')
@endsection
