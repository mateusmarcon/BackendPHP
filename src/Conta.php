<?php

namespace Reweb\Job\Backend;

/**
 *
 * @author Mateus Marcon - mateus-marcon@hotmail.com
 */
class Conta
{
    /**
     *
     * @return string
     */

	public $saldo = 0.00;
    public $nome; 
    public $conta; 
    public $tipo;
    public $valor;
    public $limite = 0;
    public $taxa = 0;
    static $taxaCc = 2.50;
    static $taxaCp = 0.80;

    function __construct($nome, $tipo)
    {	

        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->limite = $this->setLimite($tipo);
        $this->taxa = $this->setTaxa($tipo);
    }

    function setLimite($tipo){
        if($tipo == "1"){
            return 1000.00;
        }
        else{
            return 600.00;
        }
    }

    function setTaxa($tipo){
        if($tipo == "1"){
            return 0.80;
        }
        else{
            return 2.50;
        }
    }

    function getTipo(){
        if($this->tipo == "1"){
            return "Conta Poupança";
        }
        else{
            return "Conta Corrente";
        }
    }

    function depositar($valor){
        $this->saldo = $valor + $this->saldo;
    }

    function sacar($valor){
        if ($this->limite >= $valor){ 
            if($this->saldo>=$valor){
                $this->saldo = $this->saldo - $valor-$this->taxa;
                $this->limite = $this->limite - $valor; 
            }
            else{
                echo "\nSaldo insuficiente!\n"; 
            }
        }
        else{
            echo "Você atingiu o limite de saques!\n";
        }
    }

    function verificarSaldo($valor,$saldo){
        if($valor<=$saldo){
            return true;
        }
        else{
            return false;
        }
    }

}
