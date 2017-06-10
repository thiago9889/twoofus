 <body>
    <script>
      function Aparece(el){
        var display = document.getElementById(el).style.display;
            document.getElementById(el).style.display = 'block';
    	}
    </script>
    <main class="text-center">
      <img src="<?php echo base_url();?>img/logo2ofus.png" alt="Logo 2 of us" class="logo" />
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <button type="submit" accesskey="C"  onclick="window.location.href='cadastro'">Cadastre-se</button>
            <button type="submit" accesskey="A" onclick="Aparece('login')">Acesse sua conta</button>
            <br/><br/>
          </div>
        </div>
      </div>
      <div class="container tamanho">
        <div id="login">
          <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
              <form method="post" id="formLogin" action="autentica">
                <label for="email">E-mail:</label><br>
                <input type="email" maxlength="45" name="email" id="email" required autofocus><br>
                <label for="senha">Senha:</label><br>
                <input type="password" maxlength="45" name="senha" id="senha" required><br><br>
                <button type="submit" form="formLogin" accesskey="E">Entrar</button>
                <br/><br/><p><a href="#">Esqueceu sua senha?</a></p>
              </form>              
            </div>
            <div class="col-sm-3"></div>
          </div>
        </div>
      </div>
    </main>
  </body>  
</html>