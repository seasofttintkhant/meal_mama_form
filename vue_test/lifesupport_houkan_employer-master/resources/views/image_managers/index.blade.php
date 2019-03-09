@extends('layouts.app')

@section('content')
<div class="content clearfix" id="app" v-cloak>
  <div class="image-frame">
    <div  class="img-content">
    
  <div class="card h-card h-p-40">
      <h2 class="fac-new-heading card-fw-bold">新規アップロード</h2>
      <div class="space"></div>          
        <div class="card-small-short">
          JPG、PNG、GIF形式の画像ファイルをアップロードしてください
        </div>
        <div>
          <div class="card-alert space-pd-btm-md">
          ※1ファイルあたり最大10MBのファイルが登録可能です　※横1200px 縦675px以上の画像の登録を推奨しています
          </div>
          <div class="chart-image-block" aria-disabled="false">
            <div id="dropzone">
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <input type='hidden' name='employer_id' value='{{ auth()->user()->id }}'>
                <input type='hidden' name='uploads_url' value="{{ url('/storage/employers') }}">
                <input type='hidden' name='delete_url' value="{{ url('employers/image/delete') }}">

                <drop-zone :employer_id="{{ auth()->user()->id }}"></drop-zone>
            </div> 
          </div>
        </div>
  </div><!-- .card -->
  <div class="space"></div>
  <div class="card h-card h-p-40">
    <h2 class="fac-new-heading card-fw-bold">アップロード済みの写真</h2>
    <div class="space"></div>
    <div class="common-filter-box">
      <form action="" method="get">
        <dl class="dl-filter-table space-pd-top-sm">
          <dt class="filter-table-head">
            <span class="filter-table-head filter-head-item-left">施設・求人
            </span>
          </dt>
          <dd class="filter-table-body auto-complete-input">
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
          <a href="#" class="pannel-right-link pull-right" @click.prevent="clear">条件をクリア</a>
        </div>
      </form>
      <div class="space"></div>
    </div><!-- .card-filter-box -->
    <div class="space"></div>
     <div class="card-wd-360 space-mt-auto">
      <nav class="card-wd-360 space-mt-auto">
              <div class="card-switcher">
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="card-switcher-item nav-item active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true" @click = "filterBy(0)">すべて</a>
                      <a class="card-switcher-item nav-item" id="photo-use-tab" data-toggle="tab" href="#photo-use" role="tab" aria-controls="photo-use" aria-selected="false" @click = "filterBy(1)">使用中の写真</a>
                      <a class="card-switcher-item nav-item" id="photo-unuse-tab" data-toggle="tab" href="#photo-unuse" role="tab" aria-controls="photo-unuse" aria-selected="false" @click = "filterBy(2)">未使用の写真</a>
                   </div>
              </div>
          </nav>
    </div> 
    <div class="space"></div>
    <div class="">
      <dl class="search-inline-form">
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
      </dl><!-- .inline-form -->
      <div class="space-pd-top-sm">
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <ul class="card-gallery">
              <li class="card-gallery-item space-mt-10" v-for="image in images">
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
              </li>              
            </ul>  
            <div class="clearfix"></div>   
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <dl class="search-inline-form">
        <span class="search-inline-item card-wd-27">
          <span>
          <dl class="search-inline-form">
            <span class="search-inline-item ">
            </span>
            <span class="search-inline-item search-inline-txt text-center">
              <span>
              <span class="card-fw-bold">該当件数 @{{pagination.total}}件</span>
              </span>
            </span>
          </dl>
          </span>
        </span><!-- >.search-inline-item -->
        @include('searches.pagination')
      </dl><!-- .inline-form -->
    </div>
  </div><!-- .card -->
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
  </div><!-- .img-content -->
  </div>
</div><!-- .content -->
@endsection
@push('customjs')
<script src="{{ asset('js/image_manager_app.js') }}"></script>
@endpush
