<?php

namespace Database\Seeders;

use App\Models\Messages;
use GuzzleHttp\Psr7\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $csvData = fopen(base_path('database/csv/GeneralistRails_Project_MessageData.csv'), 'r');
        $messageRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$messageRow) {
                $date = \DateTime::createFromFormat('d/m/Y', '01/02/2017')->format('Y-m-d');
                Messages::create([
                    'user_id' => $data['0'],
                    'date' => $data['1'],
                    'time' => $data['2'],
                    'message' => $data['3'],
                    
                ]);
            }
            $messageRow = false;
        }
        fclose($csvData);
    
    }
}
