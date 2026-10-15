<?php
//função  sem parametro
   function appresentarSistema()
   {
    echo "bem-vindo no helpdesk";
   }
//função com parametro
    appresentarSistema();

    function abrirChamada($nome, $problema){
        echo"$nome abririu um chamado: $problema";
    }

    abrirChamada("juvensky", "computador não funciona");
//função que returna 
    function contarChamados($quantidade){
        return "existem $quantidade chamados registrados";
    }

    $resultado = contarChamados(5);
?>