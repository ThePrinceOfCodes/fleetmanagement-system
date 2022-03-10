<?php

namespace App\Imports;

use Throwable;
use App\Models\TrucksExpenses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TrucksExpensesImport implements 
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
        return new TrucksExpenses([
            //
            'truck_no'=>$row['truck_no'],
            'description'=>$row['description'],
            'amount'=>$row['amount'],
            'date'=>$row['date'],
            'location'=>$row['location']
        ]);
    }

    // public function onError(Throwable $error){

    // }

    public function rules(): array{
        return [
            '*.truck_no'=>['required','size:11'],
            '*.description'=>['required'],
            '*.amount'=>['required','numeric'],
            '*.date'=>['required','size:10'],
            '*.location'=>['required']
        ];
    }
}