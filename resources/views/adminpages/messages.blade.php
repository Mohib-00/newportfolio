<!DOCTYPE html>
<html lang="en">
  <head>
   @include('adminpages.css')
   <style>
    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        width: 100%;
        max-width: 800px; 
        animation: slideDown 0.5s ease;
    }

    .modal-dialog {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    @media (max-width: 767px) {
        .modal-dialog {
            max-width: 90%; 
        }

        .modal-content {
            padding: 15px;
        }
    }

    @media (max-width: 480px) {
        .modal-content {
            padding: 10px;
        }
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
                      <h4 class="card-title">Users</h4>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th style="white-space: nowrap;">Change Status</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($messages as $message)
                                        <tr class="user-row">
                                            <td>{{ $counter }}</td>
                                            <td style="white-space: nowrap;">{{ $message->name }}</td>
                                            <td style="white-space: nowrap;">{{ $message->email }}</td>
                                            <td style="white-space: nowrap;">{{ $message->phone }}</td>
                                            <td style="white-space: nowrap;">{{ $message->subject }}</td>
                                            <td style="white-space: nowrap;">{{ $message->message }}</td>
                                            <td class="status">
                                                @if($message->status == 1)
                                                    <span id="new" style="background-color: red; color: white; padding: 8px 8px; border-radius: 50px; display: inline-block;">
                                                        Old
                                                    </span>
                                                @else
                                                    <span id="old" style="background-color: black; color: white; padding: 10px 6px; border-radius: 50px; display: inline-block;">
                                                        New
                                                    </span>
                                                @endif
                                            </td>
                                            
                                            
                                          <td>
                                            <a data-message-id="{{ $message->id }}" class="btn btn-link btn-danger delmsg">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            
                                          </td>


                                          <td>
                                            @if($message->status == 0)
                                            <a data-message-id="{{ $message->id }}" class="btn btn-link btn-primary btn-lg editstatus">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @else
                                            <a class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i> 
                                            </a>
                                        @endif
                                            
                                          </td>
                                            @php $counter++; @endphp
                                        </tr>
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

    @include('adminpages.js')
    @include('adminpages.ajax')

    <script>

//to chng msg status
$(document).on('click', '.editstatus', function(e) {
    e.preventDefault();
    const messageId = $(this).data('message-id');

     Swal.fire({
        title: 'Are you sure?',
        text: "You want to mark this message as old?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/update-status",   
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",   
                    message_id: messageId   
                },
                success: function(response) {
                    if (response.success) {
                        
                        Swal.fire('Updated!', 'The status has been changed to Old.', 'success');

                
                        const statusTd = $(`a[data-message-id="${messageId}"]`).closest('tr').find('td.status');  
                        statusTd.html('<span style="background-color: red; color: white; padding: 8px 8px; border-radius: 50px; display: inline-block;">Old</span>'); // Change status to 'Old'

                         $(`a[data-message-id="${messageId}"]`).prop('disabled', true);
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
});


//to del message
$(document).on('click', '.delmsg', function() {
    const msgId = $(this).data('message-id');
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    const row = $(this).closest('tr');  

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this message?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': csrfToken }
            });

            $.ajax({
                url: '/delete-message',
                type: 'POST',
                data: { message_id: msgId },  
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
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
                    console.error(xhr);
                    Swal.fire(
                        'Error',
                        'An error occurred while deleting the message.',
                        'error'
                    );
                }
            });
        }
    });
});
       </script>
  </body>
</html>
