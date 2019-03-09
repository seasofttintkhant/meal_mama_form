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
                    <div class="search-header-icon pull-right m-pd-top-md">
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
                                        <div class="col pull-left"><div class="ds-o-flex__item"><h1 class="c-m-heading c-m-heading--l c-m-heading--grey">選考状況</h1></div></div>
                                        <span id="list" class=" col pull-right c-m-drop-down-menu__icon clickable">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        </span>
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
                                <div>
                                    <span class="c-m-text m-fw-bold c-m-text--m-long">該当者がいません<br>検索条件を変更してお試しください</span>
                                </div>
                                <a href="#" class="c-m-button" data-toggle="modal" data-target="#selecticon-popup" @click="">条件を変更して検索</a>
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