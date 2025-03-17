<!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>
 
 <body>
    
  @include('userpages.header')
<link href="./Blogs_files/stylesheet.css" rel="stylesheet">
<section class="one background-hero-image">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-12 col-sm-12 col-md-6">
                <div class="text">
                    <h3 class="text-white">Explore Our Blogs</h3>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-12 col-sm-12 col-md-6">
                <img src="./Blogs_files/group-diverse-people-using-digital-devices.png" class="w-75" alt="hero-image">
            </div>
        </div>
    </div>
</section>

<section class="five">
    <div class="container">
        <div class="row gx-5 gy-5">

            @foreach($blogs as $blog)
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-12 col-sm-6 col-md-6">
                    <img src="{{ asset('images/' . $blog->image) }}" class="w-100 rounded-3" alt="hero-image">
                    <div class="headd">
                        <h5 class="pt-3"><span class="badge rounded-pill custom-badge bg-info"><a href="/" class="text-decoration-none">{{$blog->name}}</a></span></h5>
                        <p class="text-muted">{{ $blog->created_at->format('d F Y') }}</p>
                        <h4 class="theme-color">{{$blog->heading}}</h4>
                        <p>{{$blog->paragraph}}</p>
                    </div>
                    <a href="{{ route('blogs.details', ['slug' => Str::slug($blog->name)]) }}" class="text-decoration-none fw-bold ">Read More &gt;&gt;</a>
                </div>
            @endforeach
                
        </div>
    </div>
</section>

<section class="seven">
    <div class="container">
        <h6 class="fw-bold theme-color mb-5">
            <a href="/" class="text-decoration-none">
                Grow Your Business
            </a>
        </h6>
        <div class="row gx-5 gy-5">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-12 col-sm-12 col-md-5">
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">Why Do Small Businesses Need Accounting Software in UK?</a></p>
                        <hr>
                    </div>
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">10 Ways to Improve Small Business Bookkeeping</a></p>
                        <hr>
                    </div>
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">Top 10 Benefits of Accounting Automation</a></p>
                        <hr>
                    </div>
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">Tips for Training Your Employees on a New POS System</a></p>
                        <hr>
                    </div>
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">10 Ways to Increase Sales Using POS System</a></p>
                        <hr>
                    </div>
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">10 Benefits of Cloud Base Point of Sale System</a></p>
                        <hr>
                    </div>
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">Top 6 Restaurant Management Systems</a></p>
                        <hr>
                    </div>
                    <div class="blog-paragraph">
                        <p class="py-3"><a href="/" class="text-decoration-none text-color">How Moneypex Practice Manager Transforms Time Tracking: A Complete Guide</a></p>
                        <hr>
                    </div>
            </div>
            <div class="col-xxl-7 col-xl-7 col-lg-7 col-12 col-sm-12 col-md-7">
                    <img src="./Blogs_files/50c0d85b-741c-4c13-bc67-114fc61693c37 reasons why your business nedd pos system.png" class="w-100" alt="hero-image">
                    <h5><span class="badge rounded-pill custom-badge bg-info mt-3"><a href="/" class="text-decoration-none">Point of Sale</a></span></h5>
                    <h3 class="pt-xxl-4 pt-xl-3 theme-color">7 Reasons Why Your Business Needs a POS System</h3>
                    <p class="text-muted pt-xxl-4 pt-xl-3">03 April, 2023</p>
                    <p class="pt-xxl-4 pt-xl-3">why your business needs a pos system. You might have seen POS or point-of-sale systems in different stores, restaurants or somewhere else. And you might also have wondered</p>
                    <a href="/" class="btn btn-primary rounded-button">Read More</a>
            </div>
        </div>
    </div>
</section>


<section class="nine">
    <div class="container">
        <div class="text py-4">
            <h6 class="text-secondary fw-bold">
                <a href="/" class="text-decoration-none">
                    Trending Topics
                </a>
            </h6>
        </div>
        <div class="row gy-4">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-12 col-sm-6 col-md-6">
                    <img src="./Blogs_files/9ab5ce5c-27a4-47ba-8af0-18fdcee10a29Effective business accounting software in 2024.png" class="w-100 rounded-3" alt="hero-image">
                    <div class="headd">
                        <h5 class="pt-3"><span class="badge rounded-pill custom-badge bg-info"><a href="/" class="text-decoration-none">Accounting Software</a></span></h5>
                        <p class="text-muted ">21 March, 2023</p>
                        <h4 class="theme-color">Effective Business Accounting Software In 2024</h4>
                        <p>Effective business accounting software in 2022 is evry business need. In this era of technologies and softwares, every business is in search of some accounting</p>
                    </div>
                    <a href="/" class="text-decoration-none fw-bold ">Read More &gt;&gt;</a>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-12 col-sm-6 col-md-6">
                    <img src="./Blogs_files/745e337d-0613-4b56-8651-531a7d6f2598Top Business Trends in 2024.png" class="w-100 rounded-3" alt="hero-image">
                    <div class="headd">
                        <h5 class="pt-3"><span class="badge rounded-pill custom-badge bg-info"><a href="/" class="text-decoration-none">Accounting Software</a></span></h5>
                        <p class="text-muted ">05 January, 2023</p>
                        <h4 class="theme-color">Amazing 8 Top Business Trends in 2024</h4>
                        <p>Learn 8 top business trends in 2024 that will shift businesses to another level of excellence and automation through advanced technology.</p>
                    </div>
                    <a href="/" class="text-decoration-none fw-bold ">Read More &gt;&gt;</a>
                </div>
        </div>
    </div>
</section>


    </div>
  
  @include('userpages.footer')
  @include('userpages.ajax')
</body>
</html>