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
                    @foreach ($products as $product)
                    @if (!empty($product->heading))
                    <h2 class="hero-section-col-one-heading">
                        {{ $product->heading }}
                    </h2>
                    @endif
                    @endforeach
                    @foreach ($products as $product)
                    @if (!empty($product->paragraph))
                    <p class="hero-section-col-one-text-a text-white">
                        {{ $product->paragraph }}
                    </p>
                    @endif
                    @endforeach
                    
                    @foreach ($products as $product)
                    @if (!empty($product->sub_heading))
                        <p class="d-flex flex-wrap mt-3 hero-section-features-list">
                            <span class="text-white">
                                <img class="check-icon" src="{{ asset('index_files/White tick.png') }}" alt="White tick">
                                {{ $product->sub_heading }}
                            </span>
                        </p>
                    @endif
                    @endforeach
                </div>
                <div class="col-sm-7 px-xxl-4 px-sm-0 feature hero-section-col-twoo">
                    <section class="feature-page-hero-section-form pb-1 px-xxl-5 pt-5 pt-sm-0">
                        <div class="container-fluid container-md">
                            @foreach ($products as $product)
                            @if (!empty($product->image))
                            <img style="border:none" class="hero-section-col-two-laptop d-none d-md-block desktop-image" src="{{ asset('images/' . $product->image) }}" alt="hero-img-desktop-icon">
                            <img style="border:none" class="hero-section-col-two-laptop d-md-none" src="{{ asset('images/' . $product->image) }}" alt="hero-img-iphone-icon">
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
<!-- ? Feature cards section start-->
<section class="feature-cards-wrapper d-flex justify-content-center">
    <div class="container">
        <div class="row px-sm-5 px-3">
            @foreach ($productshighlights as $productshighlight)
            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3">
                    <img style="border-radius:50%" height=100 width=100 src="{{ asset('images/' . $productshighlight->image) }}" alt="Detailed Recording icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">{{$productshighlight->heading}}</h5>
                    <p class="text-center">
                        {{$productshighlight->paragraph}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ? Feature cards end-->
<!-- ? Features section start-->
<section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
    <div class="container">
        <div class="row px-xl-5">
            <div class="col-lg-7 px-4 px-lg-0 px-xl-4 pe-lg-5 order-2 order-lg-1 pt-5 pt-lg-0">
                <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                    @foreach ($inventorys as $inventory)
                    @if (!empty($inventory->heading))
                    {{$inventory->heading}}
                    @endif
                    @endforeach
                    
                </h2>
                <p class="pe-lg-3 me-lg-3">
                    @foreach ($inventorys as $inventory)
                    @if (!empty($inventory->paragraph))
                    {{$inventory->paragraph}}
                    @endif
                    @endforeach
                </p>

                @foreach ($inventorys as $inventory)
                <div class="d-flex py-3">
                    <img style="border-radius:50%" class="features-inner-sectio-icon align-self-start" src="{{ asset('images/' . $inventory->sub_image) }}" alt="Save Important Documents icon">
                    <div class="ps-3">
                        <b>{{$inventory->sub_heading}}</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            {{$inventory->sub_paragraph}}                        
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
            @foreach ($inventorys as $inventory)
            @if (!empty($inventory->image))
            <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="{{ asset('images/' . $inventory->image) }}" alt="Hassle Free Inventory Management with moneypex">
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>


    @if ($section4s->isNotEmpty())
    <section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
        <div class="container pt-sm-5">
            <div class="row px-xl-5">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 ps-lg-5 order-2 pt-5 pt-lg-0">
                    <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                        @foreach ($section4s as $section4)
                        @if (!empty($section4->heading))
                        {{$section4->heading}}
                        @endif
                        @endforeach
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        @foreach ($section4s as $section4)
                        @if (!empty($section4->paragraph))
                        {{$section4->paragraph}}
                        @endif
                        @endforeach
                    </p>

                @foreach ($section4s as $section4)
                <div class="d-flex py-3">
                    <img style="border-radius:50%" class="features-inner-sectio-icon align-self-start" src="{{ asset('images/' . $section4->sub_image) }}" alt="Save Important Documents icon">
                    <div class="ps-3">
                        <b>{{$section4->sub_heading}}</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            {{$section4->sub_paragraph}}                        
                        </p>
                    </div>
                </div>
                @endforeach

                </div>
                @foreach ($section4s as $section4)
                @if (!empty($section4->image))
                <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                    <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="{{ asset('images/' . $section4->image) }}" alt="Hassle Free Inventory Management with moneypex">
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($section5s->isNotEmpty())
    <section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
        <div class="container pt-sm-5">
            <div class="row px-xl-5">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 ps-lg-5 order-2 pt-5 pt-lg-0">
                    <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                        @foreach ($section5s as $section5)
                        @if (!empty($section5->heading))
                        {{$section5->heading}}
                        @endif
                        @endforeach
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        @foreach ($section5s as $section5)
                        @if (!empty($section5->paragraph))
                        {{$section5->paragraph}}
                        @endif
                        @endforeach
                    </p>

                    @foreach ($section5s as $section5)
                <div class="d-flex py-3">
                    <img style="border-radius:50%" class="features-inner-sectio-icon align-self-start" src="{{ asset('images/' . $section5->sub_image) }}" alt="Save Important Documents icon">
                    <div class="ps-3">
                        <b>{{$section5->sub_heading}}</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            {{$section5->sub_paragraph}}                        
                        </p>
                    </div>
                </div>
                @endforeach

                </div>
                @foreach ($section5s as $section5)
                @if (!empty($section5->image))
                <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                    <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="{{ asset('images/' . $section5->image) }}" alt="Hassle Free Inventory Management with moneypex">
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($section6s->isNotEmpty())
    <section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
        <div class="container">
            <div class="row px-xl-5">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 ps-lg-5 order-2 pt-5 pt-lg-0">
                    <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                        @foreach ($section6s as $section6)
                        @if (!empty($section6->heading))
                        {{$section6->heading}}
                        @endif
                        @endforeach
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        @foreach ($section6s as $section6)
                        @if (!empty($section6->paragraph))
                        {{$section6->paragraph}}
                        @endif
                        @endforeach
                    </p>
                    @foreach ($section6s as $section6)
                    <div class="d-flex py-3">
                        <img style="border-radius:50%" class="features-inner-sectio-icon align-self-start" src="{{ asset('images/' . $section6->sub_image) }}" alt="Save Important Documents icon">
                        <div class="ps-3">
                            <b>{{$section6->sub_heading}}</b>
                            <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                                {{$section6->sub_paragraph}}                        
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @foreach ($section6s as $section6)
                @if (!empty($section6->image))
                <div class="col-lg-5 ps-5 ps-lg-0 pe-lg-5 d-lg-flex align-items-center justify-content-center order-1">
                    <img class="features-section-tab-one-col-one-image ps-lg-3 pe-lg-4" src="{{ asset('images/' . $section6->image) }}" alt="Expense Management with Moneypex accounting">
                </div>
                @endif
                @endforeach
               
            </div>
        </div>
    </section>
    @endif

    @if ($section7s->isNotEmpty())
    <section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
        <div class="container pt-sm-5">
            <div class="row px-xl-5">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 ps-lg-5 order-2 pt-5 pt-lg-0">
                    <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                        @foreach ($section7s as $section7)
                        @if (!empty($section7->heading))
                        {{$section7->heading}}
                        @endif
                        @endforeach
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        @foreach ($section7s as $section7)
                        @if (!empty($section7->paragraph))
                        {{$section7->paragraph}}
                        @endif
                        @endforeach
                    </p>
                    @foreach ($section7s as $section7)
                <div class="d-flex py-3">
                    <img style="border-radius:50%" class="features-inner-sectio-icon align-self-start" src="{{ asset('images/' . $section7->sub_image) }}" alt="Save Important Documents icon">
                    <div class="ps-3">
                        <b>{{$section7->sub_heading}}</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            {{$section7->sub_paragraph}}                        
                        </p>
                    </div>
                </div>
                @endforeach
                </div>
                @foreach ($section7s as $section7)
                @if (!empty($section7->image))
                <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                    <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="{{ asset('images/' . $section7->image) }}" alt="Hassle Free Inventory Management with moneypex">
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if ($faqsess->isNotEmpty())
    <section class="faqs-section my-3 pb-sm-5 pb-5 " style="background-color: #f8f8f8 !important;">
        <div class="container">
            <div class="row py-sm-5 my-sm-4 py-3 px-sm-5 px-3">
                <div class="col-12">
                    <div>
                        <h2 class="accordian-item-color theme-color fs-1 pt-4 pt-md-0 fw-bold">FAQs</h2>
                        <div class="accordion faqs" id="accordionExample">

                            @foreach($faqsess as $index => $faqs)
                            <div class="accordion-item accordian-item-color faq-item {{ $index >= 5 ? 'd-none' : '' }}">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse{{ $index }}" 
                                        aria-expanded="false" 
                                        aria-controls="collapse{{ $index }}">
                                        {{$faqs->question}}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" 
                                    class="accordion-collapse collapse" 
                                    aria-labelledby="heading{{ $index }}" 
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{$faqs->answer}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        </div>
                    </div>
                    <div class="col-12 pt-4">
                        <button type="button" class="btn btn-primary nav-link text-white btn-sm theme-btn-radius theme-solid-btn px-4 mt-lg-3 mb-3 mb-lg-0 mx-auto" id="view-more">
                            View More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    </div>
    
    @include('userpages.footer')
    @include('userpages.ajax')
    <script>
        document.getElementById("view-more").addEventListener("click", function() {
        let hiddenFaqs = document.querySelectorAll(".faq-item.d-none");
        hiddenFaqs.forEach(item => item.classList.remove("d-none"));
        this.style.display = "none";
        });
    </script>
</body>
</html>