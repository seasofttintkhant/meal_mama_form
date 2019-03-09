<div v-if="facility_category_id == 6">
<div class="space"></div>
<form method="POST">
<ul class="definition-table">
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">営業時間</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="open_time" v-model="open_time" class="card-textarea space-mt-10" placeholder="店舗
10:00〜20:00
調剤薬局
10:00〜17:00
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
            <input name="holiday" type="text" value="" v-model="holiday" class="definition-text-field definition-input-md" placeholder="年中無休">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">スタッフ構成</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="staff_info" v-model="staff_info" class="card-textarea space-mt-10" placeholder="薬剤師5名
登録販売者8名
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">処方箋科目</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="prescription_kind" v-model="prescription_kind" class="card-textarea space-mt-10" placeholder="胃腸科、皮膚科、婦人科
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">平均処方箋枚数</span>
            </dt>
            <dd class="definition-table-body">
            <input name="avarage_prescription_number" type="text" value="" v-model="avarage_prescription_number" class="definition-text-field definition-input-md" placeholder="50枚/日">
            </dd>
        </dl>
    </li>
</ul>
</form>
</div>