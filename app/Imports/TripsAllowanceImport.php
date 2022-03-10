<?php

namespace App\Imports;
use App\Models\TripAllowance;

use Maatwebsite\Excel\Concerns\ToModel;
use Throwable;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TripsAllowanceImport  implements 
ToModel,
WithHeadingRow,
SkipsOnError,
WithValidation
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TripAllowance([
            'truck_no'=>$row['for'],
            'shipment_no'=>$row['shipment_no'],
            'amount'=>$row['amount'],
            'date'=>$row['date'],
            
        ]);
    }

    public function rules(): array{
        return [
            '*.truck_no'=>['required'],
            '*.shipment_no'=>['required'],
            '*.amount'=>['required','numeric'],
            '*.date'=>['required','size:10'],
            
        ];
    }
}
