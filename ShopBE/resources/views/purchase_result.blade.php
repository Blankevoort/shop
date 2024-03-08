@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">نتیجه تراکنش</div>
                <div class="card-body text-center">
                    @if ($status === 1)
                    <p class="alert alert-success">پرداخت با موفقیت انجام شد</p>
                    <p>شماره پیگیری: <code>{{ $reference_id }}</code></p>
                    <a class="btn btn-success" href="{{ route('books.show', $book->id) }}">
                        مشاهده کتاب
                    </a>
                    @else
                    <p class="alert alert-danger">{{ $message }}</p>
                    <a class="btn btn-outline-info" href="/books">
                        بازگشت به کتابخانه
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection