<?php
// app/Http/Controllers/ParticipantController.php

namespace App\Http\Controllers;

use App\Exports\ParticipantsExport;
use App\Models\Participant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{

    public function index()
    {
        // Fetch participants and paginate if necessary
        $participants = Participant::paginate(100); // Adjust pagination as needed

        return view('participant.index', compact('participants'));
    }

    public function create()
    {

        return view('participant.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        if (Participant::where('phone_number', $request->phone_number)->exists()) {
            // Flash an error message to the session
            session()->flash('error', 'این شماره تلفن قبلاً ثبت شده است.');

            // Redirect back to the form with the old input
            return view('participant.create');
        }

        Participant::create($request->all());
        session()->flash('success', 'ثبت نام با موفقیت انجام شد!');

        return view('participant.create');
    }

    public function export()
    {
        return Excel::download(new ParticipantsExport, 'participants.xlsx');
    }
}
