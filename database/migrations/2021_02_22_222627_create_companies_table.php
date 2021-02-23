<?php

use App\Models\Tenant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class);

            $table->string('logo')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->text('domains')->nullable();
            $table->string('health_score')->nullable();
            $table->string('account_tier')->nullable();
            $table->dateTime('renewal_date')->nullable();
            $table->string('industry')->nullable();

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
        Schema::dropIfExists('companies');
    }
}
