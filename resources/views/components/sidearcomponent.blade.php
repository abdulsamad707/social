<div class="offcanvas-body d-block px-2 px-lg-0">
    <!-- Card START -->
    <div class="card overflow-hidden">
      <!-- Cover image -->
      <div class="h-50px" style="background-image:url('{{$coverphoto}}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
        <!-- Card body START -->
        <div class="card-body pt-0">
          <div class="text-center">
          <!-- Avatar -->
          <div class="avatar avatar-lg mt-n5 mb-3">
            <a href="{{asset('assets/images/profilepic/'.Auth::user()->name.'/'.$profileimage)}}" data-gallery="image-popup" data-glightbox=""><img class="avatar-img rounded border border-white border-3" src="assets/images/profilepic/{{Auth::user()->name}}/{{$profileimage}}" alt=""></a>
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
            <a class="nav-link" href="{{url('user_profile_connections')}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/person-outline-filled.svg" alt=""><span>Connections </span></a>
          </li>
     
          <li class="nav-item">
            <a class="nav-link" href="{{url('events')}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/calendar-outline-filled.svg" alt=""><span>Events </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('groups')}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/chat-outline-filled.svg" alt=""><span>Groups </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('notifications')}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/notification-outlined-filled.svg" alt=""><span>Notifications </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('settings')}}"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/cog-outline-filled.svg" alt=""><span>Settings </span></a>
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