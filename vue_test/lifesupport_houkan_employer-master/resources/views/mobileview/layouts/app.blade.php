<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/style.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<nav>
		<div class="mobile-nav-container">
			<div class="m-nav-left col-5">
				<div class="m-nav-brand">
					<a href="{{route('home')}}" title="" class="color-is-white clearfix"><img src="mobile/img/head_icon.png" class="img-fluid " alt="Header Logo"> </a>
				</div>
			</div>
			<div class="m-nav-right">
				<div class="m-nav-item-container">
					<div class="m-nav-item">
						<a href="{{route('searches.index')}}" title="">
							<span class="color-is-white">
								<i class="fa fa-user-circle fa-2x"></i>
							</span>
						</a>
					</div>
					<div class="m-nav-item">
						<a href="{{route('message.index')}}" title="">
							<span class="color-is-white"> 
								<i class="far fa-comments fa-2x"></i>
							</span>
						</a>
					</div>
					<div class="m-nav-item">
						<span class="color-is-white" data-sidebar_open="#sidebar">
							<i class="fas fa-bars fa-2x"></i>
						</span>						
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="sidebar-scrollable" id="sidebar">
		<div class="sidebar">
			<div class="sidebar-title">
				<h3>株式会社ライフサポート</h3>
			</div>
			<div class="sidebar-body">
				<div class="sidebar-section">
					<ul class="sidebar-item-container b-b-1">
						<li><a href="{{route('searches.index')}}">求職者検索</a></li>
						<li><a href="{{route('selections.index')}}">選考管理</a></li>
						<li><a href="{{route('message.index')}}">メッセージ</a></li>
					</ul>
				</div>
				<div class="sidebar-section">
					<ul class="sidebar-item-container">
						<li><a href="{{route('announcement.index')}}">お知らせ</a></li>
						<li><a href="#">採用単価下限表</a></li>
						<li><a href="#">ご利用ガイド</a></li>
						<li><a href="{{route('logout')}}">ログアウト</a></li>
					</ul>
				</div>
			</div>
			<div class="sidebar-footer">
				<div class="sidebar-item-group-center">
					<a href="#" class="link-style-3">施設 求人情報・他の機能(PC版)</a>
					
				</div><br>
				<div class="col-6 m-auto">
					<a href="#" class="link-style-3">
						<img src="mobile/img/sidebar_icon.png" class="img-fluid " alt="Sidebar Logo">
					</a>
				</div>
			</div>
		</div>
		<div class="sidebar-close" data-sidebar_close="#sidebar"><i class="fas fa-times"></i></div>
	</div>

@yield('content')
<section class="o-m-page__foot">
	<footer class="c-m-footer">
		<div class="c-m-footer__item">
			<div class="container">
			<div class="row">
				<div class="col">
					<a href="" class="c-m-box-link" title="" id="back2Top">
						<div class="text-center">
							<i class="fas fa-arrow-up fa-2x"></i><br>
							<span class="c-m-text c-m-text--white c-m-text--bold c-m-text--s-short">ページ上に戻る</span>
						</div>
					</a>
					
				</div>
			</div>
		</div>
		</div>
		<div class="c-m-box c-m-box--horizontal-m">
			<nav class="c-m-footer__nav">
				<div class="c-m-footer__nav-item">
					<div class="c-m-footer__nav-item"><a href="{{route('searches.index')}}" class="c-m-text-link c-m-text-link--white c-m-text-link--small">求職者検索</a></div>
				</div>
				<div class="c-m-footer__nav-item">
					<div class="c-m-footer__nav-item"><a href="{{route('message.index')}}" class="c-m-text-link c-m-text-link--white c-m-text-link--small">メッセージ</a></div>
				</div>
				<div class="c-m-footer__nav-item">
					<div class="c-m-footer__nav-item"><a href="{{route('announcement.index')}}" class="c-m-text-link c-m-text-link--white c-m-text-link--small">お知らせ</a></div>
				</div>
				<div class="c-m-footer__nav-item">
					<div class="c-m-footer__nav-item"><a href="#" class="c-m-text-link c-m-text-link--white c-m-text-link--small">ご利用ガイド</a></div>
				</div>
			</nav>
		</div>
		<div class="c-m-footer__copy-right">
			<div class="container">
				<div class="row">
					<div class="col">
						<span class="c-m-text c-m-text--white c-m-text--helvetica c-m-text--s-short">&copy; {{ date('Y') }} HoukanJob.</span>
					</div>
					<div class="col">
						<a href="" class="pull-right c-m-text-link c-m-text-link--light-blue c-m-text-link--small">PC版を表示</a>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
<div class="cus-back-fade"></div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript">
	/*Scroll to top when arrow up clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/

</script>
<script type="text/javascript">
	$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
		
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
		
	}
});
</script>
<script type="text/javascript" charset="utf-8">

$(document).on("click","[data-sidebar_open]",function(event){
	event.preventDefault();
	$("body").addClass("popup-is-opening");
	$(".cus-back-fade").fadeIn(200);
	var sidebar = $(this).data("sidebar_open");
    $(sidebar).animate({
        width: '90%'
    },200,function(){
    	$(".sidebar-close").fadeIn(200);
    });
})

$(document).on("click","[data-sidebar_close]",function(event){
	event.preventDefault();
	$("body").removeClass("popup-is-opening");
	var sidebar = $(this).data("sidebar_close");
	$(this).fadeOut(200,function(){
		$(sidebar).animate({
			width: '0%'
		},200);
	});
	$(".cus-back-fade").fadeOut(200);
})

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
@stack('customjs')
</body>
</html>