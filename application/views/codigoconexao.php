<body>
    <main class="text-center">
    <h1>Conecte-se ao seu parceiro</h1><br/><br/>
    <div class="container">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <form method="post" id="formAccConection" action="verificarconecta">
                <p>Passe o código abaixo para o seu parceiro:</p>
                <p class="codigo"><?php echo $codigonovo ?></p>
                <input id="cd_conecta" type="hidden" name="cd_conecta" value="<?php echo $codigonovo ?>">
                <button type="submit" accesskey="A" id="verificar">Verificarar</button>
                <br/><br/>
                </form>
            <form method="post" id="formAccConection" action="verificarconecta">    
<p>Ele também gerou um código? Você também pode digitar o código dele aqui se preferir:</p>
    <input type="text" name="cd_conecta" id="cd_conecta" size="25" placeholder="Código de conexão do parceiro"><br><br>
    <button type="submit" accesskey="C">Confirmar</button>              
</form>              
    </div>
          <div class="col-md-4"></div>
    </main>
  </body>
</html>