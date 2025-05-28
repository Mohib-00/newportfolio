<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addservicebanner {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addservicebanner:hover {
        background-color: #45a049;  
    }


.custom-modal.servicebanner, 
.custom-modal.servicebanneredit {
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
                            <button class="addservicebanner">Add Row</button>
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
                                <th style="white-space: nowrap;">Sub Heading</th>
                                <th>Slug</th>
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($servicebanners as $servicebanner)
                                        <tr class="user-row" id="servicebanner-{{ $servicebanner->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="servicebannerimage">
                                                    <img height="80" width="80" src="{{ asset('images/' . $servicebanner->image) }}"/>
                                               </td>
                                               <td id="servicebannerheading">{{$servicebanner->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($servicebanner->paragraph, 70, '...') }}</td>
                                               <td id="subheading">{{$servicebanner->sub_heading}}</td>
                                                <td id="slug">{{$servicebanner->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-servicebanner-id="{{ $servicebanner->id }}" class="btn btn-link btn-primary btn-lg edit-servicebanner-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-servicebanner-id="{{ $servicebanner->id }}" class="btn btn-link btn-danger delservicebanner mt-2">
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

  <!-- add servicebanner Modal -->
  <div style="display:none" class="custom-modal servicebanner" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add servicebanner</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="servicebannerform">
                <input type="hidden" id="servicebannerforminput_add" value=""/>
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
                            <label for="subheading_add">Sub Heading</label>
                            <input type="text" id="subheading_add" name="sub_heading" class="form-control">
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
                    <button id="servicebanneradd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit servicebanner Modal -->
 <div style="display:none" class="custom-modal servicebanneredit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit servicebanner</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="servicebannereditform">
                <input type="hidden" id="servicebannerforminput_edit" value=""/>
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
                            <label for="subheading_edit">Sub Heading</label>
                            <input type="text" id="subheading_edit" name="sub_heading" class="form-control">
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
                    <button id="servicebannereditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addservicebanner').click(function() {
            $('.custom-modal.servicebanner').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.servicebanner').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addservicebanner')) {
               $('.custom-modal.servicebanner').fadeOut(); 
           }
       });
   });
   
   //to del servicebanner
   $(document).on('click', '.delservicebanner', function() {
       const servicebannerId = $(this).data('servicebanner-id');
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
                   url: '/delete-servicebanner',
                   type: 'POST',
                   data: { servicebanner_id: servicebannerId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addservicebanner').show();
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
   
   $('#servicebannerform').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('servicebanner.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'servicebanner Added!',
                    text: response.message || 'servicebanner added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#servicebannerform')[0].reset();
                    $('.custom-modal.servicebanner').fadeOut();

                    const servicebanner = response.servicebanner;
                    const newRow = `
                        <tr data-servicebanner-id="${servicebanner.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${servicebanner.image}" /></td>
                            <td>${servicebanner.heading}</td>
                            <td>${servicebanner.paragraph}</td>
                            <td>${servicebanner.sub_heading}</td>
                            <td>${servicebanner.slug}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="servicebanneredit" data-servicebanner-id="${servicebanner.id}"  class="btn btn-link btn-primary btn-lg edit-servicebanner-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-servicebanner-id="${servicebanner.id}"class="btn btn-link btn-danger delservicebanner mt-2">
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


// get servicebanner data
$(document).on('click', '.edit-servicebanner-btn', function () {
    var servicebannerId = $(this).data('servicebanner-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('servicebanner.show', '') }}/" + servicebannerId, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#servicebannereditform #servicebannerforminput_edit').val(response.servicebanner.id);
                if (response.servicebanner.image) {
                    $('#servicebannereditform #image_edit').attr('src', "{{ asset('images') }}/" + response.servicebanner.image);
                }
                $('#servicebannereditform #heading_edit').val(response.servicebanner.heading);
                $('#servicebannereditform #paragraph_edit').val(response.servicebanner.paragraph);
                $('#servicebannereditform #subheading_edit').val(response.servicebanner.sub_heading);
                $('#servicebannereditform #slug_edit').val(response.servicebanner.slug);

                $('.custom-modal.servicebanneredit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch servicebanner details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit servicebanner
$('#servicebannereditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var servicebannerId = $('#servicebannerforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('servicebanner.update', '') }}/" + servicebannerId,  
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
                       $('#servicebannereditform')[0].reset();
                       $('.custom-modal.servicebanneredit').fadeOut();
   
                       const servicebanner = $(`a[data-servicebanner-id="${servicebannerId}"]`).closest('tr');
                       servicebanner.find('td:nth-child(2) img').attr('src', '/images/' + response.servicebanner.image);
                       servicebanner.find('td:nth-child(3)').text(response.servicebanner.heading);
                       servicebanner.find('td:nth-child(4)').text(response.servicebanner.paragraph);
                       servicebanner.find('td:nth-child(5)').text(response.servicebanner.sub_heading);
                       servicebanner.find('td:nth-child(6)').text(response.servicebanner.slug);
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
    $('.custom-modal.servicebanneredit').fadeOut();
});
           </script>
  </body>
</html>
