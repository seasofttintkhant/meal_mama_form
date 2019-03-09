@extends('layouts.app')

@section('content')
<div class="content e-none-content">
  <main class="common-main">
    <div class="common-content">
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

      <div class="common-content-inner card-message-inner">
        <div class="fac-content-block">

          <div class="card-msg-view">
            <div class="card-msg-sticky">
              <div class="card-msg-view-head">
                <div class="card-inline-form clearfix">
                  <span class="card-inline-item">
                    <span><p class="card-medium-short card-fw-bold space-mt-btm-0">ライフサポート訪問看護リハビリステーション菊名 理学療法士 求人について</p></span>
                    <span>
                    <div class="card-flex">
                      <span class="card-medium-short card-fw-bold space-pr-sm">片山 あかり</span>
                      <span class="card-small-short card-fw-bold card-font-grey"> |  40歳 女性</span>
                    </div>
                  </span>
                  </span>
                  <span class="card-inline-item pull-right">
                    <span>
                      <a href="#" class="card-link carf-small-short" target="_blank">
                        <div class="card-icon-txt">
                            <div class="card-icon-txt-inner">
                              <span class="">
                                <i><i>
                              </span>
                            </div>
                          <div class="card-icon-txt">募集ページを確認する</div>
                        </div>
                      </a><br>
                      <a href="#" class="card-link card-small-short" target="_blank">
                        <div class="card-icon-txt">
                            <div class="card-icon-txt-inner">
                              <span class="">
                                <i><i>
                              </span>
                            </div>
                          <div class="card-icon-txt">プロフィールを見る</div>
                        </div>
                      </a>
                    </span>
                  </span>
                </div><!-- .card-inline-form -->
              </div><!-- .card-msg-view-head -->
              <div class="card-msg-view-inner">
                <div class="card-msg">
                  <div class="card-msg-box">
                    <div class="card-msg-body-inner">
                      <div class="card-msg-view-body">
                        <span class="card-inline-tbl">
                          <span class="card-label label-rounded">応募
                          </span>
                          &nbsp;
                        </span>
                        <span> 
                          <span class="card-fw-normal">この度は、訪看ジョブの求人広告を見て応募いたしました。<br></span>
                          <span>宜しければ、面接の機会をいただけましたら幸いです。<br></span><span>ご多忙の所恐縮ですが、どうぞよろしくお願い致します。<br></span></div>
                          <span>■応募勤務形態 正職員<br></span>
                          <span>■保有資格 看護師,准看護師,自動車運転免許<br></span>
                          <span>■応募職種の経験 1年未満<br></span>
                          <span>■面接希望日<br></span>
                          <span>2018年10月30日(火)：午前</span>
                    </div>
                    <div class="card-msg-attachment ">
                      <div class="card-inline-group">
                        <div class="card-inline-item">
                          <div class="card-icon-txt">
                            <div class="c-icon-text__icon">
                              <div class="card-icon-txt-inner">
                              </div>
                            </div>
                            <div class="card-icon-txt">
                              <span class="card-msg-date card-medium-short">2018/10/25 17:13</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- .card-msg -->

                <div class="card-msg">
                  <div class="card-msg-box">
                    <div class="card-msg-body-companion">
                      <div class="card-msg-view-body">
                        <span class="card-inline-tbl">
                          <span class="card-label label-rounded">通常
                          </span>
                          &nbsp;
                        </span>
                        <span> 
                          <span class="card-fw-normal">谷平様<br></span>
                          <span>弊社にお問い合わせいただきありがとうございます。<br></span>採用担当をしております猿井と申します。<br></span>
                          <span>先ずは会社説明会にお越し頂き、弊社で良ければ<br>面接に進んでいただければと考えております。<br></span>
                          <span>会社説明会は個別に行っておりますので、</span><br>
                          <span>ご都合の良い日程を２，３頂ければ幸いです。<br></span>
                          <span>因みに30日（火）であれば、11時からであれば可能です。<br></span>
                          <span>宜しくお願い致します。</span>
                        </div>
                    </div>
                    <div class="card-msg-attachment card-msg-attach-companion">
                      <div class="card-inline-group">
                        <div class="card-inline-item">
                          <div class="card-icon-txt">
                            <div class="c-icon-text__icon">
                              <div class="card-icon-txt-inner">
                              </div>
                            </div>
                            <div class="card-icon-txt">
                              <span class="card-msg-date card-medium-short">2018/10/25 17:13</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- .card-msg -->
                <div class="space"></div>
                <form method="get" class="card-bdr-top">
                  <ul class="definition-table space-pd-top-sm">
                    <li class="definition-table-item card-bdr-none">
                      <dl class="dl-definition-table card-bdr-none">
                        <dt class="definition-table-head card-small-short card-wd-125 card-msg-head-bg">
                          <span class="definition-head-item definition-head-item-left">送信内容
                          </span>
                        </dt>
                        <dd class="definition-table-body">
                          <span class="common-box-left">
                            <label class="common-radio">通常返信
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </span>
                          <span class="common-box-center">
                            <label class="common-radio">内定通知
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </span>
                          <span class="common-box-right">
                          <label class="common-radio">不採用通知
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                          </label>
                        </span>
                        </dd>
                      </dl>
                    </li>
                    <li class="definition-table-item card-bdr-none">
                      <dl class="dl-definition-table card-bdr-none">
                        <dt class="definition-table-head card-small-short card-wd-125 card-msg-head-bg">
                          <div class="card-flex">
                            <div class="card-flex-item">
                             <span class="">メッセージ<br>テンプレート
                             </span>
                            </div>
                            <div class="card-flex-item">
                              <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                            </div>
                          </div>
                        </dt>
                        <dd class="definition-table-body">
                          <div class="card-option">
                            <label class="card-selectbox">
                              <select name="customer_message_template" id="customer_message_template" class="card-selectbox-select">
                                <option value="0">未選択</option>
                                <option value="1">スカウト（常勤理学療法士）</option>
                                <option value="2">スカウト（常勤作業療法士）</option>
                                <option value="3">スカウト（パート理学療法士）</option>
                                <option value="4">スカウト（パート作業療法士）</option>
                                <option value="5">スカウト（パート看護師）</option>
                              </select>
                              <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                              </span>
                            </label>
                          </div>
                        </dd>
                      </dl>
                    </li>
                    <li class="definition-table-item card-bdr-none">
                      <dl class="dl-definition-table">
                        <dt class="definition-table-head card-small-short card-wd-125 card-msg-head-bg">
                          <span class="definition-head-item definition-head-item-left">本文
                          </span>
                        </dt>
                        <dd class="definition-table-body ">
                          <div class="space-pd-btm-sm">
                            <textarea name="special_holiday" class="card-textarea car-mx-wd-auto space-mt-10" placeholder="はじめまして。
プロフィールを拝見してぜひ見学を兼ねて面接にお越しいただきたくスカウトを送らせていただきました。  
  【募集内容】 
募集職種：看護師/准看護師" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                          </div>
                        </dd>
                      </dl>
                    </li>
                  </ul>
                  <div class="card-msg-btn card-wd-230 space-mt-auto">
                    <button type="submit" class="card-fw-bold tbl-btn-blue">この内容でメッセージを送る</button>
                  </div>
                </form>
                </div><!-- .card-msg-view-inner -->
              </div><!-- .card-msg-body-inner -->
            </div><!-- .card-msg-sticky -->
          </div><!-- .card-msg-view -->
        </div><!-- .fac-content-block -->
      </div><!-- .common-content-inner -->
    </div><!-- .common-content -->
  </main><!-- .common-main -->
</div><!-- .content -->
@endsection