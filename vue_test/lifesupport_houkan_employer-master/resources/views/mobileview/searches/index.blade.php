@extends('mobileview.layouts.app')

@section('content')
<div id="app" v-cloak>
<div class="o-m-page" >
    <div>
        <div class="search-header">
            <div class="pd-16">
                <div class="col">
                    <div class="c-m-page-header__title">
                        <h1 class="c-m-heading c-m-heading--white">求職者検索<a href="" class="m-question" title=""><i class="fa fa-question-circle-o" aria-hidden="true"></i></a>   </h1>

                    </div>
                </div>
                <div class="col">
                    <div class="search-header-icon pull-right m-pd-top-md text-right">
                        <a href="" title="" data-popup_target="#searchicon-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a href="" title="" data-popup_target ="#new-search-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="search-block m-pd-top-md c-m-box--bg-grey">
        <div>
                <div class="pd-16">
                    <div class="col">
                        <div class="">
            
                <div class="c-m-panel c-m-panel--border">
                    <div class="panel panel-primary" href="#demo" data-toggle="collapse">
                <div class="panel-heading">
                    <div class="c-m-box c-m-box--m">
                        <ul class="c-m-bordered-list">
                            <li class="row">
                                <div class="col pull-left"><div class="ds-o-flex__item"><h1 class="c-m-heading c-m-heading--l c-m-heading--grey">検索条件メニュー</h1></div></div>
                                <div class="col text-right d-flex">
                                <span id="list" class=" col pull-right c-m-drop-down-menu__icon listclickable">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                </span>
                                </div>
                            </li>
                            <li class="">
                                <div class="collapse" id="demo">
                                <a href="#" class="c-m-box-link" data-toggle="modal" data-popup_target ="#job-popup"><div class="ds-o-flex ds-o-flex--align-center"><div class="ds-o-flex__item">掲載中の求人にマッチ</div><div class="ds-o-flex__item ds-o-flex__item--right"></div></div></a>
                                </div>
                            </li>
                            <li class="">
                                <div class="collapse" id="demo">
                                <a href="#" class="c-m-box-link" data-toggle="modal" data-popup_target="#favorites-popup"><div class="ds-o-flex ds-o-flex--align-center"><div class="ds-o-flex__item">「気になる」した求職者</div><div class="ds-o-flex__item ds-o-flex__item--right"></div></div></a>
                                </div>
                            </li>
                            <li class="">
                                <div class="collapse" id="demo">
                                <a href="#" class="c-m-box-link" data-toggle="modal" data-popup_target="#scouted-popup"><div class="ds-o-flex ds-o-flex--align-center"><div class="ds-o-flex__item">スカウト済みの求職者</div><div class="ds-o-flex__item ds-o-flex__item--right"></div></div></a>
                                </div>
                            </li>
                        </ul>
                        </div>
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
                    <h1 class="c-m-heading c-m-heading--l m-pd-top-sm">@{{pagination.total}}<span>件</span></h1>
                </div>
                <div class="col">
                    <a href="#" class="c-m-button c-m-button--semicircle w-auto f-r" data-class_toggle="deep-theme" data-text_toggle="選択を解除" @click="toggleMultiSelect">求職者を複数選択</a>
                </div>
            </div>
            <div class="row m-pd-top" v-for="jobseeker in jobseekers">
                <div class="col">
                    <div class="m-member-card">
                        <div class="grid-checkbox" v-if="multi_select">
                            <label class="grid-checkbox-label">
                            <input :value="jobseeker.id" v-model="scout_users" name="" class="grid-checkbox-input" type="checkbox" @change="ScoutSelect()">
                            <span class="checkmark"></span>
                              </label>
                        </div>
                        <div class="m-member-card__body">
                            <div class="m-panel m-panel--border m-panel--grey s-expendable-panel">
                                <div class="c-m-box c-m-box--horizontal-m">
                                    <ul class="c-m-bordered-list">
                                        <li class="c-m-bordered-list__item">
                                            <div class="c-m-box m-pd-sm"><h1 class="c-m-heading c-m-heading--xl">@{{jobseeker.age}}歳&nbsp;@{{jobseeker.gender}}&emsp;@{{jobseeker.short_address}}&emsp;</h1></div>
                                            <div class="m-border-top">
                                                <div class="">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <dl class="m-collapse-table">
                                                                <div class="row m-pd-top">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">希望職種</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.desired_occupations">
                                                                                <span>@{{list}}</span><span v-if="index+1 < jobseeker.desired_occupations.length">,<br/> </span>
                                                                            </span>
                                                                        </dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">保有資格</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.qualification">
                                                                                <span>@{{list}}</span><span v-if="index+1 < jobseeker.qualification.length">,<br/> </span>
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
                                                                            <span>@{{jobseeker.graduation_description}}</span>
                                                                        </dd>
                                                                </div>
                                                            </dl><!-- .m-collapse-table -->
                                                        </div><!-- .panel-heading -->
                                                        <div class="s-is-collapsed" data-s_collapsed = "true">
                                                            <dl class="m-collapse-table">
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">希望勤務地</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.desired_workplaces">
                                                                                <span>@{{list}}</span><span v-if="index+1 < jobseeker.desired_workplaces.length">,<br/> </span>
                                                                            </span>
                                                                        </dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">希望勤務形態</dt>
                                                                        <dd class="col m-fs-sm">
                                                                            <span  v-for="(list, index) in jobseeker.desired_occupations">
                                                                                <span>@{{list}}</span><span v-if="index+1 < jobseeker.desired_occupations.length">,<br/> </span>
                                                                            </span>
                                                                        </dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">現職</dt>
                                                                        <dd class="col m-fs-sm"><span>@{{jobseeker.employment_situation}}</span></dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">会員番号</dt>
                                                                        <dd class="col m-fs-sm"><span>@{{jobseeker.id}}</span></dd>
                                                                </div>
                                                                <div class="row">
                                                                        <dt class="col-4 m-fw-bold m-fs-sm">最終ログイン</dt>
                                                                        <dd class="col m-fs-sm"><span>@{{jobseeker.last_login}}</span></dd>
                                                                </div>
                                                            </dl>
                                                        </div><!-- .panel-body -->
                                                        
                                                    </div><!-- .panel-primary -->
                                                    <div class="c-m-box c-m-box--vertical-m m-border-top m-pd-top">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="#" class="c-m-button" data-toggle="modal" data-target="#profile-popup" @click="getProfile(jobseeker.id,false)">プロフィール</a>
                                                                    
                                                                </div>
                                                                <div class="col">
                                                                    <a href="#" class="c-m-button c-m-button--primary" data-toggle="modal" data-target="#scout-popup"  @click="clearscoutPopup(false,jobseeker.id)">スカウト</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-space-md"></div>
                                                </div>
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
    
    <div class="o-m-fixed o-m-fixed--bottom" v-if="scout_users.length > 0">
        <div class="c-m-box c-m-box--s c-m-box--bg-white c-m-box--shadow-top">
        <button type="button" class="c-m-splitted-button" data-toggle="modal" data-target="#scout-popup" @click="clearscoutPopup(true)">
            <div class="container">
                <div class="row">
                    <div class="col-4 m-border-r">
                      <span class="c-m-text c-m-text--white m-fw-bold c-m-text--s-short">スカウト残数</span>
                      <span class="m-pd-top c-m-text c-m-text--white m-fw-bold c-m-text--helvetica">189</span><span class="c-m-text c-m-text--white m-fw-bold c-m-text--helvetica">/</span><span class="c-m-text c-m-text--white m-fw-bold c-m-text--helvetica">200</span>
                    </div>
                    <div class="col m-pd-top">
                        <span class="c-m-text c-m-text--white m-fw-bold">選択した求職者をスカウト</span>
                    </div>
                </div>
            </div>
        </button>
        </div>
     
    </div><!-- .o-m-fixed -->
    @include('mobileview.searches.scout_popup') 
    @include('mobileview.searches.searchbox') 
    @include('mobileview.searches.fill_popup')
    @include('mobileview.searches.job_popup')
    @include('mobileview.searches.favorites_popup')
    @include('mobileview.searches.scouted_popup')
    @include('mobileview.searches.profile_popup')
    @include('mobileview.searches.new_search_popup')


