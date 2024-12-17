<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agtech</title>
    <link rel="icon" href="images/agtech.jfif" type="image/x-icon">
    <link rel="shortcut icon" href="images/agtech.jfif" type="image/x-icon">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
        .background-container {
            min-height: 100vh;
            /* Ensures it covers the entire viewport */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .data-form {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            border: none;
            /* Removed border for seamless look */
            border-radius: 8px;
            background-color: rgba(249, 249, 249, 0.3);
            /* Increased transparency */
            backdrop-filter: blur(5px);
            /* Optional blur effect */
        }

        .data-form h3 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 4px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .image-upload-group {
            margin-bottom: 30px;
        }

        .preview-images {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .preview-images img {
            max-width: 150px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        
    </style>
    
    
    
</head>

<body>
    @include('Components.User.header')

    @include('Components.User.sidebar')

    @if (session('success'))
        <script>
            $(document).ready(function() {
                $.notify({
                    message: "{{ session('success') }}"
                }, {
                    type: 'success',
                    delay: 5000, // 5 seconds
                    placement: {
                        from: "top",
                        align: "right" // Align toast to the right
                    },
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
            });
        </script>
    @endif

    <div class="main-panel">
        <div class="background-container"
            style="background: url('images/farner.webp') no-repeat center center; background-size: cover;">
            <div class="data-form">
                <h3 class="fw-bold mb-3 text-center">Farmer Information Form</h3>
                <form action="/addFarmer_info" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- General Error Message -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Name and Email Fields -->
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="name" class="form-label-lg">
                                <i class="fas fa-user fa-lg"></i> Name
                            </label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="email" class="form-label-lg">
                                <i class="fas fa-envelope fa-lg"></i> Email
                            </label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Phone and Location Fields -->
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="phone" class="form-label-lg">
                                <i class="fas fa-phone fa-lg"></i> Phone Number
                            </label>
                            <input type="text" id="phone" name="phone" class="form-control form-control-lg"
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="location" class="form-label-lg">
                                <i class="fas fa-map-marker-alt fa-lg"></i> Location
                            </label>
                            <input type="text" id="location" name="location" class="form-control form-control-lg"
                                value="{{ old('location') }}" readonly required>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Hidden latitude and longitude fields to store values -->
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">








                    <div class="row">
                        <!-- Crop Types and Livestock Types Fields -->
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="crop_types" class="form-label-lg">
                                <i class="fas fa-seedling fa-lg"></i> Crop Types
                            </label>
                            <input type="text" id="crop_types" name="crop_types" class="form-control form-control-lg"
                                value="{{ old('crop_types') }}" placeholder="e.g., Wheat, Corn" required>
                            @error('crop_types')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="livestock_types" class="form-label-lg">
                                <i class="fas fa-paw fa-lg"></i> Livestock Types
                            </label>
                            <input type="text" id="livestock_types" name="livestock_types"
                                class="form-control form-control-lg" value="{{ old('livestock_types') }}"
                                placeholder="e.g., Cattle, Sheep" required>
                            @error('livestock_types')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Upload Images for Crops and Livestock -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="crop_images" class="form-label-lg">
                                <i class="fas fa-camera fa-lg"></i> Upload Images for Crop
                            </label>
                            <input type="file" id="crop_images" name="crop_images[]"
                                class="form-control form-control-lg" accept="image/*" multiple
                                onchange="previewImages(event, 'crop-preview')">
                            @error('crop_images.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!-- Preview Container -->
                            <div id="crop-preview" class="preview-images"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="livestock_images" class="form-label-lg">
                                <i class="fas fa-camera fa-lg"></i> Upload Images for Livestock
                            </label>
                            <input type="file" id="livestock_images" name="livestock_images[]"
                                class="form-control form-control-lg" accept="image/*" multiple
                                onchange="previewImages(event, 'livestock-preview')">
                            @error('livestock_images.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!-- Preview Container -->
                            <div id="livestock-preview" class="preview-images"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit btn btn-primary btn-lg mt-3">
                        <i class="fas fa-paper-plane fa-lg"></i> Submit Information
                    </button>
                </form>

            </div>
        </div>
    </div>
    

    <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapModalLabel">Select a Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Search Box for the location -->
                    <input type="text" id="search-box" class="form-control" placeholder="Search for a place">
                    <!-- Map Container -->
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveLocationBtn">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Script -->
    <script>
        function previewImages(event, previewContainerId) {
            const previewContainer = document.getElementById(previewContainerId);
            previewContainer.innerHTML = ''; // Clear existing previews

            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'm-2');
                    img.style.maxHeight = '200px'; // Increased image size
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
        
    ///////////////////////////////////////////////////////////////    
    
    let map, marker, searchBox;
    let selectedLocation = { lat: 40.7128, lng: -74.0060 }; // Default location (NYC)
    let isMapInitialized = false;

    // Open the modal and initialize map
    document.getElementById("location").addEventListener("click", function () {
        const modal = new bootstrap.Modal(document.getElementById("mapModal"));
        modal.show();  // Open the modal
        
        // Initialize map only when the modal is shown
        if (!isMapInitialized) {
            google.maps.event.addDomListener(window, "load", initMap);
            isMapInitialized = true;  // Ensure the map is initialized only once
        }
    });

    // Initialize the map, search box, and marker
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: selectedLocation,
            zoom: 12,
            mapTypeId: "roadmap",
        });

        marker = new google.maps.Marker({
            map: map,
            position: selectedLocation,
            draggable: true,
        });

        // Initialize the search box
        const searchInput = document.getElementById("search-box");
        searchBox = new google.maps.places.SearchBox(searchInput);
        map.addListener("bounds_changed", function () {
            searchBox.setBounds(map.getBounds());
        });

        // When a place is selected from the search box
        searchBox.addListener("places_changed", function () {
            const places = searchBox.getPlaces();
            if (places.length === 0) return;

            const place = places[0];
            const latLng = place.geometry.location;

            // Move the map and marker to the selected location
            map.setCenter(latLng);
            marker.setPosition(latLng);

            // Update the location input field with the formatted address
            updateLocationInput(place);
        });

        // Handle marker drag event
        google.maps.event.addListener(marker, "dragend", function () {
            const position = marker.getPosition();
            // Store the new coordinates in hidden fields
            document.getElementById("latitude").value = position.lat();
            document.getElementById("longitude").value = position.lng();

            // Reverse geocode to get the address and update the location input
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: position }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK && results[0]) {
                    updateLocationInput(results[0]);
                }
            });
        });

        // When the user clicks on the map, place a marker and update the location input
        google.maps.event.addListener(map, "click", function (event) {
            const clickedLocation = event.latLng;
            marker.setPosition(clickedLocation);

            // Update the hidden latitude and longitude fields
            document.getElementById("latitude").value = clickedLocation.lat();
            document.getElementById("longitude").value = clickedLocation.lng();

            // Reverse geocode to get the address and update the location input
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: clickedLocation }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK && results[0]) {
                    updateLocationInput(results[0]);
                }
            });
        });
    }

    // Function to update location input field dynamically
    function updateLocationInput(place) {
        // Update the location input field with the selected address
        document.getElementById("location").value = place.formatted_address;

        // Store the latitude and longitude in hidden fields
        document.getElementById("latitude").value = place.geometry.location.lat();
        document.getElementById("longitude").value = place.geometry.location.lng();
    }

    // Save the location to the input field when the "Okay" button is clicked
    document.getElementById("saveLocationBtn").addEventListener("click", function () {
        const latitude = document.getElementById("latitude").value;
        const longitude = document.getElementById("longitude").value;
        const locationInput = document.getElementById("location");

        if (latitude && longitude && locationInput.value) {
            // Ensure the input value is updated with the address when "Okay" is clicked
            locationInput.value = locationInput.value;

            // Close the modal after saving the location
            const modal = bootstrap.Modal.getInstance(document.getElementById("mapModal"));
            modal.hide();
        } else {
            alert("Please select a location.");
        }
    });
    ///////////////////////////////////////////////////////////////    
    $(document).ready(function() {
            @if (session('success'))
                swal("Success!", "{{ session('success') }}", "success");
            @elseif ($errors->any())
                let errorMessages = "";
                @foreach ($errors->all() as $error)
                    errorMessages += "{{ $error }}\n";
                @endforeach
                swal("Error!", errorMessages, "error");
            @endif
        });
    </script>
    

    <script src="admin/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="admin/assets/js/core/popper.min.js"></script>
    <script src="admin/assets/js/core/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUlV2s9XbLAsllvpPnFoxkznXbdFqUXK4&libraries=places&callback=initMap"></script>

    



    <!-- Other JS Files -->
    <script src="admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="admin/assets/js/kaiadmin.min.js"></script>
    <script src="admin/assets/js/setting-demo.js"></script>
</body>

</html>
