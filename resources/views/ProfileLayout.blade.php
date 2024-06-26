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
            <div class="h-200px rounded-top" style="background-image:url('{{$coverphoto}}'); background-position: center; background-size: cover; background-repeat: no-repeat;">
            </div>
              <!-- Card body START -->
              <div class="card-body py-0">
                <div class="d-sm-flex align-items-start text-center text-sm-start">
                  <div>
                    <!-- Avatar -->
                    <div class="avatar avatar-xxl mt-n5 mb-3">
                      <a href="{{asset('assets/images/profilepic/'.$user_name.'/'.$profileimage)}}"  data-gallery="image-popup" data-glightbox="">
                      <img class="avatar-img rounded-circle border border-white border-3" src="{{asset('assets/images/profilepic/'.$user_name."/".$profileimage)}}" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="ms-sm-4 mt-sm-3">
                    <!-- Info -->
                    <h1 class="mb-0 h5">{{$user_name}} 
                     
                      <i class="bi bi-patch-check-fill text-success small"></i>
                  
                    </h1>
                    <p> {{$my_friend_count}} Connection</p>
                  </div>
                  <!-- Button -->
                  <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                    @if($user_id!=Auth::user()->id &&  $user_id!=null)
                    @if(!in_array(Auth::user()->id,$my_friend_array_id)   )
                    <a class="btn btn-primary-soft me-2" href="{{url('addfriend/'.$user_id)}}" > <i class="bi bi-patch-plus pe-1"></i> Add Friend </a>
                    @else
                    <a class="btn btn-danger-soft me-2" href="{{url('unfriend/'.$user_id)}}">  Unfriend </a>
                    @endif
                    @else
                    <a class="btn btn-primary-soft me-2" href="{{url('settings/')}}" > <i class="bi bi-pencil-fill pe-1"></i> Edit Profile </a>
                    @endif
                 
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
                  @if(request()->path()=="user_profile/".$user_id   || request()->path()=="user_profile"  )
                  <li class="nav-item"> <a class="nav-link active" href="{{url('user_profile/'.$user_id)}}"> Posts </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_about/'.$user_id)}}"> About </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_connections/'.$user_id)}}"> Connections <span class="badge bg-success bg-opacity-10 text-success small">{{$my_friend_count}}</span> </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_Video/'.$user_id)}}">Media</a> </li>
            
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_event/'.$user_id)}}"> Events</a> </li>
                  @elseif(request()->path()=="user_profile_about/".$user_id || request()->path()=="user_profile_about" )
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile/'.$user_id)}}"> Posts </a> </li>
                  <li class="nav-item"> <a class="nav-link active" href="{{url('user_profile_about/'.$user_id)}}"> About </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_connections/'.$user_id)}}"> Connections <span class="badge bg-success bg-opacity-10 text-success small">{{$my_friend_count}}</span> </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_Video/'.$user_id)}}">Media</a> </li>
            
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_event/'.$user_id)}}"> Events</a> </li>
                  @elseif(request()->path()=="user_profile_connections/".$user_id ||request()->path()=="user_profile_connections")
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile/'.$user_id)}}"> Posts </a> </li>
                  <li class="nav-item"> <a class="nav-link " href="{{url('user_profile_about/'.$user_id)}}"> About </a> </li>


                  <li class="nav-item"> <a class="nav-link active" href="{{url('user_profile_connections/'.$user_id)}}"> Connections <span class="badge bg-success bg-opacity-10 text-success small">{{$my_friend_count}}</span> </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_Video/'.$user_id)}}">Media</a> </li>
            
                  <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_event/'.$user_id)}}"> Events</a> </li>
                @elseif(request()->path()=="user_profile_Video/".$user_id||request()->path()=="user_profile_Video")
                <li class="nav-item"> <a class="nav-link" href="{{url('user_profile/'.$user_id)}}"> Posts </a> </li>
                <li class="nav-item"> <a class="nav-link " href="{{url('user_profile_about/'.$user_id)}}"> About </a> </li>


                <li class="nav-item"> <a class="nav-link " href="{{url('user_profile_connections/'.$user_id)}}"> Connections <span class="badge bg-success bg-opacity-10 text-success small">{{$my_friend_count}}</span> </a> </li>
                <li class="nav-item"> <a class="nav-link active" href="{{url('user_profile_Video/'.$user_id)}}"> Media</a> </li>
          
                <li class="nav-item"> <a class="nav-link" href="{{url('user_profile_event/'.$user_id)}}"> Events</a> </li>
                @elseif(request()->path()=="user_profile_event/".$user_id ||request()->path()=="user_profile_event" )
                <li class="nav-item"> <a class="nav-link" href="{{url('user_profile/'.$user_id)}}"> Posts </a> </li>
                <li class="nav-item"> <a class="nav-link " href="{{url('user_profile_about/'.$user_id)}}"> About </a> </li>


                <li class="nav-item"> <a class="nav-link " href="{{url('user_profile_connections/'.$user_id)}}"> Connections <span class="badge bg-success bg-opacity-10 text-success small">{{$my_friend_count}}</span> </a> </li>
                <li class="nav-item"> <a class="nav-link " href="{{url('user_profile_Video/'.$user_id)}}">Media</a> </li>
          
                <li class="nav-item"> <a class="nav-link active" href="{{url('user_profile_event/'.$user_id)}}"> Events</a> </li>
                  @endif
                </ul>
              </div>
            </div>
            <!-- My profile END -->
  
            <!-- Share feed START -->
            
            <!-- Share feed END -->
            @section("pageContainer")
            @show  
          </div>
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
                  <h5 class="card-title">Pages

                    @if($user_id==null || $user_id==Auth::user()->id)
                    <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalCreatePage">
                       <i class="fa-solid fa-plus pe-1"></i> Create Page</a>
                      @endif
                  </h5>
             
                </div>
                <!-- Card header END -->
                <!-- Card body START -->
                <div class="card-body position-relative pt-0">
                  <!-- Experience item START -->
                  @if(count($user_pages) > 0)
                  @foreach($user_pages as $user_page)
                  <div class="d-flex">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                      <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('assets/images/logo/'.$user_page->page_logo)}}" alt=""> </a>
                    </div>
                    <!-- Info -->
                    <div>
                      <h6 class="card-title mb-0"><a href="#!"> {{$user_page->page_name}} </a></h6>
                      
                    </div>
                  </div>
                  <!-- Experience item END -->
                  @endforeach
                  @else
                  <p class="text-center">No Page</p>
                  @endif
                  <!-- Experience item START -->
              
                  <!-- Experience item END -->
  
                  <!-- Experience item START -->
                
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
               
                  <h5 class="card-title"> Photos <span class="badge bg-danger bg-opacity-10 text-danger">{{count($user_photos)}}</span>
                  
                  
                  
                    @if($user_id==null || $user_id==Auth::user()->id)
                    <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalCreatePhotos">
                       <i class="fa-solid fa-plus pe-1"></i> Create album</a>
                      @endif
                  
                  </h5>
                 
                </div>
                <!-- Card header END -->
                <!-- Card body START -->
                <div class="card-body position-relative pt-0">
                  @if(count($user_photos)>0)
                  <div class="row g-2">
                    <!-- Photos item -->
               
                    <!-- Photos item -->
              
                    <!-- Photos item -->
                
                    <!-- Photos item -->
                    
                    @foreach($user_photos as $user_photo)
                    <div class="col-6">
                      <a href="{{asset('assets/images/albums/'.$user_name.'/'.$user_photo->photos)}}" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="{{asset('assets/images/albums/'.$user_name.'/'.$user_photo->photos)}}" alt="">
                      </a>
                    </div>
                    @endforeach
                  
              
                    <!-- Photos item -->
               
                  </div>
                  @else
                <p class="text-center">  No Photo</p>
                  @endif
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
                
                </div>
                <!-- Card header END -->
                <!-- Card body START -->
                <div class="card-body position-relative pt-0">
                  <div class="row g-3">
                    @if($my_friend_count > 0)
                 @foreach($my_friend_data as $friend )
                    <div class="col-6">
                      <!-- Friends item START -->
                      <div class="card shadow-none text-center h-100">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                          <div class="avatar avatar-story avatar-xl">
                            @if(count($friend->user_detail)>0)
                            <a href="{{url('user_profile/'.$friend->id)}}"><img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.$friend->name."/".$friend->user_detail[0]->profileImage)}}" alt=""></a>
                            @else
                            <a href="{{url('user_profile/'.$friend->id)}}"><img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt=""></a>
                            @endif
                          </div>
                          <h6 class="card-title mb-1 mt-3"> <a href="{{url('user_profile/'.$friend->id)}}"> {{$friend->name}} </a></h6>
                          <p class="mb-0 small lh-sm">{{$friend->mutual_friends_count}} Mutual Connection</p>
                        </div>
                     
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                         @if($user_id==null)
                          <a class="btn btn-sm btn-danger" href="{{url('unfriend/'.$friend->id)}}"> <i class="bi bi-person-x"></i> </a>
                          @endif
                        </div>
                      </div>
                      <!-- Friends item END -->
                    </div>
                      @endforeach               
                    @else
                   <p class="text-center"> No Friend</p>
                    @endif
              
  
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
  <div class="modal fade" id="modalCreatePhotos" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabelCreateAlbum">Create Photo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form START -->
          <form  method="POST" action="{{url('userphoto')}}" enctype='multipart/form-data'>
            <!-- Album name -->
       @csrf
            <!-- Select audience -->
          </div>
            <!-- Upload Photos or Videos -->
            <div class="mb-3">
              <!-- Dropzone photo START -->
              <label class="form-label">Upload Photos </label>
        
              <!-- Dropzone photo END -->
      <input type="file" name="userphoto">
          
          <!-- Form END -->
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success-soft">Create now</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalCreatePage" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabelCreateAlbum">Create Page</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form START -->
          <form  method="POST" action="{{url('userpage')}}" enctype='multipart/form-data'>
            <!-- Album name -->
       @csrf
            <!-- Select audience -->
          </div>
            <!-- Upload Photos or Videos -->
            <div class="mb-3">
              <!-- Dropzone photo START -->
              <label class="form-label">Page Logo </label>
        
              <!-- Dropzone photo END -->
      <input type="file" name="page_logo" class="form-control">
      <label class="form-label">Page Name </label>
        
      <!-- Dropzone photo END -->
<input type="text" name="page_name" class="form-control">
          <!-- Form END -->
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success-soft">Create now</button>
        </div>
      </form>
      </div>
    </div>
  </div>

@include("LayoutFooter")