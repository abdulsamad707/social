


@include("Layout")
<x-HeaderSocial/>
<!-- **************** MAIN CONTENT START **************** -->
<main>
  <!-- Container START -->
  <div class="container">
    <div class="row">

      <!-- Sidenav START -->
      <div class="col-lg-3">

        <!-- Advanced filter responsive toggler START -->
				<!-- Divider -->
				<div class="d-flex align-items-center mb-4 d-lg-none">
					<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">Settings</span>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->

        <nav class="navbar navbar-light navbar-expand-lg mx-0">
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <!-- Offcanvas header -->
						<div class="offcanvas-header">
							<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body p-0">
              <!-- Card START -->
              <div class="card w-100">
                <!-- Card body START -->
                <div class="card-body">

                <!-- Side Nav START -->
                <ul class="nav nav-tabs nav-pills nav-pills-soft flex-column fw-bold gap-2 border-0">
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-1" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="{{asset('assets/images/icon/person-outline-filled.svg')}}" alt=""><span>Account </span></a>
                  </li>
               
                 
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="#nav-setting-tab-6" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/trash-var-outline-filled.svg" alt=""><span>Close account </span></a>
                  </li>
                </ul>
                <!-- Side Nav END -->

              </div>
              <!-- Card body END -->
              <!-- Card footer -->
              <div class="card-footer text-center py-2">
                <a class="btn btn-link text-secondary btn-sm" href="#!">View Profile </a>
              </div>
              </div>
            <!-- Card END -->
            </div>
            <!-- Offcanvas body -->

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
        </nav>
      </div>
      <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-lg-6 vstack gap-4">
          <!-- Setting Tab content START -->
          <div class="tab-content py-0 mb-0">

            <!-- Account setting tab START -->
            <div class="tab-pane show active fade" id="nav-setting-tab-1">
              <!-- Account settings START -->
              <div class="card mb-4">
                
                <!-- Title START -->
                <div class="card-header border-0 pb-0">
                  <h1 class="h5 card-title">Account Settings</h1>
                
                  <p class="mb-0">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                  <!-- Form settings START -->
                  <form class="row g-3" method="POST" enctype='multipart/form-data'>
                    <!-- First name -->
                    @csrf
                    @if(session("status"))
                   <p class="text-danger"> {{session("status")}}</p>
                    @endif
                    @if(session("success"))
                    <p class="text-success"> {{session("success")}}</p>
                     @endif
 

                    <div class="col-sm-6 col-lg-6">
                      <label class="form-label">First name</label>
                      <input type="text" name="name" class="form-control" placeholder="" value="{{Auth::user()->name}}">
                    </div>
                    <!-- Last name -->
                  
                    <!-- Additional name -->
                    <div class="col-sm-6 col-lg-6">
                      <label class="form-label">Job Title</label>
                      <input type="text" name="job_title" class="form-control" value="{{Auth::user()->user_detail[0]->job_title}}">
                    </div>
                    <!-- User name -->
                    <div class="col-sm-6">
                      <label class="form-label">City</label>
                      <input type="text" name="city" class="form-control" placeholder="" value="{{Auth::user()->city}}">
                    </div>
                    <!-- Birthday -->
                    <div class="col-lg-6">
                      <label class="form-label">Birthday </label>
                      <input type="date" name="dateofbirth" class="form-control" value="{{Auth::user()->dateofbirth}}">
                    </div>
                    <!-- Allow checkbox -->
                 
                    <!-- Phone number -->
                    <div class="col-sm-6">
                      <label class="form-label">Phone number</label>
                      <input type="text" name="mobile" class="form-control" placeholder="" value="{{Auth::user()->mobile}}">
                      <!-- Add new number -->
                      
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6">
                      <label class="form-label">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="" value="{{Auth::user()->email}}">
                      <!-- Add new email -->
                      
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Profile Pic</label>
                        <input type="file" name="profilepic" class="form-control" placeholder="" value="sam@webestica.com">
                        <!-- Add new email -->
                        
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label">Cover Pic</label>
                        <input type="file" name="coverphoto" class="form-control" placeholder="" value="sam@webestica.com">
                        <!-- Add new email -->
                        
                      </div>
                    <!-- Page information -->
                    <div class="col-12">
                      <label class="form-label">Overview</label>
                      <textarea class="form-control" name="bio" rows="4" placeholder="Description (Required)">{{Auth::user()->user_detail[0]->bio}}</textarea>
                    
                    </div>
                    <!-- Button  -->
                    <div class="col-12 text-end">
                      <button type="submit" class="btn btn-sm btn-primary mb-0">Save changes</button>
                    </div>
                  </form>
                  <!-- Settings END -->
                </div>
              <!-- Card body END -->
              </div>
              <!-- Account settings END -->

              <!-- Change your password START -->
              <div class="card">
                <!-- Title START -->
                <div class="card-header border-0 pb-0">
                  <h5 class="card-title">Change your password</h5>
                  <p class="mb-0">See resolved goodness felicity shy civility domestic had but.</p>
                </div>
                <!-- Title START -->
                <div class="card-body">
                  <!-- Settings START -->
                  <form class="row g-3" method="POST" action="{{url('change_password')}}">
                    <!-- Current password -->
                    @csrf
                    <div class="col-12">
                      <label class="form-label">Current password</label>
                      <input type="text" class="form-control" name="current_password" placeholder="">
                    </div>
                    <!-- New password -->
                    <div class="col-12">
                      <label class="form-label">New password</label>
                      <!-- Input group -->
                      <div class="input-group">
                        <input class="form-control" name="password" type="password" id="psw-input" placeholder="Enter new password">
                       
                      </div>
                      <!-- Pswmeter -->
                 
                    </div>
                    <!-- Confirm password -->
                    <div class="col-12">
                      <label class="form-label">Confirm password</label>
                      <input type="text" name="password_confirmtion" class="form-control" placeholder="">
                    </div>
                    <!-- Button  -->
                    <div class="col-12 text-end">
                      <button type="submit" class="btn btn-primary mb-0">Update password</button>
                    </div>
                  </form>
                  <!-- Settings END -->
                </div>
              </div>
              <!-- Card END -->
            </div>
            <!-- Account setting tab END -->

            <!-- Notification tab START -->
          
            <!-- Notification tab END -->

            <!-- Privacy and safety tab START -->
           
            <!-- Privacy and safety tab END -->

            <!-- Communications tab START -->
            
            <!-- Communications tab END -->

            <!-- Messaging tab START -->
        
            <!-- Messaging tab END -->

            <!-- Close account tab START -->
            <div class="tab-pane fade" id="nav-setting-tab-6">
              <!-- Card START -->
              <div class="card">
                <!-- Card header START -->
                <div class="card-header border-0 pb-0">
                  <h5 class="card-title">Delete account</h5>
                  <p class="mb-0">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                  <!-- Delete START -->
                  <h6>Before you go...</h6>
                  <ul>
                    <li>Take a backup of your data <a href="#">Here</a> </li>
                    <li>If you delete your account, you will lose your all data.</li>
                  </ul>
                  <div class="form-check form-check-md my-4">
                    <input class="form-check-input" type="checkbox" value="" id="deleteaccountCheck">
                    <label class="form-check-label" for="deleteaccountCheck">Yes, I'd like to delete my account</label>
                  </div>
                  <a href="#" class="btn btn-success-soft btn-sm mb-2 mb-sm-0">Keep my account</a>
                  <a href="#" class="btn btn-danger btn-sm mb-0">Delete my account</a>
                  <!-- Delete END -->
                </div>
              <!-- Card body END -->
              </div>
              <!-- Card END -->
            </div>
            <!-- Close account tab END -->

          </div>
          <!-- Setting Tab content END -->
        </div>

    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Modal login activity START -->
