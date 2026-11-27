<?php

namespace Database\Seeders;

use App\Models\Caregiver;
use Illuminate\Database\Seeder;

class CaregiverSeeder extends Seeder
{
    /**
     * Seed the caregivers directory with fictional demonstration data.
     */
    public function run(): void
    {
        $caregivers = [
            [
                'name' => 'Siti Rahmawati',
                'service_type' => 'Pendamping lansia harian',
                'experience' => '5 tahun mendampingi lansia',
                'languages' => 'Bahasa Indonesia, Jawa',
                'service_area' => 'Jakarta Selatan',
                'certification' => 'Pelatihan pendampingan lansia (fiktif)',
                'photo' => null,
                'rating' => 4.8,
                'review_count' => 24,
            ],
            [
                'name' => 'Budi Santoso',
                'service_type' => 'Pendamping aktivitas dan mobilitas',
                'experience' => '4 tahun mendampingi lansia',
                'languages' => 'Bahasa Indonesia, Sunda',
                'service_area' => 'Bandung',
                'certification' => 'Pelatihan pertolongan pertama (fiktif)',
                'photo' => null,
                'rating' => 4.7,
                'review_count' => 18,
            ],
            [
                'name' => 'Dewi Anggraini',
                'service_type' => 'Pendamping kontrol kesehatan',
                'experience' => '6 tahun mendampingi lansia',
                'languages' => 'Bahasa Indonesia',
                'service_area' => 'Yogyakarta',
                'certification' => 'Pelatihan pendampingan dasar (fiktif)',
                'photo' => null,
                'rating' => 4.9,
                'review_count' => 31,
            ],
            [
                'name' => 'Agus Pratama',
                'service_type' => 'Pendamping lansia harian',
                'experience' => '3 tahun mendampingi lansia',
                'languages' => 'Bahasa Indonesia, Jawa',
                'service_area' => 'Surabaya',
                'certification' => 'Pelatihan perawatan lansia dasar (fiktif)',
                'photo' => null,
                'rating' => 4.6,
                'review_count' => 12,
            ],
            [
                'name' => 'Maya Lestari',
                'service_type' => 'Pendamping aktivitas harian',
                'experience' => '7 tahun mendampingi lansia',
                'languages' => 'Bahasa Indonesia, Minang',
                'service_area' => 'Depok',
                'certification' => 'Pelatihan pendampingan lansia (fiktif)',
                'photo' => null,
                'rating' => 5.0,
                'review_count' => 27,
            ],
            [
                'name' => 'Rizky Firmansyah',
                'service_type' => 'Pendamping kontrol dan mobilitas',
                'experience' => '2 tahun mendampingi lansia',
                'languages' => 'Bahasa Indonesia, Betawi',
                'service_area' => 'Bekasi',
                'certification' => 'Pelatihan pertolongan pertama (fiktif)',
                'photo' => null,
                'rating' => 4.5,
                'review_count' => 9,
            ],
            [
                'name' => 'Nur Aisyah',
                'service_type' => 'Pendamping lansia harian',
                'experience' => '4 tahun mendampingi lansia',
                'languages' => 'Bahasa Indonesia, Bugis',
                'service_area' => 'Makassar',
                'certification' => 'Pelatihan perawatan lansia dasar (fiktif)',
                'photo' => null,
                'rating' => 4.8,
                'review_count' => 16,
            ],
        ];

        foreach ($caregivers as $caregiver) {
            Caregiver::updateOrCreate(
                ['name' => $caregiver['name']],
                $caregiver,
            );
        }
    }
}
