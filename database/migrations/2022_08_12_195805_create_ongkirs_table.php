<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongkirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("payment_id");
            $table->date('tgl_pengiriman')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->string('kode_pos',10);
            $table->string('kabupaten',20);
            $table->string('detail_alamat',20);
            $table->enum('status', ['1','2','3','4'])->comment('1= belum dikirim, 2=dikirim, 3=diterima, 4=gagal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ongkirs');
    }
};
