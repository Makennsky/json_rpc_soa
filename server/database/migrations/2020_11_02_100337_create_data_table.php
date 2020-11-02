<?php

use App\Domain\Contracts\DataContract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements(DataContract::FIELD_ID);
            $table->uuid(DataContract::FIELD_UUID);
            $table->string(DataContract::FIELD_AGENDA);
            $table->string(DataContract::FIELD_TOPIC);
            $table->text(DataContract::FIELD_TEXT);
            $table->timestamp(DataContract::FIELD_CREATED_AT);
            $table->timestamp(DataContract::FIELD_UPDATED_AT);
            $table->timestamp(DataContract::FIELD_DELETED_AT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
