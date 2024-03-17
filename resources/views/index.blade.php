<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from social.webestica.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:39:28 GMT -->
<head>
	<title>Social - Network, Community and Event Theme</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/tiny-slider/dist/tiny-slider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/dropzone/dist/dropzone.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/flatpickr/dist/flatpickr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/plyr/plyr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/zuck.js/dist/zuck.min.css')}}">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

	 <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GMKQ4P9YMZ');
  </script>

</head>
<body>
@csrf
<!-- =======================
Header START -->
<x-HeaderSocial/>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
	
	<!-- Container START -->
	<div class="container">
		<div class="row g-4">

			<!-- Sidenav START -->
			<div class="col-lg-3">

				<!-- Advanced filter responsive toggler START -->
				<div class="d-flex align-items-center d-lg-none">
					<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
						<span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
						<span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->
				
				<!-- Navbar START-->
				<nav class="navbar navbar-expand-lg mx-0"> 
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
						<!-- Offcanvas header -->
						<div class="offcanvas-header">
							<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>

						<!-- Offcanvas body -->
						<div class="offcanvas-body d-block px-2 px-lg-0">
							<!-- Card START -->
							<div class="card overflow-hidden">
								<!-- Cover image -->
								<div class="h-50px" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
									<!-- Card body START -->
									<div class="card-body pt-0">
										<div class="text-center">
										<!-- Avatar -->
										<div class="avatar avatar-lg mt-n5 mb-3">
											<a href="#!"><img class="avatar-img rounded border border-white border-3" src="assets/images/profilepic/{{Auth::user()->name}}/{{$profileimage}}" alt=""></a>
										</div>
										<!-- Info -->
										<h5 class="mb-0"> <a href="#!">{{Auth::user()->name}} </a> </h5>
										<small>{{$job_title}}</small>
										<p class="mt-3">{{$bio}}</p>

										<!-- User stat START -->
										<div class="hstack gap-2 gap-xl-3 justify-content-center">
											<!-- User stat item -->
											<div>
												<h6 class="mb-0">{{$posts}}</h6>
												<small>Post</small>
											</div>
											<!-- Divider -->
											<div class="vr"></div>
											<!-- User stat item -->
											<div>
												<h6 class="mb-0">{{$followers}}</h6>
												<small>Followers</small>
											</div>
											<!-- Divider -->
											<div class="vr"></div>
											<!-- User stat item -->
											<div>
												<h6 class="mb-0">{{$followings}}</h6>
												<small>Following</small>
											</div>
										</div>
										<!-- User stat END -->
									</div>

									<!-- Divider -->
									<hr>

									<!-- Side Nav START -->
									<ul class="nav nav-link-secondary flex-column fw-bold gap-2">
										<li class="nav-item">
											<a class="nav-link" href="my-profile.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/home-outline-filled.svg" alt=""><span>Feed </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="{{url("user_profile")}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/person-outline-filled.svg" alt=""><span>Connections </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/earth-outline-filled.svg" alt=""><span>Latest News </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="events.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/calendar-outline-filled.svg" alt=""><span>Events </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="groups.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/chat-outline-filled.svg" alt=""><span>Groups </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="notifications.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/notification-outlined-filled.svg" alt=""><span>Notifications </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="settings.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/cog-outline-filled.svg" alt=""><span>Settings </span></a>
										</li>
									</ul>
									<!-- Side Nav END -->
								</div>
								<!-- Card body END -->
								<!-- Card footer -->
								<div class="card-footer text-center py-2">
									<a class="btn btn-link btn-sm" href="my-profile.html">View Profile </a>
								</div>
							</div>
							<!-- Card END -->

							<!-- Helper link START -->
							<ul class="nav small mt-4 justify-content-center lh-1">
								<li class="nav-item">
									<a class="nav-link" href="my-profile-about.html">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="settings.html">Settings</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" target="_blank" href="https://support.webestica.com/login">Support </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" target="_blank" href="docs/index.html">Docs </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="help.html">Help</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="privacy-and-terms.html">Privacy & terms</a>
								</li>
							</ul>
							<!-- Helper link END -->
							<!-- Copyright -->
							<p class="small text-center mt-1">©2023 <a class="text-reset" target="_blank" href="https://www.webestica.com/"> Webestica </a></p>
						</div>
					</div>
				</nav>
				<!-- Navbar END-->
			</div>
			<!-- Sidenav END -->

			<!-- Main content START -->
			<div class="col-md-8 col-lg-6 vstack gap-4">

				<!-- Story START -->
        <!--<div class="d-flex gap-2 mb-n3">
					<div class="position-relative">
						<div class="card border border-2 border-dashed h-150px px-4 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
							<div>
								<a class="stretched-link btn btn-light rounded-circle icon-md" href="#!"><i class="fa-solid fa-plus"></i></a>
								<h6 class="mt-2 mb-0 small">Post a Story</h6>
							</div>
						</div>
					</div>

			
					<div id="stories" class="storiesWrapper stories-square stories user-icon carousel scroll-enable"></div>
				</div>-->
        <!-- Story END -->

				<!-- Share feed START -->
				<div class="card card-body">
					<div class="d-flex mb-3">
						<!-- Avatar -->
						<div class="avatar avatar-xs me-2">
							<a href="#"> <img class="avatar-img rounded-circle" src="assets/images/profilepic/{{Auth::user()->name}}/{{$profileimage}}" alt=""> </a>
						</div>
						<!-- Post input -->
						<form class="w-100">
							<textarea class="form-control pe-4 border-0" id="posttextarea" rows="2" data-autoresize placeholder="Share your thoughts..."></textarea>
						</form>
					</div>
					<!-- Share feed toolbar START -->
					<ul class="nav nav-pills nav-stack small fw-normal">
						<li class="nav-item">
							<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
						</li>
						<li class="nav-item">
							<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> <i class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link bg-light py-1 px-2 mb-0 btn btn-success-soft" href="#!" id="postbtn">Post</a>
						</li>
					<!---<li class="nav-item dropdown ms-lg-auto">
							<a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-three-dots"></i>
							</a>
						
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
								<li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
								<li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
						</ul>
						</li>-->
					</ul>
					<!-- Share feed toolbar END -->
				</div>
				<!-- Share feed END -->

				<!-- Card feed item START -->

				@foreach($user_posts as $user_post)
				<div class="card">
					<!-- Card header START -->
					<div class="card-header border-0 pb-0">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar avatar-story me-2">
								
									@if($user_post->user->user_detail!=null)
									      @if(count($user_post->user->user_detail)>0)
									<a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/profilepic/{{$user_post->user->name}}/{{$user_post->user->user_detail[0]->profileImage}}" alt=""> </a>
									      @else
										  <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/placeholder.jpg" alt=""> </a>
                                            @endif
								    @else
									<a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/placeholder.jpg" alt=""> </a>
									@endif
								
								</div>
								<!-- Info -->
								<div>
									<div class="nav nav-divider">
										<h6 class="nav-item card-title mb-0"> <a href="{{url('user_profile/'.$user_post->user_id)}}"> 
											@if($user_post->user_id!=null)
											   @if(Auth::user()->id!==$user_post->user_id)
											{{$user_post->user->name}}
											    @else
												Me 
												@endif
											@endif
										</a></h6>
										<span class="nav-item small"> {{TimeDiff($user_post->created_at,now())}} ago</span>
									</div>
									@if($user_post->user_id!=null)
									
									
											@if($user_post->user->user_detail!=null)
											  @if(count($user_post->user->user_detail)>0)
											  @if(Auth::user()->id!==$user_post->user_id)
											  <p class="mb-0 small">{{$user_post->user->user_detail[0]->job_title}}</p>
										    

											   @endif
											  @endif
											@endif
									   @endif
									
								</div>
							</div>
							<!-- Card feed action dropdown START -->
							<div class="dropdown">
								<a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-three-dots"></i>
								</a>
								<!-- Card feed action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
									<li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
								</ul>
							</div>
							<!-- Card feed action dropdown END -->
						</div>
					</div>
					<!-- Card header END -->
					<!-- Card body START -->
					<div class="card-body">
						<div class="player-wrapper overflow-hidden">
							@if($user_post->video!=null)
							<video class="player-html" controls crossorigin="anonymous">
								<source src="assets/images/videos/{{$user_post->video}}" type="video/mp4">
							</video>
							@endif
						</div>
						<p>{{$user_post->content}}</p>
						<!-- Card img -->
						@if($user_post->image!=null)
						<a href="{{asset('assets/images/post/'.$user_post->image)}}" data-gallery="image-popup" data-glightbox="">
						<img class="card-img" src="{{asset('assets/images/post/'.$user_post->image)}}" alt="Post">
						</a>
						@endif
						<!-- Feed react START -->
						<ul class="nav nav-stack py-3 small">
							<li class="nav-item">

								<a class="nav-link active" href="#!" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-custom-class="tooltip-text-start" @if($user_post->likes_count >0)
									
									data-bs-title="@foreach($user_post->likes as $like){{$like->name}}<br>@endforeach"
									
									@endif> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked ({{$user_post->likes_count}})</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments ({{$user_post->comments_count}})</a>
							</li>
							<!-- Card share action START -->
							<li class="nav-item dropdown ms-sm-auto">
							
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction">
									<li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
								</ul>
							</li>
							<!-- Card share action END -->
						</ul>
						<!-- Feed react END -->

						<!-- Add comment -->
						<div class="d-flex mb-3">
							<!-- Avatar -->
							<div class="avatar avatar-xs me-2">
								<a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/profilepic/{{Auth::user()->name}}/{{$profileimage}}" alt=""> </a>
							</div>
							<!-- Comment box  -->
						
							<form class="input-group">
								<textarea data-autoresize class="form-control me-2 bg-light rounded" rows="1" placeholder="Add a comment..."></textarea>
								<button class="btn btn-primary mb-0 rounded" type="submit">Post</button>
							</form>
						</div>
						<!-- Comment wrap START -->
						@if($user_post->comments_count > 0)
						<ul class="comment-wrap list-unstyled">
							<!-- Comment item START -->
							@foreach($user_post->comments as $comment)
							
							<li class="comment-item mt-2">
								<div class="d-flex position-relative">
									<!-- Avatar -->
									<div class="avatar avatar-xs">
    
	@if($comment->profileImage!=null)
										<a href="#!"><img class="avatar-img rounded-circle" 
											src="assets/images/profilepic/{{$comment->name}}/{{$comment->profileImage}}" alt=""></a>
										@else
										<a href="#!"><img class="avatar-img rounded-circle" 
											src="assets/images/avatar/placeholder.jpg" alt=""></a>
										@endif
									</div>
									<div class="ms-2">
										<!-- Comment by -->
										<div class="bg-light rounded-start-top-0 p-3 rounded">
											<div class="d-flex justify-content-between">
												<h6 class="mb-1"> <a href="#!"> {{$comment->name}} </a></h6>
												<small class="ms-2">{{TimeDiff($comment->created_at,now())}}</small>
											</div>
											<p class="small mb-0">{{$comment->comment_content}}</p>
										</div>
										<!-- Comment react -->
									
									</div>
								</div>
								<!-- Comment item nested START -->
							
								<!-- Load more replies -->
							
								<!-- Comment item nested END -->
							</li>
						@endforeach

							<!-- Comment item END -->
							<!-- Comment item START -->
							
							<!-- Comment item END -->
						</ul>
						@endif
						<!-- Comment wrap END -->
					</div>
					<!-- Card body END -->
					<!-- Card footer START -->
			
					<!-- Card footer END -->
				</div>
				@endforeach
				<!-- Card feed item END -->

				
				<!-- Card feed item END -->

				<!-- Card feed item START -->
				
				<!-- Card feed item START -->
				@foreach($user_pages_posts as $user_pages_post)
				<div class="card">
					<!-- Card header START -->
					<div class="card-header border-0 pb-0">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#"> <img class="avatar-img rounded-circle" src="assets/images/logo/{{$user_pages_post->social_page->page_logo}}" alt=""> </a>
								</div>
								<!-- Title -->
								<div>
									<h6 class="card-title mb-0"> <a href="#!"> {{$user_pages_post->social_page->page_name}}</a></h6>
									<p class="mb-0 small">{{date("d-F-Y",strtotime($user_pages_post->created_at))}} at  {{date("H:i a",strtotime($user_pages_post->created_at))}}</p>
								</div>
							</div>
							<!-- Card share action menu -->
							<a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardShareAction5" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-three-dots"></i>
							</a>
							<!-- Card share action dropdown menu -->
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction5">
								<li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
								<li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
								<li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
								<li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
							</ul>
						</div>
							<!-- Card share action END -->
					</div>
					<!-- Card header START -->

					<!-- Card body START -->
					<div class="card-body pb-0">
						<p>{{$user_pages_post->content}}</p>
						<!-- Feed react START -->
					
						<!-- Feed react END -->
					</div>
					<!-- Card body END -->
					<!-- Card Footer START -->
					<div class="card-footer py-3">
						<!-- Feed react START -->
						<ul class="nav nav-fill nav-stack small">
							<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked ({{$user_pages_post->likes_count}})</a>
							</li>
							<!-- Card share action dropdown START -->
							<li class="nav-item dropdown">
								
							
							</li>
							<!-- Card share action dropdown END -->
							
						</ul>
						<!-- Feed react END -->
					</div>
					<!-- Card Footer END -->
				</div>
				<!-- Card feed item END -->
				@endforeach
				@if(count($to_be_friends) > 0)
				<div class="card">
					<!-- Card header START -->
					<div class="card-header d-flex justify-content-between align-items-center border-0 pb-0">
						<h6 class="card-title mb-0">People you may know</h6>

					</div>     
					<!-- Card header START -->
					<div class="card-body">
						<div class="row">
					   	@foreach($to_be_friends as $to_be_friend)
						<div class="col-12 col-md-6">
						   <div class="card shadow-none text-center mb-2">
							<!-- Card body -->
							<div class="card-body p-2  pb-0">
								<div class="avatar avatar-xl">
									@if(count($to_be_friend->user_detail) > 0)
									<a href="#!"><img class="avatar-img rounded-circle" src="assets/images/profilepic/{{$to_be_friend->name}}/{{$to_be_friend->user_detail[0]->profileImage}}" alt=""></a>
								    @else
									<a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/placeholder.jpg" alt=""></a>
									@endif
								</div>
								<h6 class="card-title mb-1 mt-3"> <a href="{{url('user_profile/'.$to_be_friend->id)}}"> {{$to_be_friend->name}} </a></h6>
								<p class="mb-0 small lh-sm">{{$to_be_friend->mutual_friends_count}} mutual connections</p>
							</div>
							<!-- Card footer -->
							<div class="card-footer p-2 border-0">
								<a class="btn btn-sm btn-primary-soft w-100" href="{{url('addfriend/'.$to_be_friend->id)}}"> Add friend </a>
							</div>
						</div>
						

						</div>
					
					 @endforeach
					  
							<!-- Card body -->
							<!-- Card body -->
						</div>
					</div>
				</div>
			@endif
					<!-- Card body START -->
				
						
								
								
								
									<!-- Card add friend item START -->
									
									<!-- Card add friend item END -->
							
								
									<!-- Card add friend item START -->
									
									<!-- Card add friend item END -->
								
					
				<!-- Card feed item END -->



				
					<!-- Card header START -->

					<!-- Card body START -->
		
				
									<!-- Card add friend item START -->
						
					
				<!-- Card feed item END -->

				
		

										<!-- Card body -->
							
									<!-- Card add friend item END -->
								
							
									<!-- Card add friend item START -->
							
									<!-- Card add friend item END -->
					
							
								
									<!-- Card add friend item END -->
							
							
							
								

			
			
				<!-- Card feed item END -->

					<!-- Card header START -->

				

								
								
									
									<!-- Card add friend item END -->
				
				<!-- Card feed item END -->


				
				<!-- Card feed item START -->
				
				<!-- Card feed item END -->
				

				<!-- Card feed item START -->
				
				<!-- Card feed item END -->

				<!-- Story START -->
				
							
								<!-- Card END -->
						

							<!-- Slider items -->
						
								<!-- Card START -->
						
							
				<!-- Story END -->

				<!-- Card feed item START -->
				

					<!-- Load more button START -->
			
					<!-- Load more button END -->

			</div>
			<!-- Main content END -->

			<!-- Right sidebar START -->
			<div class="col-lg-3">
				<div class="row g-4">
					<!-- Card follow START -->
					<div class="col-sm-6 col-lg-12">
						<div class="card">
							<!-- Card header START -->
							<div class="card-header pb-0 border-0">
								<h5 class="card-title mb-0">Who to follow</h5>
							</div>
							<!-- Card header END -->
							<!-- Card body START -->
							<div class="card-body">
								@foreach($users_to_follow as $user)
								<!-- Connection item START -->
								<div class="hstack gap-2 mb-3">
									<!-- Avatar -->
									<div class="avatar">
										<a href="{{url('user_profile/'.$user->userid)}}"><img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.$user->name."/".$user->profileImage)}}" alt=""></a>
									</div>
									<!-- Title -->
									<div class="overflow-hidden">
										<a class="h6 mb-0" href="{{url('user_profile/'.$user->userid)}}">{{$user->name}} </a>
										<p class="mb-0 small text-truncate">{{$user->job_title}}</p>
									</div>
									<!-- Button -->
									<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="{{$user->userid}}"><i class="fa-solid fa-plus"> </i></a>
								</div>
								@endforeach
								<!-- Connection item END -->
							
								<!-- Connection item END -->

								<!-- Connection item START -->
							
								<!-- Connection item END -->
								
								<!-- Connection item START -->
							
								<!-- Connection item END -->

								<!-- Connection item START -->
						
								<!-- Connection item END -->

								<!-- View more button -->
							
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Card follow START -->

					<!-- Card News START -->
					<div class="col-sm-6 col-lg-12">
						<div class="card">
							<!-- Card header START -->
							<div class="card-header pb-0 border-0">
								<h5 class="card-title mb-0">Latest news</h5>
							</div>
							<!-- Card header END -->
							<!-- Card body START -->
							<div class="card-body">
								<!-- News item -->
								@foreach($news as $new)
								@php
						
								@endphp
								<div class="mb-3">
								<h5>	<a href="{{$new->url}}">{{$new->author}}</a><h5>
									<h6 class="mb-0"><a href="{{$new->url}}">{{$new->title}}</a></h6>
									<p>	<small>{{TimeDiff($new->publishedAt,now())}}	</small></p>
								
									<small>{{date("d-F-Y h:i a",strtotime($new->publishedAt))}}</small>
								   <a href="{{$new->url}}" ><img src="{{$new->urlToImage}}"></a>
								</div>
								<!-- News item -->
								
								@endforeach
								<!-- News item -->
								
								<!-- News item -->
							
								<!-- Load more comments -->
							
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Card News END -->
                    <!-- Weather Card-->
					<div class="col-sm-6 col-lg-12">
						<div class="card">
							<div class="card-header pb-0 border-0">
								<h5 class="card-title mb-0">Latest Weather Update</h5>
							</div>
							<div class="card-body">
								<p>Temperature {{$Temperature}}</p>
								<p>Humidity {{$Humidity}}</p>
								<p>Wind Speed {{$windSpeed}}</p>
								<p>City {{$city}}</p>
								<p>Country {{$country}}</p>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Right sidebar END -->

		</div> <!-- Row END -->
	</div>
	<!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Main Chat START -->
