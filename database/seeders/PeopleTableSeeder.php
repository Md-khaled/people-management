<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvData = File::get(storage_path('app/test-data.csv'));
        $rows = array_map('str_getcsv', explode("\n", $csvData));
        
        $header = array_shift($rows);
        foreach ($rows as $row) {
            // Skip empty rows
            if (count($row) === 1 && empty($row[0])) {
                continue;
            }
            Person::create([
                'email_address' => $row[1],
                'name' => $row[2],
                'birthday' => Carbon::parse($row[3])->format('Y-m-d H:i:s'),
                'phone' => $row[4],
                'ip' => $row[5],
                'country' => $row[6],
            ]);
        }
    }
}
