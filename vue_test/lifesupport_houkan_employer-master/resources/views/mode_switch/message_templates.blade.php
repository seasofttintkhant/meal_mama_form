@extends('layouts.modeswitch_app')

@section('content')
<div class="content">
  <main class="main-with-sidebar">
    <div class="space"></div>
    <div class="card h-card h-p-30">
      <div class="h-border-buttom">
        <div class="d-flex justify-content-between space-pd-btm-md">
            <span><strong>メッセージテンプレート</strong></span>
        </div>
      </div>
      <div class="space"></div>
      <div class="">
        <a href="{{route('message-templates.create')}}" class="card-medium-short card-fw-bold blue-btn m-d-b">新規テンプレートを作成する</a>
      </div>
      <div class="space"></div>
      @if(\Session::has('success'))
      <div class="alert alert-success">
              <ul>
                  <li>{!! \Session::get('success') !!}</li>
              </ul>
          </div>
      @endif  
      <div class="table-responsive">
      <table class="table msg-table">
           <thead class="thead-grey">
            <tr>
              <th class="thead-item card-wd-120 card-bdr-none">更新日</th>
              <th class="thead-item card-wd-180 card-bdr-none">テンプレート名</th>
              <th class="thead-item card-bdr-none">テンプレート本文</th>
              <th class="thead-item card-wd-110 card-bdr-none">編集</th>
              <th class="thead-item card-wd-110 card-bdr-none">削除</th>
            </tr>
          </thead>
        <tbody>
          @foreach($message_templates as $message_template)
            <tr class="tbody-row">
              <td class="tbody-item">{{date('m/d/Y', $message_template->created_at)}}</td>
              <td class="tbody-item">{{$message_template->title}}</td>
              <td class="tbody-item">{{$message_template->content}}</td>
              <td class="tbody-item"><a href="{{route('message-templates.edit',$message_template->id)}}" title="" class="card-link">編集する</a></td>
              @if($message_template->editable == 1)
              <td class="tbody-item"><a href="#" onclick="event.preventDefault();document.getElementById('msg-delete-{{$message_template->id}}').submit();">削除する</a>
                  <form method="POST" action="{{route('message-templates.destroy', $message_template->id)}}" id="msg-delete-{{$message_template->id}}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  </form>
              </td>
              @else
              <td class="tbody-item">不可</td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
      <?php
        $total_page = ceil($message_templates->total()/$message_templates->perPage());
       //$total_page = $message_templates->total();
        //echo $total_page;
      ?>
        @if($total_page > 0)  <!--If pagination -->
         @include('custompaging.pagination.default',['paginator'=>$message_templates])
        @endif
    </div>
    </div><!-- .card -->
    <div class="space"></div>
    <div class="space"></div>

  </main>
</div>
@endsection
