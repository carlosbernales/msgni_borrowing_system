<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile Page</title>
<link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f2f5;
    }

    .background-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #e9eff1;
        background-image: url('images/farner.webp');
        background-position: center;
        background-size: cover;
        background-blur: 5px;
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.8);
        padding: 30px;
        width: 100%;
        max-width: 750px;
        border-radius: 12px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .profile-card .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .profile-card h3 {
        font-size: 24px;
        font-weight: 600;
        color: #3b5998;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #3b5998;
        box-shadow: 0 0 5px rgba(59, 89, 152, 0.5);
    }

    .btn-submit {
        background-color: #3b5998;
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #365899;
    }



    .error-message {
        color: red;
        font-size: 12px;
    }

    /* Hide the file input field */
    #imageInput {
        display: none;
    }
</style>

<style>
    .form-step {
        display: none;
    }
    .form-step.active {
        display: block;
    }
</style>
</head>
<body>
    @include('Components.User.header')
    @include('Components.User.sidebar')

  <div class="main-panel">
    <div class="background-container">
        <div class="profile-card">
            <h3 class="fw-bold mb-3 text-center">Update Your Profile</h3>
            <form action="/update_user_profile" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ old('id', auth()->user()->id) }}">
                <!-- Step 1 -->
                <div class="form-step active" id="step1">
                    <div class="row">
                        <!-- Last Name -->
                        <div class="col-md-4 form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                value="{{ old('last_name', auth()->user()->last_name) }}" required>
                        </div>

                        <!-- First Name -->
                        <div class="col-md-4 form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control"
                                value="{{ old('first_name', auth()->user()->first_name) }}" required>
                        </div>

                        <!-- Middle Name -->
                        <div class="col-md-4 form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" class="form-control"
                                value="{{ old('middle_name', auth()->user()->middle_name) }}">
                        </div>
                    </div>



                    
                    <div class="row">
                        <!-- Last Name -->
                        <div class="col-md-4 form-group">
                          <label for="suffix">Suffix</label>
                            <select id="suffix" name="suffix" class="form-control" required>
                                <option value="{{ old('suffix', auth()->user()->suffix) }}" disabled selected>{{ old('suffix', auth()->user()->suffix) }}</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <!-- Add other options as needed -->
                            </select>
                        </div>


                        <!-- First Name -->
                        <div class="col-md-4 form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-control"
                                value="{{ old('birthdate', auth()->user()->birthdate) }}" required>
                        </div>

                        <!-- Middle Name -->
                        <div class="col-md-4 form-group">
                            <label for="contact_number">Contact</label>
                            <input type="text" id="contact_number" name="contact_number" class="form-control"
                                value="{{ old('contact_number', auth()->user()->contact_number) }}">
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Last Name -->
                        <div class="col-md-4 form-group">
                          <label for="fourps">fourps</label>
                            <select id="fourps" name="fourps" class="form-control" required>
                                <option value="{{ old('fourps', auth()->user()->fourps) }}" disabled selected>{{ old('fourps', auth()->user()->fourps) }}</option>
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>
                            </select>
                        </div>

                        <!-- First Name -->
                        <div class="col-md-4 form-group">
                          <label for="arb">ARB</label>
                            <select id="arb" name="arb" class="form-control" required>
                                <option value="{{ old('arb', auth()->user()->arb) }}" disabled selected>{{ old('arb', auth()->user()->arb) }}</option>
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>
                            </select>
                        </div>

                        <!-- Middle Name -->
                        <div class="col-md-4 form-group">
                          <label for="pwd">PWD</label>
                            <select id="pwd" name="pwd" class="form-control" required>
                                <option value="{{ old('pwd', auth()->user()->pwd) }}" disabled selected>{{ old('pwd', auth()->user()->pwd) }}</option>
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4 w-100">
                        <button type="button" class="btn btn-primary btn-next">Next</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="form-step" id="step2">
                    <div class="row">
                        <!-- Birthdate -->
                        <div class="col-md-4 form-group">
                            <label for="indigenous">Indigenous</label>
                            <select id="indigenous" name="indigenous" class="form-control" required>
                                <option value="{{ old('indigenous', auth()->user()->indigenous) }}" disabled selected>{{ old('indigenous', auth()->user()->indigenous) }}</option>
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>
                            </select>
                        </div>

                        <!-- Tribe Name -->
                        <div class="col-md-4 form-group">
                            <label for="name_tribe">Tribe Name</label>
                            <input type="text" id="name_tribe" name="name_tribe" class="form-control"
                                value="{{ old('name_tribe', auth()->user()->name_tribe) }}" required>
                        </div>


                        <!-- Contact Number -->
                        <div class="col-md-4 form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control"
                                value="{{ old('address', auth()->user()->address) }}" required>
                        </div>
                    </div>

                    <div class="row">
                      <!-- Email -->
                      <div class="col-md-12 form-group">
                          <label for="email">Email</label>
                          <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email', auth()->user()->email) }}" required>
                          <span id="email-error" class="text-danger" style="display: none;">Email already exists!</span>
                      </div>
                  </div>


                    <div class="row">
                        <!-- Tribe Name -->
                        <div class="col-md-12 form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <!-- Address -->
                        <div class="col-md-12 form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" >
                        </div>
                    </div>
                    <div id="error_message" class="text-danger" style="display: none;"></div>

                    <div class="d-flex justify-content-between mt-4 w-100">
                        <button type="button" class="btn btn-primary btn-prev">Previous</button>
                        <button type="submit" class="btn btn-success" id="submit_button" >Update Profile</button>
                    </div>
                  </div>
            </form>
        </div>
    </div>
