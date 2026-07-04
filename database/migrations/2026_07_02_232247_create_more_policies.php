<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        DB::statement("ALTER TABLE room_booking_add_ons ENABLE ROW LEVEL SECURITY");

        DB::statement("ALTER TABLE service_booking ENABLE ROW LEVEL SECURITY");

        DB::statement("ALTER TABLE event_space_booking ENABLE ROW LEVEL SECURITY");


        DB::statement("CREATE POLICY  guest_own_room_bookings ON room_bookings FOR ALL USING(
              current_setting('app.current_user_role', true) = 'manager'
              OR user_id = current_setting('app.current_user_id', true)::integer
        )");

    /*    DB::statement("CREATE POLICY guest_own_room_booking_add_ons ON room_booking_add_ons FOR ALL USING(
            current_setting('app.current_user_role', true) = 'manager'
            OR user_id = current_setting('app.current_user_id', true)::integer
        )");*/

        DB::statement("CREATE POLICY guest_own_service_bookings ON service_booking FOR ALL
            USING (
                current_setting('app.current_user_role', true) = 'manager'
                OR user_id = current_setting('app.current_user_id', true)::integer
        );");
       
       DB::statement("CREATE POLICY guest_own_event_space_bookings ON event_space_booking FOR ALL USING(
            current_setting('app.current_user_role', true) = 'manager'
            OR user_id = current_setting('app.current_user_id', true)::integer
        )");
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
