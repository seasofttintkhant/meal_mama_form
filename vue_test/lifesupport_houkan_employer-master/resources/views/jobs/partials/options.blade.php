<form method="POST" >
    <ul class="definition-table">
      <li class="definition-table-item" v-if="feature_rows[1]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item">
              <span class="definition-label-red">必須
              </span>
            </span>
            <span class="definition-head-item definition-head-item-left">仕事内容
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                  <div class="row" v-for="feature_row_1 in feature_rows[1]">
                    <div class="col-md-4" v-for="feature_1 in feature_row_1">
                        <div class="grid-checkbox">
                          <label class="grid-checkbox-label">
                          <input type="checkbox" :value="feature_1.id" name="feature_category_1" v-model="feature_category_1" class="grid-checkbox-input">
                          <span class="checkmark"></span>
                          <span class="checkmark-text">@{{feature_1.name}}</span>
                        </label>
                        </div>
                    </div>
                  </div><!-- .row -->
                </div><!-- .filter-grid -->
                <textarea name="job_content" name="feature_category_1" v-model="job_content" v-bind:class="{'definition-txt-error' : errors.job_content}" class="card-textarea space-mt-10 e-card-textarea" placeholder="訪問リハビリ業務。1日3〜5件ほど訪問します。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                <span class="definition-txt-alert" v-if="errors.job_content" :errors="errors">
                @{{ errors.job_content[0] }}
              </span>
            </div>
          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey">具体的な数値などを盛り込みながらご記入いただくと、応募されやすい傾向にあります。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[2]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">診療科目
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                  <div class="row" v-for="feature_row_2 in feature_rows[2]">
                    <div class="col-md-4" v-for="feature_2 in feature_row_2">
                        <div class="grid-checkbox">
                          <label class="grid-checkbox-label">
                          <input type="checkbox"  :value="feature_2.id" name="feature_category_2" v-model="feature_category_2" class="grid-checkbox-input">
                          <span class="checkmark"></span>
                          <span class="checkmark-text">@{{feature_2.name}}</span>
                        </label>
                        </div>
                    </div>
                  </div><!-- .row -->
                </div><!-- .filter-grid -->
            </div>
          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey">当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[3]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">サービス形態
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                <div class="row" v-for="feature_row_3 in feature_rows[3]">
                  <div class="col-md-4" v-for="feature_3 in feature_row_3">
                      <div class="grid-checkbox">
                        <label class="grid-checkbox-label">
                        <input type="checkbox"  :value="feature_3.id" name="feature_category_3" v-model="feature_category_3" class="grid-checkbox-input">
                        <span class="checkmark"></span>
                        <span class="checkmark-text">@{{feature_3.name}}</span>
                      </label>
                      </div>
                  </div>
                </div><!-- .row -->
                </div><!-- .filter-grid -->
            </div>
          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey">当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[4]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item">
              <span class="definition-label-red">必須
              </span>
            </span>
            <span class="definition-head-item definition-head-item-left">雇用形態と給与
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div>
              <label class="common-radio">正職員
              <input checked="checked" name="employment_type" name="employment_type" v-model="employment_type" value="1"  type="radio">
              <span class="checkmark"></span>
            </label>
            </div>
            <div class="space-pd-xs" v-if="employment_type == 1">
              <div class="">
                <dl class="card-inline-form">
                  <span class="card-inline-item">
                    <span>月給</span>
                  </span>
                  <span class="card-inline-item card-wd-date-100">
                    <span>
                      <input type="text" name="job_offer_salary_regular_min" v-model="job_offer_salary_regular_min" class="card-txt-field" placeholder="" maxlength="">
                    </span>
                  </span>
                  <span class="card-inline-item">
                    <span>〜</span>
                  </span>
                  <span class="card-inline-item card-wd-date-100">
                    <span>
                      <input type="text" name="job_offer_salary_regular_max" v-model="job_offer_salary_regular_max" class="card-txt-field" placeholder="" maxlength="">
                    </span>
                  </span>
                  <span class="card-inline-item"><span>円</span></span>
                </dl>
              </div>
              <span class="definition-txt-alert" v-if="errors.job_offer_salary_regular_min" :errors="errors">
                @{{ errors.job_offer_salary_regular_min[0] }}
              </span>
              <span class="definition-txt-alert" v-if="errors.job_offer_salary_regular_max" :errors="errors">
                @{{ errors.job_offer_salary_regular_max[0] }}
              </span>
            </div>  
            <div class="space-pd-top-sm">
              <label class="common-radio">契約職員
              <input checked="checked" name="employment_type" v-model="employment_type" value="2" type="radio">
              <span class="checkmark"></span>
            </label>
            </div>
            <div class="space-pd-xs" v-if="employment_type == 2">
              <div class="">
                <dl class="card-inline-form">
                  <span class="card-inline-item">
                    <span>月給</span>
                  </span>
                  <span class="card-inline-item card-wd-date-100">
                    <span>
                      <input type="text" name="job_offer_salary_contract_min" v-model="job_offer_salary_contract_min" class="card-txt-field" placeholder="" maxlength="">
                    </span>
                  </span>
                  <span class="card-inline-item">
                    <span>〜</span>
                  </span>
                  <span class="card-inline-item card-wd-date-100">
                    <span>
                      <input type="text" name="job_offer_salary_contract_max" v-model="job_offer_salary_contract_max" class="card-txt-field" placeholder="" maxlength="">
                    </span>
                  </span>
                  <span class="card-inline-item"><span>円</span></span>
                </dl>
              </div>
              <span class="definition-txt-alert" v-if="errors.job_offer_salary_contract_min" :errors="errors">
                @{{ errors.job_offer_salary_contract_min[0] }}
              </span>
              <span class="definition-txt-alert" v-if="errors.job_offer_salary_contract_max" :errors="errors">
                @{{ errors.job_offer_salary_contract_max[0] }}
              </span>
            </div>  

            
            <div>
              <label class="common-radio">パート・アルバイト
              <input checked="checked" name="employment_type" v-model="employment_type" value="3" type="radio">
              <span class="checkmark"></span>
            </label>
            </div>
            <div class="space-pd-xs" v-if="employment_type == 3">
              <div class="">
                <dl class="card-inline-form">
                  <span class="card-inline-item">
                    <span>時給</span>
                  </span>
                  <span class="card-inline-item card-wd-date-100">
                    <span>
                      <input type="text" name="job_offer_salary_part_min" v-model="job_offer_salary_part_min" class="card-txt-field" placeholder="" maxlength="">
                    </span>
                  </span>
                  <span class="card-inline-item">
                    <span>〜</span>
                  </span>
                  <span class="card-inline-item card-wd-date-100">
                    <span>
                      <input type="text" name="job_offer_salary_part_max" v-model="job_offer_salary_part_max" class="card-txt-field" placeholder="" maxlength="">
                    </span>
                  </span>
                  <span class="card-inline-item"><span>円</span></span>
                </dl>
              </div>
              <span class="definition-txt-alert" v-if="errors.job_offer_salary_part_min" :errors="errors">
                @{{ errors.job_offer_salary_part_min[0] }}
              </span>
              <span class="definition-txt-alert" v-if="errors.job_offer_salary_part_max" :errors="errors">
                @{{ errors.job_offer_salary_part_max[0] }}
              </span>
            </div>
            <span class="definition-txt-alert" v-if="errors.employment_type" :errors="errors">
              @{{ errors.employment_type[0] }}
            </span>
          </dd>
          <dd class="e-fac-new-right"> 
            <div class="space-pd-top-sm">
                <span class="definition-txt-alert card-fw-normal">多くの求職者は月給または時給で比較されますので、年俸制や日給制であっても、可能な限り月給換算・時給換算を記入することをおすすめします
                </span>
              <span class="registering-txt card-font-grey">換算の記入が難しい場合は、給与の備考欄に詳しくご記載ください。</span>
            </div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[5]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">給与の備考<br>(昇給、モデル年収等)
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <textarea name="salary_etc" v-model="salary_etc" class="card-textarea space-mt-10" placeholder="年収300〜400万円。給与は経験・能力を考慮し決定。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
          </dd>
          <dd class="e-fac-new-right"></dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[6]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">待遇
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                <div class="row" v-for="feature_row_6 in feature_rows[6]">
                  <div class="col-md-4" v-for="feature_6 in feature_row_6">
                      <div class="grid-checkbox">
                        <label class="grid-checkbox-label">
                        <input type="checkbox"  :value="feature_6.id" v-model="feature_category_6" class="grid-checkbox-input">
                        <span class="checkmark"></span>
                        <span class="checkmark-text">@{{feature_6.name}}</span>
                      </label>
                      </div>
                  </div>
                </div><!-- .row -->
                </div><!-- .filter-grid -->
                <textarea name="welfare_programs" v-model="welfare_programs" class="card-textarea space-mt-10 e-card-textarea" placeholder="退職金制度、住宅支援制度あり" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
            </div>
          </dd>
          <dd class="e-fac-new-right">
            <div class="space-pd-top-sm">
                <span class="definition-txt-alert card-fw-normal">社会保険完備や賞与ありと明記されている求人は、もっとも閲覧される傾向にあります。
                </span>
              <span class="space-mt-10 registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
            </div>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[7]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item">
              <span class="definition-label-red">必須
              </span>
            </span>
            <span class="definition-head-item definition-head-item-left">勤務時間
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                <div class="row" v-for="feature_row_7 in feature_rows[7]">
                  <div class="col-md-4" v-for="feature_7 in feature_row_7">
                      <div class="grid-checkbox">
                        <label class="grid-checkbox-label">
                        <input type="checkbox"  :value="feature_7.id" v-model="feature_category_7" v-bind:class="{'definition-txt-error' : errors.office_hours_conditions}" class="grid-checkbox-input">
                        <span class="checkmark"></span>
                        <span class="checkmark-text">@{{feature_7.name}}</span>
                      </label>
                      </div>
                  </div>
                </div><!-- .row -->
          
                </div><!-- .filter-grid -->
                <textarea name="office_hours_conditions" v-model="office_hours_conditions" v-bind:class="{'definition-txt-error' : errors.office_hours_conditions}" class="card-textarea space-mt-10 e-card-textarea" placeholder="8:30〜17:30（休憩60分 ※時間・曜日応相談" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
            </div>
            <span class="definition-txt-alert" v-if="errors.feature_category_7" :errors="errors">
            @{{ errors.feature_category_7[0] }}
            </span>
            <span class="definition-txt-alert" v-if="errors.office_hours_conditions" :errors="errors">
              @{{ errors.office_hours_conditions[0] }}
            </span>
          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[8]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item">
              <span class="definition-label-red">必須
              </span>
            </span>
            <span class="definition-head-item definition-head-item-left">休日
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                <div class="row" v-for="feature_row_8 in feature_rows[8]">
                  <div class="col-md-4" v-for="feature_8 in feature_row_8">
                      <div class="grid-checkbox">
                        <label class="grid-checkbox-label">
                        <input type="checkbox"  :value="feature_8.id" v-model="feature_category_8" v-bind:class="{'definition-txt-error' : errors.feature_category_8}" class="grid-checkbox-input" name="feature_category_8">
                        <span class="checkmark"></span>
                        <span class="checkmark-text">@{{feature_8.name}}</span>
                      </label>
                      </div>
                  </div>
                </div><!-- .row -->
                </div><!-- .filter-grid -->
                <textarea name="holiday" v-model="holiday" v-bind:class="{'definition-txt-error' : errors.holiday}" class="card-textarea space-mt-10 e-card-textarea" placeholder="完全週休2日制 年間休日115日" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
            </div>
            <span class="definition-txt-alert" v-if="errors.feature_category_8" :errors="errors">
            @{{ errors.feature_category_8[0] }}
            </span>
            <span class="definition-txt-alert" v-if="errors.holiday" :errors="errors">
              @{{ errors.holiday[0] }}
            </span>

          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。<br>休日日数など具体的な数値を盛り込みながらご記入いただくと、応募されやすい傾向にあります。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[9]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">長期休暇・特別休暇
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
                <textarea name="special_holiday" v-model="special_holiday" class="card-textarea e-card-textarea space-mt-10" placeholder="年末年始休暇 リフレッシュ休暇制度（勤続3年以上に最長10日間）" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
            </div>
          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey">休日日数など具体的な数値を盛り込みながらご記入いただくと、応募されやすい傾向にあります。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[10]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item">
              <span class="definition-label-red">必須
              </span>
            </span>
            <span class="definition-head-item definition-head-item-left">応募要件
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                <div class="row" v-for="feature_row_10 in feature_rows[10]">
                  <div class="col-md-4" v-for="feature_10 in feature_row_10">
                      <div class="grid-checkbox">
                        <label class="grid-checkbox-label">
                        <input type="checkbox"  :value="feature_10.id" v-model="feature_category_10"v-bind:class="{'definition-txt-error' : errors.feature_category_10t}"  class="grid-checkbox-input" name="feature_category_10">
                        <span class="checkmark"></span>
                        <span class="checkmark-text">@{{feature_10.name}}</span>
                      </label>
                      </div>
                  </div>
                </div><!-- .row -->
               
                </div><!-- .filter-grid -->
                <textarea name="position_requirement" v-model="position_requirement" v-bind:class="{'definition-txt-error' : errors.position_requirement}" class="card-textarea space-mt-10 e-card-textarea" placeholder="下記いずれかの資格をお持ちの方・介護福祉士 ・介護職員初任者研修（旧ヘルパー2級）未経験者やブランクのある方も研修を実施しますので安心して働くことができます。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
            </div>
            <span class="definition-txt-alert" v-if="errors.feature_category_10" :errors="errors">
            @{{ errors.feature_category_10[0] }}
            </span>
            <span class="definition-txt-alert" v-if="errors.position_requirement" :errors="errors">
            @{{ errors.position_requirement[0] }}
            </span>
          </dd>
          <dd class="e-fac-new-right">
            <div class="space-pd-top-sm">
                <span class="definition-txt-alert card-fw-normal">求職者が迷われないよう、必須の条件は「応募要件」に、必須ではないが望ましい条件は「歓迎要件」にご記入ください。
                </span>
              <span class="space-mt-10 registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
            </div>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[11]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">歓迎要件
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
                <textarea name="desired_requirement" v-model="desired_requirement" class="card-textarea space-mt-10" placeholder="管理職経験 3年 等" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
            </div>
          </dd>
          <dd class="e-fac-new-right">
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[12]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">アクセス
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <div class="space-pd-btm-sm">
               <div class="filter-grid">
                <div class="row" v-for="feature_row_12 in feature_rows[12]">
                  <div class="col-md-4" v-for="feature_12 in feature_row_12">
                      <div class="grid-checkbox">
                        <label class="grid-checkbox-label">
                        <input type="checkbox"  :value="feature_12.id" v-model="feature_category_10" class="grid-checkbox-input">
                        <span class="checkmark"></span>
                        <span class="checkmark-text">@{{feature_12.name}}</span>
                      </label>
                      </div>
                  </div>
                </div><!-- .row -->
                </div><!-- .filter-grid -->
            </div>
          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey"> 求職者向けには施設情報に登録いただいた内容が詳細として表示されます。<br>当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
      <li class="definition-table-item" v-if="feature_rows[13]">
        <dl class="dl-definition-table">
          <dt class="definition-table-head">
            <span class="definition-head-item">
              <span class="definition-label-red">必須
              </span>
            </span>
            <span class="definition-head-item definition-head-item-left">選考プロセス
            </span>
          </dt>
          <dd class="definition-table-body e-fac-new-left">
            <span class="card-font-grey">下記は入力例となりますので必要に応じて適宜編集してください。</span>
            <div class="space-pd-btm-sm">
                <textarea name="selection_process" v-model="selection_process" class="card-textarea e-card-textarea space-mt-10" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 300px;"></textarea>
            </div>
          </dd>
          <dd class="e-fac-new-right">
            <span class="registering-txt card-font-grey">応募を迷われる求職者の方に最後のアピールができます。入力例を参考に、履歴書の送付が必要な場合などは追記ください。</span>
            <div class="space"></div>
          </dd>
        </dl>
      </li>
    </ul>
</form>