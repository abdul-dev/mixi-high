<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('school_id')->nullable()->constrained('schools');
            $table->foreignId('host_family_id')->nullable()->constrained('host_families');
            $table->string('application_number')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('family_name')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->date('dob')->nullable();
            $table->foreignId('nationality_id')->nullable()->constrained('countries');
            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->string('town')->nullable();
            $table->string('state')->nullable();
            $table->string('post_code')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->foreignId('program_id')->nullable()->constrained('programs');
            $table->string('phone_parent')->nullable();
            $table->string('email_parent')->nullable();
            $table->string('allergies')->nullable();
            $table->string('instagram_address')->nullable();
            $table->string('destination_land')->nullable();
            $table->timestamp('interview_date')->nullable();
            $table->string('country_exchange')->nullable();
            $table->boolean('is_accepted')->default(0);
            $table->enum('status', ['Accepted', 'Rejected', 'Pending'])->default('Pending')->nullable();
            $table->boolean('is_application_sent')->default(0);
            $table->boolean('is_interview_appointment')->default(0);
            $table->boolean('is_interview_done')->default(0);
            $table->boolean('is_acceptance_letter_sent')->default(0);
            $table->boolean('is_contract_returned')->default(0);
            $table->boolean('is_student_application_completed')->default(0);
            $table->boolean('is_student_application_exported')->default(0);
            $table->boolean('is_apps_exported')->default(0);
            $table->boolean('placement')->default(0);
            $table->boolean('flight_booked')->default(0);
            $table->date('date')->nullable();
            $table->timestamp('confirmed_at')->nullable();

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
        Schema::dropIfExists('students');
    }
}
