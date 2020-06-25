<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJabatans extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('jabatans', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string("name");
			$table->float("gaji");
			$table->integer("created_by");
			$table->integer("updated_by")->nullable();
			$table->integer("deleted_by")->nullable();
			$table->softDeletes();
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
    Schema::dropIfExists('jabatans');
  }
}
