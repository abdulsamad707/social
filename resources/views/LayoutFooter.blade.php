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
              <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
            </div>
            <!-- Feed box  -->
            <form class="w-100">
              <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus></textarea>
            </form>
          </div>
          <!-- Feed rect START -->
          <div class="hstack gap-2">
            <a class="icon-md bg-success bg-opacity-10 text-success rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Photo"> <i class="bi bi-image-fill"></i> </a>
            <a class="icon-md bg-info bg-opacity-10 text-info rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Video"> <i class="bi bi-camera-reels-fill"></i> </a>
            <a class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Events"> <i class="bi bi-calendar2-event-fill"></i> </a>
            <a class="icon-md bg-warning bg-opacity-10 text-warning rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Feeling/Activity"> <i class="bi bi-emoji-smile-fill"></i> </a>
            <a class="icon-md bg-light text-secondary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Check in"> <i class="bi bi-geo-alt-fill"></i> </a>
            <a class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Tag people on top"> <i class="bi bi-tag-fill"></i> </a>
          </div>
          <!-- Feed rect END -->
        </div>
        <!-- Modal feed body END -->
        
        <!-- Modal feed footer -->
        <div class="modal-footer row justify-content-between">
          <!-- Select -->
          <div class="col-lg-3">
            <select class="form-select js-choice" data-position="top" data-search-enabled="false">
              <option value="PB">Public</option>
              <option value="PV">Friends</option>
              <option value="PV">Only me</option>
              <option value="PV">Custom</option>
            </select>
          </div>
          <!-- Button -->
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
              <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
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
            <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
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
  
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->

<script src="{{asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<!-- Theme Functions -->
<script src="{{asset('assets/js/functions.js')}}"></script>
<script src="{{asset('build/assets/app-Bm2JNsIg.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  
   <script>
  
  console.log(parseInt($("#notificta").text()+1));
    Echo.channel('usernotification')

    .listen('NotificationUser', (e) => {
      $("#notification").html("");
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
  
  <!-- Mirrored from social.webestica.com/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:40:43 GMT -->
  </html>