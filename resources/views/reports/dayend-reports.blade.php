@extends('layouts.app')

@section('title', 'Dayend Reports')

@section('content')
<div class="page-content">
    <div class="container-fluid mt-4">
        <div class="card">
            <!-- Header and filters -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Dayend Reports</h4>
                <form method="GET" class="form-inline">
                    <div class="row">
                        <div class="col-5">
                            <label for="start-date">Start Date</label>
                            <input type="date" name="start_date" id="start-date"
                                   value="{{ $startDate }}" class="form-control" required>
                        </div>
                        <div class="col-5">
                            <label for="end-date">End Date</label>
                            <input type="date" name="end_date" id="end-date"
                                   value="{{ $endDate }}" class="form-control" required>
                        </div>
                        <div class="col-2 d-flex align-items-center mt-4">
                            <div class="d-flex gap-1">
                                <button class="btn btn-success btn-sm"><i class="fa-brands fa-searchengin"></i></button>
                                <a href="{{ route('report.dayend_reports') }}" class="btn btn-danger btn-sm text-light">
                                    <i class="fa-solid fa-rotate-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Body -->
            <div class="card-body">
                <!-- Export buttons -->
                <div class="d-flex gap-2 mb-3">
                    <button class="ReportbtnExportExcel shadow btn btn-success btn-sm d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Export table data to Excel">
                        <i class="fas fa-file-excel me-2"></i> Excel
                    </button>
                    <button class="ReportbtnExportPDF shadow btn btn-danger btn-sm d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Export table data to PDF">
                        <i class="fas fa-file-pdf me-2"></i> PDF
                    </button>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive nowrap w-100" id="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Agent Name</th>
                                <th>Pending Followups</th>
                                <th>Total Allocated Leads</th>
                                <th>Total Added Leads</th>
                                <th>Visit Done</th>
                                <th>Converted Leads</th>
                                <th>Completed Leads</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportData as $index => $row)
                                <tr>
                                    <td class="cursor-pointer">{{ $index + 1 }}</td>
                                    <td class="cursor-pointer">{{ $row->id }} - {{ $row->name }}</td>

                                    <!-- Pending Followups -->
                                    <td class="cursor-pointer">
                                        <span class="text-primary" 
                                              data-bs-toggle="tooltip" 
                                              title="@foreach($row->pending_followup_leads as $lead) {{ $lead['name'] ?? $lead['id'] }} - {{ $lead['status'] ?? '' }}; @endforeach">
                                            {{ $row->pending_followups }}
                                        </span>
                                    </td>

                                    <!-- Total Allocated Leads -->
                                    <td>{{ $row->total_allocated_leads }}</td>

                                    <!-- Total Added Leads -->
                                    <td class="cursor-pointer">
                                        <span class="text-primary" 
                                              data-bs-toggle="tooltip" 
                                              title="@foreach($row->added_leads as $lead) {{ $lead['name'] ?? $lead['id'] }}; @endforeach">
                                            {{ $row->total_added_leads }}
                                        </span>
                                    </td>

                                    <!-- Visit Done -->
                                    <td class="cursor-pointer">
                                        <span class="text-primary" 
                                              data-bs-toggle="tooltip" 
                                              title="@foreach($row->visit_done_leads as $lead) {{ $lead['name'] ?? $lead['id'] }}; @endforeach">
                                            {{ $row->visit_done }}
                                        </span>
                                    </td>

                                    <!-- Converted Leads -->
                                    <td class="cursor-pointer">
                                        <span class="text-primary" 
                                              data-bs-toggle="tooltip" 
                                              title="@foreach($row->converted_leads_info as $lead) {{ $lead['name'] ?? $lead['id'] }} - {{ $lead['conversion_type'] ?? '' }}; @endforeach">
                                            {{ $row->converted_leads }}
                                        </span>
                                    </td>

                                    <!-- Completed Leads -->
                                    <td class="cursor-pointer">
                                        <span class="text-primary" 
                                              data-bs-toggle="tooltip" 
                                              title="@foreach($row->completed_leads_info as $lead) {{ $lead['name'] ?? $lead['id'] }} - {{ $lead['conversion_type'] ?? '' }}; @endforeach">
                                            {{ $row->completed_leads }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <!-- Totals -->
                        @if($reportData->count() > 0)
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <td></td>
                                <td>{{ $totals['pending_followups'] }}</td>
                                <td>{{ $totals['total_allocated_leads'] }}</td>
                                <td>{{ $totals['total_added_leads'] }}</td>
                                <td>{{ $totals['visit_done'] }}</td>
                                <td>{{ $totals['converted_leads'] }}</td>
                                <td>{{ $totals['completed_leads'] }}</td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    {!! $reportData->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection