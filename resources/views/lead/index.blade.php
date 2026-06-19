@extends('layouts.app')

@section('title', isset($lead) ? 'Edit Lead #' . $lead->id : 'Create New Lead')

@section('content')
@php
$activeFeatures = session('active_features', []);
$softwareType = session('software_type', 'real_state');
$isLeadManagement = $softwareType === 'lead_management';
$isEdit = isset($lead);
$userType = session('user_type');
$canAssignLead = in_array($userType, ['admin', 'team_manager']);
$childIds = session('child_ids');
$childIdArray = $childIds ? explode(',', str_replace(' ', '', $childIds)) : [];
$userType = session('user_type');
$canAssignLead = in_array($userType, ['admin', 'team_manager']);

if ($userType === 'admin')
{
$users = DB::table('users')->get();
}
else
{
$users = DB::table('users')
->whereIn('id', $childIdArray)
->get();
}
@endphp
<style>
    .cust-badge {
        white-space: normal;
        padding: 6px 10px;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    .dataTables_scroll {
        overflow: auto;
    }

    .dataTables_scrollHead {
        position: sticky;
        top: 0;
        z-index: 10;
        background: white;
    }

    .dataTables_scrollBody {
        max-height: 100% !important;
    }

    #table_filter {
        margin: 10px;
    }

    .section-header {
        background-color: #f8f9fa;
        padding: 10px 15px;
        margin-bottom: 20px;
        border-left: 4px solid #3762b8;
        font-weight: 600;
        font-size: 1.1rem;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">
                            @if(isset($lead))
                            Edit Lead #{{ $lead->id }}
                            @else
                            Create New Lead
                            @endif
                            <div class="border-bottom border-3 border-primary mb-2 mt-1 w-75"></div>
                        </h5>
                        <div>
                            @if(session('import_messages'))
                            <div class="mt-4">
                                @foreach(session('import_messages') as $message)
                                @php
                                $type = 'info';
                                $text = $message;
                                if (strpos($message, 'success') === 0) {
                                $type = 'success';
                                $text = substr($message, 7);
                                } elseif (strpos($message, 'warning') === 0) {
                                $type = 'warning';
                                $text = substr($message, 7);
                                } elseif (strpos($message, 'error') === 0) {
                                $type = 'error';
                                $text = substr($message, 5);
                                }
                                @endphp
                                <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
                                    {!! $text !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if(!isset($lead))
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                                <i class="fas fa-file-import"></i> Bulk Import
                            </button>
                            @if(in_array('shared_lead_form', $activeFeatures))
                            <button type="button" class="btn btn-info btn-sm" id="shareLeadForm" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="fas fa-share-alt"></i> Share Lead Form
                            </button>
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-light">
                                    <h5 class="modal-title" id="shareModalLabel">Share Lead Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-2">Share this link to allow others to submit a lead.</p>
                                    <div class="alert alert-warning p-2 small" role="alert">
                                        ⚠️ This form link will expire in <strong>7 days</strong>.
                                    </div>
                                    <input type="text" id="shareLink" class="form-control" readonly>
                                    <div class="mt-3 d-flex flex-wrap gap-2">
                                        <a href="#" id="shareWhatsApp" class="btn btn-success btn-sm">
                                            <i class="fab fa-whatsapp"></i> WhatsApp
                                        </a>
                                        <a href="#" id="shareEmail" class="btn btn-primary btn-sm">
                                            <i class="fas fa-envelope"></i> Email
                                        </a>
                                        <a href="#" id="shareTelegram" class="btn btn-info btn-sm text-white">
                                            <i class="fab fa-telegram-plane"></i> Telegram
                                        </a>
                                        <a href="#" id="shareFacebook" class="btn btn-primary btn-sm">
                                            <i class="fab fa-facebook-f"></i> Facebook
                                        </a>
                                        <a href="#" id="shareLinkedIn" class="btn btn-primary btn-sm">
                                            <i class="fab fa-linkedin-in"></i> LinkedIn
                                        </a>
                                        <a href="#" id="shareTwitter" class="btn btn-info btn-sm text-white">
                                            <i class="fab fa-twitter"></i> Twitter
                                        </a>
                                        <button type="button" id="copyLink" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-copy"></i> Copy Link
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ isset($lead) ? route('lead.update', $lead->id) : route('lead.index') }}"
                            class="needs-validation" novalidate>
                            @csrf
                            @if(isset($lead))
                            @method('POST')
                            @endif
                            <div class="section-header">
                                <i class="fas fa-user"></i> Customer Details
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ isset($lead) ? $lead->name : old('name') }}" required>
                                    <div class="invalid-feedback">Please enter a name</div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="email">Email <span class=" fw-normal">(Optional)</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ isset($lead) ? $lead->email : old('email') }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="phone">Phone No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="{{ isset($lead) ? $lead->phone : old('phone') }}" required>
                                    <div class="invalid-feedback">Please enter a phone number</div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="whatsapp">Alternative Number <span class=" fw-normal">(Optional)</span></label>
                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                        value="{{ isset($lead) ? $lead->whatsapp_no : old('whatsapp') }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="state">State <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="field1" id="state">
                                        <option value="">-- Select State --</option>
                                        @php
                                        $states = DB::table('state_district')->select('state')->distinct()->orderBy('state', 'asc')->get();
                                        @endphp
                                        @foreach($states as $state)
                                        <option value="{{ $state->state }}"
                                            {{ (isset($lead) && $lead->field1 == $state->state) ? 'selected' : '' }}>
                                            {{ $state->state }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="city">City <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="field2" id="city">
                                        <option value="">-- Select City --</option>
                                        @if(isset($lead) && $lead->field1)
                                        @php
                                        $cities = DB::table('state_district')
                                        ->where('state', $lead->field1)
                                        ->orderBy('District', 'asc')
                                        ->get();
                                        @endphp
                                        @foreach($cities as $city)
                                        <option value="{{ $city->District }}"
                                            {{ ($lead->field2 == $city->District) ? 'selected' : '' }}>
                                            {{ $city->District }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="address">Address <span class=" fw-normal">(Optional)</span></label>
                                    <textarea class="form-control" name="field3" id="address" rows="2">{{ isset($lead) ? $lead->field3 : old('address') }}</textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="source">Source <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="source" id="source">
                                        <option value="">-- Select Source --</option>
                                        @foreach($sources as $source)
                                        <option value="{{ $source->name }}"
                                            {{ (isset($currentSource) && $currentSource == $source->name) ? 'selected' : '' }}>
                                            {{ $source->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="campaign">Campaign <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="campaign" id="campaign">
                                        <option value="">-- Select Campaign --</option>
                                        @foreach($campaigns as $campaign)
                                        <option value="{{ $campaign->name }}"
                                            {{ (isset($lead) && $lead->campaign == $campaign->name) ? 'selected' : '' }}>
                                            {{ $campaign->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="classification">Classification <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="classification" id="classification">
                                        <option value="">-- Select Classification --</option>
                                        <option value="hot" {{ (isset($lead) && $lead->classification == 'hot') ? 'selected' : '' }}>Hot</option>
                                        <option value="cold" {{ (isset($lead) && $lead->classification == 'cold') ? 'selected' : '' }}>Cold</option>
                                        <option value="warm" {{ (isset($lead) && $lead->classification == 'warm') ? 'selected' : '' }}>Warm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="section-header mt-4">
                                <i class="fas fa-clipboard-list"></i> Requirements
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="type">Property Type <span class=" fw-normal">(Optional)</span></label>
                                    <select class="form-select select2" name="type" id="type">
                                        <option value="">-- Select Property Type --</option>
                                        @foreach($categoryList as $type)
                                        <option value="{{ $type->name }}"
                                            {{ isset($lead) && $lead->type == $type->name ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="category">Property Category <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="category" id="category">
                                        <option value="">-- Select Property Category --</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="sub_category">Property Sub Category <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="sub_category" id="sub_category">
                                        <option value="">-- Select Property Sub Category --</option>
                                        @if(isset($currentSubCategory))
                                        <option value="{{ $currentSubCategory->id }}" selected>
                                            {{ $currentSubCategory->name }}
                                        </option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="projects">{{ $isLeadManagement ? 'Products' : 'Project' }} <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="projects[]" id="projects" multiple>
                                        <option value="">-- Select {{ $isLeadManagement ? 'Product(s)' : 'Project(s)' }} --</option>
                                        @foreach($projects as $project)
                                        <option value="{{ $project->id }}"
                                            {{ (isset($lead) && in_array($project->id, explode(',', $lead->project_id))) ? 'selected' : '' }}>
                                            {{ $project->project_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="req_state">State <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="property_state" id="property_state">
                                        <option value="">-- Select State --</option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->state }}"
                                            {{ (isset($lead) && $lead->req_state == $state->state) ? 'selected' : '' }}>
                                            {{ $state->state }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="req_city">City <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="property_city" id="property_city">
                                        <option value="">-- Select City --</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="req_location">Location <span class=" fw-normal">(Optional)</span></label>
                                    <input type="text" class="form-control" name="property_location" id="property_location"
                                        value="{{ isset($lead) ? $lead->req_location : old('req_location') }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="budget">Budget <span class=" fw-normal">(Optional)</span></label>
                                    <select class="select2" name="budget" id="budget">
                                        <option value="">Select Budget</option>

                                        <!-- 10 Lakhs to 1 Crore (10 Lakhs gap) -->
                                        <option value="10L-20L" {{ (isset($lead) && $lead->budget == '10L-20L') || old('budget') == '10L-20L' ? 'selected' : '' }}>₹10 Lakh - ₹20 Lakh</option>
                                        <option value="20L-30L" {{ (isset($lead) && $lead->budget == '20L-30L') || old('budget') == '20L-30L' ? 'selected' : '' }}>₹20 Lakh - ₹30 Lakh</option>
                                        <option value="30L-40L" {{ (isset($lead) && $lead->budget == '30L-40L') || old('budget') == '30L-40L' ? 'selected' : '' }}>₹30 Lakh - ₹40 Lakh</option>
                                        <option value="40L-50L" {{ (isset($lead) && $lead->budget == '40L-50L') || old('budget') == '40L-50L' ? 'selected' : '' }}>₹40 Lakh - ₹50 Lakh</option>
                                        <option value="50L-60L" {{ (isset($lead) && $lead->budget == '50L-60L') || old('budget') == '50L-60L' ? 'selected' : '' }}>₹50 Lakh - ₹60 Lakh</option>
                                        <option value="60L-70L" {{ (isset($lead) && $lead->budget == '60L-70L') || old('budget') == '60L-70L' ? 'selected' : '' }}>₹60 Lakh - ₹70 Lakh</option>
                                        <option value="70L-80L" {{ (isset($lead) && $lead->budget == '70L-80L') || old('budget') == '70L-80L' ? 'selected' : '' }}>₹70 Lakh - ₹80 Lakh</option>
                                        <option value="80L-90L" {{ (isset($lead) && $lead->budget == '80L-90L') || old('budget') == '80L-90L' ? 'selected' : '' }}>₹80 Lakh - ₹90 Lakh</option>
                                        <option value="90L-1Cr" {{ (isset($lead) && $lead->budget == '90L-1Cr') || old('budget') == '90L-1Cr' ? 'selected' : '' }}>₹90 Lakh - ₹1 Crore</option>

                                        <!-- 1 Crore to 5 Crore (25 Lakhs gap) -->
                                        <option value="1Cr-1.25Cr" {{ (isset($lead) && $lead->budget == '1Cr-1.25Cr') || old('budget') == '1Cr-1.25Cr' ? 'selected' : '' }}>₹1 Crore - ₹1.25 Crore</option>
                                        <option value="1.25Cr-1.5Cr" {{ (isset($lead) && $lead->budget == '1.25Cr-1.5Cr') || old('budget') == '1.25Cr-1.5Cr' ? 'selected' : '' }}>₹1.25 Crore - ₹1.5 Crore</option>
                                        <option value="1.5Cr-1.75Cr" {{ (isset($lead) && $lead->budget == '1.5Cr-1.75Cr') || old('budget') == '1.5Cr-1.75Cr' ? 'selected' : '' }}>₹1.5 Crore - ₹1.75 Crore</option>
                                        <option value="1.75Cr-2Cr" {{ (isset($lead) && $lead->budget == '1.75Cr-2Cr') || old('budget') == '1.75Cr-2Cr' ? 'selected' : '' }}>₹1.75 Crore - ₹2 Crore</option>
                                        <option value="2Cr-2.25Cr" {{ (isset($lead) && $lead->budget == '2Cr-2.25Cr') || old('budget') == '2Cr-2.25Cr' ? 'selected' : '' }}>₹2 Crore - ₹2.25 Crore</option>
                                        <option value="2.25Cr-2.5Cr" {{ (isset($lead) && $lead->budget == '2.25Cr-2.5Cr') || old('budget') == '2.25Cr-2.5Cr' ? 'selected' : '' }}>₹2.25 Crore - ₹2.5 Crore</option>
                                        <option value="2.5Cr-2.75Cr" {{ (isset($lead) && $lead->budget == '2.5Cr-2.75Cr') || old('budget') == '2.5Cr-2.75Cr' ? 'selected' : '' }}>₹2.5 Crore - ₹2.75 Crore</option>
                                        <option value="2.75Cr-3Cr" {{ (isset($lead) && $lead->budget == '2.75Cr-3Cr') || old('budget') == '2.75Cr-3Cr' ? 'selected' : '' }}>₹2.75 Crore - ₹3 Crore</option>
                                        <option value="3Cr-3.25Cr" {{ (isset($lead) && $lead->budget == '3Cr-3.25Cr') || old('budget') == '3Cr-3.25Cr' ? 'selected' : '' }}>₹3 Crore - ₹3.25 Crore</option>
                                        <option value="3.25Cr-3.5Cr" {{ (isset($lead) && $lead->budget == '3.25Cr-3.5Cr') || old('budget') == '3.25Cr-3.5Cr' ? 'selected' : '' }}>₹3.25 Crore - ₹3.5 Crore</option>
                                        <option value="3.5Cr-3.75Cr" {{ (isset($lead) && $lead->budget == '3.5Cr-3.75Cr') || old('budget') == '3.5Cr-3.75Cr' ? 'selected' : '' }}>₹3.5 Crore - ₹3.75 Crore</option>
                                        <option value="3.75Cr-4Cr" {{ (isset($lead) && $lead->budget == '3.75Cr-4Cr') || old('budget') == '3.75Cr-4Cr' ? 'selected' : '' }}>₹3.75 Crore - ₹4 Crore</option>
                                        <option value="4Cr-4.25Cr" {{ (isset($lead) && $lead->budget == '4Cr-4.25Cr') || old('budget') == '4Cr-4.25Cr' ? 'selected' : '' }}>₹4 Crore - ₹4.25 Crore</option>
                                        <option value="4.25Cr-4.5Cr" {{ (isset($lead) && $lead->budget == '4.25Cr-4.5Cr') || old('budget') == '4.25Cr-4.5Cr' ? 'selected' : '' }}>₹4.25 Crore - ₹4.5 Crore</option>
                                        <option value="4.5Cr-4.75Cr" {{ (isset($lead) && $lead->budget == '4.5Cr-4.75Cr') || old('budget') == '4.5Cr-4.75Cr' ? 'selected' : '' }}>₹4.5 Crore - ₹4.75 Crore</option>
                                        <option value="4.75Cr-5Cr" {{ (isset($lead) && $lead->budget == '4.75Cr-5Cr') || old('budget') == '4.75Cr-5Cr' ? 'selected' : '' }}>₹4.75 Crore - ₹5 Crore</option>

                                        <!-- 5 Crore to 10 Crore (50 Lakhs gap) -->
                                        <option value="5Cr-5.5Cr" {{ (isset($lead) && $lead->budget == '5Cr-5.5Cr') || old('budget') == '5Cr-5.5Cr' ? 'selected' : '' }}>₹5 Crore - ₹5.5 Crore</option>
                                        <option value="5.5Cr-6Cr" {{ (isset($lead) && $lead->budget == '5.5Cr-6Cr') || old('budget') == '5.5Cr-6Cr' ? 'selected' : '' }}>₹5.5 Crore - ₹6 Crore</option>
                                        <option value="6Cr-6.5Cr" {{ (isset($lead) && $lead->budget == '6Cr-6.5Cr') || old('budget') == '6Cr-6.5Cr' ? 'selected' : '' }}>₹6 Crore - ₹6.5 Crore</option>
                                        <option value="6.5Cr-7Cr" {{ (isset($lead) && $lead->budget == '6.5Cr-7Cr') || old('budget') == '6.5Cr-7Cr' ? 'selected' : '' }}>₹6.5 Crore - ₹7 Crore</option>
                                        <option value="7Cr-7.5Cr" {{ (isset($lead) && $lead->budget == '7Cr-7.5Cr') || old('budget') == '7Cr-7.5Cr' ? 'selected' : '' }}>₹7 Crore - ₹7.5 Crore</option>
                                        <option value="7.5Cr-8Cr" {{ (isset($lead) && $lead->budget == '7.5Cr-8Cr') || old('budget') == '7.5Cr-8Cr' ? 'selected' : '' }}>₹7.5 Crore - ₹8 Crore</option>
                                        <option value="8Cr-8.5Cr" {{ (isset($lead) && $lead->budget == '8Cr-8.5Cr') || old('budget') == '8Cr-8.5Cr' ? 'selected' : '' }}>₹8 Crore - ₹8.5 Crore</option>
                                        <option value="8.5Cr-9Cr" {{ (isset($lead) && $lead->budget == '8.5Cr-9Cr') || old('budget') == '8.5Cr-9Cr' ? 'selected' : '' }}>₹8.5 Crore - ₹9 Crore</option>
                                        <option value="9Cr-9.5Cr" {{ (isset($lead) && $lead->budget == '9Cr-9.5Cr') || old('budget') == '9Cr-9.5Cr' ? 'selected' : '' }}>₹9 Crore - ₹9.5 Crore</option>
                                        <option value="9.5Cr-10Cr" {{ (isset($lead) && $lead->budget == '9.5Cr-10Cr') || old('budget') == '9.5Cr-10Cr' ? 'selected' : '' }}>₹9.5 Crore - ₹10 Crore</option>

                                        <!-- 10 Crore to 25 Crore (1 Crore gap) -->
                                        <option value="10Cr-11Cr" {{ (isset($lead) && $lead->budget == '10Cr-11Cr') || old('budget') == '10Cr-11Cr' ? 'selected' : '' }}>₹10 Crore - ₹11 Crore</option>
                                        <option value="11Cr-12Cr" {{ (isset($lead) && $lead->budget == '11Cr-12Cr') || old('budget') == '11Cr-12Cr' ? 'selected' : '' }}>₹11 Crore - ₹12 Crore</option>
                                        <option value="12Cr-13Cr" {{ (isset($lead) && $lead->budget == '12Cr-13Cr') || old('budget') == '12Cr-13Cr' ? 'selected' : '' }}>₹12 Crore - ₹13 Crore</option>
                                        <option value="13Cr-14Cr" {{ (isset($lead) && $lead->budget == '13Cr-14Cr') || old('budget') == '13Cr-14Cr' ? 'selected' : '' }}>₹13 Crore - ₹14 Crore</option>
                                        <option value="14Cr-15Cr" {{ (isset($lead) && $lead->budget == '14Cr-15Cr') || old('budget') == '14Cr-15Cr' ? 'selected' : '' }}>₹14 Crore - ₹15 Crore</option>
                                        <option value="15Cr-16Cr" {{ (isset($lead) && $lead->budget == '15Cr-16Cr') || old('budget') == '15Cr-16Cr' ? 'selected' : '' }}>₹15 Crore - ₹16 Crore</option>
                                        <option value="16Cr-17Cr" {{ (isset($lead) && $lead->budget == '16Cr-17Cr') || old('budget') == '16Cr-17Cr' ? 'selected' : '' }}>₹16 Crore - ₹17 Crore</option>
                                        <option value="17Cr-18Cr" {{ (isset($lead) && $lead->budget == '17Cr-18Cr') || old('budget') == '17Cr-18Cr' ? 'selected' : '' }}>₹17 Crore - ₹18 Crore</option>
                                        <option value="18Cr-19Cr" {{ (isset($lead) && $lead->budget == '18Cr-19Cr') || old('budget') == '18Cr-19Cr' ? 'selected' : '' }}>₹18 Crore - ₹19 Crore</option>
                                        <option value="19Cr-20Cr" {{ (isset($lead) && $lead->budget == '19Cr-20Cr') || old('budget') == '19Cr-20Cr' ? 'selected' : '' }}>₹19 Crore - ₹20 Crore</option>
                                        <option value="20Cr-21Cr" {{ (isset($lead) && $lead->budget == '20Cr-21Cr') || old('budget') == '20Cr-21Cr' ? 'selected' : '' }}>₹20 Crore - ₹21 Crore</option>
                                        <option value="21Cr-22Cr" {{ (isset($lead) && $lead->budget == '21Cr-22Cr') || old('budget') == '21Cr-22Cr' ? 'selected' : '' }}>₹21 Crore - ₹22 Crore</option>
                                        <option value="22Cr-23Cr" {{ (isset($lead) && $lead->budget == '22Cr-23Cr') || old('budget') == '22Cr-23Cr' ? 'selected' : '' }}>₹22 Crore - ₹23 Crore</option>
                                        <option value="23Cr-24Cr" {{ (isset($lead) && $lead->budget == '23Cr-24Cr') || old('budget') == '23Cr-24Cr' ? 'selected' : '' }}>₹23 Crore - ₹24 Crore</option>
                                        <option value="24Cr-25Cr" {{ (isset($lead) && $lead->budget == '24Cr-25Cr') || old('budget') == '24Cr-25Cr' ? 'selected' : '' }}>₹24 Crore - ₹25 Crore</option>

                                        <!-- 25 Crore to 50 Crore (2 Crore gap) -->
                                        <option value="25Cr-27Cr" {{ (isset($lead) && $lead->budget == '25Cr-27Cr') || old('budget') == '25Cr-27Cr' ? 'selected' : '' }}>₹25 Crore - ₹27 Crore</option>
                                        <option value="27Cr-29Cr" {{ (isset($lead) && $lead->budget == '27Cr-29Cr') || old('budget') == '27Cr-29Cr' ? 'selected' : '' }}>₹27 Crore - ₹29 Crore</option>
                                        <option value="29Cr-31Cr" {{ (isset($lead) && $lead->budget == '29Cr-31Cr') || old('budget') == '29Cr-31Cr' ? 'selected' : '' }}>₹29 Crore - ₹31 Crore</option>
                                        <option value="31Cr-33Cr" {{ (isset($lead) && $lead->budget == '31Cr-33Cr') || old('budget') == '31Cr-33Cr' ? 'selected' : '' }}>₹31 Crore - ₹33 Crore</option>
                                        <option value="33Cr-35Cr" {{ (isset($lead) && $lead->budget == '33Cr-35Cr') || old('budget') == '33Cr-35Cr' ? 'selected' : '' }}>₹33 Crore - ₹35 Crore</option>
                                        <option value="35Cr-37Cr" {{ (isset($lead) && $lead->budget == '35Cr-37Cr') || old('budget') == '35Cr-37Cr' ? 'selected' : '' }}>₹35 Crore - ₹37 Crore</option>
                                        <option value="37Cr-39Cr" {{ (isset($lead) && $lead->budget == '37Cr-39Cr') || old('budget') == '37Cr-39Cr' ? 'selected' : '' }}>₹37 Crore - ₹39 Crore</option>
                                        <option value="39Cr-41Cr" {{ (isset($lead) && $lead->budget == '39Cr-41Cr') || old('budget') == '39Cr-41Cr' ? 'selected' : '' }}>₹39 Crore - ₹41 Crore</option>
                                        <option value="41Cr-43Cr" {{ (isset($lead) && $lead->budget == '41Cr-43Cr') || old('budget') == '41Cr-43Cr' ? 'selected' : '' }}>₹41 Crore - ₹43 Crore</option>
                                        <option value="43Cr-45Cr" {{ (isset($lead) && $lead->budget == '43Cr-45Cr') || old('budget') == '43Cr-45Cr' ? 'selected' : '' }}>₹43 Crore - ₹45 Crore</option>
                                        <option value="45Cr-47Cr" {{ (isset($lead) && $lead->budget == '45Cr-47Cr') || old('budget') == '45Cr-47Cr' ? 'selected' : '' }}>₹45 Crore - ₹47 Crore</option>
                                        <option value="47Cr-49Cr" {{ (isset($lead) && $lead->budget == '47Cr-49Cr') || old('budget') == '47Cr-49Cr' ? 'selected' : '' }}>₹47 Crore - ₹49 Crore</option>
                                        <option value="49Cr-51Cr" {{ (isset($lead) && $lead->budget == '49Cr-51Cr') || old('budget') == '49Cr-51Cr' ? 'selected' : '' }}>₹49 Crore - ₹51 Crore</option>

                                        <!-- 50 Crore to 100 Crore (5 Crore gap) -->
                                        <option value="50Cr-55Cr" {{ (isset($lead) && $lead->budget == '50Cr-55Cr') || old('budget') == '50Cr-55Cr' ? 'selected' : '' }}>₹50 Crore - ₹55 Crore</option>
                                        <option value="55Cr-60Cr" {{ (isset($lead) && $lead->budget == '55Cr-60Cr') || old('budget') == '55Cr-60Cr' ? 'selected' : '' }}>₹55 Crore - ₹60 Crore</option>
                                        <option value="60Cr-65Cr" {{ (isset($lead) && $lead->budget == '60Cr-65Cr') || old('budget') == '60Cr-65Cr' ? 'selected' : '' }}>₹60 Crore - ₹65 Crore</option>
                                        <option value="65Cr-70Cr" {{ (isset($lead) && $lead->budget == '65Cr-70Cr') || old('budget') == '65Cr-70Cr' ? 'selected' : '' }}>₹65 Crore - ₹70 Crore</option>
                                        <option value="70Cr-75Cr" {{ (isset($lead) && $lead->budget == '70Cr-75Cr') || old('budget') == '70Cr-75Cr' ? 'selected' : '' }}>₹70 Crore - ₹75 Crore</option>
                                        <option value="75Cr-80Cr" {{ (isset($lead) && $lead->budget == '75Cr-80Cr') || old('budget') == '75Cr-80Cr' ? 'selected' : '' }}>₹75 Crore - ₹80 Crore</option>
                                        <option value="80Cr-85Cr" {{ (isset($lead) && $lead->budget == '80Cr-85Cr') || old('budget') == '80Cr-85Cr' ? 'selected' : '' }}>₹80 Crore - ₹85 Crore</option>
                                        <option value="85Cr-90Cr" {{ (isset($lead) && $lead->budget == '85Cr-90Cr') || old('budget') == '85Cr-90Cr' ? 'selected' : '' }}>₹85 Crore - ₹90 Crore</option>
                                        <option value="90Cr-95Cr" {{ (isset($lead) && $lead->budget == '90Cr-95Cr') || old('budget') == '90Cr-95Cr' ? 'selected' : '' }}>₹90 Crore - ₹95 Crore</option>
                                        <option value="95Cr-100Cr" {{ (isset($lead) && $lead->budget == '95Cr-100Cr') || old('budget') == '95Cr-100Cr' ? 'selected' : '' }}>₹95 Crore - ₹100 Crore</option>

                                        <!-- 100 Crore to 250 Crore (10 Crore gap) -->
                                        <option value="100Cr-110Cr" {{ (isset($lead) && $lead->budget == '100Cr-110Cr') || old('budget') == '100Cr-110Cr' ? 'selected' : '' }}>₹100 Crore - ₹110 Crore</option>
                                        <option value="110Cr-120Cr" {{ (isset($lead) && $lead->budget == '110Cr-120Cr') || old('budget') == '110Cr-120Cr' ? 'selected' : '' }}>₹110 Crore - ₹120 Crore</option>
                                        <option value="120Cr-130Cr" {{ (isset($lead) && $lead->budget == '120Cr-130Cr') || old('budget') == '120Cr-130Cr' ? 'selected' : '' }}>₹120 Crore - ₹130 Crore</option>
                                        <option value="130Cr-140Cr" {{ (isset($lead) && $lead->budget == '130Cr-140Cr') || old('budget') == '130Cr-140Cr' ? 'selected' : '' }}>₹130 Crore - ₹140 Crore</option>
                                        <option value="140Cr-150Cr" {{ (isset($lead) && $lead->budget == '140Cr-150Cr') || old('budget') == '140Cr-150Cr' ? 'selected' : '' }}>₹140 Crore - ₹150 Crore</option>
                                        <option value="150Cr-160Cr" {{ (isset($lead) && $lead->budget == '150Cr-160Cr') || old('budget') == '150Cr-160Cr' ? 'selected' : '' }}>₹150 Crore - ₹160 Crore</option>
                                        <option value="160Cr-170Cr" {{ (isset($lead) && $lead->budget == '160Cr-170Cr') || old('budget') == '160Cr-170Cr' ? 'selected' : '' }}>₹160 Crore - ₹170 Crore</option>
                                        <option value="170Cr-180Cr" {{ (isset($lead) && $lead->budget == '170Cr-180Cr') || old('budget') == '170Cr-180Cr' ? 'selected' : '' }}>₹170 Crore - ₹180 Crore</option>
                                        <option value="180Cr-190Cr" {{ (isset($lead) && $lead->budget == '180Cr-190Cr') || old('budget') == '180Cr-190Cr' ? 'selected' : '' }}>₹180 Crore - ₹190 Crore</option>
                                        <option value="190Cr-200Cr" {{ (isset($lead) && $lead->budget == '190Cr-200Cr') || old('budget') == '190Cr-200Cr' ? 'selected' : '' }}>₹190 Crore - ₹200 Crore</option>
                                        <option value="200Cr-210Cr" {{ (isset($lead) && $lead->budget == '200Cr-210Cr') || old('budget') == '200Cr-210Cr' ? 'selected' : '' }}>₹200 Crore - ₹210 Crore</option>
                                        <option value="210Cr-220Cr" {{ (isset($lead) && $lead->budget == '210Cr-220Cr') || old('budget') == '210Cr-220Cr' ? 'selected' : '' }}>₹210 Crore - ₹220 Crore</option>
                                        <option value="220Cr-230Cr" {{ (isset($lead) && $lead->budget == '220Cr-230Cr') || old('budget') == '220Cr-230Cr' ? 'selected' : '' }}>₹220 Crore - ₹230 Crore</option>
                                        <option value="230Cr-240Cr" {{ (isset($lead) && $lead->budget == '230Cr-240Cr') || old('budget') == '230Cr-240Cr' ? 'selected' : '' }}>₹230 Crore - ₹240 Crore</option>
                                        <option value="240Cr-250Cr" {{ (isset($lead) && $lead->budget == '240Cr-250Cr') || old('budget') == '240Cr-250Cr' ? 'selected' : '' }}>₹240 Crore - ₹250 Crore</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="comment">Comment: <span class=" fw-normal">(Optional)</span></label>
                                    <textarea id="comment" name="comment" rows="3" placeholder="Type your comment here..." class="form-control">{{ isset($lead) ? $lead->last_comment : old('comment') }}</textarea>
                                </div>
                                @if($canAssignLead && !$isEdit)
                                <div class="col-md-4 mb-3">
                                    <label for="allocate-lead" class="form-label fw-semibold">
                                        ╰┈➤Assigned To (Optional)
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fa fa-person"></i>
                                        </span>
                                        <select id="allocate-lead" name="allocated_lead" class="form-select">
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ (isset($lead) && $lead->user_id == $user->id) ? 'selected' : '' }}
                                                data-user-role="{{ $user->role ?? 'team_member' }}">
                                                {{ $user->name }}
                                                @if(isset($user->role) && $user->role == 'manager')
                                                (Manager)
                                                @endif
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-text text-muted small">
                                        <i class="bi bi-info-circle me-1"></i>Select team member to assign this lead
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        @if(isset($lead))
                                        Update Lead
                                        @else
                                        Create Lead
                                        @endif
                                    </button>
                                    @if(isset($lead))
                                    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        @if(isset($lead))
        var initialType = '{{ $lead->type }}';
        var initialCategoryId = '{{ $lead->catg_id }}';
        var initialSubCategoryId = '{{ $lead->sub_catg_id }}';
        var initialReqState = '{{ $lead->property_state }}';
        var initialReqCity = '{{ $lead->property_city }}';
        $('#type').val(initialType);

        if (initialType) {
            loadCategories(initialType, initialCategoryId, initialSubCategoryId);
        }

        if (initialReqState) {
            $('#property_state').val(initialReqState);
            loadCities(initialReqState, '#property_city', initialReqCity);
        }
        @endif

        $('#type').change(function() {
            var type = $(this).val();
            if (type) {
                $('#category').html('<option value="">Loading...</option>');
                loadCategories(type);
            } else {
                $('#category').empty().append('<option value="">-- Select Property Category --</option>');
                $('#sub_category').empty().append('<option value="">-- Select Property Sub Category --</option>');
            }
        });

        $('#category').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $('#sub_category').html('<option value="">Loading...</option>');
                loadSubCategories(categoryId);
            } else {
                $('#sub_category').empty().append('<option value="">-- Select Property Sub Category --</option>');
            }
        });

        $('#state').change(function() {
            var state = $(this).val();
            loadCities(state, '#city');
        });

        $('#property_state').change(function() {
            var state = $(this).val();
            loadCities(state, '#property_city');
        });

        function loadCategories(type, selectedCategoryId = null, selectedSubCategoryId = null) {
            if (!type) return;
            $.ajax({
                url: '/lead/get-categories/' + encodeURIComponent(type),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#category').empty();
                    $('#category').append('<option value="">-- Select Property Category --</option>');

                    if (data && data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#category').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        if (selectedCategoryId) {
                            $('#category').val(selectedCategoryId);
                            if (selectedSubCategoryId) {
                                loadSubCategories(selectedCategoryId, selectedSubCategoryId);
                            }
                        }
                    } else {
                        $('#category').append('<option value="">No categories found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#category').empty().append('<option value="">Error loading categories</option>');
                    flasher.error('Failed to load categories');
                }
            });
        }

        function loadSubCategories(categoryId, selectedSubCategoryId = null) {
            if (!categoryId) return;
            $.ajax({
                url: '/lead/get-subcategories/' + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sub_category').empty();
                    $('#sub_category').append('<option value="">-- Select Property Sub Category --</option>');

                    if (data && data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#sub_category').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        if (selectedSubCategoryId) {
                            $('#sub_category').val(selectedSubCategoryId);
                        }
                    } else {
                        $('#sub_category').append('<option value="">No subcategories found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#sub_category').empty().append('<option value="">Error loading subcategories</option>');
                    flasher.error('Failed to load subcategories');
                }
            });
        }

        function loadCities(state, targetElement, selectedCity = null) {
            if (state) {
                $.ajax({
                    url: '/lead/get-cities/' + encodeURIComponent(state),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $(targetElement).empty();
                        $(targetElement).append('<option value="">-- Select City --</option>');

                        if (data && data.length > 0) {
                            $.each(data, function(key, value) {
                                $(targetElement).append('<option value="' + value.District + '">' + value.District + '</option>');
                            });

                            if (selectedCity) {
                                $(targetElement).val(selectedCity);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        flasher.error('Failed to load cities');
                    }
                });
            } else {
                $(targetElement).empty();
                $(targetElement).append('<option value="">-- Select City --</option>');
            }
        }
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        $('#shareLeadForm').click(function() {
            $.ajax({
                url: '{{ route("lead.generate-share-link") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        const link = response.link;
                        $('#shareLink').val(link);
                        $('#shareWhatsApp').attr('href', 'https://wa.me/?text=' + encodeURIComponent('Submit a lead using this link: ' + link));
                        $('#shareEmail').attr(
                            'href',
                            'mailto:?subject=' + encodeURIComponent('Submit a Lead') +
                            '&body=' + encodeURIComponent('Please submit a lead using this link: ' + link)
                        );
                        $('#shareTelegram').attr('href', 'https://t.me/share/url?url=' + encodeURIComponent(link) + '&text=' + encodeURIComponent('Submit a lead using this link'));
                        $('#shareFacebook').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(link));
                        $('#shareLinkedIn').attr('href', 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(link) + '&title=' + encodeURIComponent('Submit a Lead'));
                        $('#shareTwitter').attr('href', 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(link) + '&text=' + encodeURIComponent('Submit a lead using this link'));
                    } else {
                        flasher.error('Failed to generate share link: ' + response.message);
                    }
                },
                error: function() {
                    flasher.error('Error generating share link.');
                }
            });
        });

        $('#copyLink').click(function() {
            var link = $('#shareLink').val();
            navigator.clipboard.writeText(link).then(function() {
                flasher.success('Link copied to clipboard!');
            }, function() {
                flasher.error('Failed to copy link.');
            });
        });
    });
</script>
@endsection