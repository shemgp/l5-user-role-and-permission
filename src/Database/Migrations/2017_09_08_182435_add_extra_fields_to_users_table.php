<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug', 100)->nullable()->after('id');
            $table->unsignedInteger('status_id')->nullable()->after('slug');
            $table->string('cuit')->after('status_id');
            $table->unsignedInteger('document_type_id')->nullable()->after('cuit');
            $table->string('document_number', 25)->nullable()->after('document_type_id');
            $table->renameColumn('name', 'first_name');
            $table->string('last_name', 100)->nullable()->after('name');
            $table->string('position', '100')->nullable()->after('last_name');
            $table->string('legal_address')->nullable()->after('position');
            $table->string('home_address')->nullable()->after('legal_address');
            $table->string('zip_code', 25)->nullable()->after('home_address');
            $table->string('town', 50)->nullable()->after('zip_code');
            $table->string('country', 50)->nullable()->after('town');
            $table->string('state', 50)->nullable()->after('country');
            $table->string('city', 50)->nullable()->after('state');
            $table->unsignedInteger('country_id')->nullable()->after('city');
            $table->unsignedInteger('state_id')->nullable()->after('country_id');
            $table->unsignedInteger('city_id')->nullable()->after('state_id');
            $table->string('mobile', 25)->nullable()->after('city_id');
            $table->string('phone', 25)->nullable()->after('mobile');
            $table->string('fax', 25)->nullable()->after('phone');
            $table->string('website', 100)->nullable()->after('fax');
            $table->string('twitter', 100)->nullable()->after('website');
            $table->string('facebook', 100)->nullable()->after('twitter');
            $table->text('comment')->nullable()->after('facebook');
            $table->string('activation_code', 30)->nullable();
            $table->boolean('confirmed')->nullable()->default(0)->after('comment');
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
        Schema::dropIfExists('customers');
    }
}