<div class="d-none d-lg-block">
	<!-- Button -->
	<a class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-5 mb-5" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasChat">
		<i class="bi bi-chat-left-text-fill"></i>
	</a>
	<!-- Chat sidebar START -->
	<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
		<!-- Offcanvas header -->
		<div class="offcanvas-header d-flex justify-content-between">
			<h5 class="offcanvas-title">Messaging</h5>
			<div class="d-flex">
				<!-- New chat box open button -->
				<a href="#" class="btn btn-secondary-soft-hover py-1 px-2">
					<i class="bi bi-pencil-square"></i>
				</a>
				<!-- Chat action START -->
				<div class="dropdown">
					<a href="#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots"></i>
					</a>
					<!-- Chat action menu -->
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
						<li><a class="dropdown-item" href="#"> <i class="bi bi-check-square fa-fw pe-2"></i>Mark all as read</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat setting </a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Disable notifications</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block setting</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-2"></i>Create a group chat</a></li>
					</ul>
				</div>
				<!-- Chat action END -->
				
				<!-- Close  -->
				<a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas" aria-label="Close">
					<i class="fa-solid fa-xmark"></i>
				</a>

			</div>
		</div>
		<!-- Offcanvas body START -->
		<div class="offcanvas-body pt-0 custom-scrollbar">
			<!-- Search contact START 
			<form class="rounded position-relative">
				<input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
				<button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
			</form>-->
			<!-- Search contact END -->
			<ul class="list-unstyled">
				@foreach($my_friend_records  as $my_friend_record)
				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast{{$my_friend_record->id}}">
					<!-- Avatar -->

					
					   @php
					   if($my_friend_record->loginAt!=null){
						$status_online="status-online";
					   }else{
						$status_online="";
					   }
					 
					   
					   @endphp
					
					
					   
					   

					
					<div class="avatar  {{	$status_online}}">
						@if(count($my_friend_record->user_detail) > 0)
						<img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.$my_friend_record->name."/".$my_friend_record->user_detail[0]->profileImage)}}" alt="">
					
					@else
					<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt="">

						@endif
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link selector" data-receiver_id="{{$my_friend_record->id}}" href="#!">{{$my_friend_record->name}} </a>

					</div>
					<!-- Chat time -->
					@if($my_friend_record->logoutAt==null)
					<div class="small ms-auto text-nowrap"> {{TimeDiff($my_friend_record->loginAt,now())}} </div>
					@else
					<div class="small ms-auto text-nowrap"> {{TimeDiff($my_friend_record->logoutAt,now())}} </div>
					@endif
				</li>
				@endforeach

				<!-- Contact item -->
				
				

				<!-- Contact item -->
				
				<!-- Contact item -->
				

				<!-- Contact item -->
			

				<!-- Contact item -->
				
				<!-- Button -->
				<li class="mt-3 d-grid">
					<a class="btn btn-primary-soft" href="messaging.html"> See all in messaging </a>
				</li>

			</ul>
		</div>
		<!-- Offcanvas body END -->
	</div>
	<!-- Chat sidebar END -->

	<!-- Chat END -->

	<!-- Chat START -->
	
	<div aria-live="polite" aria-atomic="true" class="position-relative">
		<div class="toast-container toast-chat d-flex gap-3 align-items-end">

			<!-- Chat toast START -->
			<input type="hidden" id="receiver_id" value="">
			@foreach($my_friend_records  as $my_friend_record)
			<div id="chatToast{{$my_friend_record->id}}"   class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
				<div class="toast-header bg-mode">
					<!-- Top avatar and status START -->
					<div class="d-flex justify-content-between align-items-center w-100">
						<div class="d-flex">
						
							<div class="flex-shrink-0 avatar me-2">
								@if(count($my_friend_record->user_detail) > 0)
							
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.$my_friend_record->name."/".$my_friend_record->user_detail[0]->profileImage)}}" alt="">
							     @else
								 <img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt="">

								@endif
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0 mt-1"><a href="{{url('user_profile/'.$my_friend_record->id)}}">    {{$my_friend_record->name}}</a></h6>
								@if($my_friend_record->loginAt!=null)
								<div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
								@endif
							</div>
						</div>
						<div class="d-flex">
						<!-- Call button -->
						<div class="dropdown">
							<a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>               
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
								<li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
								<li class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
							</ul>
						</div>
						<!-- Card action END -->
						<a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i class="bi bi-dash-lg"></i></a>        
						<button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
					</div>
				</div>
				<!-- Top avatar and status END -->
					
				</div>
				<div class="toast-body collapse show" id="collapseChat">
					<!-- Chat conversation START -->
					<div class="chat-conversation-content custom-scrollbar h-200px" id="chats">
						<!-- Chat time -->
					
						<!-- Chat message left -->
						   <div id="chatcontainer{{$my_friend_record->id}}">
						<div class="d-flex mb-1">
						
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex mb-1">
						
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>	<div class="d-flex mb-1">
						
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>	<div class="d-flex mb-1">
						
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>	<div class="d-flex mb-1">
						
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
					
						<!-- Chat message left -->

						
						<!-- Chat message right -->
						
						
						<!-- Chat time -->
					
						<!-- Chat Typing -->
						   </div>
					</div>
					<!-- Chat conversation END -->
					<!-- Chat bottom START -->
					<div class="mt-2">
						<!-- Chat textarea -->
						<form id="chatform" data-receiver_id="{{$my_friend_record->id}}">
						<input class="form-control mb-sm-0 mb-3" name="msg" value="" id="messageUser{{$my_friend_record->id}}" placeholder="Type a message" >
						<!-- Button -->
						<div class="d-sm-flex align-items-end mt-2">
							<button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
							<button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
							<button class="btn btn-sm btn-success-soft me-2"> Gif </button>
							<input type="hidden" name="receiver_id" value="{{$my_friend_record->id}}">
							<button class="btn btn-sm btn-primary ms-auto" id="sendBtn" type="submit"  > Send </button>
					@csrf
						</form>
						</div>
					</div>
					<!-- Chat bottom START -->
				</div>
			</div>
			@endforeach
			<!-- Chat toast END -->

			<!-- Chat toast 2 START -->
			
			<!-- Chat toast 2 END -->

		</div>
	</div>
	<!-- Chat END -->

