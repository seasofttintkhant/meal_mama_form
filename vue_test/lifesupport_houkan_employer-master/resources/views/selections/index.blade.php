@extends('layouts.app')

@section('content')
<div class="content e-none-content" id="app" v-cloak>
  <main class="common-main">
    <div class="main-content">
      <div class="second-sidebar">
        <div class="common-sidebar selection-sidebar">
          <div class="fac-sidebar-nav">
            <div class="fac-nav-tree-inner">
              <div class="fac-scroll-inner">
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                            <span class="accordation-head card-fw-bold text-center">選考中</span>
                        </div>
                        <div class="panel-heading">
                            <a class="accordation-head card-fw-bold card-medium-short" href="#" @click.prevent="getAllOnGoingSelections">
                              <span>すべて 
                                  <span class="o-inline-form__item o-inline-form__item--right" v-if="on_going_count !== 0">
                                      <div class="o-horizonify">
                                        <div class="o-horizonify__item o-horizonify__item--5"></div>
                                        <div class="o-horizonify__item o-horizonify__item--5">
                                          <div class="c-badge">@{{on_going_count}}</div>
                                      </div>
                                    </div>
                                  </span>
                              </span>
                            </a>
                        </div>
                      </div>
                  
                      <div class="panel panel-default card-bdr-top ">
                        <div class="panel-heading">
                          <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(1)">
                            <span class="accordation-title card-fw-normal">応募済 
                                <span class="o-inline-form__item o-inline-form__item--right" v-if="status_1_count !== 0">
                                    <div class="o-horizonify">
                                      <div class="o-horizonify__item o-horizonify__item--5"></div>
                                      <div class="o-horizonify__item o-horizonify__item--5">
                                        <div class="c-badge">@{{status_1_count}}</div>
                                    </div>
                                  </div>
                                </span>
                            </span>
                          </a>
                        </div>
                      </div>
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                          <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(2)">
                            <span class="accordation-title card-fw-normal">書類選考中 
                                <span class="o-inline-form__item o-inline-form__item--right" v-if="status_2_count !== 0">
                                    <div class="o-horizonify">
                                      <div class="o-horizonify__item o-horizonify__item--5"></div>
                                      <div class="o-horizonify__item o-horizonify__item--5">
                                        <div class="c-badge">@{{status_2_count}}</div>
                                    </div>
                                  </div>
                                </span>
                            </span>
                          </a>
                          </div>
                      </div>
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                          <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(3)">
                            <span class="accordation-title card-fw-normal">面接日設定済   
                              <span class="o-inline-form__item o-inline-form__item--right" v-if="status_3_count !== 0">
                                <div class="o-horizonify">
                                  <div class="o-horizonify__item o-horizonify__item--5"></div>
                                  <div class="o-horizonify__item o-horizonify__item--5">
                                    <div class="c-badge">@{{status_3_count}}</div>
                                </div>
                              </div>
                            </span></span>
                          </a>
                          </div>
                      </div>
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                          <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(4)">
                            <span class="accordation-title card-fw-normal">面接実施中 
                                <span class="o-inline-form__item o-inline-form__item--right" v-if="status_4_count !== 0">
                                    <div class="o-horizonify">
                                      <div class="o-horizonify__item o-horizonify__item--5"></div>
                                      <div class="o-horizonify__item o-horizonify__item--5">
                                        <div class="c-badge">@{{status_4_count}}</div>
                                    </div>
                                  </div>
                                </span>
                            </span>
                          </a>
                          </div>
                      </div>
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                          <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(5)">
                            <span class="accordation-title card-fw-normal">内定済 
                                <span class="o-inline-form__item o-inline-form__item--right" v-if="status_5_count !== 0">
                                    <div class="o-horizonify">
                                      <div class="o-horizonify__item o-horizonify__item--5"></div>
                                      <div class="o-horizonify__item o-horizonify__item--5">
                                        <div class="c-badge">@{{status_5_count}}</div>
                                    </div>
                                  </div>
                                </span>
                            </span>
                          </a>
                          </div>
                      </div>
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                          <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(6)">
                            <span class="accordation-title card-fw-normal">内定承諾済 
                                <span class="o-inline-form__item o-inline-form__item--right" v-if="status_6_count !== 0">
                                    <div class="o-horizonify">
                                      <div class="o-horizonify__item o-horizonify__item--5"></div>
                                      <div class="o-horizonify__item o-horizonify__item--5">
                                        <div class="c-badge">@{{status_6_count}}</div>
                                    </div>
                                  </div>
                                </span>
                            </span>
                          </a>
                          </div>
                      </div>
                      <div class="panel panel-default card-bdr-top">
                        <div class="panel-heading">
                          <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(7)">
                            <span class="accordation-title card-fw-normal">入職日決定済 
                                <span class="o-inline-form__item o-inline-form__item--right" v-if="status_7_count !== 0">
                                    <div class="o-horizonify">
                                      <div class="o-horizonify__item o-horizonify__item--5"></div>
                                      <div class="o-horizonify__item o-horizonify__item--5">
                                        <div class="c-badge">@{{status_7_count}}</div>
                                    </div>
                                  </div>
                                </span>
                            </span>
                          </a>
                          </div>
                      </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                          <span class="accordation-head card-fw-bold text-center">選考済み</span>
                      </div>
                      <div class="panel-heading">
                          <a class="accordation-head card-fw-bold card-medium-short" href="#" @click.prevent="getAllOnDoneSelections">
                            <span>すべて 
                                <span class="o-inline-form__item o-inline-form__item--right" v-if="done_count !== 0">
                                    <div class="o-horizonify">
                                      <div class="o-horizonify__item o-horizonify__item--5"></div>
                                      <div class="o-horizonify__item o-horizonify__item--5">
                                        <div class="c-badge">@{{done_count}}</div>
                                    </div>
                                  </div>
                                </span>
                            </span>
                          </a>
                      </div>
                    </div>
                    <div class="panel panel-default card-bdr-top ">
                      <div class="panel-heading">
                        <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(8)">
                          <span class="accordation-title card-fw-normal">入職済
                              <span class="o-inline-form__item o-inline-form__item--right" v-if="status_8_count !== 0">
                                  <div class="o-horizonify">
                                    <div class="o-horizonify__item o-horizonify__item--5"></div>
                                    <div class="o-horizonify__item o-horizonify__item--5">
                                      <div class="c-badge">@{{status_8_count}}</div>
                                  </div>
                                </div>
                              </span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(9)">
                          <span class="accordation-title card-fw-normal">不採用 
                              <span class="o-inline-form__item o-inline-form__item--right" v-if="status_9_count !== 0">
                                  <div class="o-horizonify">
                                    <div class="o-horizonify__item o-horizonify__item--5"></div>
                                    <div class="o-horizonify__item o-horizonify__item--5">
                                      <div class="c-badge">@{{status_9_count}}</div>
                                  </div>
                                </div>
                              </span>
                          </span>
                        </a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(10)">
                          <span class="accordation-title card-fw-normal">内定辞退 
                              <span class="o-inline-form__item o-inline-form__item--right" v-if="status_10_count !== 0">
                                  <div class="o-horizonify">
                                    <div class="o-horizonify__item o-horizonify__item--5"></div>
                                    <div class="o-horizonify__item o-horizonify__item--5">
                                      <div class="c-badge">@{{status_10_count}}</div>
                                  </div>
                                </div>
                              </span>
                          </span>
                        </a>
                        </div>
                    </div>
                    <div class="panel panel-default card-bdr-top">
                      <div class="panel-heading">
                        <a class="accordation-head card-medium-short" href="#" @click.prevent="getSelectionsByStatus(11)">
                          <span class="accordation-title card-fw-normal">選考終了・離脱    
                            <span class="o-inline-form__item o-inline-form__item--right" v-if="status_11_count !== 0">
                              <div class="o-horizonify">
                                <div class="o-horizonify__item o-horizonify__item--5"></div>
                                <div class="o-horizonify__item o-horizonify__item--5">
                                  <div class="c-badge">@{{status_11_count}}</div>
                              </div>
                            </div>
                          </span>
                        </span>
                        </a>
                        </div>
                    </div>
                    </div>
                  </div>
              </div>
              </div><!-- .fac-scroll-inner -->
              </div><!-- .fac-nav-inner -->
            </div><!-- .fac-sidebar-nav -->
          </div><!-- .common-sidebar -->
      </div><!-- .second-sidebar -->
          
      <div class="common-content-inner card-selection-inner">
        <div class="fac-content-block">
          <div class="space-pd-20">
            <form>
              <dl class="filter-pannel-item">
                  <dt class="filter-pannel-head e-pannel-head">施設・求人</dt>
                  <dd class="filter-pannel-body">
                    <input v-model="job_or_facility_keyword" class="definition-text-field card-wd-100" placeholder="都道府県・施設名・募集職種をスペース区切りで検索" maxlength="100" type="text">
                  </dd>
              </dl>
              <div class="filter-pannel clearfix">
                <dl class="filter-pannel-item">
                  <dt class="filter-pannel-head e-pannel-head">求職者</dt>
                  <dd class="filter-pannel-body">
                    <input v-model="name_or_id_keyword" class="definition-text-field card-wd-100" placeholder="氏名・会員番号で検索" maxlength="100" type="text">
                  </dd>
                  <dt class="filter-pannel-head text-center e-pannel-head">メモ</dt>
                  <dd class="filter-pannel-body">
                    <input v-model="memo_keyword" class="definition-text-field card-wd-100" placeholder="メモ内でのキーワードで検索" maxlength="100" type="text">
                  </dd>
                </dl>
                <div class="filter-pannel-btn">
                  <button type="submit" class="space-mt-auto card-btn" @click.prevent="searchSelections">
                    <span class="icon-btn-blue">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                    <span class="">この条件で絞り込む</span>
                  </button>
                  <a href="#" class="pannel-right-link pull-right" @click.prevent="clearSearch">条件をクリア</a>
                </div>
              </div><!-- .filter-pannel -->
            </form>
          </div>
        </div><!-- .fac-content-block --> 
        <div class="space"></div>
  
        @include('selections.selection_list')
        @include('selections.message-popup')
        @include('selections.profile-popup')
        @include('selections.recruitment-popup')
        @include('selections.status-popup')
      </div><!-- .common-content-inner -->
    </div><!-- .common-content -->
  </main><!-- .common-main -->
