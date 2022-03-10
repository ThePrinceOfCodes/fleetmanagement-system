<?php

namespace App\Imports;


use Throwable;
use App\Models\Income;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class IncomesImport implements 
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
        return new Income([
            //
            'truck_no'=>$row['truck_no'],
            'destination'=>$row['destination'],
            'date'=> substr($row['date'],0,4).'-'.substr($row['date'],4,2).'-'.substr($row['date'],6,2),
            'shipment_no'=>$row['shipment_no'],
            'frieght_cost'=>$row['freight_cost'],
            'tax'=>($row['freight_cost']*(7.5/100)),
            
        ]);

    }
    public function rules(): array{
        return [
            '*.truck_no'=>['required','max:11'],
            '*.destination'=>['required'],
            '*.date'=>['required','size:8'],
            '*.shipment_no'=>['required','numeric'],
            '*.freight_cost'=>['required','numeric']
        ];
    }
}
