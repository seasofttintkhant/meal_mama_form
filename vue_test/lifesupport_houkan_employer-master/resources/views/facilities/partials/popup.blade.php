
<div class="modal fade bt-to-houkan-popup" id="facility_narrow" tabindex="-1" role="dialog" aria-labelledby="facility_narrowTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><h3>施設の絞り込み</h3></  h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <ul class="definition-table">
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">施設名・都道府県 
                        </span>
                        </dt>
                        <dd class="definition-table-body full-width">
                        <input v-model="searchParams.name" class="definition-text-field full-width" placeholder="番地" maxlength="100">
                        <span class="definition-txt-alert" style="display: none;">
                            Error
                        </span>
                        </dd>
                        <dd class="e-fac-new-right"></dd>
                    </dl>
                    </li>
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">施設形態
                        </span>
                        </dt>
                        <dd class="definition-table-body">
                        <div class="definition-input-left full-width">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select v-model="searchParams.facility_category_id" id="facility_category" class="card-selectbox-select">
                            <option value="">指定なし</option>
                            <option :value="id" v-for="(name,id) in facility_categories">@{{name}}</option>  
                                  
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                        </div>
                        </div>
                      </dd>
                    </dl>
                    </li>
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">担当者名
                        </span>
                        </dt>
                        <dd class="definition-table-body full-width">
                        <input type="text" v-model="searchParams.contact_name" class="definition-text-field full-width" placeholder="番地" maxlength="100">
                        <span class="definition-txt-alert" style="display: none;">
                            Error
                        </span>
                        </dd>
                        <dd class="e-fac-new-right"></dd>
                    </dl>
                    </li>
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">掲載・登録状況
                        </span>
                        </dt>
                        <dd class="definition-table-body">
                        <div class="definition-input-left full-width">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select v-model="searchParams.job_offer_existence" id="job_offer_existence" class="card-selectbox-select">
                            <option value="">指定なし</option>
                            <option :value="key" v-for="(value,key) in posting_statuses">@{{value}}</option>                     
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                        </div>
                        </div>
                      </dd>
                    </dl>
                    </li>
                </ul>
      </div>
      <div class="modal-footer j-c-c">
        <button type="button" class="blue-btn card-fw-bold blue-btn-2" data-dismiss="modal" @click.prevent="getFaciliyNJobs(0)">この条件で絞り込む</button>
        <a href="#" class="popup-footer-right-link" @click.prevent="clearForm(2)">条件をクリア</a>
      </div>
    </div>
  </div>
</div>

