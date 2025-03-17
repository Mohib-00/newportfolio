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
                    <img src="{{ asset('images/' . $blogsdetail->image) }}" class="w-100 pt-3 rounded-1" alt="hero-image">
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="singal-blog-three">
    <div class="container">
        <div class="row gy-5 gx-5 Ist-row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="summer-notes-image">
                    <h3 class="wp-block-heading" id="qualifications-required-for-accountants">
                        <strong>Qualifications Required For Accountants</strong>
                    </h3>
                    <p>There are recognised accounting qualifications to look out for:</p>
                    <ul>
                        <li>
                            <strong>ACA or FCA:</strong> Member or fellow of the 
                            <a href="#">Institute of Chartered Accountants in England & Wales</a> (ICAEW). 
                            Only members of this institute are entitled to use the title "Chartered Accountant." 
                            A Scottish and Irish Institute is also available.
                        </li>
                    </ul>
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