<body>
    <main class="text-center">
    <p><?php echo $nome_usuario ?> <span class="glyphicon glyphicon-heart"></span> <?php echo $nome_parceiro ?></p>
    <h1>Eventos</h1><br/><br/>
    <div class="container">
    <div class="row ">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-left  principal">
            <div class="row evento" id="evento'.$evento['cd_evento'].'">
          <div class="col-sm-2">
            <p class="principal_dia">01</p>
          </div>
          <div class="col-sm-8">
            <p class="principal_data">junho de 2017 - 18:00</p>
            <p class="principal_evento">Exemplo evento</p>
          </div>
          <div class="col-sm-2 eventos_botoes">
            <p></p>
            <span class="glyphicon glyphicon-remove-sign"></span></p>
          </div>          
        </div>';


    </div>
    <div class="col-md-4"></div>
    </div>
    <button type="submit"  onclick="window.location.href='cadastraevento'"><span class="glyphicon glyphicon-plus"></span><br/>Criar Evento</button>              
    <button type="submit" onclick="window.location.href='logout'"><span class="glyphicon glyphicon-log-out"></span><br/>Logout</button>              
    </div>
    </main>
  </body>
</html>