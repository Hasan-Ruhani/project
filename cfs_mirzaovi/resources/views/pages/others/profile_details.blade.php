@extends('layout.app')
@section('content')
    @include('components.header2')
    @include('components.profile.profile_details')
    {{-- @include('components.profile.spcReview')
    @include('components.profile.createReview') --}}
    @include('components.profile.spcContact')
    @include('components.footer')
@endsection