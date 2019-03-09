<div v-if="facility_category_id == 4">
<div class="space"></div>
<form method="POST">
<ul class="definition-table">
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">施設規模</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="number_of_beds" v-model="number_of_beds" class="card-textarea-sm space-mt-10" placeholder="一般病床　130床
療養型病床　42床
			" maxlength="191" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">営業時間</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="open_time" v-model="open_time" class="card-textarea space-mt-10" placeholder="10:00〜20:00
" maxlength="2000" rows="1"></textarea>
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
            <span class="definition-head-item definition-head-item-left">スタッフ構成</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="staff_info" v-model="staff_info" class="card-textarea space-mt-10" placeholder="鍼灸師15名
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">設備/機材</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="equip_info" v-model="equip_info" class="card-textarea space-mt-10" placeholder="高周波治療器
ローラーベッド
酸素カプセル
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
</ul>
</form>
</div>