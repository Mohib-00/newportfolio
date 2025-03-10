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
                                <img class="check-icon" src="{{ asset('accounting_files/White tick.png') }}" alt="White tick">
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



<section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
    <div class="container">
        <div class="row px-xl-5">
            <div class="col-lg-7 px-4 px-lg-0 px-xl-4 pe-lg-5 order-2 order-lg-1 pt-5 pt-lg-0">
                <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                    Reports and Analysis
                </h2>
                <p class="pe-lg-3 me-lg-3">
                    See the big picture of your business and monitor performance with straightforward reporting tools.
                </p>
                <div class="d-flex py-3">
                    <img class="features-inner-sectio-icon align-self-start" src="./detail_files/features - book keeping 5(a).png" alt="features - book keeping">
                    <div class="ps-3">
                        <b>Bird's-eye-view of Business</b>
                        <p class="pe-lg-3 me-lg-3 pt-2">
                            All reports of invoices, sales, profit, expenses, projects, and time are in one spot.
                        </p>
                    </div>
                </div>
                <div class="d-flex mt-4">
                    <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Forecast Future icon.png" alt="Forecast Future icon">
                    <div class="ps-3">
                        <b>Forecast Future</b>
                        <p class="pe-lg-3 me-lg-3 pt-2">
                            Gain useful insights into your business through a variety of reports to analyze future needs and trends.
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="./detail_files/Reports and Analysis.webp" alt="Reports and Analysis">
            </div>
        </div>
    </div>
</section>
{{--
<!-- ? Explore more features end-->
<!-- ? FAQs section start-->
<section class="faqs-section pt-5">
    <div class="container">
        <div class="row py-sm-5 my-sm-4 py-3 px-sm-5 px-3">
            <div class="col-md-6 faq-section-col-one d-flex justify-content-end align-items-end">
                <div class="faq-col-one-bg">
                    <h3 class="fs-1 text-white fw-bold pb-4 pe-3 ">Explore more <br>on our Blog!</h3>
                </div>

            </div>
            <div class="col-md-6 py-2">
                <div>
                    <h2 class="theme-color fs-1 ps-3 pt-4 pt-md-0 fw-bold">FAQs</h2>

                    <div class="accordion faqs" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Can I track inventory in Moneypex bookkeeping software?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, Moneypex is all-in-one bookkeeping and accounting software for your business. Monitor inventory levels to detect fast-moving products and continuously track stock levels.

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Can bookkeeping reduce business stress?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, as Moneypex can manage your funds, personnel, customers, and paperwork, which can be stressful. We'll manage your paperwork, books, and funds so you don't have to. We'll handle your records, taxes, and finances so you can focus on gaining more clients and providing excellent service.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can I reconcile bank transactions in Moneypex?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, Moneypex being best bookkeeping software in Pakistan review, organize, and reconcile daily bank account transactions using recommended matches to examine up-to-date financials for your small business.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Does Moneypex allow recording of all data related to projects?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, Moneypex allows recording of all data related to projects. It records cost estimation, required time, assets, and even profit or revenue of each project.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How does bookkeeping help in reporting?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Moneypex records your business's incoming and departing funds. Bookkeeping also helps businesses retain accurate financial reports for tax purposes.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}




    </div>
    
    @include('userpages.footer')
    @include('userpages.ajax')
</body>
</html>