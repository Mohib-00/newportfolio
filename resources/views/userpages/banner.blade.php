<section class="hero-section-wrapper py-3 py-sm-5" style="background-color:#238bca">
    <div class="container-fluid container-md">
        <div class="row ps-0 ps-sm-0 d-flex align-items-center pb-5">
            <div class="col-sm-5 px-4 px-sm-0 ps-sm-3" style="overflow-x: hidden !important">
                @foreach ($banners as $banner)
                @if (!empty($banner->heading))
                <h2 class="hero-section-col-one-heading">
                    {{ $banner->heading }}
                </h2>
                @endif
                @endforeach
                @foreach ($banners as $banner)
                @if (!empty($banner->paragraph))
                <p class="hero-section-col-one-text-a text-white">
                    {{ $banner->paragraph }}
                </p>
                @endif
                @endforeach
                
                
                @foreach ($banners as $banner)
                @if (!empty($banner->sub_heading))
                    <p class="d-flex flex-wrap mt-3 hero-section-features-list">
                        <span class="text-white">
                            <img class="check-icon" src="{{ asset('accounting_files/White tick.png') }}" alt="White tick">
                            {{ $banner->sub_heading }}
                        </span>
                    </p>
                @endif
                @endforeach
            
                
            </div>
            <div class="col-sm-7 px-xxl-4 px-sm-0 feature hero-section-col-twoo">
                <section class="feature-page-hero-section-form pb-1 px-xxl-5 pt-5 pt-sm-0">
                    <div class="container-fluid container-md">
                        @foreach ($banners as $banner)
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