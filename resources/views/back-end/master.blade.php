<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/back-end/') }}/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('assets/back-end/') }}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/back-end/') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('assets/back-end/') }}/css/atlantis.min.css">
	

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/back-end/') }}/css/demo.css">

	{{-- DataTables --}}
	<link rel="stylesheet" href="{{ asset('assets/datatable/datatables.min.css') }}">

	{{-- Toastr Notication --}}
	<link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">

	
	
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!--  Header -->
			@include('back-end.includes.header')
			<!-- End Header -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			@include('back-end.includes.sidebar')
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<br />
				@yield('main-content')
			</div>
			@include('back-end.includes.footer')
		</div>		
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>

	<!--   Core JS Files   -->
	<script src="{{ asset('assets/back-end/') }}/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{ asset('assets/back-end/') }}/js/core/popper.min.js"></script>
	<script src="{{ asset('assets/back-end/') }}/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{ asset('assets/back-end/') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="{{ asset('assets/back-end/') }}/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('assets/back-end/') }}/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('assets/back-end/') }}/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{ asset('assets/back-end/') }}/js/setting-demo.js"></script>
	<script src="{{ asset('assets/back-end/') }}/js/demo.js"></script>


	{{-- TinyMce  --}}
	<script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: 'textarea'
			});
	</script>

	{{-- DataTables --}}
	<script src="{{ asset('assets/datatable/datatables.min.js') }}"></script>
	<script>
		$(document).ready( function () {
		$('table').DataTable();
		} );
	</script>

	{{-- Toastr Notification --}}
	<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
	{!! Toastr::message() !!}

	<script>
		@if($errors->any())
			@foreach($errors->all() as $error)
				toastr.error('{{ $error }}', 'Error', {
					"closeButton": true,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				})
			@endforeach
		@endif
	</script>

	<!---- SweetAlert2 Js ----->
	<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
	<script type="text/javascript">
		function deleteData(id) {
	      const swalWithBootstrapButtons = Swal.mixin({
	      customClass: {
	        confirmButton: 'btn btn-success',
	        cancelButton: 'btn btn-danger'
	      },
	      buttonsStyling: false,
	    })
	
	    swalWithBootstrapButtons.fire({
	      title: 'Are you sure to delete?',
	      text: "You won't be able to get back this!",
	      type: 'warning',
	      showCancelButton: true,
	      confirmButtonText: 'Yes, delete it!',
	      cancelButtonText: 'No, cancel!',
	      reverseButtons: true
	    }).then((result) => {
	      if (result.value) {
	        event.preventDefault();
	        document.getElementById('delete-data-'+id).submit();
	      } else if (
	        // Read more about handling dismissals
	        result.dismiss === Swal.DismissReason.cancel
	      ) {
	        swalWithBootstrapButtons.fire(
	          'Cancelled',
	          'Your data is safe :)',
	          'error'
	        )
	      }
	    })
	    }
	</script>


	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>