@extends('layout.app')
@section('content')
    @include('component.nav')
    @include('component.carousel')
    {{-- @include('component.service') --}}
    @include('component.about')
    {{-- @include('component.categories') --}}
    {{-- @include('component.courses') --}}
    @include('component.teamExpert')
    @include('component.testimonial')
    @include('component.Footer')
@endsection