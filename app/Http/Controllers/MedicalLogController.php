<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\MedicalLog;

class MedicalLogController extends Controller
{
    /**
     * READ: Display a list of all historical medical logs.
     */
    public function index()
    {
        // Fetch logs newest-first from the database
        $logs = MedicalLog::latest()->get();
        
        // Pass the records into a blade folder named medical_logs
        return view('medical_logs.index', compact('logs'));
    }

    /**
     * CREATE: Show the input form to create a new log.
     */
    public function create()
    {
        return view('medical_logs.create');
    }

    /**
     * STORE: Validate and save the form data into your MySQL table.
     */
    public function store(Request $request)
    {
        // Form Validation Rules (Makes sure medicine information is provided)
        $validated = $request->validate([
            'blood_pressure' => 'nullable|string|max:20',
            'blood_sugar' => 'nullable|numeric',
            'medication_administered' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Insert rows seamlessly into your 'medical_logs' table using the Model
        MedicalLog::create($validated);

        // Send the user back to the list with a beautiful green success alert banner
        return redirect()->route('medical-logs.index')
                         ->with('success', 'Medical log recorded successfully!');
    }

    /**
     * EDIT: Show the form filled with old data for editing.
     */
    public function edit(MedicalLog $medicalLog)
    {
        return view('medical_logs.edit', compact('medicalLog'));
    }

    /**
     * UPDATE: Save changes made during editing.
     */
    public function update(Request $request, MedicalLog $medicalLog)
    {
        $validated = $request->validate([
            'blood_pressure' => 'nullable|string|max:20',
            'blood_sugar' => 'nullable|numeric',
            'medication_administered' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $medicalLog->update($validated);

        return redirect()->route('medical-logs.index')
                         ->with('success', 'Medical log updated successfully!');
    }

    /**
     * DELETE: Remove the log entry permanently from MySQL.
     */
    public function destroy(MedicalLog $medicalLog)
    {
        $medicalLog->delete();

        return redirect()->route('medical-logs.index')
                         ->with('success', 'Medical log deleted successfully!');
    }
}