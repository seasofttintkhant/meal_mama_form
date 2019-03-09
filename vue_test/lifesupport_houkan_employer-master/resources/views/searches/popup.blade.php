<div class="modal fade" id="scoutModal" tabindex="-1" role="dialog" aria-labelledby="scoutModalLabel" aria-hidden="true">
    <div id="" class="modal-dialog modal-lg modal-xl clearfix">
       	<div class="modal-content clearfix">
			   <div class="modal-header">
					<h2 class="card-heading-medium card-fw-bold space-pd-top-sm">スカウト</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
			   
        	<div class="popup-body space-pd-20">
            	<div class="popup-content">
                	<div class="popup-title card-medium-short">
                		STEP1〜3の必須項目を入力のうえ、ページ下部の「この内容でスカウトを送る」をクリックしてください。
                	</div>
                	<div class="card-display-tbl space-pd-top-sm">
                		<div class="card-display-cell card-va-top">
                			<div class="card-wd-80">
                				<ol class="card-step card-step-simple">
                					<li class="card-step-item">
                						<div class="card-step-label">
                							<div class="card-label-box card-label-box-bg">
                								<div class='card-label-box-inner'>
                									<span class="card-step-label-step">
                										STEP
                									</span>
                									<span class="card-step-label-index">
                										1
                									</span>
                								</div>
                							</div>
                						</div>
                					</li>
                					<li class="card-step-item">
                						<div class="card-step-label">
                							<div class="card-label-box card-label-box-bg">
                								<div class='card-label-box-inner'>
                									<span class="card-step-label-step">
                										STEP
                									</span>
                									<span class="card-step-label-index">
                										2
                									</span>
                								</div>
                							</div>
                						</div>
                					</li>
                					<li class="card-step-item space-mt-top-150">
                						<div class="card-step-label">
                							<div class="card-label-box card-label-box-bg">
                								<div class='card-label-box-inner'>
                									<span class="card-step-label-step">
                										STEP
                									</span>
                									<span class="card-step-label-index">
                										3
                									</span>
                								</div>
                							</div>
                						</div>
                					</li>
                				</ol>
                			</div>
                		</div><!-- .card-display-cell -->
                		<div class="card-display-cell">
                			<ul class="definition-table">
							<li class="definition-table-item card-bdr-top2">
								<dl class="dl-definition-table">
									<dt class="definition-table-head">
					                  <span class="definition-head-item">
					                    <span class="definition-label-red">必須
					                    </span>
					                  </span>
					                  <span class="definition-head-item definition-head-item-left">スカウト対象求人
					                  </span>
					                </dt>
				                <dd class="definition-table-body">
									<label class="card-selectbox">
										<select v-model="job_id" id="job_id" class="card-selectbox-select" @change="showMessageOptions">
											<option value="">未選択</option>
											<option  v-for="job_option in job_options" :value="job_option.id">@{{job_option.name}}</option>
										</select>
										<span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
										</span>
									</label>
				                </dd>
								</dl>	
				        	</li>
				        	<li class="definition-table-item card-input-br-btm">
				              <dl class="dl-definition-table">
				                <dt class="definition-table-head">
				                  <span class="definition-head-item">
				                    <span class="definition-label-red">必須
				                    </span>
				                  </span>
				                  <span class="definition-head-item definition-head-item-left">勤務形態
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
									<label class="card-selectbox" v-if="show_message_options">
										<select id="employment_type" class="card-selectbox-select">
											<option value="1" v-for="scout_employment_type in scout_employment_types" :value="scout_employment_type.id">@{{scout_employment_type.name}}</option>
										</select>
										<span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
										</span>
									</label>
				                </dd>
				              </dl>
				            </li>
                			</ul>
                			<div class="space-pd-top-sm">
			                <ul class="definition-table">
								<li class="definition-table-item card-bdr-top2" v-if="!mulitple_scout">
									<dl class="dl-definition-table">
										<dt class="definition-table-head">
					                  
					                  <span class="definition-head-item ">送信先
					                  </span>
					                </dt>
					                <dd class="definition-table-body">
					                  <a href="#" title="" data-toggle="modal" data-target="#profileModal" @click="getProfile(jobseeker.id,false)">
					                  	<span>千葉県野田市／</span>
					                  	<span>千葉県野田市／</span><span>45歳／</span>
					                  	<span>男性／</span><span>00335786／</span>
					                  	<span>生活支援員</span>
					                  </a>
					                </dd>
								</dl>	
							</li>
				        	<li class="definition-table-item card-bdr-top2 ">
				              <dl class="dl-definition-table">
				                <dt class="definition-table-head">
				                  <span class="definition-head-item">メッセージテンプレート
				                  </span>
				                  <span class="definition-head-item space-pl-5">
				                  	<i class="fa fa-question-circle-o" aria-hidden="true"></i>
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
				                	<label class="card-selectbox" v-if="show_message_options">
		                              <select class="card-selectbox-select" @change="getMessageTemplate">
										<option value="">未選択</option>
		                                <option v-for="message_template in message_templates" :value="message_template.id">@{{message_template.title}}</option>
		                              </select>
		                              <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
		                              </span>
		                            </label>
				                </dd>
				              </dl>
				            </li>
				            <li class="definition-table-item card-bdr-top2 card-input-br-btm">
				              <dl class="dl-definition-table">
				                <dt class="definition-table-head">
				                  <span class="definition-head-item">
				                    <span class="definition-label-red">必須
				                    </span>
				                  </span>
				                  <span class="definition-head-item definition-head-item-left">本文
				                  </span>
				                  <div class="definition-txt-alert card-fw-normal">
				                  	以前のSTEPを実行すると現在のSTEPの設定はリセットされます
				                  </div>
				                </dt>
				                <dd class="definition-table-body">
				                	<textarea @keyup="checkMessageBody" placeholder="はじめまして。
