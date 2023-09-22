<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Ordinance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path("database/data/Ordinance.csv"), "r");

        $first =true;
        
        while(($data = fgetcsv($csv))!=false){
            if(!$first){
            Ordinance::create([
                'approved_no'=> $data[2],
                'approved_date'=> $data[1],
                'document_id' => Document::where('document_no',$data[6])->first()->id
            ]);
        }else
        $first = false;
    }

        fclose($csv);

    }
}
