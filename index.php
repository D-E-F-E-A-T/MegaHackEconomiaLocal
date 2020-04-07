<?php
include "db.php";
if(isset($_POST["goLocaleSubmit"])) {
  # https://pt.stackoverflow.com/questions/49645/remover-acentos-de-uma-string-em-php
  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
  }
  $str = $_POST["locale"];
  $locale = explode(",",$str);
  $city = strtolower(tirarAcentos(preg_replace('/\s+/', '', $locale[0])));
  $neighborhood = strtolower(tirarAcentos(preg_replace('/\s+/', '', $locale[1])));
  header("location: {$city}/{$neighborhood}/index.php");
  //echo $city . " " . $neighborhood;
  //var_dump($locale);
}
?>
<!DOCTYPE html>
<html lang="pt-BR" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png?v=47B42qaej7">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png?v=47B42qaej7">
  <link rel="icon" type="image/png" sizes="194x194" href="assets/img/favicon/favicon-194x194.png?v=47B42qaej7">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-chrome-192x192.png?v=47B42qaej7">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png?v=47B42qaej7">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest?v=47B42qaej7">
  <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg?v=47B42qaej7" color="#5bbad5">
  <link rel="shortcut icon" href="assets/img/favicon/favicon.ico?v=47B42qaej7">
  <meta name="apple-mobile-web-app-title" content="Meu Bairro">
  <meta name="application-name" content="Meu Bairro">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="msapplication-TileImage" content="assets/img/favicon/mstile-144x144.png?v=47B42qaej7">
  <meta name="theme-color" content="#ffffff">

  <title>Meu Bairro</title>

  <meta name="description" content="Faça conexões no seu bairro com empresas e prestadores de serviços.">
  <meta property="fb:app_id" content="12345678910">
  <meta property="og:url" content="https://MeuBairro.JusBlog.Com">
  <meta property="og:type" content="Website">
  <meta property="og:locale" content="pt_BR">
  <meta property="og:site_name" content="Meu Bairro">
  <meta property="og:title" content="Meu Bairro: Participe!">
  <meta property="og:description" content="Faça conexões no seu bairro com empresas e prestadores de serviços.">
  <meta property="og:image" content="https://MeuBairro.JusBlog.Com/assets/img/ads.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="MeuBairro.JusBlog.Com O seu Marketplace de negócios regionalizados.">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@shawee_io">
  <meta name="twitter:creator" content="@FredSRocha">
  <meta name="twitter:title" content="Meu Bairro: Participe!">
  <meta name="twitter:description" content="Faça conexões no seu bairro com empresas e prestadores de serviços.">
  <meta name="twitter:image" content="https://MeuBairro.JusBlog.Com/ads.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.1/css/bulma.min.css">

  <style>
    section {
      margin: 5% 0;
    }
    .footer {
      background-color: #fff;
      color: #666;
      font-family: "Roboto", sans-serif;
    }
    .m-auto {
	    margin: auto;
    }
  </style>
</head>
<body>
<section>
  <div class="container">
      <div class="column is-half is-offset-one-quarter">
          <h3 class="title title-jsx is-4"><span>Conecte-se</span> <sub>Ao seu Bairro</sub></h3>
          <figure class="image is-128x128 m-auto">
              <img src="assets/img/marker.gif" alt="Meu Bairro - Faça conexões no seu bairro com empresas e prestadores de serviços.">
          </figure>
          <form name="goLocale" method="post" autocomplete="off" action="">
            <div class="control has-icons-left">
            <div class="select is-primary is-fullwidth">
              <select name="locale" required oninvalid="this.setCustomValidity('Por favor, selecione um item na lista.')" oninput="setCustomValidity('')">
                <option selected disabled value="">Qual a sua comunidade?</option>
                <?php
                    $sql = "SELECT * FROM `locale` WHERE 1";
                    $result = $mysqli->query($sql);
                    if ($result) {       
                        if($result->num_rows > 0) {
                            //echo "<optgroup label='Qual o resultado do exame?'>";
                            $dataTable = array();
                            while($dataTable = $result->fetch_assoc()) {
                                //if($data["id_health"] !== "1")
                                    echo "<option value='".$dataTable["city"].",".$dataTable["neighborhood"]."'>".$dataTable["city"]." (".$dataTable["neighborhood"].")</option>";
                            }
                            //echo "</optgroup>";
                        }
                    } else {
                        echo "Erro: " . $sql . "<br>" . $mysqli->error;
                    }
                    //$mysqli->close();
                ?>
              </select>
            </div>
            <span class="icon is-large is-left">
              <i class="fas fa-globe"></i>
            </span>
            </div>
            <br>
            <div class="field">
              <div class="control">
                  <input
                      name="goLocaleSubmit"
                      type="submit"
                      class="button is-primary is-light is-fullwidth"
                      value="Entrar" />
              </div>
            </div>
          </form>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="content has-text-centered">
        <p>&copy; 2020 MEU BAIRRO</p>
    </div>
</footer>
</body>
</html>
