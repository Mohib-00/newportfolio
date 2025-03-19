<section class="shadow sticky-index sticky-top">
    <a href="https://wa.me/03217990199" target="_blank" 
    style="position: fixed; bottom: 20px; right: 20px; background-color: #25D366; color: white; padding: 10px 15px; 
           border-radius: 50px; text-decoration: none; font-weight: bold; display: flex; align-items: center; 
           animation: rotate3D 2s infinite ease-in-out;">
     <img src="{{ asset('whatsapp.png') }}" alt="WhatsApp" width="30" style="margin-right: 8px;">
     Need Help?
 </a>
 
 <style>
 @keyframes rotate3D {
     0% { transform: rotateY(0deg) rotateX(0deg); }
     25% { transform: rotateY(15deg) rotateX(10deg); }
     50% { transform: rotateY(0deg) rotateX(0deg); }
     75% { transform: rotateY(-15deg) rotateX(-10deg); }
     100% { transform: rotateY(0deg) rotateX(0deg); }
 }
 </style>
 

    {{--<div id="topHeader" class="text-center background-color p-2 ">
        <a class="text-decoration-none text-white" href="/register">Try For Free</a>
    </div>--}}
     <!-- ? mobile Navbar start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light d-lg-none">
        <div class="container-fluid container-md d-flex">
            <a href="/">
                <img class="header-logoo" src="{{ asset('images/' . $settings->logo) }}" alt="MP small icon" style="min-width:60%;height:60px;">
            </a>
            <div class="">
                <a class="btn btn-primary text-white btn-sm theme-btn-radius theme-solid-btn nav-btn" href="/select_app">Get&nbsp;Started</a>
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <img src="{{asset('index_files/menu-icon.svg')}}" id="toogle-menu-icon" alt="Toggle Menu Icon" onclick="toogleIconOpen()">
                    <img src="{{asset('index_files/close-icon.svg')}}" id="menu-cross-icon" alt="Toggle Menu Icon" onclick="toogleIconClose()">
                </button>

            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Features
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($features as $feature)
                            <li><a class="dropdown-item dropdown-color" href="{{ route('feature.details', ['slug' => Str::slug($feature->heading)]) }}">{{$feature->heading}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="/our_blog">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact_us">Contact</a>
                    </li>
                    <li class="nav-item">
                        @if (auth()->check())
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item logoutuser">Logout</a></li>
                            </ul>
                        </div>
                        @else
                        <a class="nav-link" href="/login">
                           Log In
                        </a>
                        @endif
                    
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ? Separate Mobile Navbar end -->
    <!-- ? big Navbar start -->
    <nav class="navbar navbar-expand-md navbar-light bg-white d-none d-lg-block py-3">
        <div class="container-fluid container-md mbl-header">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/' . $settings->logo) }}" alt="Moneypex Footer logo" class="align-text-top header-logo" style="min-width:60%;height:70px;">
            </a>
            <button class="navbar-toggler border border-2 ms-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <img src="{{asset('index_files/menu-icon.svg')}}" id="toogle-menu-icon" alt="Toggle Menu Icon" onclick="toogleIconOpen()">
                <img src="{{asset('index_files/close-icon.svg')}}" id="menu-cross-icon" alt="Toggle Menu Icon" onclick="toogleIconClose()">
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="nav navbar-nav ps-3 pl-sm-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Features
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($features as $feature)
                            <li><a class="dropdown-item py-md-2" href="{{ route('feature.details', ['slug' => Str::slug($feature->heading)]) }}" style="color:gray;">{{$feature->heading}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    
                    <li class="nav-item pe-md-3">
                        <a class="nav-link text-secondary" href="/our_blog">Blogs</a>
                    </li>
                    <li class="nav-item pe-md-3">
                        <a class="nav-link text-secondary" href="/contact_us">Contact</a>
                    </li>
                    <li class="nav-item pe-md-3">
                        @if (auth()->check())
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item logoutuser">Logout</a></li>
                            </ul>
                        </div>
                        @else
                        <a class="nav-link" href="/login">
                           Log In
                        </a>
                        @endif
                    
                    </li>
                    <li class="nav-item pe-md-3">
                        <a class="btn btn-primary nav-link text-white btn-sm theme-btn-radius theme-solid-btn nav-btn px-4 d-none d-sm-block" href="/select_app">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>