@extends('layouts.modeswitch_app')
@section('content')
<div class="content">
    <main class="main-with-sidebar">
    <div class="card h-card h-p-30">
      <div class="h-border-buttom">
        <div class="d-flex justify-content-between space-pd-btm-md">
            <span><strong>メッセージテンプレート</strong></span>
        </div>
      </div>
      <div class="space"></div>
    {!! Form::open(['route'=>['message-templates.store'],'method'=>'POST']) !!}

        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('title','テンプレート名', ['class' => 'msg-label']) !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
            @if ($errors->has('title'))
            <span class="help-block">
                <span class="definition-txt-alert"><strong>{{ $errors->first('title') }}</strong></span>
            </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('content','テンプレート本文', ['class' => 'msg-label']) !!}
            {!! Form::textarea('content',null,['size' => '30x5','class'=>'form-control msg-content','id'=>"description", 'max-length' => 3000, 'placeholder' => "はじめまして。
    [[法人名]]の○○と申します。
    プロフィールを拝見してぜひ見学を兼ねて面接にお越しいただきたくスカウトを送らせていただきました。
    [[募集内容]]
    ご不明点などがございましたらお気軽にご返答ください。
    ご応募、心よりお待ちしております。"]) !!}
            @if ($errors->has('content'))
            <span class="help-block">
                <span class="definition-txt-alert"><strong>{{ $errors->first('content') }}</strong></span>
            </span>
            @endif
        </div>
        <br>
        <div class="description">
            テンプレート内に [[募集内容]] と入力しておくと、メッセージ作成時に募集内容が自動補完されます。
            テンプレート内に [[法人名]] と入力しておくと、メッセージ作成時に貴社名が自動補完されます。
            スマートフォンで閲覧する求職者が多いため、300文字未満程度の文字数がおすすめです。
            <span class="word-count">0</span> 文字
        </div>
        <div class="space"></div>
        <button type="submit" class="card-wd-320 card-medium-short card-fw-bold blue-btn msg-save f-m-auto" value="">テンプレートを保存する</button>

    {!!Form::close()!!}
      </table>
    </div><!-- .card -->
    </main>
<script
              src="https://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
      <script type="text/javascript">
          $(document).ready(function(){

            var text_length = $(".msg-content").val().length;
            $(".word-count").text(text_length);
            if(text_length > 3000) {
                $(".msg-save").prop("disabled",true);
            }else{
                $(".msg-save").prop("disabled",false);
            }

            $(".msg-content").on("keyup", function(){
                var text_length = $(this).val().length;
                $(".word-count").text(text_length);
                if(text_length > 3000) {
                    $(".msg-save").prop("disabled",true);
                }else{
                    $(".msg-save").prop("disabled",false);
                }
            })
          })
      </script>
</div>

@endsection