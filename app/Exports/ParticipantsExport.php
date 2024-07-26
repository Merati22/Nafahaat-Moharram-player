<?php
// app/Exports/ParticipantsExport.php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Participant::inRandomOrder()->take(50)->get([
            'id', 'full_name', 'phone_number', 'province', 'city', 'address', 'post_code'
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'شناسه',
            'نام کامل',
            'شماره تلفن',
            'استان',
            'شهر',
            'آدرس',
            'کد پستی',
        ];
    }
}
