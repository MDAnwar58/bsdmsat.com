@extends('layouts.app')
@section('title', 'পিরিয়ড')

@section('content')
    @include('components.backend.period.period-table')
@endsection
@include('components.backend.period.period-add-modal')
@include('components.backend.period.period-edit-modal')
@include('components.backend.period.period-delete-modal')
