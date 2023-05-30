@extends('layouts.app')
@section('content')
    <div class="page-container">
        <div class="page-content-wrapper">
            <div class="page-head">
                <div class="container">
                    <div class="page-title">
                        <h1>{{ $products_es->nameProduct }} </h1>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="container">

                    @include('includes.messages')


                    <div class="page-content-inner">
                        <div class="blog-page blog-content-2">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="blog-single-content bordered blog-container">
                                        <div class="blog-single-head">
                                            <h1 class="blog-single-head-title">{{ $products_es->nameProduct }}</h1>
                                            <div class="blog-single-head-date">
                                                <i class="icon-calendar font-blue"></i>
                                                <a>{{ $products_es->date0 }}</a>
                                            </div>
                                        </div>
                                        <div class="blog-single-img">
                                            <img src="/uploads/{{ $products_es->img }}" /> </div>
                                        <div class="blog-single-desc">

                                            <p> {{ $products_es->details }}</p>
                                            <p> {{ $products_es->note }}</p>

                                        </div>
                                        @if ($comment_es->count() >0)

                                        <div class="blog-comments">
                                            <h3 class="sbold blog-comments-title">التعليقات ({{$comment_es->count()}})</h3>
                                            <div class="c-comment-list">
                                                @foreach ($comment_es as $value)
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" alt="" src="{{asset('uploads/user.png')}}"> </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">{{$value->userName}}</a> منذ
                                                            <span class="c-date">{{$value->created_at}}</span>
                                                        </h4> {{$value->details}} </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                        <h3 class="sbold blog-comments-title">اضافة تعليق</h3>
                                        {!! Form::open(['action' => 'DonationsController@storeComment', 'method'=>'POST']) !!}
                                        <input  type="hidden" class="form-control" id="id" name="id" value="{{ $products_es->id }}">

                                            <div class="form-group">
                                                <textarea rows="8" name="message" required placeholder="نص التعليق ...." class="form-control c-square"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn blue uppercase btn-md sbold btn-block">ارسال</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="blog-single-sidebar bordered blog-container">

                                        @if ($products_es->userId == Auth::user()->id)
                                        @else
                                        @if (is_null($order_es))
                                        {!! Form::open(['action' => 'OrdersController@store', 'method'=>'POST', 'onsubmit' => 'return ConfirmOrder()']) !!}
                                        <input  type="hidden" class="form-control" id="id" name="id" value="{{ $products_es->id }}">
                                        <button type="submit" class="btn btn-lg blue" style="width: 100%;">
                                        <i class="fa fa-edit"></i>
                                        اطلب الآن </button>
                                        {!! Form::close() !!}
                                        @else
                                        @if ($order_es->status == 0)
                                        <button type="button" class="btn btn-lg blue" style="width: 100%;">
                                            قيد التدقيق </button>
                                        @elseif ($order_es->status == 1)
                                        <button type="button" class="btn btn-lg green" style="width: 100%;">
                                            معتمد </button>
                                            @elseif ($order_es->status == 2)
                                            <button type="button" class="btn btn-lg red" style="width: 100%;">
                                                مرفوض </button>

                                        @endif
                                        @endif


                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/pages/css/blog-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
<script>
function ConfirmOrder() {
    return confirm('تأكيد ارسال الطلب');
}
</script>

@endsection
