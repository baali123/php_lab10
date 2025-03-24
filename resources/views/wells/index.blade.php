@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Well Management</h1>
        <a href="{{ route('wells.create') }}" class="btn btn-primary">Add New Well</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Search Wells</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('wells.index') }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="search" placeholder="Search name or status" class="form-control" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="field_location" placeholder="Field location" class="form-control" value="{{ request('field_location') }}">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="min_depth" placeholder="Min Depth (meters)" class="form-control" value="{{ request('min_depth') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="production_min" placeholder="Min Production (bpd)" class="form-control" value="{{ request('production_min') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="production_max" placeholder="Max Production (bpd)" class="form-control" value="{{ request('production_max') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="start_date" placeholder="Start Date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="end_date" placeholder="End Date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('wells.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Well Listing</h5>
        </div>
        <div class="card-body">
            @if(count($wells) > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Well Name</th>
                                <th>Field Location</th>
                                <th>Depth (m)</th>
                                <th>Status</th>
                                <th>Production (bpd)</th>
                                <th>Commissioned</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wells as $well)
                                <tr>
                                    <td>{{ $well->well_name }}</td>
                                    <td>{{ $well->field_location }}</td>
                                    <td>{{ $well->depth_meters }}</td>
                                    <td>
                                        <span class="badge {{ $well->status === 'Producing' ? 'bg-success' : 
                                                              ($well->status === 'Drilling' ? 'bg-primary' : 
                                                              ($well->status === 'Suspended' ? 'bg-warning' : 'bg-secondary')) }}">
                                            {{ $well->status }}
                                        </span>
                                    </td>
                                    <td>{{ $well->production_bpd ?? 'N/A' }}</td>
                                    <td>{{ $well->commissioned_date->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Well actions">
                                            <a href="{{ route('wells.show', $well) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('wells.edit', $well) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('wells.destroy', $well) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this well?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">No wells found.</p>
            @endif
        </div>
    </div>
@endsection