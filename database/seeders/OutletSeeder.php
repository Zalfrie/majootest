<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outlet;

class OutletSeeder extends Seeder
{
    public function run()
    {
        Outlet::create([
            'merchant_id' => 1,
            'outlet_name' => 'Merchant 1 Outlet',
            'created_by' => 2,
            'updated_by' => 2,
        ]);

        Outlet::create([
            'merchant_id' => 2,
            'outlet_name' => 'Merchant 2 Outlet',
            'created_by' => 3,
            'updated_by' => 3,
        ]);
    }
}
