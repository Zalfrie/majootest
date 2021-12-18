<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        Transaction::create([
            'merchant_id' => 1,
            'outlet_id' => 1,
            'bill_total' => 300000,
            'created_at' => '2021-11-02 09:00:00',
            'updated_at' => '2021-11-02 09:00:00',
            'created_by' => 2,
            'updated_by' => 2,
        ]);

        Transaction::create([
            'merchant_id' => 1,
            'outlet_id' => 1,
            'bill_total' => 60000,
            'created_at' => '2021-11-02 10:00:00',
            'updated_at' => '2021-11-02 10:00:00',
            'created_by' => 2,
            'updated_by' => 2,
        ]);

        Transaction::create([
            'merchant_id' => 1,
            'outlet_id' => 1,
            'bill_total' => 170000,
            'created_at' => '2021-11-05 09:00:00',
            'updated_at' => '2021-11-05 09:00:00',
            'created_by' => 2,
            'updated_by' => 2,
        ]);

        Transaction::create([
            'merchant_id' => 2,
            'outlet_id' => 2,
            'bill_total' => 800000,
            'created_at' => '2021-11-20 09:00:00',
            'updated_at' => '2021-11-20 09:00:00',
            'created_by' => 3,
            'updated_by' => 3,
        ]);
    }
}
