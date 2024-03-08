@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="/" class="text-white list-group-item active">خانه</a>
                <a href="/books" class="text-white list-group-item">کتاب‌ها</a>
                <a href="/library" class="text-white list-group-item">کتابخانه‌ی من</a>
                <a href="/transactions" class="text-white list-group-item">تراکنش‌ها</a>
                <a href="/logout" class="text-white list-group-item">خروج</a>
            </div>
        </div>
        <div class="col-md-9">
            <img src="{{ url('/images/index.png') }}"
                class="w-100 rounded"
            alt="">
        </div>
    </div>
</div>
@endsection