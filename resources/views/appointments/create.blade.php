<!DOCTYPE html>
<html>
<head>
    <title>Create Appointment</title>
</head>
<body>

<h2>Book Appointment</h2>

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <label>Patient Name</label><br>
    <input type="text" name="patient_name"><br><br>

    <label>Caregiver Name</label><br>
    <input type="text" name="caregiver_name"><br><br>

    <label>Appointment Date</label><br>
    <input type="date" name="appointment_date"><br><br>

    <label>Appointment Time</label><br>
    <input type="time" name="appointment_time"><br><br>

    <button type="submit">Book Appointment</button>
</form>

</body>
</html>