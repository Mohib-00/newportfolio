<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addfeature {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addfeature:hover {
        background-color: #45a049;  
    }


.custom-modal.feature, 
.custom-modal.featureedit {
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
                            <button class="addfeature">Add Row</button>
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
                                <th>Slug</th>
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($features as $feature)
                                        <tr class="user-row" id="feature-{{ $feature->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="featureimage">
                                                    <img height="80" width="80" src="{{ asset('images/' . $feature->image) }}"/>
                                               </td>
                                               <td id="featureheading">{{$feature->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($feature->paragraph, 70, '...') }}</td>
                                                <td id="slug">{{$feature->links}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-feature-id="{{ $feature->id }}" class="btn btn-link btn-primary btn-lg edit-feature-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-feature-id="{{ $feature->id }}" class="btn btn-link btn-danger delfeature mt-2">
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

  <!-- add feature Modal -->
  <div style="display:none" class="custom-modal feature" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add feature</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="featureform">
                <input type="hidden" id="featureforminput_add" value=""/>
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
                            <label for="slug_add">Slug</label>
                            <input type="text" id="slug_add" name="links" class="form-control">
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="featureadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit feature Modal -->
 <div style="display:none" class="custom-modal featureedit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit feature</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="featureeditform">
                <input type="hidden" id="featureforminput_edit" value=""/>
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
                            <label for="slug_edit">Slug</label>
                            <input type="text" id="slug_edit" name="links" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="featureeditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addfeature').click(function() {
            $('.custom-modal.feature').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.feature').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addfeature')) {
               $('.custom-modal.feature').fadeOut(); 
           }
       });
   });
   
   //to del feature
   $(document).on('click', '.delfeature', function() {
       const featureId = $(this).data('feature-id');
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
                   url: '/delete-feature',
                   type: 'POST',
                   data: { feature_id: featureId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addfeature').show();
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
   
   $('#featureform').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('feature.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'feature Added!',
                    text: response.message || 'feature added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#featureform')[0].reset();
                    $('.custom-modal.feature').fadeOut();

                    const feature = response.feature;
                    const newRow = `
                        <tr data-feature-id="${feature.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${feature.image}" /></td>
                            <td>${feature.heading}</td>
                            <td>${feature.paragraph}</td>
                            <td>${feature.links}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="featureedit" data-feature-id="${feature.id}"  class="btn btn-link btn-primary btn-lg edit-feature-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-feature-id="${feature.id}"class="btn btn-link btn-danger delfeature mt-2">
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


// get feature data
$(document).on('click', '.edit-feature-btn', function () {
    var featureId = $(this).data('feature-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('feature.show', '') }}/" + featureId, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#featureeditform #featureforminput_edit').val(response.feature.id);
                if (response.feature.image) {
                    $('#featureeditform #image_edit').attr('src', "{{ asset('images') }}/" + response.feature.image);
                }
                $('#featureeditform #heading_edit').val(response.feature.heading);
                $('#featureeditform #paragraph_edit').val(response.feature.paragraph);
                $('#featureeditform #slug_edit').val(response.feature.links);

                $('.custom-modal.featureedit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch feature details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit feature
$('#featureeditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var featureId = $('#featureforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('feature.update', '') }}/" + featureId,  
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
                       $('#featureeditform')[0].reset();
                       $('.custom-modal.featureedit').fadeOut();
   
                       const feature = $(`a[data-feature-id="${featureId}"]`).closest('tr');
                       feature.find('td:nth-child(2) img').attr('src', '/images/' + response.feature.image);
                       feature.find('td:nth-child(3)').text(response.feature.heading);
                       feature.find('td:nth-child(4)').text(response.feature.paragraph);
                       feature.find('td:nth-child(5)').text(response.feature.links);
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
    $('.custom-modal.featureedit').fadeOut();
});
           </script>
  </body>
</html>
