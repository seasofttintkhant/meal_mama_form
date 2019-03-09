<div  v-if="facility_category_id == 8">
<div class="space"></div>
<ul class="definition-table">
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">保育時間</span>
            </dt>
            <dd class="definition-table-body">
            <textarea name="open_time" v-model="open_time" class="card-textarea space-mt-10" placeholder="通常保育
平日　8:30〜17:30
土曜　8:30〜13:00
時間外・延長保育
平日　7:15〜8:30、17:30〜20:30
土曜　7:30〜7:30" maxlength="191" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">休園日</span>
            </dt>
            <dd class="definition-table-body">
            <input name="holiday" type="text" value="" v-model="holiday" class="definition-text-field definition-input-md" placeholder="日曜日・祝日・年末年始">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">スタッフ構成</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="staff_info" v-model="staff_info" class="card-textarea space-mt-10" placeholder="保育士　20名
栄養士　1名
調理スタッフ　2名
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">対象年齢</span>
            </dt>
            <dd class="definition-table-body">
            <input name="target_age" type="text" value="" v-model="target_age" class="definition-text-field definition-input-md" placeholder="0歳（生後57日）〜就学前">
            </dd>
        </dl>
    </li>
    <li class="definition-table-item">
        <dl class="dl-definition-table">
            <dt class="definition-table-head">
            <span class="definition-head-item definition-head-item-left">定員</span>
            </dt>
            <dd class="definition-table-body">
           <textarea name="capacity" v-model="capacity" class="card-textarea space-mt-10" placeholder="合計 70名
0歳児 10名
1歳児 12名
2歳児 12名
3歳児 12名
4歳児 12名
5歳児 12名
            " maxlength="1000" rows="1"></textarea>
            </dd>
        </dl>
    </li>
</ul>
</div>