  <body>
    <main class="text-center">
      <h1>Cadastrar novo evento</h1>
      <div class="container">
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <form method="post" id="formCadastro" action="/ci/dbnome/inserirevento">
              <label for="nome">Titulo:</label>
              <input type="text" maxlength="50" size="50" name="nome" id="nome" required autofocus><br>
              <label for="data">Data:</label>
              <input type="date" name="data" id="data" required><br>
              <label for="hora">Hora:</label>
              <input type="time" maxlength="50" size="50" name="hora" id="hora">
              <br><br>
              <button type="submit" form="formCadastro" accesskey="C">Cadastrar</button>
            </form>
          </div>
          <div class="col-lg-4"></div>
        </div>
      </div>
    </main>
  </body>
</html>