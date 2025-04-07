<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
//register
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $('#register').on('click', function () {
        Register();
    });

     
    $('#registrationForm').on('keypress', function (e) {
        if (e.which === 13) {  
            e.preventDefault(); 
            Register();
        }
    });

    function Register() {
    $('.text-danger').text('');  

    var formData = {
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        confirmPassword: $('#confirmPassword').val()
    };

    var valid = true;

    
    if (!formData.name) {
        $('#nameError').text('The name field is required.');
        valid = false;
    }

    
    if (!formData.email) {
        $('#emailError').text('The email field is required.');
        valid = false;
    }

    
    if (!formData.password) {
        $('#passwordError').text('The password field is required.');
        valid = false;
    } else if (formData.password.length < 8) {
        $('#passwordError').text('Password must be at least 8 characters long.');
        valid = false;
    }

    
    if (!formData.confirmPassword) {
        $('#confirmPasswordError').text('The confirm password field is required.');
        valid = false;
    } else if (formData.password !== formData.confirmPassword) {
        $('#confirmPasswordError').text('Passwords do not match.');
        valid = false;
    }

    if (!valid) {
        return;  
    }

    
    $.ajax({
        url: '/register', 
        type: 'POST',
        data: formData,
        success: function (response) {
            if (response.status) {
                $('#registrationForm')[0].reset();   
                window.location.href = '/login';
            } else {
                if (response.errors) {
                    $.each(response.errors, function (key, error) {
                        $('#' + key + 'Error').text(error[0]);   
                    });
                }
            }
        },
        error: function (xhr) {
             
            if (xhr.status === 401) {
                var response = xhr.responseJSON;
                if (response) {
                    console.error('Registration Failed', response);
                    $('#emailError').text('The email has already been taken');
                } else {
                    $('#emailError').text('The email has already been taken');
                }
            } else {
                $('#emailError').text('The email has already been taken');
            }
        }
    });
}


    
    //login
    $('#login').on('click', function (e) {
        e.preventDefault();
        Login();
    });

    
    $('#loginForm').on('keypress', function (e) {
        if (e.which === 13) {  
            e.preventDefault(); 
            Login();
        }
    });

    function Login() {
    $('.text-danger').text('');  

    var formData = {
        email: $('#loginEmail').val(),
        password: $('#loginPassword').val()
    };

    var valid = true;

    
    if (!formData.email) {
        $('#loginEmailError').text('The email field is required.');
        valid = false;
    }

    if (!formData.password) {
        $('#loginPasswordError').text('The password field is required.');
        valid = false;
    }

    if (!valid) {
        return;  
    }

    $.ajax({
        url: '/login',
        type: 'POST',
        data: formData,
        success: function (response) {
            if (response.status) {
                localStorage.setItem('token', response.token); 
                $('meta[name="csrf-token"]').attr('content', response.csrfToken);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': response.csrfToken
                    }
                });

              
                var url = response.userType === '1' ? '/admin' : '/'; 
                window.location.href = url;
            } else {
                
                if (response.errors) {
                   
                    if (response.errors.email) {
                        $('#loginEmailError').text(response.errors.email[0]);   
                    }
                    if (response.errors.password) {
                        $('#loginPasswordError').text(response.errors.password[0]);   
                    }
                } else {
                    
                    $('#loginEmailError').text(response.message); 
                    $('#loginPasswordError').text(response.message); 
                }
            }
        },
        error: function (xhr) {
            
            if (xhr.status === 401) {
                var response = xhr.responseJSON;
                if (response.errors) {
                    
                    if (response.errors.email) {
                        $('#loginEmailError').text(response.errors.email[0]);
                    } 
                    if (response.errors.password) {
                        $('#loginPasswordError').text(response.errors.password[0]);
                    }
                } else {
                    $('#loginEmailError').text('Invalid credentials');
                    $('#loginPasswordError').text('Invalid credentials');
                }
            }
        }
    });
}

});
     
