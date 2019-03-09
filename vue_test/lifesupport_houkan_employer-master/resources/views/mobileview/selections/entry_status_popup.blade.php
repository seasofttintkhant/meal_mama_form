<div class="modal fade" id="entry-status-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-min-height">
            <div class="modal-header">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="c-m-page-header__title">
                  <h1 class="c-m-heading m-fw-bold">入職状況の変更</h1>
                </div>
                </div>
                  </div>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <ul class="definition-table">
                    <li class="definition-table-item">
                        <dl class="dl-definition-table">
                          <dt class="definition-table-head">
                                <span class="definition-head-item ">選考中</span>
                                  </dt>
                                  <dd class="definition-table-body">
                                    <div class="row">
                                    <div class="col">
                                      <label class="common-radio">応募済
                                          <input checked="checked" v-model="application_status" value="1" type="radio">
                                          <span class="checkmark"></span>
                                      </label>
                                      <label class="common-radio">書類選考中
                                          <input checked="checked" v-model="application_status" value="2" type="radio">
                                          <span class="checkmark"></span>
                                      </label>
                                      <label class="common-radio">面接日設定済
                                          <input checked="checked" v-model="application_status" value="3" type="radio">
                                          <span class="checkmark"></span>
                                      </label>
                                      <label class="common-radio">面接実施中
                                          <input checked="checked" v-model="application_status" value="4" type="radio">
                                          <span class="checkmark"></span>
                                      </label>
                                      <label class="common-radio">内定済
                                          <input checked="checked" v-model="application_status" value="5" type="radio">
                                          <span class="checkmark"></span>
                                      </label>
                                      <label class="common-radio">内定承諾済
                                          <input checked="checked" v-model="application_status" value="6" type="radio">
                                          <span class="checkmark"></span>
                                      </label>
                                      <label class="common-radio">入職日決定済
                                          <input checked="checked" v-model="application_status" value="7" type="radio">
                                          <span class="checkmark"></span>
                                      </label>
                                      </div>
                                  </div>
                              </dd>
                          </dl>
                      </li>
                      <li class="definition-table-item card-input-br-btm">
                        <dl class="dl-definition-table">
                          <dt class="definition-table-head">
                                <span class="definition-head-item ">選考中
                                </span>
                              </dt>
                              <dd class="definition-table-body">
                            <div class="row">
                              <div class="col">
                                <label class="common-radio">入職済
                                    <input checked="checked" v-model="application_status" value="8" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="common-radio">不採用
                                    <input checked="checked" v-model="application_status" value="9" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="common-radio">内定辞退
                                    <input checked="checked" v-model="application_status" value="10" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="common-radio">選考終了・離脱
                                    <input checked="checked" v-model="application_status" value="11" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                              </div>
                          </div>
                          </dd>
                        </dl>
                      </li>
                  </ul>
            </div>
            <div class="modal-footer">
                <div class="col">
                  <a href="#" class="c-m-button c-m-button--primary popup-close-open"  class="close" data-dismiss="modal" @click.prevent="changeStatus()">Save</a>
                </div>
            </div>
        </div>
    </div>
  </div>
 
  <div class="make-scrollable footer-included page-popup-style-1-container" id="new-search-popup">
        <div class="page-popup-style-1">
            <div class="page-popup-style-1-header">
                <h3>選考データの絞り込み</h3>
                <span class="search-popup-dismiss" data-popup_close = "#new-search-popup">&times;</span>
            </div>
            <div class="search-popup-container">
                <div class="search-popup-body">
                    <div class="search-popup-row d-flex f-d-column">
                        <label for="" class="font-style-1">会員番号</label>
                        <input type="text" name="" class="search-popup-text-input make-full-width disable-theme" maxlength="8">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-popup-style-1-footer">
            <div class="d-flex-no-important al-items-center">
                <a href="#" class="font-style-1 link-style-1">条件をクリア</a>
                <input type="submit" name="" value="絞り込む" class="auto-full-width-button">
            </div>
        </div>
    </div>

