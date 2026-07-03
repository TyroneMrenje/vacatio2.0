<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


       Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->json('amenities')->nullable();
            $table->text('description');
            $table->string('bed_size');
            $table->integer('area_size');
            $table->string('view')->nullable();
            $table->integer('max_occupancy');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
 
        Schema::create('room_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('room_id')->constrained('rooms')->onDelete('cascade');
            $table->string('image_url');
            $table->string('location');
            $table->timestamps();
        });
 
        Schema::create('room_add_ons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
 
        Schema::create('room_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('room_id')->constrained('rooms')->onDelete('cascade');
            $table->string('unit_number')->nullable()->comment('e.g. physical room number / door label');
            $table->enum('status', ['available', 'occupied', 'under_maintenance'])->default('available');
            $table->timestamps();
            $table->index(['room_id', 'status']);
        });
 
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('room_unit_id')->constrained('room_units');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->enum('status', ['booked', 'checked_in', 'checked_out', 'cancelled', 'pending'])->default('pending');
            $table->decimal('total_price', 10, 2);
            $table->integer('number_of_guests');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['room_unit_id', 'check_in_date', 'check_out_date']);
            $table->index('status');
        });
 
        Schema::create('room_booking_add_ons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('room_booking_id')->constrained('room_bookings')->onDelete('cascade');
            $table->foreignUuid('room_add_on_id')->constrained('room_add_ons');
            $table->decimal('price_at_booking', 10, 2)->comment('snapshot of add-on price at time of booking');
            $table->timestamps();
            $table->unique(['room_booking_id', 'room_add_on_id']);
        });
 
        Schema::create('service', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('image_path')->nullable();
            $table->text('description');
            $table->timestamps();
        });
 
        Schema::create('service_menu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('service_id')->constrained('service')->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->timestamps();
        });
 
        Schema::create('service_booking', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('service_menu_id')->constrained('service_menu');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('status', ['booked', 'completed', 'cancelled', 'pending'])->default('pending');
            $table->integer('number_of_guests');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['appointment_date', 'appointment_time']);
            $table->index('status');
        });
 
        Schema::create('event_space', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('image_path')->nullable();
            $table->text('description');
            $table->string('contact_email')->unique();
            $table->timestamps();
        });
 
        Schema::create('event_space_booking', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('event_space_id')->constrained('event_space');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('number_of_guests');
            $table->enum('status', ['booked', 'completed', 'cancelled', 'pending'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['event_space_id', 'booking_date', 'booking_time']);
        });
 
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('review');
            $table->unsignedTinyInteger('rating')->comment('1-5');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
