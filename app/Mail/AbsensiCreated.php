<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Absensi;

class AbsensiCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $absensi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Absensi $absensis)
    {
        $this->absensi = $absensis;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('ketuaUKM.absensi.view')->with(['absensi' => $this->absensi]);
    }
}
