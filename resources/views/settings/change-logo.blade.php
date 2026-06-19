@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Logo Change<div class="border-bottom border-3 border-primary mb-2 mt-1 w-75"></div></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Logo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-body bg-light-gray">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        <form method="post" action="{{ route('setting.update_logo') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 m-auto">
                                        <p>Upload JPG or PNG image only. Size- Width: 354 Height: 75</p>
                                        <div class="form-group">
                                            <label for="">Logo File <span class="text-danger">*</span></label>
                                            <input type="file" name="file" class="form-control form-control-gm" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 text-center">
                                        <hr>    
                                        <input type="submit" name="btnSubmit" class="btn btn-primary" value="Save Logo">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection