@extends('layouts.app')

@section('content')
<input type="hidden" name="facility_id" id="facility_id" value="{{$_GET['facility_id']}}">
  @include('jobs.partials.form')
@endsection


@push('customjs')
<script src="{{ asset('js/job/create.js') }}"></script>
@endpush