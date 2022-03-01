<?php

namespace App\Imports;

use App\Person;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ClientsImport implements ToCollection,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Person::create([
                'name'=>$row[0],
                'type'=>'client',
                'mobile'=>$row[1],
                'is_client_supplier'=>0,
                'priceType'=>'one'
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
