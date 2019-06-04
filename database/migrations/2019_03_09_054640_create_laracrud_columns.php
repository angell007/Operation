<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaracrudColumns extends Migration
{
    public function up()
    {
        // add columns to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('role');
        });

        // create default admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'identificacion' => '123123123',
            'password' => Hash::make('secret'),
            'role' => 'Admin',
        ]);
    }

    public function down()
    {
        // remove columns from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        // delete default admin user
        User::where('email', 'admin@example.com')->delete();
    }
}
