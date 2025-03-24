@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Well Details</h1>
        <div>
            <a href="{{ route('wells.edit', $well) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('wells.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>{{ $well->well_name }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Well Name:</th>
                            <td>{{ $well->well_name }}</td>
                        </tr>
                        <tr>
                            <th>Field Location:</th>
                            <td>{{ $well->field_location }}</td>
                        </tr>
                        <tr>
                            <th>Depth (meters):</th>
                            <td>{{ $well->depth_meters }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                <span class="badge {{ $well->status === 'Producing' ? 'bg-success' : 
                                                    ($well->status === 'Drilling' ? 'bg-primary' : 
                                                    ($well->status === 'Suspended' ? 'bg-warning' : 'bg-secondary')) }}">
                                    {{ $well->status }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Production (bpd):</th>
                            <td>{{ $well->production_bpd ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Commissioned Date:</th>
                            <td>{{ $well->commissioned_date->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $well->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated:</th>
                            <td>{{ $well->updated_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Well Statistics</h5>
                            <p class="card-text">
                                This well has been operational for {{ $well->commissioned_date->diffInDays() }} days 
                                since commissioning.
                            </p>
                            @if($well->status === 'Producing' && $well->production_bpd)
                                <p class="card-text">
                                    At the current production rate of {{ $well->production_bpd }} barrels per day, 
                                    this well produces approximately {{ number_format($well->production_bpd * 30, 2) }} 
                                    barrels per month.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('wells.destroy', $well) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this well?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Well</button>
            </form>
        </div>
    </div>
@endsection