<div class="modal fade" id="showUploadedImages" tabindex="-1" role="dialog" aria-labelledby="showUploadedImages" aria-hidden="true">
  <div class="modal-dialog image-modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showUploadedImages"><strong>写真管理から写真を追加する</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearselected">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="common-filter-box">
          <form action="" method="get">
            <dl class="dl-filter-table space-pd-top-sm">
              <dt class="filter-table-head">
                <span class="filter-table-head filter-head-item-left">施設・求人
                </span>
              </dt>
              <dd class="filter-table-body">
                  <input class="definition-text-field card-wd-100"  id="search_field" @focus="toggleSuggestion()" placeholder="都道府県・施設名・募集職種をスペース区切りで検索" maxlength="100" type="text">
                  <div class="auto-complete-data-container" v-if="show_suggestion">
                    <ul class="auto-complete-data">
                      <li v-for="suggestion in suggestions" @click="selectSuggestion(suggestion)">@{{suggestion.title}}</li>
                    </ul>
                  </div>
              </dd>
            </dl>
            <dl class="dl-filter-table space-pd-btm-sm">
              <dt class="filter-table-head">
                <span class="filter-table-head filter-head-item-left">説明文
                </span>
              </dt>
              <dd class="filter-table-body">
                  <input class="definition-text-field card-wd-100" placeholder="説明文の中から検索" maxlength="100" type="text" v-model ="search_description">
              </dd>
            </dl>
            <div class="filter-pannel-btn">
                <button type="submit" class="pannel-btn-submit pannel-btn-wd" @click.prevent = "searchByKey">
                <span class="icon-btn-blue">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </span>
                <span class="">求人情報を絞り込む</span>
              </button>
              <a href="#" class="pannel-right-link pull-right">条件をクリア</a>
            </div>
          </form>
          <div class="space"></div>
        </div>
        <nav class="card-wd-360 space-mt-auto">
          <div class="card-switcher">
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="card-switcher-item nav-item active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true" @click="filterBy(0)">すべて</a>
              <a class="card-switcher-item nav-item" id="photo-use-tab" data-toggle="tab" href="#photo-use" role="tab" aria-controls="photo-use" aria-selected="false" @click="filterBy(0)">使用中の写真</a>
              <a class="card-switcher-item nav-item" id="photo-unuse-tab" data-toggle="tab" href="#photo-unuse" role="tab" aria-controls="photo-unuse" aria-selected="false" @click="filterBy(1)">未使用の写真</a>
            </div>
          </div>
        </nav>
        <dl class="search-inline-form space-mt-10">
          <span class="search-inline-item card-wd-27">
            <span>
            <dl class="search-inline-form">
              <span class="search-inline-item ">
              </span>
              <span class="search-inline-item search-inline-txt text-center">
                <span>
                <span class="card-fw-bold">該当件数 @{{pagination.total}} 件</span>
                </span>
              </span>
            </dl>
            </span>
          </span><!-- >.search-inline-item -->
          @include('searches.pagination')
        </dl>
        <div class="modal-image-container">
          <div class="image-sperater" v-for="image in popup_images">
            <div class="modal-image select-image" :id="'popup-image-' + image.id" @click="makeImageSelected($event,image)">
              <div class="selected_overylay">
                </div>
              <img :src="image.path">
          </div>
        </div>
        <dl class="search-inline-form space-mt-10">
            @include('searches.pagination')
        </dl>
      </div>
      <div class="modal-footer j-c-c">
        <button type="button" class="blue-btn card-fw-bold blue-btn-2" @click.prevent="submitUseImages" data-dismiss="modal">選択した写真を登録する</button>
      </div>
    </div>
  </div>
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
                            <img id="image-gallery-image" class="img-fluid" :src="image.path">
                        </div>
                    </div>
                    
                    </div>
                    
                </figure><!-- .card-img-edit-figure -->
                <div class="card-edit-summary">
                    <div class="card-small-short">
                    @{{image.dimension}}
                    </div>
                    <div class="space-pd-sm">
                    <textarea class="card-textarea-sm u-hg-min-76" placeholder="" maxlength="40" v-model="image.description" v-bind:class="{'definition-txt-error' : errors.description}" @keyup="wordCount"></textarea>
                    <span class="definition-txt-alert" v-if="errors.description" :errors="errors">
                        @{{ errors.description[0] }}
                    </span>
                    <div class="pull-right card-small-short">@{{word_count}} 文字 / 40文字 </div>
                    </div>
                    <div class="space-pd-top-sm card-small-short">※説明文はこの写真を使用しているほかの施設・求人にも反映されます</div>
                    <div class="space-pd-top-md">
                    <button type="button" class="blue-btn card-wd-100 card-fw-bold space-pd-sm" @click.prevent = "updateImage" data-dismiss="modal">写真に説明文を追加する</button>
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
