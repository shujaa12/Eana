@extends('layouts.app')
@section('content')
    <div class="page-container">
        <div class="page-content-wrapper">
            <div class="page-head">
                <div class="container">
                    <div class="page-title">
                        <h1>إعانة - تبرعات طبية </h1>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('img/logo.png') }}" style="height: 200px;margin-top: 60px;">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <h1 class="font-blue">برنامج إعانة</h1>
                            <p style="font-size: 22px; text-align: justify">يمكنك التبرع بالأشياء التي لا يحتاجونها بعد الآن، ويتم تقديم هذه
                                الأشياء للأشخاص الذين يحتاجونها بشكل مجاني. ويمكن للأشخاص البحث في الموقع عن المنتجات التي
                                يحتاجونها والتواصل مع صاحب المنتج لترتيب عملية الاستلام.</p>

                            <a href="/Donations" class="btn blue btn-lg">
                                <i class="fa fa-hand-scissors-o"></i>
                                تبرع الآن
                            </a>
                            @if (!isset(Auth::user()->id))

                            <a href="/login" class="btn yellow-gold btn-lg">
                                <i class="fa fa-sign-in"></i>
                                سجل دخول
                            </a>
                            @endif

                        </div>


                    </div>



                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="font-red" style="text-align: center">التبرعات </h2>
                            <br>
                        </div>
                    </div>

                    <div class="page-content-inner">
                        <div class="blog-page blog-content-1">
                            <div class="row">
                                @foreach ($products_es as $value)
                                <div class="col-sm-3">
                                    <div class="blog-post-sm bordered blog-container">
                                        <div class="blog-img-thumb">
                                            <a href="/Donations/{{$value->id}}"><img src="uploads/{{$value->img}}"/></a>
                                        </div>
                                        <div class="blog-post-content">
                                            <h2 class="blog-title blog-post-title"><a href="/Donations/{{$value->id}}">{{$value->nameProduct}}</a>
                                            </h2>
                                            <p class="blog-post-desc">{{$value->details}}</p>
                                            <div class="blog-post-foot">
                                                <div class="blog-post-meta"><i class="icon-calendar font-blue"></i> {{$value->date0}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
@endsection
