<div id="kt_app_footer" class="app-footer">
							<!--begin::Footer container-->
							<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
								<!--begin::Copyright-->
								<div class="text-dark order-2 order-md-1">
									<span class="text-muted fw-semibold me-1">2023&copy;</span>
									<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">FFU</a>
								</div>
								<!--end::Copyright-->
								<!--begin::Menu-->
								<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
									<li class="menu-item">
										<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
									</li>
									<li class="menu-item">
										<a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
									</li>
									<li class="menu-item">
										<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
									</li>
								</ul>
								<!--end::Menu-->
							</div>
							<!--end::Footer container-->
						</div>


<script type="text/javascript">
    function logout(event){
            event.preventDefault();

            //var check = confirm("Do you really want to logout?");
            Swal.fire({
            	title: 'Do you really want to logout?',
            	showDenyButton: true,
            	showCancelButton: false,
            	confirmButtonText: 'Yes',
            	denyButtonText: `No`,
            }).then((result) => {
            	/* Read more about isConfirmed, isDenied below */
            	if (result.isConfirmed) {
            		document.getElementById('logout-form').submit();
            		Swal.fire('logout!', '', 'success')
            	} else if (result.isDenied) {
            		//Swal.fire('Changes are not saved', '', 'info')
            	}
            })
            /*if(check){ 
               document.getElementById('logout-form').submit();
            }*/
     }
</script>