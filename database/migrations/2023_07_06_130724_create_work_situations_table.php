<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('work_situations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('year');
            $table->integer('month');
            $table->dateTime('payment_at')->nullable()->comment('支払日〇月〇日');
            $table->integer('days_worked')->nullable()->comment('実際に出勤した日数 days');
            $table->integer('vacation_full_days')->nullable()->comment('有休休暇（1日休） days');
            $table->integer('vacation_half_days')->nullable()->comment('有休休暇（半日） half days');
            $table->integer('vacation_time_off')->nullable()->comment('有休休暇（時間） hours');
            $table->integer('special_vacation_full_days')->nullable()->comment('特別休暇（有休扱い　1日休） days');
            $table->integer('special_vacation_half_days')->nullable()->comment('特別休暇（有休扱い　半日休） half days');
            $table->integer('special_vacation_time_off')->nullable()->comment('特別休暇（有休扱い　時間） hours');
            $table->integer('absence_days')->nullable()->comment('欠勤（日数） days');
            $table->integer('absence_hours')->nullable()->comment('欠勤（時間） hours');
            $table->integer('leave_without_pay_days')->nullable()->comment('無給休暇（忌引・看護休暇） days');
            $table->integer('leave_without_pay_hours')->nullable()->comment('無給休暇（時間） hours');
            $table->integer('additional_hours')->nullable()->comment('土曜日等にいつもより多め勤務（追加時間） hours');
            $table->integer('early_shifts_days')->nullable()->comment('早番の回数 times');
            $table->integer('no_lunch_days')->nullable()->comment('給食なしの日数 days');
            $table->integer('holiday_work_overtime')->nullable()->comment('休日出勤（残業扱い） hours');
            $table->integer('holiday_work_compensatory_time_off')->nullable()->comment('休日出勤（代休） days');
            $table->integer('temporary_closing_school_days')->nullable()->comment('臨時休園（日数） days');
            $table->integer('temporary_holiday_closure_hours')->nullable()->comment('臨時休園（時間） hours');
            $table->integer('work_at_home_days')->nullable()->comment('在宅勤務 days');
            $table->integer('conference_fee')->nullable()->comment('会議費/宿泊費 ￥2000（学童のみ） times');
            $table->integer('overtime_over_8_hours')->nullable()->comment('残業時間（1日の勤務が8時間超えた分） hours');
            $table->integer('overtime_under_8_hours')->nullable()->comment('残業時間（1日の勤務が8時間未満の分） hours');
            $table->text('comment')->nullable()->comment('備考');
            $table->timestamps();

            $table->unique(['user_id', 'year', 'month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_situations');
    }
};
