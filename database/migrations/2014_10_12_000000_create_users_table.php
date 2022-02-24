<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surename')->nullable();
            $table->enum('region', [
                'Abruzzo',
            	'Basilicata',
                'Calabria',
                'Campania',
                'Emilia-Romagna',
                'Friuli Venezia Giulia',
                'Lazio',
                'Liguria',
                'Lombardia',
                'Marche',
                'Molise',
                'Piemonte',
                'Puglia',
                'Sardegna',
                'Sicilia',
                'Toscana',
                'Trentino-Alto Adige',
                'Valle d Aosta',
                'Veneto',
            ])->nullable();
            $table->string('email')->unique();
            $table->string('avatar_path')->nullable();
            $table->string('cv_path')->nullable();
            $table->enum('level', ['junior', 'middle', 'senior'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
