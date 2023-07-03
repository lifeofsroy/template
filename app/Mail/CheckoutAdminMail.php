<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CheckoutAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $cname;
    protected $cemail;
    protected $cphone;
    protected $cwhatsapp;
    protected $cdesc;
    protected $url;


    public function __construct($title, $cname, $cemail, $cphone, $cwhatsapp, $cdesc, $template_url)
    {
        $this->title = $title;
        $this->cname = $cname;
        $this->cemail = $cemail;
        $this->cphone = $cphone;
        $this->cwhatsapp = $cwhatsapp;
        $this->cdesc = $cdesc;
        $this->url = $template_url;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Template-Checkout',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.checkout-admin',

            with: [
                'title' => $this->title,
                'name' => $this->cname,
                'email' => $this->cemail,
                'phone' => $this->cphone,
                'whatsapp' => $this->cwhatsapp,
                'desc' => $this->cdesc,
                'url' => $this->url,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
