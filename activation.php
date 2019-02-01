<?php

class activation
{
    function activate()
    {
        wp_insert_term('Action', 'tourcategory');
        wp_insert_term('Adventure', 'tourtype');

    }
}