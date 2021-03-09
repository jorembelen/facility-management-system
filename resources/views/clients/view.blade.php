@extends('layouts.master')

@section('title', 'Details')
@section('content') 




  <div class="row">
    <div class="col-xl-2"></div>
        <div class="col-lg-6 col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-action float-right">
                        <div class="dropdown show">
                            @if (auth()->user()->role == 'tenant')
                            <a href="/client-appointments" class="btn btn-secondary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                            @else
                            <a href="{{ \URL::previous() }}" class="btn btn-secondary float-right d-print-none "><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                            @endif
                        </div>
                    </div>
                    <h3 class="card-title mb-0">Appointment Details:</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Work Category:</dt>
                        <h5>{{ $appointment->category->name }}</h5>
                    </dl>
                    @if ($appointment->emergency_type)  
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Emergency Type:</dt>
                        <h5>{{ $appointment->emergency_type }}</h5>
                    </dl>
                    @endif
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Date:</dt>
                        <h5>{{ date('M-d-Y', strtotime($appointment->date)) }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3">Scheduled Time:</dt>
                        <h5>{{ $appointment->schedule_time }}</h5>
                    </dl>
                    <dl class="row">
                        <dt class="col-4 col-xxl-3"><i class="align-middle mr-2 fas fa-fw fa-arrow-down"></i> Job Description:</dt>
                    </dl>
                    <dl class="row">
                        <h5 class="text-justify ml-3 mr-3 mt-2">{{ $appointment->job_description }}</h5>
                    </dl>
                    <dl class="row">
                    </dl>
                    
                    <hr>
                     
                        <div class="widget-content widget-content-area">
                            <h5>Picture(s)</h5>
                                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                                    @if(!empty($appointment->images))
                                        @foreach ($photos as $image)
                                        <a class="img-1" href="{{ asset('uploads/images/'.$image ) }}" data-size="1600x1068" data-med="{{url('../')}}/uploads/thumbnails/{{ $image ? $image : 'no_image.jpg' }}" data-med-size="1024x683" data-author="Samuel Rohl">
                                            <img src="{{ asset('uploads/thumbnails/'.$image) }}" alt="image-gallery">
                                           
                                        </a>
                                        @endforeach
                                        @else
                                    <h5 class="text-center">No Picture(s) Attached</h5>
                                    @endif    
                                    </div>
                                            <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                
                                                <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                                                <div class="pswp__bg"></div>
                
                                                <!-- Slides wrapper with overflow:hidden. -->
                                                <div class="pswp__scroll-wrap">
                                                    <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                                    <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                                    <div class="pswp__container">
                                                        <div class="pswp__item"></div>
                                                        <div class="pswp__item"></div>
                                                        <div class="pswp__item"></div>
                                                    </div>
                
                                                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                                    <div class="pswp__ui pswp__ui--hidden">
                
                                                        <div class="pswp__top-bar">
                
                                                            <!--  Controls are self-explanatory. Order can be changed. -->
                                                            <div class="pswp__counter"></div>
                                                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                                            <button class="pswp__button pswp__button--share" title="Share"></button>
                                                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                
                                                            <!-- element will get class pswp__preloader--active when preloader is running -->
                                                            <div class="pswp__preloader">
                                                                <div class="pswp__preloader__icn">
                                                                <div class="pswp__preloader__cut">
                                                                    <div class="pswp__preloader__donut"></div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                            <div class="pswp__share-tooltip"></div> 
                                                        </div>
                                                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                                        </button>
                                                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                                        </button>
                                                        <div class="pswp__caption">
                                                            <div class="pswp__caption__center"></div>
                                                        </div>
                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <h5>Document</h5>
                                    @if(!empty($appointment->documents))
                                    <li class="list-group-item">
                                <a class="bs-tooltip" title="Click to download this attachment!" href="{{ url('/uploads/documents/'.$appointment->documents) }}" target="_blank" rel="noopener noreferrer">
                                <button class="btn btn-danger mb-2 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                Click to download attached document</button>
                                </a>
                            </li>
                            @else
                            <h5 class="text-center">No Document Attached!</h5>
                            @endif
                </div>
                    
            </div>
            @if (auth()->user()->role == 'tenant')
                @if ($appointment->status == 0)
                    @if ($appointment->date > $dateAllowed)   
                    <a class="btn btn-primary float-right" href="#" data-toggle="modal" data-target="#cancel{{$appointment->id}}">Cancel Appointment</a>
                    @endif
                <a class="btn btn-warning float-right mr-2" href="{{ route('client-appointments.edit', $appointment->id) }}">Update</a>
                @endif
            @endif
        </div>
        
    <div class="col-xl-2"></div>
</div>


<!-- Cancel Appointment -->
<div class="modal fade" id="cancel{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleStandardModalLabel"><i class="align-middle mr-2 far fa-fw fa-frown" style="color:red"></i> Cancel Appointment?</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body m-3">
            <form class="form-horizontal" method="POST" action="{{ route('client-appointment.cancel', $appointment->id) }}" id="cancel-create">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <h4 class="mb-0 text-center">If you are sure, please select reason & click Yes to proceed!</h4>
            <div class="form-group mt-2">
                <select name="cancellation_reason" class="form-control select2" id="reason_frm" >
                    <option value="">Select Reason</option>
                    <option value="Problem Solved">Problem Solved</option>
                    <option value="Busy, cannot attend appointment">Busy, cannot attend appointment</option>
                    <option value="Others">Others</option>
                </select>
            </div>
                <div class="form-group mt-2 frm-div" id="selectOthers" style="display:none">
                <textarea name="cancellation_comments" class="form-control" cols="30" rows="3" placeholder="Comments"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
    </div>
  </div>

 
 

@endsection