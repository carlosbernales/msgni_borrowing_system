@include('Admin/table_header')

<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd" style="display: flex; justify-content: space-between; align-items: center;">
                        <h2 style="margin: 0;">Calamity Reports</h2>
                        <button class="btn btn-orange orange-icon-notika" id="generateReport">Generate Reports</button>


                    </div>
                    
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>RSBSA</th>
                                    <th>Calamity</th>
                                    <th>Name</th>
                                    <th>Crop</th>
                                    <th>Livestock</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calamity_reports as $calamity_report)
                                <tr>
                                    <td>{{ $calamity_report->user->rsbsa }}</td>
                                    <td>{{ $calamity_report->calamity_type }}</td>
                                    <td>{{ $calamity_report->user->name }}</td>
                                    

                                    <!-- Crop Column -->
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#cropModal{{ $calamity_report->id }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>

                                    <!-- Livestock Column -->
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#livestockModal{{ $calamity_report->id }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>{{ $calamity_report->report_status }}</td>
                                   <td>
                                        <form method="POST" action="/update_reportStat/{{ $calamity_report->id }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="report_status" value="Shortlisted">
                                             <button  type="submit" class="btn btn-orange orange-icon-notika"><i class="notika-icon notika-checked"></i></button>
                                        </form>
                                    </td>

                                </tr>

                                <!-- Crop Modal for this Calamity Report -->
                                <div class="modal fade" id="cropModal{{ $calamity_report->id }}" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="crop-image-gallery{{ $calamity_report->id }}" class="image-gallery">
                                                    @php
                                                        $cropImages = $calamity_report->calamityImages->filter(function ($image) use ($calamity_report) {
                                                            return $image->type == $calamity_report->crop_type;
                                                        });
                                                    @endphp
                                                    @foreach($cropImages as $index => $image)
                                                        <div class="crop-image" style="display: {{ $loop->first ? 'block' : 'none' }}">
                                                            <img src="{{ asset('calamity_img_proof/' . $image->image) }}" alt="{{ $image->image }}" class="img-fluid" style="max-height: 100%; max-width: 100%;">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-default" id="prevButton{{ $calamity_report->id }}" onclick="prevImage({{ $calamity_report->id }})">
                                                        <i class="fa fa-arrow-left"></i> <!-- Left arrow icon -->
                                                    </button>
                                                    <button type="button" class="btn btn-default" id="nextButton{{ $calamity_report->id }}" onclick="nextImage({{ $calamity_report->id }})">
                                                        <i class="fa fa-arrow-right"></i> <!-- Right arrow icon -->
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="livestockModal{{ $calamity_report->id }}" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="livestock-image-gallery{{ $calamity_report->id }}" class="image-gallery">
                                                    <!-- Image container -->
                                                    @php
                                                        $livestockImages = $calamity_report->calamityImages->filter(function ($image) use ($calamity_report) {
                                                            return $image->type == $calamity_report->farm_type;
                                                        });
                                                    @endphp
                                                    @foreach($livestockImages as $index => $image)
                                                        <div class="livestock-image" style="display: {{ $loop->first ? 'block' : 'none' }}">
                                                            <img src="{{ asset('calamity_img_proof/' . $image->image) }}" alt="{{ $image->image }}" class="img-fluid" style="max-height: 100%; max-width: 100%;">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-default" id="prevButtonLivestock{{ $calamity_report->id }}" onclick="prevImageLivestock({{ $calamity_report->id }})">
                                                        <i class="fa fa-arrow-left"></i> <!-- Left arrow icon -->
                                                    </button>
                                                    <button type="button" class="btn btn-default" id="nextButtonLivestock{{ $calamity_report->id }}" onclick="nextImageLivestock({{ $calamity_report->id }})">
                                                        <i class="fa fa-arrow-right"></i> <!-- Right arrow icon -->
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function nextImage(reportId) {
        var images = document.querySelectorAll('#crop-image-gallery' + reportId + ' .crop-image');
        var currentImageIndex = Array.from(images).findIndex(img => img.style.display === 'block');

        images[currentImageIndex].style.display = 'none';

        var nextImageIndex = (currentImageIndex + 1) % images.length;
        images[nextImageIndex].style.display = 'block';
    }

    function prevImage(reportId) {
        var images = document.querySelectorAll('#crop-image-gallery' + reportId + ' .crop-image');
        var currentImageIndex = Array.from(images).findIndex(img => img.style.display === 'block');

        images[currentImageIndex].style.display = 'none';

        var prevImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        images[prevImageIndex].style.display = 'block';
    }

    function nextImageLivestock(reportId) {
        var images = document.querySelectorAll('#livestock-image-gallery' + reportId + ' .livestock-image');
        var currentImageIndex = Array.from(images).findIndex(img => img.style.display === 'block');

        images[currentImageIndex].style.display = 'none';

        var nextImageIndex = (currentImageIndex + 1) % images.length;
        images[nextImageIndex].style.display = 'block';
    }

    function prevImageLivestock(reportId) {
        var images = document.querySelectorAll('#livestock-image-gallery' + reportId + ' .livestock-image');
        var currentImageIndex = Array.from(images).findIndex(img => img.style.display === 'block');

        images[currentImageIndex].style.display = 'none';

        var prevImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        images[prevImageIndex].style.display = 'block';
    }
    
    



    
    document.getElementById('generateReport').addEventListener('click', function () {
    // Simulated data (replace with your actual data from the server)
    const calamityReports = @json($calamity_reports);

    // Helper function to format date
    const formatDate = (dateString) => {
        if (!dateString) return 'N/A'; // Handle null/undefined dates
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Intl.DateTimeFormat('en-US', options).format(new Date(dateString));
    };

    // Prepare the data for Excel
    const rows = [
        // First row with the "NAME of Affected Farmer/FOCAL" header
        [
            '', '', 'NAME OF AFFECTED FARMER/FOCAL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''
        ],
        // Second row with the "NAMED BENEFICIARIES" header
        [
            '', '', 'NAMED BENEFICIARY (for Individual) ORGANIZATIONS FOCAL PERSON NAME (for Group)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''
        ],
        // Third row with the "Farmer Address" header for columns I, J, K, L
        [
            'CALAMITY', '*TYPE OF AFFECTED FARMER (Individual/Group)', 'RSBSA REFERENCE NUMBER', 'SURNAME', 'FIRSTNAME', 
            'MIDDLENAME', 'EXTENSION NAME', 'DATE OF BIRTH', 'REGION', 'PROVINCE', 'MUNICIPALITY', 'BARANGAY', 
            'NAME OF ORGANIZATION', 'MALE', 'FEMALE', 'SEX', 'INDIGENOUS', 'NAME OF TRIBE', 'PWD', 'ARB', '4Ps', 
            'Type of Crop', 'Partially Damaged Area (ha)', 'Totally Damaged Area (ha)', 'Total Area Affected (ha)', 
            'Type of Farm', 'Animal Type', 'Age Classification', 'No. of Heads Affected', 'REMARKS'
        ]
    ];

    // Loop through calamity reports to build the data rows
    calamityReports.forEach(report => {
        rows.push([
            report.calamity_type,
            report.farmer_type,
            report.user.rsbsa,
            report.user.last_name,
            report.user.first_name,
            report.user.middle_name,
            report.user.suffix,
            formatDate(report.user.birthdate), // Format the birthdate
            report.region, // REGION
            report.province, // PROVINCE
            report.municipality, // MUNICIPALITY
            report.barangay, // BARANGAY
            report.org_name,
            report.male_count,
            report.female_count,
            report.user.sex,
            report.user.indigenous,
            report.user.name_tribe,
            report.user.pwd,
            report.user.arb,
            report.user.fourps,
            report.crop_type,
            report.partial_damage_area,
            report.totally_damage_area,
            report.total_area_affected,
            report.farm_type,
            report.animal_type,
            report.age_classification,
            report.no_of_heads,
            report.remarks
        ]);
    });

    // Create a new workbook and worksheet
    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.aoa_to_sheet(rows);

    // Merge cells for columns C, D, E, F, and G in row 1 and row 2
    worksheet['!merges'] = [
        { s: { r: 0, c: 2 }, e: { r: 0, c: 6 } }, // Merge C1 to G1 for "Farmer Address"
        { s: { r: 1, c: 2 }, e: { r: 1, c: 6 } }, // Merge C2 to G2 for "NAMED BENEFICIARIES"
        { s: { r: 0, c: 8 }, e: { r: 1, c: 11 } }, // Merge I1 to L2 for "Farmer Address"
        { s: { r: 0, c: 12 }, e: { r: 0, c: 14 } }, // Merge M1 to O1 for "GROUP BENEFICIARY"
        { s: { r: 1, c: 13 }, e: { r: 1, c: 14 } }, // Merge N2 to O2 for "TOTAL NUMBER OF"
        { s: { r: 0, c: 21 }, e: { r: 0, c: 27 } }, // Merge V1 to AC1 for "DETAILS OF DAMAGE AND LOSSES"
        { s: { r: 1, c: 21 }, e: { r: 1, c: 24 } }, // Merge V2 to Y2 for "CROPS"
        { s: { r: 1, c: 25 }, e: { r: 1, c: 28 } }  // Merge Z2 to AC2 for "LIVESTOCK"
    ];

    // Set text for the merged header cells
    worksheet['C1'].v = 'FARMER'; // Set "FARMER" in the merged cell for row 1
    worksheet['C2'].v = 'NAMED BENEFICIARIES'; // Set "NAMED BENEFICIARIES" in the merged cell for row 2
    worksheet['I1'].v = 'FARMER'; // Set "Farmer Address" in the merged cell for row 1 (columns I, J, K, L)
    worksheet['I2'].v = 'NAMED BENEFICIARIES'; // Set "NAMED BENEFICIARIES" in the merged cell for row 2 (columns I, J, K, L)
    worksheet['M1'].v = 'GROUP BENEFICIARY'; // Set "GROUP BENEFICIARY" in the merged cell for row 1 (columns M, N, O)
    worksheet['N2'].v = 'TOTAL NUMBER OF'; // Set "TOTAL NUMBER OF" in the merged cell for row 2 (columns N, O)
    worksheet['V1'].v = 'DETAILS OF DAMAGE AND LOSSES'; // Set "DETAILS OF DAMAGE AND LOSSES" in the merged cell for row 1 (columns V to AC)
    worksheet['V2'].v = 'CROPS'; // Set "CROPS" in the merged cell for row 2 (columns V, W, X, Y)
    worksheet['Z2'].v = 'LIVESTOCK'; // Set "LIVESTOCK" in the merged cell for row 2 (columns Z, AA, AB, AC)

    // Append the worksheet to the workbook
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Calamity Reports');

    // Generate the Excel file and trigger download
    XLSX.writeFile(workbook, 'Calamity_Reports.xlsx');
});



</script>



<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- FontAwesome for arrow icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

@include('Admin/table_footer')

