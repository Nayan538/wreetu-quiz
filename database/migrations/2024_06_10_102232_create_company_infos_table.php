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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_fav')->nullable();
            $table->string('report_logo')->nullable();
            $table->string('company_bio')->nullable();
            $table->string('website')->nullable();
            $table->softDeletes();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
        });

        $data = [
            [
                'company_name' => 'Opzo Technologies',
                'company_email' => 'info@opzo.app',
                'company_phone' => '01606107310',
                'company_address' => 'Banani CA, Block-B, House-77/A, Road- 14, Dhaka-1213',
                'company_logo' => 'Company Logo',
                'company_fav' => 'Company Fav',
                'report_logo' => 'Report Logo',
                'company_bio' => 'Say goodbye to paper, rack and excel sheets. Embrace the smart and intelligent cloud software that works!',
                'website' => 'https://opzo.app',
            ]
        ];

        DB::table('company_infos')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
