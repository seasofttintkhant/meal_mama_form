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
          <div class="card h-card h-p-30">
            <div class="h-border-buttom">
              <div class="d-flex justify-content-between space-pd-btm-md">
                  <h2 class="font-24"><strong>採用担当FAQ・お問い合わせ</strong></h2>
              </div>
            </div>
            <div class="space"></div>
            <div class="rule-text">
            <?php echo isset($data['rule']) ? $data['rule'] : ''; ?>
            </div>
          </div>
        </div>
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
