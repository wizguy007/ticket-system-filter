<?php

use App\Models\User;
use App\Models\Group;
use App\Models\Tenant;
use App\Models\Contact;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class);
            $table->foreignIdFor(Contact::class);

            $table->string('subject');
            $table->string('type');
            $table->string('source');
            $table->string('status');
            $table->string('priority');
            $table->text('description')->nullable();
            $table->text('tags')->nullable();

            $table->foreignIdFor(Group::class)->nullable();
            $table->foreignIdFor(User::class, 'agent_id')->nullable();

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
        Schema::dropIfExists('tickets');
    }
}
