@extends('layouts.app')

@section('content')
<div class="content" id="app">
   <div class="card h-card h-p-20">
      <form class="form-none">
       <div class="filter-pannel clearfix">
          <dl class="filter-pannel-item space-mt-none">
            <dt class="filter-pannel-head">対象求人</dt>
              <dd class="filter-pannel-body">
                <div class="filter-option">
                  <div class="fac-search-box auto-complete-input">
                    <input type="text" id="keyword" placeholder="都道府県・施設名・募集職種をスペース区切りで検索" class="search-box-input card-wd-100">
                    <button type="submit" class="fac-search-btn" @click.prevent="searchFacilities">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <div class="auto-complete-data-container full-width">
                      <ul class="auto-complete-data">
                        <li>施設・求人施設・求人施設・求人施設・求人</li>
                        <li>lowei wepori werwpio rwepo wrppw er</li>
                        <li>lowei wepori werwpio rwepo wrppw er</li>
                        <li>lowei wepori werwpio rwepo wrppw er</li>
                      </ul>
                    </div>
                  </div><!-- .fac-search-box -->
                  </div>
              </dd>
            <dt class="filter-pannel-head text-center e-pannel-head">期間選択</dt>
            <dd class="filter-pannel-body">
              <div class="definition-input-left">
                <div class="card-option">
                  <label class="card-selectbox">
                  <select name="period_type" id="period_type" class="card-selectbox-select chart-select card-wd-100">
                    <option value="0">年間</option>
                    <option value="1">月間</option>
                    <option value="2">週間</option>
                  </select>
                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                  </span>
                  </label>
                </div>
              </div>
              <div class="definition-input-right">
                <div class="card-option">
                  <label class="card-selectbox">
                  <select name="target_period" id="target_period" class="card-selectbox-select card-wd-100">
                    <option value="0">2018</option>
                    <option value="1">2017</option>
                    <option value="2">2016</option>
                  </select>
                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                  </span>
                  </label>
                </div>
              </div>
            </dd>
          </dl>
        </div><!-- .filter-pannel -->
      </form>
  </div><!-- .card -->
  <div class="space"></div>

    <div class="container">
    
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="card h-card">
          <div class="card-both-edge space-mt-auto">
            <div class="card-edge-left space-pd-top-sm">
              <div class="card-both-edge-inner">
                <h2 class="card-medium-title-short">採用決定数</h2>
              </div>
            </div>
            <div class="card-edge-right text-right space-pd-top-sm">
              <div class="card-both-edge-inner">
                <a href="#" class="card-link card-medium-short">このグラフの内容</a>
              </div>
            </div>
          </div>
          <div class="graph-content">
            <img src="../img/chart2.png" class="img-fluid" alt="chart1">
          </div><!-- /.box -->
          <div class="card-box space-mt-auto">
            <p class="card-small-short card-fw-bold space-pd-top-sm">採用決定数を伸ばすには…</p>
            <ul class="card-list-style">
              <li><a class="card-link" href="#">メッセージの文面を工夫し、頻繁にやりとりしましょう</a></li>
               <li><a class="card-link" href="#">求人原稿に選考フローについて詳しく記述しましょう</a></li>
            </ul>
          </div>
        </div>
      </div><!-- /.col (LEFT) -->
      <div class="col-md-6 col-sm-6">
        <div class="card h-card">
          <div class="card-both-edge space-mt-auto">
            <div class="card-edge-left space-pd-top-sm">
              <div class="card-both-edge-inner">
                <h2 class="card-medium-title-short">採用決定数</h2>
              </div>
            </div>
            <div class="card-edge-right text-right space-pd-top-sm">
              <div class="card-both-edge-inner">
                <a href="#" class="card-link card-medium-short">このグラフの内容</a>
              </div>
            </div>
          </div>
          <div class="graph-content">
            <img src="../img/chart2.png" class="img-fluid" alt="chart1">
          </div><!-- /.box -->
          <div class="card-box space-mt-auto">
            <p class="card-small-short card-fw-bold space-pd-top-sm">採用決定数を伸ばすには…</p>
            <ul class="card-list-style">
              <li><a class="card-link" href="#">メッセージの文面を工夫し、頻繁にやりとりしましょう</a></li>
               <li><a class="card-link" href="#">求人原稿に選考フローについて詳しく記述しましょう</a></li>
            </ul>
          </div>
        </div>
      </div><!-- /.col (RIGHT) -->
    </div>

    <div class="row space-pd-top-md">
      <div class="col-md-6 col-sm-6">
        <div class="card h-card">
          <div class="card-both-edge space-mt-auto">
            <div class="card-edge-left space-pd-top-sm">
              <div class="card-both-edge-inner">
                <h2 class="card-medium-title-short">採用決定数</h2>
              </div>
            </div>
            <div class="card-edge-right text-right space-pd-top-sm">
              <div class="card-both-edge-inner">
                <a href="#" class="card-link card-medium-short">このグラフの内容</a>
              </div>
            </div>
          </div>
          <div class="graph-content">
            <img src="../img/chart3.png" class="img-fluid" alt="chart1">
          </div><!-- /.box -->
          <div class="card-box space-mt-auto">
            <p class="card-small-short card-fw-bold space-pd-top-sm">採用決定数を伸ばすには…</p>
            <ul class="card-list-style">
              <li><a class="card-link" href="#">メッセージの文面を工夫し、頻繁にやりとりしましょう</a></li>
               <li><a class="card-link" href="#">求人原稿に選考フローについて詳しく記述しましょう</a></li>
            </ul>
          </div>
        </div>
      </div><!-- /.col (LEFT) -->
      <div class="col-md-6 col-sm-6">
        <div class="card h-card">
          <div class="card-both-edge space-mt-auto">
            <div class="card-edge-left space-pd-top-sm">
              <div class="card-both-edge-inner">
                <h2 class="card-medium-title-short">採用決定数</h2>
              </div>
            </div>
            <div class="card-edge-right text-right space-pd-top-sm">
              <div class="card-both-edge-inner">
                <a href="#" class="card-link card-medium-short">このグラフの内容</a>
              </div>
            </div>
          </div>
          <div class="graph-content">
            <img src="../img/chart4.png" class="img-fluid" alt="chart1">
          </div><!-- /.box -->
          <div class="card-box space-mt-auto">
            <p class="card-small-short card-fw-bold space-pd-top-sm">採用決定数を伸ばすには…</p>
            <ul class="card-list-style">
              <li><a class="card-link" href="#">メッセージの文面を工夫し、頻繁にやりとりしましょう</a></li>
               <li><a class="card-link" href="#">求人原稿に選考フローについて詳しく記述しましょう</a></li>
            </ul>
          </div>
        </div>
      </div><!-- /.box -->

      </div><!-- /.col (RIGHT) -->
    </div>
  
  </div>
  <div class="space"></div>
</div><!-- .content -->
@endsection

