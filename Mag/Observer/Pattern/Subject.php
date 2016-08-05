<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 04/08/2016
 * Time: 21:02
 */

namespace Observer\Pattern;

interface Subject
{
    function attach(Observer $observer);

    function detach(Observer $observer);

    function notify();

    function get();
}