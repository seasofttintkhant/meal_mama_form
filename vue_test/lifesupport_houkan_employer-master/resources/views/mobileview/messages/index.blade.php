@extends('mobileview.layouts.app')

@section('content')
<div class="content" id="app" v-cloak>
    <div>
        <div class="search-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="c-m-page-header__title">
                        <h1 class="c-m-heading c-m-heading--white">求職者検索<a href="" class="m-question" title=""><i class="fa fa-question-circle-o" aria-hidden="true"></i></a>   </h1>

                    </div>
                </div>
                <div class="col">
                    <div class="search-header-icon text-right m-pd-top-md">
                        <a href="" title="" data-toggle="modal" data-target="#message-header-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="message-block">
        <div class="">
            <nav class="">
               <div class="card-switcher">
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="card-switcher-item nav-item active" id="m1-tab" data-toggle="tab" href="#message1" role="tab" aria-controls="message1" aria-selected="true">すべて</a>
                  <a class="card-switcher-item nav-item" id="m2-tab" data-toggle="tab" href="#message2" role="tab" aria-controls="message2" aria-selected="false">未読</a>
                  <a class="card-switcher-item nav-item" id="m3-tab" data-toggle="tab" href="#message3" role="tab" aria-controls="message3" aria-selected="false">未使用の写真</a>
               </div>
          </div>
          </nav>
        </div>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="message1" role="tabpanel" aria-labelledby="m1-tab">
                <ul class="c-m-bordered-list">
                    <li class="c-m-bordered-list__item" v-for="message in messages">
                        <a href="#" class="un-link" data-toggle="modal" data-target="#message-popup" @click.prevent="getMessageThreads(message.id)">
                            <div class="c-m-message-summary">
                                <div class="c-m-box">
                                    <div class="m-message-summary__inner">
                                        <div class="c-m-message-summary__right">
                                            <div class="ds-o-flex__item">
                                                <div class="ds-o-flex ds-o-flex--col ds-o-flex--s">
                                                    <div class="ds-o-flex__item"><h1 class="c-m-heading c-m-heading--xl c-m-heading--medium"><span class="c-m-message-summary__title c-m-message-summary__title--grey">@{{message.employee_name}}</span>&emsp;@{{message.employee_age}}歳 @{{message.employee_gender == 1 ? '男性' : '女性' }}</h1></div>
                                                </div>
                                            </div>
                                            <div class="ds-o-flex__item">
                                                <div class="ds-o-flex ds-o-flex--col ds-o-flex--xs">
                                                    <div class="ds-o-flex__item"><span class="c-m-text m-fw-bold">@{{message.title_excerpt}}</span></div>
                                                    
                                                </div>
                                            </div>
                                            <div class="ds-o-flex__item">
                                                <span class="c-m-text c-m-text--s-short">
                                                    <div class="m-ellipsis">
                                                            @{{message.content_excerpt}}...
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="ds-o-flex__item">
                                                <div class="pull-left">
                                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                                    <span class="c-m-text c-m-text--helvetica">@{{message.employee_id}}</span>

                                                </div>
                                                <div class="pull-right m-pd-r">
                                                    <span class="c-m-text m-fw-bold c-m-text--helvetica c-m-text--s-short">@{{message.last_sent}}</span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="m-space-sm"></div>
                    </li>
                </ul>

            </div>
        </div>
        <div class="container">
            <div class="row m-pd-top">
                <div class="col">
                    <a href="" class="c-m-button">さらに表示</a>
                </div>
            </div>
        </div>
        <div class="m-space-md"></div>
    </div><!-- .message-block -->
    @include('mobileview.messages.popup')
    @include('mobileview.messages.message_header_popup')
</div>

@endsection
@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
var app = new Vue({
  el: '#app',
  data: {
    type : 0,
    messages: [],
    message_threads : [],
    message :[],
    show_message_session : false,
    content : "",
    message_type : "",
    message_template : "",
    errors : [],
    message_type : ""
  },
  mounted : function(){
      this.fetchMessages();
  },
  methods : {
    fetchMessages(){
        this.showloading()
        this.$http.get("/messages/getdata",{params : {type : this.type}})
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