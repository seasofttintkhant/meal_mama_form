<div class="fac-content-block">
        <div class="space-pd-20">
          <dl class="search-inline-form">
            <span class="search-inline-item card-wd-27">
              <span>
              <dl class="search-inline-form">
                <span class="search-inline-item search-inline-txt card-fw-bold">
                  <span>
                   該当件数 @{{job_application_total}}件
                  </span>
                </span>
              </dl>
            </span>
            </span><!-- >.search-inline-item -->
            <span class="search-inline-item pull-right">
              
            </span><!-- .search-inline-item -->
          </dl><!-- .inline-form -->
        </div><!-- .space-pd-20 -->
          <table class="card-tbl space-pd-btm-sm">
            <thead class="card-tbl-head">
              <tr>
                <th class="card-head-tbl-item">会員番号・基本情報</th>
                <th class="card-head-tbl-item">対象求人</th>
                <th class="card-head-tbl-item">応募日・更新日</th>
                <th class="card-head-tbl-item">入職状況</th>
              </tr>
            </thead>
            <tbody class="card-tbl-body">
              <tr class="card-tbl-row" v-for="job_application in job_applications">   
                <td class="card-tbl-body-item space-pd-btm-md">
                  <span class="card-fw-bold">@{{job_application.employee_name}}</span><br>
                  <span class="card-fw-bold">@{{job_application.employee_id}} @{{job_application.gender == 1 ? '男性' : '女性' }} @{{job_application.employee_age}}歳</span>
                  <ul class="list-label-gp-inner  space-pd-top-sm">
                    <li class="list-label-gp-item">
                        <span  v-for="(list, index) in profile.qualification" class="list-label list-label-circle">
                            <span>@{{list}}</span><span v-if="index+1 < profile.qualification.length"> </span>
                        </span>
                    </li>
                    <li class="list-label-gp-item">
                      <span class="list-label list-label-circle">訪問看護ステーション</span>
                    </li>
                    {{-- <li class="list-label-gp-item">
                      <span class="list-label-blue-right list-label list-label-circle">スカウト経由応募</span>
                    </li> --}}
                  </ul>
                  <ul class="card-linine-list space-pd-top-xs">
                    <li class="card-inline-list-item">
                      <a href="#" @click.prevent="getProfile(job_application.employee_id)" data-toggle="modal" data-target="#profileModal" class="card-link" >プロフィール確認</a>
                    </li>
                    <li class="card-inline-list-item">
                        <a href="#" class="card-link" @click.prevent="messagePopup(job_application.message_id)">メッセージ確認</a>
                    </li>
                  </ul>
                </td>
                <td class="card-tbl-body-item space-pd-btm-md">             
                  <div class="card-item-title">@{{job_application.facility_name}}</div>
                  <div>@{{job_application.job_category_name}}</div>
                  <ul class="list-label-gp-inner  space-pd-top-sm">
                    <li class="list-label-gp-item">
                      <span class="list-label list-label-circle">@{{job_application.job_employment_type}}</span>
                    </li>
                  </ul>
                  {{-- <div class="space-pd-top-xs">
                      <span class="list-label list-label-circle list-label-yellow">採用費用：12.5〜25万円</span>
                  </div> --}}
                  {{-- <div class="space-pd-top-sm">
                    <a @click.prevent="detailsPopup" href="#" title="" class="card-link">採用費の詳細</a>
                  </div> --}}
                </td>
                <td class="card-tbl-body-item space-pd-btm-md">
                  <div class="card-line-item card-item-title">
                    <div class="card-line-item card-line-left">
                      <span class="card-item-title">応募日</span>
                    </div>
                    <div class="card-line-item card-line-right">
                      <span class="card-item-title">@{{job_application.apply_date}}</span>
                    </div>
                  </div>
                  <div class="card-line-item card-item-title">
                    <div class="card-line-item card-line-left">
                      <span class="card-item-title">更新日</span>
                    </div>
                    <div class="card-line-item card-line-right">
                      <span class="card-item-title">@{{job_application.updated_date}}</span>
                    </div>
                    <div>
                      <textarea :data-id="job_application.id" class="card-textarea space-mt-10" placeholder="メモ" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; min-height: 76px;">@{{job_application.memo}}</textarea>
                      <button class="blue-btn card-btn-sm card-wd-50 card-fw-bold" @click.prevent="addMemo(job_application.id)">Save</button>
                    </div>
                  </div>
                </td>
                <td class="card-tbl-body-item">
                  <div class="card-line-item card-item-title">
                    <div class="card-line-item card-line-left">
                      <span class="card-item-title">入職状況</span>
                    </div>
                    <div class="card-line-item card-line-right">
                      <span class="">@{{job_application.status_str}}</span>
                    </div>
                  </div>
                  <div class="card-item-title">入職日
                  </div>
                  <div class="card-item-title">入職予定日
                  </div><br>
                    <button @click.prevent="statusPopup(job_application)" class="blue-btn card-btn-sm card-wd-100 card-fw-bold">入職状況の変更</button><br>
                  </td>
              </tr>        
            </tbody><!-- .card-tbl-body -->
          </table><!-- .card-tbl -->
          <div class="space"></div>
        </div>
        <div class="space"></div>
      </div><!-- .fac-content-block --> 