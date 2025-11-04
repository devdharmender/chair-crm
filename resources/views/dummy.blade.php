<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programmatic Dashboard Filters</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* === FILTER FORM STYLES === */
    .card-header {
      background-color: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      padding: 20px;
    }

    .facility-btn {
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      font-weight: 500;
      color: #555;
      height: 38px;
    }

    .dropdown-menu {
      max-height: 230px;
      overflow-y: auto;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border: none;
      padding: 6px 0;
    }

    .dropdown-item {
      font-size: 14px;
      color: #333;
      padding: 8px 14px;
    }

    .dropdown-item:hover {
      background-color: #f8f9fa;
    }

    .facility-checkbox {
      accent-color: #0d6efd;
      transform: scale(1.1);
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      border-radius: 8px;
      font-weight: 500;
    }

    .btn-outline-dark {
      border-radius: 8px;
      font-weight: 500;
    }

    select.form-select, input.form-control {
      border-radius: 8px;
      height: 38px;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-4">
  <div class="card-header">
    <form action="" method="get">
      <div class="row g-2 align-items-center">

        <!-- State -->
        <div class="col-lg">
          <select name="filter_state_id" class="form-select" id="filter_state_id" onchange="getState(this.value)">
            <option value=""></option>
            <option value="35">Andaman & Nicobar Islands</option>
            <option value="28">Andhra Pradesh</option>
            <option value="12">Arunachal Pradesh</option>
            <option value="18">Assam</option>
            <option value="10">Bihar</option>
            <option value="4">Chandigarh</option>
            <option value="22">Chhattisgarh</option>
            <option value="38">Dadra & Nagar Haveli and Daman & Diu</option>
          </select>
        </div>

        <!-- District -->
        <div class="col-lg">
          <select name="filter_district_id" class="form-select" id="filter_district_id">
            <option value=""></option>
            <option value="188">Araria</option>
            <option value="611">Arwal</option>
            <option value="189">Aurangabad</option>
            <option value="190">Banka</option>
            <option value="191">Begusarai</option>
            <!-- Add other districts here -->
          </select>
        </div>

        <!-- Facility Type -->
        <div class="col-lg">
          <div class="dropdown w-100">
            <button class="form-control text-start dropdown-toggle facility-btn" type="button" id="dropdownMenuButton"
              data-bs-toggle="dropdown" aria-expanded="false">
              Facility Type
            </button>
            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
              <li><label class="dropdown-item"><input type="checkbox" class="me-2 facility-checkbox" value="1">DH</label></li>
              <li><label class="dropdown-item"><input type="checkbox" class="me-2 facility-checkbox" value="2">SDH</label></li>
              <li><label class="dropdown-item"><input type="checkbox" class="me-2 facility-checkbox" value="5">MCH</label></li>
              <li><label class="dropdown-item"><input type="checkbox" class="me-2 facility-checkbox" value="3">CHC</label></li>
              <li><label class="dropdown-item"><input type="checkbox" class="me-2 facility-checkbox" value="4">PHC</label></li>
            </ul>
          </div>
          <input type="hidden" name="filter_facility_type" id="filter_facility_type">
        </div>

        <!-- From Month -->
        <div class="col-lg">
          <input type="month" name="f_month" class="form-control" placeholder="MM-YYYY" id="f_month"
            onfocus="this.type='month'; this.min='2023-01'; this.max='2025-10'"
            onblur="if(!this.value) this.type='text'" min="2023-01" max="2025-10">
        </div>

        <!-- To Month -->
        <div class="col-lg">
          <input type="month" name="t_month" class="form-control" placeholder="MM-YYYY" id="t_month"
            onfocus="this.type='month'; this.min='2023-01'; this.max='2025-10'"
            onblur="if(!this.value) this.type='text'" min="2023-01" max="2025-10">
        </div>

        <!-- PE District -->
        <div class="col-lg">
          <div class="input-group flex-nowrap">
            <div class="input-group-text bg-transparent">
              <input class="form-check-input mt-0" type="checkbox" name="pe_implemented" value="1"
                id="pe_implemented">
            </div>
            <span class="input-group-text">PE Districts</span>
          </div>
        </div>

        <!-- Buttons -->
        <div class="col-lg">
          <button type="submit" name="search" class="btn btn-primary w-100">Search</button>
        </div>
        <div class="col-lg">
          <a href="#" class="btn btn-outline-dark w-100">Reset</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- <script>
const checkboxes = document.querySelectorAll('.facility-checkbox');
let FacilityType = "";

checkboxes.forEach(cb => cb.addEventListener('change', () => {
  FacilityType = Array.from(checkboxes)
    .filter(cb => cb.checked)
    .map(cb => {
      switch(cb.value) {
        case "1": return "DH";
        case "2": return "SDH";
        case "3": return "CHC";
        case "4": return "PHC";
        case "5": return "MCH";
      }
    })
    .join('/');
  console.log("Facility_Types:", FacilityType);
}));
</script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {

  // ✅ Update hidden input for facility type
  $('.facility-checkbox').on('change', function() {
    let selected = $('.facility-checkbox:checked').map(function() {
      return { "1": "DH", "2": "SDH", "3": "CHC", "4": "PHC", "5": "MCH" }[this.value];
    }).get().join('/');
    $('#filter_facility_type').val(selected);
  });

  // ✅ When Search button is clicked
  $('form').on('submit', function(e) {
    e.preventDefault();

    var pathAfterDomain = window.location.pathname.substring(1);
    // Collect all values (or empty if missing)
    const stateText = $('#filter_state_id option:selected').text() || '';
    const districtText = $('#filter_district_id option:selected').text() || '';
    const facilityType = $('#filter_facility_type').val() || '';
    const fromMonth = $('#f_month').val() || '';
    const toMonth = $('#t_month').val() || '';
    const afhc = $('#pe_implemented').is(':checked') ? 'Under GMSH-16' : 'Not under GMSH';

    // ✅ Create one combined string
    const searchString = 
      `State: ${stateText}, District: ${districtText}, From: ${fromMonth}, To: ${toMonth}, Facility Type: ${facilityType}, AFHC: ${afhc}`;
        
    console.log(searchString);

    // ✅ Send to your CodeIgniter 4 controller
    $.ajax({
      url: "{{ route('dmpg') }}",  // your Laravel route name
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}", // CSRF token required in Laravel
        searchString: searchString,
        pathAfter : pathAfterDomain,
      },
      dataType: "json",
      success: function(response) {
        console.log("Response:", response);
      },
      error: function(xhr, status, error) {
        console.error("Error:", error);
      }
    });
  });
});
</script>


</body>
</html>
