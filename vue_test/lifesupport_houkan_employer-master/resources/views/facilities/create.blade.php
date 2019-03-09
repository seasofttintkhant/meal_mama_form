@extends('layouts.app')

@section('content')

  @include('facilities.partials.form')

@endsection
@push('customjs')
<script src="{{ asset('js/facility/create.js') }}"></script>
@endpush