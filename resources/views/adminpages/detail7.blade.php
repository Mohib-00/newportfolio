<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .adddetail7 {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .adddetail7:hover {
        background-color: #45a049;  
    }


.custom-modal.detail7, 
.custom-modal.detail7edit {
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
                            <button class="adddetail7">Add Row</button>
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
                                @foreach($detail7s as $detail7)
                                        <tr class="user-row" id="detail7-{{ $detail7->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="detail7image">
                                                    <img height="80" width="80" src="{{ asset('images/' . $detail7->image) }}"/>
                                               </td>
                                               <td id="detail7heading">{{$detail7->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($detail7->paragraph, 70, '...') }}</td>
                                               <td id="subimage">
                                                <img height="80" width="80" src="{{ asset('images/' . $detail7->sub_image) }}"/>
                                               </td>
                                               <td id="subheading">{{$detail7->sub_heading}}</td>
                                               <td id="subparagraph">
                                                {{ Str::limit($detail7->sub_paragraph, 70, '...') }}
                                               </td>
                                                <td id="slug">{{$detail7->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-detail7-id="{{ $detail7->id }}" class="btn btn-link btn-primary btn-lg edit-detail7-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-detail7-id="{{ $detail7->id }}" class="btn btn-link btn-danger deldetail7 mt-2">
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

  <!-- add detail7 Modal -->
  <div style="display:none" class="custom-modal detail7" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add detail7</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="detail7form">
                <input type="hidden" id="detail7forminput_add" value=""/>
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
                    <button id="detail7add" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit detail7 Modal -->
 <div style="display:none" class="custom-modal detail7edit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit detail7</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="detail7editform">
                <input type="hidden" id="detail7forminput_edit" value=""/>
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
                    <button id="detail7editForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.adddetail7').click(function() {
            $('.custom-modal.detail7').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.detail7').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.adddetail7')) {
               $('.custom-modal.detail7').fadeOut(); 
           }
       });
   });
   
   //to del detail7
   $(document).on('click', '.deldetail7', function() {
       const detail7Id = $(this).data('detail7-id');
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
                   url: '/delete-detail7',
                   type: 'POST',
                   data: { detail7_id: detail7Id },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.adddetail7').show();
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
   
   $('#detail7form').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('detail7.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'detail7 Added!',
                    text: response.message || 'detail7 added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#detail7form')[0].reset();
                    $('.custom-modal.detail7').fadeOut();

                    const detail7 = response.detail7;
                    const newRow = `
                        <tr data-detail7-id="${detail7.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${detail7.image}" /></td>
                            <td>${detail7.heading}</td>
                            <td>${detail7.paragraph}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${detail7.sub_image}" /></td>
                            <td>${detail7.sub_heading}</td>
                            <td>${detail7.sub_paragraph}</td>
                            <td>${detail7.slug}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="detail7edit" data-detail7-id="${detail7.id}"  class="btn btn-link btn-primary btn-lg edit-detail7-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-detail7-id="${detail7.id}"class="btn btn-link btn-danger deldetail7 mt-2">
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


// get detail7 data
$(document).on('click', '.edit-detail7-btn', function () {
    var detail7Id = $(this).data('detail7-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('detail7.show', '') }}/" + detail7Id, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#detail7editform #detail7forminput_edit').val(response.detail7.id);
                if (response.detail7.image) {
                    $('#detail7editform #image_edit').attr('src', "{{ asset('images') }}/" + response.detail7.image);
                }
                $('#detail7editform #heading_edit').val(response.detail7.heading);
                $('#detail7editform #paragraph_edit').val(response.detail7.paragraph);
                if (response.detail7.image) {
                    $('#detail7editform #subimage_edit').attr('src', "{{ asset('images') }}/" + response.detail7.sub_image);
                }
                $('#detail7editform #subheading_edit').val(response.detail7.sub_heading);
                $('#detail7editform #subparagraph_edit').val(response.detail7.paragraph);
                $('#detail7editform #slug_edit').val(response.detail7.slug);

                $('.custom-modal.detail7edit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch detail7 details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit detail7
$('#detail7editform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var detail7Id = $('#detail7forminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('detail7.update', '') }}/" + detail7Id,  
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
                       $('#detail7editform')[0].reset();
                       $('.custom-modal.detail7edit').fadeOut();
   
                       const detail7 = $(`a[data-detail7-id="${detail7Id}"]`).closest('tr');
                       detail7.find('td:nth-child(2) img').attr('src', '/images/' + response.detail7.image);
                       detail7.find('td:nth-child(3)').text(response.detail7.heading);
                       detail7.find('td:nth-child(4)').text(response.detail7.paragraph);
                       detail7.find('td:nth-child(5) img').attr('src', '/images/' + response.detail7.sub_image);
                       detail7.find('td:nth-child(6)').text(response.detail7.sub_heading);
                       detail7.find('td:nth-child(7)').text(response.detail7.sub_paragraph);
                       detail7.find('td:nth-child(8)').text(response.detail7.slug);
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
    $('.custom-modal.detail7edit').fadeOut();
});
           </script>
  </body>
</html>
