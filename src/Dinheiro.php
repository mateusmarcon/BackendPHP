<?php

namespace Reweb\Job\Backend;

/**
 *
 * @author Mateus Marcon - mateus-marcon@hotmail.com
 */

class Dinheiro
{
    /**
     *
     * @return string
     */
    //formata o valor colocando 2 números após a virgula
    function formatar($value) {
        return number_format($value, 2);    
    }

    function formatarVirgula($value) {
        return number_format($value, 2, ',', '.');    
    }
}
