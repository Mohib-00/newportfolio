<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addinventory {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addinventory:hover {
        background-color: #45a049;  
    }


.custom-modal.inventory, 
.custom-modal.inventoryedit {
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
                            <button class="addinventory">Add Row</button>
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
                                @foreach($inventorys as $inventory)
                                        <tr class="user-row" id="inventory-{{ $inventory->id }}">
                                                <td>{{$counter}}</td>
                                                <td id="inventoryimage">
                                                    <img height="80" width="80" src="{{ asset('images/' . $inventory->image) }}"/>
                                               </td>
                                               <td id="inventoryheading">{{$inventory->heading}}</td>
                                               <td id="paragraph">{{ Str::limit($inventory->paragraph, 70, '...') }}</td>
                                               <td id="subimage">
                                                <img height="80" width="80" src="{{ asset('images/' . $inventory->sub_image) }}"/>
                                               </td>
                                               <td id="subheading">{{$inventory->sub_heading}}</td>
                                               <td id="subparagraph">
                                                {{ Str::limit($inventory->sub_paragraph, 70, '...') }}
                                               </td>
                                                <td id="slug">{{$inventory->slug}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                    <a data-inventory-id="{{ $inventory->id }}" class="btn btn-link btn-primary btn-lg edit-inventory-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <a data-inventory-id="{{ $inventory->id }}" class="btn btn-link btn-danger delinventory mt-2">
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

  <!-- add inventory Modal -->
  <div style="display:none" class="custom-modal inventory" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Add inventory</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="inventoryform">
                <input type="hidden" id="inventoryforminput_add" value=""/>
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
                    <button id="inventoryadd" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="button" class="btn btn-secondary closeModal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



 <!-- edit inventory Modal -->
 <div style="display:none" class="custom-modal inventoryedit" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-weight: bolder" class="modal-title">Edit inventory</h2>
                <button type="button" class="close closeModal" style="background: transparent; border: none; font-size: 2.5rem; color: #333;">
                    &times;
                </button>
            </div>

            <form id="inventoryeditform">
                <input type="hidden" id="inventoryforminput_edit" value=""/>
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
                    <button id="inventoryeditForm" type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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
        $('.addinventory').click(function() {
            $('.custom-modal.inventory').fadeIn();  
       });
   
        $('.closeModal').click(function() {
           $('.custom-modal.inventory').fadeOut(); 
       });
   
        $(document).click(function(event) {
           if (!$(event.target).closest('.modal-content').length && !$(event.target).is('.addinventory')) {
               $('.custom-modal.inventory').fadeOut(); 
           }
       });
   });
   
   //to del inventory
   $(document).on('click', '.delinventory', function() {
       const inventoryId = $(this).data('inventory-id');
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
                   url: '/delete-inventory',
                   type: 'POST',
                   data: { inventory_id: inventoryId },  
                   dataType: 'json',
                   success: function(response) {
                       $('#loader').fadeOut(300);
                       if (response.success) {
                           $('.addinventory').show();
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
   
   $('#inventoryform').on('submit', function (e) {
    e.preventDefault();   

    let formData = new FormData(this);
    $('#loader').show();
    $.ajax({
        url: "{{ route('inventory.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'inventory Added!',
                    text: response.message || 'inventory added successfully.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    $('#inventoryform')[0].reset();
                    $('.custom-modal.inventory').fadeOut();

                    const inventory = response.inventory;
                    const newRow = `
                        <tr data-inventory-id="${inventory.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${inventory.image}" /></td>
                            <td>${inventory.heading}</td>
                            <td>${inventory.paragraph}</td>
                            <td><img height="80" width="80" src="{{ asset('images/') }}/${inventory.sub_image}" /></td>
                            <td>${inventory.sub_heading}</td>
                            <td>${inventory.sub_paragraph}</td>
                            <td>${inventory.slug}</td>

                            <td>
                                <div class="form-button-action">
                                <a id="inventoryedit" data-inventory-id="${inventory.id}"  class="btn btn-link btn-primary btn-lg edit-inventory-btn">
                                    <i class="fa fa-edit"></i>
                                </a>
                         
                                <a data-inventory-id="${inventory.id}"class="btn btn-link btn-danger delinventory mt-2">
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


// get inventory data
$(document).on('click', '.edit-inventory-btn', function () {
    var inventoryId = $(this).data('inventory-id');
    $('#loader').show();
     $.ajax({
        url: "{{ route('inventory.show', '') }}/" + inventoryId, 
        type: "GET",  
        success: function (response) {
            $('#loader').hide();
            if (response.success) {
                $('#inventoryeditform #inventoryforminput_edit').val(response.inventory.id);
                if (response.inventory.image) {
                    $('#inventoryeditform #image_edit').attr('src', "{{ asset('images') }}/" + response.inventory.image);
                }
                $('#inventoryeditform #heading_edit').val(response.inventory.heading);
                $('#inventoryeditform #paragraph_edit').val(response.inventory.paragraph);
                if (response.inventory.image) {
                    $('#inventoryeditform #subimage_edit').attr('src', "{{ asset('images') }}/" + response.inventory.sub_image);
                }
                $('#inventoryeditform #subheading_edit').val(response.inventory.sub_heading);
                $('#inventoryeditform #subparagraph_edit').val(response.inventory.paragraph);
                $('#inventoryeditform #slug_edit').val(response.inventory.slug);

                $('.custom-modal.inventoryedit').fadeIn();
            }
        },
        error: function (xhr) {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to fetch inventory details.',
                confirmButtonText: 'Ok'
            });
        }
    });
});
//edit inventory
$('#inventoryeditform').on('submit', function (e) {
       e.preventDefault();
   
       var formData = new FormData(this); 
       var inventoryId = $('#inventoryforminput_edit').val(); 
       $('#loader').show();
     
       $.ajax({
           url: "{{ route('inventory.update', '') }}/" + inventoryId,  
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
                       $('#inventoryeditform')[0].reset();
                       $('.custom-modal.inventoryedit').fadeOut();
   
                       const inventory = $(`a[data-inventory-id="${inventoryId}"]`).closest('tr');
                       inventory.find('td:nth-child(2) img').attr('src', '/images/' + response.inventory.image);
                       inventory.find('td:nth-child(3)').text(response.inventory.heading);
                       inventory.find('td:nth-child(4)').text(response.inventory.paragraph);
                       inventory.find('td:nth-child(5) img').attr('src', '/images/' + response.inventory.sub_image);
                       inventory.find('td:nth-child(6)').text(response.inventory.sub_heading);
                       inventory.find('td:nth-child(7)').text(response.inventory.sub_paragraph);
                       inventory.find('td:nth-child(8)').text(response.inventory.slug);
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
    $('.custom-modal.inventoryedit').fadeOut();
});
           </script>
  </body>
</html>
