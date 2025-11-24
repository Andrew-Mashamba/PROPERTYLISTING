<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => "Sarah Property Seller",
                'email' => "seller@example.com",
                'email_verified_at' => null,
                'password' => "$2y$12$L/nl27e7SwkCCjPT8D.J9.Fdk8gaHkNwMzjtJFVyVYyLokDgKkyxG",
                'remember_token' => null,
                'created_at' => "2025-10-17 12:03:47",
                'updated_at' => "2025-10-17 12:03:47",
                'phone' => null,
                'role' => "seller",
                'kyc_document' => null,
                'status' => "pending",
            ],
            [
                'name' => "Mike Materials Supplier",
                'email' => "supplier@example.com",
                'email_verified_at' => null,
                'password' => "$2y$12$l/pIOySTdBYQ9dsW3EFGo.5QHAKLQ4YGprKLAAuYL.jmgOt9vB1Je",
                'remember_token' => null,
                'created_at' => "2025-10-17 12:03:47",
                'updated_at' => "2025-10-17 12:03:47",
                'phone' => null,
                'role' => "supplier",
                'kyc_document' => null,
                'status' => "pending",
            ],
            [
                'name' => "Lisa Property Landlord",
                'email' => "landlord@example.com",
                'email_verified_at' => null,
                'password' => "$2y$12$TGwtSOncocT08pcm0dsauO8Mda.8QK3RwZZ3OMMAl0kOIXOr1g1Hq",
                'remember_token' => null,
                'created_at' => "2025-10-17 12:03:47",
                'updated_at' => "2025-10-17 12:03:47",
                'phone' => null,
                'role' => "landlord",
                'kyc_document' => null,
                'status' => "pending",
            ],
            [
                'name' => "Savanna System Manager",
                'email' => "savanna@example.com",
                'email_verified_at' => "2025-10-17 12:08:36",
                'password' => "$2y$12$28b7UKQT4dTxs11a1FcdO.SW4QQJyyjhsRQFevPDlKWtkKrR4tfE6",
                'remember_token' => null,
                'created_at' => "2025-10-17 12:03:47",
                'updated_at' => "2025-10-19 14:53:59",
                'phone' => null,
                'role' => "savanna",
                'kyc_document' => "kyc-documents/ZFiN4LMnhbNufBauIFFyMmJlSe2qCuRGwE9EvDOb.jpg",
                'status' => "pending",
            ],
            [
                'name' => "Roary Willis",
                'email' => "nibygykini@mailinator.com",
                'email_verified_at' => null,
                'password' => "$2y$12$QUzQ8CMvHHlWssxG/MTcBe0cZm07JXEQ5LEFpZYbdrMOUoc3O32I6",
                'remember_token' => null,
                'created_at' => "2025-10-20 07:24:12",
                'updated_at' => "2025-10-20 07:24:12",
                'phone' => null,
                'role' => "supplier",
                'kyc_document' => null,
                'status' => "pending",
            ],
            [
                'name' => "Andrew Mashamba",
                'email' => "andrew.s.mashamba@gmail.com",
                'email_verified_at' => null,
                'password' => "$2y$12$XuE.aKRiJt0HA/ImKzLeB.T8pG8opRMzwHdFL.19bEQ9Bj80AY0Gu",
                'remember_token' => null,
                'created_at' => "2025-10-22 11:25:01",
                'updated_at' => "2025-10-22 08:25:43",
                'phone' => null,
                'role' => "savanna",
                'kyc_document' => null,
                'status' => "pending",
            ],
            [
                'name' => "Grace Hendrix",
                'email' => "kulebepuc@mailinator.com",
                'email_verified_at' => null,
                'password' => "$2y$12$K2BPAGvPBI5ooi9YEubkzOqijJdu.tgImpoINgg6eYpf9wfXIBrde",
                'remember_token' => null,
                'created_at' => "2025-10-22 08:42:00",
                'updated_at' => "2025-10-22 08:42:00",
                'phone' => null,
                'role' => "agent",
                'kyc_document' => null,
                'status' => "pending",
            ],
        ]);

    }
}
