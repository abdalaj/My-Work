<?php

namespace App\Imports;

use App\Product;
use App\ProductStore;
use App\ProductUnit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductsImport implements ToCollection,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $product = Product::where('name',$row[0])->first();
            $cost = round($row[4], 2);
            $product = Product::create([
                'name' => $row[0],
                'code' => rand(10000, 99999) . rand(10000, 99999),
                'first_qty' => $row[1],
                'last_cost' => $cost,
                'avg_cost' => $cost,
                'main_category_id' => 1,
                'observe' => $row[6],
                'is_price_percent' => 0,
                'price_percent' => 0
            ]);

            ProductUnit::create([
                'unit_id' => 1,
                'product_id' => $product->id,
                'pieces_num' => 1,
                'cost_price' => $cost,
                'sale_price' => round($row[2], 2),
                'gomla_price' => round($row[3], 2),
                'gomla_gomla_price' => round($row[3], 2),
            ]);

            ProductStore::create([
                'product_id' => $product->id,
                'store_id' => 1,
                'unit_id' => 1,
                'qty' => $row[1],
                'sale_count' => 0
            ]);
            /*$ss = ProductStore::where('product_id',$product->id)->first();
            $ss->qty -= $row[1];
            $ss->save();*/
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
