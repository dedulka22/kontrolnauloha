<?php

namespace App\Forms;

use App\Model;
use Nette;
use Nette\Application\UI\Form;


class SignUpFormFactory
{
    use Nette\SmartObject;


    /** @var FormFactory */
    private $factory;

    /** @var Model\UserManager */
    private $userManager;


    public function __construct(FormFactory $factory, Model\UserManager $userManager)
    {
        $this->factory = $factory;
        $this->userManager = $userManager;
    }

    /**
     * @return Form
     */
    public function create(callable $onSuccess)
    {
        $form = $this->factory->create();

        $form->addText('meno', 'Meno:');
        $form->addText('priezvisko', 'Priezvisko:');

        $form->addText('email', 'Váš e-mail:')
            ->setRequired('Prosím vložte Váš e-mail.')
            ->addRule($form::EMAIL);

        $form->addText('adresa', 'Adresa:')
            ->setRequired("Adresa je povinný údaj");

        $form->addText('telefon', 'Telefon:')
            ->addCondition(Form::FILLED)
            ->addRule(Form::PATTERN, 'prosím zadejte korektní telefon', '^[+(]{0,2}[0-9 ().-]{9,}');

        $cards = $this->userManager->getAllCards();

        $form->addSelect('typ_karty', 'Typ karty:')
            ->setItems($cards,true);

        $form->addSubmit('send', 'Zaregistrovať');

        $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {

            try {
                $this->userManager->add($values->meno,$values->priezvisko, $values->email,$values->adresa,$values->telefon,$values->typ_karty);
                $onSuccess();
            } catch (Exception $e) {
                throw $e->getMessage('Karta je uz obsadena');
            }


        };
        return $form;
    }
}
