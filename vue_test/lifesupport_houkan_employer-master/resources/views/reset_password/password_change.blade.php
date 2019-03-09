<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1000" data-react-helmet="true">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/password_reset.css') }}" rel="stylesheet" type="text/css">
    @stack('customcss')

</head>
<body>
    <div>
        <nav class="h-nav h-link-color-white h-dsk">
            <div class="h-nav-left h-link-text-dec-none">
                <div class="h-nav-brand">
                    <a href="/">訪看Job</a>
                </div>
            </div>
        </nav>
       
        <!-- Guest cannot see sidebar -->
        <div class="h-wrapper loading-data"></div>

        <div class="h-popup-container h-p-30 loading-data" popup_name = "2">
          <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
        <main class="main-with-sidebar pd-t-80">
            <div class="space"></div>
            <div class="card h-card h-p-30">
              <div class="h-border-buttom">
                <div class="d-flex justify-content-between space-pd-btm-md">
                    <span><strong>パスワードの発行</strong></span>
                </div>
              </div>
              <div class="space"></div>
                <strong>パスワードを設定していない、またはお忘れの方</strong>
                <div class="space"></div>
                <p>
                    メールアドレスを入力後「パスワードを再設定する」ボタンを押してください。<br>
                    ご登録のメールアドレスまでパスワード再設定用のURLが送信されます。
                </p>
              @if(\Session::has('success'))
              <div class="alert alert-success">
                      <ul>
                          <li>{!! \Session::get('success') !!}</li>
                      </ul>
                  </div>
              @endif  
              <form method="POST" action="{{ route('resetpassword.password_change') }}">
                {{ csrf_field() }}
                <input type="hidden" name="employer_id" value="{{$id}}">
                <input type="hidden" name="full_id" value="{{$full_id}}">
                <input type="hidden" name="id_slug" value="{{$id_slug}}">
                <ul class="definition-table">
                    <li class="definition-table-item card-input-br-btm">
                      <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                          <span class="definition-head-item">
                          </span>
                          <span class="definition-head-item definition-head-item-left"><span>新しいパスワード</span>
                          </span>
                        </dt>
                        <dd class="definition-table-body form-body">
                            <input class="form-text-field" placeholder="" value="" name="new_password" type="password">
                            @if ($errors->has('new_password'))
                            <span class="help-block">
                                <span class="definition-txt-alert"><strong>{{ $errors->first('new_password') }}</strong></span>
                            </span>
                            @endif
                        </dd>              
                      </dl>
                    </li>
                    <li class="definition-table-item card-input-br-btm">
                      <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                          <span class="definition-head-item">
                          </span>
                          <span class="definition-head-item definition-head-item-left"><span>新しいパスワード(確認)</span>
                          </span>
                        </dt>
                        <dd class="definition-table-body form-body">
                            <input class="form-text-field" placeholder="" value="" name="new_password_confirmation" type="password">
                            @if ($errors->has('new_password_confirmation'))
                            <span class="help-block">
                                <span class="definition-txt-alert"><strong>{{ $errors->first('new_password_confirmation') }}</strong></span>
                            </span>
                            @endif
                        </dd>              
                      </dl>
                    </li>
                </ul><!-- .definition-table -->
                <div class="space"></div>
                <div class="space-mt-auto text-center">
                  <button type="submit" class="card-wd-320 card-medium-short card-fw-bold blue-btn">ログイン</button>
                </div>
              </form>
            </div><!-- .card -->
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
       
    @stack('customjs')

</body>
</html>

