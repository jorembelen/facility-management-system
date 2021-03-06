@extends('layouts.master')

@section('title', 'Update Appointment')
@section('content') 

<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Update {{ $appointment->id }}</h2>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('update', $appointment->id) }}" enctype="multipart/form-data" id="client-app-create">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="badge" value="{{ auth()->user()->badge }}">
                    <input type="hidden" name="work_category_id" value="{{ $appointment->work_category_id }}">
                    <input type="hidden" name="date" value="{{ $appointment->date }}">
                    <div class="form-group">
                        <label class="form-label">Work Category</label>
                        <h3>{{ $appointment->category->name }}</h3>
                    </div>
              
                    <div class="form-group">
                        <label class="form-label">Date</label>
                       <h3>{{ date('M-d-Y', strtotime($appointment->date)) }}</h3>
                       </div><hr>
                    <div class="form-group">
                        <label class="form-label">Scheduled Time</label>
                       <h3>{{ $appointment->schedule_time }}</h3>
                       </div><hr>
                    <div class="form-group">
                        <label class="form-label">Job Description</label>
                        <textarea name="job_description" class="form-control" cols="30" rows="6">{{ $appointment->job_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group custom-file-container" data-upload-id="myImage">
                            <label>Attached Picture(s)<a href="#" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class=" form-controlcustom-file-container__custom-file__custom-file-input" name="images[]"  multiple>
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                    </div>
                      <div class="form-group">
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
                                        </div><br>
                      </div>
                <div class="form-group mt-3">
                    <label for="docs">Attached Documents (word/excel/pdf)<span class="text-danger"> </span></label>
                    <input type="file" class="form-control-file"  name="documents">
                </div>

                    </div>
                    <div class="modal-footer">
                        <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                        <a href="{{ url('client-appointments') }}" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-3"></div>
</div>

@include('scripts.client_appointment')
@endsection