<?php

use App\Models\Permission;

$permission = Permission::where('role' , Auth::user()->role)->first();
$ivr_permission = $permission->ivr;
$add_group = $permission->add_group;
$edit_group = $permission->edit_group;
$delete_group = $permission->delete_group;
$call_log = $permission->call_log;
$whatsapp = $permission->whatsapp;

?>
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						<!--begin::Logo-->
						<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
							<!--begin::Logo image-->
							<a href="/home">
								<img alt="Logo" src="{{ asset('frontend/images/icons/logo-no-background.svg') }}" class="h-45px app-sidebar-logo-default" />
								<img alt="Logo" src="{{asset('media/logos/default-small.svg')}}" class="h-20px app-sidebar-logo-minimize" />
							</a>
							<!--end::Logo image-->
							<!--begin::Sidebar toggle-->
							<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
								<span class="svg-icon svg-icon-2 rotate-180">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
										<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Sidebar toggle-->
						</div>
						<!--end::Logo-->
						<!--begin::sidebar menu-->
						<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
							<!--begin::Menu wrapper-->
							<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
								<!--begin::Menu-->
								<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
									<!--begin:Menu item-->
									
											
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'home') active @endif"  href="{{url('home')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
														<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
														<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
														<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Dashboard</span> 
										</a>
										<!--end:Menu link-->
									</div>

									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'category') active @endif"  href="{{url('category')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-th" aria-hidden="true"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Category</span>
										</a>
										<!--end:Menu link-->
									</div>

									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'colors') active @endif"  href="{{url('colors')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-bullseye" aria-hidden="true"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Colors</span>
										</a>
										<!--end:Menu link-->
									</div>

									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'product') active @endif"  href="{{url('product')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-cart-plus" aria-hidden="true"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Products</span>
										</a>
										<!--end:Menu link-->
									</div>

									{{--

									@if($add_group == '1'  || $edit_group == '1'   || $delete_group == 1)
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'group_management') active @endif"  href="{{url('group_management')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-users" aria-hidden="true"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Group Mangement</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif
									@if($add_group == '1'  || $edit_group == '1'   || $delete_group == 1)
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'department') active @endif"  href="{{url('department')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-users" aria-hidden="true"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Department</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif
									<!--end:Menu item-->
									<!--begin:Menu item-->

									--}}

									@if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager')
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'users') active @endif" href="{{url('/users')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"></path>
														<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"></rect>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Users</span>
										</a>
										<!--end:Menu link-->
									</div>
									
									@endif

									{{--
									
									@if(Auth::user()->role == 'Admin')
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'managers') active @endif" href="{{url('/managers')}}">
											<span class="menu-icon">
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"></path>
														<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"></rect>
													</svg>
												</span>
											</span>
											<span class="menu-title">Managers</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif

									

									@if($ivr_permission == '1')
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'ivr') active @endif" href="{{url('/ivr')}}">
											<span class="menu-icon">
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-phone" aria-hidden="true"></i>
												</span>
											</span>
											<span class="menu-title">IVR</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif
									@if(Auth::user()->role == 'Admin')
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'number') active @endif" href="{{url('/number')}}">
											<span class="menu-icon">
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-phone" aria-hidden="true"></i>
												</span>
											</span>
											<span class="menu-title">Number</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'leads') active @endif" href="{{url('/leads')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
														<path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Leads</span>
										</a>
										<!--end:Menu link-->
									</div>
									@if($call_log == '1')
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link @if( Request::segment(1) == 'callLogs') active @endif" href="{{url('/callLogs')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-history" style="font-size:17px"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Call Logs</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif


									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="{{ url('/voice_media')}}"  @if( Request::segment(1) == 'voice_media') active @endif 
										   >
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-play" style="font-size:17px"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Media</span>
										</a>
										<!--end:Menu link-->
									</div>

									--}}

									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fas fa-user-tag" style="font-size:17px"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Roles and permission</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;" kt-hidden-height="242">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="{{ url('roles-permission') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Roles</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="{{ url('roles-permission/assign') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Permission</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>

									@if($whatsapp == '1')
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="{{ url('whatsapp')}}"  @if( Request::segment(1) == 'whatsapp') active @endif 
										   >
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-comments" style="font-size:17px"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Messages</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif
									
									@if(Auth::user()->role == 'Admin')
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="{{ url('security')}}"  @if( Request::segment(1) == 'security') active @endif 
										   >
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="fa fa-shield" aria-hidden="true"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Security</span>
										</a>
										<!--end:Menu link-->
									</div>
									@endif

									<!--end:Menu item-->
									<!--begin:Menu item-->
									{{-- <div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog" target="blank">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="currentColor" />
														<path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Changelog v8.1.5</span>
										</a>
										<!--end:Menu link-->
									</div> --}}
									<!--end:Menu item-->
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::sidebar menu-->
						<!--begin::Footer-->
						{{-- <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
							<a href="https://preview.keenthemes.com/html/metronic/docs" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
								<span class="btn-label">Docs & Components</span>
								<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
								<span class="svg-icon btn-icon svg-icon-2 m-0">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
										<rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
										<rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
										<rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
										<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</a>
						</div> --}}
						<!--end::Footer-->
					</div>