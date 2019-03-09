@extends('layouts.modeswitch_app')

@section('content')
<div class="content">
  <main class="main-with-sidebar">
    <div class="space"></div>
    <div class="card h-card h-p-30">
      <div class="h-border-buttom">
        <div class="d-flex justify-content-between space-pd-btm-md">
            <span><strong>原稿作成モード</strong></span>
        </div>
      </div>
      <div class="space"></div>
      @if(\Session::has('success'))
      <div class="alert alert-success">
              <ul>
                  <li>{!! \Session::get('success') !!}</li>
              </ul>
          </div>
      @endif 
      <form>
        {{ csrf_field() }}
        <div class="part-1">
          <div>
            <h2 class="card-medium-title-short space-pd-top-sm card-fw-bold">基本情報</h2>
          </div>
            <ul class="definition-table">
              <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">法人名・貴社名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div>{{$current_employer->name}}</div>
                      <div class="card-small-short space-pd-btm-sm card-font-grey"> 
                        ※法人名・貴社名を変更する場合は、訪看ジョブ運営事務局までお問い合わせください
                      </div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">法人名・貴社名(フリガナ)
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div>{{$current_employer->name_kana}}</div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">郵便番号
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div class="definition-input-left">
                      <input type="text" value="{{$current_employer->zip_code}}" name="zip_code" class="definition-text-field" placeholder="1060032" maxlength="7">
                      
                    </div>
                    <div class="definition-input-right">
                      <span><button type="button" class="zip-btn card-fw-bold" id="fetch-address">郵便番号から住所を検索</button></span>
                    </div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">都道府県・市区町村
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                       <div class="definition-input-left e-input-left">
                      <div class="card-option">
                      <label class="card-selectbox">
                      <select name="prefecture_id" id="prefectures" class="card-selectbox-select">
                        @foreach(config("custom.prefectures") as $key => $prefecture)
                        <option value="{{$key}}" {{ $current_employer->prefecture_id == $key ? 'selected' : ''}}>{{$prefecture}}</option>
                        @endforeach
                      </select>
                      <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                      </span>
                      </label>
                    </div>
                    </div>
                    <div class="definition-input-right e-input-right">
                      <div class="card-option">
                      <label class="card-selectbox">
                      <select name="city_id" id="city_id" class="card-selectbox-select">

                      </select>
                      <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                      </span>
                      </label>
                    </div>
                    </div>
                    <span class="definition-txt-alert">都道府県を選択してください</span>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">町名・番地
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->street_address}}" name="street_address" class="definition-text-field" placeholder="番地" maxlength="100">
                      @if ($errors->has('street_address'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('street_address') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">担当者氏名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->building}}" name="building" class="definition-text-field" placeholder="建物名" maxlength="100">
                      @if ($errors->has('building'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('building') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">建物名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div class="definition-input-left">
                        <input type="text" value="{{$current_employer->in_charge_first_name}}" name="in_charge_first_name" class="definition-text-field" placeholder="山田" maxlength="100">
                        @if ($errors->has('in_charge_first_name'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_first_name') }}</strong></span>
                        </span>
                        @endif
                      </div>
                      <div class="definition-input-right">
                        <input value="{{$current_employer->in_charge_last_name}}" name="in_charge_last_name" class="definition-text-field " placeholder="太郎" maxlength="100" type="text">
                        @if ($errors->has('in_charge_last_name'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_last_name') }}</strong></span>
                        </span>
                        @endif
                      </div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">担当者氏名(フリガナ)
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div class="definition-input-left">
                        <input type="text" value="{{$current_employer->in_charge_first_name_kana}}" name="in_charge_first_name_kana" class="definition-text-field" placeholder="ヤマダ" maxlength="100">
                        @if ($errors->has('in_charge_first_name_kana'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_first_name_kana') }}</strong></span>
                        </span>
                        @endif
                      </div>
                      <div class="definition-input-right">
                        <input value="{{$current_employer->in_charge_last_name_kana}}" name="in_charge_last_name_kana" class="definition-text-field " placeholder="タロウ" maxlength="100" type="text">
                        @if ($errors->has('in_charge_last_name_kana'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_last_name_kana') }}</strong></span>
                        </span>
                        @endif
                      </div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">当者所属部署名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->in_charge_post}}" name="in_charge_post" class="definition-text-field" placeholder="" maxlength="100">
                      @if ($errors->has('in_charge_post'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_post') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">担当者役職名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->in_charge_position}}" name="in_charge_position" class="definition-text-field" placeholder="" maxlength="100">
                      @if ($errors->has('in_charge_position'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_position') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">電話番号
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->phonenumber}}" name="phonenumber" class="definition-text-field" placeholder="0123456789" maxlength="">
                      @if ($errors->has('phonenumber'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('phonenumber') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item card-input-br-btm">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">FAX番号
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->fax}}" name="fax" class="definition-text-field" placeholder="0123456789" maxlength="100">
                      @if ($errors->has('fax'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('fax') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
            </ul>
        </div>
        <div class="part-2">
          <div>
            <h2 class="card-medium-title-short space-pd-top-sm card-fw-bold">ご請求先情報</h2>
          </div>
            <a href="#">＋ ご連絡先と費用のご請求先が異なる場合のみこちらから設定ください</a>
            <div class="space"></div>
            <ul class="definition-table">
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">郵便番号
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div class="definition-input-left">
                      <input type="text" value="{{$current_employer->zip_code}}" name="zip_code" class="definition-text-field" placeholder="1060032" maxlength="7">
                      
                    </div>
                    <div class="definition-input-right">
                      <span><button type="button" class="zip-btn card-fw-bold">郵便番号から住所を検索</button></span>
                    </div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">都道府県・市区町村
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                       <div class="definition-input-left e-input-left">
                      <div class="card-option">
                      <label class="card-selectbox">
                      <select name="prefecture_id" id="prefectures" class="card-selectbox-select">
                        @foreach(config("custom.prefectures") as $key => $prefecture)
                        <option value="{{$key}}" {{ $current_employer->prefecture_id == $key ? 'selected' : ''}}>{{$prefecture}}</option>
                        @endforeach
                      </select>
                      <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                      </span>
                      </label>
                    </div>
                    </div>
                    <div class="definition-input-right e-input-right">
                      <div class="card-option">
                      <label class="card-selectbox">
                      <select name="city_id" id="cities" class="card-selectbox-select">
                        <option value="111112">市区町村</option>
                        <option value="111113">北海道</option>
                        <option value="111114">青森県</option>
                      </select>
                      <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                      </span>
                      </label>
                    </div>
                    </div>
                    <span class="definition-txt-alert">都道府県を選択してください</span>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">町名・番地
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->street_address}}" name="street_address" class="definition-text-field" placeholder="番地" maxlength="100">
                      @if ($errors->has('street_address'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('street_address') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">担当者氏名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->building}}" name="building" class="definition-text-field" placeholder="建物名" maxlength="100">
                      @if ($errors->has('building'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('building') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">建物名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div class="definition-input-left">
                        <input type="text" value="{{$current_employer->in_charge_first_name}}" name="in_charge_first_name" class="definition-text-field" placeholder="山田" maxlength="100">
                        @if ($errors->has('in_charge_first_name'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_first_name') }}</strong></span>
                        </span>
                        @endif
                      </div>
                      <div class="definition-input-right">
                        <input value="{{$current_employer->in_charge_last_name}}" name="in_charge_last_name" class="definition-text-field " placeholder="太郎" maxlength="100" type="text">
                        @if ($errors->has('in_charge_last_name'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_last_name') }}</strong></span>
                        </span>
                        @endif
                      </div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">担当者氏名(フリガナ)
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <div class="definition-input-left">
                        <input type="text" value="{{$current_employer->in_charge_first_name_kana}}" name="in_charge_first_name_kana" class="definition-text-field" placeholder="ヤマダ" maxlength="100">
                        @if ($errors->has('in_charge_first_name_kana'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_first_name_kana') }}</strong></span>
                        </span>
                        @endif
                      </div>
                      <div class="definition-input-right">
                        <input value="{{$current_employer->in_charge_last_name_kana}}" name="in_charge_last_name_kana" class="definition-text-field " placeholder="タロウ" maxlength="100" type="text">
                        @if ($errors->has('in_charge_last_name_kana'))
                        <span class="help-block">
                            <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_last_name_kana') }}</strong></span>
                        </span>
                        @endif
                      </div>
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">当者所属部署名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->in_charge_post}}" name="in_charge_post" class="definition-text-field" placeholder="" maxlength="100">
                      @if ($errors->has('in_charge_post'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_post') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">担当者役職名
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->in_charge_position}}" name="in_charge_position" class="definition-text-field" placeholder="" maxlength="100">
                      @if ($errors->has('in_charge_position'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('in_charge_position') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                      </span>
                      <span class="definition-head-item definition-head-item-left">電話番号
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->phonenumber}}" name="phonenumber" class="definition-text-field" placeholder="0123456789" maxlength="">
                      @if ($errors->has('phonenumber'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('phonenumber') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
                <li class="definition-table-item card-input-br-btm">
                  <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                      <span class="definition-head-item">
                      </span>
                      <span class="definition-head-item definition-head-item-left card-pl-none">FAX番号
                      </span>
                    </dt>
                    <dd class="definition-table-body">
                      <input type="text" value="{{$current_employer->fax}}" name="fax" class="definition-text-field" placeholder="0123456789" maxlength="100">
                      @if ($errors->has('fax'))
                      <span class="help-block">
                          <span class="definition-txt-alert"><strong>{{ $errors->first('fax') }}</strong></span>
                      </span>
                      @endif
                    </dd>
                  </dl>
                </li>
            </ul>
            <a href="#" >
              <span>ー 請求先が同じなので削除する</span>
            </a>
        </div>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space-mt-auto text-center">
          <button type="submit" class="card-wd-320 card-medium-short card-fw-bold blue-btn">上記の内容で情報を保存する</button>
        </div>
      </form>
    </div><!-- .card -->
    <div class="space"></div>
    <div class="space"></div>
  </main>
</div>
@endsection
@push('customjs')
<script>
  var prefix = ""
  $(document).ready(function(){
    $('#fetch-address').click(function(e){
      e.preventDefault();
      getAddress();
    });

    $('#fetch-billing-address').click(function(e){
      e.preventDefault();
       getAddress('billing');
    });

    $('#show-billing-form').click(function(){
      $('#billing-form').show();
    });
    $('#remove-billing-form').click(function(){
      $('#billing-form').hide();
      this.find('input:text, input:password, input:file, select, textarea').val('');
      this.find('input:radio, input:checkbox')
          .removeAttr('checked').removeAttr('selected');
    });

  });

  function resetForm($form) {

  }
  function getAddress(prefix){
    var zip_code_el = 'zip_code';
    var prefecture_id_el = 'prefecture_id';
    var city_id_el = 'city_id';
    var street_address_el = 'stree_address';

    if(prefix != "")
    {
      prefecture_id = prefix+'_'+zip_code_el;
      city_id = prefix+'_'+city_id_el;
      street_address_id = prefix+'_'+street_address_el;
      zip_code_el = prefix+'_'+zip_code_el;
    }
    var zip_code = $(zip_code_el).val();

    $.get("http://zipcloud.ibsnet.co.jp/api/search?zipcode=", function( data ) {
          if(data.results !== null){
              var result = data.results[0]
              getCities(result.prefcode,city_id_el);
              var city_id =getCityId(result.address2);
              $(city_id_el).val(city_id)
              $(street_address_el) = result.address3;
          }
      });
  }

  function getCities(prefecture_id,el){
          fetch('/api/'+prefecture_id+'/cities')
          .then(res => res.json())
          .then(res => {
             $(el).html();
          })
      }

  function getCityId(name,el){
    fetch('/members/api/city_id?name='+name)
          .then(res => res.json())
          .then(res => {
              this.city_id= res.city_id
          })
    }
</script>

@endpush
