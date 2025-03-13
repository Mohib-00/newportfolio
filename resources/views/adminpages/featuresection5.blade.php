<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addfeaturesection5 {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addfeaturesection5:hover {
        background-color: #45a049;  
    }


.custom-modal.featuresection5, 
.custom-modal.featuresection5edit {
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
                            <button class="addfeaturesection5">Add Row</button>
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
                                @foreach($featuresection5s as $featuresection5)
                                        <tr class="user-row" id="featuresection5-{{ $featuresection5->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="featuresection5image">
                                                    <img height="80" width="80" src="{{ asset('images/' . $featuresection5->image) }}"/>
                                               </td>
                                               <td id="featuresection5heading">{{$featuresection5->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($featuresection5->paragraph, 70, '...') }}</td>
                                               <td id="subimage">
                                                <img height="80" width="80" src="{{ asset('images/' . $featuresection5->sub_image) }}"/>
                                               </td>
                                               <td id="subheading">{{$featuresection5->sub_heading}}</td>
                                               <td id="subparagraph">
                                                {{ Str::limit($featuresection5->sub_paragraph, 70, '...') }}
                                               </td>
                                                <td id="slug">{{$featuresection5->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-featuresection5-id="{{ $featuresection5->id }}" class="btn btn-link btn-primary btn-lg edit-featuresection5-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-featuresection5-id="{{ $featuresection5->id }}" class="btn btn-link btn-danger delfeaturesection5 mt-2">
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

  <!-- add featuresection5 Modal -->
  <div style="display:none" class="custom-modal featuresection5" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add featuresection5</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="featuresection5form">
                <input type="hidden" id="featuresection5forminput_add" value=""/>
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
                    <button id="featuresection5add" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit featuresection5 Modal -->
 <div style="display:none" class="custom-modal featuresection5edit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit featuresection5</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="featuresection5editform">
                <input type="hidden" id="featuresection5forminput_edit" value=""/>
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
                    <button id="featuresection5editForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addfeaturesection5').click(function() {
            $('.custom-modal.featuresection5').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.featuresection5').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addfeaturesection5')) {
               $('.custom-modal.featuresection5').fadeOut(); 
           }
       });
   });
   
   //to del featuresection5
   $(document).on('click', '.delfeaturesection5', function() {
       const featuresection5Id = $(this).data('featuresection5-id');
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
                   url: '/delete-featuresection5',
                   type: 'POST',
                   data: { featuresection5_id: featuresection5Id },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addfeaturesection5').show();
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
   
   $('#featuresection5form').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('featuresection5.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'featuresection5 Added!',
                    text: response.message || 'featuresection5 added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#featuresection5form')[0].reset();
                    $('.custom-modal.featuresection5').fadeOut();

                    const featuresection5 = response.featuresection5;
                    const newRow = `
                        <tr data-featuresection5-id="${featuresection5.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${featuresection5.image}" /></td>
                            <td>${featuresection5.heading}</td>
                            <td>${featuresection5.paragraph}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${featuresection5.sub_image}" /></td>
                            <td>${featuresection5.sub_heading}</td>
                            <td>${featuresection5.sub_paragraph}</td>
                            <td>${featuresection5.slug}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="featuresection5edit" data-featuresection5-id="${featuresection5.id}"  class="btn btn-link btn-primary btn-lg edit-featuresection5-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-featuresection5-id="${featuresection5.id}"class="btn btn-link btn-danger delfeaturesection5 mt-2">
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


// get featuresection5 data
$(document).on('click', '.edit-featuresection5-btn', function () {
    var featuresection5Id = $(this).data('featuresection5-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('featuresection5.show', '') }}/" + featuresection5Id, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#featuresection5editform #featuresection5forminput_edit').val(response.featuresection5.id);
                if (response.featuresection5.image) {
                    $('#featuresection5editform #image_edit').attr('src', "{{ asset('images') }}/" + response.featuresection5.image);
                }
                $('#featuresection5editform #heading_edit').val(response.featuresection5.heading);
                $('#featuresection5editform #paragraph_edit').val(response.featuresection5.paragraph);
                if (response.featuresection5.image) {
                    $('#featuresection5editform #subimage_edit').attr('src', "{{ asset('images') }}/" + response.featuresection5.sub_image);
                }
                $('#featuresection5editform #subheading_edit').val(response.featuresection5.sub_heading);
                $('#featuresection5editform #subparagraph_edit').val(response.featuresection5.paragraph);
                $('#featuresection5editform #slug_edit').val(response.featuresection5.slug);

                $('.custom-modal.featuresection5edit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch featuresection5 details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit featuresection5
$('#featuresection5editform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var featuresection5Id = $('#featuresection5forminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('featuresection5.update', '') }}/" + featuresection5Id,  
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
                       $('#featuresection5editform')[0].reset();
                       $('.custom-modal.featuresection5edit').fadeOut();
   
                       const featuresection5 = $(`a[data-featuresection5-id="${featuresection5Id}"]`).closest('tr');
                       featuresection5.find('td:nth-child(2) img').attr('src', '/images/' + response.featuresection5.image);
                       featuresection5.find('td:nth-child(3)').text(response.featuresection5.heading);
                       featuresection5.find('td:nth-child(4)').text(response.featuresection5.paragraph);
                       featuresection5.find('td:nth-child(5) img').attr('src', '/images/' + response.featuresection5.sub_image);
                       featuresection5.find('td:nth-child(6)').text(response.featuresection5.sub_heading);
                       featuresection5.find('td:nth-child(7)').text(response.featuresection5.sub_paragraph);
                       featuresection5.find('td:nth-child(8)').text(response.featuresection5.slug);
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
    $('.custom-modal.featuresection5edit').fadeOut();
});
           </script>
  </body>
</html>
