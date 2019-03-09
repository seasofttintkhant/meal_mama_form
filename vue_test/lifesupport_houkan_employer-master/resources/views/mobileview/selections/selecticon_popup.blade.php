<div class="modal fade" id="selecticon-popup" tabindex="-1" role="dialog" aria-labelledby="scoutModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="c-m-page-header__title">
                  <h1 class="c-m-heading m-fw-bold">スカウト<a href="" class="m-question" title=""></a> </h1>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
             <form action="" method="" accept-charset="utf-8">
               <div class="scout-block">
               <div class="">
                 <div class="ds-o-flex__item">
                  <h1 class="c-m-heading c-m-heading--l">求人を選択する<span class="m-pd-l c-m-text c-m-text--alert m-fw-bold">(必須)</span></h1>
                 </div>
                  <div class="ds-o-flex-item">
                    <a href="" class="c-m-button" data-toggle="modal" data-target="#fill-popup">求人を選択</a>
                    <div class="ds-o-flex-item m-pd-top text-center">
                      <a href="#" class="c-m-text-link">スカウト送信済み求人から選択</a>
                    </div>
                  </div>
               </div>
              <div class="m-space-md"></div>
              <div class="">
                <div class="ds-o-flex__item">
                  <h1 class="c-m-heading c-m-heading--l">勤務形態<span class="m-pd-l c-m-text c-m-text--alert m-fw-bold">(必須)</span></h1>
                </div>
                <div class="ds-o-flex-item">
                  <div class="card-option">
                    <label class="card-selectbox">
                      <select name="employment_type" id="employment_type" class="card-selectbox-select" v-bind:class="{'c-m-selectbox__select--disabled': !show_message_options}" :disabled="!show_message_options">
                          <option v-for="scout_employment_type in scout_employment_types" :value="scout_employment_type.id">Name</option>
                      </select>
                      <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="m-space-md"></div>
                <div class=""  v-if="!mulitple_scout">
                  <div class="ds-o-flex-item m-pd-top">
                    <h1 class="c-m-heading c-m-heading--l">送信先</h1>
                  </div>
                  <div class="ds-o-flex-item">
                    <a href="#" title="" data-toggle="modal" data-target="#profile-popup" @click="getProfile(jobseeker.id,true)" class="c-m-text-link m-fs-sm"><span>広島県広島市安佐北区／</span><span>33歳／</span><span>男性／</span><span>00238018／</span><span>柔道整復師</span></a>
                  </div>
                </div>
                <div class="m-space-md"></div>
                <div class="">
                  <div class="ds-o-flex-item">
                    <h1 class="c-m-heading c-m-heading--l">メッセージテンプレート<a href="" class="m-question" title=""><i class="fa fa-question-circle-o" aria-hidden="true"></i></a></h1>
                  </div>
                  <div class="ds-o-flex-item">
                    <div class="card-option">
                      <label class="card-selectbox">
                        <select name="customer_message_template" id="customer_message_template" class="card-selectbox-select" v-bind:class="{'c-m-selectbox__select--disabled': !show_message_options}" @change="getMessageTemplate" :disabled="!show_message_options">
                          	<option value="">未選択</option>
		                        <option v-for="message_template in message_templates" :value="message_template.id">Title</option>
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="m-space-md"></div>
                <div class="">
                  <div class="ds-o-flex-item">
                      <h1 class="c-m-heading c-m-heading--l">本文</h1>
                  </div>
                  <div class="ds-o-flex-item">
                    <textarea v-bind:class="{'c-m-textarea--disabled card-textarea': !show_message_options}" v-model="message_content" @keyup="checkMessageBody" placeholder="はじめまして。
                    プロフィールを拝見してぜひ見学を兼ねて面接にお越しいただきたくスカウトを送らせていただきました。  
                    【募集内容】 
                    募集職種：看護師/准看護師" class="car-mx-wd-auto space-mt-10 mw-100 card-textarea" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                  </div>
                  </div>
                  <div class="m-space-md"></div>
                  <div class="ds-o-flex-item">
                    <button type="button" class="c-m-button" v-bind:class="{'c-m-button--disabled': !enable_message_send}" @click.prevent="sendScout">スカウトを送る</button>
                  </div>

             </div><!-- .scout-block -->
             </form>
            </div>
        </div>
    </div>
</div>




