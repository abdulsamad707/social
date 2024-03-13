
@extends('ProfileLayout')
@section("pageContainer")
<div class="card">
    <!-- Card header START -->
    <div class="card-header d-sm-flex align-items-center justify-content-between border-0 pb-0">
      <h5 class="card-title mb-sm-0">Discover Events</h5>
      <!-- Button modal -->
      @if($user_id==null)
      <a class="btn btn-primary-soft btn-sm" href="#"> <i class="fa-solid fa-plus pe-1"></i> Create events</a>
      @endif
    </div>
    <!-- Card header END -->
    <!-- Card body START -->
    <div class="card-body">
      <!-- Upcoming event START -->
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Upcoming event:</strong> The learning conference on Sep 19 2022
        <a href="events.html" class="btn btn-xs btn-success ms-md-4">View event</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <!-- Upcoming event END -->
      <!-- Events list START -->
      <div class="row">
        @if(count($users_events)>0)
        @foreach($users_events as $users_event)
        <div class="d-sm-flex align-items-center">
          <!-- Avatar -->
          <div class="avatar avatar-xl">
            <a href="#!"><img class="avatar-img rounded border border-white border-3" src="{{asset('assets/images/events/'.$users_event->event_image)}}" alt=""></a>
          </div>
          <div class="ms-sm-4 mt-2 mt-sm-0">
            <!-- Info -->
            <h5 class="mb-1"><a href="event-details.html"> {{$users_event->event_name}}</a></h5>
            <ul class="nav nav-stack small">
              <li class="nav-item">
                 <i class="bi bi-calendar-check pe-1"></i>{{ date("D, M d,Y ",strtotime($users_event->event_date))}} at {{ date("h:i a",strtotime($users_event->event_date))}}  
              </li>
              <li class="nav-item">
                <i class="bi bi-geo-alt pe-1"></i>{{$users_event->location}}
              </li>
            
            </ul>
          </div>
          <!-- Button -->
          <div class="d-flex mt-3 ms-auto">
            <div class="dropdown">
              <!-- Card share action menu -->
          
              <!-- Card share action dropdown menu -->
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction">
                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <P class="text-center">No Event Found</P>
        @endif
      </div>
    
      <!-- Events list END -->
    </div>
 
    <!-- Card body END -->
  </div>
@endsection