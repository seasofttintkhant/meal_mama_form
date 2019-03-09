@extends('mobileview.layouts.app')

@section('content')
<div class="content" id="app" v-cloak>
    <div>
        <div class="search-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="c-m-page-header__title">
                        <h1 class="c-m-heading c-m-heading--white">お知らせ</h1>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mw-100">
        <div class="c-m-box c-m-box--bg-white">
            <ul class="c-m-bordered-list">
                @foreach($announcements as $announcement)
                <li class='c-m-bordered-list__item'>
                    <a class="un-link m-display-block" href="" data-toggle="modal" data-target="#announcement-popup" title="" @click="getAnnouncement({{$announcement->id}})">
                        <div class="c-m-box c-m-box--vertical-xl c-m-box--horizontal-m">
                            <div class="">
                                <div class="ds-o-flex__item"><h1 class="c-m-heading c-m-heading--l">{{$announcement->title}}</h1></div>
                                <div class="ds-o-flex__item"><span class="c-m-text c-m-text--grey m-fw-bold c-m-text--helvetica c-m-text--s-short">{{isset($announcement_updated_at) && !empty($announcement->updated_at) ? date('Y/m/d H:i',$announcement->updated_at->timestamp) : "" }}</span></div>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
          
            </ul>
            </div>
    </div>		
    @include('mobileview.announcements.popup')		
</div>
@endsection


@push('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
var app = new Vue({
    el: '#app',
    data: {
		announcement_title : "",
        announcement_body : "",
        announcement_date : "",
        get_announcement_url : "{{route('announcement.get_announcement', ':id')}}",
	},
	methods : {
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
    }
    });

</script>

@endpush