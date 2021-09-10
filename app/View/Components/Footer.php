<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $section1 =
        [
            'Home' => '/',
            'Tentang Kami' => 'about',
            'Layanan' => 'services',
            'Blog' => 'blogs',
            'Bermitra' => 'bermitra',
        ];

        $section2 =
        [
            'Panduan 1' => '#',
            'Panduan 2' => '#',
            'Panduan 3' => '#',
        ];

        $section3 = 
        [
            'Cara Bermitra' => '#',
            'Privacy & Security' => '#',
            'Terms & Conditions' => '#',
        ];

        $section4 =
        [
            'Support@himed.com',
            '0851-5622-9399',
            'Himed, Cianjur, Jawa Barat',
        ];
        return view('layouts.footer', compact('section1', 'section2', 'section3', 'section4'));
    }
}
