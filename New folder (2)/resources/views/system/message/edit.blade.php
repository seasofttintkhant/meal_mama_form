@extends('system.layouts.app')


@section('content')


{!! Form::model($message,['route' => ['message.update',$message->message_id],'files'=>true,'method' => 'PATCH','id'=>'create-form','class'=>'h-adr']) !!}

@include('common.errors')
{{ csrf_field() }}
    @include('system.message.form')
{!! Form::close() !!}


<div class="eds03_02_btn_area">
    <div class="registration_btn">
        <a href="" id="save">投稿</a>
    </div>
    
    <div class="registration_btn">
        <a href="{{ $message->message_sent == 0 ? route('message.send',$message->message_id) : '#' }}" id="send-message" data-type="message">送信</a>
    </div>

    <form action="{{ route('message.delete',$message->message_id)}}" id="delete-form" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
    </form>
    <div class="delete_btn">
        <a href="" id="delete">削除</a>
    </div>
</div>




@endsection