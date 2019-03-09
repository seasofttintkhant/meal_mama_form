@extends('layouts.app')
@section('content')
<div class="content e-none-content">
  <main class="facilities-main">
    <div class="facilities-content">
        <div class="second-sidebar">
          <div class="facilities-sidebar">
            <div class="facilities-register">
              <div class="new-btn-box">
                <a class="new-btn-link" href="{{ route('staff_voices.create') }}">＋ 職員の声を新規登録</a>
              </div><!-- .new-btn-box -->
            </div><!-- .facilities-register -->
            <div class="fac-sidebar-head">
             {{--<div class="fac-sidebar-item">
                <form>
                  <div class="fac-search-box">
                    <input type="text" value="" placeholder="対象施設を検索" class="search-box-input">
                    <button type="submit" class="fac-search-btn">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </div><!-- .fac-search-box -->
                  <div class="fac-text text-center">施設名・都道府県をスペース区切りで検索</div>
                </form>
              </div>--}}<!-- .fac-sidebar-item -->
              <div class="fac-sidebar-item space-pd-top-sm">
                <div class="text-center"><a class="fac-link" data-toggle="modal" data-target="#facility_narrow">＋ 施設の条件を詳しく絞り込む</a></div>
              </div>
            </div><!-- .fac-sidebar-head -->
          </div><!-- .facilities-sidebar -->
        </div><!-- .second-sidebar -->
        @if(count($staffVoices) > 0)
          <div class="facilites-content-inner">
            <div class="fac-content-block">
              <div class="list-heading">
                <div class="space-pd-20 card-fw-bold">
                  <dl>
                    <div class="list-gp-item">
                      <span class="applicable-jobs-left"> 職員の声</span>
                    </div>
                    <div class="list-gp-item">
                      <span class="applicable-jobs-right">List</span>
                    </div>
                  </dl>
                </div>
              </div><!-- .list-heading -->
            </div><!-- .fac-content-block -->
            <div class="space"></div>
            <div class="fac-content-block">
              <div class="list-jobs-gp">
                <div class="list-jobs-main-second">
                  <ul class="list-jobs-items">
                    @foreach($staffVoices as $staffVoice)
                      <li class="list-jobs-inner card-bdr-top">
                        <div class="list-jobs-body space-mt-none">
                          <div class="list-jobs-thumb-second">
                            <figure class="list-jobs-img staff-list-img">
                                <?php 
                                if(isset($staffVoice) && !empty($staffVoice) && !empty($staffVoice->image))
                                {
                                 $img = '/img/staff_voices/'.$staffVoice->image;
                                }
                                else{
                                 $img = '/img/avatar.png';
                                }
                           ?> 
                              <img class="staff-img img-fluid" src="{{$img}}" alt="" >
                            </figure>
                          </div><!-- .list-jobs-thumb -->
                          <div class="list-jobs-summary space-pl-20 list-summary-second"> 
                          <span class="list-offer-name">{{$staffVoice->job_category_name}}</span><br>
                          <div class="list-gp-outline">
                              <dl class="list-outline-list">
                                <dt class="list-outline-head">経験年数: </dt>
                                <dd class="list-outline-body">{{$staffVoice->years_of_exp_str}}</dd>
                              </dl>
                            </div><!-- .list-gp-outline -->
                            <div class="list-gp-outline">
                              <dl class="list-outline-list">
                                <dt class="list-outline-head">更新日: </dt>
                                <dd class="list-outline-body">{{$staffVoice->update_date}}</dd>
                              </dl>
                            </div><!-- .list-gp-outline -->
                          </div><!-- .list-jobs-summary -->
                          <ul class="list-jobs-action-second text-center">
                            <li class="list-action-item">
                              <a href="{{route('staff_voices.edit',$staffVoice->id)}}">
                                  <button type="button" class="card-btn card-btn-sm card-wd-100">編集</button>
                              </a>
                            </li>
                            <li class="list-action-item space-pd-top-sm">
                                <a href="{{route('staff_voices.show',$staffVoice->id)}}">
                                    <button type="button" class="card-btn card-btn-sm card-wd-100">プレビュー</button>
                                </a>
                            </li>
                          </ul><!-- .list-jobs-action -->
                        </div><!-- .list-jobs-body -->
                      </li><!-- .list-jobs-inner -->
                    @endforeach()
                    
                  </ul><!-- .list-jobs-items -->
                </div><!-- .list-jobs-main -->
              </div><!-- .list-jobs-gp -->
            </div><!-- .fac-content-block -->

            <div class="space"></div>
            <?php
              $total_page = ceil($staffVoices->total()/$staffVoices->perPage());
            //$total_page = $staffVoices->total();
              //echo $total_page;
            ?>
              @if($total_page > 0)  <!--If pagination -->
                @include('custompaging.pagination.default',['paginator'=>$staffVoices])
              @endif
          </div>

        @else
          <div class="common-content-inner clearfix">
            <div class="common-not-found">
              <div class="common-not-found-inner">
                <div class="space-pd-20 text-center">
                  <span><i class="fa fa-search fa-3x" aria-hidden="true"></i></span>
                  <p class="not-found-txt">職員の声が登録されていません<br>まずは職員の声を登録しましょう</p>
                  <div class="new-not-found-btn">
                    <a class="new-btn-link" href="{{ route('staff_voices.create') }}">＋ 職員の声を新規登録</a>
                  </div><!-- .new-btn-box -->
                </div>
              </div>
            </div>
        </div>
      @endif
      </div><!-- .facilities-content -->
  </main><!-- .facilites-main -->
</div>

@include("staff_voices.popup")

@endsection