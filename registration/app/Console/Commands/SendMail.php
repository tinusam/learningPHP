<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to all users by running thiscommand';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usersMail = User::select('email')->get();
        $emails =[];
        foreach($usersMail as $Mail){
            $emails[] = $Mail['email'];

        }
            
        Mail::send('emails.wel',[], function($message) use ($emails){
            $message->to($emails)->subject('Welcome');
        });
    }
}
