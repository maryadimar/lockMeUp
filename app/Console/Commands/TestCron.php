<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Meet;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:crone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Carbon::now()->format('H:i')
        $datameetings = Meet::where([
                                        ['mulai' , Carbon::now()->format('g:i A')],
                                        ['tanggal' , Carbon::now()->format('d/m/yy')],
                                        ['status', 1]
                                    ])
                            ->Orwhere('status', 11)
                            //->get();
                            ->update(['status' => 2]);
        dd($datameetings);
        
        //https://code.tutsplus.com/id/tutorials/tasks-scheduling-in-laravel--cms-29815
    }
}
