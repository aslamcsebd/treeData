<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_datas', function (Blueprint $table) {
            $table->id(); 
            $table->bigInteger('user_id');
            $table->bigInteger('parent_id')->nullable();
            $table->string('data_name', 50);
            $table->tinyInteger('status')->default('1')->comment('0=hide, 1=show');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tree_datas');
    }
}
