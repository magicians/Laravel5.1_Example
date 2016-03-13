<?php

use App\Tag;

//create the navigation
function create_nav()
{
    return Tag::all();
}