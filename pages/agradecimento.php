<?php
    include("cabecalho.php");
    include("../bd/conect.php");
    $opcao = $_GET["acao"];
    Inserir($opcao);
    header("Refresh: 5; url=../index.php");
    
?>
 <link rel="stylesheet" href="../css/style.css">
   <main class="container-fluid">
        <section class="row sec-conteudo">
            <div class="col-sm-12 text-center">
                
                <h2>OBRIGADO POR AVALIAR,<br>SUA OPNIÃO É MUITO IMPORTANTE!!!</h2>
            </div>
            <div class="spinner-border"></div>
        </section>
    </main>

<?php
    include("rodape.php");
?>