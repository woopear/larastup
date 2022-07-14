<?php

namespace App\View\Components\input;

use Illuminate\View\Component;

class inputSample extends Component
{
    /**
     * label of the input
     *
     * @var [string]
     */
    public $label;

    /**
     * for set icon or not
     * user, password
     * @var [string]
     */
    public $iconName;

    /**
     * name of input
     *
     * @var [string]
     */
    public $name;

    /**
     * attribute for of labe and id of input
     *
     * @var [string]
     */
    public $forLabel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iconName = null, $label = null, $name = null, $forLabel = null)
    {
        $this->iconName = $iconName;
        $this->label = $label;
        $this->name = $name;
        $this->forLabel = $forLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.input-sample');
    }
}
