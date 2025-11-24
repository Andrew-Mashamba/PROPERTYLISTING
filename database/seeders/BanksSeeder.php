<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksSeeder extends Seeder
{
    public function run(): void
    {
        $banks = [
            [
                'name' => 'CRDB Bank PLC',
                'short_name' => 'CRDB',
                'description' => 'Cooperative and Rural Development Bank - Tanzania\'s largest bank by customer base',
                'website' => 'https://www.crdbbank.co.tz',
                'phone' => '+255 22 211 7700',
                'email' => 'info@crdbbank.com',
                'is_active' => true,
            ],
            [
                'name' => 'National Microfinance Bank (NMB)',
                'short_name' => 'NMB',
                'description' => 'Leading retail bank in Tanzania with extensive branch network',
                'website' => 'https://www.nmbbank.co.tz',
                'phone' => '+255 22 260 3303',
                'email' => 'customercare@nmbtz.com',
                'is_active' => true,
            ],
            [
                'name' => 'Stanbic Bank Tanzania',
                'short_name' => 'Stanbic',
                'description' => 'Part of Standard Bank Group, offering comprehensive banking solutions',
                'website' => 'https://www.stanbicbank.co.tz',
                'phone' => '+255 22 209 1000',
                'email' => 'customercare@stanbic.com',
                'is_active' => true,
            ],
            [
                'name' => 'Standard Chartered Bank Tanzania',
                'short_name' => 'SCB',
                'description' => 'International bank with strong presence in Tanzania',
                'website' => 'https://www.sc.com/tz',
                'phone' => '+255 22 213 4400',
                'email' => 'tanzania.queries@sc.com',
                'is_active' => true,
            ],
            [
                'name' => 'Exim Bank Tanzania',
                'short_name' => 'Exim',
                'description' => 'Export-Import Bank specializing in trade finance',
                'website' => 'https://www.eximbank-tz.com',
                'phone' => '+255 22 213 1616',
                'email' => 'info@eximbank-tz.com',
                'is_active' => true,
            ],
            [
                'name' => 'Bank of Africa Tanzania (BOA)',
                'short_name' => 'BOA',
                'description' => 'Pan-African bank providing diverse financial services',
                'website' => 'https://www.boa.co.tz',
                'phone' => '+255 22 260 1900',
                'email' => 'info@boa.co.tz',
                'is_active' => true,
            ],
            [
                'name' => 'Absa Bank Tanzania',
                'short_name' => 'Absa',
                'description' => 'Formerly Barclays Bank, now part of Absa Group',
                'website' => 'https://www.absa.africa/tanzania',
                'phone' => '+255 22 223 4000',
                'email' => 'customercare.tanzania@absa.africa',
                'is_active' => true,
            ],
            [
                'name' => 'Azania Bank Limited',
                'short_name' => 'Azania',
                'description' => 'Tanzanian bank focused on retail and corporate banking',
                'website' => 'https://www.azaniabank.co.tz',
                'phone' => '+255 22 260 0300',
                'email' => 'info@azaniabank.co.tz',
                'is_active' => true,
            ],
            [
                'name' => 'Tanzania Commercial Bank (TCB)',
                'short_name' => 'TCB',
                'description' => 'Government-owned commercial bank',
                'website' => 'https://www.tcb.co.tz',
                'phone' => '+255 22 219 6200',
                'email' => 'info@tcb.co.tz',
                'is_active' => true,
            ],
            [
                'name' => 'DTB Tanzania',
                'short_name' => 'DTB',
                'description' => 'Diamond Trust Bank - Regional bank with strong presence',
                'website' => 'https://www.dtbafrica.com/tanzania',
                'phone' => '+255 22 223 4500',
                'email' => 'customercare@dtbafrica.com',
                'is_active' => true,
            ],
        ];

        foreach ($banks as $bank) {
            DB::table('banks')->insert(array_merge($bank, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
