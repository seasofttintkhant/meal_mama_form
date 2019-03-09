<div class="modal fade" id="profile-popup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="c-m-page-header__title">
                  <h1 class="c-m-heading m-fw-bold">プロフィール<a href="" class="m-question" title=""><i class="fa fa-question-circle-o" aria-hidden="true"></i></a> </h1>

                </div>
                <button type="button" class="close rm-cus-modal-open" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
              <nav class="">
                 <div class="card-switcher">
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="card-switcher-item nav-item active" id="p1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="true">プロフィール</a>
                      <a class="card-switcher-item nav-item" id="p2-tab" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2" aria-selected="false">職務経歴</a>
                   </div>
              </div>
            </nav>
            <div class="m-space-sm"></div>
            <div class="">

              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="profile1" role="tabpanel" aria-labelledby="p1-tab">    
                      <ul class="definition-table">
                        <h1 class="c-m-heading c-m-heading--l">基本プロフィール</h1>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">会員番号</div>
                             <div class="m-text-grey">@{{profile.id}}</div>
                           </dd>
                           <dd class="detail-table-body">
                             <div class="m-fw-bold">氏名（ふりがな）</div>
                             <div class="m-text-grey">@{{profile.full_name_kana}}</div>
                           </dd>
                          </dl>
                        </li>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">性別</div>
                             <div class="m-text-grey">@{{profile.gender}}</div>
                           </dd>
                           <dd class="detail-table-body">
                             <div class="m-fw-bold">年齢</div>
                             <div class="m-text-grey">@{{profile.age}}</div>
                           </dd>
                          </dl>
                        </li>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">住所</div>
                             <div class="m-text-grey">@{{profile.short_address}}</div>
                           </dd>
                         
                          </dl>
                        </li>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                              <dd class="detail-table-body">
                                <div class="m-fw-bold">電話番号</div>
                                <div class="m-text-grey">@{{profile.phone}}</div>
                              </dd>
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">現在年収</div>
                             <div class="m-text-grey">@{{profile.lastest_salary}}</div>
                           </dd>
                          </dl>
                        </li>
                          <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">最終学歴</div>
                             <div class="m-text-grey">@{{profile.graduation_description}}</div>
                           </dd>
                           <dd class="detail-table-body">
                              <div class="m-fw-bold">就業状況</div>
                              <div class="m-text-grey">@{{profile.employment_situation}}</div>
                            </dd>
                          </dl>
                          </li>
                        
                      </ul>

                      
                        <ul class="definition-table">
                          <h1 class="c-m-heading c-m-heading--l">希望条件</h1>
                          <li class="detail-table-item">
                            <dl class="dl-detail-table">
                              <dd class="detail-table-body">
                                <div class="m-fw-bold">会員番号</div>
                                <div class="m-text-grey">
                                  <span  v-for="(list, index) in profile.desired_occupations">
                                      <span>@{{list}}</span><span v-if="index+1 < profile.desired_occupations.length"></span>
                                  </span>
                              </div>
                              </dd>
                            </dl>
                          </li>
                          <li class="detail-table-item">
                            <dl class="dl-detail-table">
                              <dd class="detail-table-body">
                                <div class="m-fw-bold">会員番号</div>
                                <div class="m-text-grey">
                                  <span  v-for="(list, index) in profile.desired_workplaces">
                                      <span>@{{list}}</span><span v-if="index+1 < profile.desired_workplaces.length"></span>
                                  </span>
                              </div>
                              </dd>
                            </dl>
                          </li>
                          <li class="detail-table-item">
                              <dl class="dl-detail-table">
                                <dd class="detail-table-body">
                                 <div class="m-fw-bold">希望勤務形態</div>
                                 <span  v-for="(list, index) in profile.desired_employment_types">
                                    <span>@{{list}}</span><span v-if="index+1 < profile.desired_employment_types.length"></span>
                                </span>
                               </dd>
                               <dd class="detail-table-body">
                                  <div class="m-fw-bold">希望年収</div>
                                  <div class="m-text-grey">@{{profile.desired_salary}}</div>
                                </dd>
                              </dl>
                              </li>
                          <li class="detail-table-item">
                              <dl class="dl-detail-table">
                                <dd class="detail-table-body">
                                 <div class="m-fw-bold">こだわり条件</div>
                                 <span  v-for="(list, index) in profile.desired_features">
                                    <span>@{{list}}</span><span v-if="index+1 < profile.desired_features.length"></span>
                                </span>
                               </dd>
                              </dl>
                            </li>
                        </ul>

                        <h1 class="c-m-heading c-m-heading--l">希望条件</h1>
                        <ul class="definition-table">
                          <li class="detail-table-item">
                            <dl class="dl-detail-table">
                              <dd class="detail-table-body">
                                <div class="m-fw-bold">会員番号</div>
                                <div class="m-text-grey">
                                  <span  v-for="(list, index) in profile.desired_occupations">
                                      <span>@{{list}}</span><span v-if="index+1 < profile.desired_occupations.length"></span>
                                  </span>
                              </div>
                              </dd>
                            </dl>
                          </li>
                          <li class="detail-table-item">
                            <dl class="dl-detail-table">
                              <dd class="detail-table-body">
                                <div class="m-fw-bold">自己PR</div>
                                <div class="m-text-grey">@{{profile.self_introduction}}</div>
                              </dd>
                            </dl>
                          </li>
                        </ul>
                  </div>
                  <div class="tab-pane fade show" id="profile2" role="tabpanel" aria-labelledby="p2-tab">        
                      <ul class="definition-table" v-for="(career,key) in profile.career_history">
                        <h1 class="c-m-heading c-m-heading--l">職務経歴 @{{key + 1}} </h1>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">勤務先名</div>
                             <div class="m-text-grey">@{{career.office_name}}</div>
                           </dd>
                          </dl>
                        </li>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">事業内容</div>
                             <div class="m-text-grey">
                               @{{career.facility_category_name}}
                               <span  v-for="(list, index) in career.service_types" v-if="career.service_types.length > 1">
                                  (<span>@{{list}}</span><span v-if="index+1 < career.service_types.length">,</span>)
                              </span>
                            </div>
                           </dd>
                          </dl>
                        </li>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">勤務期間</div>
                             <div class="m-text-grey">@{{career.start_working_date}} ~ @{{career.end_working_date}}</div>
                           </dd>
                          </dl>
                        </li>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">勤務形態</div>
                             <div class="m-text-grey">@{{ career.current_employment_type}}</div>
                           </dd>
                          </dl>
                        </li>
                          <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">職種</div>
                             <div class="m-text-grey">@{{ career.job_category_name}}</div>
                           </dd>
                          </dl>
                        </li>
                        <li class="detail-table-item">
                          <dl class="dl-detail-table">
                            <dd class="detail-table-body">
                             <div class="m-fw-bold">役職</div>
                             <div class="m-text-grey">@{{ career.position}}</div>
                           </dd>
                          </dl>
                        </li>
                      </ul>
                    </div>
                  </div>
                
            </div>
               
            </div>
            <div class="modal-footer">
                <div class="col">
                  <a href="#" class="c-m-button c-m-button--primary popup-close-open" data-popup_close="profile-popup" data-popup_open="scout-popup" @click="scoutPopup(profile.id)">スカウト</a>
                </div>
            </div>
        </div>
    </div>
  </div>