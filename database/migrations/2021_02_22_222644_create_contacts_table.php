<?php

use App\Models\Tenant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class);

            $table->string('title');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('work_phone');
            $table->string('mobile_phone');
            $table->string('twitter')->nullable();
            $table->string('unique_external_id')->nullable();
            $table->text('address')->nullable();
            $table->string('timezone')->nullable();
            $table->string('language')->nullable();
            $table->text('tags')->nullable();
            $table->text('about')->nullable();

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
        Schema::dropIfExists('contacts');
    }
}
