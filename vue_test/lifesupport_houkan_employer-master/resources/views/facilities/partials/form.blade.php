<div class="content" id="app" v-cloak>
    <div class="space"></div>
    <div class="card h-card h-p-30">
        <h2 class="fac-new-heading card-fw-bold">新規施設の登録</h2>
        <div class="space"></div>
        <form>
            <ul class="definition-table">
                <li class="definition-table-item">
                <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                    <span class="definition-head-item">
                        <span class="definition-label-red">必須
                        </span>
                    </span>
                    <span class="definition-head-item definition-head-item-left">施設の業種・形態
                    </span>
                    </dt>
                    <dd class="definition-table-body e-fac-new-left">
                    <div class="card-option">
                    <label class="card-selectbox">
                        <select name="facility_category_id" id="facility_category_id" v-model="facility_category_id" v-bind:class="{'definition-txt-error' : errors.facility_category_id}" class="card-selectbox-select" @change="getServiceTypes(facility_category_id,true)">
                        <option value="" selected="selected">指定なし</option>
                        @foreach($facilityCategories as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                        </select>
                    <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                    </span>
                    </label>
                    </div>
                    
                    </dd>
                    <dd class="e-fac-new-right" style="display:none;"> 
                        <div>
                        <a href="#" class="fac-new-link">＋ 登録済みの施設をコピーして作成</a>
                        </div>
                    </dd>
                </dl>
                </li>
                <li class="definition-table-item" v-if="showbody">
                <dl class="dl-definition-table ">
                    <dt class="definition-table-head">
                    <span class="definition-head-item definition-head-item-left">写真 
                    </span>
                    </dt>
                    <dd class="definition-table-body e-fac-new-left">
                    <div id="dropzone">
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                        <input type='hidden' name='employer_id' value='{{ auth()->user()->id }}'>
                        <input type='hidden' name='uploads_url' value="{{ url('/storage/employers') }}">
                        <input type='hidden' name='delete_url' value="{{ url('employers/image/delete') }}">
                        <drop-zone :resource_type="'{!!\App\EmployerImage::ResourceFacility!!}'"></drop-zone>                            
                    </div> 
                    </dd>
                    <dd class="e-fac-new-right"> 
                    <div class="space"></div>
                    <div>
                        <span><button type="button" class="registering-btn card-fw-bold" data-toggle="modal" data-target="#showUploadedImages" @click.prevent="fetchPopupPhotos">写真管理から<br>選んで登録す</button></span>
                        <p class="space-pd-top-sm registering-txt">写真管理へ既にアップロードしている写真の中から登録することができます。</p>
                    </div>
                </dd>
                </dl>
                </li>
                <li class="definition-table-item" v-if="showbody">
                <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                    <span class="definition-head-item definition-head-item-left">
                    </span>
                    </dt>
                    <dd class="definition-table-body">
                        <span class="definition-txt-alert card-fw-normal">※JPG、PNG、GIF形式の画像ファイルが登録できます<br>※1ファイルあたり最大10MBのファイルが登録できます<br>※横1200px 縦675px以上の画像の登録を推奨しています</span>
                            {{-- <div class="space-pd-top-sm">
                                登録した画像をドラッグ&ドロップし、画像の表示順を並び替えることができます
                            </div> --}}
                          <div class="space-pd-top-sm">
                            <div class="card-sort-list clearfix">
                              <div class="card-sort-list-item" v-for="image in images">
                                    <div class="card-gallery-inner">
                                        <figure class="card-upload-image">
                                            <div class="thumb">
                                            <img class="img-thumbnail" :src="image.path">
                                            <div class="card-overlay">  
                                                <div class="card-overlay-inner">
                                                <ul class="card-inline-list">
                                                    <li class="card-inline-item">
                                                    <a class="card-link thumbnail" href="#" data-target="#image-gallery" data-image-id="" data-toggle="modal" :v-bind:title="image.description" @click.prevent = "getImage(image.id)">編集する</a>
                                                    </li>
                                                    <li class="card-inline-item">
                                                    <a class="card-link card-link-alert" href="#" @click.prevent="deleteImage(image.id)">削除する</a></li>
                                                </ul>
                                                </div>
                                            </div>
                                            </div>
                                        </figure>
                                            <div class="desc space-pd-5" v-if = "image.description">
                                            @{{image.description}}
                                            </div>
                                            <div class="card-alert">
                                            <div class="card-xs-small-short space-pd-5" v-if = "!image.recommended_size">推奨サイズ以上の写真を登録すると、よりきれいに表示することができます</div>
                                        </div> 
                                </div>
                              </div><!-- .card-sort-list-item -->
                          </div>
                        <div class="card-filter-box text-center">
                    <div class="card-photo-text card-fw-bold">
                    1. 外観　2. 内観　3. スタッフの集合写真　4. 設備・機材
                    </div>
                    <div class="space-pd-top-sm">
                    この4枚以上が揃っている求人は、
                    <span class="card-alert">
                    <span class="definition-txt-alert-red card-fw-bold">写真がない求人より3倍ほど応募が集まる傾向にあります。</span>
                    </span><br>できるだけ多くの写真を登録されることをおすすめいたします。</div>
    
                </div>
                    </dd>
                </dl>
                </li>
                <li class="definition-table-item card-input-br-btm" v-if="showbody">
                <dl class="dl-definition-table">
                    <dt class="definition-table-head">
                    <span class="definition-head-item">
                    </span>
                    <span class="definition-head-item definition-head-item-left">職場の環境
                    </span>
                    </dt>
                    <dd class="definition-table-body">
                    <div class="space-pd-btm-sm">
                        <div class="rating-checkbox grid-checkbox clearfix">
                        <label class="grid-checkbox-label">
                        <input type="checkbox" value="0" name="work_environment_checked" v-model="work_environment_checked" @change="environmentQuestions" class="grid-checkbox-input">
                        <span class="checkmark"></span>
                        <span class="checkmark-text">職場の環境を入力する</span>
                        </label>
    
                        </div> 
                        <div class="" v-bind:class="{'questions_disabled' : !work_environment_checked}"> <!--section-opacity-disabled -->
                            <div class="card-rating-box">
                            <span class="card-rating-caption card-rating-cp-left">
                                
                            </span>
                            <span class="card-rating-box-item">
                                <div class="text-center card-fw-bold">とても当てはまる</div>
                            </span>
                            <span class="card-rating-box-item">
                                <div class="text-center card-fw-bold">当てはまる</div>
                            </span>
                            <span class="card-rating-box-item"><div class="u-fs-lh-x-small-short u-ta-center">どちらでもない</div></span>
                            <span class="card-rating-box-item">
                                <div class="text-center card-fw-bold">当てはまる</div>
                            </span>
                            <span class="card-rating-box-item"><div class="card-fw-bold text-center">とても当てはまる</div>
                            </span>
                            <span class="card-rating-box-caption-right">
                            </span>
                            </div><!-- .card-rating-box -->
                            <div class="card-rating-box">
                            <span class="card-rating-caption card-rating-cp-left space-pd-top-sm">若手多い</span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="1" v-model="question_1" name="question_1" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                                </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="2" v-model="question_1" name="question_1" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                                </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="3" v-model="question_1" name="question_1" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                                </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="4" v-model="question_1" name="question_1" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                                </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="5" v-model="question_1" name="question_1" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                                </label>
                            </span>
                            <span class="card-rating-caption card-rating-cp-right space-pd-top-sm">ベテラン多い</span>
                            </div><!-- .card-rating-box -->
                            <div class="card-rating-box">
                            <span class="card-rating-caption card-rating-cp-left space-pd-top-sm">
                            男性多い</span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="1" v-model="question_2" name="question_2" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="2" v-model="question_2" name="question_2" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="3" v-model="question_2" name="question_2" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="4" v-model="question_2" name="question_2" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="5" v-model="question_2" name="question_2" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-caption card-rating-cp-right space-pd-top-sm">女性多い</span>
                            </div><!-- .card-rating-box -->
                            <div class="card-rating-box">
                            <span class="card-rating-caption card-rating-cp-left space-pd-top-sm">
                            活気がある</span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="1" v-model="question_3" name="question_3" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="2s" v-model="question_3" name="question_3" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="3" v-model="question_3" name="question_3" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="4" v-model="question_3" name="question_3" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="5" v-model="question_3" name="question_3" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-caption card-rating-cp-right space-pd-top-sm">落ち着いている</span>
                            </div><!-- .card-rating-box -->
                            <div class="card-rating-box">
                            <span class="card-rating-caption card-rating-cp-left space-pd-top-sm">
                            柔軟な社風</span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="1" v-model="question_4" name="question_4" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="2" v-model="question_4" name="question_4" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="3" v-model="question_4" name="question_4" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="4" v-model="question_4" name="question_4" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="5" v-model="question_4" name="question_4" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-caption card-rating-cp-right space-pd-top-sm">堅実な社風</span>
                            </div><!-- .card-rating-box -->
                            <div class="card-rating-box">
                            <span class="card-rating-caption card-rating-cp-left space-pd-top-sm">
                            育成重視</span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="1" v-model="question_5" name="question_5" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="2" v-model="question_5" name="question_5" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="3" v-model="question_5" name="question_5" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="4" v-model="question_5" name="question_5" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="5" v-model="question_5" name="question_5" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-caption card-rating-cp-right space-pd-top-sm">即戦力重視</span>
                            </div><!-- .card-rating-box -->
                            <div class="card-rating-box">
                            <span class="card-rating-caption card-rating-cp-left space-pd-top-sm">
                            柔軟な勤務スタイル</span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="1" v-model="question_6" name="question_6" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="2" v-model="question_6" name="question_6" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="3" v-model="question_6" name="question_6" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="4" v-model="question_6" name="question_6" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-box-item">
                                <label class="common-radio">
                                <input type="radio" checked="checked" value="5" v-model="question_6" name="question_6" :disabled="!work_environment_checked">
                                <span class="checkmark"></span>
                            </label>
                            </span>
                            <span class="card-rating-caption card-rating-cp-right space-pd-top-sm">勤務時間できっちり</span>
                            </div><!-- .card-rating-box -->
                        </div>
                    </div>
                    </dd>
                </dl>
                </li>
            </ul>
        </form>
        <div v-if="showbody">
            <div class="space"></div>
            <h2 class="fac-new-heading card-fw-bold">施設の基本情報
                <a href="#" class="card-fw-normal" title="">契約情報をもとに自動入力</a>
            </h2>
            <div class="space"></div>
            <form method="POST" >
                <ul class="definition-table">
                    <li class="definition-table-item ">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item">
                        </span>
                        <span class="definition-head-item definition-head-item-left">診療科目・サービス形態    
    
                        </span>
                        </dt>
                        <dd class="definition-table-body e-fac-new-left">
                        <div class="space-pd-btm-sm">
                            <div class="filter-grid">
                                <div class="row" v-for="service_row in service_rows">
                                <div class="col-md-4" v-for="service_type in service_row">
                                    <div class="grid-checkbox">
                                        <label class="grid-checkbox-label">
                                        <input type="checkbox" :value="service_type.id" v-model="service_types" class="grid-checkbox-input">
                                        <span class="checkmark"></span>
                                        <span class="checkmark-text">@{{service_type.name}}</span>
                                    </label>
                                    
                                    </div>
                                </div>
                                </div><!-- .row -->
                            
        
                            </div><!-- .filter-grid -->
                        </div>
                        </dd>
                        <dd class="e-fac-new-right">
                        <div class="space"></div>
                        <span class="registering-txt">入力は必須ではありませんが、より詳しくご記入いただくと、たくさんの応募が集まる傾向にあります。</span>
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
                        <span class="definition-head-item definition-head-item-left">施設名
                        </span>
                        </dt>
                        <dd class="definition-table-body e-fac-new-left">
                        <input type="text" value="" name="name" v-model="name" v-bind:class="{'definition-txt-error' : errors.name}" class="definition-text-field" placeholder="訪看ジョブ病院" maxlength="100">
                        <span class="definition-txt-alert" v-if="errors.name" :errors="errors">
                            @{{ errors.name[0] }}
                        </span>
                        </dd>
                        <dd class="e-fac-new-right"> 
                        <div class="space-pd-top-sm">
                        <span class="registering-txt">省略せず、正式な名称をご記入ください。</span>
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
                        <span class="definition-head-item definition-head-item-left">施設名（フリガナ）
                        </span>
                        </dt>
                        <dd class="definition-table-body e-fac-new-left">
                        <input type="text" value="" name="name_kana" v-model="name_kana" v-bind:class="{'definition-txt-error' : errors.name_kana}" class="definition-text-field" placeholder="ホウカンジョブビョウイン" maxlength="100">
                        <span class="definition-txt-alert" v-if="errors.name_kana" :errors="errors">
                            @{{ errors.name_kana[0] }}
                        </span>
                        </dd>
                        <dd class="e-fac-new-right"> 
                    </dd>
                    </dl>
                    </li>
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">設立年月
                        </span>
                        </dt>
                        <dd class="definition-table-body e-fac-new-left">
                        <div class="definition-input-left e-register-left">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select name="establish_year" id="establish_year" v-model="establish_year" v-bind:class="{'definition-txt-error' : errors.establish_year}" class="card-selectbox-select" @change="getMonths">
                            <option value="">指定なし</option>
                            <option v-for="year in years" :value="year">@{{year}}</option>
                        
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                        </div>
                        </div>
                        <div class="definition-input-left e-register-center">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select name="establish_month" id="establish_month" v-model="establish_month" v-bind:class="{'definition-txt-error' : errors.establish_month}" class="card-selectbox-select" @change="getDays">
                            <option value="">指定なし</option>
                            <option v-for="(month, index) in months" :value="index">@{{month}}</option>
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                        </div>
                        </div>
                        <div class="definition-input-right e-register-right">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select name="establish_day" id="establish_day" v-model="establish_day" v-bind:class="{'definition-txt-error' : errors.establish_day}" class="card-selectbox-select">
                            <option value="">指定なし</option>
                            <option v-for="(day,index) in days" :value="index">@{{day}}</option>
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                        </div>
                        </div>
                        </dd>
                        <dd class="e-fac-new-right"></dd>
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
                        <dd class="definition-table-body e-fac-new-left">
                        <div class="definition-input-left">
                        <input type="text" value="" name="zip" v-model="zip" maxlength="7" v-bind:class="{'definition-txt-error' : errors.zip}"  class="definition-text-field p-postal-code" placeholder="郵便番号" maxlength="20">
                        
                        </div>
                        <div class="definition-input-right">
                        <span><button type="button" class="zip-btn card-fw-bold" @click.prevent="fetchAddress" >郵便番号から住所を検索</button></span>
                        </div>
                        <span class="definition-txt-alert" v-if="errors.zip" :errors="errors">
                        @{{ errors.zip[0] }}
                        </span>
            
                        </dd>
                        <dd class="e-fac-new-right"></dd>
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
                        <dd class="definition-table-body e-fac-new-left">
                        <div class="definition-input-left e-input-left">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select id="prefecture_id" v-model="prefecture_id" @change.prevent="getCities(prefecture_id)" v-bind:class="{'definition-txt-error' : errors.prefecture_id}" class="p-region card-selectbox-select">
                            <option value="">指定なし</option>
                            <option v-for="prefecture in prefectures" :value="prefecture.id">@{{prefecture.name}}</option>      
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                        </div>
                        </div>
                        <div class="definition-input-right e-input-right">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select id="city_id" v-model="city_id" v-bind:class="{'definition-txt-error' : errors.city_id}" class="p-region card-selectbox-select">
                            <option value="">指定なし</option>
                            <option v-for="city in cities" :value="city.id">@{{city.name}}</option>      
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                        </div>
                        </div>
                        <span class="definition-txt-alert" v-if="errors.prefecture_id" :errors="errors">
                        @{{ errors.prefecture_id[0] }}
                        </span>
                        <span class="definition-txt-alert" v-if="errors.city_id" :errors="errors">
                        @{{ errors.city_id[0] }}
                        </span>
                        </dd>
                        <dd class="e-fac-new-righta"></dd>
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
                        <dd class="definition-table-body e-fac-new-left">
                        <input type="text" value="" name="street_address" v-model="street_address" v-bind:class="{'definition-txt-error' : errors.street_address}" class="definition-text-field" placeholder="番地" maxlength="100">
                        <span class="definition-txt-alert" v-if="errors.street_address" :errors="errors">
                            @{{ errors.street_address[0] }}
                        </span>
                        </dd>
                        <dd class="e-fac-new-right"></dd>
                    </dl>
                    </li>
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">建物名
                        </span>
                        </dt>
                        <dd class="definition-table-body e-fac-new-left">
                        <input type="text" value="" name="building" v-model="building" v-bind:class="{'definition-txt-error' : errors.building}" class="definition-text-field" placeholder="建物名" maxlength="100">
                        <span class="definition-txt-alert" v-if="errors.building" :errors="errors">
                            @{{ errors.building[0] }}
                        </span>
                        </dd>
                        <dd class="e-fac-new-right"></dd>
                    </dl>
                    </li>
                    <li class="definition-table-item">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item">
        
                            <span class="definition-label-red">必須
                            </span>
                        </span>
                        <span class="definition-head-item definition-head-item-left">施設へのアクセス
                        </span>
                        </dt>
                        <dd class="definition-table-body e-fac-new-left">
                        <textarea name="access" v-model="access" v-bind:class="{'definition-txt-error' : errors.access}" class="card-textarea space-mt-10" placeholder="日比谷線六本木駅から徒歩2分" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                        <span class="definition-txt-alert" v-if="errors.access" :errors="errors">
                            @{{ errors.access[0] }}
                        </span>
                        </dd>
                        <dd class="e-fac-new-right"></dd>
                    </dl>
                    </li>
                    <li class="definition-table-item card-input-br-btm">
                    <dl class="dl-definition-table">
                        <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">地図の詳細調整
                        </span>
                        </dt>
                        <dd class="definition-table-body e-fac-new-left">
                        <div>
                            <p>ピンを移動して所在地に合わせてください。<br>緯度・経度の情報が保存され、地図情報として公開されます。 </p>
                        </div>
                        <div>
                           {{-- <img class="img-fluid" src="/img/map.png" alt=""> --}}
                           <google-map :lat="lat" :lng="lng" ref="map"></google-map>
                        </div>
                        </dd>
                    
                        <dd class="e-fac-new-right">
                        <div class="space-pd-top-sm">
                            <span class="registering-txt">住所をもとに自動でピンを合わせていますが、ピンの位置が大幅にずれることがあります。<br>ピンをドラッグ・ドロップして正確な位置を指し示すようにしてください。</span>
                        </div>
                        </dd>
                    </dl>
                    </li>
                    
                </ul>
            </form>
        
            <div class="space"></div>
            <h2 class="fac-new-heading card-fw-bold">施設の詳細情報</h2>
            @include('facilities.partials.hospital')
            @include('facilities.partials.clinic')
            @include('facilities.partials.dental_clinic')
            @include('facilities.partials.relaxation')
            @include('facilities.partials.nursing_welfare')
            @include('facilities.partials.nursery_school')
            @include('facilities.partials.pharmacy_store')
            @include('facilities.partials.nursing_station')
          
            <div class="h-p-30">
                <div class="row" v-if="showbody">
                <table class="btn-table">
                    <tbody class="btn-table-body">
                    <tr>
                        {{-- <td class="btn-table-item">
                        <button type="button" class="tbl-btn-grey" @click="preview">プレビュー</button> 
                        <div class="tex-center">
                            <div class="tbl-alert-item">
                            <div class="tbl-alert-text card-fw-bold">仕上がりを確認しましょう！
                            </div>
                            </div>
                        </div>
                        </td> --}}
                        <td class="btn-table-item card-bdr-left">
                        @if($edit)
                        <button type="submit" class="tbl-btn-blue" @click.prevent="handleSubmit(facility_id)">この内容で施設を登録する</button>
                        @else
                        <button type="submit" class="tbl-btn-blue" @click.prevent="handleSubmit">この内容で施設を登録する</button>
                        @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div><!-- .card -->
     @include("image_managers.popup")
    <div class="space"></div>
    

</div><!-- .content -->


