<?php

namespace App\Imports;

use App\Models\Consumer;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class ConsumersImport implements ToCollection
{
    private $consumer;
    public function __construct($id)
    {
        $this->consumer = $id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $consumer = Consumer::create([

                'personal_account' =>  $row[0],
                'full_name' => $row[1],
                'district' => $row[2],
                'street' => $row[3],
                'house' => $row[4],
                'building' => $row[5],
                'apartment' => $row[6],
                'model' => $row[7],
                'number' => $row[8],
                'verif_date' => $row[9],
                'seal' => $row[10],
                'year_release' => $row[11],
                'day_zone' => $row[12],
                'crawl_date' => $row[13],
                'reading' => $row[14],
                'note' => $row[15],
                'area_id' => $this->consumer

            ]);
        }
    }



















    // public function model(array $row)
    // {
    //     return new Consumer([
    //         'personal_account' =>  $row['1'],
    //         'full_name' => $row['2'],
    //         'district' => $row['3'],
    //         'street' => $row['4'],
    //         'house' => $row['5'],
    //         'building' => $row['6'],
    //         'apartment' => $row['7'],
    //         'model' => $row['8'],
    //         'number' => $row['9'],
    //         'verif_date' => $row['10'],
    //         'seal' => $row['11'],
    //         'year_release' => $row['12'],
    //         'day_zone' => $row['13'],
    //         'crawl_date' => $row['14'],
    //         'reading' => $row['15'],
    //         'note' => $row['16'],
    //     ]);
    // }
}
