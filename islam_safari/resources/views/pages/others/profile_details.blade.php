

@extends('layout.app')
@section('content')
    @include('components.topMenu_bar')
    {{-- @include('components.hero') --}}
    @include('components.member_details')
    @include('components.contact')
    @include('components.member')
    @include('components.footer')
@endsection
