<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShifaConnect - Edit Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Medical Log Entry #{{ $medicalLog->id }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('medical-logs.update', $medicalLog->id) }}" method="POST">
                            @csrf
                            @method('PUT') <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label font-weight-bold">Blood Pressure</label>
                                    <input type="text" name="blood_pressure" class="form-control" value="{{ $medicalLog->blood_pressure }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-weight-bold">Blood Sugar (mmol/L)</label>
                                    <input type="number" step="0.1" name="blood_sugar" class="form-control" value="{{ $medicalLog->blood_sugar }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Medication Administered <span class="text-danger">*</span></label>
                <textarea name="medication_administered" class="form-control" rows="3" required>{{ $medicalLog->medication_administered }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Caregiver Observations / Notes</label>
                                <textarea name="notes" class="form-control" rows="3">{{ $medicalLog->notes }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between pt-2">
                                <a href="{{ route('medical-logs.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4">Update Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>