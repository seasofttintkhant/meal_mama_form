@extends('mobileview.layouts.app')

@section('content')
<div class="" id="app" v-cloak>
	<div class="search-header">
			<div class="row pd-16">
				<div class="col">
					<div class="c-m-page-header__title">
						<h1 class="c-m-heading c-m-heading--white">求職者検索<a href="" class="m-question" title=""><i class="fa fa-question-circle-o" aria-hidden="true"></i></a>	</h1>

					</div>
				</div>
				<div class="col">
					<div class="search-header-icon m-pd-top-md text-right">
						<a href="{{route('searches.index')}}" title=""><i class="fa fa-search" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	<div class="o-m-page__body">
		<div>
			<div>
				<div class="c-m-box c-m-box--bg-grey">
					<ul class="c-m-bordered-list">
						<li class="c-m-bordered-list__item">
							<div class="c-m-box c-m-box--m c-m-box--bg-white">
								<div class='c-m-box c-m-box--align-right'>
									
								</div>
										<div class="c-m-box c-m-box--align-center"><div class="ds-o-flex ds-o-flex--col ds-o-flex--align-center ds-o-flex--s">
											<div class="container">
												<div class="row">
													<div class="col">
														<div class="ds-o-flex__item">
															<img src="mobile/img/homepage_icon.png" class="img-fluid " alt="Header Logo">
														</div>
										
													</div>
												</div>
												<div class="row">
													<div class="col">
															<div class="ds-o-flex__item">
																<span class="c-m-text c-m-text--black c-m-text--bold">採用管理画面が<br>スマートフォンに対応しました</span>
															</div>
										
													</div>
												</div>
												<div class="row">
													<div class="col">
														<div class="ds-o-flex__item">
															<span class="c-m-text c-m-text--black c-m-text--s-short">スカウトやメッセージがスマートフォンでも送るこ<br>とができます。他の機能も順次対応していきます。</span>
														</div>
										
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>
						</li>
						<li class="c-m-bordered-list__item">
							<div class="c-m-box c-m-box--m"></div>
							<div class="">
								<div class="mobile-box-menu">
								<div class="m-menu-item">
									<a href="{{route('searches.index')}}" title="" class="c-m-box-link text-center">
										<div>
											<div><i class="fa fa-search fa-2x" aria-hidden="true"></i></div>
											<h3 class="c-m-heading c-m-heading--l m-pd-top">求職者検索</h3>
										</div>
									</a>
								</div>
								<div class="m-menu-item">
									<a href="{{route('message.index')}}" title="" class="c-m-box-link text-center">
										<div>
											<div><i class="far fa-comments fa-2x"></i></div>
											<h3 class="c-m-heading c-m-heading--l m-pd-top">メッセージ</h3>
										</div>
									</a>
								</div>
								<div class="m-menu-item">
									<a href="{{route('selections.index')}}" title="" class="c-m-box-link text-center">
										<div>
											<div><i class="fas fa-box-open fa-2x"></i></div>
											<h3 class="c-m-heading m-pd-top c-m-heading--l">お知らせ</h3>
										</div>
									</a>
								</div>
							</div>
							</div>
							<div class="c-m-box c-m-box--sm"></div>
							<div class="c-m-box--bg-white">
								<div class="mobile-scout-block">
									<div class="container">
										<div class="row">
											<div class="col">
												<div class="c-m-box m-pd-top-bm-md"><h1 class="c-m-heading c-m-heading--l">おすすめ求職者</h1></div>
											</div>
											</div>
									</div><!-- .container -->
			<div class="m-scrollable-list">
				<div class="container width-100">
					<div class="row">
						<div class="col">							
							<ul class="m-scrollable-list__inner">
								<li class="m-scrollable-list__item" v-for="jobseeker in jobseekers">
									<div class="m-member-card">
										<div class="m-member-card__body">
											<div class="m-panel m-panel--border m-panel--grey">
												<div class="c-m-box c-m-box--horizontal-m">
													<ul class="c-m-bordered-list">
														<li class="c-m-bordered-list__item">
																<div class="c-m-box m-pd-sm"><h1 class="c-m-heading c-m-heading--xl">@{{jobseeker.age}}歳&nbsp;@{{jobseeker.gender}}&emsp;@{{jobseeker.short_address}}</h1></div>
																<div class="m-border-top">
																<div class="">
																	<div class="panel panel-primary" href="#demo" data-toggle="collapse">
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
																				<div class="collapse" id="demo1">
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
																		<div class="c-m-box c-m-box--vertical-m m-border-top m-pd-top">
																			<div class="row">
																				<div class="col">
																					<button type="button" class="c-m-button" data-toggle="modal" data-target="#profile-popup" @click="getProfile(jobseeker.id)">プロフィール</button>
																				</div>
																				<div class="col">
																					<a href="#" class="c-m-button c-m-button--primary" data-toggle="modal" data-target="#scout-popup" @click="scoutPopup(jobseeker.id)">スカウト</a>
																				</div>
																			</div>
																		</div>
																		<div class="m-space-md"></div>
																	</div><!-- .panel-primary -->
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div><!-- .m-member-card -->
								</li>				
							</ul>
						</div>
						</div>
					</div><!-- .container -->
				</div>
			</div>
								<div class="m-space-md"></div>
							</div>
							<div class="">
								<div class="c-m-box c-m-box--sm"></div>
								<div class="c-m-box c-m-box--bg-white">
									<ul class="c-m-bordered-list">
										<li class='c-m-bordered-list__item'>
												<div class="c-m-box c-m-box--vertical-xl c-m-box--horizontal-m">
												<div class="ds-o-flex--justify-space-between m-pd-bm">
													<div class="ds-o-flex__item pull-left"><h1 class="c-m-heading c-m-heading--l">お知らせ</h1></div>
													<div class="ds-o-flex__item pull-right"><a href="{{route('announcement.index')}}" class="c-m-text-link c-m-text-link--small">もっと見る</a></div>
												</div>
											</div>
										</li>
										@foreach($announcements as $announcement)
											<li class='c-m-bordered-list__item'>
												<a class="un-link m-display-block" href="#" title=""  data-toggle="modal" data-target="#announcement-popup" @click="getAnnouncement({{$announcement->id}})">
													<div class="c-m-box c-m-box--vertical-xl c-m-box--horizontal-m">
														<div class="">
															<div class="ds-o-flex__item"><h1 class="c-m-heading c-m-heading--l">{{$announcement->title}}</h1></div>
															<div class="ds-o-flex__item">
																<span class="c-m-text c-m-text--grey m-fw-bold c-m-text--helvetica c-m-text--s-short">{{isset($announcement->updated_at) && !empty($announcement->updated_at) ? date('Y/m/d H:i',$announcement->updated_at->timestamp) : ""}}</span>
															</div>
														</div>
													</div>
												</a>
											</li>	
										@endforeach
									
								
									
									</ul>
								</div>
							</div>

						</li>

					</ul>
				</div>
			</div>
		</div>
	</div><!-- .o-m-page__body -->
	@include('mobileview.announcements.popup')
	@include('mobileview.searches.profile_popup')
	@include('mobileview.searches.scout_popup') 
	@include('mobileview.searches.fill_popup')
	
 </div>
