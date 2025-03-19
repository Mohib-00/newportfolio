<!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>
<body>
    @include('userpages.header')
   
    <div>
        
<style>
    

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

            @foreach($projects as $project)
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="{{ asset('images/' . $project->image) }}" class="me-3" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color">
                                {{ $project->name }}
                            </h6>

                        </div>
                        <div class="w-100 text-end">
                            <a class="btn btn-primary box-shadoww" href="{{ $project->register }}">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>

{{--mobile view--}}
        <div class="row row-second gy-4 d-sm-none">
            @foreach($projects as $project)
            <div class="col-sm-6">
                <div class="box-shadoww h-100 p-4 box-radius">
                    <div class="d-flex align-items-center">
                        <img style="width:50px;height:50px" src="{{ asset('images/' . $project->image) }}" class="me-4" alt="accounting-icon">
                        <div class="w-100">
                            <h6 class="mt-0 fw-bold text-color me-4">
                                {{ $project->name }}
                            </h6>
                        </div>
                        <div class="w-50 text-end">
                            <a class="btn btn-primary box-shadoww" href="{{ $project->register }}">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
         
        </div>



    </div>
</section>

    </div>
 
  @include('userpages.footer')
  @include('userpages.ajax')
</body>
</html>