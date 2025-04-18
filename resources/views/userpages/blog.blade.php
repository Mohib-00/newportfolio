<!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>
 
 <body>
    
  @include('userpages.header')
<section class="one background-hero-image" style="background: #cccccc">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-12 col-sm-12 col-md-6">
                <div class="text">
                    <h3 class="text-white">Explore Our Blogs</h3>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-12 col-sm-12 col-md-6">
                <img src="{{asset('Blogs_files/group-diverse-people-using-digital-devices.png')}}" class="w-75" alt="hero-image">
            </div>
        </div>
    </div>
</section>

<section class="five mt-2">
    <div class="container">
        <div class="row gx-5 gy-5">
            @php
            $half = ceil($blogs->count() / 2);
            $firstHalf = $blogs->take($half);
            $secondHalf = $blogs->skip($half);
        @endphp
           @foreach($firstHalf as $blog)
           <div class="col-xxl-3 col-xl-3 col-lg-3 col-12 col-sm-6 col-md-6">
               <img height=270 width=100 src="{{ asset('images/' . $blog->image) }}" class="w-100 rounded-3" alt="hero-image">
               <div class="headd">
                   <h5 class="pt-3">
                       <span class="badge rounded-pill custom-badge bg-info">
                           <a class="text-decoration-none">{{$blog->name}}</a>
                       </span>
                   </h5>
                   <p class="text-muted">{{ $blog->created_at->format('d F Y') }}</p>
                   <h4 class="theme-color">{{$blog->heading}}</h4>
                   <p>{{$blog->paragraph}}</p>
               </div>
               <a href="#" onclick="loadBlogDetails('{{ Str::slug($blog->name) }}'); return false;" class="text-decoration-none fw-bold">Read More &gt;&gt;</a>
           </div>
       @endforeach
                
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

               @foreach($secondHalf as $blog)
    <div class="col-xxl-3 col-xl-3 col-lg-3 col-12 col-sm-6 col-md-6">
        <img height=270 width=100 src="{{ asset('images/' . $blog->image) }}" class="w-100 rounded-3" alt="hero-image">
        <div class="headd">
            <h5 class="pt-3">
                <span class="badge rounded-pill custom-badge bg-info">
                    <a href="/" class="text-decoration-none">{{$blog->name}}</a>
                </span>
            </h5>
            <p class="text-muted">{{ $blog->created_at->format('d F Y') }}</p>
            <h4 class="theme-color">{{$blog->heading}}</h4>
            <p>{{$blog->paragraph}}</p>
        </div>
        <a href="#" onclick="loadBlogDetails('{{ Str::slug($blog->name) }}'); return false;" class="text-decoration-none fw-bold">Read More &gt;&gt;</a>
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