<?php

namespace App\Imports;

use App\Models\TrucksEvents;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EventsImport implements 
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation
{
    use Importable, SkipsErrors;
    
    public function model(array $row)
    {
        return new TrucksEvents([
            //
            'truck_no'=>$row['truck_no'],
            'events'=>$row['events'],
            
            
        ]);

    }

    public function rules(): array{
        return [
            '*.truck_no'=>['required','size:11'],
            '*.events'=>['required'],
            
        ];
    }
}