</div>





<script src="admin/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="admin/assets/js/core/popper.min.js"></script>
<script src="admin/assets/js/core/bootstrap.min.js"></script>
<script src="admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>


<script>

document.getElementById('confirm_password').addEventListener('input', function () {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    var submitButton = document.getElementById('submit_button'); // Corrected to get the button element directly
    var errorMessage = document.getElementById('error_message');

    if (password !== confirmPassword) {
        errorMessage.textContent = "Passwords do not match!";
        errorMessage.style.display = "block";
        submitButton.disabled = true; // Disable the button
    } else {
        errorMessage.style.display = "none"; // Hide the error message
        submitButton.disabled = false; // Enable the button
    }
});

    
document.getElementById('email').addEventListener('input', function () {
    var email = this.value;
    var emailError = document.getElementById('email-error');
    var submitButton = document.getElementById('submit_button');

    fetch('/check_email_user/' + encodeURIComponent(email))
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                emailError.style.display = 'block'; // Show error message
                submitButton.disabled = true; // Disable the submit button
            } else {
                emailError.style.display = 'none'; // Hide error message
                submitButton.disabled = false; // Enable the submit button
            }
        })
        .catch(error => {
            console.error('Error:', error);
            submitButton.disabled = true; // Disable the button in case of an error
        });
});




@if(session('success'))
    $(document).ready(function() {
        $.notify({
            message: "{{ session('success') }}"
        }, {
            type: 'success',
            delay: 5000,
            placement: {
                from: "top",
                align: "right"
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });
@endif

    // Update the profile picture preview when a new file is selected

document.addEventListener('DOMContentLoaded', () => {
    const steps = document.querySelectorAll('.form-step');
    const nextButtons = document.querySelectorAll('.btn-next');
    const prevButtons = document.querySelectorAll('.btn-prev');

    let currentStep = 0;

    // Show the current step and hide others
    function showStep(index) {
        steps.forEach((step, idx) => {
            step.classList.toggle('active', idx === index);
        });
    }

    // Next button event listener
    nextButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    // Previous button event listener
    prevButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // Initialize the form with the first step active
    showStep(currentStep);
});

document.getElementById('indigenous').addEventListener('change', function () {
        var tribeInput = document.getElementById('name_tribe');
        if (this.value === 'NO') {
            tribeInput.disabled = true; // Disable the input if 'NO' is selected
        } else {
            tribeInput.disabled = false; // Enable the input if 'YES' is selected
        }
    });

    // Trigger the change event on page load to set the initial state
    window.addEventListener('load', function () {
        document.getElementById('indigenous').dispatchEvent(new Event('change'));
    });
</script>

</body>
</html>
