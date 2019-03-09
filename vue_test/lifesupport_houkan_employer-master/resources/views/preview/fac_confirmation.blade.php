@extends('layouts.no_sidebar_app')

@section('content')
<div class="space"></div>
<div class="space"></div>
<div class="content clearfix" id="app">
  <div class="container j-dtl__container">
      <div class="row">
        <!-- メインエリア -->
        <div class="col-md-9 j-dtl-main__l">
          <section class="j-dtl-main__card">
            <h2 class="font-24 color-pink">テキストテキストテキストテキストテキストテキスト</h2>
            <div class="col-md-12 j-dtl__col-l">
            <img src="../img/job-search_feature.png" alt="求人" class="w-100"/>
            </div><br>
            <!-- ここまで -->
            <h2 class="font-24">テキストテキストテキスト</h2>
            <table class="table j-dtl__table p-chg">
              <tbody>
                <tr>
                  <th>ダミー</th>
                  <td class="font-14 color-pink">ダミーテキスト</td>
                </tr>
                <tr>
                  <th>ダミー</th>
                  <td class="font-14">
                    <span class="font-12 job-icon font-weight-bold">ダミー</span>アクセスアクセス<br />アクセスアクセスアクセスアクセス
                    <div class="googlemap font-32 text-center">googlemap</div>
                  </td>
                </tr>
                <tr>
                  <th>ダミー</th>
                  <td class="font-14">ダミーテキスト</td>
                </tr>
                <tr>
                  <th>ダミー</th>
                  <td class="font-14"><span class="font-12 job-icon font-weight-bold">ダミー</span>アクセスアクセス<br />アクセスアクセスアクセスアクセス</td>
                </tr>
              </tbody>
            </table>
            <div class="text-center mt-4 j-dtl__btn-area">
              <a href="" class="btn-white font-20 color-black j-dtl__keep-btn text-center font-weight-bold w-chg">キープする</a>
              <a href="" class="btn-pink color-white font-20 j-dtl__app-btn w-chg">応募画面へ進む<span class="font-12">簡単＆すぐできます！</span></a>
              <div class="balloon-area w-chg">
                <div class="balloon">
                  <p class="font-12 color-white">キープして会員登録すると<br />スカウトされやすくなります！</p>
                </div>
              </div>
            </div>
            <!-- sp表示 -->
            <div class="sp-j-dtl__btn-area">
              <a href="" class="btn-r25 btn-pink color-white font-20 text-center sp-j-dtl__app-btn">応募画面へ進む<span class="font-12">簡単＆すぐできます！</span></a>
              <a href="" class="btn-r25 btn-white font-20 color-black text-center font-weight-bold sp-j-dtl__keep-btn">キープする</a>
              <div class="balloon-area">
                <div class="balloon">
                  <p class="font-12 color-white">キープして会員登録すると<br />スカウトされやすくなります！</p>
                </div>
              </div>
            </div>
            <!-- ここまで -->
          </section>
        </div>
        <!-- サイドエリア -->
        <div class="col-md-3 j-dtl-side_col">
          <div class="side-info-area mt-0">
            <h4 class="font-16">訪看Jobからのお知らせ</h4>
            <ul class="side-info-list">
              <li>
                <a href="" class="font-14">
                  <span class="color-black side-info-date">2018/07/31</span>
                  <p class="color-pink side-info-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </a>
              </li>
              <li>
                <a href="" class="font-14">
                  <span class="color-black side-info-date">2018/07/31</span>
                  <p class="color-pink side-info-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </a>
              </li>
              <li>
                <a href="" class="font-14">
                  <span class="color-black side-info-date">2018/07/31</span>
                  <p class="color-pink side-info-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </a>
              </li>
              <li class="text-right">
                <a href="" class="color-pink font-14">お知らせをもっと見る　〉</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="space"></div>

  

@endsection