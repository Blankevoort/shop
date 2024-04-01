@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="/" class="text-white list-group-item">خانه</a>
                <a href="/books" class="text-white list-group-item">کتاب‌ها</a>
                <a href="/library" class="text-white list-group-item active">کتابخانه‌ی من</a>
                <a href="/transactions" class="text-white list-group-item">تراکنش‌ها</a>
                <a href="/logout" class="text-white list-group-item">خروج</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0">{{ $book->title }}</h4>
                </div>
                <div class="card-body">
                    <div class="media">
                        <img width="200" src="/images/{{ $book->id }}.jpg" class="rounded">
                        <div class="media-body mr-4">
                            <h3>{{ $book->title }}</h3>
                            <p>{{ $book->description }}</p>
                            <button class="btn btn-outline-success">مشاهده آنلاین</button>
                            <button class="btn btn-outline-info">دانلود</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection