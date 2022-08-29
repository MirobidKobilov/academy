<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteStudent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var User
     **/
    protected $user = null;
    /**
     * @var string
     **/
    protected $url = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::findOr($this->user->id, fn() => abort(403));
        $user->roles = 'guest';
        return $this->markdown('mail.invite-student')
            ->from('Webparadox@Admin.com')
            ->to($this->user->email)
            ->with(['url' => $this->url]);
    }
}
