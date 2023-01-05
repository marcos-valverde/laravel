<?php

use App\Models\{
    Tenant,
    User
};

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Marcos Valverde',
            'email' => 'marcos.valverde@opeao.com.br',
            'password' => bcrypt('jkma4@123')
        ]);
    }
}
