@extends('layouts.app')

@section('content')
<div class="content e-none-content" id="app" v-cloak>
  <main class="common-main">
    <div class="common-content">
      <div class="second-sidebar">
        <div class="common-sidebar message-group-sidebar">
          <div class="fac-sidebar-head">
              {{--<div class="fac-sidebar-item">
                <form>
                  <div class="fac-search-box">
                    <input type="text" value="" placeholder="対象施設を検索" class="search-box-input card-wd-90">
                    <button type="submit" class="fac-search-btn">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </div><!-- .fac-search-box -->
                  <div class="fac-text text-center">施設名・都道府県をスペース区切りで検索</div>
                </form>
              </div>--}}<!-- .fac-sidebar-item -->
              {{--<div class="space"></div>--}}
              <div class="fac-sidebar-item space-pd-top-sm" style="display:none;">
                <div class="text-center"><a class="fac-link">＋ 施設の条件を詳しく絞り込む</a></div>
              </div>
              <div class="space-mt-auto space-pd-top-sm">
                <nav class="">
                <div class="card-switcher">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="card-switcher-item nav-item active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true" @click.prevent="fetchMessages(0)">すべて</a>
                        <a class="card-switcher-item nav-item" id="unread-tab" data-toggle="tab" href="#unread" role="tab" aria-controls="unread" aria-selected="false" @click.prevent="fetchMessages(1)">未読</a>
                        <a class="card-switcher-item nav-item" id="unanswer-tab" data-toggle="tab" href="#unanswer" role="tab" aria-controls="unanswer" aria-selected="false" @click.prevent="fetchMessages(2)">未返信</a>
                     </div>
                </div>
            </nav>
              </div>
          </div><!-- .fac-sidebar-head -->
          <div class="fac-sidebar-nav">
            <div class="fac-nav-tree-inner">
              <div class="fac-scroll-inner">
                <div class="row">
                  <div class="col-md-12">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <ul class="fac-nav-list">
                      <li class="fac-nav-item" v-for="message in messages">
                        <a class="fac-nav-active fac-nav-link" @click.prevent="getMessageThreads(message.id)">
                          <div class="fac-nav-link-inner card-msg-nav">
                            <div class="card-msg-summary">
                              <div class="card-msg-summary-item">
                                <dl class="card-inline-form">
                                  <span class="card-inline-item">
                                    <span></span>
                                  </span>
                                  <span class="card-inline-item">
                                    <span class="card-msg-body">
                                      <span class="card-msg-user card-middle">
                                        @{{message.employee_name}}
                                      </span>
                                      <span class="card-msg-info card-middle">
                                        <dl class="card-inline-form card-fw-bold">
                                          <span class="card-inline-item space-pr-xs">
                                            <span>@{{message.employee_id}}</span>
                                          </span>
                                          <span class="card-inline-item space-pl-5 card-bdr-left">
                                            <span>
                                              <span class="u-fw-bold">@{{message.employee_age}}歳 @{{message.employee_gender == 1 ? '男性' : '女性' }}</span>
                                            </span>
                                          </span>
                                        </dl>
                                      </span><!-- .card-msg-info -->
                                      <span>
                                        <div class="card-msg-title">
                                          <div class="card-msg-ellipsis card-fw-bold">
                                          @{{message.title_excerpt}}
                                          </div>
                                        </div>
                                      </span>
                                      <span>
                                        <div class="card-msg-content card-fw-bold">
                                          <span>@{{message.content_excerpt}}</span>
                                        </div>
                                      </span>
                                      <span>
                                        <div class="card-msg-foot">
                                          <div class="card-flex">
                                            <div class="card-flex-item">
                                             <span class="card-msg-date">@{{message.last_sent}}</span>
                                            </div>
                                          </div>
                                        </div>
                                      </span>
                                    </span><!-- .card-msg-body -->
                                  </span>
                              </dl>
                              </div>
                            </div><!-- .card-msg-summar -->
                          </div>
                        </a>
                      </li>
                     
                    </ul><!-- .fac-nav-list -->
                  </div>
                </div>
                  </div>
                </div>
                </div><!-- .fac-scroll-inner -->
            </div><!-- .fac-nav-inner -->
          </div><!-- .fac-sidebar-nav -->
        </div><!-- .common-sidebar -->
      </div><!-- .second-sidebar -->

      @include('messages.threads')
    </div><!-- .common-content -->
  </main><!-- .common-main -->
</div><!-- .content -->
@endsection

@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
var app = new Vue({
  el: '#app',
  data: {
    messages: [],
    message_threads : [],
    message :[],
    show_message_session : false,
    content : "",
    message_type : "",
    message_template : "",
    errors : []
  },
  mounted : function(){
      this.fetchMessages();
  },
  methods : {
    fetchMessages(status){
        this.showloading()
        this.$http.get("/messages/getdata",{params : {status : status}})
        .then(res => res.json())
        .then(res=>{
            this.messages = res.data;
            this.hideloading()
        });
    },
    getMessageThreads(id){
      this.showloading()
        fetch("/messages/"+id+"/get_message_threads")
        .then(res => res.json())
        .then(res=>{
            this.message_threads = res.message_threads;
            this.message = res.message;
            this.show_message_session = true;
            this.hideloading()
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
            this.getMessageThreads(this.message.id);
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