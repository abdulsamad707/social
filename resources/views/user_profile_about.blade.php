@extends('ProfileLayout')
@section("pageContainer")
<div class="card">
    <!-- Card header START -->
    <div class="card-header border-0 pb-0">
      <h5 class="card-title"> Profile Info</h5> 
    </div>
    <!-- Card header END -->
    <!-- Card body START -->
    <div class="card-body">
      <div class="rounded border px-3 py-2 mb-3"> 
        <div class="d-flex align-items-center justify-content-between">
          <h6>Overview</h6>
          <div class="dropdown ms-auto">
            <!-- Card share action menu -->
            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-three-dots"></i>
            </a>
            <!-- Card share action dropdown menu -->
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction">
              <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
              <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
            </ul>
          </div>
        </div>
        <p>{{$bio}} </p>
      </div>
      <div class="row g-4">
        <div class="col-sm-6">
          <!-- Birthday START -->
          <div class="d-flex align-items-center rounded border px-3 py-2"> 
            <!-- Date -->
            <p class="mb-0">
              <i class="bi bi-calendar-date fa-fw me-2"></i> Born: <strong> {{$dateofbirth}} </strong>
            </p>
           
          </div>
          <!-- Birthday END -->
        </div>
        <div class="col-sm-6">
          <!-- Status START -->
          <div class="d-flex align-items-center rounded border px-3 py-2"> 
            <!-- Date -->
            <p class="mb-0">
              <i class="bi bi-heart fa-fw me-2"></i> Status: <strong>{{$maritual_status}}</strong>
            </p>
         
          </div>
          <!-- Status END -->
        </div>
        <div class="col-sm-6">
          <!-- Designation START -->
          <div class="d-flex align-items-center rounded border px-3 py-2"> 
            <!-- Date -->
            <p class="mb-0">
              <i class="bi bi-briefcase fa-fw me-2"></i> <strong> {{$job_title}} </strong>
            </p>
         
          </div>
          <!-- Designation END -->
        </div>
        <div class="col-sm-6">
          <!-- Lives START -->
          <div class="d-flex align-items-center rounded border px-3 py-2"> 
            <!-- Date -->
            <p class="mb-0">
              <i class="bi bi-geo-alt fa-fw me-2"></i> Lives in: <strong> {{$city}}</strong>
            </p>
          
          </div>
          <!-- Lives END -->
        </div>
        <div class="col-sm-6">
          <!-- Joined on START -->
          <div class="d-flex align-items-center rounded border px-3 py-2"> 
            <!-- Date -->
            <p class="mb-0">
              <i class="bi bi-geo-alt fa-fw me-2"></i> Joined on: <strong> {{$user_join_date}} </strong>
            </p>
         
          </div>
          <!-- Joined on END -->
        </div>
        <div class="col-sm-6">
          <!-- Joined on START -->
          <div class="d-flex align-items-center rounded border px-3 py-2"> 
            <!-- Date -->
            <p class="mb-0">
              <i class="bi bi-envelope fa-fw me-2"></i> Email: <strong> {{$user_email}} </strong>
            </p>
           
          </div>
          <!-- Joined on END -->
        </div>
   
      </div>
    </div>
    <!-- Card body END -->
</div>
@endsection