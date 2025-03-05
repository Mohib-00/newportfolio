<!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>
<body>

    @include('userpages.header')

        
<section class="hero-section-wrapper py-3 py-sm-5">
    <div class="container-fluid container-md">
        <div class="row ps-0 ps-sm-0 d-flex align-items-center pb-5">
            <div class="col-sm-5 px-4 px-sm-0 ps-sm-3" style="overflow-x: hidden !important">
                <h3 class="hero-section-col-one-heading">

                    Powerful Bookkeeping Software to Support Your Business
                </h3>
                <p class="hero-section-col-one-text-a text-white">
                    Join thousands of bookkeepers, who run their businesses with Moneypex efficiently.
                </p>

                <p class="d-flex flex-wrap mt-3 hero-section-features-list">
                    <span class="text-white pe-md-4"><img class="check-icon" src="./detail_files/White tick.png" alt="White tick">Manage your accounts</span>

                    <span class="text-white pe-md-4">
                        <img class="check-icon" src="./detail_files/White tick.png" alt="White tick">Generate detailed reports
                    </span>
                    <span class="text-white pe-md-4">
                        <img class="check-icon" src="./detail_files/White tick.png" alt="White tick">Track inventory and projects
                    </span>
                    <span class="text-white pe-md-4"><img class="check-icon" src="./detail_files/White tick.png" alt="White tick">Record transactions</span>
                </p>
                <div class="hero-section-rating text-white py-2 d-none d-sm-block">
                    <div class="rating-inner-wrapper float-end">
                        <div class="stars text-center pe-5">
                            <img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star">
                        </div>
                        <p class="text-center pe-5 mt-1 trustpilot-text text-white">
                            <img src="./detail_files/trustpilot star.png" alt="star"> Trustpilot <br>
                            Excellent Reviews
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 px-xxl-4 px-sm-0 feature hero-section-col-twoo">
                <!-- <img
                  class="hero-section-col-two-mobile position-absolute"
                  src="/img/bookkeeping/hero-section-phone-mockup.png"alt=""
                /> -->
                <section class="feature-page-hero-section-form pb-1 px-xxl-5 pt-5 pt-sm-0">
                    <div class="container-fluid container-md">
                        <div class="row pt-sm-1 my-sm-5 mb-5 mb-sm-0 px-xl-5 mx-sm-0 mx-lg-5">
                            <div class="pt-sm-5 pb-sm-5 mt-sm-0 pt-3">
                                <div class="bg-white form-wrapper px-5 py-4">
                                    <h5 class="theme-color text-center pb-3">Get Started</h5>
                                    
<form id="contact_form">
    <input type="hidden" name="ReturnUrl" id="ReturnUrl" value="">
    <input type="hidden" name="SignupId" id="SignupId" value="1">
    <div class="">
        <label for="Name" class="form-label">Name *</label>
        <input type="text" class="form-control" id="FullName" placeholder="" name="FullName" autocomplete="off">
        <h6 id="fullName"></h6>
    </div>
    <div class="">
        <label for="Email" class="form-label">Email *</label>
        <input type="email" class="form-control" id="Email" placeholder="" name="Email" autocomplete="off">
        <h6 id="email"></h6>
    </div>
    <div class="">
        <label for="Password" class="form-label">Password *</label>
        <input type="password" class="form-control" id="Password" placeholder="" name="Password" autocomplete="off">
        <h6 id="password"></h6>
    </div>
    <div class="mb-3 mt-3">
        <div id="recapcha" class="g-recaptcha w-100" data-sitekey="6LfSF9UZAAAAAFuCCvNJEVr0UFaWIbKHlM5KZx5j" style="transform: scale(0.880795); transform-origin: 0px 0px;"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-e9dj0s7yizdg" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="./detail_files/anchor.html"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;" src="./detail_files/saved_resource(1).html"></iframe></div>
        <h6 id="recaptcha"></h6>
    </div>
    <div class="form-check mb-3">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" id="IsActive">
            I accept all the <a href="https://moneypex.com/privacy-policy" target="_blank">Terms and Conditions</a>
        </label>
        <h6 id="isActive"></h6>
    </div>

    <button type="button" id="btnSubmit" class="btn btn-sm theme-btn-radius form-submit mt-3 mx-auto d-block">
        Sign Up
    </button>
</form>



                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="hero-section-rating text-white py-2 d-sm-none">
                    <div class="rating-inner-wrapper float-end">
                        <div class="stars text-center pe-5">
                            <img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star"><img src="./detail_files/star.png" alt="star">
                        </div>
                        <p class="text-center pe-5 mt-1 trustpilot-text text-white">
                            <img src="./detail_files/trustpilot star.png" alt="starwhite"> Trustpilot <br>
                            Excellent Reviews
                        </p>
                    </div>
                </div>
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
                    <img src="./detail_files/Detailed Recording icon.png" alt="Detailed Recording icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Detailed Recording</h5>
                    <p class="text-center">
                        Organize your documents like receipts, sales invoice attachments, contracts, and letters in one place.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3">
                    <img src="./detail_files/Easier Audits icon.png" alt="Easier Audits icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Easier Audits</h5>
                    <p class="text-center">
                        Record each expense and transaction of your business to have tight control of finances.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3 px-xxl-4">
                    <img src="./detail_files/Fast Financial Analysis icon.png" alt="Fast Financial Analysis icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Fast Financial Analysis</h5>
                    <p class="text-center">
                        Automated reports and analysis that keep you up to date with your business finances.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div
      class="hmrc-card d-flex bg-white"
    >
      <img class="hmrc-card-badge" src="/img/bookkeeping/NoPath.png"alt="" />
      <div class="hmrc-card-content ps-md-5 d-flex align-items-center pt-3 pt-md-0">
        <div><b>HMRC Approved Accounting Software</b>
        <p class="pt-4">
          Moneypex is an MTD-compatible best accounting software in the UK to file your VAT returns online. Customers can submit their HMRC Making Tax Digital compliant VAT returns online with a button. <br>Simple, Affordable, and Fast!
        </p> </div>
      </div>
    </div> -->
</section>
<!-- ? Feature cards end-->
<!-- ? Features section start-->
<section class="light-bg-feature-section px-lg-5 mt-lg-5 pt-5">
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
</section>




    </div>
    
    @include('userpages.footer')
    @include('userpages.ajax')
</body>
</html>