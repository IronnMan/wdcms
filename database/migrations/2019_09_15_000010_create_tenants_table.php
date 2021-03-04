<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sys_tenants', function (Blueprint $table) {
            $table->char('id' ,32)->primary();

            $table->string('name')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();

            $table->timestamps();
            $table->json('data')->nullable();
            $table->json('module')->nullable();

            $table->pathtree();
            $table->softDeletes();

        });
        Schema::create('sys_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain', 255)->unique();
            $table->char('tenant_id', 32);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_tenants');
        Schema::dropIfExists('sys_domains');

    }
}
