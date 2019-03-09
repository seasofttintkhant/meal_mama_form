@extends('layouts.app')

@section('content')
<div class="content e-none-content" id="app" v-cloak>
  <main class="facilities-main">
      <div class="facilities-content">
        <i class="fa fa-bars fa-2x toggle-btn" data-target="#second-sidebar"></i>
        <div id="second-sidebar" class="second-sidebar" style=""
        >
          <div class="facilities-sidebar">
            <div class="facilities-register">
              <div class="new-btn-box">
                <a class="new-btn-link" href="{{route('facilities.create')}}">＋ 施設を新規登録</a>
              </div><!-- .new-btn-box -->
            </div><!-- .facilities-register -->
            <div class="fac-sidebar-head">
              <div class="fac-sidebar-item">
                <form>
                  <div class="fac-search-box">
                    <input type="text" id="keyword" v-model="searchParams.name" placeholder="対象施設を検索" class="search-box-input">
                    <button type="submit" class="fac-search-btn" @click.prevent="getFaciliyNJobs(0)">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </div><!-- .fac-search-box -->
                  <div class="fac-text text-center">施設名・都道府県をスペース区切りで検索</div>
                </form>
              </div><!-- .fac-sidebar-item -->
              <div class="fac-sidebar-item">
                  <div class="panel-body"><table class="table">
                    <tbody>
                      <tr v-if="search_facility_category_name">
                        <td class="card-bdr-top space-pl-20">
                          <span class="nav-advice-item"> 施設形態 :</span>
                        </td>
                        <td class="card-bdr-top space-pl-20">
                          <span class="nav-advice-item"> @{{search_facility_category_name}}</span>
                        </td>
                      </tr>
                      <tr v-if="search_contact_name">
                        <td class="card-bdr-top space-pl-20">
                          <span class="nav-advice-item">担当者名 :</span>
                        </td>
                        <td class="card-bdr-top space-pl-20" >
                          <span class="nav-advice-item">@{{search_contact_name }}</span>
                        </td>
                      </tr>
                      <tr v-if="search_posting_status">
                        <td class="card-bdr-top space-pl-20">
                          <span class="nav-advice-item">掲載・登録状況 : </span>
                        </td>
                        <td class="card-bdr-top space-pl-20">
                          <span class="nav-advice-item">@{{search_posting_status}}</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                                 
                   
                 
              </div><!-- .fac-sidebar-item -->
              <div class="fac-sidebar-item space-pd-top-sm">
                <div class="text-center"><a class="fac-link" data-toggle="modal" data-target="#facility_narrow">＋ 施設の条件を詳しく絞り込む</a></div>
                <!-- Button trigger modal -->
              </div>
            </div><!-- .fac-sidebar-head -->
            <div class="fac-sidebar-nav">
              <div class="fac-nav-inner">
                <div class="fac-scroll-inner">
                  <ul class="fac-nav-list">
                    <li class="fac-nav-item">
                      <a class="fac-nav-link" @click.prevent="getFaciliyNJobs(0,true)">
                        <div class="fac-nav-link-inner">
                          <div class="fac-media">
                            <div class="fac-media-left">
                              <div class="fac-media-image">
                                <div class="fac-media-img-inner">
                                  <i class="fa fa-home" aria-hidden="true"></i>
                                </div>
                              </div><!-- .fac-media-image -->
                            </div><!-- .fac-media-left -->
                            <div class="fac-media-right">
                              <span class="fac-media-text">すべての施設<br><span>(@{{facility_total}}件)</span></span>
                            </div><!-- .fac-media-right -->
                          </div>
                        </div>
                      </a>
                    </li>
                    <li class="fac-nav-item" v-for="facility in facilities">
                      <a class="fac-nav-link" @click.prevent="getFaciliyNJobs(facility.id,true)">
                        <div class="fac-nav-link-inner">
                          <div class="fac-media">
                            <div class="fac-media-left">
                              <div class="fac-media-image">
                                  <img :src="facility.image" alt="" style="max-width:100%">
                              </div><!-- .fac-media-image -->
                            </div><!-- .fac-media-left -->
                            <div class="fac-media-right">
                              <span class="fac-media-text">@{{facility.name}}</span>
                            </div><!-- .fac-media-right -->
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul><!-- .fac-nav-list -->
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
                  <dl class="filter-pannel-item pannel-mg-none">
                    <dt class="filter-pannel-head">職種</dt>
                    <dd class="filter-pannel-body">
                      <div class="filter-option">
                        <label class="filter-selectbox">
                          <select id="job_category_id" v-model="searchParams.job_category_id" class="filter-selectbox-select">
                            <option value="">職種</option>
                            @foreach($job_categories as $job_category)
                              <option value="{{$job_category->id}}">{{$job_category->name}}</option>
                            @endforeach
                          </select>
                            <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></span>
                          </label>
                        </div>
                    </dd>
                  </dl>
                  <dl class="filter-pannel-item pannel-mg-none">
                    <dt class="filter-pannel-head">雇用形態</dt>
                    <dd class="filter-pannel-body">
                      <div class="filter-option">
                        <label class="filter-selectbox">
                          <select v-model="searchParams.employment_type" id="employment_type" class="filter-selectbox-select">
                            <option value="">雇用形態を選択</option>
                            @foreach($employment_types as $key => $value)
                              <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                          </select>
                            <span class="select-arrow"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></span>
                          </label>
                        </div>
                    </dd>
                  </dl>
                  <dl class="filter-pannel-item">
                    <dt class="filter-pannel-head">掲載ステータス</dt>
                    <dd class="filter-pannel-body">
                      <div class="filter-grid">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="1" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">下書き</span>
                              </label>
                              
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="2" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">新規掲載申請中</span>
                              </label>                  
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="3" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">応募受付終了</span>
                              </label>
                              
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="4" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">掲載中</span>
                              </label>
                              </div>
                            </div>
                          </div>
                        
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="5" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">掲載中かつ修正申請中</span>
                              </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="6" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">掲載中かつ修正中</span>
                              </label>                  
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="7" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">応募受付終了かつ修正中</span>
                              </label>
                              
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="">
                              <div class="grid-checkbox">
                                <label class="grid-checkbox-label">
                                <input type="checkbox" value="8" v-model="searchParams.job_status" class="job-status grid-checkbox-input">
                                <span class="checkmark"></span>
                                <span class="checkmark-text">掲載中</span>
                              </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- .filter-grid -->
                    </dd>
                  </dl>
                  <div class="filter-pannel-btn">
                    <div class="row">
                      <div class="col-12 text-center">
                        <button type="submit" class="pannel-btn-submit" @click.prevent="getFaciliyNJobs(0)">
                          <span class="icon-btn-blue">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </span>
                          <span class="">求人情報を絞り込む</span>
                        </button>
                        <a href="#" class="pannel-right-link pull-right pull-none" @click.prevent="clearForm(1)">条件をクリア</a>
                        
                        <div class="space d-lg-none d-md-none d-xl-block"></div>
                      </div>
                     
                      
                    </div>
                  </div>
                </div><!-- .filter-pannel -->
              </form>
            </div>
          </div>
          <div class="space"></div>
          <!-- list header -->
          <div class="fac-content-block" v-if="show_all_facilities">
            <div class="list-heading">
              <div class="space-pd-20 card-fw-bold">
                <dl>
                <div class="list-gp-item">
                    <span class="applicable-jobs-left">該当施設 @{{facility_total}}件</span>
                  </div>
                  <div class="list-gp-item">
                    <span class="applicable-jobs-right">該当求人 @{{job_total}}件</span>
                  </div>
                </dl>
              </div>
            </div><!-- .list-heading -->
          </div>
            <!-- list header -->
          <div class="space"></div>
          @include('facilities.partials.joblist')
          <div class="space"></div>
          <div class="fac-content-block" v-if="show_all_facilities">
            <div class="list-heading">
              <div class="space-pd-20 card-fw-bold">
                <dl>
                  <div class="list-gp-item">
                    <span class="applicable-jobs-left">該当施設 @{{facility_total}}件</span>
                  </div>
                  <div class="list-gp-item">
                    <span class="applicable-jobs-right">該当求人 @{{job_total}}件</span>
                  </div>
                </dl>
              </div>
            </div><!-- .list-heading -->
          </div>
            
        </div>
   
      </div><!-- .facilities-content -->
  </main><!-- .facilites-main -->
  @include('facilities.partials.popup')
