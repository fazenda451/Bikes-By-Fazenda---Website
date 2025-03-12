<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'category',
        'brand_id',
        'price',
        'license_type_id',
        'engine_type_id',
        'displacement',
        'bore_stroke',
        'compression_ratio',
        'max_power',
        'max_torque',
        'lubrication_system_id',
        'clutch_type_id',
        'ignition_system_id',
        'starting_system_id',
        'transmission_system_id',
        'final_drive',
        'fuel_consumption',
        'cos2_emissions',
        'fuel_system',
        'frame',
        'rake_angle',
        'trail',
        'front_suspension_id',
        'rear_suspension_id',
        'front_travel',
        'rear_travel',
        'front_brake',
        'rear_brake',
        'front_tire',
        'rear_tire',
        'total_length',
        'total_width',
        'total_height',
        'seat_height',
        'wheelbase',
        'ground_clearance',
        'weight',
        'fuel_tank_capacity',
        'oil_tank_capacity'
    ];


    // Exemplo de relacionamento com a tabela 'photos'
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    // Relacionamento com Categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relacionamento com Marca
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relacionamento com Tipo de Carta
    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class);
    }

    // Relacionamento com Tipo de Motor
    public function engineType()
    {
        return $this->belongsTo(EngineType::class);
    }

    // Relacionamento com Sistema de Lubrificação
    public function lubricationSystem()
    {
        return $this->belongsTo(LubricationSystem::class);
    }

    // Relacionamento com Tipo de Embreagem
    public function clutchType()
    {
        return $this->belongsTo(ClutchType::class);
    }

    // Relacionamento com Sistema de Ignição
    public function ignitionSystem()
    {
        return $this->belongsTo(IgnitionSystem::class);
    }

    // Relacionamento com Sistema de Partida
    public function startingSystem()
    {
        return $this->belongsTo(StartingSystem::class);
    }

    // Relacionamento com Sistema de Transmissão
    public function transmissionSystem()
    {
        return $this->belongsTo(TransmissionSystem::class);
    }

    // Relacionamento com Suspensões
    public function frontSuspension()
    {
        return $this->belongsTo(Suspension::class, 'front_suspension_id');
    }

    public function rearSuspension()
    {
        return $this->belongsTo(Suspension::class, 'rear_suspension_id');
    }
}
