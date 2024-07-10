@extends('layouts.app')
@section('title', 'ফুটার')

@section('content')
    @include('components.backend.footer.footer-table')
@endsection

@include('components.backend.footer.footer-useful-link-add-modal')
@include('components.backend.footer.footer-useful-link-edit-modal')
@include('components.backend.footer.footer-useful-link-delete-modal')