プロフィールを拝見してぜひ見学を兼ねて面接にお越しいただきたくスカウトを送らせていただきました。  
【募集内容】 
募集職種：看護師/准看護師" class="card-textarea car-mx-wd-auto space-mt-10 fluid-textarea" v-if="show_message_options" v-model="message_content"></textarea>
				                </dd>
				              </dl>
				            </li>
                			</ul>				
                			</div>
                		</div><!-- .card-display-cell -->	
                	</div>
                	<button type="button" class="card-btn space-mt-auto" :disabled="!enable_message_send" @click.prevent="sendScout">この内容でスカウトを送る</button>
					<div class="space"></div>
            	</div><!-- .popup-content -->
        	</div><!-- .popup-body -->
        </div>
            
    </div>
</div><!-- .popup -->
<!--For -Profile-Popup-->
 
<div class="popup" v-if="showDetailsModal">
   	<div id="" class="popup-inner e-popup-inner card-wd-1000 space-mt-auto clearfix">
   		<div class="clearfix">
   			<div class="popup-header"></div>
   				<h2 class="card-heading-medium card-fw-bold space-pd-top-sm">検索条件</h2>
   				<span @click.prevent="closePopup" class="popup-close-btn"><i class="fa fa-times fa-2x" aria-hidden="true"></i>
        	</span>
   			</div><!-- .poup-header -->
        	<div class="popup-body space-pd-20">
                	<div class="popup-content popup-height">
	                	<div class="card-display-cell">
	                <ul class="definition-table">
						<li class="definition-table-item">
			              <dl class="dl-definition-table">
			                <dt class="definition-table-head">
			                  <span class="definition-head-item definition-head-item-left">希望職種/経験年数
			                  </span>
			                </dt>
			                <dd class="definition-table-body">
			                 <div>
			                 	 <div class="definition-input-left select-input-md">
			                  <div class="card-option">
			                  <label class="card-selectbox">
			                  <select name="job_category_id" id="job_category_id" class="card-selectbox-select">
			                    	<option value="">職種</option>
			                    	<optgroup label="医科">
			                    		<option value="1">医師</option>
			                    		<option value="7">薬剤師</option>
				                    	<option value="3">看護師/准看護師</option>
				                    	<option value="5">助産師</option>
				                    	<option value="6">保健師</option>
				                    	<option value="26">看護助手</option>
				                    	<option value="13">診療放射線技師</option><option value="8">臨床検査技師</option>
				                    	<option value="24">臨床工学技士</option>
				                    	<option value="28">管理栄養士/栄養士</option>
				                    	<option value="14">公認心理師/臨床心理士</option>
				                    	<option value="31">医療ソーシャルワーカー</option><option value="35">登録販売者</option>
				                    	<option value="4">医療事務/受付</option>
				                    	<option value="50">治験コーディネーター</option>
				                    	<option value="51">臨床開発モニター</option>
				                    	<option value="52">MR</option>
				                    	<option value="53">MS（医薬品卸）</option>
				                    </optgroup>
			                    	<optgroup label="歯科">
			                    		<option value="30">歯科医師</option>
			                    		<option value="10">歯科衛生士</option>
			                    		<option value="11">歯科技工士</option>
			                    		<option value="9">歯科助手</option>
			                    		<option value="4">医療事務/受付</option>
			                    	</optgroup>
			                    	<optgroup label="介護">
			                    		<option value="18">介護職/ヘルパー</option>
			                    		<option value="20">生活相談員</option>
			                    		<option value="22">ケアマネジャー</option>
			                    		<option value="41">管理職（介護）</option>
			                    		<option value="21">サービス提供責任者</option><option value="54">生活支援員</option>
			                    		<option value="49">福祉用具専門相談員</option>
			                    		<option value="44">児童発達支援管理責任者</option>
			                    		<option value="55">サービス管理責任者</option><option value="56">児童指導員</option>
			                    		<option value="3">看護師/准看護師</option>
			                    		<option value="28">管理栄養士/栄養士</option><option value="45">調理師/調理スタッフ</option><option value="48">介護タクシー/ドライバー</option>
			                    		<option value="4">医療事務/受付</option>
			                    	</optgroup>
			                    	<optgroup label="保育">
			                    		<option value="43">保育士</option>
			                    		<option value="46">幼稚園教諭</option>
			                    		<option value="47">保育補助</option>
			                    		<option value="56">児童指導員</option>
			                    		<option value="44">児童発達支援管理責任者</option>
			                    		<option value="3">看護師/准看護師</option>
			                    		<option value="28">管理栄養士/栄養士</option>
			                    		<option value="45">調理師/調理スタッフ</option>
			                    	</optgroup>
			                    	<optgroup label="リハビリ／代替医療">
			                    		<option value="16">理学療法士</option>
			                    		<option value="25">言語聴覚士</option>
			                    		<option value="15">作業療法士</option>
			                    		<option value="27">視能訓練士</option>
			                    		<option value="32">柔道整復師</option>
			                    		<option value="34">あん摩マッサージ指圧師</option>
			                    		<option value="33">鍼灸師</option>
			                    		<option value="36">整体師/セラピスト</option>
			                    		<option value="4">医療事務/受付</option>
			                    	</optgroup>
			                  	</select>
			                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
			                  </span>
			                  </label>
			                </div>
			                </div>
			                <div class="definition-input-right select-input-sm">
			                  <div class="card-option">
			                  <label class="card-selectbox">
			                  <select name="career_year" id="career_year" class="card-selectbox-select">
			                    <option value="0">経験年数</option>
			                    <option value="1">未経験〜3年未満</option>
			                    <option value="2">3年以上</option>
			                    <option value="3">5年以上</option>
			                    <option value="4">10年以上</option>
			                  </select>
			                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
			                  </span>
			                  </label>
			                </div>
			                </div>
			                 </div>
			                 <div>
			                 	 <div class="definition-input-left select-input-md">
			                  <div class="card-option">
			                  <label class="card-selectbox">
			                  <select name="job_category_id" id="job_category_id" class="card-selectbox-select">
			                    	<option value="">職種</option>
			                    	<optgroup label="医科">
			                    		<option value="1">医師</option>
			                    		<option value="7">薬剤師</option>
				                    	<option value="3">看護師/准看護師</option>
				                    	<option value="5">助産師</option>
				                    	<option value="6">保健師</option>
				                    	<option value="26">看護助手</option>
				                    	<option value="13">診療放射線技師</option><option value="8">臨床検査技師</option>
				                    	<option value="24">臨床工学技士</option>
				                    	<option value="28">管理栄養士/栄養士</option>
				                    	<option value="14">公認心理師/臨床心理士</option>
				                    	<option value="31">医療ソーシャルワーカー</option><option value="35">登録販売者</option>
				                    	<option value="4">医療事務/受付</option>
				                    	<option value="50">治験コーディネーター</option>
				                    	<option value="51">臨床開発モニター</option>
				                    	<option value="52">MR</option>
				                    	<option value="53">MS（医薬品卸）</option>
				                    </optgroup>
			                    	<optgroup label="歯科">
			                    		<option value="30">歯科医師</option>
			                    		<option value="10">歯科衛生士</option>
			                    		<option value="11">歯科技工士</option>
			                    		<option value="9">歯科助手</option>
			                    		<option value="4">医療事務/受付</option>
			                    	</optgroup>
			                    	<optgroup label="介護">
			                    		<option value="18">介護職/ヘルパー</option>
			                    		<option value="20">生活相談員</option>
			                    		<option value="22">ケアマネジャー</option>
			                    		<option value="41">管理職（介護）</option>
			                    		<option value="21">サービス提供責任者</option><option value="54">生活支援員</option>
			                    		<option value="49">福祉用具専門相談員</option>
			                    		<option value="44">児童発達支援管理責任者</option>
			                    		<option value="55">サービス管理責任者</option><option value="56">児童指導員</option>
			                    		<option value="3">看護師/准看護師</option>
			                    		<option value="28">管理栄養士/栄養士</option><option value="45">調理師/調理スタッフ</option><option value="48">介護タクシー/ドライバー</option>
			                    		<option value="4">医療事務/受付</option>
			                    	</optgroup>
			                    	<optgroup label="保育">
			                    		<option value="43">保育士</option>
			                    		<option value="46">幼稚園教諭</option>
			                    		<option value="47">保育補助</option>
			                    		<option value="56">児童指導員</option>
			                    		<option value="44">児童発達支援管理責任者</option>
			                    		<option value="3">看護師/准看護師</option>
			                    		<option value="28">管理栄養士/栄養士</option>
			                    		<option value="45">調理師/調理スタッフ</option>
			                    	</optgroup>
			                    	<optgroup label="リハビリ／代替医療">
			                    		<option value="16">理学療法士</option>
			                    		<option value="25">言語聴覚士</option>
			                    		<option value="15">作業療法士</option>
			                    		<option value="27">視能訓練士</option>
			                    		<option value="32">柔道整復師</option>
			                    		<option value="34">あん摩マッサージ指圧師</option>
			                    		<option value="33">鍼灸師</option>
			                    		<option value="36">整体師/セラピスト</option>
			                    		<option value="4">医療事務/受付</option>
			                    	</optgroup>
			                  	</select>
			                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
			                  </span>
			                  </label>
			                </div>
			                </div>
			                <div class="definition-input-right select-input-sm">
			                  <div class="card-option">
			                  <label class="card-selectbox">
			                  <select name="career_year" id="career_year" class="card-selectbox-select">
			                    <option value="0">経験年数</option>
			                    <option value="1">未経験〜3年未満</option>
			                    <option value="2">3年以上</option>
			                    <option value="3">5年以上</option>
			                    <option value="4">10年以上</option>
			                  </select>
			                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
			                  </span>
			                  </label>
			                </div>
			                </div>
			                <div class="pull-right space-pd-top-sm">
			                	<span class="">
			                		<span class="card-font-red">
			                			<a href="#" class="card-font-red">− 削除</a>
			                		</span></span></div>
			                <span class="definition-txt-alert" >
		                       <a href="#" class="card-link">＋ 詳しい条件を指定</a>
		                    </span>
			                 </div>
			                </dd>
			              </dl>
			            </li>
			        	<li class="definition-table-item">
							<dl class="dl-definition-table">
								<dt class="definition-table-head">
				                  <span class="definition-head-item ">保有資格
				                  </span>
				                </dt>
			                <dd class="definition-table-body">
			                	<div class="space-pd-btm-sm">
				                    <div class="filter-grid">
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">医師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                <pre class="checkbox-text">	看護師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">保健師</pre></span>
				                              </label>
				                              
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">助産師</pre></span>
				                              </label>
				                              
				                              </div>
				                          </div>
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">准看護師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">理学療法士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">作業療法士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">視能訓練士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">言語聴覚士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">診療放射線技師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">臨床検査技師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">臨床工学技士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">薬剤師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">登録販売者</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">歯科医師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">歯科医師（院長/分院長経験あり</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text">
				                                	<pre class="checkbox-text">歯科衛生士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">歯科技工士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">介護支援専門員（ケアマネジャー）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">介護福祉士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">介護職員実務者研修（旧ヘルパー1級/基礎研修）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">介護職員初任者研修（旧ヘルパー2級）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">社会福祉士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">社会福祉主事任用資格</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">精神保健福祉士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">臨床心理士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">管理栄養士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">保育士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">柔道整復師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">鍼灸師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">あん摩マッサージ指圧師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">整体師/セラピスト</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">その他/無資格</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">幼稚園教諭</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">栄養士</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">調理師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">医療事務資格（民間）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">整体師資格（民間）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">カイロプラクター</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">リフレクソロジスト</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">アロマセラピスト</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">歯科助手資格（民間）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">主任介護支援専門員</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">児童発達支援管理責任者研修</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">調剤事務資格（民間）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">自動車運転免許</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">福祉用具専門相談員</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">治験コーディネーター</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">臨床開発モニター</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">MR</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">MS（医薬品卸）</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">MR認定資格</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">サービス管理責任者研修</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">児童指導員任用資格</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">小学校教諭</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">養護教諭</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">中学校教諭</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                        </div><!-- .row -->
				                        <div class="row">
				                          <div class="col">
				                              <div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">高等学校教諭</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          	<div class="grid-checkbox">
				                                <label class="grid-checkbox-label">
				                                <input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                                <span class="checkmark"></span>
				                                <span class="checkmark-text"><pre class="checkbox-text">公認心理師</pre></span>
				                              </label>
				                              </div>
				                          </div>
				                          <div class="col">
				                          </div>
				                        </div><!-- .row -->
				                      </div><!-- .filter-grid -->
				                  </div>
			                </dd>
							</dl>	
			        	</li>
			        	<li class="definition-table-item">
			              <dl class="dl-definition-table">
			                <dt class="definition-table-head">
			                  <span class="definition-head-item definition-head-item-left">希望職種/経験年数
			                  </span>
			                </dt>
			                <dd class="definition-table-body">
			                <div>
			                 	<div class="definition-input-left select-input-sm">
			                  	<div class="card-option">
				                  	<label class="card-selectbox">
				                  	<select name="prefecture_id" id="prefecture_id" class="card-selectbox-select">
				                    	<option value="">都道府県</option>
				                    	<option value="">都道府県</option><option value="1">北海道</option><option value="2">青森県</option><option value="3">岩手県</option><option value="4">宮城県</option><option value="5">秋田県</option><option value="6">山形県</option><option value="7">福島県</option><option value="8">茨城県</option><option value="9">栃木県</option><option value="10">群馬県</option>
				                    	<option value="11">埼玉県</option>
				                    	<option value="12">千葉県</option>
				                    	<option value="13">東京都</option>
				                    	<option value="14">神奈川県</option>
				                    	<option value="15">新潟県</option>
				                    	<option value="16">富山県</option>
				                    	<option value="17">石川県</option>
				                    	<option value="18">福井県</option>
				                    	<option value="19">山梨県</option><option value="20">長野県</option><option value="21">岐阜県</option><option value="22">静岡県</option><option value="23">愛知県</option><option value="24">三重県</option><option value="25">滋賀県</option><option value="26">京都府</option><option value="27">大阪府</option><option value="28">兵庫県</option><option value="29">奈良県</option><option value="30">和歌山県</option>
				                    	<option value="31">鳥取県</option>
				                    	<option value="32">島根県</option>
				                    	<option value="33">岡山県</option>
				                    	<option value="34">広島県</option>
				                    	<option value="35">山口県</option><option value="36">徳島県</option><option value="37">香川県</option><option value="38">愛媛県</option><option value="39">高知県</option><option value="40">福岡県</option><option value="41">佐賀県</option><option value="42">長崎県</option><option value="43">熊本県</option><option value="44">大分県</option><option value="45">宮崎県</option><option value="46">鹿児島県</option>
				                    	<option value="47">沖縄県</option>
				                    	
				                  	</select>
			                  		<span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
			                  		</span>
			                  	</label>
			                	</div>
			                	</div>
			                	<div class="definition-input-right space-pd-top-sm">
			                		<span class=""><a href="#" class="card-link">市区町村を指定</a></span>
			                	</div>
			                 </div>
			                 <div>
			                 	<div class="definition-input-left select-input-sm">
			                  	<div class="card-option">
				                  	<label class="card-selectbox">
				                  	<select name="prefecture_id" id="prefecture_id" class="card-selectbox-select">
				                    	<option value="">都道府県</option>
				                    	<option value="">都道府県</option><option value="1">北海道</option><option value="2">青森県</option><option value="3">岩手県</option><option value="4">宮城県</option><option value="5">秋田県</option><option value="6">山形県</option><option value="7">福島県</option><option value="8">茨城県</option><option value="9">栃木県</option><option value="10">群馬県</option>
				                    	<option value="11">埼玉県</option>
				                    	<option value="12">千葉県</option>
				                    	<option value="13">東京都</option>
				                    	<option value="14">神奈川県</option>
				                    	<option value="15">新潟県</option>
				                    	<option value="16">富山県</option>
				                    	<option value="17">石川県</option>
				                    	<option value="18">福井県</option>
				                    	<option value="19">山梨県</option><option value="20">長野県</option><option value="21">岐阜県</option><option value="22">静岡県</option><option value="23">愛知県</option><option value="24">三重県</option><option value="25">滋賀県</option><option value="26">京都府</option><option value="27">大阪府</option><option value="28">兵庫県</option><option value="29">奈良県</option><option value="30">和歌山県</option>
				                    	<option value="31">鳥取県</option>
				                    	<option value="32">島根県</option>
				                    	<option value="33">岡山県</option>
				                    	<option value="34">広島県</option>
				                    	<option value="35">山口県</option><option value="36">徳島県</option><option value="37">香川県</option><option value="38">愛媛県</option><option value="39">高知県</option><option value="40">福岡県</option><option value="41">佐賀県</option><option value="42">長崎県</option><option value="43">熊本県</option><option value="44">大分県</option><option value="45">宮崎県</option><option value="46">鹿児島県</option>
				                    	<option value="47">沖縄県</option>
				                    	
				                  	</select>
			                  		<span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
			                  		</span>
			                  	</label>
			                	</div>
			                	</div>
			                	<div class="definition-input-right space-pd-top-sm">
			                		<span class=""><a href="#" class="card-link card-link-disabled">市区町村を指定</a></span>
			                	</div>
			                	<div class="pull-right space-pd-top-sm">
			                	<span class="">
			                		<span class="card-font-red">
			                			<a href="#" class="card-font-red">− 削除</a>
			                		</span></span></div>
			                 </div>
			                 <span class="definition-txt-alert"><a href="#" class="card-link">＋ 詳しい条件を指定</a></span>
			            </li>
			        	<li class="definition-table-item">
							<dl class="dl-definition-table">
								<dt class="definition-table-head">
				                  <span class="definition-head-item ">会員番号
				                  </span>
				                </dt>
			                <dd class="definition-table-body">
			                  <input name="member_id" type="text" value="" placeholder="会員番号で検索" class="definition-text-field definition-input-md">
			                </dd>
							</dl>	
			        	</li>
			        	<li class="definition-table-item">
							<dl class="dl-definition-table">
								<dt class="definition-table-head">
				                  <span class="definition-head-item ">希望勤務形態
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
				                  <div class="row">
				                  	<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">正職員</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">契約職員</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">パート・アルバイト</pre>
										        </span>
										    </label>
										</div>
									</div>
								</div><!-- .row -->	
				                </dd>
							</dl>
			        	</li>
			        	<li class="definition-table-item">
							<dl class="dl-definition-table">
								<dt class="definition-table-head">
				                  <span class="definition-head-item ">最終学歴
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
				                  <div class="row">
				                  	<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">高等学校</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">高等専門学校</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">短期大学</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">大学</pre>
										        </span>
										    </label>
										</div>
									</div>
								</div><!-- .row-->
								<div class="row">
				                  	<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">大学院(修士)</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">大学院(博士)</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">専門学校</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">その他</pre>
										        </span>
										    </label>
										</div>
									</div>
								</div><!-- .row -->	
				                </dd>
							</dl>
			        	</li>
			        	<li class="definition-table-item">
							<dl class="dl-definition-table">
								<dt class="definition-table-head">
				                  <span class="definition-head-item ">就業状況
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
				                  <div class="row">
				                  	<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">就業中</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">離職中</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">在学中</pre>
										        </span>
										    </label>
										</div>
									</div>
								</div><!-- .row -->	
				                </dd>
							</dl>
			        	</li>
			        	<li class="definition-table-item">
				            <dl class="dl-definition-table">
				                <dt class="definition-table-head">
				                  <span class="definition-head-item definition-head-item-left">設立年月
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
				                  <div>
				                  	<span>
				                  	<div class="definition-input-left select-input-sm">
				                  <div class="card-option">
				                  <label class="card-selectbox">
				                  <select name="from" id="from" class="card-selectbox-select">
				                    <option value="0">指定なし</option>
				                    <option value="16">16</option>
				                    <option value="17">17</option>
				                    <option value="18">18</option>
				                    <option value="19">19</option>
				                    <option value="20">20</option>
				                    <option value="21">21</option>
				                    <option value="22">22</option>
				                    <option value="23">23</option>
				                    <option value="24">24</option>
				                    <option value="25">25</option>
				                    <option value="26">26</option>
				                    <option value="27">27</option>
				                    <option value="28">28</option>
				                    <option value="29">29</option>
				                    <option value="30">30</option>
				                    <option value="31">31</option>
				                    <option value="32">32</option>
				                    <option value="33">33</option>
				                    <option value="34">34</option>
				                    <option value="35">35</option>
				                    <option value="36">36</option>
				                    <option value="37">37</option>
				                    <option value="38">38</option>
				                    <option value="39">39</option>
				                    <option value="40">40</option>
				                    <option value="41">41</option>
				                    <option value="42">42</option>
				                    <option value="43">43</option>
				                    <option value="44">44</option>
				                    <option value="45">45</option>
				                    <option value="46">46</option>
				                    <option value="47">47</option>
				                    <option value="48">48</option>
				                    <option value="49">49</option>
				                    <option value="50">50</option>
				                    <option value="51">51</option>
				                    <option value="52">52</option>
				                    <option value="53">53</option>
				                    <option value="54">54</option>
				                    <option value="55">55</option>
				                    <option value="56">56</option>
				                    <option value="57">57</option>
				                    <option value="58">58</option>
				                    <option value="59">59</option>
				                    <option value="60">60</option>
				                    <option value="61">61</option>
				                    <option value="62">62</option>
				                    <option value="63">63</option>
				                    <option value="64">64</option>
				                    <option value="65">65</option>
				                    <option value="66">66</option>
				                    <option value="67">67</option>
				                    <option value="68">68</option>
				                    <option value="69">69</option>
				                  </select>
				                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
				                  </span>
				                  </label>
				                </div>
				                </div>
				            </span>
				            <span class="card-inline-item card-wd-80 text-center space-pd-top-sm">~</span>
				            <span>
				            	<div class="definition-input-right select-input-sm">
				                  <div class="card-option">
				                  <label class="card-selectbox">
				                  <select name="to" id="to" class="card-selectbox-select">
				                    <option value="0">指定なし</option>
				                    <option value="16">16</option>
				                    <option value="17">17</option>
				                    <option value="18">18</option>
				                    <option value="19">19</option>
				                    <option value="20">20</option>
				                    <option value="21">21</option>
				                    <option value="22">22</option>
				                    <option value="23">23</option>
				                    <option value="24">24</option>
				                    <option value="25">25</option>
				                    <option value="26">26</option>
				                    <option value="27">27</option>
				                    <option value="28">28</option>
				                    <option value="29">29</option>
				                    <option value="30">30</option>
				                    <option value="31">31</option>
				                    <option value="32">32</option>
				                    <option value="33">33</option>
				                    <option value="34">34</option>
				                    <option value="35">35</option>
				                    <option value="36">36</option>
				                    <option value="37">37</option>
				                    <option value="38">38</option>
				                    <option value="39">39</option>
				                    <option value="40">40</option>
				                    <option value="41">41</option>
				                    <option value="42">42</option>
				                    <option value="43">43</option>
				                    <option value="44">44</option>
				                    <option value="45">45</option>
				                    <option value="46">46</option>
				                    <option value="47">47</option>
				                    <option value="48">48</option>
				                    <option value="49">49</option>
				                    <option value="50">50</option>
				                    <option value="51">51</option>
				                    <option value="52">52</option>
				                    <option value="53">53</option>
				                    <option value="54">54</option>
				                    <option value="55">55</option>
				                    <option value="56">56</option>
				                    <option value="57">57</option>
				                    <option value="58">58</option>
				                    <option value="59">59</option>
				                    <option value="60">60</option>
				                    <option value="61">61</option>
				                    <option value="62">62</option>
				                    <option value="63">63</option>
				                    <option value="64">64</option>
				                    <option value="65">65</option>
				                    <option value="66">66</option>
				                    <option value="67">67</option>
				                    <option value="68">68</option>
				                    <option value="69">69</option>
				                  </select>
				                  <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
				                  </span>
				                  </label>
				                </div>
					            </div>
					            </span>
				                </div>
				                 <div class="row">
				                  	<div class="col">
				                  		<div class="grid-checkbox">
				                  			<label class="grid-checkbox-label">
				                  				<input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                  				<span class="checkmark"></span>
				                  				<span class="checkmark-text">
				                  					<pre class="checkbox-text">女性</pre>
				                  				</span>
				                  			</label>
				                  		</div>
				                  	</div>
				                  	<div class="col">
				                  		<div class="grid-checkbox">
				                  			<label class="grid-checkbox-label">
				                  				<input type="checkbox" value="0" name="" class="grid-checkbox-input">
				                  				<span class="checkmark"></span>
				                  				<span class="checkmark-text">
				                  					<pre class="checkbox-text">男性</pre>
				                  				</span>
				                  			</label>
				                  		</div>
				                  	</div>
				                  	<div class="col">
				                  		
				                  	</div>
				                  </div><!-- .row -->
				                
				                </dd>
				              </dl>
				            </li>
				            <li class="definition-table-item ">
					        <dl class="dl-definition-table">
					            <dt class="definition-table-head">
					              <span class="definition-head-item definition-head-item-left">最終ログイン  
					              </span>
					            </dt>
					            <dd class="definition-table-body">
					              <span class="common-box-left">
					                <label class="common-radio">指定なし
					                  <input type="radio" checked="checked" name="radio">
					                  <span class="checkmark"></span>
					                </label>
					              </span>
					              <span class="common-box-center">
					                <label class="common-radio">3日以内
					                  <input type="radio" checked="checked" name="radio">
					                  <span class="checkmark"></span>
					                </label>
					              </span>
					              <span class="common-box-right">
					                <label class="common-radio">1ヶ月以内
					                  <input type="radio" checked="checked" name="radio">
					                  <span class="checkmark"></span>
					                </label>
					              </span>
					            </dd>
					      </dl>
					    </li>
					    <li class="definition-table-item">
							<dl class="dl-definition-table">
								<dt class="definition-table-head">
				                  <span class="definition-head-item ">希望条件
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">休日</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">4週8休以上</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">育児支援あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">年間休日120日以上</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">週休2日</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
										</div>
										<div class="col">
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">勤務時間</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">日勤のみ可</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">夜勤専従あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">2交替制</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">3交替制</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">午前のみ勤務</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">午後のみ勤務</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">業ほぼなし</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
										</div>
										<div class="col">
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">勤務時間</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">日勤のみ可</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">夜勤専従あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">2交替制</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">3交替制</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">午前のみ勤務</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">午後のみ勤務</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">残業ほぼなし</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
										</div>
										<div class="col">
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">応募要件</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">未経験可</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">ブランク可</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">准看護師可</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">年齢不問</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">新卒可</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">アクセス</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">駅近(5分以内)</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">車通勤可</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">仕事内容</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">外来</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">オペ室勤務</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">人工透析</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">終末期医療・ターミナルケア</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">健診・検診・人間ドック</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">新規オープン</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">集中治療室（ICU勤務）</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">内視鏡室</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">師長・管理職</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">機能訓練</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">救急外来</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">病棟</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">脳血管リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">難病リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">小児リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">運動器リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">がんリハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">精神科リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">呼吸器リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">心臓リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">スポーツリハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">給与・待遇・福利厚生</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">寮あり・社宅あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">託児所・保育支援あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">社会保険完備</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">賞与あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">交通費支給</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">扶養控除内考慮</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">退職金あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">復職支援</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">住宅手当</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">研修制度あり</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">年収500万円以上可能</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">年収600万円以上可能</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">年収400万円以上可能</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		
										</div>
										<div class="col">
											
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">サービス形態</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">所介護・デイサービス</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">訪問看護ステーション</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">慢性期・療養型病院</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">急性期病棟</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">回復期病棟</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">一般病院</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">診療所・クリニック</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">通所リハ・デイケア</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">グループホーム</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">特別養護老人ホーム</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">介護老人保健施設</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">介護付き有料老人ホーム</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">小規模多機能型居宅介護</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">ショートステイ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">障害者支援</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">住宅型有料老人ホーム</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">軽費老人ホーム（ケアハウス）</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">介護施設</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">保育所（保育園）</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">精神科病院</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">放課後等デイサービス</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">訪問リハビリ</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		
										</div>
										<div class="col">
											
										</div>
									</div><!-- .row -->
				                	</div>
				                	<div >
				                	<h3 class="card-medium-title-short card-fw-bold space-pd-top-sm">診療科目</h3>
				                	<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">一般内科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">消化器内科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">消化器内科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">呼吸器内科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">腎臓内科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">血液内科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">神経内科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">代謝・内分泌内科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">一般外科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">消化器外科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">心臓血管外科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">呼吸器外科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">脳神経外科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">整形外科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">形成外科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">精神科・心療内科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">眼科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">耳鼻咽喉科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">皮膚科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">泌尿器科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">放射線科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">美容外科・美容皮膚科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">小児科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">産婦人科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">麻酔科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">リウマチ科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">緩和ケア科</pre>
											        </span>
											    </label>
											</div>
										</div>
									</div><!-- .row -->
									<div class="row">
					                  	<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">総合診療科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
					                  		<div class="grid-checkbox">
											   <label class="grid-checkbox-label">
											        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
											        <span class="checkmark"></span>
											        <span class="checkmark-text"><pre class="checkbox-text">アレルギー科</pre>
											        </span>
											    </label>
											</div>
										</div>
										<div class="col">
											
										</div>
									</div><!-- .row -->
				                	</div>
				                </dd>
							</dl>
			        	</li>
			        	<li class="definition-table-item">
							<dl class="dl-definition-table">
								<dt class="definition-table-head">
				                  <span class="definition-head-item ">就業状況
				                  </span>
				                </dt>
				                <dd class="definition-table-body">
				                  <div class="row">
				                  	<div class="col">
				                  		<div class="grid-checkbox">
										   <label class="grid-checkbox-label">
										        <input type="checkbox" value="0" name="" class="grid-checkbox-input">
										        <span class="checkmark"></span>
										        <span class="checkmark-text"><pre class="checkbox-text">あなたの求人に「気になる」をした求職者から探す</pre>
										        </span>
										    </label>
										</div>
									</div>
									<div class="col">
				                  		
									</div>
									<div class="col">
				                  		
									</div>
								</div><!-- .row -->	
				                </dd>
							</dl>
			        	</li>
			        	<li class="definition-table-item card-input-br-btm">
					        <dl class="dl-definition-table">
					            <dt class="definition-table-head">
					              <span class="definition-head-item definition-head-item-left">スカウト  
					              </span>
					            </dt>
					            <dd class="definition-table-body">
					              <div class="row">
					              	<div class="col">
					                <label class="common-radio">指定なし
					                  <input type="radio" checked="checked" name="radio">
					                  <span class="checkmark"></span>
					                </label>
					              </div>
					              <div class="col">
					                <label class="common-radio">未スカウトのみ
					                  <input type="radio" checked="checked" name="radio">
					                  <span class="checkmark"></span>
					                </label>
					              </div>
					              <div class="col">
					                <label class="common-radio">スカウト済みのみ
					                  <input type="radio" checked="checked" name="radio">
					                  <span class="checkmark"></span>
					                </label>
					              </div>
					              </div>
					            </dd>
					      </dl>
					    </li>
	                </ul>	
	            </div>
						<div class="space"></div>
                	</div><!-- .popup-content -->
            	</div><!-- .popup-body -->
        	<div class="popup-foot">
        		<div class="text-center">
        			<div class="space-pd-top-sm">
        				<button type="button" class="blue-btn card-fw-bold space-mt-auto">この内容でスカウトを送る</button>
        			</div>
        		</div>
        	</div><!-- .popup-foot -->
        </div>
        
    </div>
</div><!-- .popup -->