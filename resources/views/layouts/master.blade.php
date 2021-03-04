
<!DOCTYPE html>
<html lang="en">

<head>

	  <!-- CSRF Token -->
	  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

	<link rel="canonical" href="pages-blank.html" />
	<link rel="shortcut icon" href="img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
	<link rel="canonical" href="https://appstack.bootlab.io/tables-datatables-responsive.html" />
	<link rel="canonical" href="https://appstack.bootlab.io/forms-advanced-inputs.html" />
	<link rel="canonical" href="https://appstack.bootlab.io/charts-chartjs.html" />
	<link href="/assets/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
	<link href="/assets/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
   <link href="/assets/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
   <link href="/assets/plugins/lightbox/custom-photswipe.css" rel="stylesheet" type="text/css" />
   <link href="/assets/plugins/lightbox/photoswipe.css" rel="stylesheet" type="text/css" />
   <link href="/assets/plugins/lightbox/default-skin/default-skin.css" rel="stylesheet" type="text/css" />
	<!-- Choose your prefered color scheme -->
	 <link href="/assets/css/light.css" rel="stylesheet">
	 <link href="/assets/css/prevent.css" rel="stylesheet">

</head>

<body data-theme="light" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="default">
	<div class="wrapper">
        
        @include('includes.sidebar')

		<div class="main">

            @include('includes.navbar')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">@yield('title')</h1>

						@yield('content')
						@include('sweetalert::alert')

				</div>
			</main>

			@include('includes.footer')

		</div>
	</div>

    <script src="/assets/js/app.js"></script>
	<script src="/assets/plugins/lightbox/photoswipe.min.js"></script>
    <script src="/assets/plugins/lightbox/photoswipe-ui-default.min.js"></script>
	<script src="/assets/plugins/lightbox/custom-photswipe.js"></script>
	
    <script src="/assets/js/prevent.js"></script>

             <!-- Laravel Javascript Validation -->
             <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
             {!! JsValidator::formRequest('App\Http\Requests\UserStoreRequest', '#user-create'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\UserUpdateRequest', '#user-update'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\OccupantStoreRequest', '#occ-create'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\JobOrderStoreRequest', '#job-create'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\AppointmentStoreRequest', '#app-create'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\EmployeeStoreRequest', '#emp-create'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\EmployeeUpdateRequest', '#emp-update'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\ClientGetAppointmentRequest', '#req-get'); !!}
             {!! JsValidator::formRequest('App\Http\Requests\ClientAppointmentRequest', '#client-app-create'); !!}
  

    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Select2
			$(".select2").each(function() {
				$(this)
					.wrap("<div class=\"position-relative\"></div>")
					.select2({
						// placeholder: "Select value",
						dropdownParent: $(this).parent()
					});
			})
		
		});
	</script>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				// Datatables with Buttons
				var datatablesButtons = $("#datatables-buttons").DataTable({
					responsive: true,
					lengthChange: !1,
					buttons: ["copy", "print"]
				});
				datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
			});
		</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Select2
		$(".select2").each(function() {
			$(this)
				.wrap("<div class=\"position-relative\"></div>")
				.select2({
					placeholder: "Select value",
					dropdownParent: $(this).parent()
				});
		})
	
	});
</script>

{{-- <script>

	$(function() {
		
		// run on change for the selectbox
		
		$( "#search_frm" ).change(function() {  
			searchDivs();
		});
		
		// handle the updating of the duration divs
		function searchDivs() {
			// hide all form-duration-divs
			$('.frm-div').hide();
			  
			  // for Leave
			var witKey = $( "#search_frm option:selected" ).val();                
			$('#select'+witKey).show();
	
		}        
	
		// run at load, for the currently selected div to show up
		searchDivs();
	
	});
	
	</script> --}}

</body>

</html>