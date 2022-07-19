<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('client_id')->constrained()->onDelete('CASCADE');
            $table->dateTime('payed_at');
            $table->decimal('price');
            $table->unsignedSmallInteger('contract_type');
            $table->dateTime('started_at');
            $table->dateTime('expired_at');
            $table->text('comment')->nullable()->default(null);
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
        Schema::dropIfExists('contracts');
    }
}
