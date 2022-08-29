<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ZoomUrlMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     **/
    public $name = null;
    /**
     * @var string
     **/
    public $join_url = null;
    /**
     * @var string
     **/
    public $start_time = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$join_url,$start_time)
    {
        $this->name=$name;
        $this->join_url=$join_url;
        $this->start_time=$start_time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Webparadox@Admin.com')->markdown('mail.zoom_url_mail');
    }
}
