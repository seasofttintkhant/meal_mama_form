@extends('layouts.modeswitch_app')

@section('content')
<div class="content">
  <main class="main-with-sidebar">
    <div class="space"></div>
    <div class="card h-card h-p-30">
      <div class="h-border-buttom">
        <div class="d-flex justify-content-between space-pd-btm-md">
            <span><strong>お知らせメール</strong></span>
        </div>
      </div>
      <div class="space"></div>
      <form>
        <ul class="definition-table">
          <li class="definition-table-item">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">
                    <span>保存した検索条件に<br>合致する求職者が<br>登録された時のお知らせ</span>
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <div class="card-small-short space-pd-btm-sm">
                    <span class="common-box-left">
                      <label class="common-radio">受信する
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <span class="common-box-right">
                      <label class="common-radio">受信しない
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <div class="card-small-short space-pd-btm-sm "> 
                   ※この設定を「受信する」にすると、<a class="card-link" href="#">求職者検索画面</a>でお知らせメールの受信設定を検索条件ごとに設定できるようになります
                    </div>
                  </div>
                </dd>
              </dl>
            </li>
            <li class="definition-table-item card-input-br-btm">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">
                    <span>掲載中求人の条件に<br>合致する求職者が<br>登録された時のお知らせ</span>
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <div class="card-small-short space-pd-btm-sm">
                    <span class="common-box-left">
                      <label class="common-radio">受信する
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <span class="common-box-right">
                      <label class="common-radio">受信しない
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <div class="card-small-short space-pd-btm-sm "> 
                   ※この設定を「受信する」にすると、<a class="card-link" href="#">求職者検索画面</a>でお知らせメールの受信設定を検索条件ごとに設定できるようになります
                    </div>
                  </div>
                </dd>             
              </dl>
            </li>
            <li class="definition-table-item card-input-br-btm">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">
                    <span>求人の掲載申請に関する<br>お知らせ</span>
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <div class="card-small-short space-pd-btm-sm">
                    <span class="common-box-left">
                      <label class="common-radio">受信する
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <span class="common-box-right">
                      <label class="common-radio">受信しない
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                  </div>
                </dd>             
              </dl>
            </li>
            <li class="definition-table-item card-input-br-btm">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">
                   <span>求人の掲載開始に関する<br>お知らせ</span>
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <div class="card-small-short space-pd-btm-sm">
                    <span class="common-box-left">
                      <label class="common-radio">受信する
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <span class="common-box-right">
                      <label class="common-radio">受信しない
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                  </div>
                </dd>             
              </dl>
            </li>
            <li class="definition-table-item card-input-br-btm">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">
                    <span>1ヶ月間更新のない求人が<br>ある時のお知らせ</span>
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <div class="card-small-short space-pd-btm-sm">
                    <span class="common-box-left">
                      <label class="common-radio">受信する
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <span class="common-box-right">
                      <label class="common-radio">受信しない
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                      </label>
                    </span>
                    <div class="card-small-short space-pd-btm-sm "> 
                    ※「受信しない」にした場合、1ヶ月間更新がなくても募集は継続しているものとし、求人の更新日時を最新にいたします
                    </div>
                  </div>
                </dd>             
              </dl>
            </li>
        </ul><!-- .definition-table -->
        <div class="space"></div>
        <div class="space-mt-auto text-center">
          <button type="submit" class="card-wd-230 card-medium-short card-fw-bold blue-btn">受信設定を変更する</button>
        </div>
      </form>
    </div><!-- .card -->
    <div class="space"></div>
    <div class="space"></div>

  </main>
</div>
@endsection
