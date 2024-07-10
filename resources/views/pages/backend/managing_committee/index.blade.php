@extends('layouts.app')
@section('title', 'ম্যানেজিং কমিটি')

@section('content')
    @include('components.backend.managing_committee.managing_committee-table')
@endsection
@include('components.backend.managing_committee.managing_committee-add-modal')
@include('components.backend.managing_committee.managing_committee-edit-modal')
@include('components.backend.managing_committee.managing_committee-delete-modal')
