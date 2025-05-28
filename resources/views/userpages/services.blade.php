<section class="hero-section-wrapper-background" style="background: linear-gradient(to right, #fdfbfb, #ebedee); margin-top:20px; position:relative; overflow:hidden; padding-bottom:50px;">
    <!-- Animated background circles -->
    <div style="position:absolute; width:400px; height:400px; background:radial-gradient(circle, rgba(173,216,230,0.3) 20%, transparent 70%); border-radius:50%; left:-10%; top:20%; animation: float 10s ease-in-out infinite; z-index:0;"></div>
    <div style="position:absolute; width:400px; height:400px; background:radial-gradient(circle, rgba(173,216,230,0.3) 20%, transparent 70%); border-radius:50%; left:80%; top:0; animation: float 10s ease-in-out infinite; animation-delay:2s; z-index:0;"></div>

    <div class="container" style="position:relative; z-index:1;">
        <h2 class="text-center fw-bold pt-5 pb-5 fs-1" style="color:#333;">
            Our Services
        </h2>
        <div class="row py-4">
            @foreach($services as $service)
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card shadow h-100" style="background:white; border-radius:15px; transition:transform 0.3s ease, box-shadow 0.3s ease;">
                    <img height="100" width="100" style="border-radius:50%; margin:20px auto 0; display:block;" class="d-none d-md-block" src="{{ asset('images/' . $service->image) }}" alt="service-icon">
                    <img height="100" width="100" style="border-radius:50%; margin:20px auto 0; display:block;" class="d-md-none" src="{{ asset('images/' . $service->image) }}" alt="service-icon">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$service->heading}}</h5>
                        <p class="card-text">{{$service->paragraph}}</p>
                        <a href="#" onclick="loadserviceDetails('{{ Str::slug($service->heading) }}'); return false;" 
                           style="color:#007bff; text-decoration:none;"
                           onmouseover="this.style.textDecoration='underline'" 
                           onmouseout="this.style.textDecoration='none'">
                            Learn More &gt;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-20px) translateX(10px); }
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
    </style>
</section>
