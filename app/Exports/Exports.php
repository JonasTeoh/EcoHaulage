<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\export;


class Exports implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return export::all()->except(['created_at', 'updated_at']);
    }

    public function headings(): array
    {
        return [
            'No',
            'Date',
            'CN',
            'Booking',
            'Container',
            'Seal',
            'Size',
            'Destination',
            'SCN',
            'CDA',
            'Vessel Name',
            'Req Date',
            'Gate Open',
            'Closing',
            'Agent',
            'Depot',
            'Depot Date',
            'Send Date',
            'Back Date',
            'Trailer',
            
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
