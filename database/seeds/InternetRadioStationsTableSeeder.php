<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class InternetRadioStationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('internetradiostations')->insert([
            'url' => 'http://icecast.omroep.nl/radio2-bb-mp3',
            'title' => 'Radio 2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('internetradiostations')->insert([
            'url' => 'http://icecast.omroep.nl/3fm-bb-mp3',
            'title' => 'Radio 3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('internetradiostations')->insert([
            'url' => 'http://playerservices.streamtheworld.com/api/livestream-redirect/RADIO538.mp3',
            'title' => 'Radio 538',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('internetradiostations')->insert([
            'url' => 'https://stream.slam.nl/slam_mp3',
            'title' => 'Slam FM',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('internetradiostations')->insert([
            'url' => 'http://stream.nlradio.nl/decibelzh',
            'title' => 'Decibel',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
