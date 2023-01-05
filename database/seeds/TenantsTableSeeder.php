<?php

use App\Models\{
    Plan,
    Tenant
};

use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '40903254000134',
            'name' => 'Peão Desenvolvimento de Sistemas',
            'url' => 'opeao.com.br',
            'email' => 'marcos.valverde@opeao.com.br',
        ]);
    }
}