<div class="modal fade" id="modalLoginActivity" tabindex="-1" aria-labelledby="modalLabelLoginActivity" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelLoginActivity">Where You're Logged in </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group list-group-flush">
          <!-- location list item -->
          <li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-3">
            <div class="me-2">
              <h6 class="mb-0">London, UK</h6>
              <ul class="nav nav-divider small">
                <li class="nav-item">Active now </li>
                <li class="nav-item">This Apple iMac </li>
              </ul>
            </div>
            <button class="btn btn-sm btn-primary-soft"> Logout </button>
          </li>
          <!-- location list item -->
          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
            <div class="me-2">
              <h6 class="mb-0">California, USA</h6>
              <ul class="nav nav-divider small">
                <li class="nav-item">Active now </li>
                <li class="nav-item">This Apple iMac </li>
              </ul>
            </div>
            <button class="btn btn-sm btn-primary-soft"> Logout </button>
          </li>
          <!-- location list item -->
          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
            <div class="me-2">
              <h6 class="mb-0">New york, USA</h6>
              <ul class="nav nav-divider small">
                <li class="nav-item">Active now </li>
                <li class="nav-item">This Windows </li>
              </ul>
            </div>
            <button class="btn btn-sm btn-primary-soft"> Logout </button>
          </li>
          <!-- location list item -->
          <li class="list-group-item d-flex justify-content-between align-items-center px-0 pt-3">
            <div class="me-2">
              <h6 class="mb-0">Mumbai, India</h6>
              <ul class="nav nav-divider small">
                <li class="nav-item">Active now </li>
                <li class="nav-item">This Windows </li>
              </ul>
            </div>
            <button class="btn btn-sm btn-primary-soft"> Logout </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Modal login activity END -->

  <!-- =======================
JS libraries, plugins and custom scripts -->
@include("LayoutFooter")
<!-- Bootstrap JS -->


<!-- Theme Functions -->
