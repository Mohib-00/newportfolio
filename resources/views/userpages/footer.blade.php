<footer>
    <div class="container">
        <div class="row px-sm-5 px-md-0 px-lg-0 mx-sm-5 mx-md-0 mx-lg-0 px-4 py-5">
            <div class="col-md-6 col-lg-3">
                <img height= 150 width=40 class="footer-logo" src="{{ asset('images/' . $settings->logo) }}" alt="Moneypex Footer logo">
                <p class="fs-6 pt-4">
                   {{$settings->paragraph}}
                </p>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="ms-sm-4 fw-bold">
                    Quick Links
                    <nav class="d-inline navbar navbar-expand-md bg-white navbar-light d-md-none bg-transparent">
                        <button class="navbar-toggler border border-2 ms-3 border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#quickLinksFooter">
                            <span class="navbar-toggler-icon navbar-dark d-none"></span>
                            <img src="{{asset('index_files/dropdown small.png')}}" alt="dropdown small">
                        </button>
                    </nav>
                    <!-- </a> -->
                </h5>
                <ul class="pt-4 d-md-block collapse" id="quickLinksFooter">
                    <li><a href="/" class="text-decoration-none theme-color">Home</a></li>
                    <li><a href="/our_blog" class="text-decoration-none theme-color"> Our Blogs</a></li>
                    <li><a href="/contact_us" class="text-decoration-none theme-color"> Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 pt-4 pt-sm-0 pt-md-4 pt-lg-0">
                <h5 class=" ms-sm-4 fw-bold">
                    Products
                    <nav class="d-inline navbar navbar-expand-md bg-white navbar-light d-md-none bg-transparent">
                        <button class="navbar-toggler border border-2 ms-3 border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#productsFooter">
                            <span class="navbar-toggler-icon navbar-dark d-none"></span>
                            <img src="{{asset('index_files/dropdown small.png')}}" alt="dropdown small">
                        </button>
                    </nav>
                </h5>
                <ul class="pt-4 collapse d-md-block" id="productsFooter">
                    @foreach($productssss as $product)
                    <li><a href="{{ route('project.details', ['slug' => Str::slug($product->name)]) }}"  class="text-decoration-none theme-color">{{$product->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 follow-us pt-4 pt-sm-0 pt-md-4 pt-lg-0">
                <h5 class="ms-sm-4 ms-md-0 ms-lg-4 fw-bold">Follow Us</h5>
                <div class="pt-4 ps-5 ps-sm-0 pb-3 pb-md-0">
                    <a href="{{$settings->facebook_link}}"> <img src="{{asset('index_files/facebook icon.png')}}" alt="facebook icon"></a>
                    <a href="{{$settings->twitter_link}}"> <img src="{{asset('index_files/Instagram icon.png')}}" alt="Instagram icon"></a>
                </div>
                <p class="fs-6 mt-3 lh-sm"><b class="fw-bold">Email:</b>{{$settings->email}}</p>
                <p class="fs-6 lh-sm"><b class="fw-bold">Phone:</b>{{$settings->phone}}</p>
            </div>
        </div>
    </div>
</footer>