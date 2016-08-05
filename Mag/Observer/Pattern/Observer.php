<?php

namespace Observer\Pattern;

interface Observer
{
    function updated(Subject $subject);
}
