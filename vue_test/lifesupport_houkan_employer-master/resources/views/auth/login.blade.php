@extends('layouts.app')

@section('content')
<div class="space"></div>
	<div class="login-block">
		<main class="main-block">
			<div>
				<div class="main-form-w">
					<div class="main-content">
						<div class="main-content-inner">
							<div class="main-segment">
								<div class="main-content-detail">
									<div class="main-content-login">
										<div class="text-center"><h2 class="heading">採用管理画面ログイン</h2>
										</div><!-- .heading -->
										<form method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}
											<div class="form-body">
												<div class="form-field">
													<label class="form-field-label">メールアドレス</label>
													<div class="form-field-input">
														<input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-text-field {{ $errors->first('email') ? 'definition-txt-error' : ''}}" placeholder="example@houkanjob.com">
														<br>
		                                                @if ($errors->has('email'))
		                                                    <span class="definition-txt-alert">
		                                                        <strong>{{ $errors->first('email') }}</strong>
		                                                    </span>
		                                                @endif
                                                    </div>
												</div>
												<div class="form-field pw-field">
													<label class="form-field-label">パスワード</label>
													<div class="form-field-input">
														<input type="password" name="password" class="form-text-field {{ $errors->first('password') ? 'definition-txt-error' : ''}}">
														 <br>
		                                                @if ($errors->has('password'))
		                                                    <span class="definition-txt-alert">
		                                                        <strong>{{ $errors->first('password') }}</strong>
		                                                    </span>
		                                                @endif
                                                    </div>
												</div>
                                              
												<div class="form-reset-guide clearfix">
													<a class="form-reset-link pull-right" href="{{route('resetpassword.index')}}">パスワードを設定していない、またはお忘れの方はこちら</a>
												</div>
											</div>
											<div class="form-footer text-center">
												<button type="submit" class="login-btn">ログイン</button>
												<p class="">メールアドレスをお忘れの場合やログインができない場合は、<br> 
													<a href="mailto:support@houkanjob.com" class="c-link">support@houkanjob.com</a> または <span class=""><strong>045-834-7663</strong> <span class=""><strong>※9:00-18:00（土日祝除く）</strong></span></span><br>までお問い合わせください。<br>推奨のOSやブラウザの確認は 
													<a href="/browser" class="" target="_blank">こちら</a> から御覧ください。
												</p>
											</div>
										</form>	
									</div><!-- .main-content-login -->		
								</div>		
							</div>		
						</div><!-- .main-content-inne -->
						<div class="main-content-inner">
							<div class="main-segment">
								<div class="main-content-detail">
									<div class="main-content-login">
										<div class="text-center"><p class="heading-02">まだご利用を開始されていない医院・事業所様はこちら</p>
										<a class="btn e-btn-primary btn-lg active register-btn" href="/register">求人掲載のお申し込み</a>

										</div><!-- .text-center -->
										<div class="space"></div>
										<div class="text-center"><p class="heading-02">お仕事をお探しの方はこちら</p>
										<a class="btn e-btn-primary btn-lg active register-btn" href="http://houkanemployee.ssdn.asia/members/login">求職者ログイン</a>
										
										</div><!-- .heading -->
									</div><!-- .main-content-login -->		
								</div>		
							</div>		
						</div><!-- .main-content-inne -->	
					</div><!-- .main-content -->	
				</div>		
			</div>
		</main><!-- .main-block -->
	</div><!-- .login-block -->
@endsection
