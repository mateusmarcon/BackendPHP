<?php

require_once __DIR__ . '/vendor/autoload.php';

use Reweb\Job\Backend;

//$exemplo = new Backend\Exemplo;
		//gera conta com valores randomicos, esta conta será utilizada em caso de operação de transferência
		$contaA = new Backend\Conta((chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90))),rand(1, 2));
		
		$tipo = 0;
		
		//inicia o progama
		echo "Banco do planeta Cyber\n";
	    echo "\nEscolha o tipo de conta que deseja criar:\n";
	    while($tipo != 1 && $tipo != 2){
	    	echo "Conta Poupança - digite 1\n";
	    	echo "Conta Corrente - digite 2\n";
	    	$t = fgets(STDIN);
	    	$tipo = intval($t);
	    }
	    //classe dinheiro é utilizada para formatar os valores
	    $dinheiro = new Backend\Dinheiro;
	    echo "digite seu nome\n";
		$nome = fgets(STDIN);

		//instancia a classe conta passando os valores fornecidos pelo usuário
	    $conta = new Backend\Conta($nome,$tipo);
		
		//informa os dados cadastrados
		echo "Dados cadastrados:\n\n - Nome: ".$conta->nome." - Tipo da conta: ".$conta->getTipo()."\n - Limite p/ Saque: B$ ".$dinheiro->formatar($conta->limite)."\n - Saldo Atual: B$ ".$dinheiro->formatar($conta->saldo)."\n\n\n";
		
		$operando = 0;
		//oferece opção de operações enquanto operando for igual a zero
		while ($operando == 0) {
		echo "Escolha a operação desejada:\n";
		echo " Saque - Digite 1\n Depósito - Digite 2\n Tranferências - Digite 3\n Digite outro valor para finalizar\n";
		$operacao = fgets(STDIN);
		//verifica a operação escolhida
		switch (intval($operacao)) {
		    case 1:
		        echo "Digite o valor do saque (utilize ponto em vez de vírgula)\n";
		    	$valor= fgets(STDIN);
		    	$conta->sacar(floatval($valor));		      
		        break;
		    case 2:
		    	echo "Digite o valor a depositar (utilize ponto em vez de vírgula)\n";
		    	//$valor= $dinheiro->formatar(fgets(STDIN));
		    	$valor= fgets(STDIN);
		    	$conta->depositar(floatval($valor));
		        break;
		    case 3:
		        echo "Conta disponível para deposito: ".$contaA->nome."\n";
		        echo "Digite o valor da tranferência (utilize ponto em vez de vírgula) \n";
		        $valor= fgets(STDIN);
		    	$validar = $conta->verificarSaldo($valor,$conta->saldo);
		    	if($validar){
		    		$contaA->saldo+=  floatval($valor);
		    		$conta->saldo-=   floatval($valor);
		    		echo "\n\nTranferência realizada!\n";
		    		echo "Dados da conta beneficiada:\n - Nome: ".$contaA->nome." - Tipo da conta: ".$contaA->getTipo()."\n - Saldo Atual: B$ ".$dinheiro->formatar($contaA->saldo)."\n\n\n";
		    	}
		    	else{
		    		echo "Saldo insuficiente!\n";
		    	}
		        break;
		    default:
		    	$operando = 1;
		        echo "Finalizado programa\n";
		}
		    echo "Seus Dados:\n - Nome: ".$conta->nome." - Tipo da conta: ".$conta->getTipo()."\n - Limite p/ Saques: B$ ".$dinheiro->formatar($conta->limite)."\n - Saldo Atual: B$ ".$dinheiro->formatar($conta->saldo)."\n\n";
		}
		
		//echo intval($operacao);	


