<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\contact;
class ReadContact extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'contact:list';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'View contact list';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $contacts = Contact::all();
        foreach ($contacts as $contact){
            $this->info("id     :".$contact->id);
            $this->info("name   :".$contact->name);
            $this->info("email  :".$contact->email);
            $this->info("phone  :".$contact->number_phone);
            $this->info("\n");
        }
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
