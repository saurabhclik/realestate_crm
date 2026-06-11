@extends('mobile.layouts.app')

@section('content')
    <div class="daily-report-container">
        <form id="dailyReportForm" method="POST" action="{{route('mobile.mis-form-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-section">
                <h3 class="section-title">MIS for sales</h3>
                <div class="form-group">
                    <label for="week">Date Range</label>
                    <select name="week" id="week" class="form-control">
                        @foreach($weeks as $key => $week)
                            <option value="{{ $key }}" {{ $week['selected'] ? 'selected' : '' }}>
                                {{ $week['label'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="team">Select Team</label>
                    <select name="team" id="team" class="form-control">
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
                @foreach($misPoints as $point)
                    @php
                        $fieldName = \Illuminate\Support\Str::slug($point->point_name, '_');
                        $isLunchField = str_contains(strtolower($point->point_name), 'lunch');
                        $isAmountField = str_contains(strtolower($point->point_name), 'amount') || str_contains(strtolower($point->point_name), '₹');
                    @endphp

                    <div class="form-group">
                        <label for="{{ $fieldName }}">
                            {{ $point->point_name }}
                        </label>

                        @if($isLunchField)
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="{{ $fieldName }}" value="yes" {{ old($fieldName) == 'yes' ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="{{ $fieldName }}" value="no" {{ old($fieldName) == 'yes' ? '' : 'checked' }}> No
                                </label>
                            </div>
                            <small class="form-note">If yes, share details in the WhatsApp group</small>
                        @elseif($isAmountField)
                            <input type="number" id="{{ $fieldName }}" name="{{ $fieldName }}" value="{{ old($fieldName) }}" min="0"
                                step="0.01" class="form-input" placeholder="Enter amount in ₹">
                        @else
                            <input type="number" id="{{ $fieldName }}" name="{{ $fieldName }}" value="{{ old($fieldName) }}" min="0"
                                class="form-input" placeholder="Enter number">
                        @endif

                        @error($fieldName)
                            <span class="error-message" style="color: red; font-size: 0.85rem;">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Submit Report</button>
                <button type="reset" class="btn btn-secondary">Reset Form</button>
            </div>
        </form>
    </div>

    <style>
        .daily-report-container {
            padding: 15px;
            max-width: 100%;
            margin: 0 auto;
        }

        .form-section {
            margin-bottom: 25px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            margin-top: 0;
            margin-bottom: 15px;
            color: #444;
            font-size: 1.2rem;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .radio-group {
            display: flex;
            gap: 15px;
            margin-top: 5px;
        }

        .radio-label {
            display: flex;
            align-items: center;
            font-weight: normal;
        }

        .radio-label input {
            margin-right: 5px;
        }

        .form-note {
            display: block;
            margin-top: 5px;
            font-size: 0.85rem;
            color: #666;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #545b62;
        }

        .error-message {
            display: block;
            margin-top: 5px;
            color: #dc3545;
            font-size: 0.85rem;
        }

        @media (max-width: 480px) {
            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
@endsection