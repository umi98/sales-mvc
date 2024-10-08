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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('id_sales')->unsigned();
            $table->foreign('id_sales')
                ->references('id')
                ->on('sales')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('id_produk')->unsigned();
            $table->foreign('id_produk')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('no_wa');
            $table->string('nama_lead');
            $table->string('kota');
            $table->string('id_user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
