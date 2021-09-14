<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TarefaCompartilhada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $tarefa_texto;
    public $tarefa_link;
    public function __construct($tarefa_texto,$tarefa_link)
    {
        $this->tarefa_texto = $tarefa_texto;
        $this->tarefa_link = $tarefa_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tarefas')->with([
            'tarefa_link' => $this->tarefa_link,
            'tarefa_texto' => ($tarefa_texto ?? '')
        ]);
    }
}
