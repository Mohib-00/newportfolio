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
    
});
 
 
//to chnage password
$(document).on('click', '#submitpassword', function(e) {
 
 $('#passwordError').text('');
 $('#confirmPasswordError').text('');
 $('#message').html('');

 const password = document.getElementById('password').value;
 const confirmPassword = document.getElementById('confirm_password').value;

 $.ajax({
     url: '/changePassword',
     type: 'POST',
     data: {
         password: password,
         password_confirmation: confirmPassword
     },
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     success: function (response) {
         Swal.fire({
             icon: 'success',
             title: 'Success',
             text: response.message,
             confirmButtonText: 'OK'
         });
         $('#changePasswordForm')[0].reset();  
     },
     error: function (xhr) {
         if (xhr.status === 422) {
             const errors = xhr.responseJSON.errors;
             if (errors.password) {
                 $('#passwordError').text(errors.password[0]);
             }
             if (errors.password_confirmation) {
                 $('#confirmPasswordError').text(errors.password_confirmation[0]);
             }
         } else {
             Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: 'An error occurred. Please try again.',
                 confirmButtonText: 'OK'
             });
         }
     }
 });
});


</script>
<script>
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

function loadPage(url, pushStateUrl) {
    createLoader();
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.open();
            document.write(html);
            document.close();
            window.history.pushState({}, '', pushStateUrl);
        })
        .catch(error => {
            console.error('Error loading page:', error);
        })
        .finally(() => {
            const existingLoader = document.getElementById('loader');
            if (existingLoader) {
                existingLoader.remove();
            }
        });
}

function loadUsersPage() {
    loadPage('/admin/users', '/admin/users');
}

function loadMessagePage() {
    loadPage('/admin/messages', '/admin/messages');
}

function loadBannerPage() {
    loadPage('/admin/add-banner-details', '/admin/add-banner-details');
}

function loadmainsection() {
    loadPage('/admin/add-main_section', '/admin/add-main_section');
}

function loadhighlight() {
    loadPage('/admin/add-highlight', '/admin/add-highlight');
}

function loadfaqs() {
    loadPage('/admin/add-faqs', '/admin/add-faqs');
}

function loadproducts() {
    loadPage('/admin/add-products', '/admin/add-products');
}

function loadproductdetailsbanner() {
    loadPage('/admin/add-product-details-banner', '/admin/add-product-details-banner');
}

function loadhighlighttt() {
    loadPage('/admin/add-product-details-highlight', '/admin/add-product-details-highlight');
}


function loadmanagement() {
    loadPage('/admin/add-product-inventory-management', '/admin/add-product-inventory-management');
}


function loaddetailpagesection_4() {
    loadPage('/admin/add-detail-page-section_4', '/admin/add-detail-page-section_4');
}


function loaddetailpagesection_5() {
    loadPage('/admin/add-detail-page-section_5', '/admin/add-detail-page-section_5');
}



function loaddetailpagesection_6() {
    loadPage('/admin/add-detail-page-section_6', '/admin/add-detail-page-section_6');
}


function loaddetailpagesection_7() {
    loadPage('/admin/add-detail-page-section_7', '/admin/add-detail-page-section_7');
}

function loaddetailpagefaqs() {
    loadPage('/admin/add-detail-page-faqs', '/admin/add-detail-page-faqs');
}


function loadfeatures() {
    loadPage('/admin/add-features', '/admin/add-features');
}


function loadfeaturebanner() {
    loadPage('/admin/add-feature-banner', '/admin/add-feature-banner');
}


function loadfeaturehighlights() {
    loadPage('/admin/add-feature-highlights', '/admin/add-feature-highlights');
}


function loadfeaturesection_3() {
    loadPage('/admin/add-feature-section_3', '/admin/add-feature-section_3');
}


function loadfeaturesection_4() {
    loadPage('/admin/add-feature-section_4', '/admin/add-feature-section_4');
}


function loadblog() {
    loadPage('/admin/add-blog', '/admin/add-blog');
}


function loadblog_detail() {
    loadPage('/admin/add-blog_detail', '/admin/add-blog_detail');
}


function loadblog_detail_section() {
    loadPage('/admin/add-blog_detail_section', '/admin/add-blog_detail_section');
}


function loadsettings() {
    loadPage('/admin/add-settings', '/admin/add-settings');
}


function services() {
    loadPage('/admin/services', '/admin/services');
}

function loadservicebanner() {
    loadPage('/admin/add-service-banner', '/admin/add-service-banner');
}

function loadservicehighlights() {
    loadPage('/admin/add-service-highlights', '/admin/add-service-highlights');
}

function loadservicesection_3() {
    loadPage('/admin/add-service-section_3', '/admin/add-service-section_3');
}

</script>
</body>

