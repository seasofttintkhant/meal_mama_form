@extends('layouts.app')

@section('content')

  <input type="hidde" name="facility-data" id="facility-data" value="{{ json_encode($facility) }}">
  @include('facilities.partials.form')
 

@endsection
@push('customjs')
<script src="{{ asset('js/facility/edit.js') }}"></script>
@endpush