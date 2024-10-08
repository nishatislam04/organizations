<?php

namespace App\Mail;

use App\Models\Auth\User;
use App\Models\Organization\Organization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserApprovedMail extends Mailable {
    use Queueable, SerializesModels;

    public string $organizationUrl = "";

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected Organization $organization,
        protected User $user
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            from: new Address("nahidaslamxxx3@gmail.com", "nahid"),
            subject: 'You have Been Approved!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            markdown: 'emails.user.approved',
            with: [
                "organizationName" => $this->organization->name,
                "userName" => $this->user->username
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [];
    }
}
