<?php

use App\Models\Joblist;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('joblists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('email');
            $table->string('company_Name');
            $table->enum('status',['Active','Inactive']);
            $table->integer('number_impressions')->default(0);
            $table->integer('number_applies')->default(0);
            $table->integer('number_views')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ;
        });
        
        Joblist::insert([
            [
                'user_id' => 2,
                'title' => 'Senior Software Engineer',
                'description' => 'Looking for an experienced software engineer with expertise in backend development and cloud computing.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Software Engineer',
                'description' => 'Seeking a software engineer with experience in developing web applications using modern frameworks.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Frontend Developer',
                'description' => 'Looking for a frontend developer proficient in React and Vue.js for building responsive UIs.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Backend Developer',
                'description' => 'We are looking for a backend developer with expertise in Node.js and Express to build scalable APIs.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Full Stack Developer',
                'description' => 'Join our team as a full stack developer and work with both frontend and backend technologies.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Product Manager',
                'description' => 'We are looking for a product manager to lead and define product strategy and vision.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Data Scientist',
                'description' => 'Seeking a data scientist to work on analyzing and visualizing data insights using Python and machine learning.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'UX/UI Designer',
                'description' => 'We need a UX/UI designer to work on creating intuitive user interfaces and improving user experiences.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'DevOps Engineer',
                'description' => 'Looking for a DevOps engineer to automate and manage our cloud infrastructure.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Quality Assurance Engineer',
                'description' => 'We are looking for a QA engineer to ensure the quality of our products through manual and automated testing.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Network Engineer',
                'description' => 'Join our team as a network engineer to design, implement, and maintain networking systems.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'System Administrator',
                'description' => 'We are looking for a system administrator to manage and maintain our IT infrastructure.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Security Engineer',
                'description' => 'Looking for a security engineer to ensure the safety of our infrastructure and data.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Business Analyst',
                'description' => 'We need a business analyst to help define and implement business solutions.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'user_id' => 2,
                'title' => 'Sales Manager',
                'description' => 'Looking for a sales manager to lead our sales team and drive growth.',
                'email' => 'hr@techcompany.com',
                'company_Name' => 'TechCompany Inc.',
                'status' => 'Active',
                'number_impressions' => 1,
                'number_applies' => 1,
                'number_views' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joblists');
    }
};
