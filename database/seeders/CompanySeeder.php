<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = public_path('/MembersData-5.csv');
        $csvData = file_get_contents($file);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);
        $count = count($rows);
        for ($i = 0; $i < $count; $i++) {
            if (count($rows[$i]) == 4 && $rows[$i][2] != '') {
                Company::create([
                    'name' => $rows[$i][0],
                    'phone' => $rows[$i][1],
                    'commercial_number' => $rows[$i][2],
                    'owner_name' => $rows[$i][3]
                ]);
            }
        }
    }
}