@endsection

@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
var app = new Vue({
    el: '#app',
    data: {
		mulitple_scout : false,
		jobseekers :  [],
		announcement_title : "",
    announcement_body : "",
		announcement_date : "", 
		get_announcement_url : "{{route('announcement.get_announcement', ':id')}}",
		show_message_options : false,
		employment_type : "",
		title : "",
		job_id : "",
		scout_employment_types : [],
		message_templates : [] , 
		message_content : "",
		scout_jobseeker_id : "",
		profile : {},
		job_options : [],
		enable_message_send : false
	},
	created(){
		
		this.get_recommended_jobseekers()
		this.getJobOptions();
		this.message_templates = {!! $message_templates !!}
	},
	methods : {
		get_recommended_jobseekers(){
			this.$http.get('/get_recommended_jobseekers')
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
      },
	  getJobOptions()
      {
        this.$http.get('/searches/get_job_options')
        .then(res => res.json())
        .then(res=>{
          this.job_options = res.job_options
        });
      },
	  scoutPopup(job_seeker_id){

        
        this.scout_jobseeker_id = job_seeker_id
        
        this.job_id =""
        this.show_message_options = false
        this.scout_employment_types = ""
        this.message_content = ""
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
              }).catch(err =>{
            if (err.status == 422) {
              this.errors = err.data.error;   
            }
          })
        
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
	  getProfile(employee_id){

      this.$http.get('/searches/'+employee_id+'/get_jobseeker_profile')
          .then(res => res.json())
          .then(res=>{
              this.profile = res.data
          });
      },
	}
})
</script>
@endpush