//logout
$(document).ready(function () {
       
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

     
    $('.logout').on('click', function () {
   
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: '/logout',
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        
        success: function (response) {
            if (response.status) {
                localStorage.removeItem('token');
                window.location.href = '/login';

                
                $.ajax({
                    url: '/',
                    type: 'GET',
                    success: function (content) {
                        $('body').html(content);
                    },
                    error: function () {
                        alert('Failed to load content.');
                    }
                });
            } else {
                alert('Logout failed. Please try again.');
            }
        },
        error: function (xhr) {
            console.error(xhr);
            alert('An error occurred while logging out.');
        }
    });
});

$(document).ready(function() {
  
  $('.logoutuser').click(function(e) {
      e.preventDefault();  

       
      $.ajax({
          url: '/logoutuser',   
          type: 'POST',
          headers: {
              'Authorization': 'Bearer ' + localStorage.getItem('token') 
          },
          success: function(response) {
              
              if (response.status) {
                  localStorage.removeItem('token');
                  window.location.href ='/';
              }
          },
          error: function(xhr, status, error) {
               alert('There was an error logging out.');
          }
      });
  });
});
   //to save customer message
   $(document).ready(function () {
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();

         
        $('.text-danger').html('');

        $.ajax({
            url: "{{ route('submit.message') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire(
                        'Message Sent!',
                        'Our team will reach you shortly.',
                        'success'
                    );
                    $('#contactForm')[0].reset();  
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
 
                    $.each(errors, function (field, message) {
                        $('#error-' + field).text(message[0]);
                    });

                    Swal.fire(
                        'Error!',
                        'Please correct the highlighted fields and try again.',
                        'error'
                    );
                }
            }
        });
    });
});

});
 
</script>
<script>
   function showLoader() {
    if (!document.getElementById('loader')) {
        const loader = document.createElement('div');
        loader.id = 'loader';
        loader.style.cssText = `
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5); z-index: 9999;
            display: flex; justify-content: center; align-items: center;
        `;
        loader.innerHTML = `
            <div style="
                border: 8px solid #f3f3f3;
                border-top: 8px solid #3498db;
                border-radius: 50%;
                width: 60px;
                height: 60px;
                animation: spin 1s linear infinite;
            "></div>
            <style>
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            </style>
        `;
        document.body.appendChild(loader);
    }
}

function hideLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.remove();
    }
}

function loadBlogsPage() {
    showLoader();
    fetch('/our_blog')
        .then(response => response.text())
        .then(html => {
            hideLoader();
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', '/our_blog');
        })
        .catch(error => {
            hideLoader();
            console.error('Error loading page:', error);
        });
}

function loadFeatureDetails(slug) {
    showLoader();
    fetch(`/feature/${slug}/details`)
        .then(response => response.text())
        .then(html => {
            hideLoader();
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', `/feature/${slug}/details`);
        })
        .catch(error => {
            hideLoader();
            console.error('Error loading feature details:', error);
        });
}

function loadContactPage() {
    showLoader();
    fetch('/contact_us')
        .then(response => response.text())
        .then(html => {
            hideLoader();
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', '/contact_us');
        })
        .catch(error => {
            hideLoader();
            console.error('Error loading page:', error);
        });
}

function loadSelectAppPage() {
    showLoader();
    fetch('/select_app')
        .then(response => response.text())
        .then(html => {
            hideLoader();
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', '/select_app');
        })
        .catch(error => {
            hideLoader();
            console.error('Error loading page:', error);
        });
}

function loadPage() {
    showLoader();
    fetch('/')
        .then(response => response.text())
        .then(html => {
            hideLoader();
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', '/');
        })
        .catch(error => {
            hideLoader();
            console.error('Error loading page:', error);
        });
}

function loadProductDetails(slug) {
    showLoader();
    fetch(`/product/${slug}/details`)
        .then(response => response.text())
        .then(html => {
            hideLoader();
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', `/product/${slug}/details`);
        })
        .catch(error => {
            hideLoader();
            console.error('Error loading product details:', error);
        });
}

function loadBlogDetails(slug) {
    showLoader();
    fetch(`/blogs/${slug}/details`)
        .then(response => response.text())
        .then(html => {
            hideLoader();
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', `/blogs/${slug}/details`);
        })
        .catch(error => {
            hideLoader();
            console.error('Error loading blog details:', error);
        });
}

</script>
</body>