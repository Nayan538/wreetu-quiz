<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commercial_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained('company_infos');
            $table->string('vat_percentage')->nullable();
            $table->string('ait_percentage')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });

        $data = [
                'company_id' => 1,
                'vat_percentage' => '5',
                'ait_percentage' => '3',
                'remarks' => 'VAT & AIT',
        ];

        DB::table('commercial_infos')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial_infos');
    }
};
