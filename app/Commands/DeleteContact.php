<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\contact;
class DeleteContact extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'contact:delete';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Delete contact';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Menanyakan id yang akan dihapus
        $contact_delete = $this->ask('add id to delete');
        $contact = contact::findOrFail($contact_delete);
        $contact->delete();
        $this->notify("notification","Data deleted successfully");
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
