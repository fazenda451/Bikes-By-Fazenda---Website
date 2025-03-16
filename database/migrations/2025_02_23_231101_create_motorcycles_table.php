<?php
// Migration for the motorcycles table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorcyclesTable extends Migration
{
    public function up()
    {
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 250);
            $table->string('quantity', 250);
            $table->string('Category')->nullable();
            $table->foreignId('brand_id')->constrained('brands');
            $table->decimal('price', 10, 2);
            $table->foreignId('license_type_id')->constrained('license_types'); 
            $table->string('engine_type', 250);
            $table->string('displacement', 50);
            $table->string('bore_stroke', 50);
            $table->decimal('compression_ratio', 5, 2);
            $table->decimal('max_power', 10, 2);
            $table->decimal('max_torque', 10, 2);
            $table->foreignId('lubrication_system_id')->constrained('lubrication_systems');
            $table->foreignId('clutch_type_id')->constrained('clutch_types');
            $table->foreignId('ignition_system_id')->constrained('ignition_systems');
            $table->foreignId('starting_system_id')->constrained('starting_systems');
            $table->foreignId('transmission_system_id')->constrained('transmission_systems');
            $table->string('final_drive', 250);
            $table->decimal('fuel_consumption', 10, 2);
            $table->decimal('cos2_emissions', 10, 2);
            $table->string('fuel_system', 250);
            $table->string('frame', 250);
            $table->decimal('rake_angle', 5, 2);
            $table->string('trail', 250);
            $table->foreignId('front_suspension_id')->constrained('suspensions');
            $table->foreignId('rear_suspension_id')->constrained('suspensions');
            $table->decimal('front_travel', 10, 2);
            $table->decimal('rear_travel', 10, 2);
            $table->string('front_brake', 250);
            $table->string('rear_brake', 250);
            $table->string('front_tire', 250);
            $table->string('rear_tire', 250);
            $table->decimal('total_length', 10, 2);
            $table->decimal('total_width', 10, 2);
            $table->decimal('total_height', 10, 2);
            $table->decimal('seat_height', 10, 2);
            $table->decimal('wheelbase', 10, 2);
            $table->decimal('ground_clearance', 10, 2);
            $table->decimal('weight', 10, 2);
            $table->decimal('fuel_tank_capacity', 10, 2);
            $table->decimal('oil_tank_capacity', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('motorcycles');
    }
}
