<?php

namespace App\Presenters;

use App\Forms;
use Nette\Application\UI\Form;
use App\Model;


class SignPresenter extends BasePresenter
{
    /** @var Forms\SignInFormFactory */
    private $signInFactory;

    /** @var Forms\SignUpFormFactory */
    private $signUpFactory;

    /** @var Model\UserManager */
    private $userManager;

    public function __construct(Forms\SignInFormFactory $signInFactory, Forms\SignUpFormFactory $signUpFactory, Model\UserManager $userManager)
    {
        $this->signInFactory = $signInFactory;
        $this->signUpFactory = $signUpFactory;
        $this->userManager = $userManager;
    }


    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentSignInForm()
    {
        return $this->signInFactory->create(function () {
            $this->redirect('Homepage:');
        });
    }


    /**
     * Sign-up form factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentSignUpForm()
    {
        return $this->signUpFactory->create(function () {
            $this->flashMessage('Prave ste pridali do DB noveho zakaznika');
            $this->redirect('Homepage:');
        });
    }


    public function actionOut()
    {
        $this->getUser()->logout();
    }

    public function renderUp(){
        $this->template->cards = $this->userManager->getAllCards();
    }
}
