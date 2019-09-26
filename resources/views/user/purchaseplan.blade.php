@extends('layouts.theme')
@section('title','Purchase Plan')
@section('main-wrapper')
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper home-page user-account-section">
    <div class="container-fluid">
      <h4 class="heading">Pricing Plan</h4>
      <ul class="bradcump">
        <li><a href="{{url('account')}}">Dashboard</a></li>
        <li>/</li>
        <li>Pricing Plan</li>
      </ul>
      <div class="purchase-plan-main-block main-home-section-plans">
        <div class="panel-setting-main-block">
          <div class="container">
            <div class="plan-block-dtl">
              <h3 class="plan-dtl-heading">Purchase Memberships</h3>
              <h4 class="plan-dtl-sub-heading">Purchase any of the membership package from below.</h4>
              <ul>
                <li>Select any of your preferred membership package &amp; make payment.
                </li>
                <li>You can cancel your subscription anytime later.
                </li>
              </ul>
            </div>
            <div class="snip1404 row">
              @foreach($plans as $plan)
              @if($plan->delete_status ==1 )
                @if($plan->status == 1)
                  <div class="col-md-4">
                    <div class="main-plan-section">
                      <header>
                        <h4 class="plan-title">
                          {{$plan->name}}
                        </h4>
                        <div class="plan-cost"><span class="plan-price"><i class="{{$currency_symbol}}"></i>{{$plan->amount}}</span><span class="plan-type">
                            <i class="{{$currency_symbol}}"></i> {{number_format(($plan->amount) / ($plan->interval_count),2)}}
                            @if($plan->interval == 'year')
                              Yearly
                            @elseif($plan->interval == 'month')
                              Monthly
                            @elseif($plan->interval == 'week')
                              Weekly
                            @elseif($plan->interval == 'day')
                              Daily
                            @endif
                        </span></div>
                      </header>
                        
                      @php
                        $pricingtxts = App\PricingText::all();
                      @endphp
                      
                     <ul class="plan-features">
                      @foreach($pricingtxts as $ps)

                      @if($ps->value !=null || $ps->value != "")
                        
                        <li><i class="fa fa-check"></i> {{  $ps->value }}</li>
                        
                      @endif
                      @endforeach
                      </ul>
                      @auth
                        <div class="plan-select"><a href="{{route('get_payment', $plan->id)}}" class="btn btn-prime">Subscribe</a></div>
                      @else
                        <div class="plan-select"><a href="{{route('register')}}">Register Now</a></div>
                      @endauth
                    </div>
                  </div>
                @endif
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
@endsection
