<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
			
		
			$table->integer('client_id')
				->unsigned()
				->nullable() // pour auhtoriser les commentaire annonime
				->index();

			$table->foreign('client_id')
				->references('id')
				->on('clients')
				// ->onDelete('cascade');
				->onDelete('set null');  // Pour garder le commentaire annonme en cas de supressino du client

			$table->integer('film_id')
				->unsigned()
				->index();

			$table->foreign('film_id')
				->references('id')
				->on('films')
				->onDelete('cascade');

			
			
			$table->string('texte');
			
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
        Schema::dropIfExists('commentaires');
    }
}
