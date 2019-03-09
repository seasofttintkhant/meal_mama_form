@extends('layouts.app')
@section('content')
<div class="content" id="app">
  <div class="card h-card h-p-30">
    <div class="card-display-tbl">
      <div class="card-display-cell car-wd-245">
        <h2 class="fac-new-heading card-fw-bold">新規施設の登録</h2>
      </div>
      <div class="card-display-cell">
        <a href="#" type="button" class="card-btn">表示例を見る</a>
      </div>
    </div>
      
      <div class="space"></div>
      {!! Form::model($staffVoice,['method'=>'PATCH','route'=>['staff_voices.update',$staffVoice->id],'files'=>true,'id'=>'staffvoice-form']) !!}
         {{ csrf_field() }}
        @include('staff_voices.form')
     {!! Form::close() !!}
    </div>
  </div><!-- .card -->
  <div class="space"></div>
  
</div><!-- .content -->
@endsection

