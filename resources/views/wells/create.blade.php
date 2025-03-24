@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Add New Well</h1>
        <a href="{{ route('wells.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Well Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('wells.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="well_name" class="form-label">Well Name</label>
                    <input type="text" class="form-control @error('well_name') is-invalid @enderror" id="well_name" name="well_name" value="{{ old('well_name') }}">
                    @error('well_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="field_location" class="form-label">Field Location</label>
                    <input type="text" class="form-control @error('field_location') is-invalid @enderror" id="field_location" name="field_location" value="{{ old('field_location') }}">
                    @error('field_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="depth_meters" class="form-label">Depth (meters)</label>
                    <input type="number" class="form-control @error('depth_meters') is-invalid @enderror" id="depth_meters" name="depth_meters" value="{{ old('depth_meters') }}">
                    @error('depth_meters')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                        <option value="">Select Status</option>
                        <option value="Drilling" {{ old('status') == 'Drilling' ? 'selected' : '' }}>Drilling</option>
                        <option value="Producing" {{ old('status') == 'Producing' ? 'selected' : '' }}>Producing</option>
                        <option value="Suspended" {{ old('status') == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                        <option value="Decommissioned" {{ old('status') == 'Decommissioned' ? 'selected' : '' }}>Decommissioned</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="production_bpd" class="form-label">Production (barrels per day)</label>
                    <input type="number" step="0.01" class="form-control @error('production_bpd') is-invalid @enderror" id="production_bpd" name="production_bpd" value="{{ old('production_bpd') }}">
                    <div class="form-text">Optional, leave blank if not applicable.</div>
                    @error('production_bpd')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="commissioned_date" class="form-label">Commissioned Date</label>
                    <input type="date" class="form-control @error('commissioned_date') is-invalid @enderror" id="commissioned_date" name="commissioned_date" value="{{ old('commissioned_date') }}">
                    @error('commissioned_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Create Well</button>
                </div>
            </form>
        </div>
    </div>
@endsection