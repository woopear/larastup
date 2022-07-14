<?php

namespace App\View\Components\input;

use App\Models\Role;
use Illuminate\View\Component;

class selectRole extends Component
{
    /**
     * stock all role from database
     *
     * @var [Role]
     */
    public $roles;

    /**
     * for label of input selected
     *
     * @var [string]
     */
    public $label;

    /**
     * placeholder for input selected
     *
     * @var [string]
     */
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $placeholder = 'Choisissez un role')
    {
        $this->roles = Role::all();
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.select-role');
    }
}
