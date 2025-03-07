<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .adddetail6 {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .adddetail6:hover {
        background-color: #45a049;  
    }


.custom-modal.detail6, 
.custom-modal.detail6edit {
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
                            <button class="adddetail6">Add Row</button>
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
                                @foreach($detail6s as $detail6)
                                        <tr class="user-row" id="detail6-{{ $detail6->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="detail6image">
                                                    <img height="80" width="80" src="{{ asset('images/' . $detail6->image) }}"/>
                                               </td>
                                               <td id="detail6heading">{{$detail6->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($detail6->paragraph, 70, '...') }}</td>
                                               <td id="subimage">
                                                <img height="80" width="80" src="{{ asset('images/' . $detail6->sub_image) }}"/>
                                               </td>
                                               <td id="subheading">{{$detail6->sub_heading}}</td>
                                               <td id="subparagraph">
                                                {{ Str::limit($detail6->sub_paragraph, 70, '...') }}
                                               </td>
                                                <td id="slug">{{$detail6->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-detail6-id="{{ $detail6->id }}" class="btn btn-link btn-primary btn-lg edit-detail6-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-detail6-id="{{ $detail6->id }}" class="btn btn-link btn-danger deldetail6 mt-2">
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

  <!-- add detail6 Modal -->
  <div style="display:none" class="custom-modal detail6" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add detail6</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="detail6form">
                <input type="hidden" id="detail6forminput_add" value=""/>
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
                    <button id="detail6add" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit detail6 Modal -->
 <div style="display:none" class="custom-modal detail6edit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit detail6</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="detail6editform">
                <input type="hidden" id="detail6forminput_edit" value=""/>
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
                    <button id="detail6editForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.adddetail6').click(function() {
            $('.custom-modal.detail6').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.detail6').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.adddetail6')) {
               $('.custom-modal.detail6').fadeOut(); 
           }
       });
   });
   
   //to del detail6
   $(document).on('click', '.deldetail6', function() {
       const detail6Id = $(this).data('detail6-id');
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
                   url: '/delete-detail6',
                   type: 'POST',
                   data: { detail6_id: detail6Id },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.adddetail6').show();
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
   
   $('#detail6form').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('detail6.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'detail6 Added!',
                    text: response.message || 'detail6 added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#detail6form')[0].reset();
                    $('.custom-modal.detail6').fadeOut();

                    const detail6 = response.detail6;
                    const newRow = `
                        <tr data-detail6-id="${detail6.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${detail6.image}" /></td>
                            <td>${detail6.heading}</td>
                            <td>${detail6.paragraph}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${detail6.sub_image}" /></td>
                            <td>${detail6.sub_heading}</td>
                            <td>${detail6.sub_paragraph}</td>
                            <td>${detail6.slug}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="detail6edit" data-detail6-id="${detail6.id}"  class="btn btn-link btn-primary btn-lg edit-detail6-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-detail6-id="${detail6.id}"class="btn btn-link btn-danger deldetail6 mt-2">
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


// get detail6 data
$(document).on('click', '.edit-detail6-btn', function () {
    var detail6Id = $(this).data('detail6-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('detail6.show', '') }}/" + detail6Id, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#detail6editform #detail6forminput_edit').val(response.detail6.id);
                if (response.detail6.image) {
                    $('#detail6editform #image_edit').attr('src', "{{ asset('images') }}/" + response.detail6.image);
                }
                $('#detail6editform #heading_edit').val(response.detail6.heading);
                $('#detail6editform #paragraph_edit').val(response.detail6.paragraph);
                if (response.detail6.image) {
                    $('#detail6editform #subimage_edit').attr('src', "{{ asset('images') }}/" + response.detail6.sub_image);
                }
                $('#detail6editform #subheading_edit').val(response.detail6.sub_heading);
                $('#detail6editform #subparagraph_edit').val(response.detail6.paragraph);
                $('#detail6editform #slug_edit').val(response.detail6.slug);

                $('.custom-modal.detail6edit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch detail6 details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit detail6
$('#detail6editform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var detail6Id = $('#detail6forminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('detail6.update', '') }}/" + detail6Id,  
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
                       $('#detail6editform')[0].reset();
                       $('.custom-modal.detail6edit').fadeOut();
   
                       const detail6 = $(`a[data-detail6-id="${detail6Id}"]`).closest('tr');
                       detail6.find('td:nth-child(2) img').attr('src', '/images/' + response.detail6.image);
                       detail6.find('td:nth-child(3)').text(response.detail6.heading);
                       detail6.find('td:nth-child(4)').text(response.detail6.paragraph);
                       detail6.find('td:nth-child(5) img').attr('src', '/images/' + response.detail6.sub_image);
                       detail6.find('td:nth-child(6)').text(response.detail6.sub_heading);
                       detail6.find('td:nth-child(7)').text(response.detail6.sub_paragraph);
                       detail6.find('td:nth-child(8)').text(response.detail6.slug);
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
    $('.custom-modal.detail6edit').fadeOut();
});
           </script>
  </body>
</html>
