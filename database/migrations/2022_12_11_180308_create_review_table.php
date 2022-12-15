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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->enum('type', ['book', 'films', 'record']);
            $table->foreignId('iduser');
            $table->binary('thumbnail');
            $table->text('description');
            $table->timestamps();
            
            
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');

            
            
            
            

        });
        $sql = 'alter table review change thumbnail thumbnail longblob';
            DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
};
