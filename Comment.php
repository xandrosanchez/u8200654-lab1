<?php

use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\EmailValidator;
use Symfony\Component\Validator\Validation;

class Comment
{
    private $user;
    private $message;

    public function __construct(User $user, string $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function afterDateTime(DateTime $datetime)
    {
        return $this->user->getCreationDateTime() > $datetime;
    }

    public function getMessage()
    {
        return $this->message;
    }
}