</div>
 <!-- Main Chat END -->

<!-- Modal create Feed START -->
<div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<!-- Modal feed header START -->
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabelCreateFeed">Create post</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!-- Modal feed header END -->

			<!-- Modal feed body START -->
			<div class="modal-body">
				 <!-- Add Feed -->
				 <div class="d-flex mb-3">
					<!-- Avatar -->
					<div class="avatar avatar-xs me-2">
						<img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.Auth::user()->name."/".$profileimage)}}" alt="">
					</div>
					<!-- Feed box  -->
					<form class="w-100">
						<textarea id="postContainer" class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus></textarea>
					</form>
				</div>
				<!-- Feed rect START -->
			
				<!-- Feed rect END -->
			</div>
			<!-- Modal feed body END -->

			<!-- Modal feed footer -->
			<div class="modal-footer row justify-content-between">
				<!-- Select -->
				<div class="col-lg-3">
					<select id="type" class="form-select js-choice choice-select-text-none" data-position="top" data-search-enabled="false">
						<option value="">Select Post</option>
						<option value="ai">Ai</option>
						<option value="PV">Friends</option>
						<option value="PV">Only me</option>
						<option value="PV">Custom</option>
					</select>
				<!-- Button -->
				</div>
				<div class="col-lg-8 text-sm-end">
					<button type="button" class="btn btn-danger-soft me-2"> <i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
					<button type="button" class="btn btn-success-soft" onclick="postsubmit()">Post</button>
				</div>
			</div>
			<!-- Modal feed footer -->

		</div>
	</div>
