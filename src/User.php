<?php

class User
{

    /**
     * First name
     * @var string
     */
    public $first_name;
    
    /**
     * Last name
     * @var string
     */
    public $surname;

    /**
     * Unique identifier
     * @var integer
     */
    protected $user_id;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->user_id = rand();
        $this->email = $email;
    }

    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    protected function getToken()
    {
       return rand();
    }

    private function getID()
    {
       return 50;
    }

    private function getPrivateMethod($number)
    {
       return $number;
    }

    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function notify(string $message)
    {
        return $this->mailer->send($this->email, $message);
    }

}