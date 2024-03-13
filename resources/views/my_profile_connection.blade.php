
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
      @foreach($my_friend_data as $friend )
      <div class="d-md-flex align-items-center mb-4">
        <!-- Avatar -->
        <div class="avatar me-3 mb-3 mb-md-0">
          @if(count($friend->user_detail)>0)
          <a href="{{url('user_profile/'.$friend->id)}}"><img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.$friend->name."/".$friend->user_detail[0]->profileImage)}}" alt=""></a>
          @else
          <a href="{{url('user_profile/'.$friend->id)}}"><img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt=""></a>
          @endif
          
        </div>
        <!-- Info -->
        <div class="w-100">
          <div class="d-sm-flex align-items-start">
            <h6 class="mb-0"><a href="{{url('user_profile/'.$friend->id)}}">{{$friend->name}} </a></h6>
          
        </div>
        <!-- Connections START -->
       
        <!-- Connections END -->
      </div>
      <!-- Button -->
      <div class="ms-md-auto d-flex">
        @if($user_id==null)
        <a class="btn btn-danger-soft btn-sm mb-0 me-2"> Remove </a>
         @endif
      </div>
    </div>

    <!-- Connections Item -->
 @endforeach

    <!-- Connections Item -->
   
    <!-- Button -->
 

  <!-- Connections Item -->
  
    <!-- Connections START -->
  
  <!-- Button -->



</div>
<!-- Card body END -->
</div>







@endsection