@extends('frontend.layouts.master')
@section('title', 'Exam Sets')
@section('main_content')
<style>
    .sn-card {
    background: #159bc8;
}
.sn-card-header {
    background: #159bc8;
}
.btn {
    border: none;
    box-shadow: none;
}
.btn-success, .btn-secondary{
    color: white !important;
}
</style>

<div class="container dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"> Exam Sets</h2>
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="row mb-3">
            @php
                if(!isset($type)){
                    $type = request('type');
                }
                if(!isset($subjectId)){
                    $subject_Id = request('subject_id');
                }else{
                    $subject_id = $subjectId;
                }
            @endphp

            @if ($type)
                @if ($subject_id)
                    @isset($sets)
                        @foreach ($sets as $set)
                            <div class="col-md-4 col-12">
                                <div class="card mt-3 sn-card">
                                    <h4 class="card-header text-light sn-card-header">{{ $set->name }}</h4>
                                    <div class="card-body text-light">
                                        <p>To start the exam register after successfully login and start the exam.</p>
                                        <span class="d-block">{{ $set->time_period }} Minute</span>
                                        @auth
                                            @php
                                                $req = Auth::user()->student ? $req = Auth::user()->student->setrequest()->where('set_id', $set->id)->first() : null;
                                            @endphp
                                            @if ($req)
                                                @if ($req->is_approved)
                                                    <a href="{{ route('exam.questions', $set->id) }}" class="btn btn-success btn-sm w-100">Start</a>
                                                    <a href="{{ route('exam.sets.review', $set->id) }}" class="btn btn-secondary btn-sm w-100">Review Old</a>
                                                @else
                                                    <button class="btn btn-secondary btn-sm w-100" disabled>Requested</button>
                                                @endif
                                            @else
                                                <!-- Request Modal Trigger -->
                                                <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#requestModal{{ $loop->index }}">
                                                    Request Set
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="requestModal{{ $loop->index }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Confirm Request</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="{{ route('exam.setrequest.store', $set->id) }}" class="btn btn-primary">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <a href="{{ route('exam.questions', $set->id) }}" class="btn btn-success btn-sm w-100">Start Exam</a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                @else
                    @foreach ($subjects as $subject)
                        <div class="col-md-6 col-12">
                            <div class="card mt-3 sn-card">
                                <h4 class="card-header text-light sn-card-header">{{ $subject['name'] }}</h4>
                                <div class="card-body text-light">
                                    <a href="?type={{ $type }}&subject_id={{ $subject['id'] }}" class="btn btn-success btn-sm w-100">Explore Sets</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @else
                <div class="col-md-6 col-12">
                    <div class="card mt-3 sn-card">
                        <h4 class="card-header text-light sn-card-header">Loksewa Preparation</h4>
                        <div class="card-body text-light">
                            <a href="?type=Loksewa" class="btn btn-success btn-sm w-100">View Subjects</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card mt-3 sn-card">
                        <h4 class="card-header text-light sn-card-header">NEC License Preparation</h4>
                        <div class="card-body text-light">
                            <a href="?type=NEC" class="btn btn-success btn-sm w-100">View Subjects</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    // Function to open a new popup window with limited controls
    function openPopup(url) {
        const screenWidth = screen.width;
        const screenHeight = screen.height;

        const popupWindow = window.open(
            url,
            '_blank',
            `width=${screenWidth},height=${screenHeight},top=0,left=0,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no`
        );

        if (!popupWindow) {
            alert("Popup blocked! Please allow popups for this site.");
            return;
        }

    }

    // Event listener to handle clicks on links with the 'popup-link' class
    document.addEventListener("DOMContentLoaded", () => {
      const popupLinks = document.querySelectorAll(".btnsnstart");
      popupLinks.forEach(link => {
        link.addEventListener("click", (event) => {
          event.preventDefault();  // Prevent the default link behavior
          const url = event.target.getAttribute("href");  // Get the URL from href
          openPopup(url);  // Open the URL in a popup
        });
      });
    });
  </script>
@endsection
