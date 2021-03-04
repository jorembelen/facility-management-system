@extends('layouts.master')

@section('title', 'Details')
@section('content') 


<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ \URL::previous() }}" type="button"class="btn btn-dark mb-2 float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                    Back
                </a> 
                {{-- <h5 class="">Safety Officer: </h5> <h4>{{ $appointment->officer->badge }} - {{ $appointment->officer->name }} ({{ $appointment->officer->designation }})</h4> --}}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h5>Work Category</h5>
                    <h4 class="ml-4">{{ $appointment->category->name }}</h4>
                </li>
                <li class="list-group-item">
                    <h5>Appointment Date</h5>
                    <h4 class="ml-4">{{ date('M-d-Y', strtotime($appointment->date)) }}</h4>
                </li>
                <li class="list-group-item">
                    <h5>Appointment Time</h5>
                    <h4 class="ml-4">{{ $appointment->schedule_time }}</h4>
                </li>
                <li class="list-group-item">
                    <h5>Job Description</h5>
                    <h4 class="ml-4">{{ $appointment->job_description }}</h4>
                </li>
                <li class="list-group-item">
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
                            <h4 class="ml-4">No Picture(s) Attached</h4>
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
                <li class="list-group-item">
                    @if(!empty($appointment->documents))
                        <a class="bs-tooltip" title="Click to download this attachment!" href="{{ url('/uploads/documents/'.$appointment->documents) }}" target="_blank" rel="noopener noreferrer">
                        <button class="btn btn-danger mb-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Click to download attached document</button>
                        </a>
                    @else
                    <h3>No Attached File!</h3>
                    @endif
                </li>
            </ul>
        </div>
        {{-- <h8 >Submitted by: <strong>{{ $appointment->user->name }} - ({{ date('M-d-Y h:i a', strtotime($appointment->created_at)) }})</strong></h8> --}}
    </div>
</div>

@endsection