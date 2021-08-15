<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ManagerTable extends Component
{

	/**
	 * The headers for the table
	 * 
	 * @var array
	 */
	public $headers;

	/**
	 * The rows in an array
	 *
	 * @var array
	 */
	public $rows;
    /**
     * Create a new component instance.
     *
     * @return void
     */
	public function __construct($headers, $rows = null)
    {
		$this->rows= $rows;
		$this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.manager-table');
    }
}
