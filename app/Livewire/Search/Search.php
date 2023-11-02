<?php

namespace App\Livewire\Search;

use App\Models\Toy;
use App\Models\Technique;
use Illuminate\View\View;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render(): View
    {
        $viewData = [];
        $viewData['toys'] = [];
        $viewData['techniques'] = [];
        if ($this->search != '') {
            $viewData['toys'] = Toy::where('name', 'like', '%' . $this->search . '%')->get();
            $viewData['techniques'] = Technique::where('name', 'like', '%' . $this->search . '%')->get();
        }

        return view('livewire.search.search')->with('viewData', $viewData);
    }
}
