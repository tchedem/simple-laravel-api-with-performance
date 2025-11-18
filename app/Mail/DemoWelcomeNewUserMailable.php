<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DemoWelcomeNewUserMailable extends Mailable
{

    // New way (Laravel 9.30+ → Laravel 12): Envelope, Content, Attachments
    // Modern Laravel splits email construction into 3 clear components:

    // The mailable class
    // - was enhance for a more rebust type safety
    // - separated each concerns :
        // - envelope for Metadata Subject, sender, reply-to, tags, metadata.
        // - content: What the user sees HTML view, Markdown view, data passed to the view.
        // - Attachments: All attachments in one place

    use Queueable, SerializesModels;

    public string $name;
    public string $plan;
    public ?string $policyPath;

    /**
     * Create a new message instance.
     */
    public function __construct(string $name, string $plan, ?string $policyPath = null)
    {
        $this->name = $name;
        $this->plan = $plan;
        $this->policyPath = $policyPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to the Platform!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome-user',
            with: [
                'name' => $this->name,
                'plan' => $this->plan,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->policyPath && file_exists($this->policyPath)) {
            $attachments[] = Attachment::fromPath($this->policyPath)
                ->as('Policy.pdf')
                ->withMime('application/pdf');
        }

        return $attachments;
    }
}
