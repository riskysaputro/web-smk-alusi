<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    // public $student;
    // public function __construct($student)
    // {
    //      $this->student = $student;
    // }
    public $student;

public function __construct(Student $student)
{
    $this->student = $student;
}
    // public function build()
    // {
    //     return $this->view('emails.student_status')
    //                 ->subject('Status Pendaftaran Siswa')
    //                 ->with(['student' => $this->student]);
    // }
public function build()
{
    return $this->subject('Status Pendaftaran Anda')
                ->view('emails.student-status')
                ->with(['student' => $this->student]);
}



    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Student Status Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.student_status',
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