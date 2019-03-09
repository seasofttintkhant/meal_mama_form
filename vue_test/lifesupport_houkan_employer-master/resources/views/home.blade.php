@extends('layouts.app')

@section('content')
<div class="content" id="app">
@include('home_popups')
  <main class="main-with-sidebar">
    <div class="card h-card h-p-30">
      <img src="img/smartphone-release.png" class="img-fluid">
    </div>
    <div class="space"></div>
    <div class="card h-card">
      <div class="card-header h-border-buttom">
        <div class="d-flex justify-content-between">
          <div class="row">
            <div class="col-md-3 col-12">
              <span><strong>おすすめの求職者</strong></span>
            </div>
            <div class="col-md-7 col-12">
              <span class="text-center card-small-short">気になる求職者にスカウトを送って、応募を促しましょう</span>
            </div>
            <div class="col-md-2 col-12">
              <a class="btn h-button-sm" href="{{route('searches.index')}}">もっとみる</a>
            </div>
          </div>
        </div>
      </div><!-- .card-header -->
      <div class="card-body h-no-padding">
        <div class="d-flex h-flex recommended-candidates">

          {{-- Loop        --}}
          <div class="p-2 flex-fill e-flex-fill" v-for="jobseeker in jobseekers">
            <a class="card-block card-small-short text-center space-pd-20" :href="'/searches?member_id='+jobseeker.id">
              <div class="card-font-black">@{{jobseeker.qualification != null ? jobseeker.desired_occupations[0] : ""}}</div>
              <div class="space-mt-10">
                <span class="card-label space-mt-auto  label-semicircle">
                  <div class="card-group-item">
                    <div class="card-group-item-box">
                      <span class="card-font-md">@{{jobseeker.age}}歳</span>
                    </div>
                    <div class="card-group-item-box">
                      <span class="">@{{jobseeker.gender}}</span>
                    </div>
                  </div>
                </span>
              </div>

              <div class="card-font-grey space-pd-top-sm">@{{jobseeker.short_address}}</div>
              <div class="card-font-grey space-pd-top-sm">会員番号 : @{{jobseeker.id}}</div>
            </a>
          </div>    
         {{-- Loop      --}}
        </div>
      </div>
    </div><!-- .card-head -->
    <div class="space"></div>

    <div class="row h-no-margin application">
      <div class="col-md-8 col-12 col-sm-6 h-no-p-l h-mobile-no-p-r">
        <div class="card h-card d-flex">
          <div class="row h-no-margin">
            <div class="p-2 e-flex-fill flex-fill h-border-right">
              <a class="card-block card-small-short text-center space-pd-20" href="#">
                <div class="card-fw-bold space-pd-btm-sm">未確認の応募</div>
                <span class="card-fw-md-bold space-pd-top-sm">0</span><span class="card-font-sm-grey grey-pd-sm">件</span>
              </a>
            </div>
            <div class="p-2 e-flex-fill flex-fill">
             <a class="card-block card-small-short text-center space-pd-20" href="#">
              <div class="card-fw-bold space-pd-btm-sm">未読メッセージ</div>
              <span class="card-fw-md-bold space-pd-top-sm">0</span><span class="card-font-sm-grey grey-pd-sm">件</span>
            </a>
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12 col-sm-6 pd-top-xs pd-left-sm h-no-padding">
        <div class="card h-card d-flex">
          <div class="row h-no-margin">
            <div class="p-2 e-flex-fill flex-fill h-border-right">
              <a class="card-block card-small-short text-center space-pd-20" href="#">
                <div class="card-fw-bold space-pd-btm-sm">募集中の施設</div>
                <span class="card-fw-md-bold space-pd-top-sm">1</span><span class="card-font-sm-grey grey-pd-sm">件</span>
              </a>
            </div>
            <div class="p-2 e-flex-fill flex-fill">
              <a class="card-block card-small-short text-center space-pd-20" href="#">
                <div class="card-fw-bold space-pd-btm-sm">募集中の求人</div>
                <span class="card-fw-md-bold">7</span><span class="card-font-sm-grey grey-pd-sm">件</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="space"></div>
    <section class="card-list">
      <div class="row h-no-margin">
        <div class="card-wd-100">
          <div class="auto-wd col-lg-2 col-md-2 col-sm-3 pull-left card-list-left title-bdr-xs">
            <span class="card-medium-short card-fw-bold">お知らせ</span>
          </div>
          <div class="auto-wd col-lg-10 col-md-10 col-sm-9 pull-right card-list-right">
            <div class="card-feed">
              <ol class="card-feed-inner pd-top-xs">
                @foreach($announcements as $announcement)
                <li class="card-feed-item">
                  <div class="card-feed-item-inner" data-toggle="modal" data-target="#showAnnouncementInfo" @click = "getAnnouncement({{$announcement->id}})">
                    <div class="card-feed-date">{{date("d/m/Y", $announcement->created_at->timestamp)}}</div>
                    <a class="card-link card-feed-link">{{$announcement->title}}</a>
                  </div>
                </li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section><!-- .card-list -->
    <section class="card-list space-pd-top-md">
      <div class="row h-no-margin">
        <div class="card-wd-100">
          <div class="auto-wd col-lg-2 col-md-2 acol-md-3 col-sm-3 pull-left card-list-left title-bdr-xs">
            <span class="card-medium-short card-fw-bold">その他</span>
          </div>
          <div class="auto-wd col-lg-10 col-md-10 col-sm-9 pull-right card-list-right">
            <div class="pl-none">
              <a class="card-inline-tbl" href="#">
                <div class="card-icon-txt card-link card-medium-short">
                  <div class="card-icon-txt-icon">
                    <div class="card-icon-txt-inner card-rotate-360">
                      <span class="">
                        <i class="fa fa-th-list" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                  <div class="card-icon-txt">採用単価下限表はこちら</div>
                </div>
              </a>
              <a class="card-inline-tbl pl-none space-pl-10" href="#">
                <div class="card-icon-txt card-link card-medium-short">
                  <div class="card-icon-txt-icon">
                    <div class="card-icon-txt-inner">
                      <span class="">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                  <div class="card-icon-txt">オプションプランのご案内はこちら</div>
                </div>
              </a>
              <a class="card-inline-tbl pl-none space-pl-10" href="#">
                <div class="card-icon-txt card-link card-medium-short">
                  <div class="card-icon-txt-icon">
                    <div class="card-icon-txt-inner card-rotate-360">
                      <span class="">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                  <div class="card-icon-txt">採用単価下限表はこちら</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="space"> </div>
    <div class="space"> </div>
  </main>
</div>
@endsection
@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script type="text/javascript">
  
  var vue = new Vue({
    el: "#app",
    data: {
      announcement_title : "",
      announcement_body : "",
      get_announcement_url : "{{route('announcement.get_announcement', ':id')}}",
      jobseekers : []
    },
    created(){
      this.get_recommended_jobseekers()
    },
    methods: {
      	get_recommended_jobseekers(){
          this.$http.get('/get_recommended_jobseekers?limit=3')
            .then(res => res.json())
            .then(res=>{
              this.jobseekers = res.data
            });
        },
      getAnnouncement(id) {
        this.announcement_title = "";
        this.announcement_body = "";
        var get_announcement_url = this.get_announcement_url;
        get_announcement_url = this.get_announcement_url.replace(":id",id);
        this.$http.get(get_announcement_url)
        .then(res => res.json())
        .then(res => {
          this.announcement_title = res.announcement_info.title;
          this.announcement_body = res.announcement_info.body;
        });
        // alert(job_id);
      },
    }
  })

</script>
@endpush