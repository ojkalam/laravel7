@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                        <div class="card text-center">
                            <div class="card-header">
                              Image uploader
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">Upload profile image</a>
                            </div>
                            <div class="card-footer text-muted">

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{--    Modals --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Image Uploader</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list_image" id="contact-tab" data-toggle="tab" href="#image_list" role="tab" aria-controls="image_list" aria-selected="false">Image List</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-body">
                            <label for="exampleFormControlFile1">Upload profile image</label>
                            <input type="file" class="form-control-file" id="iamge_upload">
                            <div id="ajaxProgress" style="display:none; margin: 15px auto">
                                <div class="spinner-border text-info text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footers">
                            <span style="color: green" id="msg"></span>
                            <img id='preview' src="" style="display: none" height="250px" width="250px" alt="..." class="img-thumbnail">

                        </div>
                    </div>
                    <div class="tab-pane fade" id="image_list" role="tabpanel" aria-labelledby="contact-tab">
                        <div id="ajaxProgress" style="display:none; margin: 15px auto">
                            <div class="spinner-border text-info text-center" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="row imagelists">
                        </div>
                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
