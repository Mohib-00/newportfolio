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
            <!-- <div
              class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0"
            >
              <div class="feature-page-card py-3 px-3">
                <img src="/img/bookkeeping/features - book keeping main 1.png"alt="" class="d-block m-auto" />
                <h5 class="text-center pt-2">Detailed Recording</h5>
                <p class="text-center">
                  Organize your documents like receipts, sales invoice attachments, contracts, and letters in one place.
                </p>
              </div>
            </div> -->

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3">
                    <img src="{{asset('detail_files/Detailed Recording icon.png')}}" alt="Detailed Recording icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Detailed Recording</h5>
                    <p class="text-center">
                        Organize your documents like receipts, sales invoice attachments, contracts, and letters in one place.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3">
                    <img src="{{asset('detail_files/Easier Audits icon.png')}}" alt="Easier Audits icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Easier Audits</h5>
                    <p class="text-center">
                        Record each expense and transaction of your business to have tight control of finances.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3 px-xxl-4">
                    <img src="{{asset('detail_files/Fast Financial Analysis icon.png')}}" alt="Fast Financial Analysis icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Fast Financial Analysis</h5>
                    <p class="text-center">
                        Automated reports and analysis that keep you up to date with your business finances.
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- ? Feature cards end-->
<!-- ? Features section start-->
{{--<section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
    <div class="container">
        <div class="row px-xl-5">
            <div class="col-lg-7 px-4 px-lg-0 px-xl-4 pe-lg-5 order-2 order-lg-1 pt-5 pt-lg-0">
                <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                    Hassle Free Inventory Management
                </h2>
                <p class="pe-lg-3 me-lg-3">
                    Never delay orders or lose track of stocks with our brilliant inventory management system.
                </p>
                <div class="d-flex py-3">
                    <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Save Important Documents icon.png" alt="Save Important Documents icon">
                    <div class="ps-3">
                        <b>Save Important Documents</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            Snap pictures of handwritten or printed receipts and upload alongside inventory records. Keep all your inventory in one place.
                        </p>
                    </div>
                </div>
                <div class="d-flex mt-4">
                    <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Inventory Alerts icon.png" alt="Inventory Alerts icon">
                    <div class="ps-3">
                        <b>Track Inventory and Get Stock-out Alerts</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            Keep record of inventory levels at all times and get regular low-stock alerts with advanced bookkeeping software.

                        </p>
                    </div>
                </div>

            </div>
            <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="./detail_files/Hassle Free Inventory Management with moneypex.webp" alt="Hassle Free Inventory Management with moneypex">
            </div>
        </div>
    </div>
</section>
<div class="light-gray-bg-wrap">
    <section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
        <div class="container pt-sm-5">
            <div class="row px-xl-5">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 ps-lg-5 order-2 pt-5 pt-lg-0">
                    <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                        Easy Bank Reconciliation
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        Connect bank accounts to import and match transactions with your current account.
                    </p>
                    <div class="d-flex py-3">
                        <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Sync Payments icon.png" alt="Sync Payments icon">
                        <div class="ps-3">
                            <b>Sync Payments</b>
                            <p class="pe-0 me-0 pe-lg-3 me-lg-3 pt-2">
                                Compare your bank statement with your bookkeeping records to track accurate cash flow.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Prevent Errors icon.png" alt="Prevent Errors icon">
                        <div class="ps-3">
                            <b>Prevent Errors</b>
                            <p class="pe-lg-3 me-lg-3 pt-2">
                                Avoid fraudulent transactions, errors, missed payments, and double payments.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 ps-5 ps-lg-0 pe-lg-5 d-lg-flex align-items-center justify-content-center order-1">
                    <img class="features-section-tab-one-col-one-image ps-lg-3 pe-lg-4" src="./detail_files/Easy Bank Reconciliation with moneypex.webp" alt="Easy Bank Reconciliation with moneypex">
                </div>
            </div>
        </div>
    </section>

    <section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
        <div class="container">
            <div class="row px-xl-5">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 pe-lg-5 order-2 order-lg-1 pt-5 pt-lg-0">
                    <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                        Projects Management
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        Get cloud bookkeeping software to manage finances of multiple projects in one place.
                    </p>
                    <div class="d-flex py-3">
                        <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Automate Workflows icon.png" alt="Automate Workflows icon">
                        <div class="ps-3">
                            <b>Automate Workflows</b>
                            <p class="pe-lg-3 me-lg-3 pt-2">
                                Standardize common procedures, client data collecting, and detect bottlenecks.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Real-time Visibility icon.png" alt="Real-time Visibility icon">
                        <div class="ps-3">
                            <b>Gain Real-time Visibility</b>
                            <p class="pe-lg-3 me-lg-3 pt-2">
                                Estimate cost, time, profit, and revenue to gain full visibility of projects.
                            </p>
                        </div>
                    </div>

                    <a class="btn btn-sm theme-outline-btn theme-btn-radius nav-link features-section-outline-cta mt-sm-4 mx-2 d-inline-block ms-5 ms-sm-0 px-sm-4" href="https://moneypex.com/signup">Start Your Free Trial</a>
                </div>
                <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                    <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="./detail_files/Projects Management.webp" alt="Projects Management">
                </div>
            </div>
        </div>
    </section>

    <section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
        <div class="container">
            <div class="row px-xl-5">
                <div class="col-lg-7 px-4 px-lg-0 px-xl-4 ps-lg-5 order-2 pt-5 pt-lg-0">
                    <h2 class="theme-color fs-1 feature-section-sub-heading fw-bold">
                        Expense Management
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        Moneypex's <a class="text-decoration-none" href="https://moneypex.com/pk/expense-management-software">expense management</a> feature can simplify your life by automating all the laborious procedures.
                    </p>
                    <div class="d-flex py-3">
                        <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Automate Financial Bookkeeping icon.png" alt="Automate Financial Bookkeeping icon">
                        <div class="ps-3">
                            <b>Automate Financial Bookkeeping</b>
                            <p class="pe-0 me-0 pe-lg-3 me-lg-3 pt-2">
                                Automatically generate and send quotes and invoices to get paid faster. Even track your sales, and other costs to organize receipts.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <img class="features-inner-sectio-icon align-self-start" src="./detail_files/Ease in Tax Payment icon.png" alt="Ease in Tax Payment icon">
                        <div class="ps-3">
                            <b>Ease in Tax Payment</b>
                            <p class="pe-0 me-0 pe-lg-3 me-lg-3 pt-2">
                                Maintain a detailed list of expense categories to build accurate accounts which are invaluable at tax time.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 ps-5 ps-lg-0 pe-lg-5 d-lg-flex align-items-center justify-content-center order-1">
                    <img class="features-section-tab-one-col-one-image ps-lg-3 pe-lg-4" src="./detail_files/Expense Management with Moneypex accounting.webp" alt="Expense Management with Moneypex accounting">
                </div>
            </div>
        </div>
    </section>
</div>


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