</div>



@endsection

@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script>
var app = new Vue({
  el: '#app',
  data: {
    facilities: [],
    jobs : [],
    by_facility : false,
    all_facility : false,
    facility_total : 0,
    job_total:0,
    show_all_facilities : false,
    display_list : false,
    search_facility_category_name : "",
    search_contact_name  : "",
    search_posting_status : "",
    posting_statuses : {
        1 : "掲載あり",
        2 : "掲載なし",
        3 : "求人登録なし",
    },
    searchParams : {
      name : "",
      contact_name : "",
      job_status : [],
      facility_category_id : "",
      job_offer_existence : "",
      job_category_id : "",
      employment_type : "",
      facility_id : "",
    
    },
    filtered_facilities : [],
    full_url : "",
    urlParams : [],
    facility_categories : []
  },
  mounted : function(){
   
      this.urlParams = new URLSearchParams(window.location.search);
      this.full_url = window.location.protocol + "//" + window.location.host + window.location.pathname;
      this.facility_categories = {!! json_encode($facilityCategories) !!}
      this.searchParams.name =  this.urlParams.get('name') != null ? this.urlParams.get('name') : "";
      this.searchParams.contact_name =  this.urlParams.get('contact_name') != null ? this.urlParams.get('contact_name') : "";
      this.searchParams.job_category_id =  this.urlParams.get('job_category_id') != null ? this.urlParams.get('job_category_id') : "";
      this.searchParams.job_offer_existence =  this.urlParams.get('job_offer_existence') != null ? this.urlParams.get('job_offer_existence') : "";
      this.searchParams.employment_type =  this.urlParams.get('employment_type') != null ? this.urlParams.get('employment_type') : "";
      this.searchParams.facility_id =  this.urlParams.get('facility_id') != null ? this.urlParams.get('facility_id') : "";
      this.searchParams.facility_category_id =  this.urlParams.get('facility_category_id') != null ? this.urlParams.get('facility_category_id') : "";
      this.searchParams.job_status = this.urlParams.getAll('job_status') != null ? this.urlParams.getAll('job_status') : [];
      this.search_contact_name =  this.searchParams.contact_name
      this.search_facility_category_name = this.facility_categories[this.searchParams.facility_category_id]
      this.search_posting_status = this.posting_statuses[this.searchParams.job_offer_existence]
     
      if(this.isEmpty(this.searchParams))
      {
        this.fetchFacilities();
      }else{
        this.getFaciliyNJobs(0)
      }   
    

  },

  methods : {
    //Check If Object is Empty
    isEmpty(obj) {
        for(var key in obj) {
            if(obj.hasOwnProperty(key))
                return false;
        }
        return true;
    },
    clearForm(type){
      if(type == 1)
      {
        this.searchParams.job_status =[]
        this.searchParams.job_category_id =""
        this.searchParams.employment_type =""
  
      }
      else if(type == 2){
        this.searchParams.name =""
        this.searchParams.contact_name =""
        this.searchParams.job_offer_existence = ""
        this.searchParams.facility_category_id =""
      }     
    },
    clear_query(){
      this.searchParams = {
      name : "",
      contact_name : "",
      job_status : [],
      facility_category_id : "",
      job_offer_existence : "",
      job_category_id : "",
      employment_type : "",
      facility_id : "",
    
      }
      this.fetchFacilities();
    },
    fetchFacilities(cache){
 
        this.showloading()
        this.$http.get('/facilities/getdata')
        .then(res => res.json())
        .then(res=>{
            this.facilities = res.data;
            this.facility_total = res.total;
            this.hideloading()
        });
    },
    getFaciliyNJobs(id,sidebar=false){
      this.showloading()
      if(sidebar)
      {
        this.clear_query()
      }
      this.searchParams.facility_id = id
      this.change_url()      
      this.$http.get("/facilities/get_all_facility_jobs/",{params:this.searchParams})
        .then(res => res.json())
        .then(res => {
         
          if(!sidebar){
            this.facilities = res.facilities;
          
          }
          this.filtered_facilities = res.facilities;
          this.display_list = true;
          this.job_total = res.job_total;
          this.facility_total = this.facilities.length

          if(id == 0){
            this.show_all_facilities = true;
          }else{
            this.show_all_facilities = false;
          }
          this.hideloading()
        });
    },
    showloading(){
      $('.h-popup-container').css({top:document.documentElement.scrollTop + 100});
      $('.loading-data').show();
    },
    hideloading()
    {
      $('.loading-data').hide();
    },
    change_url(){
        var full_url= this.full_url
        var params = this.searchParams
        var query_str = ""
        query_str +='?'
        for(var param in params)
        { 
          // console.log(params[param])  
          if(param == "job_status"){
            for(var i in params[param]){
              params[param][i]
              query_str += param+'='+params[param][i]+'&'
            }
          }else{
            query_str += param+'='+params[param]+'&'
          }
        }
        query_str = query_str.substring(0, query_str.length - 1); 
        var new_url = full_url + query_str;
        window.history.pushState({path:new_url},'',new_url);

      },

  }
});

</script>
@endpush