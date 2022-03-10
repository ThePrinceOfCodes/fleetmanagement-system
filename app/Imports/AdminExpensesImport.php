<?php

namespace App\Imports;

use App\Models\AdminExpenses;
use Maatwebsite\Excel\Concerns\ToModel;
use Throwable;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AdminExpensesImport implements 
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
        return new AdminExpenses([
            'for'=>$row['for'],
            'description'=>$row['description'],
            'amount'=>$row['amount'],
            'date'=>$row['date'],
            'location'=>$row['location']
        ]);
    }

    public function rules(): array{
        return [
            '*.for'=>['required'],
            '*.description'=>['required'],
            '*.amount'=>['required','numeric'],
            '*.date'=>['required','size:10'],
            '*.location'=>['required']
        ];
    }
}
