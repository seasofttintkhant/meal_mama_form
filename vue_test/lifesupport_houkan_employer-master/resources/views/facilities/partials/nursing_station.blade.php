<div v-if="facility_category_id == 7">
<div class="space"></div>
<form method="POST">
<ul class="definition-table">
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">営業時間</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="open_time" v-model="open_time" class="card-textarea space-mt-10" placeholder="9:00〜18:00
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
            <input name="holiday" type="text" value="" v-model="holiday" class="definition-text-field definition-input-md" placeholder="土・日・祝祭日・年末年始">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">スタッフ構成</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="staff_info" v-model="staff_info" class="card-textarea space-mt-10" placeholder="看護師15名
理学療法士1名
作業療法士1名
ケアマネジャー1名
事務職3名
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">訪問エリア</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="visiting_area" v-model="visiting_area" class="card-textarea space-mt-10" placeholder="東京都中野区、杉並区、練馬区
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
</ul>
</form>
</div>