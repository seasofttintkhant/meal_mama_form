<?php 
$request_url = Request::url();
?>
<div class="body">
  <div class="nav-side-menu with-sidebar">
    <div class="menu-list">
      <ul id="menu-content" class="menu-content">
        <li class="{{ Request::url() == route('home') ? 'active' : '' }}">
          <a href="{{ url('/')}}">
            <i class="fa fa-home fa-lg" aria-hidden="true"></i> トップページ
          </a>
        </li>
        <li class="{{ strpos($request_url,'facilities') ? 'active' : '' }}">
          <a href="{{route('facilities.index')}}">
            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>施設・求人情報
          </a>
        </li>
        <li class="{{ strpos($request_url,'staff_voices') ? 'active' : '' }}">
          <a href="{{route('staff_voices.index')}}">
            <i class="fa fa-user fa-lg" aria-hidden="true"></i> 職員の声
          </a>
        </li>
        <li class="{{ Request::url() == route('image_managers.index') ? 'active' : '' }}">
          <a href="{{route('image_managers.index')}}">
            <i class="fa fa-picture-o fa-lg" aria-hidden="true"></i> 写真管理
          </a>
        </li>
        <li class="{{ Request::url() == route('searches.index') ? 'active' : '' }}">
          <a href="{{route('searches.index')}}">
            <i class="fa fa-search fa-lg"></i> 求職者検索
          </a>
        </li>
        <li class="{{ Request::url() == route('selections.index') ? 'active' : '' }}">
          <a href="{{route('selections.index')}}">
            <i class="fa fa-folder fa-lg"></i> 選考管理
          </a>
        </li>
        <li class="{{ Request::url() == route('message.index') ? 'active' : '' }}">
          <a href="{{route('message.index')}}">
            <i class="fa fa-commenting-o fa-lg"></i> メッセージ
          </a>
        </li>
        {{-- <li>
          <a href="/analysis">
            <i class="fa fa-bar-chart fa-lg"></i> 分析
          </a>
        </li> --}}
        <li class="h-mobile h-tablet">
          <a href="#">
            <i class="fa fa-tachometer fa-lg"></i> Setting
          </a>
        </li>
        <li class="h-mobile h-tablet">
          <a href="#">
            <i class="fa fa-tachometer fa-lg"></i> Sign Out
          </a>
        </li>
      </ul><br>
      <div class="site-info">
        <div class="d-none d-lg-block d-md-block d-sm-none site-info-contact">
          <div class="site-info-item">
            <span class="site-info-con-title space-pd-btm-sm">訪看ジョブ<br>カスタマーサポート</span>
          </div><!-- .site-info-item -->
          <div class="site-info-item space-pd-top-sm">
            9:00〜18:00 (土日祝日除く)
          </div><!-- .site-info-item -->
          <div class="site-info-item clearfix">
            <div class="site-info-mail">
              <div class="site-info-icon">
                <i class="fa fa-envelope card-fa-sm" aria-hidden="true"></i>
              </div>
              <div class="card-icon-txt card-small-short">
                <a href="mailto:info@houkanjob.com">info@houkanjob.com</a>
              </div>
            </div>
          </div><!-- .site-info-item -->
          <div class="site-info-item space-pd-top-sm">
            <a href="{{route('faq')}}" class="card-link card-medium-short" title="">よくあるご質問はこちら</a>
          </div><!-- .site-info-item -->
        </div><!-- .site-info-contact -->
        <div class="d-none d-lg-block d-md-block d-sm-none site-info-rule">
          <div class="space-pd-top-md">
            <a class="card-link site-info-rule-link" href="{{route('rule')}}">訪看ジョブ利用規約</a>
            <small class="site-info-copyright">(C)2018 HOUKANJOB.COM</small>
          </div>
        </div><!-- .site-info-rule -->
      </div><!-- .site-info -->
    </div><!-- .menu-list -->
  </div><!-- .nav-side-menu -->