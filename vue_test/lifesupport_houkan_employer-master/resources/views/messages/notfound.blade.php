@extends('layouts.app')

@section('content')
<div class="content e-none-content">
<main class="common-main">
  <div class="main-content">
    <div class="second-sidebar">
        <div class="common-sidebar message-group-sidebar">
          <div class="fac-sidebar-head">
              <div class="fac-sidebar-item">
                <form>
                  <div class="fac-search-box">
                    <input type="text" value="" placeholder="対象施設を検索" class="search-box-input card-wd-90">
                    <button type="submit" class="fac-search-btn">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </div><!-- .fac-search-box -->
                  <div class="fac-text text-center">施設名・都道府県をスペース区切りで検索</div>
                </form>
              </div><!-- .fac-sidebar-item -->
              <div class="space"></div>
              <div class="fac-sidebar-item space-pd-top-sm">
                <div class="text-center"><a class="fac-link">＋ 施設の条件を詳しく絞り込む</a></div>
              </div>
              <div class="space-mt-auto space-pd-top-sm">
                <div class="card-switcher">
                  <a class="card-switcher-item card-switcher-item-active" href="#">すべて</a>
                  <a class="card-switcher-item" href="#">使用中の写真</a>
                  <a class="card-switcher-item" href="#">未使用の写真</a>
                </div><!-- .card-swithcer -->
              </div>
          </div><!-- .fac-sidebar-head -->
          <div class="fac-sidebar-nav">
            <div class="fac-nav-tree-inner">
              <div class="fac-scroll-inner">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="fac-nav-list">
                      <li class="fac-nav-item">
                        <a class="fac-nav-active fac-nav-link">
                          <div class="fac-nav-link-inner card-msg-nav">
                            <div class="card-msg-summary">
                              <div class="card-msg-summary-item">
                                <dl class="card-inline-form">
                                  <span class="card-inline-item">
                                    <span></span>
                                  </span>
                                  <span class="card-inline-item">
                                    <span class="card-msg-body">
                                      <span class="card-msg-user card-middle">
                                        片山 あかり
                                      </span>
                                      <span class="card-msg-info card-middle">
                                        <dl class="card-inline-form card-fw-bold">
                                          <span class="card-inline-item space-pr-xs">
                                            <span>00086044</span>
                                          </span>
                                          <span class="card-inline-item space-pl-5 card-bdr-left">
                                            <span>
                                              <span class="u-fw-bold">40歳 女性</span>
                                            </span>
                                          </span>
                                        </dl>
                                      </span><!-- .card-msg-info -->
                                      <span>
                                        <div class="card-msg-title">
                                          <div class="card-msg-ellipsis card-fw-bold">
                                          ライフサポート訪問看護リハビリステーション菊名 作業療法士 求人について
                                          </div>
                                        </div>
                                      </span>
                                      <span>
                                        <div class="card-msg-content card-fw-bold">
                                          <span>はじめまして。株式会社ライフサポートの猿井と申します。プロフィールを拝見して…</span>
                                        </div>
                                      </span>
                                      <span>
                                        <div class="card-msg-foot">
                                          <div class="card-flex">
                                            <div class="card-flex-item">
                                             <span class="card-msg-date">2018/10/22 14:26</span>
                                            </div>
                                          </div>
                                        </div>
                                      </span>
                                    </span><!-- .card-msg-body -->
                                  </span>
                              </dl>
                              </div>
                            </div><!-- .card-msg-summar -->
                          </div>
                        </a>
                      </li>
                      <li class="fac-nav-item">
                        <a class="fac-nav fac-nav-link">
                          <div class="fac-nav-link-inner card-msg-nav">
                            <div class="card-msg-summary">
                              <div class="card-msg-summary-item">
                                <dl class="card-inline-form">
                                <span class="card-inline-item">
                                  <span></span>
                                </span>
                                <span class="card-inline-item">
                                  <span class="card-msg-body">
                                    <span class="card-msg-user card-middle">
                                      片山 あかり
                                    </span>
                                    <span class="card-msg-info card-middle">
                                      <dl class="card-inline-form card-fw-bold">
                                        <span class="card-inline-item space-pr-xs">
                                          <span>00086044</span>
                                        </span>
                                        <span class="card-inline-item space-pl-5 card-bdr-left">
                                          <span>
                                            <span class="u-fw-bold">40歳 女性</span>
                                          </span>
                                        </span>
                                      </dl>
                                    </span><!-- .card-msg-info -->
                                    <span>
                                      <div class="card-msg-title">
                                        <div class="card-msg-ellipsis card-fw-bold">
                                        ライフサポート訪問看護リハビリステーション菊名 作業療法士 求人について
                                        </div>
                                      </div>
                                    </span>
                                    <span>
                                      <div class="card-msg-content card-fw-bold">
                                        <span>はじめまして。株式会社ライフサポートの猿井と申します。プロフィールを拝見して…</span>
                                      </div>
                                    </span>
                                    <span>
                                      <div class="card-msg-foot">
                                        <div class="card-flex">
                                          <div class="card-flex-item">
                                           <span class="card-msg-date">2018/10/22 14:26</span>
                                          </div>
                                        </div>
                                      </div>
                                    </span>
                                  </span><!-- .card-msg-body -->
                                </span>
                              </dl>
                              </div>
                            </div><!-- .card-msg-summar -->
                          </div>
                        </a>
                      </li>
                    </ul><!-- .fac-nav-list -->
                  </div>
                </div>
                </div><!-- .fac-scroll-inner -->
            </div><!-- .fac-nav-inner -->
          </div><!-- .fac-sidebar-nav -->
        </div><!-- .common-sidebar -->
    </div><!-- .second-sidebar -->
        
    <div class="common-content-inner card-selection-inner">
      <div class="space"></div>
      <div class="common-not-found">
        <div class="common-not-found-inner">
          <div class="space-pd-20 text-center">
            <span><i class="fa fa-search fa-4x" aria-hidden="true"></i></span>
             <p class="not-found-txt space-pd-top-md">メッセージが選択されていません</p>
          </div>
        </div>
      </div>
    </div><!-- .common-content-inner -->
  </div><!-- .common-content -->
</main><!-- .common-main -->
</div><!-- .content -->
@endsection
