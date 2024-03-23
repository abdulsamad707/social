<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from social.webestica.com/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:40:44 GMT -->
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
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/dropzone/dist/dropzone.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/dist/flatpickr.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	 
</head>

<body>

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
            <x-sidearcomponent></x-sidearcomponent>
          </div>
        </nav>
        <!-- Navbar END-->
      </div>
      <!-- Sidenav END -->

      <!-- Main content START -->
      <div class="col-md-8 col-lg-6 vstack gap-4">

        <!-- Event alert START -->
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
          <strong>Upcoming event:</strong> The learning conference on Sep 19 2022
          <a href="event-details.html" class="btn btn-xs btn-success mt-2 mt-md-0 ms-md-4">View event</a>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- Event alert END -->

          <!-- Card START -->
          <div class="card h-100">
            <!-- Card header START -->
            <div class="card-header d-sm-flex align-items-center text-center justify-content-sm-between border-0 pb-0">
              <h1 class="h4 card-title">Discover Events</h1>
              <!-- Button modal -->
              <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="fa-solid fa-plus pe-1"></i> Create event</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">

              <!-- Tab nav line -->
              <ul class="nav nav-tabs nav-bottom-line justify-content-center justify-content-md-start">
                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tab-1"> Top </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-2"> Local </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-3"> This week </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-4"> Online </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-5"> Friends </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-6"> Following </a> </li>
              </ul>
              <!-- Tab content START -->
              <div class="tab-content mb-0 pb-0">
                
                <!-- Event top tab START -->
                <div class="tab-pane fade show active" id="tab-1">
                  <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/01.jpg" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            Online
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Spa training </a>
                          <h6 class="mt-3"> <a href="event-details.html"> Bone thugs-n-harmony </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Mon, Sep 25, 2020 at 9:30 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> San francisco </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+78</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested1">
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested1"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/02.jpg" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            Hotel
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Photography Workshop</a>
                          <h6 class="mt-3"> <a href="event-details.html"> Decibel magazine </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Mon, Aug 10, 2022 at 9:30 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+34</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested2" checked>
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested2"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare2">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/03.jpg" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            Online
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Conference</a>
                          <h6 class="mt-3"> <a href="event-details.html"> Illenium: fallen embers tour </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Sun, Sep 23, 2022 at 12:00 PM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Mumbai </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+65</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested3">
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested3"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare3" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare3">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                    <!-- Event item END -->
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/04.jpg" alt="">
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Live show</a>
                          <h6 class="mt-3"> <a href="event-details.html"> Comedy on the green </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Fri, Oct 05, 2022 at 1:00 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Miami </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+56</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested4" checked>
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested4"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare4" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare4">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/05.jpg" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            Beach
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Meeting</a>
                          <h6 class="mt-3"> <a href="event-details.html"> Beach event </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Wen, Dec 16, 2022 at 5:00 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+36</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested5">
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested5"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare5" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare5">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                  </div>
                </div>
                <!-- Event top tab END -->

                <!-- Event local tab START -->
                <div class="tab-pane fade" id="tab-2">
                  <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/04.jpg" alt="">
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Live show</a>
                          <h6 class="mt-3"> <a href="event-details.html"> America 50th anniversary </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Fri, Oct 05, 2022 at 1:00 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Miami </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+20</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested6" checked>
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested6"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare6" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare6">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/05.jpg" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            Beach
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Meeting</a>
                          <h6 class="mt-3"> <a href="event-details.html"> Back to abnormal </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Wen, Dec 16, 2022 at 5:00 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+45</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested7">
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested7"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare7" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare7">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                  </div>
                </div>
                <!-- Event local tab END -->

                <!-- Event This week tab START -->
                <div class="tab-pane fade" id="tab-3">
                  <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/03.jpg" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            Beach
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Meeting</a>
                          <h6 class="mt-3"> <a href="event-details.html"> Old dominion </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Wen, Dec 16, 2022 at 5:00 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+85</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested8">
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested8"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare8" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare8">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                  </div>
                </div>
                <!-- Event This week tab END -->

                <!-- Event Online tab START -->
                <div class="tab-pane fade" id="tab-4">
                  <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/01.jpg" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            Online
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Spa training </a>
                          <h6 class="mt-3"> <a href="event-details.html"> Beach event </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Mon, Sep 25, 2020 at 9:30 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> San francisco </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+46</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested9" checked>
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested9"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare9" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare9">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="assets/images/events/04.jpg" alt="">
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Live show</a>
                          <h6 class="mt-3"> <a href="event-details.html"> Lewis black tickets </a> </h6>
                          <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> Fri, Oct 05, 2022 at 1:00 AM </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Miami </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+75</span></div>
                            </li>
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                          </ul>
                          <!-- Avatar group END -->
                          <!-- Button -->
                          <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                              <input type="checkbox" class="btn-check d-block" id="Interested10">
                              <label class="btn btn-sm btn-outline-success d-block" for="Interested10"><i class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                            <div class="dropdown ms-3">
                              <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare10" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share-fill"></i>
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare10">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-1"></i> Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-1"></i> Share to News Feed </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-1"></i> Share to a group</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-1"></i> Share post via …</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person fa-fw pe-1"></i> Share on a friend's profile</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div>
                  </div>
                </div>
                <!-- Event Online tab END -->

                <!-- Event Friends tab START -->
                <div class="tab-pane fade text-center" id="tab-5">
                  <!-- Add events -->
                  <div class="my-sm-5 py-sm-5">
                    <i class="display-1 text-body-secondary bi bi-calendar2-event"> </i>
                    <h4 class="mt-2 mb-3 text-body">No events found</h4>
                    <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> Click here to add </button>
                  </div>
                </div>
                <!-- Event Friends tab END -->

                <!-- Event Following tab START -->
                <div class="tab-pane fade text-center" id="tab-6">
                  <!-- Add events -->
                  <div class="my-sm-5 py-sm-5">
                    <i class="display-1 text-body-secondary bi bi-calendar2-event"> </i>
                    <h4 class="mt-2 mb-3 text-body">No events found</h4>
                    <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> Click here to add </button>
                  </div>
                </div>
                <!-- Event Following tab END -->
            </div>
            <!-- Tab content END -->
          </div>
          <!-- Card body END -->
        </div>
        <!-- Card END -->
      </div>

    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Modal create events START -->
<div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateEvents" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal feed header START -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelCreateEvents">Create event</h5>
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
            <input type="text" class="form-control" placeholder="Event name here">
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
            <input type="text" class="form-control" placeholder="1hr 23m">
          </div>
          <!-- Location -->
          <div class="col-12">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" placeholder="Logansport, IN 46947">
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
                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
              </li>
              <li class="ms-3">
                <small> +50 </small>
              </li>
            </ul>
          </div>
          <!-- Dropzone photo START -->
          <div class="mb-3">
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

<script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>

<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>

</body>

<!-- Mirrored from social.webestica.com/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:40:44 GMT -->
</html>