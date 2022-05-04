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
    //private $creatingUserDateTime; 

    public function __construct(User $user, string $message)
    {
        // $validator = Validation::createValidator();
        // $vId = $validator->validate($message, [
        //     new NotBlank(),
        //     new NotNull(),
        // ]);

        // if (count($vId) !== 0) {
        //     foreach ($vId as $v) {
        //         echo $v->getMessage() . '<br>';
        //     }
        // } else {
            // echo "Everything cool!";
            $this->user = $user;
            $this->message = $message;
            //$this->creationDateTime = time();
        // }
        // $this->user = $user;
        // $this->message = $message;
        //$this->creatingUserDateTime = $user->getCreationDateTime();
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
