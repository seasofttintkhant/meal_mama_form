@extends('layouts.app')

@section('content')
<!-- <div class="test-wrap"></div> -->
<div class="content e-none-content" id="app" v-cloak>
  <main class="facilities-main">
      <div class="facilities-content">
        <div class="second-sidebar">
          <div class="facilities-sidebar">
            <div class="fac-sidebar-nav">
              <div class="fac-nav-tree-inner">
                <div class="fac-scroll-inner">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default card-bdr-top">
                          <div class="panel-heading">
                              <a class="accordation-head card-fw-bold" @click.prevent="getJobSeekers" href="#"><span>すべて</span></a>
                          </div>
                        </div>
                        <div class="panel panel-default card-bdr-top ">
                        <div class="panel-heading">
                          <a class="accordation-head card-fw-bold" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="accordation-title">保存した検索条件</span><span class="accordation-icon "><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                        </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                              <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td class="card-bdr-top space-pl-20">
                                          <span class="nav-advice-item">検索条件を保存しておくと、検索が楽になるだけでなく、お知らせメールを受け取れるようになります</span>
                                        </td>
                                    </tr>
                                </table>
                              </div>
                          </div>
                        </div>
                        <div class="panel panel-default card-bdr-top">
                            <div class="panel-heading">
                            <a class="accordation-head card-fw-bold" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="accordation-title">掲載中の求人にマッチ</span><span class="accordation-icon "><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body card-fs-normal">
                                  <table class="table">
                                    <tr v-for="match_job_opening in match_job_openings">
                                        <td class="card-bdr-top accordation-pd-td">
                                          
                                            <a href="#" class="click_advance acc-secod-head" data-toggle="collapse" @click="getJobSeekers(match_job_opening.job_category_id)">
                                              <span class="accordation-title  space-pl-10 card-fw-normal">@{{match_job_opening.name}}</span>
                                              {{--<span class="accordation-icon" @click="showOption(match_job_opening.job_category_id)"><i class="fa fa-cog" aria-hidden="true"></i>
                                              </span>--}}
                                            </a>
                                            <div class="display_advance panel-collapse" v-if="optionBox[match_job_opening.id]">
                                              <div class="card-sub-nav-block">
                                                <div class="card-sub-nav-editor card-wd-214">
                                                  <div class="card-nav-section">
                                                    <span class="card-nav-title">
                                                      検索条件名
                                                    </span>
                                                    <div class="card-nav-body">
                                                      <span class="card-fw-bold card-medium-short">@{{match_job_opening.name}}</span>
                                                    </div>
                                                  </div><!-- .card-nav-section -->
                                                  <div class="card-nav-section">
                                                    <div class="card-nav-title space-pd-top-sm">
                                                    お知らせメール
                                                    </div>
                                                    <div class="card-nav-body">
                                                      <div>
                                                        <span class="pull-left">
                                                            <label class="common-radio">受信する
                                                              <input type="radio" checked="checked" name="radio">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                          </span>
                                                          <span class="pull-right">
                                                            <label class="common-radio">受信しない
                                                              <input type="radio" checked="checked" name="radio">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                          </span>
                                                      </div>
                                                      <p class="card-small-short card-font-grey">
                                                        ※「受信する」に設定するとこの検索条件に合致する求職者が登録された時にお知らせメールを受け取ることができます。
                                                      </p>
                                                    </div>
                                                  </div><!-- .card-nav-section -->
                                                  <div class="card-nav-section">
                                                    <button type="submit" class="blue-btn space-mt-auto card-wd-100 card-fw-bold">この内容で</button>
                                                  </div><!-- .card-nav-section -->
                                                </div>
                                              
                                              </div><!-- .card-sub-nav-editor -->
                                            </div>
                                        </td>
                                    </tr>
                                  </table>
                                </div>
                            </div>
                        </div>
                      <div class="panel panel-default card-bdr-top">
                       <div class="panel-heading">
                                 <a class="accordation-head card-fw-bold" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="accordation-title">気になる」した求職者</span><span class="accordation-icon "><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                          </div>
                          <div id="collapseFour" class="panel-collapse collapse">
                              <div class="panel-body card-fs-normal">
                                  <table class="table">
                                      <tr v-for="favorited_job in favorited_jobs">
                                          <td class="card-bdr-top accordation-pd-td">
                                              <a href="#" class="acc-secod-head" @click="getFavoritedJobSeekers(favorited_job.id)"> 
                                                <span class="acc-ellipsis accordation-title  space-pl-10 card-fw-normal">@{{favorited_job.name}} @{{favorited_job.prefecture_name}}</span>
                                              </a>
                                          </td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                                 <a class="accordation-head card-fw-bold" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="accordation-title">スカウト済みの求職者</span><span class="accordation-icon "><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                          </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body card-fs-normal">
                                    <table class="table">
                                        <tr v-for="scouted_job in scouted_jobs">
                                            <td class="card-bdr-top accordation-pd-td">
                                                <a href="#" class="acc-secod-head" @click="getScoutedJobSeekers(scouted_job.id)">
                                                  <span class="acc-ellipsis accordation-title  space-pl-10 card-fw-normal">@{{scouted_job.name}} @{{scouted_job.prefecture_name}}</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                      </div>
                      </div>
                    </div>
                </div><!-- .fac-scroll-inner -->
              </div><!-- .fac-nav-inner -->
            </div><!-- .fac-sidebar-nav -->
          </div><!-- .facilities-sidebar -->
        </div><!-- .second-sidebar -->
        
        <div class="facilites-content-inner">
          <div class="fac-content-block">
            <div class="space-pd-20">
              <form>
                <div class="filter-pannel clearfix">
                  <dl class="filter-pannel-item">
                    <dt class="filter-pannel-head e-pannel-head">職種</dt>
                    <dd class="filter-pannel-body">
                      <div class="filter-option">
                        <label class="filter-selectbox">
                          <select name="job_category_id" class="filter-selectbox-select">
                            <option value="">職種</option>
                            <option value="3">看護師/准看護師</option>
                            <option value="16">理学療法士</option>
                            <option value="15">作業療法士</option>
                            <option value="25">言語聴覚士</option>
                          </select>
                            <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></span>
                          </label>
                        </div>
                    </dd>
                    <dt class="filter-pannel-head text-center e-pannel-head">エリア</dt>
                    <dd class="filter-pannel-body">
                      <div class="filter-option">
                        <label class="filter-selectbox">
                          <select name="job_category_id" class="filter-selectbox-select">
                            <option value="0">都道府県</option>
                            <option value="1">北海道</option>
                            <option value="2">岩手県</option>
                            <option value="3">宮城県</option>
                            <option value="4">秋田県</option>
                          </select>
                            <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></span>
                          </label>
                        </div>
                    </dd>
                  </dl>
                  <div class="filter-pannel-btn">
                    <button type="submit" class="pannel-btn-submit e-pannel-submit">
                      <span class="icon-btn-blue">
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </span>
                      <span class="">検索する</span>
                    </button>
                    <a href="#" class="filter-details-link" style="display:none;">＋ 詳しい条件を指定</a>
                    <a href="#" class="pannel-right-link pull-right">条件をクリア</a>
                  </div>
                </div><!-- .filter-pannel -->
              </form>
            </div>
          </div><!-- .fac-content-block --> 
          <div class="card-counter space-pd-sm clearfix">
            {{--<div class="card-counter-inner pull-right">
              <div class="card-counter-item">
                <a href="/faq/?inquiry_type_value=17#contact-form" target="_blank" class="card-btn car-btn-small">スカウト増量プランのご案内</a>
              </div>
              <div class="card-counter-item">
                <span class="card-counter-txt">今月の残りスカウト送信数</span>
                <span class="card-counter-no">@{{scout_remaining_count}}</span>
              </div>
            </div>--}}<!-- .card-counter-inner -->
          </div><!-- .card-counter -->
            @include('searches.selection-list')
            @include('searches.popup')
            @include('searches.profile-popup')
        </div><!-- .facilites-content-inner -->
      </div><!-- .facilities-content -->
  </main><!-- .facilites-main -->
