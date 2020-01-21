<?php

function setActiveRoute($name)
{
    return request()->routeIs($name) ? 'nav-link active' : 'nav-link';
}