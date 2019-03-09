<div class="fac-content-block" v-if="display_list">
    <div class="list-jobs-gp" v-for="facility in filtered_facilities">
        <div class="list-jobs-main">
        <div class="list-jobs-body">
            <div class="list-jobs-thumb">
            <figure class="list-jobs-img">
                <img class="img-fluid" :src="facility.image" alt="">
            </figure>
            </div><!-- .list-jobs-thumb -->
            <div class="list-jobs-summary space-pl-20"> 
            <h2 class="summary-heading">@{{facility.name}}</h2>
            <div class="list-label-gp space-pd-top-xs">
                <ul class="list-label-gp-inner">
                <li class="list-label-gp-item">
                    <span class="list-label list-label-circle">@{{facility.prefecture}}</span>
                </li>
                <li class="list-label-gp-item">
                    <span class="list-label list-label-circle">@{{facility.facility_category}}</span>
                </li>
                </ul><!-- .list-label-gp-inner -->
            </div><!-- .list-label-gp  -->
            <div class="list-gp-outline">
                <dl class="list-outline-list">
                <dt class="list-outline-head">施設担当者氏名：</dt>
                <dd class="list-outline-body"></dd>
                </dl>
                <dl class="list-outline-list">
                <dt class="list-outline-head">施設ID：</dt>
                <dd class="list-outline-body">@{{facility.id}}</dd>
                </dl>
                <dl class="list-outline-list">
                    <span class=""><dt class="list-outline-head">作成日時：</dt>
                    <dd class="list-outline-body">@{{ facility.created_date_time }}</dd></span>
                    <span class=" space-pl-10"><dt class="list-outline-head">作成日時：</dt>
                    <dd class="list-outline-body">@{{facility.updated_date_time}}</dd></span>
                </dl>
            </div><!-- .list-gp-outline -->
            </div><!-- .list-jobs-summary -->
            <ul class="list-jobs-action">
            <li class="list-action-item text-right"><a class="list-action-link" :href="facility.facility_edit_url">編集</a>
            {{-- <a href="{{ route('preview.fac_confirmation') }}" class="list-action-link space-pl-10">プレビュー</a></li> --}}
            </ul><!-- .list-jobs-action -->
        </div><!-- .list-jobs-body -->
        <div class="space-pd-btm-md">
            <div class="">
            <span class="list-label list-label-circle list-label-green">@{{facility.prefecture}}</span>
            {{-- <span class="list-label list-label-circle list-label-red">新規掲載申請中(0件)</span>
            <span class="list-label list-label-circle list-label-blue">掲載中(7件)</span>
            <span class="list-label list-label-circle list-label-grey">掲載中(7件)</span> --}}
            </div>
        </div>
        </div><!-- .list-jobs-main -->
        <div class="tour-guide-job-reg tour-btn-box">
        <a class="card-btn-link card-btn" :href="facility.job_create_url">＋ 求人を新規登録</a>
        </div><!-- .tour-guide-job-reg -->
        <div class="list-jobs-main-second" v-if="facility.jobs">
        <ul class="list-jobs-items">
            <li class="list-jobs-inner card-bdr-top" v-for="job in facility.jobs">
            <div class="list-jobs-body space-mt-none">
                <div class="list-jobs-thumb-second">
                <figure class="list-jobs-img">
                    <img class="img-fluid" :src="job.image" alt="">
                </figure>
                </div><!-- .list-jobs-thumb -->
                <div class="list-jobs-summary space-pl-20 list-summary-second"> 
                <span class="list-offer-name">@{{job.job_title}}</span>
                <span class="list-offer-employment">[@{{ job.employment_type }}]</span>
                {{-- <a href="#" class="list-action-link pull-right">プレビュー</a> --}}
                <div class="list-gp-outline">
                    <dl class="list-outline-list">
                    <dt class="list-outline-head">求人ID：</dt>
                    <dd class="list-outline-body">@{{job.id}}</dd>
                    </dl>
                    <p class="list-offer-txt space-pd-top-sm">@{{ job.appeal_title}}</p>
                    <dl class="list-outline-list space-pd-top-sm">
                    <span class=""><dt class="list-outline-head">作成日時：</dt>
                    <dd class="list-outline-body">@{{ job.created_date_time }}</dd></span>
                    <span class=" space-pl-10"><dt class="list-outline-head">作成日時：</dt>
                    <dd class="list-outline-body">@{{job.updated_date_time}}</dd></span>
                    </dl>
                </div><!-- .list-gp-outline -->
                </div><!-- .list-jobs-summary -->
                <ul class="list-jobs-action-second text-center">
                {{-- <li class="list-action-item">
                    <button type="button" class="card-btn card-btn-sm card-wd-100">求人原稿を確認</button>
                </li> --}}
                <li class="list-action-item space-pd-top-sm">
                    <a :href="job.edit_url">
                        <button type="button" class="card-btn card-btn-sm card-wd-100" >編集</button>
                    </a>
                    
                </li>
                {{-- <li class="list-action-item space-pd-top-sm">
                    <div>
                    <span class="list-label list-label-circle list-label-blue">神奈川県</span>
                    </div>
                </li> --}}
                {{-- <li class="list-action-item space-pd-sm">
                    <div>
                    <a href="#" class="list-action-link space-pl-10">プレビュー</a>
                    </div>
                </li> --}}
                </ul><!-- .list-jobs-action -->
            </div><!-- .list-jobs-body -->
            </li><!-- .list-jobs-inner -->
        </ul><!-- .list-jobs-items -->
        </div><!-- .list-jobs-main -->
    
    
    </div><!-- .list-jobs-gp -->
    </div>