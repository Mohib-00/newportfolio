<section class="hero-section-wrapper-background" style="background:#238bca">
    <div class="container">
        <h2 class="text-center fw-bold text pt-5 pb-5 fs-1" style="color:white">
            Features at a Glance
        </h2>
        <div class="row py-4">
            @foreach($features as $feature)
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card card-border shadow h-100">
                    <img style="border-radius:50%" class="card-img-topp d-none d-md-block" src="{{ asset('images/' . $feature->image) }}" alt="bookkeeping-icon">
                    <img style="border-radius:50%" class="card-img-topp d-md-none" src="{{ asset('images/' . $feature->image) }}" alt="bookkeeping-icon">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$feature->heading}}</h5>
                        <p class="card-text">
                            {{$feature->paragraph}}
                        </p>
                        <a href="{{ route('feature.details', ['slug' => Str::slug($feature->heading)]) }}" 
                            class="text-color text-decoration-none">
                             Learn More &gt;
                         </a>
                         
                        
                        </div>
                </div>
            </div>
            @endforeach
         
        </div>
    </div>
</section>