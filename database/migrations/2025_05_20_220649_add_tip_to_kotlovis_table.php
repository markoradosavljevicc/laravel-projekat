<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('kotlovis', function (Blueprint $table) {
            $table->string('tip')->default('drva'); // ili 'pelet'
        });
    }

    public function down()
    {
        Schema::table('kotlovis', function (Blueprint $table) {
            $table->dropColumn('tip');
        });
    }

};
