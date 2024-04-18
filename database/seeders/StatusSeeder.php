<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                "nama_status" => "Ditinjau oleh Admin"
            ],

            [
                "nama_status" => "Ditolak oleh Admin"
            ],
            [
                "nama_status" => "Disetujui Kaprodi"
            ],
            [
                "nama_status" => "Ditolak Kaprodi"
            ],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
