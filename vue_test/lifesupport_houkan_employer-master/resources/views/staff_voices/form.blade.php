<ul class="definition-table">
        <li class="definition-table-item">
          <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item">
                <span class="definition-label-red">必須
                </span>
              </span>
              <span class="definition-head-item definition-head-item-left">職種
              </span>
            </dt>
            <dd class="definition-table-body">
              <div class="card-option">
              <label class="card-selectbox">
                {!! Form::select('job_category_id',$job_categories,null,['class'=>'card-selectbox-select'. ($errors->has('job_category_id') ? " definition-txt-error" : "")   ,'placeholder'=>'指定なし']) !!}
                @if ($errors->has('job_category_id'))
                <span class="definition-txt-alert">
                    {{ $errors->first('job_category_id') }}
                </span>
                @endif
              <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
              </span>
              </label>
            </div>
            </dd>
          </dl>
        </li>
        <li class="definition-table-item">
          <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item">
                <span class="definition-label-red">必須
                </span>
              </span>
              <span class="definition-head-item definition-head-item-left">役職・役割
              </span>
            </dt>
            <dd class="definition-table-body">
              {!! Form::text('role',null,['class'=> 'definition-text-field card-wd-100'. ($errors->has('role') ? " definition-txt-error" : "") , "placeholder" => "内科医、看護師長、リーダーなど", "maxlength"=>"100" ]) !!}
              @if ($errors->has('role'))
              <span class="definition-txt-alert">
                  {{ $errors->first('role') }}
              </span>
              @endif
            </dd>
          </dl>
        </li>
        <li class="definition-table-item">
          <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item">
                <span class="definition-label-red">必須
                </span>
              </span>
              <span class="definition-head-item definition-head-item-left">経験年数
              </span>
            </dt>
            <dd class="definition-table-body">
              <div class="card-option">
              <label class="card-selectbox">

              {!! Form::select('years_of_exp',
              [
                  1 => "1年",
                  2 => "2年",
                  3 => "3年",
                  4 => "4年",
                  5 => "5年",
                  6 => "6年",
                  7 => "7年",
                  8 => "8年",
                  9 => "9年",
                  10 => "10年以上"
              ]
              ,null,['class'=>'card-selectbox-select'. ($errors->has('years_of_exp') ? " definition-txt-error" : "")   ,'placeholder'=>'指定なし']) !!}

              @if ($errors->has('years_of_exp'))
              <span class="definition-txt-alert">
                  {{ $errors->first('years_of_exp') }}
              </span>
              @endif
              <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
              </span>
              </label>
            </div>
            </dd>
          </dl>
        </li>
        <li class="definition-table-item">
          <dl class="dl-definition-table ">
            <dt class="definition-table-head">
              <span class="definition-head-item">
                <span class="definition-label-red">必須
                </span>
              </span>
              <span class="definition-head-item definition-head-item-left">顔写真
              </span>
            </dt>
            <dd class="definition-table-body ">
              <span>JPG、PNG、GIF形式の画像ファイルをアップロードしてください<br>ご本人様の顔写真を登録してください。イラストや他人の顔写真の登録はお控えください</span>
              @if ($errors->has('image'))
              <span class="definition-txt-alert card-fw-normal">
                  {{ $errors->first('image') }}
              </span>
              @endif
                <dl class="card-inline-form space-pd-20">
                  <span class="card-inline-item card-wd-date-100">
                     
                      <?php 
                           if(isset($staffVoice) && !empty($staffVoice) && !empty($staffVoice->image))
                           {
                            $img = '/img/staff_voices/'.$staffVoice->image;
                           }
                           else{
                            $img = '/img/avatar.png';
                           }
                      ?> 
                      <img id="output" src="{{$img}}" width="100" height="100">

                  </span>
                  <span class="card-inline-item">
                    <span>
                      <div>   
                        
                        <input type="file" id="fileInput" accept="image/jpeg, image/jpg, image/gif, image/png" onchange="loadFile(event)" name="image" class="card-display-none">   
                        <a href="javascript:void(0)" class="card-link" onclick="trigger()">顔写真をフォルダーから選択</a>
                      </div>
                    </span>
                  </span>
                </dl>
              </dd>
            </dl>
        </li>
        <li class="definition-table-item">
          <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item">
                <span class="definition-label-red">必須
                </span>
              </span>
              <span class="definition-head-item definition-head-item-left">質問/回答 01
              </span>
            </dt>
            <dd class="definition-table-body">
              <div class="space-pd-btm-sm">
                {!! Form::select('question_option',$questions,null,['class'=> 'card-selectbox-select question_option_1','onchange'=>'setQuestion_1()']) !!}
              </div>
              {!! Form::text('question_1',null,['id'=>'question_1','class'=> 'definition-text-field card-wd-100'. ($errors->has('question_1') ? " definition-txt-error" : "") , "placeholder" => "内科医、看護師長、リーダーなど", "maxlength"=>"50" ]) !!}

              @if ($errors->has('question_1'))
              <span class="definition-txt-alert">
                  {{ $errors->first('question_1') }}
              </span>
              @endif

              <p class="space-pd-top-sm">※質問は50文字以下でご入力ください</p>
              {!! Form::textarea('answer_1',null,['class'=>'card-textarea space-mt-10 car-mx-wd-auto'.($errors->has('answer_1') ? " definition-txt-error" : ""),'placeholder'=>'日比谷線六本木駅から徒歩2分','maxlength'=>'500','row'=>'1','style'=>'overflow: hidden; overflow-wrap: break-word; height: 76px;']) !!}
              <p class="space-pd-top-sm">※回答は100文字以上、500文字以下でご入力ください</p>
                  @if ($errors->has('answer_1'))
                <span class="definition-txt-alert">
                  {{ $errors->first('answer_1') }}
              </span>
              @endif
            </dd>
          </dl>
        </li>
        <li class="definition-table-item">
          <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item definition-head-item-left">質問/回答 02
              </span>
            </dt>
            <dd class="definition-table-body">
              <div class="space-pd-btm-sm">
                  {!! Form::select('question_option',$questions,null,['class'=> 'card-selectbox-select question_option_2','onchange'=>'setQuestion_2()']) !!}
              </div>
              {!! Form::text('question_2',null,['id'=>'question_2','class'=> 'definition-text-field card-wd-100'. ($errors->has('question_2') ? " definition-txt-error" : "") , "placeholder" => "内科医、看護師長、リーダーなど", "maxlength"=>"50" ]) !!}
              <p class="space-pd-top-sm">※質問は50文字以下でご入力ください</p>
              {!! Form::textarea('answer_2',null,['class'=>'card-textarea space-mt-10 car-mx-wd-auto','placeholder'=>'日比谷線六本木駅から徒歩2分','maxlength'=>'500','row'=>'1','style'=>'overflow: hidden; overflow-wrap: break-word; height: 76px;']) !!}
              <p class="space-pd-top-sm">※回答は100文字以上、500文字以下でご入力ください</p>
            </dd>
          </dl>
        </li>
        <li class="definition-table-item card-input-br-btm">
          <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item definition-head-item-left">質問/回答 03
              </span>
            </dt>
            <dd class="definition-table-body">
              <div class="space-pd-btm-sm">
                  {!! Form::select('question_option',$questions,null,['class'=> 'card-selectbox-select question_option_3','onchange'=>'setQuestion_3()']) !!}
              </div>
              {!! Form::text('question_3',null,['id'=>'question_3','class'=> 'definition-text-field card-wd-100'. ($errors->has('question_3') ? " definition-txt-error" : "") , "placeholder" => "内科医、看護師長、リーダーなど", "maxlength"=>"50" ]) !!}
              <p class="space-pd-top-sm">※質問は50文字以下でご入力ください</p>
              {!! Form::textarea('answer_3',null,['class'=>'card-textarea space-mt-10 car-mx-wd-auto','placeholder'=>'日比谷線六本木駅から徒歩2分','maxlength'=>'500','row'=>'1','style'=>'overflow: hidden; overflow-wrap: break-word; height: 76px;']) !!}
              <p class="space-pd-top-sm">※回答は100文字以上、500文字以下でご入力ください</p>
            </dd>
          </dl>
        </li>
      </ul>

  <div class="space"></div>
  <div class="h-p-30">
  <div class="row">
    <table class="btn-table">
      <tbody class="btn-table-body">
        <tr>
          <td class="btn-table-item">
            <a href="javascript:void(0)" onclick="preview()">
            <button type="button" class="tbl-btn-grey" id="preview" >プレビュー</button>
            </a>
            <div class="tex-center">
              <div class="tbl-alert-item">
                <div class="tbl-alert-text card-fw-normal">仕上がりを確認しましょう！
                </div>
              </div>
            </div>
          </td>
          <td class="btn-table-item card-bdr-left">
            <button type="submit" class="tbl-btn-blue">この内容で</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  @push('customjs')
<script>
function trigger() {
  $('#fileInput').click()
}
function setQuestion_1(e){
  console.log(e)
 $('#question_1').val($('.question_option_1 option:selected').text()) 
  }
function setQuestion_2(e){
  $('#question_2').val($('.question_option_2 option:selected').text()) 
  }
function setQuestion_3(e){
  $('#question_3').val($('.question_option_3 option:selected').text()) 
  }
 
var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
};

function preview(){
  var original_action = $('#staffvoice-form').attr('action')
  var original_method = $('#staffvoice-form').attr('method')
  $('#staffvoice-form').attr('target','_blank');
  $('input[name="_method"]').val('POST')
  $('#staffvoice-form').attr('action','{{route('staff_voices.post_preview')}}');
  $('#staffvoice-form').submit();
  $('#staffvoice-form').removeAttr('target');
  $('#staffvoice-form').attr('action',original_action);
  $('#staffvoice-form').attr('method',original_method);
  $('input[name="_method"]').val('PATCH')
}
  
</script>
@endpush