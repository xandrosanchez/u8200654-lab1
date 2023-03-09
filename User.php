<?php

require_once '../vendor/autoload.php';

use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Validation;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    public $creationDateTime;

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $validator = Validation::createValidator();
        $vId = $validator->validate($id, [
            new Length(['max' => 10, 'maxMessage' => 'Ваш id должно быть =< {{ limit }} символов']),
            new Positive(),
            new NotBlank(),
        ]);
        $validator1 = Validation::createValidator();
        $vName = $validator1->validate($name, [
            new Length(['max' => 100, 'min' => 2,
                'maxMessage' => 'Ваше имя должно быть =< {{ limit }} символов',
                'minMessage' => 'Ваш имя должно быть => {{ limit }} символов']),
            new NotBlank(),
        ]);
        $validator1 = Validation::createValidator();
        $vEmail= $validator->validate($email, [
            new Length(['min' => 7, 'minMessage' => 'Ваш email должен быть => {{ limit }} символов']),
            new Email(['message' => 'The email {{ value }} is not a valid email.']),
            new NotBlank(),
        ]);

        $vPassword = $validator->validate($password, [
            new Length(['min' => 4, 'minMessage' => 'Ваш пароль должен быть => {{ limit }} символов']),
            new NotBlank(),
        ]);

        if (count($vId) !== 0 || count($vName) !== 0 || count($vEmail) !== 0 || count($vPassword) !== 0) {

            if (count($vId) !== 0) {
                foreach ($vId as $v) {
                    echo $v->getMessage() . "\n";
                }
            }
            if (count($vName) !== 0) {
                foreach ($vName as $v) {
                    echo $v->getMessage() . "\n";
                }
            }
            if (count($vEmail) !== 0) {
                foreach ($vEmail as $v) {
                    echo $v->getMessage() . "\n";
                }
            }
            if (count($vPassword) !== 0) {
                foreach ($vPassword as $v) {
                    echo $v->getMessage() . "\n";
                }
            }
        } else {
            echo "Everything cool!\n";
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->creationDateTime = new DateTime('now');
        }
    }

    public function getCreationDateTime()
    {
        return $this->creationDateTime;
        //for commit
    }
}