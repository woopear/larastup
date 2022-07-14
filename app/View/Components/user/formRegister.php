<?php

namespace App\View\Components\user;

use Faker\Provider\ar_EG\Text;
use Illuminate\View\Component;

class formRegister extends Component
{
    /**
     * text of btn of formulaire
     *
     * @var [string]
     */
    public $textBtn;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($textBtn = 'Créer')
    {
        $this->textBtn = $textBtn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.form-register');
    }
}
