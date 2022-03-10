<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Throwable;
use App\Models\Ago;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AgosImport implements
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
        return new Ago([
            //
            'name'=>$row['name'],
            'mobile'=>$row['mobile'],
            'truck_no'=>$row['truck_no'],
            'shipment_no'=>$row['shipment_no'],
            'destination'=>$row['destination'],
            'date'=>$row['date'],
            'quantity'=>$row['quantity'],
            'rate'=>$row['rate'],
            'total_cost' =>($row['rate']*$row['quantity']),

        ]);
    }

    public function rules(): array{
        return [
            '*.name'=>['required'],
            '*.mobile'=>['required','numeric'],
            '*.truck_no'=>['required','size:11'],
            '*.shipment_no'=>['required'],
            '*.destination'=>['required'],
            '*.date'=>['required','size:10'],
            '*.quantity'=>['required','numeric'],
            '*.rate'=>['required','numeric'],
            
        ];
    }
}
