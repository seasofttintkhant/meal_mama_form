@extends('layouts.app')

@section('content')
<div class="content e-none-content">
<main class="common-main">
  <div class="main-content">
    <div class="second-sidebar">
      <div class="common-sidebar selection-sidebar">
        <div class="fac-sidebar-nav">
          <div class="fac-nav-tree-inner">
            <div class="fac-scroll-inner">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                          <a class="accordation-head card-fw-bold text-center" href="/seasoftadmin/search.php"><span>選考中</span></a>
                      </div>
                      <div class="panel-heading">
                          <a class="accordation-head card-fw-bold card-medium-short" href="/seasoftadmin/search.php"><span>すべて</span></a>
                      </div>
                    </div>
                    <div class="panel panel-default card-bdr-top ">
                      <div class="panel-heading">
                        <a class="accordation-head card-medium-short" href="#"><span class="accordation-title card-fw-normal">応募済</span></a>
                      </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head" href=""><span class="accordation-title card-fw-normal">書類選考中</span></a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-fw-bold" ><span class="accordation-title card-fw-normal">面接日設定済</span></a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-fw-bold" href=""><span class="accordation-title card-fw-normal">面接実施中</span></a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-fw-bold" href=""><span class="accordation-title card-fw-normal">内定済</span></a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-fw-bold" href=""><span class="accordation-title card-fw-normal">内定承諾済</span></a>
                        </div>
                    </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                          <a class="accordation-head card-fw-bold text-center" href="/seasoftadmin/search.php"><span>選考済み</span></a>
                      </div>
                      <div class="panel-heading">
                          <a class="accordation-head card-fw-bold card-medium-short" href="/seasoftadmin/search.php"><span>すべて</span></a>
                      </div>
                    </div>
                    <div class="panel panel-default card-bdr-top ">
                      <div class="panel-heading">
                        <a class="accordation-head card-medium-short" href="#"><span class="accordation-title card-fw-normal">入職済</span></a>
                      </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head" href=""><span class="accordation-title card-fw-normal">不採用</span></a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-fw-bold" ><span class="accordation-title card-fw-normal">内定辞退</span></a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-fw-bold" href=""><span class="accordation-title card-fw-normal">選考終了・離脱</span></a>
                        </div>
                    </div>
                    </div>
                  </div>
              </div>
            </div><!-- .fac-scroll-inner -->
            </div><!-- .fac-nav-inner -->
          </div><!-- .fac-sidebar-nav -->
        </div><!-- .common-sidebar -->
    </div><!-- .second-sidebar -->
        
    <div class="common-content-inner card-selection-inner">
      <div class="fac-content-block">
        <div class="space-pd-20">
          <form>
            <dl class="filter-pannel-item">
                <dt class="filter-pannel-head e-pannel-head">職種</dt>
                <dd class="filter-pannel-body">
                  <input value="" name="position" class="definition-text-field card-wd-100" placeholder="都道府県・施設名・募集職種をスペース区切りで検索" maxlength="100" type="text">
                </dd>
            </dl>
            <div class="filter-pannel clearfix">
              <dl class="filter-pannel-item">
                <dt class="filter-pannel-head e-pannel-head">求職者</dt>
                <dd class="filter-pannel-body">
                  <input value="" name="member_name_or_id" class="definition-text-field card-wd-100" placeholder="氏名・会員番号で検索" maxlength="100" type="text">
                </dd>
                <dt class="filter-pannel-head text-center e-pannel-head">メモ</dt>
                <dd class="filter-pannel-body">
                  <input value="" name="note" class="definition-text-field card-wd-100" placeholder="メモ内でのキーワードで検索" maxlength="100" type="text">
                </dd>
              </dl>
              <div class="filter-pannel-btn">
                <button type="submit" class="space-mt-auto card-btn">
                  <span class="icon-btn-blue">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                  <span class="">この条件で絞り込む</span>
                </button>
                <a href="#" class="pannel-right-link pull-right">条件をクリア</a>
              </div>
            </div><!-- .filter-pannel -->
          </form>
        </div>
      </div><!-- .fac-content-block --> 
      <div class="space"></div>
      <div class="common-not-found cmn-not-found-fac">
        <div class="common-not-found-inner">
          <div class="space-pd-20 text-center">
            <span><i class="fa fa-search fa-4x" aria-hidden="true"></i></span>
             <p class="not-found-txt space-pd-top-md">該当者がいません<br>検索内容を変更してお試しくださ</p>
          </div>
        </div>
      </div>
    </div><!-- .common-content-inner -->
  </div><!-- .common-content -->
</main><!-- .common-main -->
</div><!-- .content -->
@endsection