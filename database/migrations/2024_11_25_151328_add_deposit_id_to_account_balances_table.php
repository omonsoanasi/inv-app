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
        Schema::table('account_balances', function (Blueprint $table) {
            $table->foreignId('trc20_u_s_d_t_complete_recharge_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('bep20_u_s_d_t_complete_recharge_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('bnb_complete_recharge_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('account_balances', function (Blueprint $table) {
            $table->dropForeign('bep20_u_s_d_t_complete_recharge_id');
            $table->dropForeign('trc20_u_s_d_t_complete_recharge_id');
            $table->dropForeign('bnb_complete_recharge_id');
        });
    }
};
