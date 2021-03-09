<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TenantActivation extends Mailable
{
    use Queueable, SerializesModels;

    public $tenant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $tenant)
    {
      return  $this->tenant = $tenant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.admin.tenant-activation');
    }
}
