<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLlaveToQrConfigsTable extends Migration
{
    public function up()
    {
        Schema::table('qr_configs', function (Blueprint $table) {
            $table->string('llave', 80)->nullable()->after('mensaje_pago');
        });
    }

    public function down()
    {
        Schema::table('qr_configs', function (Blueprint $table) {
            $table->dropColumn('llave');
        });
    }
}
