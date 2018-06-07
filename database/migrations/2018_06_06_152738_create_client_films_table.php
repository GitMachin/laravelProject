<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFilmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('client_films', function (Blueprint $table) { 
			$table->integer('client_id')
				->unsigned()
				->index();

			$table->foreign('client_id')
				->references('id')
				->on('clients')
				->onDelete('cascade');

			$table->integer('film_id')
				->unsigned()
				->index();

			$table->foreign('film_id')
				->references('id')
				->on('films')
				->onDelete('cascade');

			$table->primary(['client_id', 'film_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('client_films');
	}

}
