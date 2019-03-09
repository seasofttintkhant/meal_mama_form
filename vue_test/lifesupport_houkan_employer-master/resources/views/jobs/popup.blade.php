<div class="modal fade" id="showUnitPricePopup" tabindex="-1" role="dialog" aria-labelledby="showUnitPricePopup" aria-hidden="true">
  <div class="modal-dialog image-modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showUnitPricePopup"><strong>採用単価</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearselected">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="definition-table">
          <li class="pd-style-1">採用単価とは、採用後に訪看ジョブよりご請求させていただく金額です。この情報は求職者へは開示されません。</li>
          <li class="definition-table-item">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">勤務形態
                </span>
              </dt>
              <dd class="definition-table-body card-fw-bold w-280">
                正職員/契約職員
              </dd>
              <dd class="definition-table-body card-fw-bold">
                パート・バイト
              </dd>
            </dl>
          </li>
          <li class="definition-table-item">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">@{{job_category_name}}
                </span>
              </dt>
              <dd class="definition-table-body card-fw-bold w-280">
                <label class="card-selectbox unitprice-selectbox">
                <select v-model="job_recruitment_fee_full_contract" class="card-selectbox-select">
                  <option :value="recruitment_fee" v-for="recruitment_fee in recruitment_fee_full_contract">@{{recruitment_fee}}</option>
                </select>
                <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                </span>
                </label>
                <span>円</span>
              </dd>
              <dd class="definition-table-body card-fw-bold">
                <label class="card-selectbox unitprice-selectbox">
                  <select v-model="job_recruitment_fee_part" class="card-selectbox-select">
                    <option :value="recruitment_fee" v-for="recruitment_fee in recruitment_fee_part">@{{recruitment_fee}}</option>
                  </select>
                <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                </span>
                </label>
                <span>円</span>
              </dd>
            </dl>
          </li>
          <li class="mt-50">
          	<p class="font-style-12 text-center">
          		採用単価を上げていただくと、検索結果ページで当該求人がほかの求人より<br>
							上位に表示されるようになり、<span class="bold-red">より多くの求職者の目に止まりやすくなります。</span>
						</p>
						<p class="font-style-13 text-center">
							また、採用に成功した際に求職者へジョブメドレーよりお贈りする「祝い金」も増額されるため、<br>
							<span class="bold-black">求職者にとって応募しやすくなります。</span>
						</p>
          </li>
        </ul>
      </div>
      <div class="modal-footer j-c-c">
        <button type="button" class="blue-btn card-fw-bold blue-btn-2" data-dismiss="modal">選択した写真を登録する</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog card-mx-900 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-fw-bold" id="image-gallery-title"></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body e-modal-body card-body-height">
                <div class="card-img-edit">
                <form action="">
                    <figure class='card-img-edit-figure'>
                    <div class="card-edit-fig-inner">
                    <div class="card-edit-image">
                        <div>
                            <img id="image-gallery-image" class="img-fluid" :src="image.path">
                        </div>
                    </div>
                    
                    </div>
                    
                </figure><!-- .card-img-edit-figure -->
                <div class="card-edit-summary">
                    <div class="card-small-short">
                    @{{image.dimension}}
                    </div>
                    <div class="space-pd-sm">
                    <textarea class="card-textarea-sm u-hg-min-76" placeholder="" maxlength="40" v-model="image.description" v-bind:class="{'definition-txt-error' : errors.description}" @keyup="wordCount"></textarea>
                    <span class="definition-txt-alert" v-if="errors.description" :errors="errors">
                        @{{ errors.description[0] }}
                    </span>
                    <div class="pull-right card-small-short">@{{word_count}} 文字 / 40文字 </div>
                    </div>
                    <div class="space-pd-top-sm card-small-short">※説明文はこの写真を使用しているほかの施設・求人にも反映されます</div>
                    <div class="space-pd-top-md">
                    <button type="button" class="blue-btn card-wd-100 card-fw-bold space-pd-sm" @click.prevent = "updateImage" data-dismiss="modal">写真に説明文を追加する</button>
                    </div>
                </div>
                </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                </button>
    
                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    </div>
