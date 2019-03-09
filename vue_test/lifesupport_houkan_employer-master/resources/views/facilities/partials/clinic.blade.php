<div v-if="facility_category_id == 2">
<div class="space"></div>
<form method="POST">
<ul class="definition-table">
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">施設規模・病床</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="number_of_beds" v-model="number_of_beds" class="card-textarea-sm space-mt-10" placeholder="一般病床　130床
療養型病床　42床" maxlength="191" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">救急指定</span>
            </dt>
            <dd class="definition-table-body">
            <input name="emergency_designation" type="text" value="" v-model="emergency_designation" class="definition-text-field definition-input-sm" placeholder="">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">開院時間</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="open_time" v-model="open_time" class="card-textarea space-mt-10" placeholder="平日
9:00〜12:00
14:00〜17:00
土曜日
9:00〜12:00" maxlength="2000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">休診日</span>
            </dt>
            <dd class="definition-table-body">
            <input name="holiday" type="text" value="" v-model="holiday" class="definition-text-field definition-input-md" placeholder="木・日・祭日">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">平均患者数</span>
            </dt>
            <dd class="definition-table-body">
            <input name="average_patients" type="text" value="" v-model="average_patients" class="definition-text-field definition-input-md" placeholder="1日平均50人">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">年間救急車受け入れ台数</span>
            </dt>
            <dd class="definition-table-body">
            <input name="ambulance_per_year" type="text" value="" v-model="ambulance_per_year" class="definition-text-field definition-input-sm" placeholder="1800台">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">スタッフ構成</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="staff_info" v-model="staff_info" class="card-textarea space-mt-10" placeholder="医師5名
看護師50名
薬剤師2名
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">常勤医師数</span>
            </dt>
            <dd class="definition-table-body">
            <input name="fulltime_doctor_info" type="text" value="" v-model="fulltime_doctor_info" class="definition-text-field definition-input-sm" placeholder="12名">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">非常勤医師数</span>
            </dt>
            <dd class="definition-table-body">
            <input name="parttime_doctor_info" type="text" value="" v-model="parttime_doctor_info" class="definition-text-field definition-input-sm" placeholder="12名">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">設備/機材</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="equip_info" v-model="equip_info" class="card-textarea space-mt-10" placeholder="MRI装置
全身用CT断層撮影装置
超音波診断装置" maxlength="191" rows="1"></textarea>\
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">院長名</span>
            </dt>
            <dd class="definition-table-body">
            <input name="director_name" type="text" value="" v-model="director_name" class="definition-text-field definition-input-md" placeholder="">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">院長略歴</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="director_history" v-model="director_history" class="card-textarea space-mt-10" placeholder="1996年　○○大学医学部　卒業
2009年　○○医院　開業
専門：内科
医学博士
日本内科学会認定医" maxlength="191" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item definition-head-item-left">社宅・寮
              </span>
            </dt>
            <dd class="definition-table-body">
              <span class="common-box-left">
                <label class="common-radio">あり
                  <input type="radio" value="1" v-model="has_dormitory">
                  <span class="checkmark"></span>
                </label>
              </span>
              <span class="common-box-right">
                <label class="common-radio">なし
                  <input type="radio" value="0" checked="checked" v-model="has_dormitory">
                  <span class="checkmark"></span>
                </label>
              </span>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item card-input-br-btm">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item definition-head-item-left">託児所
              </span>
            </dt>
            <dd class="definition-table-body">
                <span class="common-box-left">
                    <label class="common-radio">あり
                      <input type="radio" value="1" v-model="has_nursery">
                      <span class="checkmark"></span>
                    </label>
                  </span>
                  <span class="common-box-right">
                    <label class="common-radio">なし
                      <input type="radio" value="0" checked="checked" v-model="has_nursery">
                      <span class="checkmark"></span>
                    </label>
                  </span>
            </dd>
      </dl>
    </li>
</ul>
</form>
</div>