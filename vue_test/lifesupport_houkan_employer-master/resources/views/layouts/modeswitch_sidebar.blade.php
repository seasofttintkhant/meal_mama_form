<?php 
    $request_url = Request::url();
?>
<div class="body">
  <div class="nav-side-menu">
    <div class="menu-list">
      <ul id="menu-content" class="menu-content">
        <li class="{{ $request_url == route('home') ? 'active' : '' }}">
          <a href="{{ url('/')}}" class="">
            <i class="fa fa-home fa-lg" aria-hidden="true"></i> トップページ
          </a>
        </li>
          <span class="none-cursor card-fw-bold">
            <i class="" aria-hidden="true"></i>設定
          </span>
        <li class="">
          <a href="/mode_switch/edit" class="">
            <i class="" aria-hidden="true"></i> 契約情報
          </a>
        </li>
        <li class="{{ $request_url == route('email.edit') ? 'active' : '' }}">
          <a href="{{route('email.edit')}}">
            <i class="" aria-hidden="true"></i> メールアドレス
          </a>
        </li>
       {{-- <li class="{{ $request_url == route('mode_switch.notification_edit') ? 'active' : '' }}">
          <a href="{{route('mode_switch.notification_edit')}}">
            <i class=""></i> お知らせメール
          </a>
        </li>--}}
        <li class="{{ $request_url == route('edit.editpassword') ? 'active' : '' }}">
          <a href="{{route('edit.editpassword')}}">
            <i class=""></i> パスワード
          </a>
        </li>
        <li class="{{ $request_url == route('mode_switch.index') ? 'active' : '' }}">
          <a href="{{route('mode_switch.index')}}">
            <i class=""></i> 原稿作成モード
          </a>
        </li>
        <li class="{{ strpos($request_url,'message-templates') ? 'active' : '' }}">
          <a href="{{route('message-templates.index')}}">
            <i class=""></i> メッセージテンプレート
          </a>
        </li>
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
      </ul>
    </div><!-- .menu-list -->
  </div><!-- .nav-side-menu -->