@extends('layout.dash')
@section('content')
    @include('dashboard.dashboard-list')
    @include('dashboard.dashboard-delete')
    @include('dashboard.dashboard-create')
    @include('dashboard.dashboard-update')
@endsection