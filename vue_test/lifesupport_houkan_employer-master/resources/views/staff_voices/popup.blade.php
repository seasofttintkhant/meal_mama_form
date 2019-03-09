
<div class="modal fade bt-to-houkan-popup" id="facility_narrow" tabindex="-1" role="dialog" aria-labelledby="facility_narrowTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><h3>職員の声の絞り込み</h3></  h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <ul class="definition-table">
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">施設 
                        </span>
                        </dt>
                        <dd class="definition-table-body full-width">
                          <p>職員の声を掲載している施設を指定してください</p>
                        <input type="text" value="" name="street_address" class="definition-text-field full-width" placeholder="番地" maxlength="100">
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
                        <span class="definition-head-item definition-head-item-left">職員の声の表示状況
                        </span>
                        </dt>
                        <dd class="definition-table-body">
                        <div class="definition-input-left full-width">
                        <div class="card-option">
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="1" v-model="question_1" name="question_1" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                                </label>
                            </span>
                        </div>
                        </div>
                      </dd>
                    </dl>
                    </li>
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">職種
                        </span>
                        </dt>
                        <dd class="definition-table-body">
                        <div class="definition-input-left full-width">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select name="establish_year" id="establish_year" class="card-selectbox-select">
                            <option value="">指定なし</option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>                        
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
                        <span class="definition-head-item definition-head-item-left">経験年数
                        </span>
                        </dt>
                        <dd class="definition-table-body">
                        <div class="definition-input-left full-width">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select name="establish_year" id="establish_year" class="card-selectbox-select">
                            <option value="">指定なし</option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>                        
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
                        <span class="definition-head-item definition-head-item-left">経験年数
                        </span>
                        </dt>
                        <dd class="definition-table-body">
                        <div class="definition-input-left full-width">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select name="establish_year" id="establish_year" class="card-selectbox-select">
                            <option value="">指定なし</option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>
                            <option>歯科診療所・技工所<option>                        
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
        <button type="button" class="blue-btn card-fw-bold blue-btn-2" data-dismiss="modal">この条件で絞り込む</button>
        <a href="#" class="popup-footer-right-link">条件をクリア</a>
      </div>
    </div>
  </div>
</div>


