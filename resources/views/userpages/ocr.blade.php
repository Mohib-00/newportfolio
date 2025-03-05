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
                    <h2 class="hero-section-col-one-heading">
                        A Powerful OCR Technology to Save Time
                    </h2>
                    <p class="hero-section-col-one-text-a text-white">
                        Moneypex cloud accounting software designed to help manage your finances anytime, anywhere with ease. Simplify your business with best accounting software in Pakistan.
                    </p>
                    <p class="d-flex flex-wrap mt-3 hero-section-features-list">
                        <span class="text-white pe-md-4"><img class="check-icon" src="./accounting_files/White tick.png" alt="White tick">Online Accounting Software &amp; ERP</span>
                        <span class="text-white">
                            <img class="check-icon" src="./accounting_files/White tick.png" alt="White tick">Easy to Use
                        </span>
                        <span class="text-white pe-md-4"><img class="check-icon" src="./accounting_files/White tick.png" alt="White tick">Cloud Accounting Software</span>
                    </p>
                    <div class="hero-section-rating text-white py-2 d-none d-sm-block">
                        <div class="rating-inner-wrapper float-end">
                            <div class="stars text-center pe-5">
                                <img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star">
                            </div>
                            <p class="text-center pe-5 mt-1 trustpilot-text text-white">
                                <img src="./accounting_files/trustpilot star.png" alt="trustpilot star"> Trustpilot <br>
                                Excellent Reviews
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 px-xxl-4 px-sm-0 feature hero-section-col-twoo">
                   
                    <section class="feature-page-hero-section-form pb-1 px-xxl-5 pt-5 pt-sm-0">
                        <div class="container-fluid container-md">
                            <img class="hero-section-col-two-laptop d-none d-md-block" src="./index_files/hero-img-desktop.webp" alt="hero-img-desktop-icon">
                            <img class="hero-section-col-two-laptop d-md-none " src="./index_files/hero-image-iphone.webp" alt="hero-img-iphone-icon">
                        </div>
                    </section>
                    <div class="hero-section-rating text-white py-2 d-sm-none">
                        <div class="rating-inner-wrapper float-end">
                            <div class="stars text-center pe-5">
                                <img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star"><img src="./accounting_files/star.png" alt="star">
                            </div>
                            <p class="text-center pe-5 mt-1 trustpilot-text text-white">
                                <img src="./accounting_files/trustpilot star.png" alt="trustpilot star"> Trustpilot <br>
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
                <img src="/img/ocr/features - book keeping main 1.png"alt="" class="d-block m-auto" />
                <h5 class="text-center pt-2">Detailed Recording</h5>
                <p class="text-center">
                  Organize your documents like receipts, sales invoice attachments, contracts, and letters in one place.
                </p>
              </div>
            </div> -->

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3">
                    <img src="./OCR_files/Fast Invoicing icon.webp" alt="Fast Invoicing icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Fast Invoicing</h5>
                    <p class="text-center">
                        Moneypex offers the fastest way to record, manage and categorize invoices digitally, and even send them in minutes.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3">
                    <img src="./OCR_files/Erroless Data icon.webp" alt="Erroless Data icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Errorless Data</h5>
                    <p class="text-center">
                        Say goodbye to hours of manual data entry and human errors. keep accurate financial records and invoices.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                <div class="feature-page-card py-4 px-3 px-xxl-4">
                    <img src="./OCR_files/Keep Receipts Digital icon.webp" alt="Keep Receipts Digital icon" class="d-block m-auto">
                    <h5 class="text-center pt-2 fw-bold">Keep Receipts Digital</h5>
                    <p class="text-center">
                        Stop stressing about remembering every detail on your own. Moneypex lets you scan receipts and save them in the cloud.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div
      class="hmrc-card d-flex bg-white"
    >
      <img class="hmrc-card-badge" src="/img/ocr/NoPath.png"alt="" />
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
                    Freedom Comes with Smart Scanning
                </h2>
                <p class="pe-lg-3 me-lg-3">
                    Automate the boring process of manually creating invoices with Moneypex.
                </p>
                <div class="d-flex py-3">
                    <img class="features-inner-sectio-icon align-self-start" src="./OCR_files/Auto Extract Data icon.webp" alt="Auto Extract Data icon">
                    <div class="ps-3">
                        <b>Auto Extract Data</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            Extract information from handwritten or printed receipts and categorize them into multiple fields automatically.
                        </p>
                    </div>
                </div>
                <div class="d-flex mt-4">
                    <img class="features-inner-sectio-icon align-self-start" src="./OCR_files/Boost Invoicing Speed icon.webp" alt="Boost Invoicing Speed icon">
                    <div class="ps-3">
                        <b>Boost Invoicing Speed</b>
                        <p class="pe-2 pe-lg-3 me-lg-3 pt-2">
                            Accelerate your invoicing pace. Scan invoices, duplicate copies. Edit information and create unlimited invoices at once.
                        </p>
                    </div>
                </div>

                <a class="btn btn-sm theme-outline-btn theme-btn-radius nav-link features-section-outline-cta ms-5 ms-sm-0 mt-sm-4 mx-2 d-inline-block px-4" href="https://moneypex.com/demo-request">Request&nbsp;a&nbsp;Demo</a>
            </div>
            <div class="col-lg-5 ps-5 ps-lg-0 ps-xxl-5 d-lg-flex align-items-center order-lg-2">
                <img class="features-section-tab-one-col-one-image pe-lg-4 pe-xl-0" src="./OCR_files/Freedom Comes with Smart Scanning.webp" alt="Freedom Comes with Smart Scanning">
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
                        Organize Your Receipts, and Invoices
                    </h2>
                    <p class="pe-lg-3 me-lg-3">
                        Scan and store invoices and never worry about losing important receipts with powerful OCR software.
                    </p>
                    <div class="d-flex py-3">
                        <img class="features-inner-sectio-icon align-self-start" src="./OCR_files/Remove Pages icon.webp" alt="Remove Pages icon">
                        <div class="ps-3">
                            <b>Remove Piled-up Pages</b>
                            <p class="pe-0 me-0 pe-lg-3 me-lg-3 pt-2">
                                Have a lot of handwritten receipts? Simply scan using your phone and upload it along with other bills in one place.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <img class="features-inner-sectio-icon align-self-start" src="./OCR_files/Secure Storage icon.webp" alt="Secure Storage icon">
                        <div class="ps-3">
                            <b>Secure Storage</b>
                            <p class="pe-lg-3 me-lg-3 pt-2">
                                No more lost receipts and documents. Save your important financial record in a secure spot, and regulate access.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 ps-5 ps-lg-0 pe-lg-5 d-lg-flex align-items-center justify-content-center order-1">
                    <img class="features-section-tab-one-col-one-image ps-lg-3 pe-lg-4" src="./OCR_files/Organize Your Receipts, and Invoices.webp" alt="Organize Your Receipts, and Invoices">
                </div>
            </div>
        </div>
    </section>
