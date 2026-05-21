
@extends('layouts.app')
@section('title', 'Edit Data #' . $data->id)
@section('content')
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
        border-left: 4px solid #007bff;
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
                            Edit Data #{{ $data->id }}
                        </h5>    
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('data-center.update', $data->id) }}"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')

                            <div class="section-header">
                                <i class="fas fa-user"></i> Basic Details
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                        value="{{ old('name', $data->name) }}" required>
                                    <div class="invalid-feedback">
                                        @error('name') {{ $message }} @else Please enter a name @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', $data->email) }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="phone">Phone No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                                        value="{{ old('phone', $data->phone) }}" required>
                                    <div class="invalid-feedback">
                                        @error('phone') {{ $message }} @else Please enter a phone number @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select class="select2" name="state" id="state">
                                        <option value="">-- Select State --</option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->state }}" {{ old('state', $data->state) == $state->state ? 'selected' : '' }}>
                                            {{ $state->state }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="city">City</label>
                                    <select class="select2" name="city" id="city">
                                        <option value="">-- Select City --</option>
                                        @foreach($cities as $city)
                                        <option value="{{ $city->city }}" {{ old('city', $data->city) == $city->city ? 'selected' : '' }}>
                                            {{ $city->city }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="source">Source</label>
                                    <select class="select2" name="source" id="source">
                                        <option value="">-- Select Source --</option>
                                        @foreach($sources as $source)
                                        <option value="{{ $source->id }}" {{ old('source', $data->source) == $source->id ? 'selected' : '' }}>
                                            {{ $source->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="section-header mt-4">
                                <i class="fas fa-clipboard-list"></i> Requirements
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="property_type">Property Type</label>
                                    <select class="form-select select2" name="property_type" id="property_type">
                                        <option value="">-- Select Property Type --</option>
                                        @foreach($propertyTypes as $type)
                                        <option value="{{ $type->type }}" {{ old('property_type', $data->property_type) === $type->type ? 'selected' : '' }}>
                                            {{ $type->type }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="property_category">Property Category</label>
                                    <select class="select2" name="property_category" id="property_category">
                                        <option value="">-- Select Property Category --</option>
                                        @foreach($propertyCategories as $item)
                                        <option value="{{ $item->id }}" {{ old('property_category', $data->property_category) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="property_sub_category">Property Sub Category</label>
                                    <select class="select2" name="property_sub_category" id="property_sub_category">
                                        <option value="">-- Select Property Sub Category --</option>
                                        @foreach($subCategories as $sub)
                                        <option value="{{ $sub->id }}" {{ old('property_sub_category', $data->property_sub_category) == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="projects">Projects</label>
                                    <select class="select2" name="project_name[]" id="projects" multiple>
                                        <option value="">-- Select Project --</option>
                                        @php
                                        $selectedProjects = old('project_name', explode(',', $data->project_name ?? ''));
                                        @endphp
                                        @foreach($projects as $project)
                                        <option value="{{ $project->id }}" {{ in_array($project->id, $selectedProjects) ? 'selected' : '' }}>
                                            {{ $project->project_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="budget">Budget</label>
                                    <select class="select2" name="budget" id="budget">
                                        <option value="">Select Budget</option>
                                        <option value="10L-20L" {{ (old('budget', $data->budget) == '10L-20L') ? 'selected' : '' }}>₹10 Lakh - ₹20 Lakh</option>
                                        <option value="20L-30L" {{ (old('budget', $data->budget) == '20L-30L') ? 'selected' : '' }}>₹20 Lakh - ₹30 Lakh</option>
                                        <option value="30L-40L" {{ (old('budget', $data->budget) == '30L-40L') ? 'selected' : '' }}>₹30 Lakh - ₹40 Lakh</option>
                                        <option value="40L-50L" {{ (old('budget', $data->budget) == '40L-50L') ? 'selected' : '' }}>₹40 Lakh - ₹50 Lakh</option>
                                        <option value="50L-60L" {{ (old('budget', $data->budget) == '50L-60L') ? 'selected' : '' }}>₹50 Lakh - ₹60 Lakh</option>
                                        <option value="60L-70L" {{ (old('budget', $data->budget) == '60L-70L') ? 'selected' : '' }}>₹60 Lakh - ₹70 Lakh</option>
                                        <option value="70L-80L" {{ (old('budget', $data->budget) == '70L-80L') ? 'selected' : '' }}>₹70 Lakh - ₹80 Lakh</option>
                                        <option value="80L-90L" {{ (old('budget', $data->budget) == '80L-90L') ? 'selected' : '' }}>₹80 Lakh - ₹90 Lakh</option>
                                        <option value="90L-1Cr" {{ (old('budget', $data->budget) == '90L-1Cr') ? 'selected' : '' }}>₹90 Lakh - ₹1 Crore</option>
                                        <option value="1Cr-1.25Cr" {{ (old('budget', $data->budget) == '1Cr-1.25Cr') ? 'selected' : '' }}>₹1 Crore - ₹1.25 Crore</option>
                                        <option value="1.25Cr-1.5Cr" {{ (old('budget', $data->budget) == '1.25Cr-1.5Cr') ? 'selected' : '' }}>₹1.25 Crore - ₹1.5 Crore</option>
                                        <option value="1.5Cr-1.75Cr" {{ (old('budget', $data->budget) == '1.5Cr-1.75Cr') ? 'selected' : '' }}>₹1.5 Crore - ₹1.75 Crore</option>
                                        <option value="1.75Cr-2Cr" {{ (old('budget', $data->budget) == '1.75Cr-2Cr') ? 'selected' : '' }}>₹1.75 Crore - ₹2 Crore</option>
                                        <option value="2Cr-2.25Cr" {{ (old('budget', $data->budget) == '2Cr-2.25Cr') ? 'selected' : '' }}>₹2 Crore - ₹2.25 Crore</option>
                                        <option value="2.25Cr-3Cr" {{ (old('budget', $data->budget) == '2.25Cr-3Cr') ? 'selected' : '' }}>₹2.25 Crore - ₹3 Crore</option>
                                        <option value="3Cr-3.5Cr" {{ (old('budget', $data->budget) == '3Cr-3.5Cr') ? 'selected' : '' }}>₹3 Crore - ₹3.5 Crore</option>
                                        <option value="3.5Cr-5Cr" {{ (old('budget', $data->budget) == '3.5Cr-5Cr') ? 'selected' : '' }}>₹3.5 Crore - ₹5 Crore</option>
                                        <option value="5Cr-10Cr" {{ (old('budget', $data->budget) == '5Cr-10Cr') ? 'selected' : '' }}>₹5 Crore - ₹10 Crore</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="comment">Comment:</label>
                                    <textarea id="comment" name="comment" rows="3" placeholder="Type your comment here..." class="form-control">{{ old('comment', $data->comment) }}</textarea>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"> Update Data
                                    </button>
                                    <a href="{{ route('data-center.index') }}" class="btn btn-secondary">Cancel</a>
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