</div>
<!-- Modal create feed END -->

<!-- Modal create Feed photo START -->
<div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal feed header START -->
			<div class="modal-header">
				<h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!-- Modal feed header END -->

				<!-- Modal feed body START -->
				<div class="modal-body">
				<!-- Add Feed -->
				<div class="d-flex mb-3">
					<!-- Avatar -->
					<div class="avatar avatar-xs me-2">
						<img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.Auth::user()->name."/".$profileimage)}}" alt="">
					</div>
					<!-- Feed box  -->
					<form class="w-100">
						<textarea id="message_photo" class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
					
					
					</form>
				</div>

				<!-- Dropzone photo START -->
				<div>
				
				
				</div>
				<!-- Dropzone photo END -->

				</div>
				<!-- Modal feed body END -->
				<input type="file" id="postimage">
				<!-- Modal feed footer -->
				<div class="modal-footer ">
					<!-- Button -->
					
						<button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-success-soft" onclick="photopost()" >Post</button>
				</div>
				<!-- Modal feed footer -->
		</div>
	</div>
</div>
<!-- Modal create Feed photo END -->

<!-- Modal create Feed video START -->
<div class="modal fade" id="feedActionVideo" tabindex="-1" aria-labelledby="feedActionVideoLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		 <!-- Modal feed header START -->
		 <div class="modal-header">
			<h5 class="modal-title" id="feedActionVideoLabel">Add post video</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<!-- Modal feed header END -->

			<!-- Modal feed body START -->
			<div class="modal-body">
			 <!-- Add Feed -->
			 <div class="d-flex mb-3">
				<!-- Avatar -->
				<div class="avatar avatar-xs me-2">
					<img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.Auth::user()->name."/".$profileimage)}}" alt="">
				</div>
				<!-- Feed box  -->
				<form class="w-100">
					<textarea class="form-control pe-4 fs-3 lh-1 border-0" id="message_video" rows="2" placeholder="Share your thoughts..."></textarea>
					<input type="file" id="postvideo">
				</form>
			</div>

			<!-- Dropzone photo START -->
		
			<!-- Dropzone photo END -->
           
		</div>
			<!-- Modal feed body END -->

			<!-- Modal feed footer -->
			<div class="modal-footer">
				<!-- Button -->
				<button type="button" class="btn btn-danger-soft me-2"><i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
				<button type="button" class="btn btn-success-soft" onclick="videopost()">Post</button>
			</div>
			<!-- Modal feed footer -->
		</div>
	</div>
