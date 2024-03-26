   
            
            
            
           @php

    

            @endphp
            @foreach($events as $user_event_data)
                    <div class="col-sm-6 col-xl-4">
                      <!-- Event item START -->
                      <div class="card h-100">
                        <div class="position-relative">
                          <img class="img-fluid rounded-top" src="{{asset('assets/images/events/'.$user_event_data->event_image)}}" alt="">
                          <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            {{ucfirst($user_event_data->mode)}}
                          </div>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                          <!-- Tag -->
                          <a class="btn btn-xs btn-primary mt-n3" href="{{url('event_detail/'.$user_event_data->id)}}">{{ucfirst($user_event_data->event_type)}}</a>
                          <h6 class="mt-3"> <a href="{{url('event_detail/'.$user_event_data->id)}}">{{ucfirst($user_event_data->event_name)}} </a> </h6>
                         @if($user_event_data->user_id!=Auth::user()->id)
                      Organiser:   {{ucfirst($user_event_data->user->name)}}
                         @else
                         Organiser:   Me
                         @endif
                             <!-- Date time -->
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i> 
{{date("D,M d,Y",strtotime($user_event_data->event_date))}} at {{date("h:i a",strtotime($user_event_data->event_date))}} </p>
                          <p class="small"> <i class="bi bi-geo-alt pe-1"></i> {{$user_event_data->location}} </p>
                          <!-- Avatar group START -->
                          <ul class="avatar-group list-unstyled align-items-center mb-0">

                            @foreach($user_event_data["attendesscount"] as $key => $event_data)
                            @if($key < 3)
                            <li class="avatar avatar-xs">
                              <img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.$event_data->user->name.'/'.$event_data->user->user_detail[0]->profileImage)}}" alt="avatar">
                            </li>
                            @endif
                            @endforeach
                              @if(count($user_event_data["attendesscount"]) > 3)
                            <li class="avatar avatar-xs">
                              <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+34</span></div>
                            </li>
                          
                          
                          
                            @endif
                            @if(count($user_event_data["attendesscount"]) > 0)
                            <li class="ms-3">
                              <small> are attending</small>
                            </li>
                            @else
                            <li class="ms-3">
                              <small>No People</small>
                            </li>
                            @endif
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
                            
                              <!-- Dropdown menu -->
                     
                            </div>
                          </div>
                        </div>
                        <!-- Card body END -->
                     </div>
                     <!-- Event item END -->
                    </div> 
                    @endforeach
                  
                   
                 