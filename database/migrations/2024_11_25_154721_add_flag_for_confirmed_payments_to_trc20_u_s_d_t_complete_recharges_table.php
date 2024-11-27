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
        Schema::table('trc20_u_s_d_t_complete_recharges', function (Blueprint $table) {
            $table->boolean('confirmed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trc20_u_s_d_t_complete_recharges', function (Blueprint $table) {
            $table->dropColumn('confirmed');
        });
    }
};
