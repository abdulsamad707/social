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

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">

	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="index-2.html">
				<img class="light-mode-item navbar-brand-item" src="{{asset('assets/images/logo.svg')}}" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="{{asset('assets/images/logo.svg')}}" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="collapse navbar-collapse" id="navbarCollapse">

				<!-- Nav Search START -->
				<div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
					<div class="nav-item w-100">
						<form class="rounded position-relative">
							<input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
							<button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
						</form>
					</div>
				</div>
				<!-- Nav Search END -->

				<ul class="navbar-nav navbar-nav-scroll ms-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown">
						<a class="nav-link active dropdown-toggle" href="#" id="homeMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demo</a>
						<ul class="dropdown-menu" aria-labelledby="homeMenu">
							<li> <a class="dropdown-item active" href="index-2.html">Home default</a></li>
							<li> <a class="dropdown-item" href="index-classic.html">Home classic</a></li>
							<li> <a class="dropdown-item" href="index-post.html">Home post</a></li>
							<li> <a class="dropdown-item" href="index-video.html">Home video</a></li>
							<li> <a class="dropdown-item" href="index-event.html">Home event</a></li>
							<li> <a class="dropdown-item" href="landing.html">Landing page</a></li>
							<li> <a class="dropdown-item" href="app-download.html">App download</a></li>
							<li class="dropdown-divider"></li>
							<li> 
								<a class="dropdown-item" href="https://themes.getbootstrap.com/store/webestica/" target="_blank">
									<i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>Buy Social!
								</a> 
							</li>
						</ul>
					</li>
					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<li> <a class="dropdown-item" href="albums.html">Albums</a></li>
							<li> <a class="dropdown-item" href="celebration.html">Celebration</a></li>
							<li> <a class="dropdown-item" href="messaging.html">Messaging</a></li>
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend"> 
								<a class="dropdown-item dropdown-toggle" href="#!">Profile</a>
								<ul class="dropdown-menu" data-bs-popper="none">
									<li> <a class="dropdown-item" href="my-profile.html">Feed</a> </li>
									<li> <a class="dropdown-item" href="my-profile-about.html">About</a> </li>
									<li> <a class="dropdown-item" href="my-profile-connections.html">Connections</a> </li>
									<li> <a class="dropdown-item" href="my-profile-media.html">Media</a> </li>
									<li> <a class="dropdown-item" href="my-profile-videos.html">Videos</a> </li>
									<li> <a class="dropdown-item" href="my-profile-events.html">Events</a> </li>
									<li> <a class="dropdown-item" href="my-profile-activity.html">Activity</a> </li>
								</ul>
							</li>
							<li> <a class="dropdown-item" href="events.html">Events</a></li>
							<li> <a class="dropdown-item" href="events-2.html">Events 2</a></li>
							<li> <a class="dropdown-item" href="event-details.html">Event details</a></li>
							<li> <a class="dropdown-item" href="event-details-2.html">Event details 2</a></li>
							<li> <a class="dropdown-item" href="groups.html">Groups</a></li>
							<li> <a class="dropdown-item" href="group-details.html">Group details</a></li>
							<li> <a class="dropdown-item" href="post-videos.html">Post videos</a></li>
							<li> <a class="dropdown-item" href="post-video-details.html">Post video details</a></li>
							<li> <a class="dropdown-item" href="post-details.html">Post details</a></li>
							<li> <a class="dropdown-item" href="video-details.html">Video details</a></li>
							<li> <a class="dropdown-item" href="blog.html">Blog</a></li>
							<li> <a class="dropdown-item" href="blog-details.html">Blog details</a></li>
							
							<!-- Dropdown submenu levels -->
							<li class="dropdown-divider"></li>
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#">Dropdown levels</a>
								<ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
									<!-- dropdown submenu open left -->
									<li class="dropdown-submenu dropstart">
										<a class="dropdown-item dropdown-toggle" href="#">Dropdown (start)</a>
										<ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
											<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
											<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
										</ul>
									</li>
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
								</ul>
							</li>
						</ul>
					</li>

					<!-- Nav item 3 Post -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account </a>
						<ul class="dropdown-menu" aria-labelledby="postMenu">
							<li> <a class="dropdown-item" href="create-page.html">Create a page</a></li>
							<li> <a class="dropdown-item" href="settings.html">Settings</a> </li>
							<li> <a class="dropdown-item" href="notifications.html">Notifications</a> </li>
							<li> <a class="dropdown-item" href="help.html">Help center</a> </li>
							<li> <a class="dropdown-item" href="help-details.html">Help details</a> </li>
							<!-- dropdown submenu open left -->
							<li class="dropdown-submenu dropstart">
								<a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
								<ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
									<li> <a class="dropdown-item" href="sign-in.html">Sign in</a> </li>
									<li> <a class="dropdown-item" href="sign-up.html">Sing up</a> </li>
									<li> <a class="dropdown-item" href="forgot-password.html">Forgot password</a> </li>
									<li class="dropdown-divider"></li>
									<li> <a class="dropdown-item" href="sign-in-advance.html">Sign in advance</a> </li>
									<li> <a class="dropdown-item" href="sign-up-advance.html">Sing up advance</a> </li>
									<li> <a class="dropdown-item" href="forgot-password-advance.html">Forgot password advance</a> </li>
								</ul>
							</li>
							<li> <a class="dropdown-item" href="error-404.html">Error 404</a> </li>
							<li> <a class="dropdown-item" href="offline.html">Offline</a> </li>
							<li> <a class="dropdown-item" href="privacy-and-terms.html">Privacy & terms</a> </li>
						</ul>
					</li>

					<!-- Nav item 4 Mega menu -->
					<li class="nav-item">
						<a class="nav-link" href="my-profile-connections.html">My network</a>
					</li>
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Nav right START -->
			<ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
				<li class="nav-item ms-2">
					<a class="nav-link bg-light icon-md btn btn-light p-0" href="messaging.html">
						<i class="bi bi-chat-left-text-fill fs-6"> </i>
					</a>
				</li>
				<li class="nav-item ms-2">
					<a class="nav-link bg-light icon-md btn btn-light p-0" href="settings.html">
						<i class="bi bi-gear-fill fs-6"> </i>
					</a>
				</li>
				<li class="nav-item dropdown ms-2">
					<a class="nav-link bg-light icon-md btn btn-light p-0" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
						<span class="badge-notif animation-blink"></span>
						<i class="bi bi-bell-fill fs-6"> </i>
					</a>
					<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
						<div class="card">
							<div class="card-header d-flex justify-content-between align-items-center">
								<h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
								<a class="small" href="#">Clear all</a>
							</div>
							<div class="card-body p-0">
								<ul class="list-group list-group-flush list-unstyled p-2">
									<!-- Notif item -->
									<li>
										<div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
											<div class="avatar text-center d-none d-sm-inline-block">
												<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
											</div>
											<div class="ms-sm-3">
												<div class=" d-flex">
												<p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
												<p class="small ms-3 text-nowrap">Just now</p>
											</div>
											<div class="d-flex">
												<button class="btn btn-sm py-1 btn-primary me-2">Accept </button>
												<button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
											</div>
										</div>
									</div>
									</li>
									<!-- Notif item -->
									<li>
										<div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3 position-relative">
											<div class="avatar text-center d-none d-sm-inline-block">
												<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
											</div>
											<div class="ms-sm-3 d-flex">
												<div>
													<p class="small mb-2">Wish <b>Amanda Reed</b> a happy birthday (Nov 12)</p>
													<button class="btn btn-sm btn-outline-light py-1 me-2">Say happy birthday 🎂</button>
												</div>
												<p class="small ms-3">2min</p>
											</div>
										</div>
									</li>
									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3">
											<div class="avatar text-center d-none d-sm-inline-block">
												<div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
											</div>
											<div class="ms-sm-3">
												<div class="d-flex">
													<p class="small mb-2">Webestica has 15 like and 1 new activity</p>
													<p class="small ms-3">1hr</p>
												</div>
											</div>
										</a>
									</li>
									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 p-3 mb-1">
											<div class="avatar text-center d-none d-sm-inline-block">
												<img class="avatar-img rounded-circle" src="assets/images/logo/12.svg" alt="">
											</div>
											<div class="ms-sm-3 d-flex">
												<p class="small mb-2"><b>Bootstrap in the news:</b> The search giant’s parent company, Alphabet, just joined an exclusive club of tech stocks.</p>
												<p class="small ms-3">4hr</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="card-footer text-center">
								<a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
							</div>
						</div>
					</div>
				</li>
				<!-- Notification dropdown END -->
               <!--Add Friend -->

			   <li class="nav-item dropdown ms-2">
				<a class="nav-link bg-light icon-md btn btn-light p-0" href="#" id="addperson" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
				
					<i class="bi bi-person-fill-add fs-6"> </i>
				</a>
				<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="addperson">
					<div class="card">
						<div class="card-header d-flex justify-content-between align-items-center">
							<h6 class="m-0">Friend Request <span class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
							<a class="small" href="#">Clear all</a>
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush list-unstyled p-2">
								<!-- Notif item -->
								<li>
									<div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
										<div class="avatar text-center d-none d-sm-inline-block">
											<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
										</div>
										<div class="ms-sm-3">
											<div class=" d-flex">
											<p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
											<p class="small ms-3 text-nowrap">Just now</p>
										</div>
										<div class="d-flex">
											<button class="btn btn-sm py-1 btn-primary me-2">Accept </button>
											<button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
										</div>
									</div>
								</div>
								</li>
							
						
								<!-- Notif item -->
						
							</ul>
						</div>
						<div class="card-footer text-center">
							<a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
						</div>
					</div>
				</div>
			</li>

				<li class="nav-item ms-2 dropdown">
					<a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-2" src="assets/images/avatar/{{$profileimage}}" alt="">
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center position-relative">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle" src="assets/images/avatar/{{$profileimage}}" alt="avatar">
								</div>
								<div>
									<a class="h6 stretched-link" href="#">{{Auth::user()->name}}</a>
									<p class="small m-0">{{$job_title}}</p>
								</div>
							</div>
							<a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href="my-profile.html">View profile</a>
						</li>
						<!-- Links -->
						<li><a class="dropdown-item" href="settings.html"><i class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
						<li> 
							<a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
								<i class="fa-fw bi bi-life-preserver me-2"></i>Support
							</a> 
						</li>
						<li> 
							<a class="dropdown-item" href="docs/index.html" target="_blank">
								<i class="fa-fw bi bi-card-text me-2"></i>Documentation
							</a> 
						</li>
						<li class="dropdown-divider"></li>
						<li><a class="dropdown-item bg-danger-soft-hover" href="{{url('signout')}}"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
						<li> <hr class="dropdown-divider"></li>
						<!-- Dark mode options START -->
						<li>
							<div class="modeswitch-item theme-icon-active d-flex justify-content-center gap-3 align-items-center p-2 pb-0">
								<span>Mode:</span>
								<button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0" data-bs-theme-value="light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Light">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0" data-bs-theme-value="dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dark">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
										<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0 active" data-bs-theme-value="auto" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Auto">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
										<use href="#"></use>
									</svg>
								</button>
							</div>
						</li> 
						<!-- Dark mode options END-->
					</ul>
				</li>
				<!-- Profile START -->
				
			</ul>
			<!-- Nav right END -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
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
											<a href="#!"><img class="avatar-img rounded border border-white border-3" src="assets/images/avatar/{{$profileimage}}" alt=""></a>
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
											<a class="nav-link" href="{{url("my_profile")}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/person-outline-filled.svg" alt=""><span>Connections </span></a>
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
							<a href="#"> <img class="avatar-img rounded-circle" src="assets/images/avatar/{{$profileimage}}" alt=""> </a>
						</div>
						<!-- Post input -->
						<form class="w-100">
							<textarea class="form-control pe-4 border-0" rows="2" data-autoresize placeholder="Share your thoughts..."></textarea>
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
							<a class="nav-link bg-light py-1 px-2 mb-0 btn btn-success-soft" href="#!">Post</a>
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
									<a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/{{$user_post->user->user_detail[0]->profileImage}}" alt=""> </a>
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
										<h6 class="nav-item card-title mb-0"> <a href="#!"> 
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
						<img class="card-img" src="assets/images/post/{{$user_post->image}}" alt="Post">
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
								<a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/{{$profileimage}}" alt=""> </a>
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
							
							<li class="comment-item">
								<div class="d-flex position-relative">
									<!-- Avatar -->
									<div class="avatar avatar-xs">
										<a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
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

				<!-- Card feed item START -->
			  
					<!-- Card header START -->

					
				<!-- Card feed item END -->

				<!-- Card feed item START -->
				<div class="card">
					<!-- Card header START -->
					<div class="card-header border-0 pb-0">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#"> <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""> </a>
								</div>
								<!-- Title -->
								<div>
									<h6 class="card-title mb-0"> <a href="#!"> All in the Mind </a></h6>
									<p class="mb-0 small">9 November at 23:29</p>
								</div>
							</div>
							<!-- Card share action menu -->
							<a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardShareAction7" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-three-dots"></i>
							</a>
							<!-- Card share action dropdown menu -->
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction7">
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
						<p>How do you protect your business against cyber-crime?</p>
						 <div class="vstack gap-2">
							 <!-- Feed poll item -->
							<div>
								<input type="radio" class="btn-check" name="poll" id="option">
								<label class="btn btn-outline-primary w-100" for="option">We have cybersecurity insurance coverage</label>
							</div>
							<!-- Feed poll item -->
							<div>
								<input type="radio" class="btn-check" name="poll" id="option2">
								<label class="btn btn-outline-primary w-100" for="option2">Our dedicated staff will protect us</label>
							</div>
							<!-- Feed poll item -->
							<div>
								<input type="radio" class="btn-check" name="poll" id="option3">
								<label class="btn btn-outline-primary w-100" for="option3">We give regular training for best practices</label>
							</div>
							<!-- Feed poll item -->
							<div>
								<input type="radio" class="btn-check" name="poll" id="option4">
								<label class="btn btn-outline-primary w-100" for="option4">Third-party vendor protection</label>
							</div>
					 </div> 

					 <!-- Feed poll votes START -->
						<ul class="nav nav-divider mt-2 mb-0">
							<li class="nav-item">
								<a class="nav-link" href="#">263 votes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">2d left</a>
							</li>
						</ul>
						<!-- Feed poll votes ED -->

						<!-- Feed react START -->
						<ul class="nav nav-stack pb-2 small mt-4">
							<li class="nav-item">
								<a class="nav-link active text-secondary" href="#!"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> Louis, Billy and 126 others </a>
							</li>
							<li class="nav-item ms-sm-auto">
								<a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
							</li>
						</ul>
						<!-- Feed react END -->
					</div>
					<!-- Card body END -->
					<!-- Card Footer START -->
					<div class="card-footer py-3">
						<!-- Feed react START -->
						<ul class="nav nav-fill nav-stack small">
							<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked (56)</a>
							</li>
							<!-- Card share action dropdown START -->
							<li class="nav-item dropdown">
								<a href="#" class="nav-link mb-0" id="feedActionShare6" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare6">
									<li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
								</ul>
							</li>
							<!-- Card share action dropdown END -->
							<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>
							</li>
						</ul>
						<!-- Feed react END -->
					</div>
					<!-- Card Footer END -->
				</div>
				<!-- Card feed item END -->

				<!-- Card feed item START -->
				<div class="card">
					<!-- Card header START -->
					<div class="card-header border-0 pb-0">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#"> <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""> </a>
								</div>
								<!-- Title -->
								<div>
									<h6 class="card-title mb-0"> <a href="#!"> All in the Mind </a></h6>
									<p class="mb-0 small">9 November at 23:29</p>
								</div>
							</div>
							<!-- Card share action menu -->
							<a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardShareAction10" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-three-dots"></i>
							</a>
							<!-- Card share action dropdown menu -->
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction10">
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
						<p>How do you protect your business against cyber-crime?</p>
						<div class="card card-body mt-4">
							<!-- Title -->
							<div class="d-sm-flex justify-content-sm-between align-items-center">
								<span class="small">16/20 responded</span>
								<span class="small">Results not visible to participants</span>
							</div>

							<!-- Results -->
							<div class="vstack gap-4 gap-sm-3 mt-3">
								<!-- Option 1 result START -->
								<div class="d-flex align-items-center justify-content-between">
									<!-- Progress bar -->
									<div class="overflow-hidden w-100 me-3">
										<div class="progress bg-primary bg-opacity-10 position-relative" style="height: 30px;">
											<div class="progress-bar bg-primary bg-opacity-25" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
											</div>
											<span class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">We have cybersecurity insurance coverage </span>
										</div>
									</div>
									<div class="flex-shrink-0">25%</div>
								</div>
								<!-- Option 1 result END -->

								<!-- Option 2 result START -->
								<div class="d-flex align-items-center justify-content-between">
									<!-- Progress bar -->
									<div class="overflow-hidden w-100 me-3">
										<div class="progress bg-primary bg-opacity-10 position-relative" style="height: 30px;">
											<div class="progress-bar bg-primary bg-opacity-25" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
											</div>
											<span class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">Our dedicated staff will protect us</span>
										</div>
									</div>
									<div class="flex-shrink-0">15%</div>
								</div>
								<!-- Option 2 result END -->

								<!-- Option 3 result START -->
								<div class="d-flex align-items-center justify-content-between">
									<!-- Progress bar -->
									<div class="overflow-hidden w-100 me-3">
										<div class="progress bg-primary bg-opacity-10 position-relative" style="height: 30px;">
											<div class="progress-bar bg-primary bg-opacity-25" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
											</div>
											<span class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">We give regular training for best practices</span>
										</div>
									</div>
									<div class="flex-shrink-0">10%</div>
								</div>
								<!-- Option 3 result END -->

								<!-- Option 4 result START -->
								<div class="d-flex align-items-center justify-content-between">
									<!-- Progress bar -->
									<div class="overflow-hidden w-100 me-3">
										<div class="progress bg-primary bg-opacity-10 position-relative" style="height: 30px;">
											<div class="progress-bar bg-primary bg-opacity-25" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
											</div>
											<span class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">Third-party vendor protection</span>
										</div>
									</div>
									<div class="flex-shrink-0">55%</div>
								</div>
								<!-- Option 4 result END -->
							</div>
						</div>

						<!-- Feed poll votes START -->
						<ul class="nav nav-divider mt-2 mb-0">
							<li class="nav-item">
								<a class="nav-link" href="#">263 votes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">2d left</a>
							</li>
						</ul>
						<!-- Feed poll votes ED -->

						<!-- Feed react START -->
						<ul class="nav nav-stack pb-2 small mt-4">
							<li class="nav-item">
								<a class="nav-link active text-secondary" href="#!"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> Louis, Billy and 126 others </a>
							</li>
							<li class="nav-item ms-sm-auto">
								<a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
							</li>
						</ul>
						<!-- Feed react END -->
					</div>
					<!-- Card body END -->
					<!-- Card Footer START -->
					<div class="card-footer py-3">
						<!-- Feed react START -->
						<ul class="nav nav-fill nav-stack small">
							<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked (56)</a>
							</li>
							<!-- Card share action dropdown START -->
							<li class="nav-item dropdown">
								<a href="#" class="nav-link mb-0" id="feedActionShare8" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare8">
									<li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
								</ul>
							</li>
							<!-- Card share action dropdown END -->
							<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>
							</li>
						</ul>
						<!-- Feed react END -->
					</div>
					<!-- Card Footer END -->
				</div>
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
										<a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/{{$user->profileImage}}" alt=""></a>
									</div>
									<!-- Title -->
									<div class="overflow-hidden">
										<a class="h6 mb-0" href="#!">{{$user->name}} </a>
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
								<div class="d-grid mt-3">
									<a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
								</div>
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
			<!-- Search contact START -->
			<form class="rounded position-relative">
				<input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
				<button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
			</form>
			<!-- Search contact END -->
			<ul class="list-unstyled">

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Frances Guerrero </a>
						<div class="small text-secondary text-truncate">Frances sent a photo.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> Just now </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast2">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Lori Ferguson </a>
						<div class="small text-secondary text-truncate">You missed a call form Carolyn🤙</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-offline">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/placeholder.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Samuel Bishop </a>
						<div class="small text-secondary text-truncate">Day sweetness why cordially 😊</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 2min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Dennis Barrett </a>
						<div class="small text-secondary text-truncate">Happy birthday🎂</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 10min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar avatar-story status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Judy Nguyen </a>
						<div class="small text-secondary text-truncate">Thank you!</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 2hrs </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Carolyn Ortiz </a>
						<div class="small text-secondary text-truncate">Greetings from Webestica.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="flex-shrink-0 avatar">
						<ul class="avatar-group avatar-group-four">
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
							</li>
						</ul>
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link text-truncate d-inline-block" href="#!">Frances, Lori, Amanda, Lawson </a>
						<div class="small text-secondary text-truncate">Btw are you looking for job change?</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 4 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-offline">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Bryan Knight </a>
						<div class="small text-secondary text-truncate">if you are available to discuss🙄</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 6 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Louis Crawford </a>
						<div class="small text-secondary text-truncate">🙌Congrats on your work anniversary!</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Jacqueline Miller </a>
						<div class="small text-secondary text-truncate">No sorry, Thanks.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 15, dec </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Amanda Reed </a>
						<div class="small text-secondary text-truncate">Interested can share CV at.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 18, dec </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Larry Lawson </a>
						<div class="small text-secondary text-truncate">Hope you're doing well and Safe.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 20, dec </div>
				</li>
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
			<div id="chatToast" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
				<div class="toast-header bg-mode">
					<!-- Top avatar and status START -->
					<div class="d-flex justify-content-between align-items-center w-100">
						<div class="d-flex">
							<div class="flex-shrink-0 avatar me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0 mt-1">Frances Guerrero</h6>
								<div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
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
					<div class="chat-conversation-content custom-scrollbar h-200px">
						<!-- Chat time -->
						<div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="">
							</div>
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
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
										<!-- Files START -->
										<!-- Files END -->
										<div class="small my-2">12:16 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
										<div class="small my-2">3:22 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
									<!-- Images -->
									<div class="d-flex my-2">
										<div class="small text-secondary">5:35 PM</div>
										<div class="small ms-2"><i class="fa-solid fa-check"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat time -->
						<div class="text-center small my-2">2 New Messages</div>
						<!-- Chat Typing -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-3 rounded-2">
											<div class="typing d-flex align-items-center">
												<div class="dot"></div>
												<div class="dot"></div>
												<div class="dot"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Chat conversation END -->
					<!-- Chat bottom START -->
					<div class="mt-2">
						<!-- Chat textarea -->
						<textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
						<!-- Button -->
						<div class="d-sm-flex align-items-end mt-2">
							<button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
							<button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
							<button class="btn btn-sm btn-success-soft me-2"> Gif </button>
							<button class="btn btn-sm btn-primary ms-auto"> Send </button>
						</div>
					</div>
					<!-- Chat bottom START -->
				</div>
			</div>
			<!-- Chat toast END -->

			<!-- Chat toast 2 START -->
			<div id="chatToast2" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
				<div class="toast-header bg-mode">
					<!-- Top avatar and status START -->
					<div class="d-flex justify-content-between align-items-center w-100">
						<div class="d-flex">
							<div class="flex-shrink-0 avatar me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/02.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0 mt-1">Lori Ferguson</h6>
								<div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
							</div>
						</div>
						<div class="d-flex">
						<!-- Call button -->
						<div class="dropdown">
							<a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown2" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>               
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown2">
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
						<a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat2" role="button" aria-expanded="false" aria-controls="collapseChat2"><i class="bi bi-dash-lg"></i></a>        
						<button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
					</div>
				</div>
				<!-- Top avatar and status END -->
					
				</div>
				<div class="toast-body collapse show" id="collapseChat2">
					<!-- Chat conversation START -->
					<div class="chat-conversation-content custom-scrollbar h-200px">
						<!-- Chat time -->
						<div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/02.jpg')}}" alt="">
							</div>
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
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/02.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
										<!-- Files START -->
										<!-- Files END -->
										<div class="small my-2">12:16 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/02.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
										<div class="small my-2">3:22 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
									<!-- Images -->
									<div class="d-flex my-2">
										<div class="small text-secondary">5:35 PM</div>
										<div class="small ms-2"><i class="fa-solid fa-check"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat time -->
						<div class="text-center small my-2">2 New Messages</div>
						<!-- Chat Typing -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/02.jpg')}}" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-3 rounded-2">
											<div class="typing d-flex align-items-center">
												<div class="dot"></div>
												<div class="dot"></div>
												<div class="dot"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Chat conversation END -->
					<!-- Chat bottom START -->
					<div class="mt-2">
						<!-- Chat textarea -->
						<textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
						<!-- Button -->
						<div class="d-sm-flex align-items-end mt-2">
							<button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
							<button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
							<button class="btn btn-sm btn-success-soft me-2"> Gif </button>
							<button class="btn btn-sm btn-primary ms-auto"> Send </button>
						</div>
					</div>
					<!-- Chat bottom START -->
				</div>
			</div>
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
						<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/'.$profileimage)}}" alt="">
					</div>
					<!-- Feed box  -->
					<form class="w-100">
						<textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus></textarea>
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
					<select class="form-select js-choice choice-select-text-none" data-position="top" data-search-enabled="false">
						<option value="PB">Public</option>
						<option value="PV">Friends</option>
						<option value="PV">Only me</option>
						<option value="PV">Custom</option>
					</select>
				<!-- Button -->
				</div>
				<div class="col-lg-8 text-sm-end">
					<button type="button" class="btn btn-danger-soft me-2"> <i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
					<button type="button" class="btn btn-success-soft">Post</button>
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
						<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/'.$profileimage)}}" alt="">
					</div>
					<!-- Feed box  -->
					<form class="w-100">
						<textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
					</form>
				</div>

				<!-- Dropzone photo START -->
				<div>
					<label class="form-label">Upload attachment</label>
					<div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
						<div class="dz-message">
							<i class="bi bi-images display-3"></i>
							<p>Drag here or click to upload photo.</p>
						</div>
					</div>
				</div>
				<!-- Dropzone photo END -->

				</div>
				<!-- Modal feed body END -->

				<!-- Modal feed footer -->
				<div class="modal-footer ">
					<!-- Button -->
						<button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-success-soft">Post</button>
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
					<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/'.$profileimage)}}" alt="">
				</div>
				<!-- Feed box  -->
				<form class="w-100">
					<textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
				</form>
			</div>

			<!-- Dropzone photo START -->
			<div>
				<label class="form-label">Upload attachment</label>
				<div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
					<div class="dz-message">
						<i class="bi bi-camera-reels display-3"></i>
								<p>Drag here or click to upload video.</p>
					</div>
				</div>
			</div>
			<!-- Dropzone photo END -->

		</div>
			<!-- Modal feed body END -->

			<!-- Modal feed footer -->
			<div class="modal-footer">
				<!-- Button -->
				<button type="button" class="btn btn-danger-soft me-2"><i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
				<button type="button" class="btn btn-success-soft">Post</button>
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

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="assets/vendor/tiny-slider/dist/tiny-slider.js"></script>
<script src="assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js"></script>
<script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/vendor/glightbox-master/dist/js/glightbox.min.js"></script>
<script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/vendor/plyr/plyr.js"></script>
<script src="assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
<script src="assets/vendor/zuck.js/dist/zuck.min.js"></script>
<script src="assets/js/zuck-stories.js"></script>

<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>


</body>

<!-- Mirrored from social.webestica.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:39:56 GMT -->
</html>
