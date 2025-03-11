<section class="login-section py-5">
    <div class="box-shade py-5 box-shadoww bg-light">
        <div class="container">
            <h3 class="theme-color fw-bold text-center mb-5">Logix 199 Products</h3>
            <div class="row row-first gy-4 d-none d-sm-flex ">

                {{--laptop view--}}
                @foreach($projects as $project)
    <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
        <div class="box-shadoww h-100 p-4 box-radius">
            <div class="d-flex align-items-center">
                <img style="width:50px;height:50px" src="{{ asset('images/' . $project->image) }}" class="me-3" alt="accounting-icon">
                <div class="w-100">
                    <h6 class="mt-0 fw-bold text-color">
                        {{ $project->name }}
                    </h6>
                </div>
                <div class="w-100 text-end">
                    <div class="d-flex flex-column align-items-end">
                        <a href="{{ route('project.details', ['slug' => Str::slug($project->name)]) }}" 
                            class="btn btn-primary mb-2 box-shadoww">
                            Details
                        </a>       
                        <a class="btn btn-primary box-shadoww" href="/">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

            
                
            </div>
           
           {{--mobile view--}}
            <div class="row row-second gy-4 d-sm-none">

                @foreach($projects as $project)
                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4 col-xxl-4">
                    <div class="box-shadoww h-100 p-4 box-radius">
                        <div class="d-flex align-items-center">
                            <img style="width:50px;height:50px" src="{{ asset('images/' . $project->image) }}" class="me-3" alt="accounting-icon">
                            <div class="w-100">
                                <h6 class="mt-0 fw-bold text-color">
                                    {{ $project->name }}
                                </h6>
                            </div>
                            <div class="w-100 text-end">
                                <div class="d-flex flex-column align-items-end">
                                    <a href="{{ route('project.details', ['slug' => Str::slug($project->name)]) }}" 
                                        class="btn btn-primary mb-2 box-shadoww">
                                        Details
                                    </a>       
                                    <a class="btn btn-primary box-shadoww" href="/">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            

            </div>
        </div>
    </div>
</section>