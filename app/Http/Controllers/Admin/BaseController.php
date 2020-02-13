<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $news = [
        [
            'id' => 1,
            'title' => 'выборы',
            'text' => 'выборы состоялись!!',
            'category' => 1
        ],
        [
            'id' => 2,
            'title' => 'спортивная новость',
            'text' => 'Победу одержал наш чемпион!!',
            'category' => 2
        ],
        [
            'id' => 3,
            'title' => 'президент',
            'text' => 'путин опять что-то пообещал',
            'category' => 1
        ]
    ];

    protected $categories = [
        [
            'id' => 1,
            'name' => 'политика'
        ],
        [
            'id' => 2,
            'name' => 'спорт'
        ]
    ];
}
