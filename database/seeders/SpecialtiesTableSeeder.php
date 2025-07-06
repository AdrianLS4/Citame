<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Specialties = [
            "Cardiología",
            "Dermatología",
            "Neurología",
            "Pediatría",
            "Ginecología y Obstetricia",
            "Oftalmología",
            "Otorrinolaringología",
            "Cirugía General",
            "Traumatología y Ortopedia",
            "Psiquiatría",
            "Medicina Interna",
            "Urología",
            "Gastroenterología",
            "Endocrinología y Nutrición",
            "Nefrología",
            "Oncología Médica",
            "Radiología",
            "Anestesiología y Reanimación",
            "Neumología",
            "Reumatología",
            "Medicina Familiar y Comunitaria",
            "Geriatría",
            "Infectología",
            "Hematología y Hemoterapia",
            "Medicina de Urgencias"
            ];

        foreach ($Specialties as $specialty) {
            Specialty::create(
                [
                    'name' => $specialty
                ]);
        }
    }
}
