<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeaveAllowanceToLeaveApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            $table->integer('leave_allowance_id')->unsigned()->after('return_date');
            $table->foreign('leave_allowance_id')->references('id')->on('leave_allowances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            $table->dropForeign('leave_applications_leave_allowance_id_foreign');
            $table->dropColumn('leave_allowance_id');
        });
    }
}
