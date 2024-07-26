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
        $participants = Participant::paginate(100);
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
            session()->flash('error', 'این شماره تلفن قبلاً ثبت شده است.');
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

    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        session()->flash('success', 'Participant deleted successfully.');
        return redirect()->route('participants.index');
    }
}
