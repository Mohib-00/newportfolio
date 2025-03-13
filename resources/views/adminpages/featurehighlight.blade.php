<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addhighlight {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addhighlight:hover {
        background-color: #45a049;  
    }


.custom-modal.highlight, 
.custom-modal.highlightedit {
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
                            <button class="addhighlight">Add Row</button>
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
                                @foreach($featurehighlights as $highlight)
                                        <tr class="user-row" id="highlight-{{ $highlight->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="icon">
                                                     <img height="80" width="80" src="{{ asset('images/' . $highlight->image) }}"/>
                                                </td>

                                                <td id="heading">{{$highlight->heading}}</td>  
                                                <td id="paragraph">{{$highlight->paragraph}}</td>
                                                <td id="slug">{{$highlight->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-highlight-id="{{ $highlight->id }}" class="btn btn-link btn-primary btn-lg edit-highlight-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-highlight-id="{{ $highlight->id }}" class="btn btn-link btn-danger delhighlight mt-2">
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

    <!-- Add highlight data Modal -->
    <div style="display:none" class="custom-modal highlight" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Add Highlight</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="highlightform">
                    <input type="hidden" id="highlightforminput_add" value=""/>
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
                        <button id="highlightadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="button" class="btn btn-secondary closeModal">Close</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    


     <!-- Add highlight edit Modal -->
     <div style="display:none" class="custom-modal highlightedit" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="font-weight: bolder" class="modal-title">Edit Highlight</h2>
                    <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                        &times;
                    </button>
                </div>
    
                <form id="highlighteditform">
                    <input type="hidden" id="highlightforminput_edit" value=""/>
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
                        <button id="highlighteditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addhighlight').click(function() {
            $('.custom-modal.highlight').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.highlight').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addhighlight')) {
               $('.custom-modal.highlight').fadeOut(); 
           }
       });
   });
   
   //to del highlight
   $(document).on('click', '.delhighlight', function() {
       const highlightId = $(this).data('highlight-id');
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
                   url: '/delete-featurehighlight',
                   type: 'POST',
                   data: { highlight_id: highlightId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addhighlight').show();
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
   
        $('#highlightform').on('submit', function (e) {
       e.preventDefault();   
   
       let formData = new FormData(this);
       $('#loader').show();
       $.ajax({
           url: "{{ route('featurehighlight.store') }}",
           type: "POST",
           data: formData,
           contentType: false,
           processData: false,
           success: function (response) {
               $('#loader').hide();
               if (response.success) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Added!',
                       text: response.message || 'Added successfully.',
                       confirmButtonText: 'Ok'
                   }).then(() => {
                       $('#highlightform')[0].reset();
                       $('.custom-modal.highlight').fadeOut();
   
                       const highlight = response.highlight;
                       const newRow = `
                           <tr data-highlight-id="${highlight.id}">
                               <td>${$('.table tbody tr').length + 1}</td>
                               <td><img height="80" width="80" src="{{ asset('images/') }}/${highlight.image}" /></td>
                               <td>${highlight.heading}</td>
                               <td>${highlight.paragraph}</td>
                               <td>${highlight.slug}</td>
                               <td>
                                <div class="form-button-action">
                                   <a id="highlightedit" data-highlight-id="${highlight.id}" class="btn btn-link btn-primary btn-lg edit-highlight-btn">
                                      <i class="fa fa-edit"></i>
                                   </a>
                              
                                   <a data-highlight-id="${highlight.id}" class="btn btn-link btn-danger mt-2 delhighlight">
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
   
   
   // get highlight data
   $(document).on('click', '.edit-highlight-btn', function () {
       var highlightId = $(this).data('highlight-id');
       $('#loader').show();
       $.ajax({
           url: "{{ route('featurehighlight.show', '') }}/" + highlightId, 
           type: "GET",  
           success: function (response) {
               console.log(response);
               $('#loader').hide();
               if (response.success) {
                   $('#highlighteditform #highlightforminput_edit').val(response.highlight.id);
                   if (response.highlight.image) {
                       $('#highlighteditform #icon_edit').attr('src', "{{ asset('images') }}/" + response.highlight.image);
                   }
                   $('#highlighteditform #heading_edit').val(response.highlight.heading);
                   $('#highlighteditform #paragraph_edit').val(response.highlight.paragraph);
                   $('#highlighteditform #slug_edit').val(response.highlight.slug);
                   $('.custom-modal.highlightedit').fadeIn();
               }
           },
           error: function (xhr) {
               $('#loader').hide();
               Swal.fire({
                   icon: 'error',
                   title: 'Error!',
                   text: 'Failed to fetch details.',
                   confirmButtonText: 'Ok'
               });
           }
       });
   });
   
   
   // Edit highlight 
   $('#highlighteditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var highlightId = $('#highlightforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('featurehighlight.update', '') }}/" + highlightId,  
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
                       $('#highlighteditform')[0].reset();
                       $('.custom-modal.highlightedit').fadeOut();
   
                       const highlight = $(`a[data-highlight-id="${highlightId}"]`).closest('tr');
                       highlight.find('td:nth-child(2) img').attr('src', '/images/' + response.highlight.image);
                       highlight.find('td:nth-child(3)').text(response.highlight.heading);
                       highlight.find('td:nth-child(4)').text(response.highlight.paragraph);
                       highlight.find('td:nth-child(5)').text(response.highlight.slug);
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
       $('.custom-modal.highlightedit').fadeOut();
   });
           </script>
  </body>
</html>
