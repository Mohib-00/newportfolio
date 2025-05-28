<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addblog {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addblog:hover {
        background-color: #45a049;  
    }


.custom-modal.blog, 
.custom-modal.blogedit {
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
                            <button class="addblog">Add Row</button>
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
                                <th>Heading</th>
                                <th>Paragraph</th>
                                <th>Slug</th>
                                <th style="width: 10%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($blogs as $blog)
                                        <tr class="user-row" id="blog-{{ $blog->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="icon">
                                                     <img height="80" width="80" src="{{ asset('images/' . $blog->image) }}"/>
                                                </td>
                                                <td id="name">{{$blog->name}}</td>  
                                                <td id="heading">{{$blog->heading}}</td>  
                                                <td id="paragraph">{{$blog->paragraph}}</td>
                                                <td id="slug">{{$blog->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-blog-id="{{ $blog->id }}" class="btn btn-link btn-primary btn-lg edit-blog-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-blog-id="{{ $blog->id }}" class="btn btn-link btn-danger delblog mt-2">
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

    <!-- Add blog data Modal -->
    <div style="display:none" class="custom-modal blog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Add blog</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="blogform">
                    <input type="hidden" id="blogforminput_add" value=""/>
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="icon_add">Image</label>
                                <input type="file" id="icon_add" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="name_add">Name</label>
                                <input type="text" id="name_add" name="name" class="form-control">
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
                                <input type="text" id="slug_add" name="slug" class="form-control">
                            </div>
                        </div>
                       
                    </div>
                    <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                        <button id="blogadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="button" class="btn btn-secondary closeModal">Close</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    


     <!-- Add blog edit Modal -->
     <div style="display:none" class="custom-modal blogedit" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Edit blog</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="blogeditform">
                    <input type="hidden" id="blogforminput_edit" value=""/>
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="icon_edit">Image</label>
                                <input type="file" id="icon_edit" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name_edit">Name</label>
                                <input type="text" id="name_edit" name="name" class="form-control">
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
                                <input type="text" id="slug_edit" name="slug" class="form-control">
                            </div>
                        </div>
                       
                    </div>
                    <div class="modal-footer mt-5" style="justify-content: flex-end; display: flex;">
                        <button id="blogeditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addblog').click(function() {
            $('.custom-modal.blog').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.blog').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addblog')) {
               $('.custom-modal.blog').fadeOut(); 
           }
       });
   });
   
   //to del blog
   $(document).on('click', '.delblog', function() {
       const blogId = $(this).data('blog-id');
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
                   url: '/delete-blog',
                   type: 'POST',
                   data: { blog_id: blogId },  
                   dataType: 'json',
                   success: function(response) {
                    removeLoader();
                       if (response.success) {
                        removeLoader();
                           $('.addblog').show();
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
   
        $('#blogform').on('submit', function (e) {
       e.preventDefault();   
   
       let formData = new FormData(this);
       createLoader();
       $.ajax({
           url: "{{ route('blog.store') }}",
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
                       title: 'Added!',
                       text: response.message || 'Added successfully.',
                       confirmButtonText: 'Ok'
                   }).then(() => {
                       $('#blogform')[0].reset();
                       $('.custom-modal.blog').fadeOut();
   
                       const blog = response.blog;
                       const newRow = `
                           <tr data-blog-id="${blog.id}">
                               <td>${$('.table tbody tr').length + 1}</td>
                               <td><img height="80" width="80" src="{{ asset('images/') }}/${blog.image}" /></td>
                               <td>${blog.name}</td>
                               <td>${blog.heading}</td>
                               <td>${blog.paragraph}</td>
                               <td>${blog.slug}</td>
                               <td>
                                <div class="form-button-action">
                                   <a id="blogedit" data-blog-id="${blog.id}" class="btn btn-link btn-primary btn-lg edit-blog-btn">
                                      <i class="fa fa-edit"></i>
                                   </a>
                              
                                   <a data-blog-id="${blog.id}" class="btn btn-link btn-danger mt-2 delblog">
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
   
   
   // get blog data
   $(document).on('click', '.edit-blog-btn', function () {
       var blogId = $(this).data('blog-id');
       createLoader();
       $.ajax({
           url: "{{ route('blog.show', '') }}/" + blogId, 
           type: "GET",  
           success: function (response) {
            removeLoader();
               if (response.success) {
                removeLoader();
                   $('#blogeditform #blogforminput_edit').val(response.blog.id);
                   if (response.blog.image) {
                       $('#blogeditform #icon_edit').attr('src', "{{ asset('images') }}/" + response.blog.image);
                   }
                   $('#blogeditform #name_edit').val(response.blog.name);
                   $('#blogeditform #heading_edit').val(response.blog.heading);
                   $('#blogeditform #paragraph_edit').val(response.blog.paragraph);
                   $('#blogeditform #slug_edit').val(response.blog.slug);
                   $('.custom-modal.blogedit').fadeIn();
               }
           },
           error: function (xhr) {
            removeLoader();
               Swal.fire({
                   icon: 'error',
                   title: 'Error!',
                   text: 'Failed to fetch details.',
                   confirmButtonText: 'Ok'
               });
           }
       });
   });
   
   
   // Edit blog 
   $('#blogeditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var blogId = $('#blogforminput_edit').val(); 
       createLoader();
     
       $.ajax({
           url: "{{ route('blog.update', '') }}/" + blogId,  
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
                       $('#blogeditform')[0].reset();
                       $('.custom-modal.blogedit').fadeOut();
   
                       const blog = $(`a[data-blog-id="${blogId}"]`).closest('tr');
                       blog.find('td:nth-child(2) img').attr('src', '/images/' + response.blog.image);
                       blog.find('td:nth-child(3)').text(response.blog.name);
                       blog.find('td:nth-child(4)').text(response.blog.heading);
                       blog.find('td:nth-child(5)').text(response.blog.paragraph);
                       blog.find('td:nth-child(6)').text(response.blog.slug);
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
       $('.custom-modal.blogedit').fadeOut();
   });
           </script>
  </body>
</html>
