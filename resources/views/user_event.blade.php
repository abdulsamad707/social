
@extends('ProfileLayout')
@section("pageContainer")
<div class="card">
    <!-- Card header START -->
    <div class="card-header d-sm-flex align-items-center justify-content-between border-0 pb-0">
      <h5 class="card-title mb-sm-0">Discover Events</h5>
      <!-- Button modal -->
      @if($user_id==null || $user_id==Auth::user()->id)
      <a class="btn btn-primary-soft btn-sm" href="#"  data-bs-toggle="modal" data-bs-target="#modalCreateAlbum"> <i class="fa-solid fa-plus pe-1"></i> Create events</a>
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
              <li class="nav-item">
                <i class="bi bi-people pe-1"></i>{{$users_event->attendesscount_count}}
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
  <div class="modal fade" id="modalCreateAlbum" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabelCreateAlbum">Create Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form START -->
          <form method="POST" action="{{url('user_event')}}" enctype='multipart/form-data'>
            <!-- Album name -->
       @csrf
            <!-- Select audience -->
          </div>
            <!-- Upload Photos or Videos -->
            <div class="mb-3">
              <!-- Dropzone photo START -->
              <label class="form-label">Event Image</label>
        
              <!-- Dropzone photo END -->
      <input type="file" name="event_cover_photo" class="form-control">
      <label class="form-label">Event Name</label>
        
      <!-- Dropzone photo END -->
<input type="text" name="event_name" class="form-control" placeholder="Event Name">
      <label class="form-label">Event Description</label>
        
      <!-- Dropzone photo END -->
<input type="text" name="event_description" class="form-control" placeholder="Event Description">
<label class="form-label">Event Date</label>
        <input type="datetime-local" name="event_date" class="form-control" placeholder="Event Date">
        <label class="form-label">Event Start Date</label>
        <input type="datetime-local" name="event_start_date" class="form-control" placeholder="Event Start Date">
        <label class="form-label">Event End Date</label>
        <input type="datetime-local" name="event_end_date" class="form-control" placeholder="Event End Date">
        <label class="form-label">Entry Fee Currency</label>
        <input type="text" name="entry_fee_currency" class="form-control" placeholder="Entry Fee Currency">
        <label class="form-label">Mode</label>
        <select name="mode" class="form-control">
          <option value="online">Online</option>
          <option value="oncampus">On Campus</option>
        </select>
        <label class="form-label">Entry Fee</label>
        <input type="text" name="entry_fee" class="form-control" placeholder="Entry Fee">
	
        <label class="form-label">Entry Type</label>
        <select name="entry_type" class="form-control" >
          <option value="entertainment">Entertainment</option>
          <option value="trade">Trade</option>
        </select>
        <label class="form-label">Event Location </label>
        <input type="text" name="event_location" class="form-control" placeholder="Enter Location">
          <!-- Form END -->
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success-soft">Create Event</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection