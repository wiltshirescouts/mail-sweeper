<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('member_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email_address');
        });

        Schema::create('mailing_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->text('description')->nullable();
        });

        Schema::create('contact_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('contact_id')->constrained(table: 'contacts');
            $table->foreignId('tag_id')->constrained(table: 'tags');
        });

        Schema::create('mailing_list_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('mailing_list_id')->constrained(table: 'mailing_lists');
            $table->foreignId('tag_id')->constrained(table: 'tags');
        });

        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->timestamp('sent_at')->nullable();

            $table->foreignId('user_id')->constrained(table: 'users');
            $table->foreignId('mailing_list_id')->nullable()->constrained('mailing_lists');

            $table->string('subject')->nullable();
            $table->longText('body_html')->nullable();
        });

        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('type');
            $table->string('name');
            $table->binary('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('contacts');
    }
};
