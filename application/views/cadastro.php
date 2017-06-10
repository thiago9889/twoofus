  <body>
    <main class="text-center">
      <a href="<?php echo base_url();?>dbnome/login"><img src="<?php echo base_url();?>img/logo2ofus.png" alt="Logo 2 of us" class="logo" /></a>
      <h1>Realize seu cadastro</h1>
      <div class="container">
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <form method="post" id="formCadastro" action="/ci/dbnome/inserir">
              <label for="nome">Nome:</label><br>
              <input type="text" maxlength="50" size="50" name="nome" id="nome" required autofocus><br>
              <label for="email">E-mail:</label><br>
              <input type="email" maxlength="50" size="50" name="email" id="email" required><br>
              <label for="senha">Senha:</label><br>
              <input type="password" maxlength="16" size="50" name="senha" id="senha" required><br>
              <label for="dtNasc">Data de Nascimento:</label><br>
              <input type="date" name="dtNasc" id="dtNasc" required><br>
              <label for="sexo">Sexo:</label><br>
              <select name="sexo" id="sexo" required>
                <option value="">Selecione...</option>
                <option value="f">Feminino</option>
                <option value="m">Masculino</option>
                <option value="b">Não binário</option>
              </select><br><br>
              <button type="submit" form="formCadastro" accesskey="C">Cadastrar</button>         
            </form>
          </div>
          <div class="col-lg-4"></div>
        </div>
      </div>
    </main>
  </body>
</html>