<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addmain {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addmain:hover {
        background-color: #45a049;  
    }


.custom-modal.main, 
.custom-modal.mainedit {
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
                            <button class="addmain">Add Row</button>
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
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($mains as $main)
                                        <tr class="user-row" id="main-{{ $main->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="mainimage">
                                                    <img height="80" width="80" src="{{ asset('images/' . $main->image) }}"/>
                                               </td>
                                               <td id="mainheading">{{$main->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($main->paragraph, 70, '...') }}</td>
                                               <td id="subheading">{{$main->sub_heading}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-main-id="{{ $main->id }}" class="btn btn-link btn-primary btn-lg edit-main-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-main-id="{{ $main->id }}" class="btn btn-link btn-danger delmain mt-2">
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

  <!-- add main Modal -->
  <div style="display:none" class="custom-modal main" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add main</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="mainform">
                <input type="hidden" id="mainforminput_add" value=""/>
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
                   
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="mainadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit main Modal -->
 <div style="display:none" class="custom-modal mainedit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit main</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="maineditform">
                <input type="hidden" id="mainforminput_edit" value=""/>
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
                  
                </div>
                <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                    <button id="maineditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
            function createLoader() {
    const loader = document.createElement('div');
    loader.id = 'loader';
    loader.style.position = 'fixed';
    loader.style.top = '0';
    loader.style.left = '0';
    loader.style.width = '100%';
    loader.style.height = '100%';
    loader.style.backgroundColor = 'rgba(128, 128, 128, 0.6)';
    loader.style.display = 'flex';
    loader.style.alignItems = 'center';
    loader.style.justifyContent = 'center';
    loader.style.zIndex = '9999';

    const spinner = document.createElement('div');
    spinner.style.border = '6px solid #f3f3f3';
    spinner.style.borderTop = '6px solid #3498db';
    spinner.style.borderRadius = '50%';
    spinner.style.width = '50px';
    spinner.style.height = '50px';
    spinner.style.animation = 'spin 0.8s linear infinite';

    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);

    loader.appendChild(spinner);
    document.body.appendChild(loader);
}

function removeLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.remove();
    }
}
   
           $(document).ready(function() {
        $('.addmain').click(function() {
            $('.custom-modal.main').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.main').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addmain')) {
               $('.custom-modal.main').fadeOut(); 
           }
       });
   });
   
   //to del main
   $(document).on('click', '.delmain', function() {
       const mainId = $(this).data('main-id');
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
            createLoader();
               $.ajaxSetup({
                   headers: { 'X-CSRF-TOKEN': csrfToken }
               });
   
               $.ajax({
                   url: '/delete-main',
                   type: 'POST',
                   data: { main_id: mainId },  
                   dataType: 'json',
                   success: function(response) {
                    removeLoader();
                       if (response.success) {
                           $('.addmain').show();
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
                    removeLoader();
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
   
   $('#mainform').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    createLoader();
    $.ajax({
        url: "{{ route('main.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            removeLoader();
            if (response.success) {
                removeLoader();
                Swal.fire({
                    icon: 'success',
                    title: 'main Added!',
                    text: response.message || 'main added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#mainform')[0].reset();
                    $('.custom-modal.main').fadeOut();

                    const main = response.main;
                    const newRow = `
                        <tr data-main-id="${main.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${main.image}" /></td>
                            <td>${main.heading}</td>
                            <td>${main.paragraph}</td>
                            <td>${main.sub_heading}</td>
                            <td>
                                <div class="form-button-action">
                                <a id="mainedit" data-main-id="${main.id}"  class="btn btn-link btn-primary btn-lg edit-main-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-main-id="${main.id}"class="btn btn-link btn-danger delmain mt-2">
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
            removeLoader();
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


// get main data
$(document).on('click', '.edit-main-btn', function () {
    var mainId = $(this).data('main-id');
    createLoader();
     $.ajax({
        url: "{{ route('main.show', '') }}/" + mainId, 
        type: "GET",  
        success: function (response) {
            removeLoader();
            if (response.success) {
                removeLoader();
                $('#maineditform #mainforminput_edit').val(response.main.id);
                if (response.main.image) {
                    $('#maineditform #image_edit').attr('src', "{{ asset('images') }}/" + response.main.image);
                }
                $('#maineditform #heading_edit').val(response.main.heading);
                $('#maineditform #paragraph_edit').val(response.main.paragraph);
                $('#maineditform #subheading_edit').val(response.main.sub_heading);
                $('.custom-modal.mainedit').fadeIn();
            }
        },
        error: function (xhr) {
            removeLoader();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch main details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit main
$('#maineditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var mainId = $('#mainforminput_edit').val(); 
       createLoader();
     
       $.ajax({
           url: "{{ route('main.update', '') }}/" + mainId,  
           type: "POST",  
           data: formData,
           contentType: false, 
           processData: false, 
           success: function (response) {
            removeLoader();
               if (response.success) {
                removeLoader();
                   Swal.fire({
                       icon: 'success',
                       title: 'Updated!',
                       text: response.message || 'Updated successfully.',
                       confirmButtonText: 'Ok'
                   }).then(() => {
                       $('#maineditform')[0].reset();
                       $('.custom-modal.mainedit').fadeOut();
   
                       const main = $(`a[data-main-id="${mainId}"]`).closest('tr');
                       main.find('td:nth-child(2) img').attr('src', '/images/' + response.main.image);
                       main.find('td:nth-child(3)').text(response.main.heading);
                       main.find('td:nth-child(4)').text(response.main.paragraph);
                       main.find('td:nth-child(5)').text(response.main.sub_heading);

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
            removeLoader();
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
    $('.custom-modal.mainedit').fadeOut();
});
           </script>
  </body>
</html>
