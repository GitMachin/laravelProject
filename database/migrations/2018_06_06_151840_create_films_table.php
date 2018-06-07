<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('films', function (Blueprint $table) {
			$table->increments('id');

			$table->string('resume', 700);
			$table->string('titre');

//			$table->integer('realisateur_id')->unsigned();

			$table->timestamp('date_sortie');
			$table->integer('duree');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('films');
	}

}
