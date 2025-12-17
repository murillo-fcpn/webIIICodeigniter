<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('project_type')->insertBatch([
            ['name' => 'Desarrollo Web'],
            ['name' => 'Móvil'],
            ['name' => 'Desktop']
        ]);
        $this->db->table('status_tasks')->insertBatch([
            ['name' => 'Pendiente'],
            ['name' => 'En progreso'],
            ['name' => 'Finalizada'],
            ['name' => 'Cancelada']
        ]);
    }
}