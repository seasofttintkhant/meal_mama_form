<div class="fac-content-block">
  <div class="space-pd-20">
      <dl class="search-inline-form">
        <span class="search-inline-item card-wd-27">
          <span>
            <dl class="search-inline-form">
              <span class="search-inline-item ">
                <span>
                  <button type="button" class="pannel-btn-submit e-pannel-submit space-pd-xs search-inline-btn" :disabled="!scout_send_button" data-toggle="modal" data-target="#scoutModal" @click="clearscoutPopup(true)">チェックした求職者に<br>スカウトを送る</button>
                </span>
              </span>
              <span class="search-inline-item search-inline-txt text-center">
                <span>
                <span class="card-fw-bold">該当件数<br>@{{pagination.total}}</span>
                </span>
              </span>
            </dl>
          </span>
        </span><!-- >.search-inline-item -->
          @include('searches.pagination')
      </dl><!-- .inline-form -->
  </div><!-- .space-pd-20 -->
  <table class="card-tbl">
    <thead class="card-tbl-head">
      <tr>
        <th class="card-head-tbl-item card-wd-35 space-pr-sm">
          <div class="grid-checkbox">
            <label class="grid-checkbox-label grid-block">
              <input ref="select_all" class="grid-checkbox-input" type="checkbox" @change="ScoutselectAll">
              <span class="checkmark"></span>
            </label>
          </div>
        </th>
        <th class="card-head-tbl-item">会員番号・基本情報</th>
        <th class="card-head-tbl-item">経歴・現職（前職）</th>
        <th class="card-head-tbl-item">希望職種・経験・資格</th>
        <th class="card-head-tbl-item"></th>
      </tr>
    </thead>
    <tbody class="card-tbl-body">
      <tr class="card-tbl-row" v-for="jobseeker in jobseekers">
        <td class="card-tbl-body-item card-item-middle card-wd-30">
          <div class="grid-checkbox">
            <label class="grid-checkbox-label card-block">
              <input :value="jobseeker.id" v-model="scout_users" class="grid-checkbox-input" type="checkbox" @change="ScoutSelect()">
              <span class="checkmark"></span>
            </label>
          </div>
        </td>
        <td class="card-tbl-body-item space-pd-btm-md">
          <span class="card-fw-bold">@{{jobseeker.id}}</span>
          <ul class="card-linine-list">
            <li class="card-inline-list-item">
              <span class="card-fw-bold">@{{jobseeker.short_address}}</span>
            </li>
            <li class="card-inline-list-item">
              <span class="card-fw-bold">@{{jobseeker.age}}歳 @{{jobseeker.gender}}</span>
            </li>
          </ul>
          <div class="card-line">
            <div class="card-line-item card-line-left">
              <span class="card-item-title">希望勤務地</span>
            </div>
            <span>
              <div class="card-line-item card-line-right" v-for="desired_workplace in jobseeker.desired_workplaces">@{{desired_workplace}}</div>
            </span>
          </div>
          <div class="card-line">
            <div class="card-line-item card-line-left">
              <span class="card-item-title">希望勤務形態</span>
            </div>
            <span>
              <div class="card-line-item card-line-right">@{{jobseeker.desired_employment_types}}</div>
            </span>
          </div>
          
          <div class="card-item-title">希望条件</div>
        </td>
        <td class="card-tbl-body-item space-pd-btm-md">
          <div class="card-item-title">経歴</div>
        <div>@{{jobseeker.school_name}} @{{jobseeker.faculty_department}} @{{jobseeker.final_education_str}} @{{jobseeker.graduation_description}}</div>
          <div class="card-item-title space-pd-top-sm">現職(前職)</div>
          <div>@{{jobseeker.employment_situation}}</div>
        </td>
        <td class="card-tbl-body-item space-pd-btm-md">
          <div class="card-item-title">職種</div>
          <div>医療事務/受付 (未経験)</div>
          <div class="card-item-title space-pd-top-sm">保有資格</div>
          <div>その他/無資格</div>
        </td>
        <td class="card-tbl-body-item">
            <button type="button" class="card-btn card-btn-sm card-wd-100" data-toggle="modal" data-target="#profileModal" @click="getProfile(jobseeker.id,false)">プロフィール確認</button><br>
            <a href="#" class="btn blue-btn card-btn-sm card-wd-100 card-fw-bold" data-toggle="modal" data-target="#scoutModal" @click="clearscoutPopup(false,jobseeker.id)">スカウトを送る</a>
            <div class="card-item-title space-pd-top-sm">最終ログイン</div>
            <div>2018/10/17 08:42</div>
          </td>
      </tr>
    </tbody><!-- .card-tbl-body -->
  </table><!-- .card-tbl -->
  <div class="space-pd-20">
    <dl class="search-inline-form">
      <span class="search-inline-item card-wd-27">
        <span>
          <dl class="search-inline-form">
            <span class="search-inline-item ">
              <span>
                <button type="button" class="pannel-btn-submit e-pannel-submit space-pd-xs search-inline-btn" :disabled="!scout_send_button" data-toggle="modal" data-target="#scoutModal" @click="clearscoutPopup(true)">チェックした求職者に<br>スカウトを送る</button>
              </span>
            </span>
            <span class="search-inline-item  text-center search-inline-txt">
              <span>
              <span class="card-fw-bold">該当件数<br>@{{pagination.total}}件</span>
              </span>
            </span>
          </dl>
        </span>
      </span><!-- >.search-inline-item -->
      @include('searches.pagination')
    </dl><!-- .inline-form -->
  </div><!-- .space-pd-20 -->
</div><!-- .fac-content-block --> 