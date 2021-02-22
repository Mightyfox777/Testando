<?php
  session_start();
    if(!isset($_SESSION['ID_Usuario']))
    {
      header("location: ../login/indexLogin.php");
      exit;
    }

header('Content-Type: text/html; charset=UTF-8');
  require_once'../Classes/DataBase.php';
  $u = new DataBase;
  require_once'../Classes/Materia.php';
  $m = new Materia;
  require_once'../Classes/Questao.php';
  $q = new Questao;
  require_once'../Classes/Tema.php';
  $t = new Tema;
  require_once'../Classes/Subtema.php';
  $s = new Subtema;
?>

  <!DOCTYPE html>
  <html>

      <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar Questão</title>
        <link rel="stylesheet" href="./css-addquestao/addquestao.css">
        <link rel="shortcut icon" href="../images/favicon (1).ico" >

        <!-- Materialize -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@800;900&display=swap" rel="stylesheet">

        <link rel="shortcut icon" href="../images/favicon (1).ico" >

        </head>

      <body>


          <!-- Dashboard CELULAR -->

          <div class= "row hide-on-large-only" id= "dashboardcel">

            <div class="col s2">
              <ul id="slide-out" class="hide-on-large-only sidenav" style="width:200px;">
                <li><div class="user-view">
                  <div class="sanduiche">
                    <img src="../images/logoTestandoNome.png" id="logo">

                    <ul id="slide-out" class="sidenavClose">
                      <li><a class="sidenav-close" href="#!" style="position: absolute;"><i class="material-icons" style="position: absolute; margin-left: 160%;font-size: 220%;">menu</i></a></li>
                    </ul>
                  <a href="#" data-target="slide-out" class="sidenav-trigger"></a>

                    <img src="../images/circulo_amarelo_pequeno.png" id="amarelo_pequeno">
                    <img src="../images/circulo_roxo.png" id="roxo">
                    <img src="../images/circulo_roxo_claro.png" id="roxo_claro">
                    <img src="../images/circulo_amarelo_grande.png" id="amarelo_grande">
                    <ul id="links_menucel">
                      <li><a id="perfil" class=" waves-effect center-align" href="../perfil/indexPerfil.php">Perfil</a></li>
                      <li><div id="divider" class="divider"></div></li>
                      <li><a id="question" class=" waves-effect center-align" href="../addquestao/indexAddQuestao.php">Adicionar Questão</a></li>
                      <li><div id="divider" class="divider"></div></li>
                      <li><a id="document" class="waves-effect center-align" href="../documento/indexAddDocumento.html">Adicionar Documento</a></li>
                      <li><div id="divider" class="divider"></div></li>
                      <li><a id="saves" class="waves-effect center-align" href="../salvos/indexSalvos.html">Salvos</a></li>
                      <li><div id="divider" class="divider"></div></li>
                      <a id="sair" href="../login/indexLogin.html"><i class="material-icons" id="sair2">exit_to_app</i> Sair </a>
                    </ul>
                  </div>
                </div>
              </ul>
              <a href="#" data-target="slide-out" class="menu sidenav-trigger"><i class=" material-icons" style="font-size: 220%;">menu</i></a>
            </div>

            <div class="col s1">
            </div>
            <div class="col s1">
            </div>
            <div class="col s4" >
              <img class= "responsive-img" id = "nomelogocel" src ="../images/TestandoNome.png">
            </div>
            <div class="col s3">
              <img class= "responsive-img" id = "logocel" src ="../images/logo.png">
            </div>
          </div>
            <!-- Dashboard CELULAR FINAL -->


            <!-- Dashboard COMPUTADOR -->
            <nav class="hide-on-med-and-down navbar-fixed" id="retanguloroxo">
              <div class="nav-wrapper hide-on-med-and-down" id="dashboardpc">

                 <img class= "responsive-img" id = "logopc" src ="../images/logo.png"> <img class= "responsive-img" id = "nomelogopc" src ="../images/TestandoNome.png"> </a>
                <ul id="nav-pc" class=" right">
                  <li><a  id= "questao" href="../addquestao/indexAddQuestao.html" >Adicionar <br> questão</a></li>
                  <li><a  id= "documento" href="#!">Adicionar <br> documento</a>
                    <img class= "responsive-img" id = "linha1" src ="../images/linha.png"></li>
                  <li><a id= "salvos" href="#!">Salvos</a>
                     <img class= "responsive-img" id = "linha2" src ="../images/linha.png"></li>
                </ul>
              </div>

              <!-- foto/nome perfil -->
              <a href="../perfil/indexPerfil.php" >
                <div class="hide-on-med-and-down" id="perfil_pequeno">
                <div class="responsive-image" id= "foto_perfil_pequeno"><?php $_Imagem=base64_encode( $_SESSION['imagem'] ); echo "<img height='100%' width='100%' src='data:image/jpeg;base64,$_Imagem'> "; ?></div>
                  <p id="nome-dashboard"><?php echo $_SESSION['NickName']; ?></p></a>
                </div>
                </div>
              </nav>
            <!-- Dashboard COMPUTADOR FINAL-->

            <!-- LINHA LATERAL DEGRADE-->
            <div class="degrade"></div>  <!-- versão 1 - padrão -->
            <div class="degrade2"></div> <!-- versão 2 - dissertativa -->
            <div class="degrade3"></div> <!-- versão 3 - alternativa -->


        <!-- Formulário CELULAR-->
        <div class="row hide-on-large-only" id= "grid">

          <h2>Adicionar Questão</h2>

          <p class="button-group">
            <button href="#alternativa" id="btn-alternativa" value="ok" target="_self" class="waves-effect waves-light transparent">Alternativa</button>
            <button href="#dissertativa" id="btn-dissertativa" value="ok" target="_self" class="waves-effect waves-light transparent">Dissertativa</button>
          </p>

          <div class="items">

          <div required id="campo1" class="input-field col s9 center-align hide-on-large-only">
            <select>
                <option value="" selected disabled>Selecione sua matéria </option>
              <optgroup label="Ensino médio" style= "font-family: 'Muli'; font-size: 11px; float: left;">
                <option value="1">Geografia</option>
                <option value="2">História</option>
                <option value="3">Inglês</option>
              </optgroup>
              <optgroup label="Ensino técnico">
                <option value="3">Banco de dados</option>
                <option value="4">Lógica de programação 2</option>
                <option value="5">linguagem de programação 1</option>
              </optgroup>
            </select>
            <label>Matéria <span style="color: red;">*</span></label>
          </div>

      </div>

          <div required id="campo2" class="input-field col s9 center-align hide-on-large-only">
            <select>
                <option value="" selected disabled>Selecione seu tema </option>
              <optgroup label="Geografia" style= "font-family: 'Muli'; font-size: 11px; float: left;">
                <option value="1">Hidrografia</option>
                <option value="2">Paisagem</option>
                <option value="3">Rondônia</option>
              </optgroup>
            </select>
            <label>Tema <span style="color: red;">*</span></label>
          </div>

          <div required id="campo3" class="input-field col s9 center-align hide-on-large-only">
            <select>
              <option value="" selected disabled> Selecione seu subtema </option>
              <optgroup label="Hidrografia" style= "font-family: 'Muli'; font-size: 11px; float: left;">
                <option value="1">Águas do pacífico</option>
                <option value="2">Perca do status salino</option>
                <option value="3">Qualificador de PH neutro</option>
              </optgroup>
            </select>
            <label>Subtema <span style="color: red;">*</span></label>
          </div>

          <div required id="campo4"  class="col s9 center-align hide-on-large-only">
            <label for="textarea1" style= "font-family: 'Muli'; font-size: 11px; float: left;">Enunciado <span style="color: red;">*</span></label>
            <textarea placeholder="Escreva seu enunciado" id="textarea1" class="materialize-textarea"></textarea>
          </div>

            <div id="simbolodiv">
              <!-- Modal Trigger -->
              <a href="#simbolo1" style="width: 52px;" class="waves-effect waves-light modal-trigger"><img class= "responsive-img" id = "simbolo" src ="../images/omega2.png"></a>
              <p href="#simbolo1" style="color: black;">&nbsp;Inserir <br> Símbolo</p>
            </div>


            <form action="#">
              <div class="file-field input-field waves-effect waves-light" id="divimagem">
                <div class="btn" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">
                  <span id="spanimagem" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">Imagem </span>
                  <input type="file" multiple>
                </div>
                <div class="file-path-wrapper" >
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </form>


            <!-- Modal Structure SÍMBOLOS -->
            <div id="simbolo1" class="modal">

              <div class="modal-content">
                <h5 style="text-align: center;">Símbolos</h5>
                <p><br>Escolha sua opção:</p>
                <p><br>Funcionalidade em desenvolvimento</p>
              </div>
              <div class="modal-footer">
                <a href="#!" style="color: white; border-radius: 40px 40px; font-family: 'Muli'; font-size: 75%;" class="modal-close waves-effect yellow darken-2 btn-flat">Salvar</a>
              </div>

            </div>

            <!-- Alternativa/Dissertativa -->

        </div> <!-- COMEÇO alternativa -->

        <div id="alternativa" class="alternativa" style="margin-top: -5%;">

          <div class="row center-align hide-on-large-only">
          </div>


          <!--CAMPOS ALTERNATIVA: ADD E RETIRAR-->

          <form action="#">
            <div id="formulario" class= "hide-on-large-only" >
              <input id="alternativa_campo" type="text" placeholder="Alternativa" name="numeroDocumento" required/>
            </div>
          </form>
          <a href="#" data-id="1" id="adicionarCampo" class="hide-on-large-only">+ Adicionar Campos</a>


              <label id="label_resposta2" for="textarea1" class= "hide-on-large-only">Resposta alternativa <span style="color: red;">*</span></label>
              <textarea id="respostaalternativa" maxlength="1" placeholder=" Ex: A..." required style= "font-family: 'Muli'; font-size: 100%;" class="materialize-textarea hide-on-large-only"></textarea>

              <div required id="dificuldade2" class="input-field col s10 center-align hide-on-large-only">
              <label id="label_dificuldade2" style="font-size: 85%;">Dificuldade da questão <span style="color: red;">*</span></label>
              <form action="#">

              <label>
                <div class="col s1" class= "hide-on-large-only">
                <input name="group1" class="with-gap" type="radio"  />
                <span>Fácil</span>
              </div>
              </label>

              <label>
                <div class="col s2" class= "hide-on-large-only">
                <input name="group1" class="with-gap" type="radio"  />
                <span>Médio</span>
              </div>
              </label>

              <label>
                <div class="col s3" class= "hide-on-large-only">
                <input name="group1" class="with-gap" type="radio" />
                <span>Difícil</span>
              </div>
            </label>
          </div>

          <div required id="priv_public2" class= "hide-on-large-only">
            <label id="label_privacidade2" style="font-size: 87%;">Privacidade da questão <span style="color: red;">*</span></label>
            <form action="#">

             <label>
               <div class="col s1" class= "hide-on-large-only">
               <input name="group1" class="with-gap" type="radio"/>
               <span>Público</span>
             </div>
             </label>

             <label>
               <div class="col s2" class= "hide-on-large-only">
               <input name="group1" class="with-gap" type="radio"/>
               <span>Privado</span>
             </div>
             </label>
           </form>
         </div>
         <button id="btn_salvar" class="hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Salvar</button>

           </div>
        </div>
        <!-- FIM - alternativa-->

        <div id="dissertativa" class="dissertativa">
          <!-- COMEÇO - dissertativa -->

          <div class="row center-align hide-on-large-only">

              <form class="col s12">
                <div class="row">
                  <label for="textarea1" id="label_resposta" style= "font-family: 'Muli'; font-size: 11px; float: left;">Resposta <span style="color: red;">*</span></label>
                  <textarea required id="respostadissertativa" placeholder="Escreva sua resposta" class="materialize-textarea"></textarea>
                  </div>
                </div>
              </form>


              <div required id="dificuldade" class="input-field col s10 center-align hide-on-large-only">
              <label id="label_dificuldade" style="font-size: 85%;">Dificuldade da questão <span style="color: red;">*</span></label>
              <form action="#">

              <label>
                <div class="col s1  hide-on-large-only">
                <input name="group1" class="with-gap" type="radio"/>
                <span>Fácil</span>
              </div>
              </label>

              <label>
                <div  class="col s2  hide-on-large-only">
                <input name="group1" class="with-gap" type="radio"/>
                <span>Médio</span>
              </div>
              </label>

              <label>
                <div  class="col s3  hide-on-large-only">
                <input name="group1" class="with-gap" type="radio"/>
                <span>Difícil</span>
              </div>
              </label>
             </div>
           </form>

          <div required id="priv_public" class=" hide-on-large-only">
            <label id="label_privacidade" style="font-size: 87%;">Privacidade da questão <span style="color: red;">*</span></label>
            <form action="#">

             <label>
               <div class="col s1  hide-on-large-only">
               <input name="group1" class="with-gap" type="radio"/>
               <span>Público</span>
             </div>
             </label>

             <label>
               <div class="col s2  hide-on-large-only">
               <input name="group1" class="with-gap" type="radio"/>
               <span>Privado</span>
             </div>

             </label>
           </form>

           <button id="btn_salvar" class=" hide-on-large-only waves-effect waves-light btn" type="submit" name="action">Salvar</button>
         </div>

        </div>
      </div><!-- FIM - dissertativa -->

        <!--Final do formulário de CELULAR-->


        <!-- Formulário COMPUTADOR-->
        <div class="row hide-on-med-and-down">

          <h2>Adicionar Questão</h2>

          <p class="button-group">
            <button href="#alternativa" id="btn-alterna-desk" value="ok" target="_self" class="waves-effect waves-light btn transparent">Questão alternativa</button>
            <button href="#dissertativa" id="btn-dissert-desk" value="ok" target="_self" class="waves-effect waves-light btn transparent">Questão dissertativa</button>
          </p>

          <form method="POST">
          <div class="items">

          <div required id="campo1" class="input-field col s9 center-align hide-on-med-and-down">
            <select name="materia">
              <option value="" disabled selected>Selecione a matéria</option>
              <?php
                $u->conectar();
                $results = $m->listAll();
               foreach($results as $row){ ?>
                  <option value="<?php echo $row['ID_Materia'] ?>"><?php echo $row['Nome'] ?></option>
              <?php } ?>
            </select>
            <label>Matéria <span style="color: red;">*</span></label>
          </div>

          <div required id="campo2" class="input-field col s9 center-align hide-on-med-and-down">
            <select name="tema">
                <option value="" disabled selected>Selecione o tema</option>
                <?php
                  $u->conectar();
                  $results = $t->listAll();
                 foreach($results as $row){ ?>
                    <option value="<?php echo $row['ID_Tema'] ?>"><?php echo $row['Nome'] ?></option>
                <?php } ?>
            </select>
            <label>Tema <span style="color: red;">*</span></label>
          </div>

          <div required id="campo3" class="input-field col s9 center-align hide-on-med-and-down">
            <select name="subtema">
              <option value="" selected disabled> Selecione seu subtema </option>
              <?php
                $u->conectar();
                $results = $s->listAll();
               foreach($results as $row){ ?>
                  <option value="<?php echo $row['ID_Subtema'] ?>"><?php echo $row['Nome'] ?></option>
              <?php } ?>
            </select>
            <label>Subtema <span style="color: red;">*</span></label>
          </div>

          <div required id="campo4"  class="col s9 center-align hide-on-med-and-down">
            <label for="textarea1" style= "font-family: 'Muli'; font-size: 11px; float: left;">Enunciado <span style="color: red;">*</span></label>
            <input placeholder="Escreva seu enunciado" id="textarea1" class="materialize-textarea" name="enunciado">
          </div>

          <!-- IMAGEM -->
          <form action="#">
            <div class="file-field input-field waves-effect waves-light" id="divimagem">
              <div class="btn" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">
                <span id="spanimagem" style= "font-family: 'Muli'; color:white; background-color:#FFBC2B;">Imagem </span>
                <input type="file" multiple>
              </div>
              <div class="file-path-wrapper" >
                <input class="file-path validate" type="text">
              </div>
            </div>
          </form>

          <!-- Modal Trigger -->
          <div id="simbolodiv-desk">
            <a href="#simbolo1" class="waves-effect waves-light modal-trigger">
              <img style="width: 35px;" class="responsive-img" id="simbolo" src="../images/omega2.png">
            </a>

            <p href="#simbolo1">Inserir símbolo</p>
          </div>

          <!-- Modal Structure SÍMBOLOS -->
          <div id="simbolo1" class="modal">

            <div class="modal-content">
              <h5 style="text-align: center;">Símbolos</h5>
              <p><br>Escolha sua opção:</p>
              <p><br>Funcionalidade em desenvolvimento</p>
            </div>

            <div class="modal-footer">
              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salvar</a>
            </div>

          </div>

            <!-- Alternativa/Dissertativa COMPUTADOR -->

        <!-- COMEÇO ALTERNATIVA -->
        <div id="alternativa" class="alternativa-desk">

          <div class="row center-align hide-on-med-and-down">
              <button class="material-icons">add</button>
              <button class="material-icons red">clear</button>
          </div>

              <label for="textarea1">Resposta</label>
              <textarea style= "font-family: 'Muli'; font-size: 11px; float: left;" class="materialize-textarea"></textarea>

              <div required id="dificuldade-desk2" class="input-field col s10 center-align hide-on-med-and-down">
                <form action="#">

                  <label id="label_dificuldade-desk2" style="font-size: 85%;">Dificuldade da questão <span style="color: red;">*</span></label>

              <label>
                <div class="col s1" class= "hide-on-med-and-down">
                  <input name="group1" class="with-gap" type="radio"/>
                  <span style="color:#CDF58F">Fácil</span>
                </div>
              </label>

              <label>
                <div class="col s2" class= "hide-on-med-and-down">
                  <input name="group1" class="with-gap" type="radio"/>
                  <span style="color: #FFC300;">Médio</span>
                </div>
              </label>

              <label>
                <div class="col s3" class= "hide-on-med-and-down">
                  <input name="group1" class="with-gap" type="radio"/>
                  <span style="color:#FF5733">Difícil</span>
                </div>
            </label>
          </div>

          <div required id="priv_public-desk2" class="hide-on-med-and-down">
            <label id="label_privacidade-desk2" style="font-size: 87%;">Privacidade da questão<span style="color: red;">*</span></label>
            <form action="#">

             <label>
               <div class="col s1 hide-on-med-and-down">
                 <input name="group1" class="with-gap" type="radio"/>
                 <span>Público</span>
               </div>
             </label>

             <label>
               <div class="col s2 hide-on-med-and-down">
                 <input name="group1" class="with-gap" type="radio"/>
                 <span>Privado</span>
               </div>
             </label>

           </form>
         </div>

           <button id="btn_salvar-desk" class="cadastro btn flow-text waves-effect yellow darken-2 waves-light hoverable" type="submit">Salvar</button>
        <!-- FIM ALTERNATIVA -->
        </div>

        <!-- COMEÇO DISSERTATIVA -->
        <div id="dissertativa" class="dissertativa-desk">

          <div class="row center-align hide-on-med-and-down">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s9" id="respostadissertativa-desk">
                    <input placeholder=Resposta id="textarea1" class="materialize-textarea" name="resposta">
                  </div>
                </div>
              </form>


              <div required id="dificuldade-desk" class="input-field col s10 center-align hide-on-med-and-down">
              <form action="#">

              <label id="label_dificuldade-desk" style="font-size: 85%;">Dificuldade da questão <span style="color: red;">*</span></label>

              <label>
                <div class="col s1" class= "hide-on-large-only">
                  <input name="group1" class="with-gap" type="radio"/>
                  <span style="color: #4DC535">Fácil</span>
                </div>
              </label>

              <label>
                <div class="col s2" class= "hide-on-large-only">
                  <input name="group1" class="with-gap" type="radio"/>
                  <span style="color: #FFC300;">Médio</span>
                </div>
              </label>

              <label>
                <div class="col s3" class= "hide-on-large-only">
                  <input name="group1" class="with-gap" type="radio"/>
                  <span style="color:#FF5733">Difícil</span>
                </div>
            </label>

            </form>
          </div>
        </div>

        <div required id="priv_public-desk" class="hide-on-med-and-down">
          <form action="#">

           <label id="label_privacidade-desk" style="font-size: 87%;">Privacidade da questão<span style="color: red;">*</span></label>

           <label>
             <div class="col s1 hide-on-med-and-down">
               <input name="group1" class="with-gap" type="radio"/>
               <span>Público</span>
             </div>
           </label>

           <label>
             <div class="col s1 hide-on-med-and-down">
               <input name="group1" class="with-gap" type="radio"/>
               <span>Privado</span>
             </div>
           </label>

         </form>

       </div>
       </form>

       <button id="btn_salvar-desk" class="cadastro btn flow-text waves-effect yellow darken-2 waves-light hoverable" type="submit">Salvar</button>
      </div>
      <!-- FIM DISSERTATIVA -->
      </div>
      <!--Final do formulário de COMPUTADOR-->

      <?php
      //verificar se clicou no botão
      	if(isset($_POST['enunciado'])){

      		$materia = addslashes($_POST['materia']);
      		$tema = addslashes($_POST['tema']);
      		$enunciado = addslashes($_POST['enunciado']);
          $resposta = addslashes($_POST['resposta']);

      	//verificar se esta preenchido
        if(!empty($materia) && !empty($tema) && !empty($enunciado))
        {
            $u->conectar();
            if($u->msgErro == ""){
              if($resposta == ""){

                }
              }
              else {
                if($q->cadastrarQuestaoDissertativa($materia, $tema, $enunciado, $alternativa, 1, $_SESSION['ID_Usuario']))
                {
                  echo "Cadastrado com sucesso!";
                }
            }
            else {
              echo "Erro: ".$u->msgErro;
            }
        }
        else{
          echo "Preencha todos os campos";
        }
      }
      ?>

      </div>



      <!-- JQuery CDN -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- JavaScript Materialize compilado e minificado -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <!--INICIALIZAÇÃO MENU (sanduiche) CELULAR (JQuery)-->
      <script>
        $(document).ready(function(){
          $('.sidenav').sidenav();});
      </script>

        <!--INICIALIZAÇÃO CAMPO LISTA MATÉRIA (JQuery)-->
      <script>
        $(document).ready(function(){
          $('select').formSelect();
            });
        </script>
      </body>

      <!-- MODAL DOS SÍMBOLOS (JQuery) -->
      <script>
      $(document).ready(function(){
      $('.modal').modal();
      });
      </script>

      <!--CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (mobile - JavaScript)-->
      <script>
          var btn1 = document.getElementById('btn-dissertativa');
          var alternativa = document.querySelector('.alternativa');
          var degrade = document.querySelector('.degrade');
          var degrade2 = document.querySelector('.degrade2');
          var degrade3 = document.querySelector('.degrade3');
          btn1.addEventListener('click', function() {

          if (dissertativa.style.display = 'block') {
              alternativa.style.display = 'none';
              degrade2.style.display = 'block';
              degrade3.style.display = 'none';
              degrade.style.display = 'none';
          }
          else {
              alternativa.style.display = 'block';
              degrade3.style.display = 'block';
              degrade.style.display = 'none';
              }
            });

         var btn2 = document.getElementById('btn-alternativa');
         var dissertativa = document.querySelector('.dissertativa');
         var divdegrade = document.querySelector('.degrade');
         var divdegrade2 = document.querySelector('.degrade2');
         var divdegrade3 = document.querySelector('.degrade3');
         btn2.addEventListener('click', function() {

         if (alternativa.style.display = 'block') {
             dissertativa.style.display = 'none';
             divdegrade2.style.display = 'none';
             divdegrade3.style.display = 'block';
             divdegrade.style.display = 'none';
         }
         else {
             dissertativa.style.display = 'block';
             divdegrade2.style.display = 'block';
             divdegrade.style.display = 'none';
         }
       });
      </script>
      <!--FINAL CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (mobile - JavaScript)-->

      <!--CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (desktop - JavaScript)-->
      <script>
          var btn3 = document.getElementById('btn-dissert-desk');
          var alternativa2 = document.querySelector('.alternativa-desk');
          var degrade = document.querySelector('.degrade');
          var degrade2 = document.querySelector('.degrade2');
          var degrade3 = document.querySelector('.degrade3');
          btn3.addEventListener('click', function() {

          if (dissertativa2.style.display = 'block') {
              alternativa2.style.display = 'none';
              degrade2.style.display = 'block';
              degrade3.style.display = 'none';
              degrade.style.display = 'none';
          }
          else {
              alternativa2.style.display = 'block';
              degrade3.style.display = 'block';
              degrade.style.display = 'none';
              }
            });

         var btn4 = document.getElementById('btn-alterna-desk');
         var dissertativa2 = document.querySelector('.dissertativa-desk');
         var divdegrade = document.querySelector('.degrade');
         var divdegrade2 = document.querySelector('.degrade2');
         var divdegrade3 = document.querySelector('.degrade3');
         btn4.addEventListener('click', function() {

         if (alternativa2.style.display = 'block') {
             dissertativa2.style.display = 'none';
             divdegrade2.style.display = 'none';
             divdegrade3.style.display = 'block';
             divdegrade.style.display = 'none';
         }
         else {
             dissertativa2.style.display = 'block';
             divdegrade2.style.display = 'block';
             divdegrade.style.display = 'none';
         }
       });
     </script>
     <!--FINAL CÓDIGO BOTÃO ALTERNATIVA/DISSERTATIVA (desktop - JavaScript)-->

      <!--TRANSIÇÃO COR BOTÃO ALTERNATIVA E DISSERTATIVA-->
      <script>
      let myButton = document.querySelectorAll('.button-group > button');

      myButton.forEach(function(key){
          key.addEventListener('click', function(){
              removeStyles();
              this.setAttribute('class', 'buttonClicked');
          });
      })

      function removeStyles(){
          for(let i = 0; i < myButton.length; i++){
              document.querySelectorAll('.button-group > button') [i].removeAttribute('class');
          }
      }
      </script>
      <!--FINAL TRANSIÇÃO COR BOTÃO ALTERNATIVA E DISSERTATIVA-->


      <!--TESTE TESTE TESTE-->
      <script>
      $(function () {
          var divContent = $('#formulario');
          var botaoAdicionar = $('a[data-id="1"]');
          var i = 1;
          //66 - B
          var letra = 66;

          //Ao clicar em adicionar ele cria uma linha com novos campos

            $(botaoAdicionar).click(function () {

                if(i <= 4) {
                    $('<div class="conteudoIndividual"><br><input id="alternativa_campo '+ String.fromCharCode(letra) +'" type="text" placeholder="Alternativa" name="numeroDocumento' + i + '" required style="width:96%; margin-top: 5%;"/><a href="#" class="linkRemover">X</a></div>').appendTo(divContent);
                    $('#removehidden').remove();
                    letra++;
                    i++;
                    $('<input type="hidden" name="quantidadeCampos" value="' + i + '" id="removehidden">').appendTo(divContent);
                }
            });

          //Cliquando em remover a linha é eliminada

          $('#formulario').on('click', '.linkRemover', function () {
              $(this).parents('.conteudoIndividual').remove();
              letra--;
              i--;

              });
            });
      </script>
      <!--TESTE TESTE TESTE-->


  </html>
