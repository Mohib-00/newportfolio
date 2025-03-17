<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addproject {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addproject:hover {
        background-color: #45a049;  
    }


.custom-modal.project, 
.custom-modal.projectedit {
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
                            <button class="addproject">Add Row</button>
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
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Links</th>
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($projects as $project)
                                        <tr class="user-row" id="project-{{ $project->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="projectimage">
                                                    <img height="80" width="80" src="{{ asset('images/' . $project->image) }}"/>
                                               </td>
                                               <td id="projectname">{{$project->name}}</td>
                                               <td id="projectlinks">{{$project->links}}</td>
                                               <td id="projectlink">{{$project->link}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-project-id="{{ $project->id }}" class="btn btn-link btn-primary btn-lg edit-project-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-project-id="{{ $project->id }}" class="btn btn-link btn-danger delproject mt-2">
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

    <!-- Add project  Modal -->
    <div style="display:none" class="custom-modal project" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Add project</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="projectform">
                    <input type="hidden" id="projectforminput_add" value=""/>
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="icon_add">Image</label>
                                <input type="file" id="icon_add" name="image" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="heading_add">Heading</label>
                                <input type="text" id="heading_add" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="links_add">Slug</label>
                                <input type="text" id="links_add" name="links" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="link_add">Link</label>
                                <input type="text" id="link_add" name="link" class="form-control">
                            </div>
                        </div>
                       
                    </div>
                    <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                        <button id="projectadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="button" class="btn btn-secondary closeModal">Close</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    


     <!-- edit project Modal -->
     <div style="display:none" class="custom-modal projectedit" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Edit project</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="projecteditform">
                    <input type="hidden" id="projectforminput_edit" value=""/>
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="icon_edit">Image</label>
                                <input type="file" id="icon_edit" name="image" class="form-control">
                            </div>
                        </div>
                       
                       
                        <div class="col-6">
                            <div class="form-group">
                                <label for="heading_edit">Heading</label>
                                <input type="text" id="name_edit" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="links_edit">Slug</label>
                                <input type="text" id="links_edit" name="links" class="form-control">
                                <span class="invalid-feedback" id="links_error"></span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="link_edit">Links</label>
                                <input type="text" id="link_edit" name="link" class="form-control">
                                <span class="invalid-feedback" id="links_error"></span>
                            </div>
                        </div>
                       
                    </div>
                    <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                        <button id="projecteditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addproject').click(function() {
            $('.custom-modal.project').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.project').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addproject')) {
               $('.custom-modal.project').fadeOut(); 
           }
       });
   });
   
   //to del project
   $(document).on('click', '.delproject', function() {
       const projectId = $(this).data('project-id');
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
                   url: '/delete-project',
                   type: 'POST',
                   data: { project_id: projectId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addproject').show();
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
   
   $('#projectform').on('submit', function (e) {
   console.log('hit');
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('project.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Project Added!',
                    text: response.message || 'Project added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#projectform')[0].reset();
                    $('.custom-modal.project').fadeOut();

                    const project = response.project;
                    const newRow = `
                        <tr data-project-id="${project.id}">
                            <td>1</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${project.image}" /></td>
                            <td>${project.name}</td>
                            <td>${project.links}</td>
                            <td>${project.link}</td>
                            <td>
                                <div class="form-button-action">
                                <a id="projectedit" data-project-id="${project.id}" class="btn btn-link btn-primary btn-lg edit-project-btn">
                                   <i class="fa fa-edit"></i>
                                </a>
                           
                                <a data-project-id="${project.id}" class="btn btn-link btn-danger delproject mt-2">
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


// get project data
$(document).on('click', '.edit-project-btn', function () {
    var projectId = $(this).data('project-id');
 
     $.ajax({
        url: "{{ route('project.show', '') }}/" + projectId, 
        type: "GET",  
        success: function (response) {
            if (response.success) {
                 $('#projecteditform #projectforminput_edit').val(response.project.id);
                 if (response.project.icon) {
                    $('#projecteditform #image_edit').attr('src', "{{ asset('images') }}/" + response.project.image);
                }
                $('#projecteditform #name_edit').val(response.project.name);
                $('#projecteditform #links_edit').val(response.project.links);
                $('#projecteditform #link_edit').val(response.project.link);
                $('.custom-modal.projectedit').fadeIn();
            }
        },
        error: function (xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch project details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});

//edit project
$('#projecteditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var projectId = $('#projectforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('project.update', '') }}/" + projectId,  
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
                       $('#projecteditform')[0].reset();
                       $('.custom-modal.projectedit').fadeOut();
   
                       const project = $(`a[data-project-id="${projectId}"]`).closest('tr');
                       project.find('td:nth-child(2) img').attr('src', '/images/' + response.project.image);
                       project.find('td:nth-child(3)').text(response.project.name);
                       project.find('td:nth-child(4)').text(response.project.links);
                       project.find('td:nth-child(5)').text(response.project.link);
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
    $('.custom-modal.projectedit').fadeOut();
});
           </script>
  </body>
</html>
