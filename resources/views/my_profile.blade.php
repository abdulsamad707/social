
@extends('ProfileLayout')
@section("pageContainer")

<!-- Card feed item START -->
@if(count($user_posts)>0)
@foreach($user_posts as $user_post)

<div class="card">
  <!-- Card header START -->
  <div class="card-header border-0 pb-0">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <!-- Avatar -->
        <div class="avatar avatar-story me-2">


          @if($user_post->user->user_detail!=null)
          @if(count($user_post->user->user_detail)>0)
    <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.$user_post->user->name."/".$user_post->user->user_detail[0]->profileImage)}}" alt=""> </a>
          @else
        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt=""> </a>
                              @endif
      @else
    <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt=""> </a>
    @endif
        
        </div>
        <!-- Info -->
        <div>
          <div class="nav nav-divider">
                 @if(Auth::user()->id==$user_post->user_id)
                 <h6 class="nav-item card-title mb-0"> <a href="{{url('user_profile')}}"> Me </a></h6>
                 @else
            <h6 class="nav-item card-title mb-0"> <a href="{{url('user_profile/'.$user_post->user_id)}}"> 	{{$user_post->user->name}} </a></h6>
                  @endif
            <span class="nav-item small">{{TimeDiff($user_post->created_at,now())}} ago</span>
          </div>
          @if($user_post->user->user_detail!=null)
          @if(count($user_post->user->user_detail)>0)
        
          <p class="mb-0 small"> {{$user_post->user->user_detail[0]->job_title}}</p>
          @endif
          @endif
        </div>
      </div>
      <!-- Card feed action dropdown START -->
      <div class="dropdown">
        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction1" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-three-dots"></i>
        </a>
        <!-- Card feed action dropdown menu -->
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction1">
          <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
          <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
          <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
          <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
        </ul>
      </div>
      <!-- Card feed action dropdown END -->
    </div>
  </div>
  <!-- Card header END -->
  <!-- Card body START -->
  <div class="card-body">
  
    <div class="player-wrapper overflow-hidden">
      @if($user_post->video!=null)
      <video class="player-html" controls crossorigin="anonymous">
        <source src="{{asset('assets/images/videos/'.$user_post->video)}}" type="video/mp4">
      </video>
      @endif
    </div>
    <p>{{$user_post->content}}</p>
    @if($user_post->image!=null)
    <a href="{{asset('assets/images/post/'.$user_post->image)}}" data-gallery="image-popup" data-glightbox="">
      <img class="card-img" src="{{asset('assets/images/post/'.$user_post->image)}}" alt="Post">
      </a>
  
    @endif
    <!-- Card img -->

 
    <!-- Feed react START -->
    <ul class="nav nav-stack py-3 small">
      <li class="nav-item">
        <a class="nav-link active" href="#!"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked ({{$user_post->likes_count}})</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments ({{$user_post->comments_count}})</a>
      </li>
      <!-- Card share action START -->
    
 
      <!-- Card share action END -->
    </ul>
    <!-- Feed react END -->

    <!-- Add comment -->
		<div class="d-flex mb-3">
      <!-- Avatar -->
      <div class="avatar avatar-xs me-2">
        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('assets/images/profilepic/'.Auth::user()->name.'/'.Auth::user()->user_detail[0]->profileImage)}}" alt=""> </a>
      </div>
      <!-- Comment box  -->
    
      <form class="input-group" method="POST" action="{{url('postcomment')}}">
        @csrf
        <input type='hidden' name="post_id" value="{{$user_post->id}}">
        <textarea name="comment_content" data-autoresize class="form-control me-2 bg-light rounded" rows="1" placeholder="Add a comment..."></textarea>
        <button class="btn btn-primary mb-0 rounded" type="submit">Post</button>
      </form>
    </div>
    <!-- Comment wrap START -->
    @if($user_post->comments_count > 0)
    <ul class="comment-wrap list-unstyled">
      @foreach($user_post->comments as $comment)
      <!-- Comment item START -->
      <li class="comment-item">
        <div class="d-flex position-relative">
          <!-- Avatar -->
          <div class="avatar avatar-xs">
            @if($comment->profileImage!=null)
            <a href="{{url('user_profile/'.$comment->user_id)}}"><img class="avatar-img rounded-circle" 
              src="{{asset('assets/images/profilepic/'.$comment->name.'/'.$comment->profileImage)}}" alt=""></a>
            @else
            <a href="#!"><img class="avatar-img rounded-circle" 
              src="{{asset('assets/images/avatar/placeholder.jpg')}}" alt=""></a>
            @endif
         
          </div>
          <div class="ms-2">
            <!-- Comment by -->
            <div class="bg-light rounded-start-top-0 p-3 rounded">
              <div class="d-flex justify-content-between">
                <h6 class="mb-1"> <a href="{{url('user_profile/'.$comment->user_id)}}"> {{$comment->name}} </a></h6>
             <small class="ms-2">{{TimeDiff($comment->created_at,now())}}</small>
              </div>
              <p class="small mb-0">{{$comment->comment_content}}</p>
            </div>
            <!-- Comment react -->

          </div>
        </div>
        <!-- Comment item nested START -->
       
        <!-- Load more replies -->
      
        <!-- Comment item nested END -->
      </li>
      @endforeach
      <!-- Comment item END -->
      <!-- Comment item START -->
   
      <!-- Comment item END -->
    </ul>
    @endif
    <!-- Comment wrap END -->
  </div>
  <!-- Card body END -->

  <!-- Card footer END -->
