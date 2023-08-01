<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function collection()
    {
        // Fetch data from the attendance table and related user table
        return Attendance::where('id_event', $this->eventId)
            ->join('users', 'attendance.id_user', '=', 'users.id')
            ->select('users.name', 'users.nra', 'attendance.isAttend')
            ->get();
    }

    public function headings(): array
    {
        // Custom column headings for the Excel file
        return [
            'No',
            'Nama',
            'NRA',
            'Status',
        ];
    }
    public function map($row): array
    {
        static $rowNumber = 0;

        return [
            ++$rowNumber,
            $row->name,
            $row->nra,
            $row->status,
        ];
    }
}