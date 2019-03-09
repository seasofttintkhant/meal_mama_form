<div class="main-content-register" v-if="step === 2">
            <div class="main-form-guide text-center">
                <div class="space"></div>
                <p class="card-fw-bold">求人掲載を申し込みいただき、ありがとうございます。<br>最短で掲載を開始するために、以下の詳細情報を入力してください。</p>
                <p class="card-fw-normal">＊入力内容が不足している場合、お電話にて確認をとらせていただく必要があります。</p>
            </div>
            <div class="space"></div>
            <div class="register-form">
                <div class="register-title">
                    <p>お申し込みフォーム</p>
                </div>
                <form method="POST" >
                {{csrf_field()}}
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
                                    <input type="text" value="" name="zip_code" v-model="zip_code" v-bind:class="{'definition-txt-error' : errors.zip_code}" class="definition-text-field" placeholder="1060032" maxlength="20">
                                    
                                </div>
                                <div class="definition-input-right">
                                    <span><button type="button" class="zip-btn card-fw-bold" @click.prevent="fetchAddress">郵便番号から住所を検索</button></span>
                                </div>
                                <span class="definition-txt-alert" v-if="errors.zip_code" :errors="errors">
                                        @{{ errors.zip_code[0] }}
                                </span>
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
                                    <select name="prefecture_id" v-model="prefecture_id" id="prefecture_id" @change.prevent="getCities(prefecture_id)" v-bind:class="{'definition-txt-error' : errors.prefecture_id}" class="card-selectbox-select">
                                        <option value="">選択する</option>
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
                                    <select name="city_id" v-model="city_id" id="city_id" v-bind:class="{'definition-txt-error' : errors.city_id}" class="card-selectbox-select">
                                        <option value="">選択する</option>
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
                                    <input type="text" value="" name="street_address" v-model="street_address" v-bind:class="{'definition-txt-error' : errors.street_address}" class="definition-text-field" placeholder="番地" maxlength="100">
                                    <span class="definition-txt-alert" v-if="errors.street_address" :errors="errors">
                                            @{{ errors.street_address[0] }}
                                    </span>
                                </dd>
                            </dl>
                        </li>
                        <li class="definition-table-item">
                            <dl class="dl-definition-table">
                                <dt class="definition-table-head">																	
                                    <span class="definition-head-item">
                                        <span class="definition-head-item ">建物名</span>
                                    </span>
                                </dt>
                                <dd class="definition-table-body">
                                    <input type="text" value="" name="building" v-model="building" v-bind:class="{'definition-txt-error' : errors.building}" class="definition-text-field" placeholder="建物名" maxlength="100">
                                    <span class="definition-txt-alert" v-if="errors.building" :errors="errors">
                                            @{{ errors.building[0] }}
                                    </span>
                                </dd>
                            </dl>
                        </li>
                        <li class="definition-table-item">
                            <dl class="dl-definition-table">
                                <dt class="definition-table-head">
                                    <span class="definition-head-item">
                                        <span class="definition-head-item ">FAX番号</span>
                                    </span>
                                </dt>
                                <dd class="definition-table-body">
                                    <input type="text" value="" name="fax" v-model="fax" v-bind:class="{'definition-txt-error' : errors.fax}" class="definition-text-field" placeholder="0123456789" maxlength="100">
                                    <span class="definition-txt-alert" v-if="errors.fax" :errors="errors">
                                            @{{ errors.fax[0] }}
                                    </span>
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
                                    <span class="definition-head-item definition-head-item-left">パスワード
                                    </span>
                                </dt>
                                <dd class="definition-table-body">
                                    <input type="password" value="" name="password" v-model="password" v-bind:class="{'definition-txt-error' : errors.password}" class="definition-text-field" placeholder="半角英数8文字以上" maxlength="100">
                                    <span class="definition-txt-alert" v-if="errors.password" :errors="errors">
                                            @{{ errors.password[0] }}
                                    </span>
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
                                    <span class="definition-head-item definition-head-item-left">パスワード（確認）
                                    </span>
                                </dt>
                                <dd class="definition-table-body">
                                    <input type="password" value="" name="c_password" v-model="c_password" v-bind:class="{'definition-txt-error' : errors.c_password}" class="definition-text-field" placeholder="パスワードを再入力してください" maxlength="100">
                                    <span class="definition-txt-alert" v-if="errors.c_password" :errors="errors">
                                            @{{ errors.c_password[0] }}
                                    </span>
                                </dd>
                            </dl>
                        </li>
                        <li class="definition-table-item">
                            <dl class="dl-definition-table">
                                <dt class="definition-table-head">
                                    <span class="definition-head-item definition-head-item-left">写真
                                    </span>
                                </dt>
                                <dd class="definition-table-body">
                                    <h3 class="img-heading">アップロードして登録</h3>
                                    <div class="space-pd-top-md">
                                         <div id="dropzone">
                                            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                                            <input type='hidden' name='uploads_url' value="{{ url('/storage/employers') }}">
                                            <input type='hidden' name='delete_url' value="{{ url('employers/image/delete') }}">        
                                            <drop-zone :resource_type="'{!!\App\EmployerImage::ResourceEmployer!!}'"></drop-zone>                                
                                        </div> 
                                    </div>
                                </dd>
                            </dl>
                        </li>
                        <li class="definition-table-item card-input-br-btm border-no-top">
                            <dl class="dl-definition-table">
                                <dt class="definition-table-head">
                                    <span class="definition-head-item definition-head-item-left">
                                    </span>
                                </dt>
                                <dd class="definition-table-body">
                                    <span class="definition-txt-alert card-fw-normal">※JPG、PNG、GIF形式の画像ファイルが登録できます<br>※1ファイルあたり最大10MBのファイルが登録できます<br>※横1200px 縦675px以上の画像の登録を推奨しています</span>
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
                                        <span class="c-alert">
                                            <span class="definition-txt-alert-red card-fw-bold">写真がない求人より3倍ほど応募が集まる傾向にあります。</span>
                                        </span><br>できるだけ多くの写真を登録されることをおすすめいたします。
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                        </li>

                    </ul>
                    <div class="space"></div>
                    <div class="register-btn-group text-center">
                        <button type="submit" class="register-btn space-pd-20" @click="handleSubmit">利用規約に同意して申し込む</button>
                        <div class="space"></div>
                        <a class="" target="blank" href="/rule">利用規約はこちら<i class="fa fa-clipboard" aria-hidden="true"></i>
                        </a>
                    </div><!-- .register-btn -->
            </form>
            <div class="space"></div>
        </div><!-- .register-form -->
    </div><!-- .main-content-register -->
    <!-- Step 2 -->