</div>
@endforeach
<!-- Card feed item END -->

<!-- Card feed item START -->

<!-- Card feed item END -->
@foreach($user_pages_posts as $user_pages_post)
<div class="card">
  <!-- Card header START -->
  <div class="card-header border-0 pb-0">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <!-- Avatar -->
        <div class="avatar me-2">
          <a href="#"> <img class="avatar-img rounded-circle" src="{{asset('assets/images/logo/'.$user_pages_post->social_page->page_logo)}}" alt=""> </a>
        </div>
        <!-- Title -->
        <div>
          <h6 class="card-title mb-0"> <a href="#!"> {{$user_pages_post->social_page->page_name}}</a></h6>
          <p class="mb-0 small">{{date("d-F-Y",strtotime($user_pages_post->created_at))}} at  {{date("H:i a",strtotime($user_pages_post->created_at))}}</p>
        </div>
      </div>
      <!-- Card share action menu -->
      <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardShareAction5" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots"></i>
      </a>
      <!-- Card share action dropdown menu -->
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction5">
        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
        <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
        <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
        <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
      </ul>
    </div>
      <!-- Card share action END -->
  </div>
  <!-- Card header START -->

  <!-- Card body START -->
  <div class="card-body pb-0">
    <p>{{$user_pages_post->content}}</p>
    <!-- Feed react START -->
  
    <!-- Feed react END -->
  </div>
  <!-- Card body END -->
  <!-- Card Footer START -->
  <div class="card-footer py-3">
    <!-- Feed react START -->
    <ul class="nav nav-fill nav-stack small">
      <li class="nav-item">
        <a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked ({{$user_pages_post->likes_count}})</a>
      </li>
      <!-- Card share action dropdown START -->
      <li class="nav-item dropdown">
        
      
      </li>
      <!-- Card share action dropdown END -->
      
    </ul>
    <!-- Feed react END -->
  </div>
  <!-- Card Footer END -->
</div>
<!-- Card feed item END -->
@endforeach
@else
<div class="card">
  <!-- Card header START -->
  <div class="card-header border-0 pb-0"></div>
  <div class="card-body pb-0">
    <p class="text-center">No Post</p>
  </div>
</div>

@endif
        <!-- Connection item END -->
      
        <!-- Connection item END -->

        <!-- Connection it

<!-- Main content END -->
@endsection