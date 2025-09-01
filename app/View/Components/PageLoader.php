<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Page Loader Component (class-based)
 * Props:
 * - name, logo, variant, note
 */
class PageLoader extends Component
{
    public string $name;
    public string $logo;
    public string $variant;
    public string $note;

    public function __construct(
        string $name = 'App',
        string $logo = '/assets/banner/logo_bupati.png',
        string $variant = 'a',
        string $note = 'Loading'
    ) {
        $this->name    = $name;
        $this->logo    = $logo;
        $this->variant = $variant;
        $this->note    = $note;
    }

    public function render(): View
    {
        return view('components.page-loader');
    }
}
