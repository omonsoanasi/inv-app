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
        Schema::table('customer_withdrawals', function (Blueprint $table) {
            $table->boolean('pending')->default(true)->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_withdrawals', function (Blueprint $table) {
            $table->dropColumn('pending');
        });
    }
};