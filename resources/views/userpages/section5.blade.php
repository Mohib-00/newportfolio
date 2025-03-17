<section>
    <div class="container">
        <div class="row pt-4 pt-xxl-5 mt-xxl-4">
            @foreach ($mains as $main)
            @if (!empty($main->image))
            <div class="col-md-6 mobileapp-col-one">
                <img src="{{ asset('images/' . $main->image) }}" alt="mobile-img-app-desktop-icon" class="d-none d-md-block">
                <img src="{{ asset('images/' . $main->image) }}" alt="mobile-app-iphone-icon" class="d-md-none">
            </div>
            @endif
                @endforeach
            <div class="col-md-6 mobileapp-col-two pe-5">
                @foreach ($mains as $main)
                @if (!empty($main->heading))
                <h2 class="text-start text-sm-end theme-color pt-5 pb-2 mt-xxl-3 mb-3 fs-1 ps-4">
                    {{$main->heading}}
                </h2>
                @endif
                @endforeach
                @foreach ($mains as $main)
                @if (!empty($main->paragraph))
                <p class="text-start text-sm-end fw-bold ps-4 ps-sm-0">
                    {{$main->paragraph}}
                </p>
                @endif
                @endforeach
                <ul class="text-start text-sm-end">
                    @foreach ($mains as $main)
                    @if (!empty($main->sub_heading))
                    <li>✔{{$main->sub_heading}}</li>
                    @endif
                    @endforeach
                </ul>
                
            </div>
        </div>
    </div>
</section>