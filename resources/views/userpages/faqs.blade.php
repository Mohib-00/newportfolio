<section class="faqs-section my-3 pb-sm-5 pb-5 " style="background-color: #f8f8f8 !important;">
    <div class="container">
        <div class="row py-sm-5 my-sm-4 py-3 px-sm-5 px-3">
            <div class="col-12">
                <div>
                    <h2 class="accordian-item-color theme-color fs-1 pt-4 pt-md-0 fw-bold">FAQs</h2>
                    <div class="accordion faqs" id="accordionExample">

                        

                        @foreach($mainfaqses as $index => $faqs)
                        <div class="accordion-item accordian-item-color faq-item {{ $index >= 5 ? 'd-none' : '' }}">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordian-item-color accordion-button collapsed text-secondary fw-bold" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#collapse{{ $index }}" 
                                    aria-expanded="false" 
                                    aria-controls="collapse{{ $index }}">
                                    {{$faqs->question}}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" 
                                class="accordion-collapse collapse" 
                                aria-labelledby="heading{{ $index }}" 
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{$faqs->answer}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                       
                       
                    </div>
                </div>
                <div class="col-12 pt-4">
                    <button type="button" class="btn btn-primary nav-link text-white btn-sm theme-btn-radius theme-solid-btn px-4 mt-lg-3 mb-3 mb-lg-0 mx-auto" id="view-more">
                        View More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("view-more").addEventListener("click", function() {
    let hiddenFaqs = document.querySelectorAll(".faq-item.d-none");
    hiddenFaqs.forEach(item => item.classList.remove("d-none"));
    this.style.display = "none";
    });
</script>