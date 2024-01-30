<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => '',
    'font_path' => base_path('resources/fonts/Yekan'),
    'font_data' => [
        'examplefont' => [
            'R'  => 'YekanRegular.TTF',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ]

    ],



];

