@extends('layouts.app')
@section('title', 'ন্যাভবার')

@section('content')
    @include('components.backend.navbar.navbar-table')
@endsection

@include('components.backend.navbar.navbar-add-modal')
@include('components.backend.navbar.navbar-edit-modal')
@include('components.backend.navbar.navbar-delete-modal')