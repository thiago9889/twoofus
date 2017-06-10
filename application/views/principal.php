<body>
  <script>
 function goDelete(id){
    var agree = confirm("Tem certeza que deseja deletar este evento?");
    if(agree){
      $("#evento"+id).fadeOut('slow');
      $.post('deletarevento/', {id:id});
    }
  }
  </script>
    <main class="text-center">
    <p><?php echo $nome_usuario ?> <span class="glyphicon glyphicon-heart"></span> <?php echo $nome_parceiro ?></p>
    <h1>Eventos</h1><br/><br/>
    <div class="container">
    <div class="row ">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-left  principal">
  <?php 
        $this->load->helper('date');
        $diaformat = '%d';
        $mesformat = '%m';
        $anoformat = '%Y';

        foreach ($eventos as $evento):
        $time = strtotime($evento['dt_evento']);
        $dia = mdate($diaformat, $time);
        $mes = mdate($mesformat, $time);
        $ano = mdate($anoformat, $time);
	switch ($mes) {
          case 01:$mes = 'janeiro';break;
          case 02:$mes = 'fevereiro';break;
          case 03:$mes = 'março';break;
          case 04:$mes = 'abril';break;
          case 05:$mes = 'maio';break;
          case 06:$mes = 'junho';break;
          case 07:$mes = 'julho';break;
          case 08:$mes = 'agosto';break;
          case 09:$mes = 'setembro';break;
          case 10:$mes = 'outubro';break;
          case 11:$mes = 'novembro';break;
          case 12:$mes = 'dezembro';break;
        }
        echo '
            <div class="row evento" id="evento'.$evento['cd_evento'].'">
          <div class="col-sm-2">
            <p class="principal_dia">'.$dia.'</p>
          </div>
          <div class="col-sm-8">
            <p class="principal_data">'.$mes.' de '.$ano.' - '.substr($evento['hr_evento'],0,5).'</p>
            <p class="principal_evento">'.$evento['nm_evento'].'</p>
          </div>
          <div class="col-sm-2 eventos_botoes">
            <p></p>
            <span onclick="return goDelete('.$evento['cd_evento'].');" class="glyphicon glyphicon-remove-sign"></span></p>
          </div>          
        </div>';
                

        endforeach;?>


    </div>
    <div class="col-md-4"></div>
    </div>
    <button type="submit"  onclick="window.location.href='cadastraevento'"><span class="glyphicon glyphicon-plus"></span><br/>Criar Evento</button>              
    <button type="submit" onclick="window.location.href='logout'"><span class="glyphicon glyphicon-log-out"></span><br/>Logout</button>              
    </div>
    </main>
  </body>
</html>