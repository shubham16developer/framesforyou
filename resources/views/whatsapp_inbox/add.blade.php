@extends('layouts.master')
@push('css')

@endpush
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<div class="d-flex flex-column flex-column-fluid">
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Messages</h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<li class="breadcrumb-item text-muted">
							<a href="{{url('home')}}" class="text-muted text-hover-primary">Home</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Messages</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="d-flex flex-column flex-lg-row">
					<!--begin::Sidebar-->
					<div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
						<!--begin::Contacts-->
						<div class="card card-flush">
							<!--begin::Card header-->
							{{-- <div class="card-header pt-7" id="kt_chat_contacts_header">
								<!--begin::Form-->
								<form class="w-100 position-relative" autocomplete="off">
									<!--begin::Icon-->
									<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
									<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
											<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->
									<!--end::Icon-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by username or email...">
									<!--end::Input-->
								</form>
								<!--end::Form-->
							</div> --}}
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-5" id="kt_chat_contacts_body">
								<!--begin::List-->
								<div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px" style="max-height: 224px;">
									<!--begin::User-->


									<!-- For Active User -->

									<?php

									use App\Models\User;
									use App\Models\Message;

									$first = User::where('role','Admin')->where('id',$user_id)->first();
									$users = User::where('role','Admin')->whereNotIn('id',[$login_id])->get();

									// $in_msgs = Message::with('msg_from','msg_to')->where('user_to',$login_id)->where('user_from',$user_id)->get();
									// $my_msgs = Message::with('msg_from','msg_to')->where('user_from',$login_id)->where('user_to',$user_id)->get();

									// /$all_msgs = Message::with('msg_from','msg_to')->where('user_to',$login_id)->where('user_from',$user_id)->get();


									// $all_msgs = Message::with('msg_from','msg_to')->where(DB::raw(where('user_to',$login_id)->where('user_from',$user_id)))
									// 											  ->where(DB::raw(where('user_from',$login_id)->where('user_to',$user_id)))
									// 											  ->get();

									// $first = User::where('id',$user_id)->first();
									// $users = User::whereNotIn('id',[$login_id])->get();

										$all_msgs = Message::with('msg_from','msg_to')
													->where(function ($query) use ($login_id,$user_id) {
                										$query->where('user_from', $login_id)
                      										  ->where('user_to', $user_id);
            											})
													->orWhere(function ($query) use ($login_id,$user_id) {
                										$query->where('user_to', $login_id)
                      										  ->where('user_from', $user_id);
            											})
													->get()



									?>

									@foreach( $users as $data)

									<!--begin::Separator-->
									<div class="separator separator-dashed d-none"></div>
									<!--end::Separator-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-4">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-45px symbol-circle">
												<img alt="Pic" src="{{ url('media/avatars/blank.png') }}">
												<div class="symbol-badge bg-success start-100 top-100 border-4 h-8px w-8px ms-n2 mt-n2"></div>
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-5">
												<a href="/whatsapp/show_dash/{{$data->id}}" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$data->first_name}} {{$data->last_name}}</a>
												<div class="fw-semibold text-muted">{{$data->email}}</div>
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Lat seen-->
										<div class="d-flex flex-column align-items-end ms-2">
											<span class="text-muted fs-7 mb-1">5 hrs</span>
										</div>
										<!--end::Lat seen-->
									</div>
									<!--end::User-->
									<!--begin::Separator-->

									<!-- END -->

									@endforeach


									{{--

									<!-- For Deactive User -->

									<div class="separator separator-dashed d-none"></div>
									<!--end::Separator-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-4">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-45px symbol-circle">
												<img alt="Pic" src="{{ url('media/avatars/blank.png') }}">
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-5">
												<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
												<div class="fw-semibold text-muted">sean@dellito.com</div>
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Lat seen-->
										<div class="d-flex flex-column align-items-end ms-2">
											<span class="text-muted fs-7 mb-1">20 hrs</span>
										</div>
										<!--end::Lat seen-->
									</div>
									<!--end::User-->

									<!-- END -->

									--}}
									
								</div>
								<!--end::List-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Contacts-->
					</div>
					<!--end::Sidebar-->

					@if($user_id != 0)

					<!--begin::Content-->
					<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
						<!--begin::Messenger-->
						<div class="card" id="kt_chat_messenger">
							<!--begin::Card header-->
							<div class="card-header" id="kt_chat_messenger_header">
								<!--begin::Title-->
								<div class="card-title">
									<!--begin::User-->
									<div class="d-flex justify-content-center flex-column me-3">
										<a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{$first->first_name}} {{$first->last_name}}</a>
										<!--begin::Info-->
										<div class="mb-0 lh-1">
											<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
											<span class="fs-7 fw-semibold text-muted">Active</span>
										</div> 
										<!--end::Info-->
									</div>
									<!--end::User-->
								</div>
								<!--end::Title-->
								
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body" id="kt_chat_messenger_body">
									<!--begin::Messages-->
									<div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" style="max-height: 76px;">


										@foreach ($all_msgs as $all)

										@if($all->user_to == $login_id)

										<!--begin::Message(in)-->
										<div class="d-flex justify-content-start mb-10">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column align-items-start">
												<!--begin::User-->
												<div class="d-flex align-items-center mb-2">
													<!--begin::Avatar-->
													<div class="symbol symbol-35px symbol-circle">
														<img alt="Pic" src="{{ url('media/avatars/blank.png') }}">
													</div>
													<!--end::Avatar-->
													<!--begin::Details-->
													<div class="ms-3">
														<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{$first->first_name}} {{$first->last_name}}</a>
														<span class="text-muted fs-7 mb-1">2 mins</span>
													</div>
													<!--end::Details-->
												</div>
												<!--end::User-->
												<!--begin::Text-->
												<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">{{$all->msg}}</div>
												<!--end::Text-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Message(in)-->

										@elseif($all->user_to != $login_id)
										

										<!--begin::Message(out)-->
										<div class="d-flex justify-content-end mb-10">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column align-items-end">
												<!--begin::User-->
												<div class="d-flex align-items-center mb-2">
													<!--begin::Details-->
													<div class="me-3">
														<span class="text-muted fs-7 mb-1">5 mins</span>
														<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
													</div>
													<!--end::Details-->
													<!--begin::Avatar-->
													<div class="symbol symbol-35px symbol-circle">
														<img alt="Pic" src="{{ url('media/avatars/blank.png') }}">
													</div>
													<!--end::Avatar-->
												</div>
												<!--end::User-->
												<!--begin::Text-->
												<div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">{{$all->msg}}</div>
												<!--end::Text-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Message(out)-->

										@endif


										@endforeach


										</div>
										<!--end::Messages-->
									</div>
									<!--end::Card body-->
									<form action="/whatsapp/send" method="POST" enctype="multipart/form-data">
									@csrf
									<!--begin::Card footer-->
									<div class="card-footer pt-4" id="kt_chat_messenger_footer">
										<!--begin::Input-->
										<textarea class="form-control form-control-flush mb-3" id="messageChat" rows="1" data-kt-element="input" name="msg" placeholder="Type a message"></textarea>

										<input type="hidden" name="user_to" value="{{$user_id}}">
										<!--end::Input-->
										<!--begin:Toolbar-->


										<div class="d-flex flex-stack">
											<!--begin::Actions-->
											<div class="d-flex align-items-center me-2">
								                <!-- <button class="btn btn-sm btn-icon btn-active-light-primary me-1" onclick="return openForm(event)" type="button" data-bs-toggle="tooltip" aria-label="Coming soon" data-bs-original-title="Attachment" data-kt-initialized="1"><i class="bi bi-paperclip fs-3"></i></button> -->
								                <div class='file'>
												      <label for='input-file'>
												        <i class="bi bi-paperclip fs-3"></i>
												      </label>
												      <input id='input-file' name="file" style="display: none;" accept=".jpg, .jpeg, .png" type='file' />
											    </div>
								                <!-- 
								                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" aria-label="Coming soon" data-bs-original-title="Attachment" data-kt-initialized="1"><i class="bi bi-upload fs-3"></i></button> -->
								                
								            </div>
											<!--end::Actions-->
											<!--begin::Send-->
											<button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
											<!--end::Send-->
										</div>
										<!--end::Toolbar-->
									</div>
								</form>
									<!--end::Card footer-->
								</div>
								<!--end::Messenger-->
							</div>
							<!--end::Content-->

							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection
@push('js')
<script>

</script>
@endpush







