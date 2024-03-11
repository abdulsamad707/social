
@extends('ProfileLayout')
@section("pageContainer")





<div class="card">
    <!-- Card header START -->
    <div class="card-header border-0 pb-0">
      <h5 class="card-title"> Connections</h5> 
    </div>
    <!-- Card header END -->
    <!-- Card body START -->
    <div class="card-body">
      <!-- Connections Item -->
      <div class="d-md-flex align-items-center mb-4">
        <!-- Avatar -->
        <div class="avatar me-3 mb-3 mb-md-0">
          <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt=""> </a>
        </div>
        <!-- Info -->
        <div class="w-100">
          <div class="d-sm-flex align-items-start">
            <h6 class="mb-0"><a href="#!">Lori Ferguson </a></h6>
            <p class="small ms-sm-2 mb-0">Full Stack Web Developer</p>
        </div>
        <!-- Connections START -->
       
        <!-- Connections END -->
      </div>
      <!-- Button -->
      <div class="ms-md-auto d-flex">
        <button class="btn btn-danger-soft btn-sm mb-0 me-2"> Remove </button>
        <button class="btn btn-primary-soft btn-sm mb-0"> Message </button>
      </div>
    </div>

    <!-- Connections Item -->
 

    <!-- Connections Item -->
   
    <!-- Button -->
 

  <!-- Connections Item -->
  
    <!-- Connections START -->
  
  <!-- Button -->



</div>
<!-- Card body END -->
</div>







@endsection