@extends('layouts.no_sidebar_app')

@section('content')
<div class="space"></div>
              
<div class="clearfix" id="app">

  <div class="preview-card">
    <div class="preview-title">
      <h3>この事業所の職員の声</h3>
    </div>
    <div class="preview-body">
      <div class="preview-options">
        <div class="preview-photo">
            @if(isset($staffVoice) && !empty($staffVoice) && !empty($staffVoice['image']))
              @php($img = "/img/staff_voices/tmp/".$staffVoice['image'])
              <img class="staff-prewivew-img img-fluid" src="{{$img}}" alt="求人" class="w-50">
            @endif
         
        </div>
        <ul class="preview-options-list">

          @if(isset($staffVoice['job_category_name']) && !empty($staffVoice['job_category_name']))
            <li>{{$staffVoice['job_category_name']}}</li>
          @endif
          @if(isset($staffVoice['years_of_exp']) && !empty($staffVoice['years_of_exp']))
            <li>経験年数 : {{$staffVoice['years_of_exp']}}年</li>
          @endif

          <li>更新日：{{date('Y/m/d')}}</li>

        </ul>
      </div>

      @if((isset($staffVoice['question_1']) && !empty($staffVoice['question_1'])) && (isset($staffVoice['answer_1']) && !empty($staffVoice['answer_1'])))
        <div class="preview-qa">
          <p class="preview-question">
            {{$staffVoice['question_1']}}
          </p>
          <p class="preview-answer">
            {{$staffVoice['answer_1']}}
          </p>
        </div>
      @endif

      @if((isset($staffVoice['question_2']) && !empty($staffVoice['question_2'])) && (isset($staffVoice['answer_2']) && !empty($staffVoice['answer_2'])))
        <div class="preview-qa">
          <p class="preview-question">
            {{$staffVoice['question_2']}}
          </p>
          <p class="preview-answer">
            {{$staffVoice['answer_2']}}
          </p>
        </div>
      @endif

      @if((isset($staffVoice['question_3']) && !empty($staffVoice['question_3'])) && (isset($staffVoice['answer_3']) && !empty($staffVoice['answer_3'])))
        <div class="preview-qa">
          <p class="preview-question">
            {{$staffVoice['question_3']}}
          </p>
          <p class="preview-answer">
            {{$staffVoice['answer_3']}}
          </p>
        </div>
      @endif

  </div>

<div class="space"></div>
@endsection