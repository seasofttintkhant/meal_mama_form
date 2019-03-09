@extends('mobileview.layouts.app')

@section('content')
<div>
<div class="o-m-page" >
    <div>
        <div class="search-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="c-m-page-header__title">
                        <h1 class="c-m-heading c-m-heading--white">選考管理<a href="" class="m-question" title=""><i class="fa fa-question-circle-o" aria-hidden="true"></i></a>   </h1>

                    </div>
                </div>
                <div class="col">
                    <div class="search-header-icon text-right m-pd-top-md">
                        <a href="" title="" data-toggle="modal" data-target="#selecticon-popup" title=""><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="search-block m-pd-top-md c-m-box--bg-grey">
        <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="">
            
                <div class="c-m-panel c-m-panel--border">
                    <div class="panel panel-primary" href="#demo" data-toggle="collapse">
                        <div class="panel-heading">
                            <div class="c-m-box c-m-box--m">
                                <ul class="c-m-bordered-list">
                                    <li class="">
                                        <div class="row">
                                            <div class="col ds-o-flex__item">
                                                <h1 class="pull-left c-m-heading c-m-heading--l c-m-heading--grey">選考状況</h1>
                                            </div>
                                            <span id="list" class="col text-right c-m-drop-down-menu__icon clickable">
                                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        
                                    </li>
                                </ul>
                                </div>
                            </div>
                           <div class="collapse" id="demo">
                                <ul class="c-m-bordered-list select-menu-list">
                                    <li class="c-m-bordered-list__item m-border-top m-pd-top">
                                        <div class="m-fw-bold text-center">選考中</div><br>
                                    </li>
                                    <li class="c-m-bordered-list__item active">
                                       <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">すべて 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">5</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="c-m-bordered-list__item">
                                       <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">応募済 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">5</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="c-m-bordered-list__item">
                                       <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">書類選考中 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">5</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="c-m-bordered-list__item">
                                       <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">面接日設定済 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">5</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="c-m-bordered-list__item">
                                       <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                            <span class="accordation-title card-fw-normal">面接実施中 
                                                <span class="o-inline-form__item pull-right">
                                                    <div class="o-horizonify">
                                                        <div class="o-horizonify__item o-horizonify__item--5">
                                                            
                                                        </div>
                                                        <div class="o-horizonify__item o-horizonify__item--5">
                                                            <div class="c-badge">5</div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="c-m-bordered-list__item">
                                       <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                            <span class="accordation-title card-fw-normal">内定済 
                                                <span class="o-inline-form__item pull-right">
                                                    <div class="o-horizonify">
                                                        <div class="o-horizonify__item o-horizonify__item--5">
                                                            
                                                        </div>
                                                        <div class="o-horizonify__item o-horizonify__item--5">
                                                            <div class="c-badge">5</div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="c-m-bordered-list__item">
                                   <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">内定承諾済 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">5</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                    </a>
                                    </li>
                                    <li class="c-m-bordered-list__item">
                                       <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                            <span class="accordation-title card-fw-normal">入職日決定済 
                                                <span class="o-inline-form__item pull-right">
                                                    <div class="o-horizonify">
                                                        <div class="o-horizonify__item o-horizonify__item--5">
                                                            
                                                        </div>
                                                        <div class="o-horizonify__item o-horizonify__item--5">
                                                            <div class="c-badge">5</div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="c-m-bordered-list select-menu-list">
                                    
                                <li class="c-m-bordered-list__item m-border-top m-pd-top">
                                    <div class="m-fw-bold text-center">選考済</div><br>
                                </li>
                                <li class="c-m-bordered-list__item">
                                   <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                    <span class="accordation-title card-fw-normal">すべて 
                                        <span class="o-inline-form__item pull-right">
                                            <div class="o-horizonify">
                                                <div class="o-horizonify__item o-horizonify__item--5">
                                                    
                                                </div>
                                                <div class="o-horizonify__item o-horizonify__item--5">
                                                    <div class="c-badge">5</div>
                                                </div>
                                            </div>
                                        </span>
                                    </span>
                                    </a>
                                </li>
                                <li class="c-m-bordered-list__item">
                                   <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                    <span class="accordation-title card-fw-normal">入職済 
                                        <span class="o-inline-form__item pull-right">
                                            <div class="o-horizonify">
                                                <div class="o-horizonify__item o-horizonify__item--5">
                                                    
                                                </div>
                                                <div class="o-horizonify__item o-horizonify__item--5">
                                                    <div class="c-badge">11</div>
                                                </div>
                                            </div>
                                        </span>
                                    </span>
                                    </a>
                                </li>
                                <li class="c-m-bordered-list__item">
                                   <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">内定辞退 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">3</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="c-m-bordered-list__item">
                                   <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                    <span class="accordation-title card-fw-normal">選考終了・離脱 
                                        <span class="o-inline-form__item pull-right">
                                            <div class="o-horizonify">
                                                <div class="o-horizonify__item o-horizonify__item--5">
                                                    
                                                </div>
                                                <div class="o-horizonify__item o-horizonify__item--5">
                                                    <div class="c-badge">5</div>
                                                </div>
                                            </div>
                                        </span>
                                    </span>
                                    </a>
                                </li>
                                <li class="c-m-bordered-list__item">
                                   <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">面接実施中 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">5</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="c-m-bordered-list__item">
                                   <a href="#" class="select-head-menu m-txt-grey m-fw-bold">
                                        <span class="accordation-title card-fw-normal">内定済 
                                            <span class="o-inline-form__item pull-right">
                                                <div class="o-horizonify">
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        
                                                    </div>
                                                    <div class="o-horizonify__item o-horizonify__item--5">
                                                        <div class="c-badge">5</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                                                            
                <div class="m-space-md"></div>
                </div>
            
                    </div>
                </div>
                
            </div>  
    </div>
    <div class="m-space-md"></div>
    <div class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="c-m-heading c-m-heading--l m-pd-top-sm">1<span>件</span></h1>
                </div>
            </div>
            <div class="row m-pd-top" v-for="jobseeker in jobseekers">
                <div class="col">
                    <div class="m-member-card">
                        <div class="m-member-card__body">
                            <div class="m-panel m-panel--border m-panel--grey">
                                <div class="c-m-box c-m-box--horizontal-m">
                                    <ul class="c-m-bordered-list">
                                        <li class="c-m-bordered-list__item clearfix">
                                            <div class="c-m-box m-pd-sm clearfix">
                                                <div class="m-inline-table m-wd-70 pull-left m-border-r2">
                                                    <h1 class="c-m-heading c-m-heading--xl">谷平 貴幸</h1>
                                                    <span class="c-m-text c-m-text--bold">27歳&nbsp;男性&nbsp;</span>
                                                </div>
                                                <span class="m-wd-30 pull-right">
                                                    <a href="#"class="c-m-text-link">応募済</a>
                                                </span>
                                            </div>
                                            <div class="m-border-top">
                                                <div class="">
                                                    <div class="panel panel-primary" href="#demo1" data-toggle="collapse">
                                                        <div class="panel-heading">
                                                            <dl class="m-collapse-table">
                                                                <div class="row m-pd-top">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">希望職種</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.desired_occupations">
                                                                                <span>test</span><span v-if="index+1 < jobseeker.desired_occupations.length">,<br/> </span>
                                                                            </span>
                                                                        </dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">保有資格</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.qualification">
                                                                                <span>test</span><span v-if="index+1 < jobseeker.qualification.length">,<br/> </span>
                                                                            </span>
                                                                        </dd>
                                                                        <dd class="col-1">
                                                                            <span class="pull-right clickable">
                                                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                                            </span>
                                                                        </dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">経歴</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span>tesr</span>
                                                                        </dd>
                                                                </div>
                                                            </dl><!-- .m-collapse-table -->
                                                        </div><!-- .panel-heading -->
                                                        <div class="collapse" id="demo1">
                                                            <dl class="m-collapse-table">
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">希望勤務地</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.desired_workplaces">
                                                                                <span>test</span><span v-if="index+1 < jobseeker.desired_workplaces.length">,<br/> </span>
                                                                            </span>
                                                                        </dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">希望勤務形態</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.desired_occupations">
                                                                                <span>test</span><span v-if="index+1 < jobseeker.desired_occupations.length">,<br/> </span>
                                                                            </span>
                                                                        </dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">現職</dt>
                                                                        <dd class="col m-fs-sm"><span>test</span></dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">会員番号</dt>
                                                                        <dd class="col m-fs-sm"><span>test</span></dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">最終ログイン</dt>
                                                                        <dd class="col m-fs-sm"><span>test</span></dd>
                                                                </div>
                                                            </dl>
                                                        </div><!-- .panel-body -->
                                                        
                                                    </div><!-- .panel-primary -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="c-m-bordered-list__item">
                                            <div class="">
                                                    <div class="panel panel-primary" href="#demo2" data-toggle="collapse">
                                                        <div class="panel-heading m-pd-top">
                                                           <div class="row">
                                                                <label class="col">メモ</label>
                                                                <span class="col text-right clickable">
                                                                    <i class="fa fa-chevron-down pull-right " aria-hidden="true"></i>
                                                                </span>
                                                           </div>
                                                        </div><!-- .panel-heading --><br>
                                                        <div class="collapse" id="demo2">
                                                            <textarea name="special_holiday" class="card-textarea car-mx-wd-auto space-mt-10" placeholder="" style="overflow: hidden; overflow-wrap: break-word; height: 76px;"></textarea>
                                                        </div><!-- .panel-body -->
                                                        
                                                    </div><!-- .panel-primary -->
                                                    <div class="c-m-box c-m-box--vertical-m m-border-top m-pd-top">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="#" class="c-m-button" data-toggle="modal" data-target="#profile-popup" @click="getProfile(jobseeker.id,false)">プロフィール</a>
                                                                    
                                                                </div>
                                                                <div class="col">
                                                                    <a href="#" class="c-m-button" data-toggle="modal" data-target="#scout-popup"  @click="clearscoutPopup(false,jobseeker.id)">メッセージ</a>
                                                                </div>
                                                            </div><br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="#" class="c-m-button c-m-button--primary" data-toggle="modal" data-target="#entry-status-popup"  @click="clearscoutPopup(false,jobseeker.id)">入職状況の変更</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-space-md"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- .m-member-card -->
                </div>
            </div>
        </div>

    </div>
    <div class="m-space-md"></div>
    </div>

</div>

   @include('mobileview.selections.selecticon_popup')
   @include('mobileview.selections.fill_popup')
   @include('mobileview.selections.entry_status_popup')


@endsection

@push('customjs')
<script type="text/javascript">
    $(document).on('click', '.panel-heading span#list.listclickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        // $('#list').find('i').removeClass('fa fa-list').addClass('fa fa-times');
        $this.find('i').removeClass('fa fa-list').addClass('fa fa-times');
        
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('fa fa-times').addClass('fa fa-list');
        
    }
});
</script>
@endpush