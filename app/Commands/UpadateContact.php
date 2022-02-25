<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\contact;
class UpadateContact extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'contact:update';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Update contact';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        do {
            //Menampilkan judul
           $this->info('list contact');
           //Memanggil daftar kontak
           $this->call('contact:list');
           $id = $this->ask('Add id :');
           //Menanayakan id yang akan diupdate
           $contact = contact::find($id);
           if (is_null($contact)){
               //Jika id tidak ditemukan akan menampilakn info 'id tidak terdefinisi'
               $this->info("id undefined");
           }
        } while (is_null($contact));
        $name = $this->ask('Name', $contact->name);
        $email = $this->ask('Email', $contact->email);
        $number_phone= $this->ask('Number_phone', $contact->number_phone);
        $contact->update(compact('name','email','number_phone'));
        $this->notify("notification","Data changed successfully");
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
