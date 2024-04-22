<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Course;


class CoursesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Course::all()->except(['created_at', 'updated_at']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date',
            'CN',
            'Container No',
            'ATA',
            'SKP',
            'Expired',
            'Size',
            'Destination',
            'Agent',
            'Depot',
            'KB(Date)',
            'Send Date',
            'ECO Depot',
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