</div>



@endsection

@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
  var app = new Vue({
    el: '#app',
    data: {
      multi_select : false,
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
      selected_job_option_name : "",
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
      toggleMultiSelect()
      {
          if(this.multi_select)
          {
              this.multi_select= false
          }
          else{
              this.multi_select = true
              this.scout_users = []
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
      showMessageOptions(id)
      {
        
        if(id !=="")
        {
            this.job_id = id
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

                    this.selected_job_option_name=this.job_options[job_option].name
                  }
               
              }
              this.show_message_options = true
              
            }
  
            this.scout_employment_types = scout_employment_types;
        }
        else{
          this.clearMessageOption()
        }
    
      },
      clearMessageOption()
      {
          this.show_message_options = false
          this.scout_employment_types = ""
          this.enable_message_send = false
          this.selected_job_option_name = ""
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
          message_content,
          scout_users
        }

        
        this.$http.post("/messages/send_scout", data).then(response => {
              $('#scout-popup').modal('hide');
              $('#customer_message_template').val();
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

    $(document).on('click','.s-expendable-panel .panel-heading', function(){
        var check_collapsed = $(this).next(".s-is-collapsed").data("s_collapsed");
        if(check_collapsed == true) {    
            $(this).next(".s-is-collapsed").stop().slideDown();
            $(this).next(".s-is-collapsed").data("s_collapsed", false);
        }else{
            $(this).next(".s-is-collapsed").stop().slideUp();
            $(this).next(".s-is-collapsed").data("s_collapsed", true);
        }
    });

    $(document).on('click','.popup-close-open', function(){
        var popup_id_close = $(this).data("popup_close");
        $("#"+popup_id_close).modal("hide");
        $("body").addClass("cus-modal-open");
        var popup_id_open = $(this).data("popup_open");
        $("#"+popup_id_open).modal("show");
        $("body").addClass("cus-modal-open");
    });

    $(document).on('click','.rm-cus-modal-open', function(){
        $("body").removeClass("cus-modal-open");
    });

    $(document).click(function(event) {
        // to effcet except on modal
        if (!$(event.target).closest(".modal-dialog").length) {
            $("body").removeClass("cus-modal-open");
        }
    });


// for searh popup
    var default_text = "求人を選択";

    $(document).on("click",".expand-trigger",function(){
        var isExpanded = $(this).parent().hasClass("expanded");
        if(isExpanded){
            $(this).parent().removeClass("expanded");
            $(this).next(".expand-area").slideUp(200);      
        }else{              
            $(this).next(".expand-area").slideDown(200, function(){
                $(this).parent().addClass("expanded");
            });
        }           
    })

    $(document).on("click",".worrisome-checkbox",function(){
        var isChecked = $(this).prop("checked");
        if(isChecked){
            $(".worrisome-row").fadeIn("200");
        }else{
            $(".worrisome-row").fadeOut("200");
        }
    })

    $(document).on("click",".message-dismiss",function(){
        $(this).parent().removeClass("message-included");
        $(this).parent().text(default_text);
    })

    // for clone

    $(document).on("click",".example_clone_button_1",function(){
        eleClone("example_clone_1","example_cloned_element_container_1");
        // just parse class name
    })

    $(document).on("click",".example_clone_button_2",function(){
        eleClone("example_clone_2","example_cloned_element_container_2");
    })

    $(document).on("click",".clone-form-row-1",function(){
        eleClone("s-form-row-1","s-form-row-container-1");
    })

    $(document).on("click",".clone-form-row-2",function(){
        eleClone("s-form-row-2","s-form-row-container-2");
    })

    $(document).on("click",".remove_clone",function(){
        var cloned_element_class = $(this).data("clone_remove_element_class");
        var count = $("."+cloned_element_class).length;
        if(count > 1) {
            $(this).parents("."+cloned_element_class).remove();
        }   
    })

    function eleClone(ele_to_clone,where_to_place,remove_able = true) {
        var element = $("."+ele_to_clone+":last");
        var clone_element_id = element.data("clone_element_id")+1;
        element.clone().data("clone_element_id",clone_element_id).appendTo("."+where_to_place);
    }

    // for clone

    $(document).on("click","[data-popup_close]",function(event){
        event.preventDefault();
        var popup = $(this).data("popup_close");
        $(popup).fadeOut(200);
        $("body").removeClass("popup-is-opening");
    })

    $(document).on("click","[data-popup_target]",function(event){
        event.preventDefault();
        var popup = $(this).data("popup_target");
        $("body").addClass("popup-is-opening");
        $(popup).fadeIn(200);
    })

    $(document).on("click","[data-text_toggle]",function(event){
        event.preventDefault();
        var org_text = $(this).text();
        var new_text = $(this).data("text_toggle");
        if(org_text == new_text){
            $(this).text(org_text);
            $(this).data("text_toggle",new_text);
        }else{
            $(this).text(new_text);
            $(this).data("text_toggle",org_text);
        }
    })

    $(document).on("click","[data-class_toggle]",function(event){
        event.preventDefault();
        var new_class = $(this).data("class_toggle");
        if($(this).hasClass(new_class)){
            $(this).removeClass(new_class);
        }else{
            $(this).addClass(new_class);
        }
    })

</script>
@endpush