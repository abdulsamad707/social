
@extends('ProfileLayout')
@section("pageContainer")
<div class="card">
    <!-- Card header START -->
    <div class="card-header border-0 pb-0">
      <h5 class="card-title">Medias
        @if($user_id==null || $user_id==Auth::user()->id)
      <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateAlbum">
         <i class="fa-solid fa-plus pe-1"></i> Create album</a>
        @endif
        </h5>
      <!-- Button modal -->
    </div>
    <!-- Card header END -->
    <!-- Card body START -->
    <div class="card-body">
      <!-- Video of you tab START -->
      <div class="row g-3">

        <!-- Add Video START -->
        @if(count($user_videos) > 0 )
        @foreach($user_videos as $user_video)
        <div class="col-sm-6 col-md-4">
          <!-- Video START -->
          <div class="card p-0 shadow-none border-0 position-relative">
            {{$user_video->id}}
            <div class="position-relative">
              <img class="rounded" src="{{asset('assets/images/albums/'.$user_video->videos_cover_photo)}}" alt="">
              <!-- Play icon -->
              <div class="position-absolute top-0 end-0 p-3">
                <a class="icon-md bg-danger text-white rounded-circle" data-glightbox href="{{asset('assets/images/videos/'.$user_video->videos)}}"> <i class="bi bi-play-fill fs-5"> </i> </a>
              </div>
              <!-- Duration -->
              <div class="position-absolute bottom-0 start-0 p-3 d-flex w-100">
                <span class="bg-dark bg-opacity-50 px-2 rounded text-white small">{{$user_video->duration}}</span>
              </div>
            </div>
            <!-- Video info -->
            <div class="card-body px-0 pb-0 pt-2">
         
            </div>
          </div>
       
        </div>

    
        @endforeach
  @else
  <p class="text-center">No  Media</p>
        @endif
      </div>
       <!-- Video END -->
      
            <!-- Video of you tab END -->
     </div>
      </div>
      <div class="modal fade" id="modalCreateAlbum" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabelCreateAlbum">Create album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Form START -->
              <form method="POST" action="{{url('user_video')}}" enctype='multipart/form-data'>
                <!-- Album name -->
           @csrf
                <!-- Select audience -->
              </div>
                <!-- Upload Photos or Videos -->
                <div class="mb-3">
                  <!-- Dropzone photo START -->
                  <label class="form-label">Video Cover Photo</label>
            
                  <!-- Dropzone photo END -->
          <input type="file" name="videos_cover_photo" class="form-control">
          <label class="form-label">Upload  Videos</label>
            
          <!-- Dropzone photo END -->
  <input type="file" name="videos" class="form-control">
  <label class="form-label">Video Duration</label>
            <input type="text" name="duration" class="form-control" placeholder="Video Duration">
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
     
@endsection