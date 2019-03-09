

<!----For-Status-Pop---->
<div class="popup" v-bind:style="[showStatusModal ? displayBlock : '']">
   	<div id="" class="popup-inner e-popup-inner card-wd-1000 space-mt-auto clearfix">
   		<div class="clearfix">
   			<div class="popup-header">
   				<h2 class="card-heading-medium card-fw-bold space-pd-top-sm">入職状況の変更</h2>
   				<span @click.prevent="closePopup" class="popup-close-btn"><i class="fa fa-times fa-2x" aria-hidden="true"></i>
        	</span>
   			</div><!-- .poup-header -->
        	<div class="popup-body popup-height space-pd-20">
            	<div class="popup-content">
            		<ul class="definition-table">
										<li class="definition-table-item">
												<dl class="dl-definition-table">
													<dt class="definition-table-head">
																<span class="definition-head-item ">選考中</span>
																	</dt>
																	<dd class="definition-table-body">
																		<div class="row">
																		<div class="col">
																			<label class="common-radio">応募済
																					<input checked="checked" v-model="application_status" value="1" type="radio">
																					<span class="checkmark"></span>
																			</label>
																			<label class="common-radio">書類選考中
																					<input checked="checked" v-model="application_status" value="2" type="radio">
																					<span class="checkmark"></span>
																			</label>
																			<label class="common-radio">面接日設定済
																					<input checked="checked" v-model="application_status" value="3" type="radio">
																					<span class="checkmark"></span>
																			</label>
																			<label class="common-radio">面接実施中
																					<input checked="checked" v-model="application_status" value="4" type="radio">
																					<span class="checkmark"></span>
																			</label>
																			<label class="common-radio">内定済
																					<input checked="checked" v-model="application_status" value="5" type="radio">
																					<span class="checkmark"></span>
																			</label>
																			<label class="common-radio">内定承諾済
																					<input checked="checked" v-model="application_status" value="6" type="radio">
																					<span class="checkmark"></span>
																			</label>
																			<label class="common-radio">入職日決定済
																					<input checked="checked" v-model="application_status" value="7" type="radio">
																					<span class="checkmark"></span>
																			</label>
																			</div>
																	</div>
															</dd>
													</dl>
											</li>
											<li class="definition-table-item card-input-br-btm">
												<dl class="dl-definition-table">
													<dt class="definition-table-head">
																<span class="definition-head-item ">選考中
																</span>
															</dt>
															<dd class="definition-table-body">
														<div class="row">
															<div class="col">
																<label class="common-radio">入職済
																		<input checked="checked" v-model="application_status" value="8" type="radio">
																		<span class="checkmark"></span>
																</label>
																<label class="common-radio">不採用
																		<input checked="checked" v-model="application_status" value="9" type="radio">
																		<span class="checkmark"></span>
																</label>
																<label class="common-radio">内定辞退
																		<input checked="checked" v-model="application_status" value="10" type="radio">
																		<span class="checkmark"></span>
																</label>
																<label class="common-radio">選考終了・離脱
																		<input checked="checked" v-model="application_status" value="11" type="radio">
																		<span class="checkmark"></span>
																</label>
															</div>
													</div>
													</dd>
												</dl>
											</li>
                	</ul>
								<div class="space"></div>
								<button class="card-fw-bold tbl-btn-blue" @click.prevent="changeStatus()">Save</button>
            	</div><!-- .popup-content -->
        	</div><!-- .popup-body -->
        </div>
        
    </div>
</div><!-- .popup -->
