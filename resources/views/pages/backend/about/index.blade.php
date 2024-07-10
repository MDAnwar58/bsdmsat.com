@extends('layouts.app')
@section('title', 'মাদ্রাসা সম্পর্কিত তথ্য')

@section('content')
    @include('components.backend.about.about-add-or-update')
@endsection

@include('components.backend.about.land-add-modal')
@include('components.backend.about.land-edit-modal')
@include('components.backend.about.land-delete-modal')
