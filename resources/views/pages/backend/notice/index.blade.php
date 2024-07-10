@extends('layouts.app')
@section('title', 'নোটিশ')

@section('content')
    @include('components.backend.notice.notice-table')
@endsection
@include('components.backend.notice.notice-add-modal')
@include('components.backend.notice.notice-edit-modal')
@include('components.backend.notice.notice-delete-modal')
