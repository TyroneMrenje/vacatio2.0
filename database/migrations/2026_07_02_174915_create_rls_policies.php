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
        DB::statement('ALTER TABLE users ENABLE ROW LEVEL SECURITY');

        DB::statement('CREATE POLICY "guest_room_bookings" on room_bookings FOR SELECT USING (user_id = current_setting(\'app.current_user_id\', true)::integer)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        DB::statement('DROP POLICY IF EXISTS guest_own_bookings ON room_bookings');
        DB::statement('ALTER TABLE room_bookings DISABLE ROW LEVEL SECURITY');
    }
};
