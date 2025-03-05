<!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>
<body>
    @include('userpages.header')
   
    <div>
        
<style>
    .bg-image {
        background-image: url(/img/simple-blue-Rectangle-bg.webp?v=NUuQE6oxQH1SNhAXiz49yIItVR8);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .card {
        border-radius: 20px;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 0rem 1rem;
    }

    .disabled {
        color: gray; 
        pointer-events: none; 
        cursor: default; 
    }

    .signup-section .box-radius {
        border-radius: 20px;
        background-color: white;
    }

    .signup-section .box-shadoww {
        box-shadow: rgba(0, 0, 0, 0.1) 0px 8px 8px;
    }

    .signup-section .text-color {
        color: #175aa9 !important;
        font-weight: 600;
    }

    .signup-section .btn-primary {
        color: #fff;
        background-color: #2168be;
        border-color: #2168be;
    }

    .signup-section .btn {
        border: 1px solid transparent;
        font-size: 15px;
        border-radius: 20px;
        padding: 2px 15px;
    }

    @media screen and (max-width: 375px) {

        .signup-section .row-second h6 {
            font-size: 12px;
        }

            .signup-section .row-second h6 .me-4 {
                margin-left: 10px;
            }
    }
</style>
<section class="signup-section py-5 bg-image" style="background: #1F90CC">
    <div class="container">
        <h3 class="text-white fw-bold text-center mb-5">Choose an application for registration</h3>
        <div class="row row-first gy-4 d-none d-sm-flex ">
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/accounting-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                Accounting
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/accounting/signup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/practice-manager-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                Practice Manager
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://practicemanager.moneypex.com/Registration">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/manufacturing-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                Manufacturing
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/manufacturing/signup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/distribution-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                Distribution
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/distribution/signup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/rental-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                Rental Management
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/rental/signup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/POS-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                POS
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/pk/pos#contact-us">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/POS-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                Restaurant
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/pk/restaurant-pos#contact-us">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/POS-op2.png" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                Shoes
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/pk/shoe-pos#contact-us">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>








        <div class="row row-second gy-4 d-sm-none">
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/accounting-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                Accounting
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/accounting/signup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/practice-manager-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                Practice Manager
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://practicemanager.moneypex.com/Registration">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/manufacturing-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                Manufacturing
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/manufacturing/signup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/distribution-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                Distribution
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/Home/distributionignup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/rental-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                Rental Management
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/rental/signup">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/POS-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                POS
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/pk/pos#contact-us">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/POS-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                Restaurant
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/pk/restaurant-pos#contact-us">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="./Select_files/POS-op2.png" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                Shoes
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="https://moneypex.com/pk/shoe-pos#contact-us">REGISTER</a>
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