@include("Layout")
<x-HeaderSocial/>

<main>
  
    <!-- Container START -->
    <div class="container">
      <div class="row g-4">
  
        <!-- Main content START -->
        <div class="col-lg-8 vstack gap-4">
          <!-- My profile START -->
          <div class="card">
            <!-- Cover image -->
            <div class="h-200px rounded-top" style="background-image:url({{asset('assets/images/bg/05.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
              <!-- Card body START -->
              <div class="card-body py-0">
                <div class="d-sm-flex align-items-start text-center text-sm-start">
                  <div>
                    <!-- Avatar -->
                    <div class="avatar avatar-xxl mt-n5 mb-3">
                      <img class="avatar-img rounded-circle border border-white border-3" src="{{asset('assets/images/avatar/'.$profileimage)}}" alt="">
                    </div>
                  </div>
                  <div class="ms-sm-4 mt-sm-3">
                    <!-- Info -->
                    <h1 class="mb-0 h5">{{$user_name}} <i class="bi bi-patch-check-fill text-success small"></i></h1>
                    <p> {{$my_friend_count}} Connection</p>
                  </div>
                  <!-- Button -->
                  <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                    <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i> Edit profile </button>
                    <div class="dropdown">
                      <!-- Card share action menu -->
                      <button class="icon-md btn btn-light" type="button" id="profileAction2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </button>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- List profile -->
                <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                  <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> {{$job_title}}</li>
              
                  <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on {{$user_join_date}}</li>
                </ul>
              </div>
              <!-- Card body END -->
              <div class="card-footer mt-3 pt-2 pb-0">
                <!-- Nav profile pages -->
                <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                  <li class="nav-item"> <a class="nav-link active" href="my-profile.html"> Posts </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="my-profile-about.html"> About </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="my-profile-connections.html"> Connections <span class="badge bg-success bg-opacity-10 text-success small">{{$my_friend_count}}</span> </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>
                </ul>
              </div>
            </div>
            <!-- My profile END -->
  
            <!-- Share feed START -->
            
            <!-- Share feed END -->
            @section("pageContainer")
            @show  
            <!-- Card feed item START -->
         
            <!-- Card feed item END -->
  
            <!-- Card feed item START -->
         
        <!-- Main content END -->
  
        <!-- Right sidebar START -->
        <div class="col-lg-4">
  
          <div class="row g-4">
  
            <!-- Card START -->
            <div class="col-md-6 col-lg-12">
              <div class="card">
                <div class="card-header border-0 pb-0">
                  <h5 class="card-title">About</h5>
                  <!-- Button modal -->
                </div>
                <!-- Card body START -->
                <div class="card-body position-relative pt-0">
                  <p>{{$bio}}</p>
                  <!-- Date time -->
                  <ul class="list-unstyled mt-3 mb-0">
                    <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong> {{$dateofbirth}}  </strong> </li>

                    <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> {{$user_email}} </strong> </li>
                  </ul>
                </div>
                <!-- Card body END -->
              </div>
            </div>
            <!-- Card END -->
  
            <!-- Card START -->
            <div class="col-md-6 col-lg-12">
              <div class="card">
                <!-- Card header START -->
                <div class="card-header d-flex justify-content-between border-0">
                  <h5 class="card-title">Experience</h5>
                  <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i> </a>
                </div>
                <!-- Card header END -->
                <!-- Card body START -->
                <div class="card-body position-relative pt-0">
                  <!-- Experience item START -->
                  <div class="d-flex">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                      <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/logo/08.svg" alt=""> </a>
                    </div>
                    <!-- Info -->
                    <div>
                      <h6 class="card-title mb-0"><a href="#!"> Apple Computer, Inc. </a></h6>
                      <p class="small">May 2015 – Present Employment Duration 8 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                    </div>
                  </div>
                  <!-- Experience item END -->
  
                  <!-- Experience item START -->
                  <div class="d-flex">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                      <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/logo/09.svg" alt=""> </a>
                    </div>
                    <!-- Info -->
                    <div>
                      <h6 class="card-title mb-0"><a href="#!"> Microsoft Corporation </a></h6>
                      <p class="small">May 2017 – Present Employment Duration 1 yrs 5 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                    </div>
                  </div>
                  <!-- Experience item END -->
  
                  <!-- Experience item START -->
                  <div class="d-flex">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                      <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/logo/10.svg" alt=""> </a>
                    </div>
                    <!-- Info -->
                    <div>
                      <h6 class="card-title mb-0"><a href="#!"> Tata Consultancy Services. </a></h6>
                      <p class="small mb-0">May 2022 – Present Employment Duration 6 yrs 10 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                    </div>
                  </div>
                  <!-- Experience item END -->
  
                </div>
                <!-- Card body END -->
              </div>
            </div>
            <!-- Card END -->
            
            <!-- Card START -->
            <div class="col-md-6 col-lg-12">
              <div class="card">
                <!-- Card header START -->
                <div class="card-header d-sm-flex justify-content-between border-0">
                  <h5 class="card-title">Photos</h5>
                  <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
                </div>
                <!-- Card header END -->
                <!-- Card body START -->
                <div class="card-body position-relative pt-0">
                  <div class="row g-2">
                    <!-- Photos item -->
                    <div class="col-6">
                      <a href="assets/images/albums/01.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/01.jpg" alt="">
                      </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-6">
                      <a href="assets/images/albums/02.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/02.jpg" alt="">
                      </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-4">
                      <a href="assets/images/albums/03.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/03.jpg" alt="">
                      </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-4">
                      <a href="assets/images/albums/04.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/04.jpg" alt="">
                      </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-4">
                      <a href="assets/images/albums/05.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/05.jpg" alt="">
                      </a>
                      <!-- glightbox Albums left bar END  -->
                    </div>
                  </div>
                </div>
                <!-- Card body END -->
              </div>
            </div>
            <!-- Card END -->
  
            <!-- Card START -->
            <div class="col-md-6 col-lg-12">
              <div class="card">
                <!-- Card header START -->
                <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                  <h5 class="card-title">Friends <span class="badge bg-danger bg-opacity-10 text-danger">{{$my_friend_count}}</span></h5>
                  <a class="btn btn-primary-soft btn-sm" href="#!"> See all friends</a>
                </div>
                <!-- Card header END -->
                <!-- Card body START -->
                <div class="card-body position-relative pt-0">
                  <div class="row g-3">
                 @foreach($my_friend_data as $friend )
                    <div class="col-6">
                      <!-- Friends item START -->
                      <div class="card shadow-none text-center h-100">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                          <div class="avatar avatar-story avatar-xl">
                            @if(count($friend->user_detail)>0)
                            <a href="{{url('user_profile/'.$friend->id)}}"><img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/'.$friend->user_detail[0]->profileImage)}}" alt=""></a>
                            @else
                            <a href="{{url('user_profile/'.$friend->id)}}"><img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt=""></a>
                            @endif
                          </div>
                          <h6 class="card-title mb-1 mt-3"> <a href="{{url('user_profile/'.$friend->id)}}"> {{$friend->name}} </a></h6>
                          <p class="mb-0 small lh-sm">{{$friend->mutual_friends_count}} Mutual Connection</p>
                        </div>
                     
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                          <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                          <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                        </div>
                      </div>
                      <!-- Friends item END -->
                    </div>
                      @endforeach               
  
              
  
                  </div>
                </div>
                <!-- Card body END -->
              </div>
            </div>
            <!-- Card END -->
          </div>
  
        </div>
        <!-- Right sidebar END -->
  
      </div> <!-- Row END -->
    </div>
    <!-- Container END -->
  
  </main>


@include("LayoutFooter")