</div>
<!-- Modal create Feed video END -->

<!-- Modal create events START -->
<div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal feed header START -->
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabelCreateAlbum">Create event</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!-- Modal feed header END -->
			<!-- Modal feed body START -->
			<div class="modal-body">
				<!-- Form START -->
				<form class="row g-4">
					<!-- Title -->
					<div class="col-12">
						<label class="form-label">Title</label>
						<input type="email" class="form-control" placeholder="Event name here">
					</div>
					<!-- Description -->
					<div class="col-12">
						<label class="form-label">Description</label>
						<textarea class="form-control" rows="2" placeholder="Ex: topics, schedule, etc."></textarea>
					</div>
					<!-- Date -->
					<div class="col-sm-4">
						<label class="form-label">Date</label>
						<input type="text" class="form-control flatpickr" placeholder="Select date">
					</div>
					<!-- Time -->
					<div class="col-sm-4">
						<label class="form-label">Time</label>
						<input type="text" class="form-control flatpickr" data-enableTime="true" data-noCalendar="true" placeholder="Select time">
					</div>
					<!-- Duration -->
					<div class="col-sm-4">
						<label class="form-label">Duration</label>
						<input type="email" class="form-control" placeholder="1hr 23m">
					</div>
					<!-- Location -->
					<div class="col-12">
						<label class="form-label">Location</label>
						<input type="email" class="form-control" placeholder="Logansport, IN 46947">
					</div>
					<!-- Add guests -->
					<div class="col-12">
						<label class="form-label">Add guests</label>
						<input type="email" class="form-control" placeholder="Guest email">
					</div>
					<!-- Avatar group START -->
					<div class="col-12 mt-3">
						<ul class="avatar-group list-unstyled align-items-center mb-0">
							<li class="avatar avatar-xs">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="avatar">
							</li>
							<li class="avatar avatar-xs">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/02.jpg')}}" alt="avatar">
							</li>
							<li class="avatar avatar-xs">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/03.jpg')}}" alt="avatar">
							</li>
							<li class="avatar avatar-xs">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/04.jpg')}}" alt="avatar">
							</li>
							<li class="avatar avatar-xs">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/05.jpg')}}" alt="avatar">
							</li>
							<li class="avatar avatar-xs">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/06.jpg')}}" alt="avatar">
							</li>
							<li class="avatar avatar-xs">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/07.jpg')}}" alt="avatar">
							</li>
							<li class="ms-3">
								<small> +50 </small>
							</li>
						</ul>
					</div>
					<!-- Upload Photos or Videos -->
					<!-- Dropzone photo START -->
					<div>
						<label class="form-label">Upload attachment</label>
						<div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
							<div class="dz-message">
								<i class="bi bi-file-earmark-text display-3"></i>
								<p>Drop presentation and document here or click to upload.</p>
							</div>
						</div>
					</div>
					<!-- Dropzone photo END -->
				</form>
				<!-- Form END -->
			</div>
			<!-- Modal feed body END -->
			<!-- Modal footer -->
			<!-- Button -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
				<button type="button" class="btn btn-success-soft">Create now</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal create events END -->

