<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzes')->insert([
                'title' => 'MVCモデルの名前',
                'body' => 'MVCモデルにおけるMはモデル(Model)、Vはビュー(View)を意味しますが、Cは何を意味するでしょう。1.Communication, 2.Controller, 3.Caller',
                'level' => 1,
                'answer' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
         DB::table('quizzes')->insert([
                'title' => 'ユーザインタフェース',
                'body' => 'コンピュータへ出す命令や指示等を、ユーザが画面上で視覚的に捉えて行動を指定できるもので、直感的に操作できるもの特徴を持つのはどれか。1.GUI, 2.CUI, 3.TUI',
                'level' => 2,
                'answer' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
    }
}
