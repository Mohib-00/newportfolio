{{--laptop view--}}
<section class="d-none d-md-block" style="margin-top:-7rem;">
    <div class="container-fluid">
        <div class="row justify-content-center">

            @foreach ($highlights as $highlight)
            <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-3 mx-3 ">
                <div class="card ">
                    <img src="{{ asset('images/' . $highlight->image) }}" class="card-img-top" alt="Cloud-based-ERP-icon">
                    <div class="card-body">
                        <h4 class="card-title-size">{{$highlight->heading}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
</section>

{{--mobile view--}}
<section class="d-md-none py-3" style="background-color: #f8f8f8 !important;">
    <div class="container-fluid">
        <div class="row text-center">
            @foreach ($highlights as $highlight)
            <div class="col-sm-4 col-4 ">
                <img style="border-radius:50%" width=100 height=100 src="{{ asset('images/' . $highlight->image) }}" class="card-img-top-on-mobile" alt="Cloud-based-ERP-icon">
                <h6 class="fw-bold">{{$highlight->heading}}</h6>
            </div>
            @endforeach
           

        </div>
    </div>
</section>