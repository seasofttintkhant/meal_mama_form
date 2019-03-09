<div class="modal fade" id="message-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="c-m-page-header__title">
                  <h1 class="c-m-heading m-fw-bold">メッセージ<a href="" class="m-question" title=""><i class="fa fa-question-circle-o" aria-hidden="true"></i></a> </h1>

                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
             <div class="card-msg-view">
            <div class="card-msg-sticky">
              <div class="card-msg-view-head">
                <div class="card-inline-form clearfix">
                    <a class="c-m-text-link">@{{message.facility_name}}@{{message.job_category_name}}求人について</a>
                    <a class="c-m-text-link">@{{message.employee_age}} 歳 @{{message.employee_gender == 1 ? '男性' : '女性' }}</a>
                </div><!-- .card-inline-form -->
              </div><!-- .card-msg-view-head -->
              <div class="card-msg-view-inner">
                <div class="card-msg" v-for="message_thread in message_threads">
                  <div class="card-msg-box">
                    <div v-bind:class="[ message_thread.resource_type ==2 ? 'card-msg-body-inner' : 'card-msg-body-companion']">
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
                <div class="space"></div>
                <form method="get" class="card-bdr-top">
                  <ul class="definition-table space-pd-top-sm">
                    <li class="definition-table-item card-bdr-none">
                      <dl class="dl-definition-table card-bdr-none">
                        
                        <dd class="definition-table-body">
                          <h1 class="c-m-heading c-m-heading--l">送信内容</h1><br>
                          <div class="card-option">
                            <label class="card-selectbox">
                              <select  v-model="message_type" class="card-selectbox-select">
                                  <option value="">未選択</option>
                                  <option value="0">通常返信</option>
                                  <option value="1">通常返信</option>
                              </select>
                              <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                              </span>
                            </label>
                          </div>
                        </dd>
                      </dl>
                    </li>
                    <li class="definition-table-item card-bdr-none">
                      <dl class="dl-definition-table card-bdr-none">
                        
                        <dd class="definition-table-body">
                          <h1 class="c-m-heading c-m-heading--l">メッセージテンプレート</h1><br>
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
                        <dd class="definition-table-body ">
                          <div class="space-pd-btm-sm">
                            <textarea v-model="content" class="card-textarea car-mx-wd-auto space-mt-10" placeholder="はじめまして。
プロフィールを拝見してぜひ見学を兼ねて面接にお越しいただきたくスカウトを送らせていただきました。  
  【募集内容】 
募集職種：看護師/准看護師" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                          </div>
                          <span class="definition-txt-alert" v-if="errors.content" :errors="errors">
                            @{{ errors.content[0] }}
                          </span>
                        </dd>
                      </dl>
                    </li>
                  </ul>
                </form>
                </div><!-- .card-msg-view-inner -->
              </div><!-- .card-msg-body-inner -->
            </div><!-- .card-msg-view -->
            </div>
              <div class="modal-footer">
                <div class="col">
                  <button type="submit" class="c-m-button c-m-button--primary" @click="sendMessage">この内容でメッセージを送る</button>
                </div>
            </div> 
            </div>
            
        </div>
    </div>
</div>