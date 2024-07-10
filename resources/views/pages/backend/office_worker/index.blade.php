@extends('layouts.app')
@section('title', 'অফিস কর্মচারির তথ্য')

@section('content')
    @include('components.backend.office_worker.office_worker-table')
@endsection
@include('components.backend.office_worker.office_worker-add-modal')
@include('components.backend.office_worker.office_worker-edit-modal')
@include('components.backend.office_worker.office_worker-delete-modal')
