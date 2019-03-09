@extends('layouts.modeswitch_app')

@section('content')
<div class="content">
  <main class="main-with-sidebar">
    <div class="space"></div>
    <div class="card h-card h-p-30">
      <div class="h-border-buttom">
        <div class="d-flex justify-content-between space-pd-btm-md">
            <span><strong>パスワード</strong></span>
        </div>
      </div>
      <div class="space"></div>
       @if(\Session::has('success'))
          <div class="alert alert-success">
              <ul>
                  <li>{!! \Session::get('success') !!}</li>
              </ul>
          </div>
      @endif
      <form action="{{ route('edit.updatepassword') }}" method="POST">
        {{ csrf_field() }}
        <ul class="definition-table">
          <li class="definition-table-item">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                    <span class="definition-label-red">必須
                    </span>
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">パスワード
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <input class="definition-text-field" placeholder="" value=""  name="current_password" type="password">
                  @if ($errors->has('current_password'))
                  <span class="help-block">
                      <span class="definition-txt-alert"><strong>{{ $errors->first('current_password') }}</strong></span>
                  </span>
                  @endif
                  <!-- <span class="definition-txt-alert">パスワードを入力してください</span> -->
                </dd>
              </dl>
            </li>
            <li class="definition-table-item card-input-br-btm">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                    <span class="definition-label-red">必須
                    </span>
                  </span>
                  <span class="definition-head-item definition-head-item-left">
                    新しいパスワード
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <input class="definition-text-field" placeholder="半角英数8文字以上" value="" name="new_password" type="password">
                  @if ($errors->has('new_password'))
                  <span class="help-block">
                      <span class="definition-txt-alert"><strong>{{ $errors->first('new_password') }}</strong></span>
                  </span>
                  @endif
                  <!-- <span class="definition-txt-alert">パスワードを入力してください</span> -->
                </dd>              
              </dl>
            </li>
            <li class="definition-table-item card-input-br-btm">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                    <span class="definition-label-red">必須
                    </span>
                  </span>
                  <span class="definition-head-item definition-head-item-left">
                    新しいパスワード(確認)
                  </span>
                </dt>
                <dd class="definition-table-body">
                   <input class="definition-text-field" placeholder="新しいパスワードを再入力してください" value="" name="new_password_confirmation" type="password">
                  @if ($errors->has('new_password_confirmation'))
                  <span class="help-block">
                      <span class="definition-txt-alert"><strong>{{ $errors->first('new_password_confirmation') }}</strong></span>
                  </span>
                  @endif
                  <!-- <span class="definition-txt-alert">パスワードを入力してください</span> -->
                </dd>              
              </dl>
            </li>
        </ul><!-- .definition-table -->
        <div class="space"></div>
        <div class="space-mt-auto text-center">
          <button type="submit" class="card-wd-230 card-medium-short card-fw-bold blue-btn">パスワードを変更する</button>
        </div>
      </form>
    </div><!-- .card -->
    <div class="space"></div>
    <div class="space"></div>

  </main>
</div>
@endsection
