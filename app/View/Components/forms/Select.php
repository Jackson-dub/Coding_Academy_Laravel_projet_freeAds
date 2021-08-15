<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class Select extends Component
{
	/**
	 * The select name
	 *
	 * @var string
	 */
	public $name;

	/**
	 * The select label
	 *
	 * @var string
	 */
	public $label;

	/**
	 * The select options
	 *
	 * @var array 
	 */
	public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $options)
    {
		$this->name = $name;
		$this->label = $label;
		$this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
