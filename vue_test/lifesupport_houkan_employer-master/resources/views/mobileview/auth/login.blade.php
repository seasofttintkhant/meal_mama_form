<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/style.css') }}">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<nav>
	<div class="mobile-header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="m-pd-top-bm-md">
						<a href="index_mobile.php" title=""><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
					</div>
					
				</div>
			</div>
			</div>
		</div><!-- .mobile-header -->
		
</nav>	
<div class="o-m-page">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="c-m-box--bg-white">
                    <div class="m-pd-top-md ds-o-flex__item"><h1 class="c-m-heading">採用管理画面ログイン</h1></div>
                    <ul class="c-m-bordered-list">
                        <li class="c-m-bordered-list__item">
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-field m-pd-top-md">
                                    <div class="ds-o-flex__item"><label><h1 class="c-m-heading c-m-heading--l">メールアドレス</h1></label></div>
                                    <div class="ds-o-flex__item">
                                        <input type="email" name="email" class="m-text-field" placeholder="example@houkanjob.com" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-field m-pd-top-md">
                                    <div class="ds-o-flex__item"><label><h1 class="c-m-heading c-m-heading--l">パスワード</h1></label></div>
                                    <div class="ds-o-flex__item">
                                        <input type="password" name="password" class="m-text-field">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="m-pd-top-md form-reset-guide m-pd-top-sm clearfix">
                                    <a class="form-reset-link m-fs-sm" href="{{route('resetpassword.index')}}">パスワードを設定していない、またはお忘れの方はこちら</a>
                                </div>
                                <div class="m-pd-top-bm-md">
                                    <button type="submit" class="c-m-button c-m-button--primary">ログイン</button>
                                </div>
                                <div class="ds-o-flex__item"><span class="c-m-text c-m-text--s-medium">メールアドレスをお忘れの場合やログインができない場合は、</span><br><a href="mailto:support@houkanjob.com" class="c-m-text-link c-m-text-link--small">support@houkanjob.com</a><span class="c-m-text c-m-text--s-medium"> または </span><a href="#" class="c-m-text-link c-m-text-link--small">045-834-7663</a><br><span class="c-m-text c-m-text--s-medium">※9:00-18:00（土日祝除く）</span><br><span class="c-m-text c-m-text--s-medium">までお問い合わせください。</span></div>
                            </form>
                            <div class="m-space-sm">
                                
                            </div>
                        </li>
                        <li class="c-m-bordered-list__item m-pd-top-md">
                            <div class="">
                                <div class="ds-o-flex__item"><h1 class="m-fw-bold m-fs-sm">まだご利用を開始されていない医院・事業所様はこちら</h1></div>
                                <div class="m-pd-top-sm">
                                    <a href="/register" class="c-m-button c-m-button--blue">求人掲載のお申し込み</a>
                                </div>
                            </div>
                            <div class="m-pd-top-md">
                                <div class="ds-o-flex__item"><h1 class="m-fw-bold m-fs-sm">お仕事をお探しの方はこちら</h1></div>
                                <div class="m-pd-top-sm">
                                    <a href="http://houkanemployee.ssdn.asia/members/login" class="c-m-button c-m-button--blue">求職者ログイン</a>
                                </div>
                            </div>
                            <div class="m-space-sm"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="o-m-page__foot">
	<footer class="c-m-footer">
		<div class="c-m-footer__copy-right">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="c-m-text text-center c-m-text--white c-m-text--helvetica c-m-text--s-short">©2009 MEDLEY,INC.</p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</body>
</html>