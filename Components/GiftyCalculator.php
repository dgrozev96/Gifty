<?php

namespace Gifty\Components;

class GiftyCalculator
{
    public function getSlogan()
    {
        $slogans = [
            'An apple a day keeps the doctor away',
            'Let’s get ready to rumble',
            'A rolling stone gathers no moss',
        ];

        return array_rand(array_flip($slogans));
    }
}