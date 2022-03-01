<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // $table->tinyInteger('treasury_id');
            $table->rememberToken();
            $table->tinyInteger('role');
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'email' => 'demo',
                'name' => 'demo',
                'password'=>'$2y$10$6FAaNH1pGgEu5rx2YPaXuu4HPQCq5VUI/9bYKq87ui/oomHtf6YYq',
                'remember_token'=>'EBM2k0VaWA5Jr6MgK2SwH1QbEP9McWRLVpnmJHWwtOJ6OrRzTD9rIxmmRsci',
                'created_at'=>'2020-12-06 09:53:02',
                'updated_at'=>'2020-12-06 09:53:02',
                'role'=>1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
