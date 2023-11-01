<?php

namespace App\Livewire\Search;

use App\Models\Toy;
use Illuminate\View\View;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render(): View
    {
        $viewData = [];
        $viewData['products'] = [];
        if (! empty($this->search)) {
            $viewData['products'] = Toy::where('name', 'LIKE', '%{$this->search}%')->get();
        }

        return view('livewire.search.search')->with('viewData', $viewData);
    }
}
