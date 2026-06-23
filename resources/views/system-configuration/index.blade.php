@extends('layouts.app')

@section('title', 'System Configuration | Pro-leadexpertz')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="p-3 rounded-3">
                        <div class="d-flex align-items-start justify-content-between gap-2">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-cogs fs-5 mt-1"></i>
                                <div>
                                    <div class="fw-bold h4 mb-1">
                                        System Configuration
                                    </div>
                                    <div class="border-bottom border-3 border-primary mb-2 w-25"></div>
                                    <div class="small text-muted">
                                        Manage CRM settings, logs, ratings and system controls
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-info btn-sm rounded-pill" data-bs-toggle="modal"
                                data-bs-target="#softwareGuideModal">
                                <i class="fas fa-book-open me-1"></i>
                                Software Guide & Glossary
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 cursor-pointer"
                        onclick="window.location='{{ route('data-center-actions.index') }}'">
                        <div class="card-body p-3 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:38px;height:38px;">
                                    <i class="fas fa-tasks fs-6"></i>
                                </div>
                                <div class="fw-semibold fs-6">Data Center Actions</div>
                            </div>
                            <div class="small text-muted flex-grow-1">
                                Manage popup action checkboxes like Converted, Rejected, Followup.
                            </div>
                            <div class="small mt-2 text-danger">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                Changing affects Data Center popup checkboxes.
                            </div>
                            <div class="mt-2 d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted">Configure</small>
                                <i class="fas fa-arrow-right text-warning small"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 cursor-pointer"
                        onclick="window.location='{{ route('lead-status.index') }}'">
                        <div class="card-body p-3 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:38px;height:38px;">
                                    <i class="fas fa-stream fs-6 text-light"></i>
                                </div>
                                <div class="fw-semibold fs-6">Lead Status</div>
                            </div>
                            <div class="small text-muted flex-grow-1">
                                Manage CRM workflow stages, pipeline structure and lead journey flow.
                            </div>
                            <div class="small mt-2 text-warning">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                Changing sequence affects dashboard flow.
                            </div>
                            <div class="mt-2 d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted">Configure</small>
                                <i class="fas fa-arrow-right text-primary small"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 cursor-pointer"
                        onclick="window.location='{{ route('setting.login_log') }}'">
                        <div class="card-body p-3 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:38px;height:38px;">
                                    <i class="fas fa-sign-in-alt fs-6"></i>
                                </div>
                                <div class="fw-semibold fs-6">Login Logs</div>
                            </div>
                            <div class="small text-muted flex-grow-1">
                                Track user login history, device access and authentication logs.
                            </div>
                            <div class="small mt-2 text-success">
                                <i class="fas fa-shield-alt me-1"></i>
                                Used for security monitoring.
                            </div>
                            <div class="mt-2 d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted">View</small>
                                <i class="fas fa-arrow-right text-success small"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 cursor-pointer"
                        onclick="window.location='{{ route('integrations.index') }}'">
                        <div class="card-body p-3 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:38px;height:38px;">
                                    <i class="fas fa-plug fs-6"></i>
                                </div>
                                <div class="fw-semibold fs-6">Integrations</div>
                            </div>
                            <div class="small text-muted flex-grow-1">
                                Connect third-party services, APIs, WhatsApp, email systems and external CRM tools.
                            </div>
                            <div class="small mt-2 text-warning">
                                <i class="fas fa-link me-1"></i>
                                Manage external service connections.
                            </div>
                            <div class="mt-2 d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted">Configure</small>
                                <i class="fas fa-arrow-right text-warning small"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 cursor-pointer"
                        onclick="window.location='{{ route('setting.logo') }}'">
                        <div class="card-body p-3 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-danger bg-opacity-10 text-danger rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:38px;height:38px;">
                                    <i class="fas fa-image fs-6"></i>
                                </div>
                                <div class="fw-semibold fs-6">Change Logo</div>
                            </div>
                            <div class="small text-muted flex-grow-1">
                                Upload and update your system logo to customize branding across the application.
                            </div>
                            <div class="small mt-2 text-danger">
                                <i class="fas fa-upload me-1"></i>
                                Branding settings.
                            </div>
                            <div class="mt-2 d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted">Update</small>
                                <i class="fas fa-arrow-right text-danger small"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.software-guild')
@endsection