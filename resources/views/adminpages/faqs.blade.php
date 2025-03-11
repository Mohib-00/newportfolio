<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addfaqs {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addfaqs:hover {
        background-color: #45a049;  
    }


.custom-modal.faqs, 
.custom-modal.faqsedit {
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;              
    justify-content: center;   
    align-items: center; 
}


    .modal-dialog {
        max-width: 800px;
        animation: slideDown 0.5s ease;
    }

  
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes slideDown {
        0% { transform: translateY(-50px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        height: auto;
        text-align: center;
    }
</style>
  </head>
  <body>
    <div class="wrapper">
    @include('adminpages.sidebar')

      <div class="main-panel">
        @include('adminpages.header')

        <div class="container">
          <div class="page-inner">
     
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="addfaqs">Add Row</button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table
                            id="add-row"
                            class="display table table-striped table-hover"
                          >
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Slug</th>
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($faqses as $faqs)
                                        <tr class="user-row" id="faqs-{{ $faqs->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="paragraph">{{ Str::limit($faqs->question, 70, '...') }}</td>
                                                <td id="paragraph">{{ Str::limit($faqs->answer, 70, '...') }}</td>
                                                <td id="slug">{{$faqs->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-faqs-id="{{ $faqs->id }}" class="btn btn-link btn-primary btn-lg edit-faqs-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-faqs-id="{{ $faqs->id }}" class="btn btn-link btn-danger delfaqs mt-2">
                                                        <i class="fa fa-times"></i>                    
                                                    </a>
                                                </div>
                                                </td>
                                                 
                                            </tr>
                                            @php $counter++; @endphp
                                        @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>

        @include('adminpages.footer')
      </div>
    </div>

       
<div id="loader" style="display: none">
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>
  </div>

  <!-- add faqs Modal -->
  <div style="display:none" class="custom-modal faqs" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add faqs</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="faqsform">
                <input type="hidden" id="faqsforminput_add" value=""/>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="question_add">Question</label>
                            <input type="text" id="question_add" name="question" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="answer_add">Answer</label>
                            <input type="text" id="answer_add" name="answer" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="slug_add">Slug</label>
                            <input type="text" id="slug_add" name="slug" class="form-control">
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="faqsadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit faqs Modal -->
 <div style="display:none" class="custom-modal faqsedit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit faqs</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="faqseditform">
                <input type="hidden" id="faqsforminput_edit" value=""/>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="question_edit">Question</label>
                            <input type="text" id="question_edit" name="question" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="answer_edit">Answer</label>
                            <input type="text" id="answer_edit" name="answer" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="slug_edit">Slug</label>
                            <input type="text" id="slug_edit" name="slug" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="faqseditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

    @include('adminpages.js')
    @include('adminpages.ajax')
    <script>
        $(document).ready(function () {
       
   
           $(document).ready(function() {
        $('.addfaqs').click(function() {
            $('.custom-modal.faqs').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.faqs').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addfaqs')) {
               $('.custom-modal.faqs').fadeOut(); 
           }
       });
   });
   
   //to del faqs
   $(document).on('click', '.delfaqs', function() {
       const faqsId = $(this).data('faqs-id');
       const csrfToken = $('meta[name="csrf-token"]').attr('content');
       const row = $(this).closest('tr');  
   
       Swal.fire({
           title: 'Are you sure?',
           text: "Do you want to delete this?",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#d33',
           cancelButtonColor: '#3085d6',
           confirmButtonText: 'Yes, delete!'
       }).then((result) => {
           if (result.isConfirmed) {
               $('#loader').fadeIn(300);
               $.ajaxSetup({
                   headers: { 'X-CSRF-TOKEN': csrfToken }
               });
   
               $.ajax({
                   url: '/delete-faqs',
                   type: 'POST',
                   data: { faqs_id: faqsId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addfaqs').show();
                           row.remove(); 
                           Swal.fire(
                               'Deleted!',
                               response.message,
                               'success'
                           );
                       } else {
                           Swal.fire(
                               'Error',
                               response.message,
                               'error'
                           );
                       }
                   },
                   error: function(xhr) {
                       $('#loader').fadeOut(300);
                       console.error(xhr);
                       Swal.fire(
                           'Error',
                           'An error occurred while deleting this.',
                           'error'
                       );
                   }
               });
           }
       });
   });
   
   $('#faqsform').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('faqs.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'faqs Added!',
                    text: response.message || 'faqs added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#faqsform')[0].reset();
                    $('.custom-modal.faqs').fadeOut();

                    const faqs = response.faqs;
                    const newRow = `
                        <tr data-faqs-id="${faqs.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td>${faqs.question}</td>
                            <td>${faqs.answer}</td>
                            <td>${faqs.slug}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="faqsedit" data-faqs-id="${faqs.id}"  class="btn btn-link btn-primary btn-lg edit-faqs-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-faqs-id="${faqs.id}"class="btn btn-link btn-danger delfaqs mt-2">
                                    <i class="fa fa-times"></i>         
                                </a>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').prepend(newRow);
                    $('table tbody tr').each(function (index) {
                      $(this).find('td:first').text(index + 1);
                    });
                });
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            let errors = xhr.responseJSON.errors;
            if (errors) {
                let errorMessages = Object.values(errors)
                    .map(err => err.join('\n'))
                    .join('\n');
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessages,
                    confirmButtonText: 'Ok'
                });
            }
        }
    });
});


// get faqs data
$(document).on('click', '.edit-faqs-btn', function () {
    var faqsId = $(this).data('faqs-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('faqs.show', '') }}/" + faqsId, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#faqseditform #faqsforminput_edit').val(response.faqs.id);
                $('#faqseditform #question_edit').val(response.faqs.question);
                $('#faqseditform #answer_edit').val(response.faqs.answer);
                $('#faqseditform #slug_edit').val(response.faqs.slug);

                $('.custom-modal.faqsedit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch faqs details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit faqs
$('#faqseditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var faqsId = $('#faqsforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('faqs.update', '') }}/" + faqsId,  
           type: "POST",  
           data: formData,
           contentType: false, 
           processData: false, 
           success: function (response) {
               $('#loader').hide();
               if (response.success) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Updated!',
                       text: response.message || 'Updated successfully.',
                       confirmButtonText: 'Ok'
                   }).then(() => {
                       $('#faqseditform')[0].reset();
                       $('.custom-modal.faqsedit').fadeOut();
   
                       const faqs = $(`a[data-faqs-id="${faqsId}"]`).closest('tr');
                       faqs.find('td:nth-child(2)').text(response.faqs.question);
                       faqs.find('td:nth-child(3)').text(response.faqs.answer);
                       faqs.find('td:nth-child(4)').text(response.faqs.slug);
                   });
               } else {
                   Swal.fire({
                       icon: 'error',
                       title: 'Error!',
                       text: response.message || 'An error occurred.',
                       confirmButtonText: 'Ok'
                   });
               }
           },
           error: function (xhr) {
               $('#loader').hide();
               let errors = xhr.responseJSON.errors;
               if (errors) {
                   let errorMessages = Object.values(errors)
                       .map(err => err.join('\n'))
                       .join('\n');
                   Swal.fire({
                       icon: 'error',
                       title: 'Error!',
                       text: errorMessages,
                       confirmButtonText: 'Ok'
                   });
               }
           }
       });
   });
});

$('.closeModal').on('click', function () {
    $('.custom-modal.faqsedit').fadeOut();
});
           </script>
  </body>
</html>
