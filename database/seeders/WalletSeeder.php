<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wallets')->delete();

        $data = [];

        for($i=0;$i<1000;$i++){
            $data[] = [
                'customer_id' => $i,
                'balance' => 0,
                'created_at' => date("Y-m-d H:i:s")
            ];
        }
        DB::table('wallets')->insert($data);

    }
}
