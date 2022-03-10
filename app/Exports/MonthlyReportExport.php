<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class MonthlyReportExport implements 
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithEvents
    
{
    use Exportable;
    protected $reports;
    public function __construct($reports)
    {
        $this->reports = $reports;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return collect($this->reports);
    }

    public function headings(): array
    {
        return [
            'Truck_no',
            'trucks expenses',
            'trip_count',
            'waiver',
            'overhead',
            'ago',
            'trip_allowance',
            'tax',
            'frieght_cost',
            'income'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class=>function(AfterSheet $event){
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font'=>[
                        'bold'=> true
                    ]
                ]);
            }
        ];
    }

}