</div>

<section class="faqs-section my-3 pb-sm-5 pb-5 " style="background-color: #f8f8f8 !important;">
    <div class="container">
        <div class="row py-sm-5 my-sm-4 py-3 px-sm-5 px-3">
            <div class="col-12">
                <div>
                    <h2 class="accordian-item-color theme-color fs-1 pt-4 pt-md-0 fw-bold">FAQs</h2>
                    <div class="accordion faqs" id="accordionExample">
                        <div class="accordion-item accordian-item-color">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    How can Moneypex ERP benefit small businesses in Pakistan?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Moneypex ERP software in Pakistan provides an affordable and accessible solution for small businesses, allowing secure access to financial data from any device. It saves time by automating tasks and offers a user-friendly interface. It simplifies accounting processes and eliminates the need for specialized accountants.
                                </div>
                            </div>
                        </div>
                        <div class="accordian-item-color accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Can Moneypex ERP handle multiple aspects of small business accounting?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, Moneypex is a comprehensive best ERP software in Pakistan that handles invoicing, expense tracking, cash flow management, bank transaction reconciliation, and inventory management. It also generates essential financial reports.
                                </div>
                            </div>
                        </div>
                        <div class="accordian-item-color accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Is Moneypex ERP software in Pakistan compliant with local tax regulations here?

                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, Moneypex ERP software in Pakistan ensures compliance with local tax regulations. It generates accurate tax reports, including sales tax or GST calculations, helping small businesses avoid penalties and fines associated with tax non-compliance.
                                </div>
                            </div>
                        </div>
                        <div class="accordian-item-color accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Is Moneypex ERP software in Pakistan suitable for all types of small businesses?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, it best online ERP software in Pakistan that can cater to various small businesses, such as retail stores, service-based businesses, and consulting firms, and that's what makes it best best ERP software in Pakistan. It is flexible, scalable, and customizable to meet specific accounting needs, whether you are a solopreneur, startup, or small company with multiple employees.

                                </div>
                            </div>
                        </div>
                        <div class="accordian-item-color accordion-item view-more" style="display: none;">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Can I access Moneypex ERP software in Pakistan online?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, it is an online ERP software in Pakistan, meaning you can access it through a web browser with an internet connection. Not only this but Moneypezx ERP software in Pakistan allows you to manage your financials anytime, anywhere, providing convenience and flexibility for small businesses.
                                </div>
                            </div>
                        </div>
                        <div class="accordian-item-color accordion-item view-more" style="display: none;">
                            <h2 class="accordion-header" id="headingsix">
                                <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                    How secure is Moneypex ERP software in Pakistan?
                                </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Moneypex is the best online ERP and accounting software in Pakistan in terms of security that prioritizes the protection of your financial data. Not only this but Moneypex ERP Software in Pakistan also employs industry-standard encryption protocols and secure servers to protect your information. With regular backups and robust data security measures, and ensures that your business's sensitive data remains safe and protected.
                                </div>
                            </div>
                        </div>
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
@include('userpages.footer')
@include('userpages.ajax')
</body>
</html>