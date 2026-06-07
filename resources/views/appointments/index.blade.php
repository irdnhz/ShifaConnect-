<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
</head>
<body>

<h2>Appointment List</h2>

<a href="{{ route('appointments.create') }}">
    Create Appointment
</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Patient</th>
        <th>Caregiver</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
    </tr>

    @foreach($appointments as $appointment)
    <tr>
        <td>{{ $appointment->patient_name }}</td>
        <td>{{ $appointment->caregiver_name }}</td>
        <td>{{ $appointment->appointment_date }}</td>
        <td>{{ $appointment->appointment_time }}</td>
        <td>{{ $appointment->status }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>