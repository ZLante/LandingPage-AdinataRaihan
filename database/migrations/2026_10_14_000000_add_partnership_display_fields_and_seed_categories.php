<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('icon')->default('bi bi-building');
            $table->string('theme', 30)->default('blue');
        });

        $now = now();
        DB::table('partners')->insert([
            [
                'name' => 'Pemerintahan',
                'description' => 'Kerja sama dengan instansi pemerintahan.',
                'website' => 'https://polnep.ac.id/page/kerjasama-pemerintahan',
                'icon' => 'bi bi-bank',
                'theme' => 'blue',
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Perusahaan',
                'description' => 'Kerja sama dengan perusahaan dan dunia usaha.',
                'website' => 'https://polnep.ac.id/page/kerjasama-perusahaan',
                'icon' => 'bi bi-buildings',
                'theme' => 'teal',
                'sort_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Industri',
                'description' => 'Kolaborasi vokasi dengan mitra industri.',
                'website' => 'https://polnep.ac.id/page/kerjasama-industri',
                'icon' => 'bi bi-gear-wide-connected',
                'theme' => 'orange',
                'sort_order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Perguruan Tinggi & Sekolah',
                'description' => 'Kolaborasi dengan perguruan tinggi dan sekolah.',
                'website' => 'https://polnep.ac.id/page/kerjasama-perguruan-tinggi-sekolah',
                'icon' => 'bi bi-mortarboard-fill',
                'theme' => 'purple',
                'sort_order' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'BUMN',
                'description' => 'Kerja sama dengan Badan Usaha Milik Negara.',
                'website' => 'https://polnep.ac.id/page/kerjasama-bumn',
                'icon' => 'bi bi-building-fill-check',
                'theme' => 'red',
                'sort_order' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Asosiasi',
                'description' => 'Kemitraan dengan asosiasi profesi dan organisasi.',
                'website' => 'https://polnep.ac.id/page/kerjasama-asosiasi',
                'icon' => 'bi bi-people-fill',
                'theme' => 'green',
                'sort_order' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        DB::table('faqs')->insert([
            [
                'question' => 'What is POLNEP?',
                'answer' => 'POLNEP is Politeknik Negeri Pontianak, a vocational higher education institution in Pontianak.',
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question' => 'Where can I read about POLNEP’s vision and mission?',
                'answer' => 'Visit the Vision & Mission page from the campus profile links.',
                'sort_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question' => 'How can I see the campus organization structure?',
                'answer' => 'Open the Organization Structure page to view the current chart.',
                'sort_order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question' => 'How do I sign in?',
                'answer' => 'Use the Login link and enter your username or email and password. Student and visitor accounts return to this landing page after signing in.',
                'sort_order' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('partners')
            ->whereIn('website', [
                'https://polnep.ac.id/page/kerjasama-pemerintahan',
                'https://polnep.ac.id/page/kerjasama-perusahaan',
                'https://polnep.ac.id/page/kerjasama-industri',
                'https://polnep.ac.id/page/kerjasama-perguruan-tinggi-sekolah',
                'https://polnep.ac.id/page/kerjasama-bumn',
                'https://polnep.ac.id/page/kerjasama-asosiasi',
            ])
            ->delete();

        Schema::dropIfExists('faqs');

        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn(['sort_order', 'icon', 'theme']);
        });
    }
};
