@extends('layouts.app')

@section('content')
<input type="hidde" name="job-data" id="job-data" value="{{ json_encode($job) }}">
@include('jobs.partials.form')
@endsection

@push('customjs')
<script src="{{ asset('js/job/edit.js') }}"></script>
@endpush