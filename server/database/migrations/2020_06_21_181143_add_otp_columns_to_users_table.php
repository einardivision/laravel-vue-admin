<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtpColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_number')
                ->after('email');
            $table->string('google2fa_secret')
                ->nullable()
                ->after('is_ip_lock_enabled');
            $table->string('pin')
                ->after('is_ip_lock_enabled')
                ->nullable();
            $table->string('otp')
                ->nullable()
                ->after('is_ip_lock_enabled');
            $table->enum('otp_type', ['pin', 'mail', 'sms', 'google2fa'])
                ->default('pin')
                ->after('is_ip_lock_enabled');
            $table->boolean('is_otp_verification_enabled_at_login')
                ->after('is_ip_lock_enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_otp_verification_enabled_at_login');
            $table->dropColumn('otp_type');
            $table->dropColumn('otp');
            $table->dropColumn('pin');
        });
    }
}