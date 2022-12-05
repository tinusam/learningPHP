<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'users:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Send mail to all users by running thiscommand';

    /**
     * Create a new job instance.
     *
     * @return void
     */

    


    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $usersMail = User::select('email')->get();
        $emails =[];
        foreach($usersMail as $Mail){
            $emails[] = $Mail['email'];

        }
            
        Mail::send('emails.wel',[], function($message) use ($emails){
            $message->to($emails)->subject('This is the test mail for cron');
        });
    }
}
