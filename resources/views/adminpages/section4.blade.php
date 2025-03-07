<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addsection4 {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addsection4:hover {
        background-color: #45a049;  
    }


.custom-modal.section4, 
.custom-modal.section4edit {
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
                            <button class="addsection4">Add Row</button>
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
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Paragraph</th>
                                <th style="white-space: nowrap;">Sub Image</th>
                                <th style="white-space: nowrap;">Sub Heading</th>
                                <th style="white-space: nowrap;">Sub Paragraph</th>
                                <th>Slug</th>
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($section4s as $section4)
                                        <tr class="user-row" id="section4-{{ $section4->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="section4image">
                                                    <img height="80" width="80" src="{{ asset('images/' . $section4->image) }}"/>
                                               </td>
                                               <td id="section4heading">{{$section4->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($section4->paragraph, 70, '...') }}</td>
                                               <td id="subimage">
                                                <img height="80" width="80" src="{{ asset('images/' . $section4->sub_image) }}"/>
                                               </td>
                                               <td id="subheading">{{$section4->sub_heading}}</td>
                                               <td id="subparagraph">
                                                {{ Str::limit($section4->sub_paragraph, 70, '...') }}
                                               </td>
                                                <td id="slug">{{$section4->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-section4-id="{{ $section4->id }}" class="btn btn-link btn-primary btn-lg edit-section4-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-section4-id="{{ $section4->id }}" class="btn btn-link btn-danger delsection4 mt-2">
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

  <!-- add section4 Modal -->
  <div style="display:none" class="custom-modal section4" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add section4</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="section4form">
                <input type="hidden" id="section4forminput_add" value=""/>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image_add">Image</label>
                            <input type="file" id="image_add" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="heading_add">Heading</label>
                            <input type="text" id="heading_add" name="heading" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paragraph_add">Paragraph</label>
                            <input type="text" id="paragraph_add" name="paragraph" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subimage_add">Sub Image</label>
                            <input type="file" id="subimage_add" name="sub_image" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subheading_add">Sub Heading</label>
                            <input type="text" id="subheading_add" name="sub_heading" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subparagraph_add">Sub Paragraph</label>
                            <input type="text" id="subparagraph_add" name="sub_paragraph" class="form-control">
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
                    <button id="section4add" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit section4 Modal -->
 <div style="display:none" class="custom-modal section4edit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit section4</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="section4editform">
                <input type="hidden" id="section4forminput_edit" value=""/>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image_edit">Image</label>
                            <input type="file" id="image_edit" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="heading_edit">Heading</label>
                            <input type="text" id="heading_edit" name="heading" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paragraph_edit">Paragraph</label>
                            <input type="text" id="paragraph_edit" name="paragraph" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subimage_edit">Sub Image</label>
                            <input type="file" id="subimage_edit" name="sub_image" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subheading_edit">Sub Heading</label>
                            <input type="text" id="subheading_edit" name="sub_heading" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subparagraph_edit">Sub Paragraph</label>
                            <input type="text" id="subparagraph_edit" name="sub_paragraph" class="form-control">
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
                    <button id="section4editForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addsection4').click(function() {
            $('.custom-modal.section4').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.section4').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addsection4')) {
               $('.custom-modal.section4').fadeOut(); 
           }
       });
   });
   
   //to del section4
   $(document).on('click', '.delsection4', function() {
       const section4Id = $(this).data('section4-id');
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
                   url: '/delete-section4',
                   type: 'POST',
                   data: { section4_id: section4Id },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addsection4').show();
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
   
   $('#section4form').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('section4.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'section4 Added!',
                    text: response.message || 'section4 added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#section4form')[0].reset();
                    $('.custom-modal.section4').fadeOut();

                    const section4 = response.section4;
                    const newRow = `
                        <tr data-section4-id="${section4.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${section4.image}" /></td>
                            <td>${section4.heading}</td>
                            <td>${section4.paragraph}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${section4.sub_image}" /></td>
                            <td>${section4.sub_heading}</td>
                            <td>${section4.sub_paragraph}</td>
                            <td>${section4.slug}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="section4edit" data-section4-id="${section4.id}"  class="btn btn-link btn-primary btn-lg edit-section4-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-section4-id="${section4.id}"class="btn btn-link btn-danger delsection4 mt-2">
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


// get section4 data
$(document).on('click', '.edit-section4-btn', function () {
    var section4Id = $(this).data('section4-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('section4.show', '') }}/" + section4Id, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#section4editform #section4forminput_edit').val(response.section4.id);
                if (response.section4.image) {
                    $('#section4editform #image_edit').attr('src', "{{ asset('images') }}/" + response.section4.image);
                }
                $('#section4editform #heading_edit').val(response.section4.heading);
                $('#section4editform #paragraph_edit').val(response.section4.paragraph);
                if (response.section4.image) {
                    $('#section4editform #subimage_edit').attr('src', "{{ asset('images') }}/" + response.section4.sub_image);
                }
                $('#section4editform #subheading_edit').val(response.section4.sub_heading);
                $('#section4editform #subparagraph_edit').val(response.section4.paragraph);
                $('#section4editform #slug_edit').val(response.section4.slug);

                $('.custom-modal.section4edit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch section4 details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit section4
$('#section4editform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var section4Id = $('#section4forminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('section4.update', '') }}/" + section4Id,  
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
                       $('#section4editform')[0].reset();
                       $('.custom-modal.section4edit').fadeOut();
   
                       const section4 = $(`a[data-section4-id="${section4Id}"]`).closest('tr');
                       section4.find('td:nth-child(2) img').attr('src', '/images/' + response.section4.image);
                       section4.find('td:nth-child(3)').text(response.section4.heading);
                       section4.find('td:nth-child(4)').text(response.section4.paragraph);
                       section4.find('td:nth-child(5) img').attr('src', '/images/' + response.section4.sub_image);
                       section4.find('td:nth-child(6)').text(response.section4.sub_heading);
                       section4.find('td:nth-child(7)').text(response.section4.sub_paragraph);
                       section4.find('td:nth-child(8)').text(response.section4.slug);
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
    $('.custom-modal.section4edit').fadeOut();
});
           </script>
  </body>
</html>
