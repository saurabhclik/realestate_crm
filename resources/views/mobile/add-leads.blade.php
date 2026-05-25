@extends('mobile.layouts.app')

@section('content')
@php
    $mode = isset($lead) ? 'edit' : 'add';
    $title = ($mode === 'edit') ? 'Edit Lead #' . $lead->id : 'Create New Lead';
    $icon = ($mode === 'edit') ? 'fa-pen-nib' : 'fa-plus-circle';
@endphp
@include('mobile.partials.back-button')
<div class="app-form-container">
    <form method="POST"
        action="{{ isset($lead) ? route('mobile.update-lead', $lead->id) : route('mobile.create-leads') }}"
        class="needs-validation" novalidate>
        @csrf
        @if(isset($lead))
            @method('PUT')
        @endif
        <div class="form-section-card">
            <div class="section-header">
                <i class="fas fa-info-circle section-icon"></i>
                <h2 class="section-title">Lead Information</h2>
            </div>
            <div class="form-group">
                <label for="type" class="form-label">Type</label>
                <select class="form-control select2" name="type" id="type" required>
                    <option value="">-- Select Type --</option>
                    <option value="Residential" {{ (isset($lead) && $lead->type == 'Residential') ? 'selected' : '' }}>Residential</option>
                    <option value="Commercial" {{ (isset($lead) && $lead->type == 'Commercial') ? 'selected' : '' }}>Commercial</option>
                </select>
                <div class="invalid-feedback">Please select a type</div>
            </div>

            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <select class="select2 form-control" name="category" id="category" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categorys as $cat)
                        <option value="{{ $cat->id }}" 
                            {{ isset($currentCategory) && $currentCategory->id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a category</div>
            </div>

            <div class="form-group">
                <label for="sub_category" class="form-label">Sub Category</label>
                <select class="form-control select2" name="sub_category" id="sub_category" required>
                    <option value="">-- Select Sub Category --</option>
                    @if(isset($currentSubCategory))
                        <option value="{{ $currentSubCategory->id }}" selected>
                            {{ $currentSubCategory->name }}
                        </option>
                    @endif
                </select>
                <div class="invalid-feedback">Please select a sub category</div>
            </div>

            <div class="form-group">
                <label for="source" class="form-label">Source</label>
                <select class="form-control select2" name="source" id="source" required>
                    <option value="">-- Select Source --</option>
                    @foreach($sources as $source)
                        <option value="{{ $source->name }}"
                            {{ (isset($currentSource) && $currentSource == $source->name) ? 'selected' : '' }}>
                            {{ $source->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a source</div>
            </div>

            <div class="form-group">
                <label for="campaign" class="form-label">Campaign</label>
                <select class="form-control select2" name="campaign" id="campaign" required>
                    <option value="">-- Select Campaign --</option>
                    @foreach($campaigns as $campaign)
                        <option value="{{ $campaign->name }}"
                            {{ (isset($lead) && $lead->campaign == $campaign->name) ? 'selected' : '' }}>
                            {{ $campaign->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a campaign</div>
            </div>

            <div class="form-group">
                <label for="classification" class="form-label">Classification</label>
                <select class="form-control select2" name="classification" id="classification" required>
                    <option value="">-- Select Classification --</option>
                    <option value="hot" {{ (isset($lead) && $lead->classification == 'hot') ? 'selected' : '' }}>Hot</option>
                    <option value="cold" {{ (isset($lead) && $lead->classification == 'cold') ? 'selected' : '' }}>Cold</option>
                    <option value="warm" {{ (isset($lead) && $lead->classification == 'warm') ? 'selected' : '' }}>Warm</option>
                </select>
                <div class="invalid-feedback">Please select a classification</div>
            </div>

            <div class="form-group">
                <label for="project" class="form-label">Project</label>
                <select class="form-control select2" name="projects" id="project">
                    <option value="">-- Select Project --</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}"
                            {{ (isset($lead) && $lead->project_id == $project->id) ? 'selected' : '' }}>
                            {{ $project->project_name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a project</div>
            </div>
        </div>

        <div class="form-section-card">
            <div class="section-header">
                <i class="fas fa-user section-icon"></i>
                <h2 class="section-title">Contact Information</h2>
            </div>
            <div class="form-group floating-form">
                <label class="label-name" for="name"> 
                </label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($lead) ? $lead->name : old('name') }}"
                    placeholder="Name" autocomplete="off" required>
                <div class="invalid-feedback">Please enter a name</div>
            </div>
            <div class="form-row">
                <div class="form-group floating-form">
                    <label class="label-name" for="email">
                    </label>
                    <input type="email" class="form-control" name="email" id="email"
                    value="{{ isset($lead) ? $lead->email : old('email') }}"
                    placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group floating-form">
                    <label class="label-name" for="phone">
                    </label>
                    <input type="text" class="form-control" name="phone" id="phone"
                        value="{{ isset($lead) ? $lead->phone : old('phone') }}"
                        placeholder="Phone" autocomplete="off" required>
                    <div class="invalid-feedback">Please enter a phone number</div>
                </div>
                <div class="form-group floating-form">
                    <label class="label-name" for="whatsapp"></label>
                    <input type="text" class="form-control" name="whatsapp" id="alternative"
                    value="{{ isset($lead) ? $lead->whatsapp_no : old('whatsapp') }}"
                    placeholder="Alternative Number" autocomplete="off">
                </div>
            </div>

            <div class="form-group floating-form">
                <label class="label-name" for="state">
                </label>
                <select class="form-select select2" name="field1" id="state" required>
                    <option value="">-- Select State --</option>
                    @php
                        $states = DB::table('state_district')->select('state')->distinct()->orderBy('state', 'asc')->get();
                    @endphp
                    @foreach($states as $st)
                        <option value="{{ $st->state }}"
                            {{ (isset($lead) && $lead->field1 == $st->state) ? 'selected' : '' }}>
                            {{ $st->state }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a state</div>
            </div>

            <div class="form-group floating-form">
                <label class="label-name" for="city">
                </label>
                <select class="form-select select2" name="field2" id="city" required>
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
                <div class="invalid-feedback">Please select a city</div>
            </div>

            <div class="form-group floating-form">
                <label class="label-name" for="address">
                </label>
                <input type="text" class="form-control" name="field3" id="address"
                    value="{{ isset($lead) ? $lead->field3 : old('field3') }}"
                    placeholder="Address" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="budget" class="form-label">Budget</label>
                <select class="form-control select2" name="budget" id="budget">
                    <option value="">Select Budget</option>
                    @php
                        $ranges = [
                            '10L-20L','20L-30L','30L-40L','40L-50L','50L-60L',
                            '60L-70L','70L-80L','80L-90L','90L-1Cr',
                            '1Cr-1.25Cr','1.25Cr-1.5Cr','1.5Cr-1.75Cr','1.75Cr-2Cr',
                            '2Cr-2.25Cr','2.25Cr-2.5Cr','2.5Cr-2.75Cr','2.75Cr-3Cr',
                            '3Cr-3.25Cr','3.25Cr-3.5Cr','3.5Cr-3.75Cr','3.75Cr-4Cr',
                            '4Cr-4.25Cr','4.25Cr-4.5Cr','4.5Cr-4.75Cr','4.75Cr-5Cr',
                            '5Cr-5.5Cr','5.5Cr-6Cr','6Cr-6.5Cr','6.5Cr-7Cr',
                            '7Cr-7.5Cr','7.5Cr-8Cr','8Cr-8.5Cr','8.5Cr-9Cr',
                            '9Cr-9.5Cr','9.5Cr-10Cr',
                            '10Cr-11Cr','11Cr-12Cr','12Cr-13Cr','13Cr-14Cr',
                            '14Cr-15Cr','15Cr-16Cr','16Cr-17Cr','17Cr-18Cr',
                            '18Cr-19Cr','19Cr-20Cr','20Cr-21Cr','21Cr-22Cr',
                            '22Cr-23Cr','23Cr-24Cr','24Cr-25Cr',
                            '25Cr-27Cr','27Cr-29Cr','29Cr-31Cr','31Cr-33Cr',
                            '33Cr-35Cr','35Cr-37Cr','37Cr-39Cr','39Cr-41Cr',
                            '41Cr-43Cr','43Cr-45Cr','45Cr-47Cr','47Cr-49Cr','49Cr-51Cr',
                            '50Cr-55Cr','55Cr-60Cr','60Cr-65Cr','65Cr-70Cr',
                            '70Cr-75Cr','75Cr-80Cr','80Cr-85Cr','85Cr-90Cr',
                            '90Cr-95Cr','95Cr-100Cr',
                            '100Cr-110Cr','110Cr-120Cr','120Cr-130Cr','130Cr-140Cr',
                            '140Cr-150Cr','150Cr-160Cr','160Cr-170Cr','170Cr-180Cr',
                            '180Cr-190Cr','190Cr-200Cr','200Cr-210Cr','210Cr-220Cr',
                            '220Cr-230Cr','230Cr-240Cr','240Cr-250Cr'
                        ];
                    @endphp
                    @foreach($ranges as $range)
                        <option value="{{ $range }}"
                            {{ (isset($lead) && $lead->budget == $range) ? 'selected' : '' }}>
                            ₹{{ str_replace(['L', 'Cr'], [' Lakh', ' Crore'], str_replace('-', ' - ₹', $range)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-actions" style="margin-bottom:6.5rem;">
            <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true" id="submitLoader"></span>
            <button type="submit" class="submit-button w-50 btn-primary" id="submitButton">
                <span class="spinner-border spinner-border-sm ms-2 me-2" role="status" aria-hidden="true" id="buttonLoader" style="display:none"></span>
                <i class="fas fa-save button-icon"></i>
                <span class="button-text">
                    {{ isset($lead) ? 'Update Lead' : 'Create Lead' }}
                </span>
            </button>
        </div>
    </form>
</div>
@endsection
