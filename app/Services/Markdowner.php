<?php

namespace App\Services;

use Michelf\MarkdownExtra;
use Michelf\SmartyPants;
use Purifier;

class Markdowner
{
    public function toHTML($text)
    {
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        $text = Purifier::clean($text, 'markdown');
        return $text;
    }
}
