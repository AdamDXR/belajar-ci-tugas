<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $now = Time::now();

        $nominals = [100000, 100000, 200000, 150000, 250000, 300000, 300000, 300000, 300000, 300000];

        for ($i = 0; $i < 10; $i++) {
            $date = $now->addDays($i);
            
            $data[] = [
                'tanggal'    => $date->toDateString(),
                'nominal'    => $nominals[$i] ?? 100000,
                'created_at' => Time::now()->toDateTimeString(),
                'updated_at' => Time::now()->toDateTimeString(),
            ];
        }

        $this->db->table('discount')->insertBatch($data);
    }
}