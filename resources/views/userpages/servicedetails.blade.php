  <!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>
<body>

 @include('userpages.header')
        
    <section class="hero-section-wrapper py-3 py-sm-5" style="background-color:#238bca">
        <div class="container-fluid container-md">
            <div class="row ps-0 ps-sm-0 d-flex align-items-center pb-5">
                <div class="col-sm-5 px-4 px-sm-0 ps-sm-3" style="overflow-x: hidden !important">
                    @foreach ($servicebanners as $banner)
                    @if (!empty($banner->heading))
                    <h2 class="hero-section-col-one-heading">
                        {{ $banner->heading }}
                    </h2>
                    @endif
                    @endforeach
                    @foreach ($servicebanners as $banner)
                    @if (!empty($banner->paragraph))
                    <p class="hero-section-col-one-text-a text-white">
                        {{ $banner->paragraph }}
                    </p>
                    @endif
                    @endforeach
                    
                    @foreach ($servicebanners as $banner)
                    @if (!empty($banner->sub_heading))
                        <p class="d-flex flex-wrap mt-3 hero-section-services-list">
                            <span class="text-white">
                                <img class="check-icon" src="{{ asset('index_files/White tick.png') }}" alt="White tick">
                                {{ $banner->sub_heading }}
                            </span>
                        </p>
                    @endif
                    @endforeach
                </div>
                <div class="col-sm-7 px-xxl-4 px-sm-0 service hero-section-col-twoo">
                    <section class="service-page-hero-section-form pb-1 px-xxl-5 pt-5 pt-sm-0">
                        <div class="container-fluid container-md">
                            @foreach ($servicebanners as $banner)
                            @if (!empty($banner->image))
                            <img style="border:none" class="hero-section-col-two-laptop d-none d-md-block desktop-image" src="{{ asset('images/' . $banner->image) }}" alt="hero-img-desktop-icon">
                            <img style="border:none" class="hero-section-col-two-laptop d-md-none" src="{{ asset('images/' . $banner->image) }}" alt="hero-img-iphone-icon">
                            @endif
                            @endforeach
                            <style>
                                @media (min-width: 991px) and (max-width: 1199px) {
                                .desktop-image {
                                  height: 400px;
                                  width: 90%;
                                  margin-top:20px
                                 }
                                }
                                @media (min-width: 1200px) {
                                .desktop-image {
                                  height: 450px;
                                  width: 80%;
                                  margin-top:20px
                                 }
                                }
                            </style>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
<!-- ? Hero section end-->
<!-- ? service cards section start-->
<section class="feature-cards-wrapper d-flex justify-content-center">
    <div class="container">
        <div class="row px-sm-5 px-3">
            @foreach ($servicehighlights as $servicehighlight)
            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3">
                    <img style="border-radius:50%" height=100 width=100 src="{{ asset('images/' . $servicehighlight->image) }}" alt="Detailed Recording icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">{{$servicehighlight->heading}}</h5>
                    <p class="text-center">
                        {{$servicehighlight->paragraph}}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="light-bg-service-section px-lg-5 mt-lg-5 pt-5">
    <div class="container">
        @foreach ($servicesection3s as $inventory)
            <div class="row px-xl-5 mb-5 align-items-center">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 pe-lg-5 order-2 order-lg-1 pt-5 pt-lg-0">
                    
                    @if (!empty($inventory->heading))
                        <h2 class="theme-color fs-1 service-section-sub-heading fw-bold">
                            {{ $inventory->heading }}
                        </h2>
                    @endif

                    @if (!empty($inventory->paragraph))
                        <p class="pe-lg-3 me-lg-3">
                            {{ $inventory->paragraph }}
                        </p>
                    @endif

                    @if (!empty($inventory->sub_image) || !empty($inventory->sub_heading) || !empty($inventory->sub_paragraph))
                        <div class="d-flex align-items-start gap-3 py-3" style="max-width: 100%;">
                            @if (!empty($inventory->sub_image))
                                <img 
                                    src="{{ asset('images/' . $inventory->sub_image) }}" 
                                    alt="Sub Image" 
                                    class="services-inner-sectio-icon"
                                    width="80" height="80"
                                    style="border-radius: 50%; flex-shrink: 0;"
                                >
                            @endif

                            <div style="max-width: 100%;">
                                @if (!empty($inventory->sub_heading))
                                    <strong>{{ $inventory->sub_heading }}</strong>
                                @endif
                                @if (!empty($inventory->sub_paragraph))
                                    <p class="pt-2 mb-0">{{ $inventory->sub_paragraph }}</p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                @if (!empty($inventory->image))
                    <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                        <img 
                            src="{{ asset('images/' . $inventory->image) }}" 
                            alt="Main Image" 
                            class="services-section-tab-one-col-one-image pe-lg-4 pe-xl-0"
                            width="600" height="400"
                            style="max-width: 100%; height: auto;"
                        >
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>





    </div>
    @include('userpages.footer')
    @include('userpages.ajax')
   
   </body>
   </html>