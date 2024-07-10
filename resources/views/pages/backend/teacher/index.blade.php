@extends('layouts.app')
@section('title', 'শিক্ষক গনের তথ্য')

@section('content')
    @include('components.backend.teacher.teacher-table')
@endsection
@include('components.backend.teacher.teacher-add-modal')
@include('components.backend.teacher.teacher-edit-modal')
@include('components.backend.teacher.teacher-delete-modal')
