<div class="popup" v-bind:style="[showMessageModal ? displayBlock : '']">
        <div id="" class="popup-inner-auto clearfix">
            <div class="clearfix">
                <div class="card-msg-view">
                 <div class="card-msg-sticky">
                     <div class="card-msg-view-head">
                         <div class="card-inline-form space-pr-50 clearfix">
                         <span class="card-inline-item space-pd-sm">
                             <span><p class="card-medium-short card-fw-bold space-mt-btm-0">@{{message.facility_name}} 理学療法士 求人について</p></span>
                             <span>
                                 <div class="card-flex">
                                   <span class="card-medium-short card-fw-bold space-pr-sm">@{{message.employee_name}}</span>
                                   <span class="card-small-short card-fw-bold card-font-grey"> |  @{{message.employee_age}} 歳 @{{message.employee_gender == 1 ? '男性' : '女性' }}</span>
                                 </div>
                             </span>
                         </span>
                         {{-- <span class="card-inline-item pull-right">
                               <span>
                                 <a href="#" class="card-link carf-small-short" target="_blank">
                                   <div class="card-icon-txt-icon">
                                     <div class="card-icon-txt-inner">
                                         </div>
                                   </div>
                                   <div class="card-icon-txt">募集ページを確認する</div>
                                 </a>
                               </span>
                               <span>
                                 <a href="#" class="card-link carf-small-short" target="_blank">
                                   <div class="card-icon-txt-icon">
                                     <div class="card-icon-txt-inner">
                                         </div>
                                   </div>
                                   <div class="card-icon-txt">プロフィールを見る</div>
                                 </a>
                             </span>
                         </span> --}}
                         </div><!-- .card-inline-form -->
                         <span @click.prevent="closePopup" class="popup-close-btn"><i class="fa fa-times fa-2x" aria-hidden="true"></i>
                         </span>
                     </div><!-- .card-msg-view-head -->
                     <div class="popup-body popup-height">
                         <div class="card-msg-view-inner">
                            <div class="card-msg" v-for="message_thread in message_threads">
                            <div class="card-msg-box">
                              <div v-bind:class="[ message_thread.resource_type ==2 ? 'card-msg-body-inner' : 'card-msg-body-companion']">
                                  {{-- <span class="card-inline-tbl">
                                <span class="card-label label-rounded">スカウト
                                </span>
                                &nbsp;
                              </span>
                              <span>  --}}
                                <div class="card-msg-view-body">
                                  <span class="card-inline-tbl">
                                    <span class="card-label label-rounded">応募
                                    </span>
                                    &nbsp;
                                  </span>
                                  <span> 
                                    <span class="card-fw-normal" v-html="message_thread.content"></span>  
                              </div>
                              <div v-bind:class="{'card-msg-attach-companion': message_thread.resource_type ==2}">
                                <div class="card-inline-group">
                                  <div class="card-inline-item">
                                    <div class="card-icon-txt">
                                      <div class="c-icon-text__icon">
                                        <div class="card-icon-txt-inner">
                                        </div>
                                      </div>
                                      <div class="card-icon-txt">
                                        <span class="card-msg-date card-medium-short">@{{message_thread.sent_time}}</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div></div>
                          </div><!-- .card-msg -->
               
                         <form action="popup_submit" class="card-bdr-top" method="get" accept-charset="utf-8"  name="message_form">
                         <ul class="definition-table space-pd-top-sm">
                             <li class="definition-table-item card-bdr-none">
                               <dl class="dl-definition-table card-bdr-none">
                                 <dt class="definition-table-head card-small-short card-wd-125 card-msg-head-bg">
                                   <span class="definition-head-item definition-head-item-left">送信内容
                                   </span>
                                 </dt>
                                 <dd class="definition-table-body">
                                   {{-- <span class="common-box-left">
                                     <label class="common-radio">通常返信
                                       <input type="radio" checked="checked" name="radio">
                                       <span class="checkmark"></span>
                                     </label>
                                   </span>
                                   <span class="common-box-center">
                                     <label class="common-radio">内定通知
                                       <input type="radio" checked="checked" name="radio">
                                       <span class="checkmark"></span>
                                     </label>
                                   </span>
                                   <span class="common-box-right">
                                   <label class="common-radio">不採用通知
                                     <input type="radio" checked="checked" name="radio">
                                     <span class="checkmark"></span>
                                   </label>
                                 </span> --}}
                                 </dd>
                               </dl>
                             </li>
                             <li class="definition-table-item card-bdr-none">
                               <dl class="dl-definition-table card-bdr-none">
                                 <dt class="definition-table-head card-small-short card-wd-125 card-msg-head-bg">
                                   <div class="card-flex">
                                     <div class="card-flex-item">
                                      <span class="">メッセージ<br>テンプレート
                                      </span>
                                     </div>
                                     <div class="card-flex-item">
                                       <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                     </div>
                                   </div>
                                 </dt>
                                 <dd class="definition-table-body">
                                   <div class="card-option">
                                        <label class="card-selectbox">
                                            <select v-model="message_template" @change="getMessageTemplate" class="card-selectbox-select">
                                                <option value="">未選択</option>
                                                @foreach($message_templates as $message_template)
                                                <option value="{{$message_template->id}}">{{$message_template->title}}</option>
                                                @endforeach 
                                            </select>
                                            <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                                            </span>
                                        </label>
                                   </div>
                                 </dd>
                               </dl>
                             </li>
                             <li class="definition-table-item card-bdr-none">
                               <dl class="dl-definition-table">
                                 <dt class="definition-table-head card-small-short card-wd-125 card-msg-head-bg">
                                   <span class="definition-head-item definition-head-item-left">本文
                                   </span>
                                 </dt>
                                 <dd class="definition-table-body ">
                                   <div class="space-pd-btm-sm">
                                        <textarea v-model="content" class="card-textarea car-mx-wd-auto space-mt-10" placeholder="はじめまして。
プロフィールを拝見してぜひ見学を兼ねて面接にお越しいただきたくスカウトを送らせていただきました。  
【募集内容】 
募集職種：看護師/准看護師"></textarea>
                                   </div>
                                   <span class="definition-txt-alert" v-if="errors.content" :errors="errors">
                                    @{{ errors.content[0] }}
                                  </span>
                                 </dd>
                               </dl>
                             </li>
                           </ul>
                           <div class="card-msg-btn card-wd-230 space-mt-auto">
                                             <button type="submit" class="card-fw-bold tbl-btn-blue" @click="sendMessage">この内容でメッセージを送る</button>
                           </div>
                         </form>
                         <div class="space"></div>
                     </div><!-- .card-msg-view-inner -->
                     </div>
                     
                 </div><!-- .card-msg-sticky -->
                </div><!-- .card-msg-view -->
         </div>
     </div>
 </div><!-- .popup -->