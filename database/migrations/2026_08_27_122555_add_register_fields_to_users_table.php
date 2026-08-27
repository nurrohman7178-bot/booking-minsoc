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
        Schema::table('users', function (Blueprint $table) {
            $table->text('address')->after('email');
            $table->string('identity_number')->unique()->after('address');
            $table->string('phone')->after('identity_number');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropUnique(['identity_number']);
        $table->dropColumn([
            'address',
            'identity_number',
            'phone'
        ]);
        });
    }
};