<audio id="myAudio">
	<source src="{{asset('assets/sound/sound.mp3')}}" type="audio/mpeg">
	Your browser does not support the audio element.
  </audio>

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

  <script src="{{asset('build/assets/app-Bm2JNsIg.js')}}"></script>
<script src="assets/vendor/tiny-slider/dist/tiny-slider.js"></script>
<script src="assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js"></script>
<script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/vendor/glightbox-master/dist/js/glightbox.min.js"></script>
<script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/vendor/plyr/plyr.js"></script>

  
<!--<script src="assets/vendor/zuck.js/dist/zuck.min.js"></script>-->
<!--<script src="assets/js/zuck-stories.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
	//posttextarea

publicPatth	={!! json_encode(asset('sounds')) !!};
	   console.log(publicPatth	);
	   var audio = document.getElementById("myAudio");
	 
	   
		$("#type").change(function(){
			postType=$(this).val();
			if(postType=="ai"){
				$.ajax({
		method:"get",
		url:"{{url('post_ai')}}",

		success:function(res){
			res=JSON.parse(res);
		
			$("#postContainer").val(res.post_content);

		}
	});
			}
          console.log($(this).val());
		});
	
		function postsubmit(){
          console.log("submit post");
		var  postContainer =$("#postContainer").val();

		token=  $("input[name='_token']").val();
	//	console.log(token+postContainer);
		formData={
         _token:token,
		 content:postContainer
		};
		if(postContainer!=""){
		$.ajax({
		method:"post",
		data:formData,
		url:"{{url('user_post')}}",
         success:function(res){
            console.log(res);
			window.location.href="/";
		 }


		});
	}
		}
   // $("#message").val();
   receiver_id= $("#receiver_id").val();
   function photopost(){
  content=  $("#message_photo").val();
  console.log(content);
  token=  $("input[name='_token']").val();
  var fileInput = $('#postimage')[0];
    var file = fileInput.files[0];  
	var formData = new FormData();

	if (fileInput.files.length > 0){
    formData.append('file', file);
	}
	formData.append("content",content);
	formData.append("_token",token);
	$.ajax({
      url: "{{url('user_post')}}", // Laravel route for file upload
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
	  
      success: function(response) {
		console.log(response);
		window.location.href="/";
     //   alert('File uploaded successfully!');
      }
	});

   }
   function videopost(){
  content=  $("#message_video").val();
  console.log(content);
  token=  $("input[name='_token']").val();
  var fileInput = $('#postvideo')[0];
     console.log(fileInput);
    var file = fileInput.files[0];  
	console.log(file);
	var formData = new FormData();

	
    formData.append('file',file);
	
	formData.append("content",content);
	formData.append("_token",token);
	$.ajax({
      url: "{{url('user_post')}}", // Laravel route for file upload
      type: 'POST',
      data: formData,
	  processData: false,
      contentType: false,
	  
      success: function(response) {
		console.log(response);
		window.location.href="/";
     //   alert('File uploaded successfully!');
      }
	});

   }
   userIdLogin= {!! json_encode(Auth::user()->id) !!};
   $(document).on("click",".selector",function(){


receiver_id=$(this).data('receiver_id');
 loadChat();
 $(".toast").hide();
 $("#chatcontainer"+receiver_id).html('');
$("#chatToast"+receiver_id).show();
});
function formatAMPM(date) {

  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
 

// Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
const dayOfWeek = date.getDay();

// Create an array of three-letter day abbreviations
const daysOfWeekAbbrev = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

// Get the three-letter abbreviation for the current day
const month = date.getMonth();

// Create an array of three-letter month abbreviations
const monthsAbbrev = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

// Get the three-letter abbreviation for the current month
const threeLetterAbbreviationMonth = monthsAbbrev[month];
const threeLetterAbbreviation = daysOfWeekAbbrev[dayOfWeek];
  return date.getDate() +" "+threeLetterAbbreviationMonth +" " +date.getFullYear()+" "+ strTime;
}
function loadChat(){
csrftoken=	$("input[name='_token']").val();
console.log(csrftoken);
 formData={
	receiver_id:receiver_id,
	sender_id:userIdLogin,
	_token:csrftoken
   }
   $.ajax({
	method:"post",
		url:"{{url('chatsload')}}",
		data:formData,
		success:function(res){
          console.log(res);
		  let chats=res.data;
		  let chats_length=chats.length;
		  if(chats_length > 0){
			   html="";
			  for(i=0;i < chats_length; i++ ){
                  if(chats[i].sender_id==userIdLogin){
					html+="<div class='d-flex justify-content-end text-end mb-1'>";
			html+="	<div class='w-100'>";
				html+="	<div class='d-flex flex-column align-items-end'>";
					html+="<div class='bg-primary text-white p-2 px-3 rounded-2'>"+chats[i].msg+"</div>";
					html+="	<div class='small my-2'>"+formatAMPM(new Date(chats[i].created_at))+"</div>";
					html+="</div>";
					html+="	</div>";
					html+="</div>";
				  }else{
					html+="<div class='d-flex mb-1'>";
						html+="<div class='flex-grow-1'>";
							html+="<div class='w-100'>";
								html+="<div class='d-flex flex-column align-items-start'>";
									html+="	<div class='bg-light text-secondary p-2 px-3 rounded-2'>"+chats[i].msg+"</div>";
									html+="	<div class='small my-2'>"+formatAMPM(new Date(chats[i].created_at))+"</div>";
									html+="	</div>";
									html+="	</div>";
									html+="</div>";
									html+="</div>";
				  }

			  }
			  $("#chatcontainer"+receiver_id).append(html);
		  }

		}
   });
   console.log(formData);
}
   $(document).on("submit", "#chatform", function(e) {
    e.preventDefault(); // Prevent default form submission behavior
    
    var formData = $(this).serialize();
	 // Serialize form data
      
    
	   $("#receiver_id").val($(this).data("receiver_id"));
	
    //console.log(formData);

    $.ajax({
		method:"post",
		url:"{{url('chats')}}",
		data:formData,
		success:function(res){
	   
		  console.log(receiver_id);
		msg=$("#messageUser"+receiver_id).val();
         
console.log(msg);
		htmlsender="";
		htmlsender+="<div class='d-flex justify-content-end text-end mb-1'>";
			htmlsender+="	<div class='w-100'>";
				htmlsender+="	<div class='d-flex flex-column align-items-end'>";
					htmlsender+="<div class='bg-primary text-white p-2 px-3 rounded-2'>"+msg+"</div>";
					htmlsender+="	<div class='small my-2'>"+formatAMPM(new Date())+"</div>";
					htmlsender+="</div>";
					htmlsender+="	</div>";
					htmlsender+="</div>";
					console.log(htmlsender);
					$("#chatcontainer"+receiver_id).append(htmlsender);
					$("#messageUser"+receiver_id).val('');
	
		}
	});

});