</div><!-- .content -->
@endsection

@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
var url = "";
var params = {};
var state ="";
var status = "";
var app = new Vue({
  el: '#app',
  data: {
    displayBlock : {
      display : 'block'
    },
    profile : [],
    job_applications : [],
    showMessageModal : false,
    showDetailsModal : false,
    showStatusModal : false,
    showProfileModal : false,
    message : [],
    message_threads : [],
    content :"",
    message_template : "",
    application_status : "",
    application_id : "",
    memo : "",
    current_status : "",
    current_state : "ongoing",
    selections_get_url : "/selections/get_selections",
    job_or_facility_keyword : "",
    name_or_id_keyword : "",
    memo_keyword : "",
    job_application_total : 0,
    on_going_count : "",
    done_count : "",
    status_1_count : "",
    status_2_count : "",
    status_3_count : "",
    status_4_count : "",
    status_5_count : "",
    status_6_count : "",
    status_7_count : "",
    status_8_count : "",
    status_9_count : "",
    status_10_count : "",
    status_11_count : "",
    errors : []
  },
  created : function(){
      this.getAllOnGoingSelections();
      this.getApplicationCounts();
  },
  methods :{
    getApplicationCounts()
    {
      fetch("/selections/get_application_counts")
        .then(res => res.json())
        .then(res=>{
          this.on_going_count = res.data.on_going,
          this.done_count = res.data.done,
          this.status_1_count =res.data. status_1,
          this.status_2_count = res.data.status_2,
          this.status_3_count = res.data.status_3,
          this.status_4_count = res.data.status_4,
          this.status_5_count = res.data.status_5,
          this.status_6_count = res.data.status_6,
          this.status_7_count = res.data.status_7,
          this.status_8_count = res.data.status_8,
          this.status_9_count = res.data.status_9,
          this.status_10_count = res.data.status_10,
          this.status_11_count = res.data.status_11
        });
    },
    getAllOnGoingSelections()
    { 
      state = "ongoing";
      status = "";
      params = {
        state,
        status 
      };
      this.getSelections(params)
    },
    getAllOnDoneSelections()
    {
      state = "done";
      status = "";
      params = {
        state,
        status
      };

      this.getSelections(params)
    },
    searchSelections()
    {
      var job_or_facility_keyword = this.job_or_facility_keyword
      var name_or_id_keyword=  this.name_or_id_keyword
      var memo_keyword=  this.memo_keyword
      state = this.current_state
      status = this.current_status

      params ={
        state,
        status,
        job_or_facility_keyword,
        name_or_id_keyword,
        memo_keyword
      }

      this.getSelections(params);
    },
    getSelectionsByStatus(status){
      state  = "",
      params ={
        state,
        status
      }
      this.getSelections(params);
    },
    getSelections(params){
      this.showloading()    
  
      this.$http.get(this.selections_get_url,{params : params})
        .then(res => res.json())
        .then(res=>{
            this.current_status = params.status
            this.current_state = params.state
            this.job_application_total = res.total
            this.job_applications = res.job_applications;
            this.hideloading()
        });
    },
    messagePopup(message_id){

      this.showloading()
        fetch("/messages/"+message_id+"/get_message_threads")
        .then(res => res.json())
        .then(res=>{
            this.message_threads = res.message_threads;
            this.message = res.message;
            this.show_message_session = true;
            this.hideloading()
        });
      this.showMessageModal = true
    },
    detailsPopup(){
      this.showDetailsModal = true
    },
    statusPopup(job_application){
      this.application_status = job_application.status
      this.application_id = job_application.id
      this.showStatusModal = true
      state = this.current_state
      status = this.current_status
      params={
        state,
        status
      }
      this.getSelections(params)
    },
    getProfile(employee_id){
      this.$http.get('/searches/'+employee_id+'/get_jobseeker_profile')
          .then(res => res.json())
          .then(res=>{
              this.profile = res.data
              this.showProfileModal = true
          });
      },
    sendMessage(e){
      e.preventDefault();
      var content = this.content

      var data ={
        content
      }
      this.$http.post("/messages/"+this.message.id+"/send_message", data).then(response => {
           this.content = ""
            this.messagePopup(this.message.id);
            }).catch(err =>{
          if (err.status == 422) {
            this.errors = err.data.errors;   
          }
        })
      
    },
    getMessageTemplate(e){
      var id=e.target.value;
      if(id !== "")
      {
        this.$http.get("/messages/"+id+"/get_message_template")
        .then(response => {
          this.content = response.data.content
        });
      }
      else{
        this.content = ""
      }
    },
    changeStatus(){
      var application_status = this.application_status
      var data = {
        application_status
      }
      this.showloading()
      this.$http.post("/selections/"+this.application_id+'/change_application_status',data).then(response => {
            state = this.current_state
            status = this.current_status
            params={
              state,
              status
            }
            this.getSelections(params)
            this.getApplicationCounts();
            this.showStatusModal = false  
            this.hideloading()
           
          })
    },
    addMemo(application_id){
      var memo =$("textarea[data-id='"+application_id+"']").val(); 
      var data = {
        memo
      }
      this.$http.post("/selections/"+application_id+'/memo',data).then(response => {
            state = this.current_state
            status = this.current_status
            params={
              state,
              status
            }
            this.getSelections(params)
          })
    },
    closePopup(){
      this.showMessageModal = false
      this.showDetailsModal = false
      this.showStatusModal = false
      this.showProfileModal = false
     
    },
    clearSearch(){
      this.job_or_facility_keyword = ""
      this.name_or_id_keyword = ""
      this.memo_keyword = ""
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
