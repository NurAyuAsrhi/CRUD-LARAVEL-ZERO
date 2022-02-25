<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\contact;

class CreateContact extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    //Teks perintah
    protected $signature = 'contact:add';

    /**
     * The description of the command.
     *
     * @var string
     */
    //Deskripsi perintah
    protected $description = 'Add contact';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Menanyakan nama,email dan no hp
        $contact_name = $this->ask('add name');
        $contact_email = $this->ask('add email');
        $contact_number_phone = $this->ask('add number_phone');
        //Menyimpan ke database
        $contact = new contact();
        $contact->name = $contact_name;
        $contact->email = $contact_email;
        $contact->number_phone = $contact_number_phone;
        $contact->save();
        //Menampilkan notif
        $this->notify("notification","Data saved successfully");
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