</div>
@endsection
@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
  var app = new Vue({
    el: '#app',
    data: {
      watch_profile : false,
      mulitple_scout : false,
      showDetailsModal : false,
      scout_remaining_count : 0,
      match_job_openings : [],
      optionBox : [] , 
      jobseekers : [],
      job_category_id : "",
      job_options : "",
      scout_jobs : [],
      show_message_options : false,
      employment_type : "",
      title : "",
      job_id : "",
      scout_employment_types : [],
      message_templates : [] , 
      message_content : "",
      scout_users : [],
      scout_send_button : false,
      enable_message_send : false ,
      scout_jobseeker_id : "",
      favorited_jobs : [],
      scouted_jobs : [] , 
      urlParams : [],
      scout_jobseeker_ids :[],
      profile : {},
      searchParams : {
        member_id : "",
        city_ids : [],
        prefecture_ids : [],
        job_category_ids : [],
        job_category_id : "",
        feature_ids : [],
        age_from : "",
        age_to : "",
        type : "",
        page : "",
        job_id : "",

      },
      pagination: {
          current_page: "",
          last_page: "",
          next_page_url : "",
          prev_page_url : "",
          pages : [],
          total : 0
      },
      full_url : ""
    },
    created(){
      this.urlParams = new URLSearchParams(window.location.search);
     
      this.full_url = window.location.protocol + "//" + window.location.host + window.location.pathname;

      this.searchParams.member_id =  this.urlParams.get('member_id') != null ? this.urlParams.get('member_id') : "";
      this.searchParams.type =  this.urlParams.get('type') != null ? this.urlParams.get('type') : 1;
      this.searchParams.city_ids.push(this.urlParams.get('city_ids'));
      this.searchParams.prefecture_ids.push(this.urlParams.get('prefecture_id'));
      this.searchParams.job_category_ids.push(this.urlParams.get('job_category_ids'));
      this.searchParams.feature_ids.push(this.urlParams.get('feature_ids'));
      this.searchParams.age_from = this.urlParams.get('age_from') != null ? this.urlParams.get('age_from') : ""
      this.searchParams.age_to = this.urlParams.get('age_to') != null ? this.urlParams.get('age_to') : "";
      this.searchParams.page = this.urlParams.get('page') != null ? this.urlParams.get('page') : "";
      this.searchParams.job_id = this.urlParams.get('job_id') != null ? this.urlParams.get('job_id') : "";
      
      var type = parseInt(this.searchParams.type);
      switch (type) {
        case 1:
          this.getJobSeekers();
        break;
        case 2:
          this.getFavoritedJobSeekers()
        break;  
        case 3 :
        this.getScoutedJobSeekers()
        break;
      }

      this.getScoutRemaining()
  
      this.match_job_openings = {!! $match_job_openings !!}
      this.favorited_jobs = {!! $favorited_jobs !!}
      this.scouted_jobs = {!! $scouted_jobs !!}

      this.getJobOptions();
      this.message_templates = {!! $message_templates !!}
    },
    methods: {  
       ScoutselectAll(){
        scout_users = [];

        if(this.$refs.select_all.checked == false) {
                this.scout_users = []
                this.select_all = false
                this.scout_send_button = false
        }else{
          this.jobseekers.forEach(function (jobseeker) {
          scout_users.push(jobseeker.id);
        });
        this.scout_users = scout_users
        this.scout_send_button = true
        }  
      },
      ScoutSelect(){
       
        if(this.scout_users.length > 0)
        {
          this.scout_send_button = true
        }
        else{
          this.scout_send_button = false
        }
      },
      getScoutRemaining(){
        this.$http.get('/messages/scout_count')
        .then(res => res.json())
        .then(res=>{
          this.scout_remaining_count = res.remaining_count
        });
      },
      showOption(id)
      {
        if(this.optionBox !=="")
        {
          for(var i;i<= this.optionBox.length;i++)
          {
            this.optionBox.splice(i,1);
          }
        }

        if(this.optionBox[id])
        {
          this.optionBox[id] = false
        }
        else{
          this.optionBox[id] = true
        }
      }, 
      getJobOptions()
      {
        this.$http.get('/searches/get_job_options')
        .then(res => res.json())
        .then(res=>{
          this.job_options = res.job_options
        });
      },
      getJobSeekers(id){
        this.clear_scout_data()
        this.searchParams.job_category_id = id
        this.searchParams.type = 1
        this.showloading()
        this.change_url();
        this.$http.get('/searches/get_jobseekers',{params : this.searchParams})
        .then(res => res.json())
        .then(res=>{
            this.jobseekers = res.data
            this.makePagination(res.meta, res.links);
            this.hideloading()
        });
      },
      makePagination(meta,links){
        var pages = [];
        for(var i=1;i<=  meta.last_page;i++)
        {
           pages.push(i);
        }

        if(pages != "" || pages !=null){
          this.show_pagination =true
        }
        this.pagination = {
              current_page: meta.current_page,
              last_page: meta.last_page,
              next_page_url : links.next,
              prev_page_url : links.prev,
            pages : pages,
            total : meta.total ,
        };
      },
      getFavoritedJobSeekers(id)
      {
        this.clear_scout_data()
        this.searchParams.job_category_id = id
        this.searchParams.type = 2
        if(id != null && id != "")
        {
          this.searchParams.job_id = id
        } 
        this.showloading()
        this.change_url()
        this.$http.get('/searches/get_favorited_jobseekers',{params : this.searchParams})
        .then(res => res.json())
        .then(res=>{
            this.jobseekers = res.data
            this.makePagination(res.meta, res.links);
            this.hideloading()
        });
      },
      getScoutedJobSeekers(id)
      {
        this.clear_scout_data()
        if(id != null && id != "")
        {
          this.searchParams.job_id = id
        }
        this.searchParams.type = 3
        this.showloading()
        this.change_url();
        this.$http.get('/searches/get_scouted_jobseekers',{params : this.searchParams})
        .then(res => res.json())
        .then(res=>{
            this.jobseekers = res.data
            this.makePagination(res.meta, res.links);
            this.hideloading()
        });
      },
      change_url(){
        var full_url= this.full_url
        var params = this.searchParams
        var query_str = ""
        query_str +='?'
        for(param in params)
        {
          query_str += param+'='+params[param]+'&'
        }
        query_str = query_str.substring(0, query_str.length - 1); 
        var new_url = full_url + query_str;
        window.history.pushState({path:new_url},'',new_url);

      },
      showMessageOptions(e)
      {
        var id = e.target.value
        if(id !=="")
        {
            
            this.scout_employment_types = ""
            var scout_employment_types = []
            this.message_content = ""
            for(job_option in this.job_options)
            {
              if (this.job_options.hasOwnProperty(job_option)) {   
                  if(this.job_options[job_option].id == id)
                  {
                      scout_employment_types.push({
                        id : this.job_options[job_option].employment_type,
                        name : this.job_options[job_option].employment_type_name
                    });
                  }
               
              }
              this.show_message_options = true
              
            }
  
            this.scout_employment_types = scout_employment_types;
        }
        else{
          this.show_message_options = false
          this.scout_employment_types = ""
          this.enable_message_send = false
        }
    
      },
      checkMessageBody()
      {
        if(this.message_content !== "")
        {
          this.enable_message_send= true
        }
        else{
          this.enable_message_send= false
        }
      },
      sendScout(){
        var title = $("#jod_id option:selected").text();
        var job_id = this.job_id
        var message_content = this.message_content
        var scout_users = [];
        if(this.scout_jobseeker_id != "" && this.scout_jobseeker_id != null)
        {
          scout_users.push(this.scout_jobseeker_id)
        }
        else{
          scout_users = this.scout_users
        }

        var data ={
          job_id,
          title,
          message_content,
          scout_users
        }
        
        this.$http.post("/messages/send_scout", data).then(response => {
              $('#scoutModal').modal('hide');
              }).catch(err =>{
            if (err.status == 422) {
              this.errors = err.data.error;   
            }
          })
        
      },
      getMessageTemplate(e){
        var id=e.target.value;
        if(id !== "")
        {
          this.$http.get("/messages/"+id+"/get_message_template")
          .then(response => {
            this.message_content = response.data.content
            this.enable_message_send= true
          });
        }
        else{
          this.content = ""
        }
      },
      changePage(page){
        
        this.searchParams.page = parseInt(page)
        var type = parseInt(this.searchParams.type);
        switch (type) {
          case 1:
            this.getJobSeekers();
          break;
          case 2:
            this.getFavoritedJobSeekers()
          break;  
          case 3 :
          this.getScoutedJobSeekers()
          break;
        }
      },
      clear_scout_data(){
        if(this.$refs.select_all && this.$refs.select_all.checked == true)
        {
          this.$refs.select_all.checked = false
        }
        
        this.scout_send_button = false
      },
      clearscoutPopup(multiple,job_seeker_id){
        this.mulitple_scout = multiple

        if(!multiple)
        {
          this.scout_jobseeker_id = job_seeker_id
        }
        this.job_id =""
        this.show_message_options = false
        this.scout_employment_types = ""
        this.message_content = ""
      },
      profilePopup(){
      },
      getProfile(employee_id,watch_profile){
      this.watch_profile = watch_profile
      this.$http.get('/searches/'+employee_id+'/get_jobseeker_profile')
          .then(res => res.json())
          .then(res=>{
              this.profile = res.data
              this.showProfileModal = true
              this.hideloading()
          });
      },
      closePopup(){
        this.job_id = ""
        this.employment_type = ""
        this.showScoutModal = false
        this.showProfileModal = false
       
      },
  
      showloading(){
        $('.h-popup-container').css({top:document.documentElement.scrollTop + 100});
        $('.loading-data').show();
      },
      hideloading()
      {
        $('.loading-data').hide();
      }
    }
  });
</script>
@endpush