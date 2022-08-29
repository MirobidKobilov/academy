<?php

namespace App\Console\Commands;

use App\Models\ModelHasRole;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ZoomTime;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;

class SchedulesMettorInZoom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:schedules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "it's a team to make a list of time for zoom's mentors";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('zoom_times')->truncate();
        $i = 0;
        while ($i<8)
        {
            $begin = new DateTime('9:00:00');
            $begin->modify('+'.$i.' day');
            $end = new DateTime( '18:30:00');
            $end->modify('+'.$i.' day');
            $week=date('w',strtotime($begin));
            if ($week!='6' && $week!='0'){
                $interval = new DateInterval('PT30M');
                $daterange = new DatePeriod($begin, $interval ,$end);
                $users = User::role('mentor')->get();
                foreach ($users as $user ){
                    foreach ($daterange as $date) {
                        $zoom= new ZoomTime();
                        $zoom->user_id=$user->id;
                        $zoom->mentor=$user->name;
                        $zoom->free_to_zoom=$date;
                        $zoom->save();
                    }
                }
            }
            $i++;
        }
    }
}
