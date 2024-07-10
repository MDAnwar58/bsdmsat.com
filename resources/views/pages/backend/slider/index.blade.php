@extends('layouts.app')
@section('title', 'সেলাইডার')

@section('content')
    @include('components.backend.slider.sliders-table')
@endsection
@include('components.backend.slider.slider-add-modal')
@include('components.backend.slider.slider-edit-modal')
@include('components.backend.slider.slider-delete-modal')
