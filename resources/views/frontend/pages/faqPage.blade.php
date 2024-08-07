@php
    $setting = \App\Http\Controllers\frontend\HomeController::getSetting();
@endphp
@extends('frontend.main_master')
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('title', $setting->title)

@section('main-section')
    @include('frontend.widgets.breadcrumb', ['pageName' => 'Faq'])
    <div class="body-content">
        <div class="container">
            <div class="checkout-box faq-page">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading-title">Frequently Asked Questions</h2>
                        <span class="title-tag">Last Updated on November 02, 2014</span>
                        <div class="panel-group checkout-steps" id="accordion">
                            @foreach($faqs as $item)
                                <div class="panel panel-default checkout-step-{{$item->position}}">

                                    <!-- panel-heading -->
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">
                                            <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapse{{$item->position}}">
                                                <span>{{$item->position}}</span>{{$item->question}}
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- panel-heading -->

                                    <div id="collapse{{$item->position}}" class="panel-collapse collapse in">

                                        <!-- panel-body  -->
                                        <div class="panel-body">
                                            {!! $item->answer !!}
                                        </div>
                                        <!-- panel-body  -->

                                    </div><!-- row -->
                                </div>
                            @endforeach
                        </div><!-- /.checkout-steps -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
