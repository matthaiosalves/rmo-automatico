
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/x-icon" href="//oficiais.exbrhbofc.net/imagens/central.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" href="https://oficiais.exbrhbofc.net/dist/css/v5exbr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--<meta http-equiv="refresh" content="40">-->
  <title>Movimento de Oficiais - Exército Brasileiro</title>
  <style>
    #rmo {
      padding: 20px;
      padding-top: 15px;
      background: #252424;
      text-align: center;
    }
    .tc1 {
      display: inline-block;
      padding: .25em .4em;
      font-weight: 700;
      width: 100%;
      position: relative;
      height: 50px;
    }
    .btn-link{
      color:#fff;
    }
    .fa{
      border: 0px solid #fff;
      border-radius: 100px;
    }
    .hora {
      position: absolute;
      margin-top: -12px;
      height: 12px;
      margin-left: 24;
      border-radius: 30px;
      left: 0;
    }
    .pat_info {
      bottom: 0;
      position: absolute;
      background: #00000057;
      width: 80px;
      margin-top: -5px;
      height: 40px;
      border-bottom-left-radius: 80px;
      left: 0;
      margin-bottom: 1px;
      color: #fff;
      padding-top: 2px;
      border-bottom-right-radius: 80px;
    }
    .card {
      color:#fff;
      background:#282828;
    }

    .btn-circle.btn-xl { 
      width: 70px; 
      height: 70px; 
      padding: 10px 16px; 
      border-radius: 35px; 
      font-size: 12px; 
      text-align: center; 
    } 
  </style>
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script>
        //Verifica e solicita se o usuario tem permissao para utilizar as notificações do Chrome
        document.addEventListener('DOMContentLoaded', function () {
          if (!Notification) {
            alert('Testando notificação...');
            return;
          }

          if (Notification.permission !== "granted")
            Notification.requestPermission();
        });
      </script>
      <script>
        $( document ).ready(function() {
         setTimeout(carregar, 35000);
       });

        function carregar() {
          $('#tempo').show();
        }
      </script>
    </head>
    <body style="color:#fff;background:#282828;font-size:13px;">

      <nav class="navbar navbar-dark" style="background:#000;">
        <span style="float:right;color:#fff;"><b>Movimento de Oficiais</b></span>
        <div id="tempo" style="display:none;float:right;">
          5 segundos... <img src="//habboemotion.com/resources/images/icons/furni_load.gif">
        </div>
      </nav>
      <nav class="navbar" style="background:#333;">
        <form action="<?=$base;?>/inserir" method="POST" class="form-inline">
        <select type="text" name="user_rmo" class="form-control" style="width:200px;">
        <option selected disabled>Selecione um Oficial</option>
        <?php foreach($oficiais as $oficial): ?>
          <option value='<?=$oficial['nome'];?>'><?=$oficial['nome'];?></option>
        <?php endforeach; ?>
         </select>
          <button class="btn btn-sm btn-secondary active" type="submit">Inserir no Movimento de Oficiais</button>
        </form>
        <form method="POST" class="form-inline">
         <input type="submit" id="iniciarBtn" class="btn btn-sm btn-secondary active" value="Pegar RMO" name="user_rmo_control" />
       </form>
       <form action="<?=$base;?>/rmo_finalizar" method="POST" class="form-inline">
         <input type="submit" id="finalBtn" class="btn btn-sm btn-secondary active" value="Finalizar RMO" name="user_rmo_finish" />
       </form>
    <?php if($resetar < 1): ?>
	   <form action="<?=$base;?>/rmo_resetar" method="POST" class="form-inline">
         <input type="submit" id="finalBtn" class="btn btn-sm btn-secondary active" value="Resetar RMO" onclick="return confirm('Você deseja apagar todos os registros? Antes de resetar, lembre-se de finalizar o RMO')" name="user_rmo_finish" />
       </form>
    <?php endif; ?>
     </nav>
     <span style="margin:20px;"><b style="font-size:32px;">Oficial Controlando o Movimento de Oficiais</b><br></span>
     <span style="float:right;margin-right:20px;">
          </span>
    <div id="rmo">
      <div class="row">
		<?php foreach($control as $list): ?>
          <div class="col-12" style="padding: 2px;">

			<div class="card" style="width: 100%;">
			<span class="badge tc1" style="background: url(<?=$list['link'];?>) center -20px no-repeat, url(https://1.bp.blogspot.com/-5cvesfmayj8/Vzb2Uv4hSbI/AAAAAAAAFCo/o-7lFCU8TSkCLUo7rIczg41zA_U4XY4yQCLcB/s1600/135217166.gif) center -0px no-repeat, #366504;">
			<input type="text" name="nome_tc1_finalizou" value="<?=$list['nick'];?>" style="display:none;"></span>
			<form action="#" method="POST" style="position: absolute;margin-top: -10;margin-bottom: -0;right: 0;"><input type="text" name="id_rmo_excluir" value="1642" style="display:none;"> <button type="submit" style="padding-left:4;margin: -5px;font-size: 11px;color:red;" class="btn btn-sm btn-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir Patrulha"><i class="fa fa-fw fa-times"></i></button></form>
			<div class="card-body">
			<b class="card-title"><?=$list['nick'];?></b>

			<small>
      <p style="margin-bottom:0;">
          <span data-toggle="tooltip" data-placement="bottom "title="Há quanto Tempo com o RMO: 14:41">
        <u>Tempo com o RMO  <?php  $hora = $list['tempo_inicio'];
          $horaH = explode(':', $hora);
          $horaAgora = $horaH[0].':'.$horaH[1];
          echo $horaAgora; ?>.</u>
          </span>
      </small>
        <br/>
			<span data-toggle="tooltip" data-placement="bottom" title="Tempo com o RMO" class="badge badge-dark">
        <img src="https://www.habborator.org/archive/icons/mini/v20_6.gif">
     
      </span>
      </p>
      </div>
      </div>
      </div>
      </div>
		  <a href="<?=$base;?>/sair/<?=$list['id'];?>" class="btn btn-danger">Sair</a>
		<?php endforeach; ?>
    </div>
    <span style="margin:20px;"><b style="font-size:32px;">Movimento de Oficiais</b><br></span>
    <span style="float:right;margin-right:20px;">
          </span>
    <div id="rmo">
      <div class="row">
			<?php foreach($oficialOn as $ofc): ?>
				<?php if($ofc['verificacao'] == 1): ?>
				<div class="col-6" style="padding: 2px;">

				<div class="card" style="width: 100%;">
				<span class="badge tc1" style="background: url(<?=$ofc['link'];?>) center -20px no-repeat, url(https://1.bp.blogspot.com/-5cvesfmayj8/Vzb2Uv4hSbI/AAAAAAAAFCo/o-7lFCU8TSkCLUo7rIczg41zA_U4XY4yQCLcB/s1600/135217166.gif) center -0px no-repeat, 
        <?php if($ofc['status'] == 'Ausente'){
            echo '#FFC107';
        }else{
          echo '#366504';
        };?>;
				">
				<input type="text" name="nome_tc1_finalizou" value="<?=$ofc['nick'];?>" style="display:none;"></span>
				<div class="card-body">
				<b class="card-title"><?=$ofc['nick'];?></b>

				<small>
        <p style="margin-bottom:0;">
        <span data-toggle="tooltip" data-placement="bottom "title="Status Atual: Ativo">
        <u>Status: <?=$ofc['status'];?>.</u></span><br>
        <p style="margin-bottom:0;"><span data-toggle="tooltip" data-placement="bottom "title="Horário que entrou no Status: <?=$horaStatus;?>">
        <u>Entrou nesse status às <?php
          $hora = $ofc['tempo_inicio'];
          $horaH = explode(':', $hora);
          $horaAgora = $horaH[0].':'.$horaH[1];
          echo $horaAgora;
        ?>.</u></span></small><br/>

				<span data-toggle="tooltip" data-placement="bottom" title="Tempo online do oficial" class="badge badge-dark">
          <img src="https://www.habborator.org/archive/icons/mini/v20_6.gif"> 01:48</span>
        </p>
        </div>

				</div></div>
				<div class="col-6" style="padding: 2px;">
					<form action="<?=$base;?>/ativo/<?=$ofc['id'];?>" method="POST" style="display: inline-block;">
						<button type="submit" class="btn btn-circle btn-xl" onclick="return alert('Oficial adicionado como ativo')" style="background:#5cb85c;color:white;">Ativo</button>
					</form>
					<form action="<?=$base;?>/aus/<?=$ofc['id'];?>" method="POST" style="display: inline-block;margin-left: 10%;">
						<button type="submit" class="btn btn-circle btn-xl"onclick="return alert('Oficial marcado como ausente')" style="background:#f0ad4e;color:white;text-align: center;">Aus</button>
					</form>
					<form action="<?=$base;?>/remover/<?=$ofc['id'];?>" method="POST" style="display: inline-block;margin-left: 10%;">
						<button type="submit" class="btn btn-circle btn-xl" onclick="return alert('Oficial removido do RMO')" style="background:#d9534f;color:white;">Saiu</button>
					</form> 
				</div>
			<?php endif; ?>
        <script>
          function seiLa(){
            alert('teste');

          }

        </script>
			<?php endforeach; ?>
    </div>
  </body>
  </html>