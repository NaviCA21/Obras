<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UsuarioCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $contra;

    public function __construct(User $user, $contra)
    {
        $this->user = $user;
        $this->contra = $contra;
    }

    public function build()
    {
        return $this->view('emails.correoUsuarioCreado')
            ->with([
                'name' => $this->user->name,
                'email' => $this->user->email,
                'oficina' => $this->user->oficina->nombreOficina,
                'password' => $this->contra,
                'roles' => $this->user->roles->pluck('name'),
                'permissions' => $this->user->permissions->pluck('name'),
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Usuario Creado',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
