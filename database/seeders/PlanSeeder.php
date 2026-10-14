<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // database/seeders/PlanSeeder.php
public function run(): void
{
    $plans = [
        ['name'=>'Starter','slug'=>'starter','description'=>'Para emprendedores',
         'price_monthly'=>19990,'price_yearly'=>199900,'is_featured'=>false,
         'features'=>['1 usuario','Facturación','Inventario básico','Soporte por email']],
        ['name'=>'Business','slug'=>'business','description'=>'Para pymes en crecimiento',
         'price_monthly'=>49990,'price_yearly'=>499900,'is_featured'=>true,
         'features'=>['Hasta 10 usuarios','Ventas y compras','Inventario avanzado','Reportes','Soporte prioritario']],
        ['name'=>'Enterprise','slug'=>'enterprise','description'=>'Operaciones complejas',
         'price_monthly'=>99990,'price_yearly'=>999900,'is_featured'=>false,
         'features'=>['Usuarios ilimitados','Todos los módulos','API','Multi-sucursal','Soporte dedicado']],
    ];
    foreach ($plans as $p) { \App\Models\Plan::updateOrCreate(['slug'=>$p['slug']], $p); }
}
}
