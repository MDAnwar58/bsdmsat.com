@extends('layouts.app')
@section('title', 'গ্যালরি')

@section('content')
    @include('components.backend.gallery.gallery-table')
@endsection

@include('components.backend.gallery.gallery-category-add-modal')
@include('components.backend.gallery.gallery-category-edit-modal')
@include('components.backend.gallery.gallery-category-delete-modal')

@include('components.backend.gallery.gallery-image-add-modal')
@include('components.backend.gallery.gallery-image-edit-modal')
@include('components.backend.gallery.gallery-image-delete-modal')
