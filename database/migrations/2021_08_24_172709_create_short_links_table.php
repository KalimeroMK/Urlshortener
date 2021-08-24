<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateShortLinksTable extends Migration
    {
        public function up()
        {
            Schema::create('short_links', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('url');
                $table->string('short_url');
                $table->integer('clicks')->nullable();
                $table->boolean('safe')->default(false);
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('short_links');
        }
    }