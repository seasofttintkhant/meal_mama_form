@extends('layouts.app')
Testing
@section('content')
<div class="content">
  <div class="space"></div>
  <div class="card h-card h-p-30">
    <h2 class="fac-new-heading card-fw-bold">新規施設の登録</h2>
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
              <select name="facility_form_id" id="facility_form_id" class="card-selectbox-select">
                <option value="0">指定なし</option>
                <optgroup label="医科">
                <option value="1">医師</option>
                <option value="2">看護師/准看護師</option>
                <option value="3">助産師</option>
                <option value="4">保健師</option>
                <option value="5">介護・福祉事業所</option>
                <option value="6">看護助手</option>
                <option value="7">診療放射線技師</option>
                <option value="8">臨床検査技師</option>
                <option value="9">臨床工学技士</option>
                <option value="10">管理栄養士/栄養士</option>
                <option value="11">公認心理師/臨床心理士</option>
                <option value="12">医療ソーシャルワーカー</option>
                <option value="13">登録販売者</option>
                <option value="14">医療事務/受付</option>
                <option value="15">治験コーディネーター</option>
                <option value="16">臨床開発モニター</option>
                <option value="17">MR</option>
                <option value="18">MS（医薬品卸）</option>
              </optgroup>
              <optgroup label="歯科">
                <option value="0">歯科医師</option>
                <option value="1">歯科衛生士</option>
                <option value="2">歯科技工士</option>
                <option value="3">歯科助手</option>
                <option value="4">医療事務/受付</option>
              </optgroup>
              <optgroup label="介護">
                <option value="0">介護職/ヘルパー</option>
                <option value="1">生活相談員</option>
                <option value="2">ケアマネジャー</option>
                <option value="3">管理職（介護）</option>
                <option value="4">サービス提供責任者</option>
                <option value="5">生活支援員</option>
                <option value="6">福祉用具専門相談員</option>
                <option value="7">児童発達支援管理責任者</option>
                <option value="8">サービス管理責任者</option>
                <option value="9">児童指導員</option>
                <option value="10">看護師/准看護師</option>
                <option value="11">管理栄養士/栄養士</option>
                <option value="12">調理師/調理スタッフ</option>
                <option value="13">介護タクシー/ドライバー</option>
                <option value="14">医療事務/受付</option>
              </optgroup>
              <optgroup label="保育">
                <option value="0">保育士</option>
                <option value="1">幼稚園教諭</option>
                <option value="2">保育補助</option>
                <option value="3">児童指導員</option>
                <option value="4">児童発達支援管理責任者</option>
                <option value="5">看護師/准看護師</option>
                <option value="6">管理栄養士/栄養士</option>
                <option value="7">調理師/調理スタッフ</option>
              </optgroup>
              <optgroup label="リハビリ／代替医療">
                <option value="0">理学療法士</option>
                <option value="1">言語聴覚士</option>
                <option value="2">作業療法士</option>
                <option value="3">視能訓練士</option>
                <option value="4">柔道整復師</option>
                <option value="5">あん摩マッサージ指圧師</option>
                <option value="6">鍼灸師</option>
                <option value="7">整体師/セラピスト</option>
                <option value="8">医療事務/受付</option>
              </optgroup>
              </select>
              <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i>
              </span>
              </label>
            </div>
           <span class="definition-txt-alert">施設名を入力してください</span>
            </dd>
            <dd class="e-fac-new-right"> 
              <div>
              <a href="#" class="fac-new-link">＋  登録済みの求人をコピーして作成</a>
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
            <dd class="definition-table-body e-fac-new-left">
              <a href="" title="">職場独自の職種名（例：ケアスタッフ など）がある場合はこちらからご記入ください</a>
            </dd>
            <dd class="e-fac-new-right"></dd>
          </dl>
        </li>
        <li class="definition-table-item">
          <dl class="dl-definition-table ">
            <dt class="definition-table-head">
              <span class="definition-head-item definition-head-item-left">写真
              </span>
            </dt>
            <dd class="definition-table-body e-fac-new-left">
              <h3 class="upload-title card-fw-bold">アップロードして登録</h3>
                <div class="chart-image-block" aria-disabled="false">
              <div class="chart-image-inner">
                <div class="chart-image-icon">
                  <span class="chart-icon">
                    <img src="">
                  </span>
                </div>
                <span class="chart-image-text card-fw-bold">このエリアに画像ファイルをドラッグ＆ドロップ</span><br>
                <span class="chart-image-text">または</span><br>
                <span class="chart-image-link">画像をフォルダから選択</span>
              </div>
              <input type="file" accept="../img/jpeg, ../img/jpg, ../img/gif, ../img/png" multiple="" autocomplete="off" style="display: none;">
                </div>
            </dd>
            <dd class="e-fac-new-right ">
            <h3 class="upload-title card-fw-bold">写真管理から登録</h3> 
              <div>
                <span><button type="button" class="registering-btn card-fw-bold">写真管理から<br>選んで登録す</button>
                <p class="space-pd-top-sm registering-txt card-font-grey">写真管理へ既にアップロードしている写真の中から登録することができます。</p>
            </div>
          </dd>
          </dl>
        </li>
        <li class="definition-table-item">
          <dl class="dl-definition-table">
            <dt class="definition-table-head">
              <span class="definition-head-item definition-head-item-left">
              </span>
            </dt>
            <dd class="definition-table-body card-font-grey">
                <span class="definition-txt-alert card-fw-normal">※JPG、PNG、GIF形式の画像ファイルが登録できます<br>※1ファイルあたり最大10MBのファイルが登録できます<br>※横1200px 縦675px以上の画像の登録を推奨しています</span>
                <div class="space-pd-top-sm">
                  登録した画像をドラッグ&ドロップし、画像の表示順を並び替えることができます
                </div>
                <div class="space-pd-top-sm">
                  <div class="card-sort-list clearfix">
                    <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img01.jpg">
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img01.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                        </figure>
                      </div>
                    </div><!-- .card-sort-list-item -->
                    <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img02.jpg">
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img02.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                        </figure>
                      </div>
                      <div class="space-pd-top-sm card-alert">
                          <div class="card-xs-small-short">推奨サイズ以上の写真を登録すると、よりきれいに表示することができます</div>
                      </div>
                    </div><!-- .card-sort-list-item -->
                    <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img03.jpg">
                            <figcaption class="card-upload-caption">懇親会時の写真です。定期的にスタッフとの食事会などを行っています。</figcaption>
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img03.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                        </figure>
                      </div>
                    </div><!-- .card-sort-list-item -->
                    <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img04.jpg" alt="Another alt text">
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img04.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                        </figure>
                      </div>
                    </div><!-- .card-sort-list-item -->
                     <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img05.jpg" alt="Another alt text">
                            <figcaption class="card-upload-caption">代表の猿井です。</figcaption>
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img05.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </figure>
                      </div>
                    </div><!-- .card-sort-list-item -->
                   <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img06.jpg" alt="Another alt text">
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img06.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                        </figure>
                      </div>
                    </div><!-- .card-sort-list-item -->
                    <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img07.jpg" alt="Another alt text">
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img07.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                        </figure>
                      </div>
                    </div><!-- .card-sort-list-item -->
                   <div class="card-sort-list-item">
                      <div>
                        <figure class="card-upload-image">
                          <div class="thumb">
                            <img class="img-thumbnail" src="../img/img08.jpg" alt="Another alt text">
                            <div class="card-overlay">  
                              <div class="card-overlay-inner">
                                <ul class="card-inline-list">
                                  <li class="card-inline-item">
                                    <a class="card-link thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="説明文の編集" data-image="../img/img08.jpg"data-target="#image-gallery">編集する</a>
                                  </li>
                                  <li class="card-inline-item">
                                    <a class="card-link card-link-alert" href="#">削除する</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                        </figure>
                      </div>
                    </div><!-- .card-sort-list-item -->
                  </div>
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
        <li class="definition-table-item card-input-br-btm">
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
                <input value="" name="appeal_title" class="definition-text-field definition-txt-error" placeholder="未経験者歓迎！新規開業の綺麗なクリニックで一緒に働きませんか？" maxlength="100" type="text">
              </div>
              <span class="definition-txt-alert">訴求文タイトルは必須です</span>
            </dd>
            <dd class="e-fac-new-right card-font-grey">
              <div class="card-small-short space-pd-top-sm">職場の特徴を端的に表したもの、求める人物像に関する呼びかけやメッセージが含まれるものは、閲覧されやすい傾向にあります。</div>
            </dd>
          </dl>
        </li>
        <li class="definition-table-item card-input-br-btm">
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
                <textarea name="access" class="card-textarea space-mt-10 definition-txt-error e-card-textarea" placeholder="#当院の魅力とは 新規オープンのクリニックです。駅から徒歩5分とアクセス良好。資格取得 支援制度もありますので働きながらスキルアップを目指す方に最適です。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
              </div>
              <span class="definition-txt-alert">訴求文タイトルは必須です</span>
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
    <h2 class="fac-new-heading card-fw-bold">求人の募集内容</h2>
    <div class="space"></div>
    <form method="POST" >
        <ul class="definition-table">
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item">
                  <span class="definition-label-red">必須
                  </span>
                </span>
                <span class="definition-head-item definition-head-item-left">仕事内容
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">救命救急</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">人工透析</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">健診・検診・人間ドック</span>
                            </label>
                            
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">外来診療</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">病棟管理</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">終末期医療・ターミナルケア</span>
                            </label>
                            
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">新規オープン</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">内視鏡検査</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                    <textarea name="access" class="card-textarea space-mt-10 e-card-textarea" placeholder="訪問リハビリ業務。1日3〜5件ほど訪問します。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">入力は必須ではありませんが、より詳しくご記入いただくと、たくさんの応募が集まる傾向にあります。</span>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">診療科目
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">一般内科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">消化器内科</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">循環器内科</span>
                            </label>
                            
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">呼吸器内科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">腎臓内科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">血液内科</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">神経内科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">代謝・内分泌内科</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">一般外科</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">消化器外科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">心臓血管外科</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">呼吸器外科</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">脳神経外科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">整形外科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">形成外科</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">精神科・心療内科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">眼科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">耳鼻咽喉科</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">美容外科・美容皮膚科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">リハビリテーション科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">小児科</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">産婦人科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">リウマチ科</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">アレルギー科</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                </div>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">サービス形態
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">ペインクリニック</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">在宅医療</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">慢性期・療養型病院</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">急性期病棟</span>
                            </label>
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">回復期病棟</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input type="checkbox" value="0" name="" class="grid-checkbox-input">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">一般病院</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                </div>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
                <div class="space"></div>
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
                <span class="definition-head-item definition-head-item-left">雇用形態と給与
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div>
                  <label class="common-radio">正職員
                  <input checked="checked" name="radio" type="radio">
                  <span class="checkmark"></span>
                </label>
                </div>
                <div class="space-pd-xs">
                  <div class="">
                    <dl class="card-inline-form">
                      <span class="card-inline-item">
                        <span>月給</span>
                      </span>
                      <span class="card-inline-item card-wd-date-100">
                        <span>
                          <input type="text" value="" name="job_offer_salary_regular_bottom" class="card-txt-field" placeholder="" maxlength="">
                        </span>
                      </span>
                      <span class="card-inline-item">
                        <span>〜</span>
                      </span>
                      <span class="card-inline-item card-wd-date-100">
                        <span>
                          <input type="text" value="" name="job_offer_salary_regular_bottom" class="card-txt-field" placeholder="" maxlength="">
                        </span>
                      </span>
                      <span class="card-inline-item"><span>円</span></span>
                    </dl>
                  </div>
                </div>
                <div class="space-pd-top-sm">
                  <label class="common-radio">契約職員
                  <input checked="checked" name="radio" type="radio">
                  <span class="checkmark"></span>
                </label>
                </div>
                <div>
                  <label class="common-radio">パート・アルバイト
                  <input checked="checked" name="radio" type="radio">
                  <span class="checkmark"></span>
                </label>
                </div>
              </dd>
              <dd class="e-fac-new-right"> 
                <div class="space-pd-top-sm">
                    <span class="definition-txt-alert card-fw-normal">多くの求職者は月給または時給で比較されますので、年俸制や日給制であっても、可能な限り月給換算・時給換算を記入することをおすすめします
                    </span>
                  <span class="registering-txt card-font-grey">換算の記入が難しい場合は、給与の備考欄に詳しくご記載ください。</span>
                </div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">給与の備考<br>(昇給、モデル年収等)
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <textarea name="salary_etc" class="card-textarea space-mt-10 definition-txt-error" placeholder="年収300〜400万円。給与は経験・能力を考慮し決定。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
              </dd>
              <dd class="e-fac-new-right"></dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">待遇
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">歩合制あり</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">託児所・保育支援あり</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">社会保険完備</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">賞与あり</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">交通費支給</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">扶養控除内考慮</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">退職金あり</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">復職支援</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">住宅手当</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text"> 研修制度あり</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">年収1,400万円以上可能</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                    <textarea name="welfare_programs" class="card-textarea space-mt-10 e-card-textarea" placeholder="退職金制度、住宅支援制度あり" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
              </dd>
              <dd class="e-fac-new-right">
                <div class="space-pd-top-sm">
                    <span class="definition-txt-alert card-fw-normal">社会保険完備や賞与ありと明記されている求人は、もっとも閲覧される傾向にあります。
                    </span>
                  <span class="space-mt-10 registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
                </div>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item">
                  <span class="definition-label-red">必須
                  </span>
                </span>
                <span class="definition-head-item definition-head-item-left">仕事内容
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">勤務時間</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">午前のみ勤務</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">午後のみ勤務</span>
                            </label>
                            
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text"> 午後のみ勤務</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">病棟管理</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text"> 残業ほぼなし</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">オンコールなし</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">当直なし</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                    <textarea name="office_hours_conditions" class="card-textarea space-mt-10 e-card-textarea definition-txt-error" placeholder="8:30〜17:30（休憩60分 ※時間・曜日応相談" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
                <span class="definition-txt-alert">勤務時間は必須です</span>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item">
                  <span class="definition-label-red">必須
                  </span>
                </span>
                <span class="definition-head-item definition-head-item-left">休日
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">4週8休以上</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">育児支援あり</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">育児支援あり</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                    <textarea name="holiday" class="card-textarea space-mt-10 e-card-textarea definition-txt-error" placeholder="完全週休2日制 年間休日115日" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
                <span class="definition-txt-alert">休日の入力は必須です</span>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。<br>休日日数など具体的な数値を盛り込みながらご記入いただくと、応募されやすい傾向にあります。</span>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">長期休暇・特別休暇
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                    <textarea name="special_holiday" class="card-textarea e-card-textarea space-mt-10" placeholder="年末年始休暇 リフレッシュ休暇制度（勤続3年以上に最長10日間）" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">休日日数など具体的な数値を盛り込みながらご記入いただくと、応募されやすい傾向にあります。</span>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item">
                  <span class="definition-label-red">必須
                  </span>
                </span>
                <span class="definition-head-item definition-head-item-left">応募要件
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">未経験可</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">ブランク可</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">年齢不問</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">専門不問</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">門医取得者歓迎</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">精神保健福祉士</span>
                            </label>
                            
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">社会福祉士</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">社会福祉主事</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">准看護師可</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">看護師</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">保健師</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">診療放射線技師</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">臨床検査技師</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">薬剤師</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">介護福祉士</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">介護職員実務者研修（旧ヘルパー1級/基礎研修）以上</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">介護職員初任者研修（旧ヘルパー2級）以上</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">管理栄養士</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">保育士</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">主任介護支援専門員</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">自動車運転免許</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">小学校教諭</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">中学校教諭</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">高等学校教諭</span>
                            </label>
                            </div>
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                    <textarea name="required" class="card-textarea space-mt-10 e-card-textarea definition-txt-error" placeholder="下記いずれかの資格をお持ちの方・介護福祉士 ・介護職員初任者研修（旧ヘルパー2級）未経験者やブランクのある方も研修を実施しますので安心して働くことができます。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
                <span class="definition-txt-alert">応募要件は必須です</span>
              </dd>
              <dd class="e-fac-new-right">
                <div class="space-pd-top-sm">
                    <span class="definition-txt-alert card-fw-normal">求職者が迷われないよう、必須の条件は「応募要件」に、必須ではないが望ましい条件は「歓迎要件」にご記入ください。
                    </span>
                  <span class="space-mt-10 registering-txt card-font-grey">フリーテキスト欄に記入いただくだけでなく、当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
                </div>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">歓迎要件
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                    <textarea name="preferred" class="card-textarea space-mt-10 definition-txt-error" placeholder="管理職経験 3年 等" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
              </dd>
              <dd class="e-fac-new-right">
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">アクセス
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <div class="space-pd-btm-sm">
                   <div class="filter-grid">
                      <div class="row">
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">駅近(5分以内)</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="grid-checkbox">
                              <label class="grid-checkbox-label">
                              <input value="0" name="" class="grid-checkbox-input" type="checkbox">
                              <span class="checkmark"></span>
                              <span class="checkmark-text">車通勤可</span>
                            </label>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                      </div><!-- .row -->
                    </div><!-- .filter-grid -->
                </div>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey"> 求職者向けには施設情報に登録いただいた内容が詳細として表示されます。<br>当てはまる特徴にチェックを入れていただくと、求職者から検索されやすくなります。</span>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
          <li class="definition-table-item ">
            <dl class="dl-definition-table">
              <dt class="definition-table-head">
                <span class="definition-head-item definition-head-item-left">選考プロセス
                </span>
              </dt>
              <dd class="definition-table-body e-fac-new-left">
                <span class="card-font-grey">下記は入力例となりますので必要に応じて適宜編集してください。</span>
                <div class="space-pd-btm-sm">
                    <textarea name="preferred" class="card-textarea e-card-textarea space-mt-10" placeholder="[1] 訪看ジョブの応募フォームよりご応募ください ↓[2] 採用担当より面接日程の調整などの連絡をさせていただきます ↓[3] 面接実施 ↓[4] 採用決定のご連絡 ↓[5] 入職手続きを進めつつ、訪看ジョブから祝い金をご申請ください ※応募から内定までは平均1週間～1ヶ月ほどになります。※在職中で今すぐ転職が難しい方も調整のご相談が可能です。" maxlength="2000" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                </div>
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">応募を迷われる求職者の方に最後のアピールができます。入力例を参考に、履歴書の送付が必要な場合などは追記ください。</span>
                <div class="space"></div>
              </dd>
            </dl>
          </li>
        </ul>
    </form>
    <div class="space"></div>
    <h2 class="fac-new-heading card-fw-bold">採用単価</h2>
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
                <span class="definition-head-item definition-head-item-left">医師
                </span>
              </dt>
              <dd class="definition-table-body card-fw-bold">
               1500000円
              </dd>
              <dd class="definition-table-body card-fw-bold">
                750000円
              </dd>
              <dd class="e-fac-new-right">
                <span class="registering-txt card-font-grey">採用単価を上げていただくと、検索結果ページで当該求人がほかの求人より上位に表示されるようになり、より多くの求職者の目に止まりやすくなります。</span>
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
              <td class="btn-table-item">
                <button type="button" class="tbl-btn-grey">プレビュー</button>
                <div class="tex-center">
                  <div class="tbl-alert-item">
                    <div class="tbl-alert-text card-fw-bold">仕上がりを確認しましょう！
                    </div>
                  </div>
                </div>
              </td>
              <td class="btn-table-item card-bdr-left">
                <button type="button" class="tbl-btn-grey">下書きを保存する</button>
              </td>
              <td class="btn-table-item card-bdr-left">
                <button type="submit" class="tbl-btn-blue">この内容で施設を登録する</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog card-mx-900 modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="card-fw-bold" id="image-gallery-title"></h4>
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                      </button>
                  </div>
                  <div class="modal-body e-modal-body card-body-height">
                    <div class="card-img-edit">
                      <form action="">
                        <figure class='card-img-edit-figure'>
                        <div class="card-edit-fig-inner">
                          <div class="card-edit-image">
                            <div>
                               <img id="image-gallery-image" class="img-fluid" src="">
                            </div>
                          </div>
                          
                        </div>
                        
                      </figure><!-- .card-img-edit-figure -->
                      <div class="card-edit-summary">
                        <div class="card-small-short">
                          画像サイズ：1092 × 675
                        </div>
                        <div class="space-pd-sm">
                          <textarea name="image-update-caption" class="card-textarea-sm u-hg-min-76" placeholder="" maxlength="40"></textarea>
                          <div class="pull-right card-small-short">0 文字 / 40文字 </div>
                        </div>
                        <div class="space-pd-top-sm card-small-short">※説明文はこの写真を使用しているほかの施設・求人にも反映されます</div>
                        <div class="space-pd-top-md">
                          <button type="button" class="blue-btn card-wd-100 card-fw-bold">写真に説明文を追加する</button>
                        </div>
                      </div>
                      </form>
                    </div>
                     
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                      </button>

                      <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                      </button>
                  </div>
              </div>
          </div>
    </div>
  </div><!-- .card -->
  <div class="space"></div>
  
</div><!-- .content -->
@endsection
@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
 let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

</script>
@endpush