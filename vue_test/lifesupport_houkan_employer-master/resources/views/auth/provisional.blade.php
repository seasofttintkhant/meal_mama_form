@extends('layouts.app')

@section('content')

<div class="space"></div>
<div class="register-block">
	<main class="main-block">
		<div>
			<div class="main-form-auto">
				<div class="main-content">
					<div class="main-content-inner">
						<div class="main-segment">
							<div class="main-content-detail">
								<div class="main-register-head"><p>求人掲載のお申し込み</p></div>
								<div class="space"></div>
								<div class="main-content-register">
									<div class="main-form-guide text-center">
										<div class="space"></div>
										<p class="card-fw-bold">訪看ジョブは採用するまで無料で利用できます！<br>掲載料0円、原稿作成料0円、応募課金0円、採用時の単価は25,000円~となります。<br>採用単価は経験年数や年収で左右されることはありません！</p>
										<p class="card-fw-bold">ご利用の流れは以下をご覧ください。</p>
									</div>
									<div class="space"></div>
									<div class="card-flowchart">
										<div class="card-flowchart-block clearfix">
											<div class="card-flowchart-content ">
												<div class="card-flowchart-head">1.</div>
												<div class="card-flowchart-detail e-detail-text">お申し込みフォームに<br>必要事項を記入</div>
											</div><!-- .card-flowchart-mai -->
											<div class="card-flowchart-arrow"></div>
										</div><!-- .card-flowchart-block -->

										<div class="card-flowchart-block card-flowchart-m  clearfix">
											<div class="card-flowchart-content card-flowchart-main">
												<div class="card-flowchart-head">2.</div>
												<div class="card-flowchart-detail e-detail-text">訪看ジョブ運営事務局による<br>お申し込み内容の確認・審査<br>(最短当日〜3営業日以内)</div>
											</div><!-- .card-flowchart-mai -->
											<div class="card-flowchart-arrow arrow-complete"></div>
										</div><!-- .card-flowchart-block -->

										<div class="card-flowchart-block card-flowchart-m clearfix">
											<div class="card-flowchart-content ">
												<div class="card-flowchart-head">3.</div>
												<div class="card-flowchart-detail e-detail-text">お申し込みフォームに<br>必要事項を記入</div>
											</div><!-- .card-flowchart-mai -->
											<div class="card-flowchart-arrow"></div>
										</div><!-- .card-flowchart-block -->
									</div><!-- .card-flowchart -->
									<div class="space"></div>
									<div class="confirm-page">
										<p class="confirm-txt">ご記入いただいたメールアドレス宛に「【訪看ジョブ】ご利用のお申し込みを承りました」という件名のメールをお送りしておりますのでご確認ください</p>
										<p class="confirm-txt">お申し込み内容の確認・審査が完了しましたら、訪看ジョブ運営事務局より審査結果をご連絡させていただきます。</p>
										<p class="confirm-txt">審査後にメールにて「採用管理画面」へのログイン情報をお送りいたします。採用管理画面へログインいただくと求人原稿の作成を開始できます。なお、メール送信後3日以上経ってもログインされていない場合はご記入いただいたお電話番号宛に弊社営業よりご連絡する場合がございます。</p>
										<p class="confirm-txt">数日たっても連絡がない場合は、下記または<a class="" href="/faq/#inquiry_form">お問い合わせページ</a>よりお問い合わせください。</p>
										{{-- <div class="row">
											<div class="col">
												<img class="img-fluid" src="/img/phone.png" alt="phone"><br>
												<span class="weekend-hour">9:00〜18:00 (土日祝日除く)</span>
											</div>
											<div class="col">
												<img class="img-fluid " src="/img/envolope.png" alt="envolope">
											</div>
										</div> --}}
									</div>
									<div class="space"></div>
									</div><!-- .main-content-register -->
							</div><!-- .main-content-detail -->
							</div><!-- .main-segment -->
					</div><!-- .main-content-inner -->
				</div><!-- .main-content -->
				</div><!-- .main-form-w -->
			</div>

		</main><!-- .register-main-block -->
 </div><!-- .register-block -->
@endsection