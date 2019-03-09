@extends('layouts.modeswitch_app')

@section('content')
<div class="content">
  <main class="main-with-sidebar">
    <div class="space"></div>
    <div class="card h-card h-p-30">
      <div class="h-border-buttom">
        <div class="d-flex justify-content-between space-pd-btm-md">
            <span><strong>メールアドレス</strong></span>
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
      <form method="POST" action="{{route('email.update')}}">
        {{ csrf_field() }}
        <ul class="definition-table">
          <li class="definition-table-item">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">現在のメールアドレス
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <div class="card-small-short space-pd-btm-sm card-fw-bold">
                    {{auth()->user()->email}}
                  </div>
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
                  <span class="definition-head-item definition-head-item-left"><span>変更後の<br>メールアドレス</span>
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <input type="text" value="" name="email" class="definition-text-field definition-txt-error" placeholder="">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <span class="definition-txt-alert"><strong>{{ $errors->first('email') }}</strong></span>
                    </span>
                    @endif
                </dd>              
              </dl>
            </li>
        </ul><!-- .definition-table -->
        <div class="space"></div>
        <div class="space-mt-auto text-center">
          <button type="submit" class="card-wd-320 card-medium-short card-fw-bold blue-btn">メールアドレスを変更する</button>
        </div>
      </form>
    </div><!-- .card -->
    <div class="space"></div>
    <div class="space"></div>

  </main>
</div>
@endsection
