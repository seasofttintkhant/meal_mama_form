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
  <link href="{{ asset('css/faq.css') }}" rel="stylesheet" type="text/css">

</head>
<body class="body">
    <div>
        <nav class="h-nav h-link-color-white h-dsk">
            <div class="h-nav-left h-link-text-dec-none">
                <div class="h-nav-brand">
                    <a href="/">訪看Job</a>
                </div>
            </div>
            <div class="h-nav-right">
                <div class="h-nav-option">
                    <div class="h-nav-itmes">
                        <ul>
                            @auth
                                <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>                            
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        

        <div class="h-wrapper loading-data"></div>

        <div class="h-popup-container h-p-30 loading-data" popup_name = "2">
          <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
        <div class="main-with-sidebar pd-t-40">
          @auth
          <section class="rule__container">
              <div class="rule__box faq__box-area">
                <h2 class="font-24">採用担当FAQ・お問い合わせ</h2>
                <div class="rule__container-body">
                  <p>訪看ジョブによく寄せられるお問い合わせ内容です。
                    <br>
                    「採用担当FAQ」を読んでも解決しない場合は、このページの最下部にあるお問い合わせフォームよりご連絡ください。
                  </p>
                  <ul class="faq-list scroll-is-top">
                    @foreach(config('custom.faq_types') as $key => $faq_type)
                    <li class="faq-list-item {{ $key == 1 ? 'faq-list-item-active' : '' }} " data-question_tab="{{$key}}">{{$faq_type}}</li>
                    @endforeach
                  </ul>
                  @foreach(config('custom.faq_types') as $key => $faq_type)
                  <ul class="faq-details-list faq-details-list-{{$key}}">
                    @foreach($faqs as $faq_type_key => $faq)
                      @if($key == $faq->faq_type)
                      <li>
                        <a href="#" class="scroll-to" data-scroll_to="{{$faq_type_key}}">{!!$faq->question!!}</a>
                      </li>
                      @endif
                    @endforeach
                  </ul>
                  @endforeach
                </div>
              </div>
            </section>
  
            @foreach(config('custom.faq_types') as $key => $faq_type)
              <section class="faq__container">
                <div class="rule__box faq__box-area">
                  <h2 class="font-24">応募管理について</h2>
                  <div class="rule__container-body">
                    @foreach($faqs as $faq_type_key => $faq)
                      @if($key == $faq->faq_type)
                        <div class="faq__details-col">
                          <h3 class="font-16 faq__details-title scroll-is-{{$faq_type_key}}">{{$faq->question}}</h3>
                          <div class="faq__details font-14">
                            {!! $faq->answer !!}
                            <div class="text-right">
                              <a href="#" class="color-pink scroll-to-top">↑ページTOPへ</a>
                            </div>
                          </div>
                          <div class="faq__border-bottom"></div>
                        </div>
                      @endif
                    @endforeach
                  </div>
                </div>
              </section>
            @endforeach
          @endauth
          <section class="faq__container faq_form">
            <div class="rule__box faq__box-area">
              <h2 class="font-24">お問い合わせフォーム</h2>
              <div class="rule__container-body">
                <div class="text-right mb-30">
                  <a href="#" class="color-pink faq__apply-text">お仕事をお探しの方はこちらから</a>
                </div>
                <table class="table faq__table">
                  <tbody>
                    <tr>
                      <th>
                        <label class="faq__essential">お問い合わせの種類</label>
                      </th>
                      <td>
                        <select class="inq-type w-80">
                          <option>問い合わせ内容を選択してください</option>
                          <option>操作中に発生した不具合について</option>
                          <option>訪看ジョブの使い方について</option>
                          <option>画像バナー掲載プランについて</option>
                          <option>電話取材プランについて</option>
                          <option>訪問取材プランについて</option>
                          <option>インタビュー掲載＋集客増プランについて</option>
                          <option>日経メディカル ワークス 特別掲載プランについて</option>
                          <option>スカウト増量プランについて</option>
                          <option>価格表の請求</option>
                          <option>採用サイト作成サービスについて</option>
                          <option>その他</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label class="faq__essential">法人名(団体名)</label>
                      </th>
                      <td>
                        <input type="text" name="" value="ホウカンジョブ" placeholder="" class="apply-input-form w-80">
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label class="faq__essential">ご担当者様氏名</label>
                      </th>
                      <td>
                        <input type="text" name="" value="猿井" placeholder="" class="apply-input-form w-40">
                        <input type="text" name="" value="良太郎" placeholder="" class="apply-input-form w-40">
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label class="faq__essential">メールアドレス</label>
                      </th>
                      <td>
                        <input type="text" name="" value="sarui@life-support.jp" placeholder="" class="apply-input-form w-80">
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label class="faq__essential">電話番号</label>
                      </th>
                      <td>
                        <input type="tel" name="" value="0458347663" placeholder="" class="apply-input-form w-80">
                      </td>
                    </tr>
                    <tr>
                      <th>
                        <label>部署名</label>
                      </th>
                      <td>
                        <input type="email" name="" value="" placeholder="xxx@xxx.com" class="apply-input-form w-80">
                      </td>
                    </tr>
                    <tr>
                      <th class="last-th">
                        <label>役職名</label>
                      </th>
                      <td class="last-td">
                        <input type="email" name="" value="代表取締役" placeholder="" class="apply-input-form w-80">
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="text-center faq__apply-btn">
                  <input type="submit" name="" value="この内容で問い合わせる" class="apply-input-form w-80">
                </div>
                <div class="text-center">
                  <a href="#" class="color-pink faq__apply-text">利用規約はこちら</a>
                  <p class="faq__apply-text mt-20">訪看ジョブからの確認メールが「迷惑メール」フォルダに振り分けられる可能性がございます。</p><br />
                      登録したにも関わらずメールの届かない方は、念のため、「迷惑メール」フォルダの確認をお願い致します。<br />
                      迷惑メール対策をしている方は「@medley.jp」からのメールを受けとれるように設定をしてください。<br />
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        $(document).on("click", ".faq-list-item", function(){
          $(".faq-list-item").removeClass("faq-list-item-active");
          $(this).addClass("faq-list-item-active");
          var tab_id = $(this).data("question_tab");
          $(".faq-details-list").hide();
          $(".faq-details-list-"+tab_id).show();
        });

        $(document).on("click", ".scroll-to", function(){
          var scroll_to = $(this).data("scroll_to");
          $('html, body').stop().animate({
              scrollTop: ($(".scroll-is-"+scroll_to).offset().top)-75
          }, 500);
        });

        $(document).on("click", ".scroll-to-top", function(){
          $('html, body').stop().animate({
              scrollTop: 0
          }, 500);
        });



      })
    </script>
