@extends('layouts.app')

@section('content')
<main class="main-block space-pd-top-md" id="app" v-cloak>
    <div class="main-form-auto">
        <div class="main-content">
            <div class="main-content-inner">
                <div class="main-segment">
                    <div class="main-content-detail">
                        <div class="main-register-head"><p>求人掲載のお申し込み</p></div>
                        <div class="space"></div>
                                @include('auth.partials.register_one')
                                @include('auth.partials.register_two')
                                @include('auth.partials.popup')
                        </div><!-- .main-content-detail -->
                    </div><!-- .main-segment -->
                </div><!-- .main-content-inner -->
            </div><!-- .main-content -->
        </div><!-- .main-form-w -->
    </div>

</main><!-- .register-main-block -->

@endsection


@push('customjs')
<script src="/js/auth/register.js"></script>
@endpush