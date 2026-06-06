<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShifaConnect - Medical Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🩺 ShifaConnect Patient Medical Logs</h2>
            <a href="{{ route('medical-logs.create') }}" class="btn btn-primary">+ Record New Log</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date & Time</th>
                            <th>Blood Pressure</th>
                            <th>Blood Sugar</th>
                            <th>Medication Given</th>
                            <th>Notes</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td>#{{ $log->id }}</td>
                                <td>{{ $log->created_at->format('d M Y, h:i A') }}</td>
                                <td>{{ $log->blood_pressure ?? 'N/A' }}</td>
                                <td>{{ $log->blood_sugar ? $log->blood_sugar . ' mmol/L' : 'N/A' }}</td>
                                <td>{{ $log->medication_administered }}</td>
                                <td>{{ $log->notes ?? '-' }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('medical-logs.edit', $log->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                        
                                        <form action="{{ route('medical-logs.destroy', $log->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this log permanently?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No patient medical logs recorded yet. Click "+ Record New Log" above to start!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>