Echo.channel('user_message')
    .listen('UserMessage', (e) => {
      console.log(e.chat);
	
	  console.log( "currentUser"+ userIdLogin);
	  console.log("reciever_id"+   receiver_id);
       html="";/*
	   e.chat.forEach((item)=>{
          console.log(item.sender_id);
		 
	    
		if(item.receiver_id==userIdLogin && receiver_id==item.sender_id ){
			
		    html+="<div class='d-flex mb-1'>";
						html+="<div class='flex-grow-1'>";
							html+="<div class='w-100'>";
								html+="<div class='d-flex flex-column align-items-start'>";
									html+="	<div class='bg-light text-secondary p-2 px-3 rounded-2'>"+item.msg+"</div>";
									html+="	<div class='small my-2'>6:15 AM</div>";
									html+="	</div>";
									html+="	</div>";
									html+="</div>";
									html+="</div>";
									console.log(html);
									$("#chatcontainer"+receiver_id).append(html);
									
		  }
		
		});*/
		if(e.chat.receiver_id==userIdLogin && receiver_id==e.chat.sender_id){
			audio.play();		
			html+="<div class='d-flex mb-1'>";
						html+="<div class='flex-grow-1'>";
							html+="<div class='w-100'>";
								html+="<div class='d-flex flex-column align-items-start'>";
									html+="	<div class='bg-light text-secondary p-2 px-3 rounded-2'>"+e.chat.msg+"</div>";
									html+="	<div class='small my-2'>"+formatAMPM(new Date(e.chat.created_at))+"</div>";
									html+="	</div>";
									html+="	</div>";
									html+="</div>";
									html+="</div>";
									console.log(html);
									$("#chatcontainer"+receiver_id).append(html);
		  }

    });
	Echo.channel('usernotification')

.listen('NotificationUser', (e) => {
  $("#notification").html("");
  audio.play();
  userId= {!! json_encode(Auth::user()->id) !!};
console.log(e);
var notifications=e.notifictaion.notifications;
Html="";
var totalCount=0;
notifications.forEach(element => {
var totalCount=+1;
  if(element.user_id===userId){
  console.log(element.created_at);
   created_at= new Date(element.created_at);
   console.log("notification Time"+created_at);
 
   Html+="<li>";
	Html+="<a href='#' class='list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3'>";
	  Html+="<div class='ms-sm-3'>";
		Html+="	<div class='d-flex'>";
		  Html+="	<p class='small mb-2'>"+element.nofication+"</p>";
											
		  Html+="	</div>";
		  Html+="	</div>";
		  Html+="</a>";
		  Html+="</li>";
var today = new Date();
console.log(today);
// Calculate the time difference in milliseconds
$("#notification").html(Html);
noofnotifications=$("#notificta").text();
noofnotifications=parseInt(noofnotifications)+1;
console.log(noofnotifications);
$("#notificta").text(noofnotifications);

  }
  console.log(totalCount);

});




	
});

</script>


</body>

<!-- Mirrored from social.webestica.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:39:56 GMT -->
</html>
