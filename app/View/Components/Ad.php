<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Ad extends Component
{
	/**
	 * The ressource Ad to show
	 *
	 */
	public $ad;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Ad $ad)
    {
		$this->ad = $ad;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ad');
    }
}
