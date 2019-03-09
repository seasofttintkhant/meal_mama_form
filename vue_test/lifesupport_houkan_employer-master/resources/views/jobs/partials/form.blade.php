<div class="content" id="app" v-cloak>
        <div class="space"></div>
        <div class="card h-card h-p-30">
            <h2 class="fac-new-heading card-fw-bold">新規求人の登録 - {{$facility->name}}</h2>
            <div class="space"></div>
            <form method="POST" >
                <ul class="definition-table">
                  <li class="definition-table-item">
                    <dl class="dl-definition-table">
                      <dt class="definition-table-head">
                        <span class="definition-head-item">
                          <span class="definition-label-red">必須
                          </span>
                        </span>
                        <span class="definition-head-item definition-head-item-left">職種
                        </span>
                      </dt>
                      <dd class="definition-table-body">
                        <div class="card-option">
                        <label class="card-selectbox">
                        <select name="job_category_id" id="job_category_id" class="card-selectbox-select" v-model="job_category_id" @change.prevent="getFeatures(job_category_id)" {{($edit == true) ? 'disabled' : ''}}>
                          <option value="">指定なし</option>
                          @foreach($jobCategories as $jobCategory)
                          <option value="{{$jobCategory->id}}">{{$jobCategory->name}}</option>
                          @endforeach
                         
                        </select>
                        <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
                        </span>
                        </label>
                      </div>
                      <span class="definition-txt-alert" v-if="errors.job_category_id" :errors="errors">
                        @{{ errors.job_category_id[0] }}
                      </span>
      
                      </dd>
                      <dd class="e-fac-new-right" style="display:none;"> 
                        <div>
                        <a href="#" class="fac-new-link">＋  登録済みの求人をコピーして作成</a>
                      </div>
                      
                    </dd>
                    </dl>
                  </li>
                    <li class="definition-table-item" v-if="showbody">
                    <dl class="dl-definition-table">
                      <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">職種
                        </span>
                      </dt>
                      <dd class="definition-table-body e-fac-new-left">
                        <a href="#" @click.prevent="showTitleField" v-if="!showtitle">職場独自の職種名（例：ケアスタッフ など）がある場合はこちらからご記入ください</a>
                        <input type="text" v-model="job_title" v-if="showtitle" v-bind:class="{'definition-txt-error' : errors.job_title}" placeholder="ケアスタッフ" maxlength="15" type="text" class="definition-text-field">
                        <span class="definition-txt-alert" v-if="errors.job_title" :errors="errors">
                            @{{ errors.job_title[0] }}
                          </span>
                      </dd>
                      <dd class="e-fac-new-right"></dd>
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
                            <drop-zone :resource_type="'{!!\App\EmployerImage::ResourceJob!!}'"></drop-zone>                          
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
                          <span class="definition-label-red">必須
                          </span>
                        </span>
                        <span class="definition-head-item definition-head-item-left">訴求文タイトル
                        </span>
                      </dt>
                      <dd class="definition-table-body e-fac-new-left card-font-grey">
                        <div class="space-pd-btm-sm">
                          <div class="card-small-short space-pd-btm-sm">※既存の求人と同一の訴求文タイトルをつけることはできません。<br>1つ1つの求人が目立つように作成してください。</div>
                          <input name="appeal_title" v-model="appeal_title" class="definition-text-field" v-bind:class="{'definition-txt-error' : errors.appeal_title}" placeholder="未経験者歓迎！新規開業の綺麗なクリニックで一緒に働きませんか？" maxlength="128" type="text">
                        </div>
                        <span class="definition-txt-alert" v-if="errors.appeal_title" :errors="errors">
                          @{{ errors.appeal_title[0] }}
                        </span>
      
                      </dd>
                      <dd class="e-fac-new-right card-font-grey">
                        <div class="card-small-short space-pd-top-sm">職場の特徴を端的に表したもの、求める人物像に関する呼びかけやメッセージが含まれるものは、閲覧されやすい傾向にあります。</div>
                      </dd>
                    </dl>
                  </li>
                  <li class="definition-table-item card-input-br-btm" v-if="showbody">
                    <dl class="dl-definition-table">
                      <dt class="definition-table-head">
                        <span class="definition-head-item">
                          <span class="definition-label-red">必須
                          </span>
                        </span>
                        <span class="definition-head-item definition-head-item-left">訴求文
                        </span>
                      </dt>
                      <dd class="definition-table-body e-fac-new-left card-font-grey">
                        <div class="space-pd-btm-sm">
                          <div class="card-small-short space-pd-btm-sm">
                            ※既存の求人と同一の訴求文をつけることはできません
                            <span class="definition-txt-alert card-fw-normal">※他サイトからの引用・転載および訪看ジョブに掲載する文章・写真の無断転載は固く禁止します。</span>
                          </div>
                          <textarea name="appeal_body" v-bind:class="{'definition-txt-error' : errors.appeal_body}" v-model="appeal_body" class="card-textarea space-mt-10 e-card-textarea" placeholder="#当院の魅力とは 新規オープンのクリニックです。駅から徒歩5分とアクセス良好。資格取得 支援制度もありますので働きながらスキルアップを目指す方に最適です。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                        </div>
                        <span class="definition-txt-alert" v-if="errors.appeal_body" :errors="errors">
                          @{{ errors.appeal_body[0] }}
                        </span>
                      </dd>
                      <dd class="e-fac-new-right card-font-grey">
                        <div class="card-small-short space-pd-top-sm">文頭に半角「#」をつけると、小見出しとして大きめの文字で表示することができます。下記の要素がそろっている求人は、閲覧されやすく応募されやすい傾向にあります。</div>
                        <div class="card-small-short space-pd-top-sm">1. 職場の概要<br>2. 働くうえでの魅力<br>3. 求める人物像</div>
                      </dd>
                    </dl>
                  </li>
                </ul>
            </form>
            <div class="space"></div>
            <div v-if="showbody">
            <h2 class="fac-new-heading card-fw-bold">求人の募集内容
            </h2>
            <div class="space"></div>
            @include('jobs.partials.options')
            <div class="space"></div>
            <h2 class="fac-new-heading card-fw-bold">
              採用単価
            </h2>
            <p class="card-font-grey">採用単価とは、採用後に訪看ジョブよりご請求させていただく金額です。この情報は求職者へは開示されません。</p>
            <div class="space"></div>
            <form method="POST" >
                <ul class="definition-table">
                  <li class="definition-table-item">
                    <dl class="dl-definition-table">
                      <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">勤務形態
                        </span>
                      </dt>
                      <dd class="definition-table-body card-fw-bold">
                        正職員/契約職員
                      </dd>
                      <dd class="definition-table-body card-fw-bold">
                        パート・バイト
                      </dd>
                      <dd class="e-fac-new-right">
                        <span class="definition-txt-alert card-fw-normal">採用単価を上げていただくと、検索結果ページで当該求人がほかの求人より上位に表示されるようになり、より多くの求職者の目に止まりやすくなります。</span>
                      </dd>
                    </dl>
                  </li>
                  <li class="definition-table-item">
                    <dl class="dl-definition-table">
                      <dt class="definition-table-head">
                        <span class="definition-head-item definition-head-item-left">@{{job_category_name}}
                        </span>
                      </dt>
                      <dd class="definition-table-body card-fw-bold">
                       @{{job_recruitment_fee_full_contract}}円
                      </dd>
                      <dd class="definition-table-body card-fw-bold">
                        @{{job_recruitment_fee_part}}円
                      </dd>
                      <dd class="e-fac-new-right">
                        <span class="registering-txt card-font-grey">また、採用に成功した際に求職者へジョブメドレーよりお贈りする「祝い金」も増額されるため、求職者にとって応募しやすくなります。</span>
                      </dd>
                    </dl>
                  </li>
                  <li class="definition-table-item">
                    <dl class="dl-definition-table">
                      <dt class="definition-table-head bg-white">
                        <span class="definition-head-item definition-head-item-left">
                        </span>
                      </dt>
                      <dd class="definition-table-body card-fw-bold">
                      </dd>
                      <dd class="definition-table-body card-fw-bold text-right">
                        <a href="#" data-toggle="modal" data-target="#showUnitPricePopup">採用単価を変更</a>
                      </dd>
                      <dd class="e-fac-new-right">
                        <span class="registering-txt card-font-grey"></span>
                      </dd>
                    </dl>
                  </li>
                </ul>
            </form>
            <div class="h-p-30">
                <div class="row">
                  <table class="btn-table card-wd-auto">
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
                          <button type="button" class="tbl-btn-grey" @click.prevent="handleSubmit(0)">下書きを保存する</button>
                        </td>
                        <td class="btn-table-item card-bdr-left">
                          <button type="submit" class="tbl-btn-blue" @click.prevent="handleSubmit(1)">この内容で施設を登録する</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            </div>
        </div><!-- .card -->
        <div class="space"></div>
         @include("image_managers.popup")
         @include("jobs.popup")
      </div><!-- .content -->
