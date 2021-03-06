<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Branch extends Component
{
	// Attribute for passing value from parent to child components.
	public $data;

	// Constructor.
	public function __construct($data)
	{
		$this->data = $data;
	}

	// Render Branch component.
    public function render()
    {
        return view('livewire.branch');
    }
}
