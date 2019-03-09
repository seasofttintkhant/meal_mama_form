<div v-if="facility_category_id == 5">
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
            <textarea name="open_time" v-model="open_time" class="card-textarea space-mt-10" placeholder="平日
7:00〜21:00
" maxlength="191" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">休業日</span>
            </dt>
            <dd class="definition-table-body">
            <input name="holiday" type="text" value="" v-model="holiday" class="definition-text-field definition-input-md" placeholder="日曜日・祝日">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">利用者定数</span>
            </dt>
            <dd class="definition-table-body">
            <input name="average_patients" type="text" value="" v-model="average_patients" class="definition-text-field definition-input-md" placeholder="1日10人">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">スタッフ構成</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="staff_info" v-model="staff_info" class="card-textarea space-mt-10" placeholder="介護士30名
看護師10名
理学療法士5名
作業療法士3名
相談員1名
事務職5名
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
</ul>
</form>
</div>