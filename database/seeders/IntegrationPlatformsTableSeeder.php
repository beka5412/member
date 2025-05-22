<?php

namespace Database\Seeders;
use App\Models\IntegrationPlatform;

use Illuminate\Database\Seeder;

class IntegrationPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntegrationPlatform::create([
            'enabled' => '1',
            'company' => 'PerfectPay',
            'name' => 'PerfectPay',
            'description' => 'A plataforma completa para transformar criadores de conteúdo em empreendedores.',
            'logo_url' => 'images/platforms/perfectpay.svg',
            'slug' => 'perfectpay'
        ]);
    }
}
