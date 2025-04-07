<!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>
 
 <body>
    @include('userpages.header')
    <div>
    <link href="./blogsdetail_files/stylesheet.css" rel="stylesheet">

<section class="singal-blog-two">
    <div class="container">
        <div class="row">
            @foreach($blogsdetails as $blogsdetail)
            <div class="col-12">

                    <h5>
                        <span class="badge rounded-pill bg-info custom-badge-section-two">
                            <a class="text-decoration-none">{{$blogsdetail->name}}</a>
                        </span>
                    </h5>
                    <h3 class="pt-3 theme-color">{{$blogsdetail->heading}}</h3>
                    <p class="fw-lighter date-text pt-2">{{ $blogsdetail->created_at->format('d F Y') }}</p>
                    <img height=800 width=100 src="{{ asset('images/' . $blogsdetail->image) }}" class="w-100 pt-3 rounded-1" alt="hero-image">
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="singal-blog-three">
    <div class="container">
        <div class="row gy-5  Ist-row">
            @foreach($blogssections as $blogssection)
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="summer-notes-image" 
                    style="{{ empty($blogssection->heading) ? 'margin-top: -50px; padding-top: 0;' : '' }}">
                    
                    @if(!empty($blogssection->heading))
                        <h3 class="wp-block-heading" 
                            style="margin-bottom: 10px;">
                            <strong>{{$blogssection->heading}}</strong>
                        </h3>
                    @endif
        
                    <ul style="margin-top: 0; padding-top: 0;">
                        <li style="margin-top: 0; padding-top: 0;">
                            {{$blogssection->paragraph}}
                        </li>
                    </ul>
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