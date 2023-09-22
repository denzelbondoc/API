<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentVersion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path("database/data/Document.csv"), "r");

        $first =true;
        
        while(($data = fgetcsv($csv))!=false){
            if(!$first){
           $docu = Document::create([
                'document_no'=> $data[2],
                'date_time_received'=> $data[1],
            ]);

            DocumentVersion::create([
                'title'=> $data[3],
                'version'=> 1.0,
                'document_id' => $docu->id
            ]);
        }else
        $first = false;
    }

        fclose($csv);

    }
}
