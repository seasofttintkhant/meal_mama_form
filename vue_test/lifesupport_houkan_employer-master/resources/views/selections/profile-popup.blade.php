<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div id="" class="modal-dialog modal-lg clearfix">
            <div class="modal-content clearfix">
             <div class="modal-header">
                 <h2 class="card-heading-medium card-fw-bold space-pd-top-sm">プロフィール</h2>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <div class="modal-body popup-height space-pd-20">
                 <div class="popup-content">
                 <nav class="card-wd-360 space-mt-auto">
                     <div class="card-switcher">
                 <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                     <a class="card-switcher-item nav-item active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">プロフィール</a>
                     <a class="card-switcher-item nav-item" id="nav-career-tab" data-toggle="tab" href="#nav-career" role="tab" aria-controls="nav-career" aria-selected="false">職務経歴</a>
                 </div>
                 </div>
             </nav>
              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                 <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <div class="space"></div>
                     <div class="">
                        <ul class="definition-table">
                                <h3 class="card-medium-short card-fw-bold">基本プロフィール</h3>
                            <li class="definition-table-item">
                                <dl class="dl-definition-table">
                                        <dt class="definition-table-head card-wd-150">
                                            <span class="definition-head-item ">会員番号</span>
                                        </dt>
                                        <dd class="definition-table-body">@{{profile.id}}</dd>
                                        <dt class="definition-table-head card-wd-150">
                                            <span class="definition-head-item ">氏名(ふりがな)</span>
                                        </dt>
                                        <dd class="definition-table-body">
                                            @{{profile.full_name_kana}}
                                        </dd>
                                        </dl>
                                    </li>
                                    <li class="definition-table-item">
                                        <dl class="dl-definition-table">
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">性別
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                                @{{profile.gender}}
                                            </dd>
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">	年齢
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                                @{{profile.age}}
                                            </dd>
                                        </dl>
                                    </li>
                                <li class="definition-table-item">
                                        <dl class="dl-definition-table">
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">電話番号
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                                @{{profile.phone}}
                                            </dd>
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">	住所
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                                @{{profile.short_address}}
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="definition-table-item">
                                        <dl class="dl-definition-table">
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">現在年収
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                                @{{profile.lastest_salary}}
                                            </dd>
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">	最終学歴
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                                @{{profile.graduation_description}}
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="definition-table-item card-input-br-btm">
                                        <dl class="dl-definition-table">
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">就業状況
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                                @{{profile.employment_situation}}
                                            </dd>
                                            <dt class="definition-table-head card-wd-150">
                                                <span class="definition-head-item ">	保有資格
                                                </span>
                                            </dt>
                                            <dd class="definition-table-body">
                                            <ul class="list-label-gp-inner">
                                                <li class="list-label-gp-item" v-for="qualification in profile.qualification">
                                                    <span class="list-label list-label-circle">@{{profile.qualification}}</span>
                                                </li>
                                            </ul>
                                            </dd>
                                        </dl>
                                    </li>
                                </ul>
                    </div>
                        <div class="space"></div>
                        <div class="">
                         <h3 class="card-medium-short card-fw-bold">希望条件</h3>
                         <ul class="definition-table">
                                     <li class="definition-table-item">
                                        <dl class="dl-definition-table">
                                            <dt class="definition-table-head card-wd-150">
                                        <span class="definition-head-item ">希望職種</span>
                                     </dt>
                                     <dd class="definition-table-body">
                                         <ul class="list-label-gp-inner">
                                             <li class="list-label-gp-item" v-for="desired_occupation in profile.desired_occupations">
                                                 <span class="list-label list-label-circle">@{{desired_occupation}}</span>
                                             </li>
                                         </ul>
                                     </dd>
                                     <dt class="definition-table-head card-wd-150">
                                       <span class="definition-head-item ">希望勤務地
                                       </span>
                                     </dt>
                                     <dd class="definition-table-body">
                                         <ul class="list-label-gp-inner">
                                                 <li class="list-label-gp-item" v-for="desired_workplace in profile.desired_workplaces">
                                                     <span class="list-label list-label-circle">@{{desired_workplace}}</span>
                                                 </li>
                                         </ul>
                                     </dd>
                                 </dl>
                             </li>
                             <li class="definition-table-item">
                                    <dl class="dl-definition-table">
                                        <dt class="definition-table-head card-wd-150">
                                       <span class="definition-head-item ">希望勤務形態
                                       </span>
                                     </dt>
                                     <dd class="definition-table-body">
                                        <span  v-for="(list, index) in profile.desired_employment_types">
                                                <span>@{{list}}</span><span v-if="index+1 < profile.desired_employment_types.length"> </span>
                                        </span>
                                     </dd>
                                     <dt class="definition-table-head card-wd-150">
                                       <span class="definition-head-item ">		希望年収
                                       </span>
                                     </dt>
                                     <dd class="definition-table-body">
                                         @{{profile.desired_salary}}
                                     </dd>
                                 </dl>
                            </li>
                         </ul>
                     </div>
                 <div class="space"></div>
                  <div class="">
                    <h3 class="card-medium-short card-fw-bold">パーソナリティ</h3>
                         <ul class="definition-table">
                            <li class="definition-table-item card-input-br-btm">
                                <dl class="dl-definition-table">
                                        <dt class="definition-table-head card-wd-150">
                                            <span class="definition-head-item ">自己PR
                                            </span>
                                        </dt>
                                        <dd class="definition-table-body m-text-grey">
                                            @{{profile.self_introduction}}
                                        </dd>
                                </dl>
                            </li>
                    </ul>
                 </div>
                 </div>
                 
                 <div class="tab-pane fade" id="nav-career" role="tabpanel" aria-labelledby="nav-career-tab">
                     <div class="space-pd-xs">
                    <ul class="definition-table" v-for="(career,key) in profile.career_history">						
                        <h3 class="card-medium-short card-fw-bold">	職務経歴 @{{key + 1}}</h3>
                        <li class="definition-table-item card-input-br-btm">
                            <dl class="dl-definition-table">
                                <dt class="definition-table-head card-wd-150">
                                        <span class="definition-head-item ">勤務先名
                                        </span>
                                    </dt>
                                    <dd class="definition-table-body">
                                            @{{career.office_name}}
                                    </dd>
                                    <dt class="definition-table-head card-wd-150">
                                        <span class="definition-head-item ">事業内容</span>
                                    </dt>
                                    <dd class="definition-table-body">
                                        <span  v-for="(list, index) in career.service_types" v-if="career.service_types.length > 1">
                                                    (<span>@{{list}}</span><span v-if="index+1 < career.service_types.length">,</span>)
                                        </span>
                                    </dd>
                                </dl>
                                </li>
                                <li class="definition-table-item card-input-br-btm">
                                <dl class="dl-definition-table">
                                        <dt class="definition-table-head card-wd-150">
                                            <span class="definition-head-item ">勤務期間	
                                            </span>
                                        </dt>
                                        <dd class="definition-table-body">
                                                @{{career.start_working_date}} ~ @{{career.end_working_date}}
                                        </dd>
                                        <dt class="definition-table-head card-wd-150">
                                            <span class="definition-head-item ">勤務形態</span>
                                        </dt>
                                        <dd class="definition-table-body">
                                            @{{ career.current_employment_type}}
                                        </dd>
                                    </dl>
                                </li>
                                <li class="definition-table-item card-input-br-btm">
                            <dl class="dl-definition-table">
                                    <dt class="definition-table-head card-wd-150">
                                            <span class="definition-head-item ">職種</span>
                                        </dt>
                                        <dd class="definition-table-body">
                                                @{{ career.job_category_name}}
                                        </dd>
                                        <dt class="definition-table-head card-wd-150">
                                            <span class="definition-head-item ">役職</span>
                                        </dt>
                                        <dd class="definition-table-body">
                                            @{{ career.position}}
                                        </dd>
                                </dl>
                                </li>
                         </ul>
                     </div>
                 </div>
             </div>
                 </div><!-- .popup-content -->
             </div><!-- .popup-body -->
             {{-- <div class="modal-footer text-center">
                 <div class="space-pd-top-sm card-wd-100">
                     <div class="definition-txt-alert space-pd-btm-sm">
                         <span>この履歴書を印刷したい場合は、メッセージを通じて応募者に履歴書の送付を依頼してください</span>
                     </div>
                     <button type="button" class="blue-btn card-fw-bold space-mt-auto" v-if="!watch_profile">この内容でスカウトを送る</button>
                 </div>
             </div><!-- .popup-foot -->
              --}}
         </div>
         
     </div>
 </div><!-- .popup -->