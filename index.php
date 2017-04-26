<?php



if($_GET['city']){

  $homepage = file_get_contents("http://www.weather-forecast.com/locations/".$_GET['city']."/forecasts/latest");
  
  $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $homepage);
  
  $secondPageArray = explode('</span></span></span>', $pageArray[1]);

  $weather = $secondPageArray[0];

  $cityNotFound = $_GET["city"];
} 


?>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="pragma" content="no-cache" />
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <title>Weather Scrapper</title>
  <style>
  html
  {
    font-size: 62.5%;
    background: url(mila-young-222349.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  body
  {
    margin: 0;
    padding: 0;
    font-size: 1.6rem;
    color: #353535;
    background: none;
  }
  .container{
    text-align: center;
    margin-top: 200px auto;
    width: 450px;
  }

  input{
    margin: 20px 0;
  }

  #weather {
    margin-top: 15px;
  }
  

  h1,h3
  {
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
  }


  h1
  {
    margin: 20rem 0 1rem;
    font-size: 3rem;
  }

  h3
  {
    font-weight: normal;
    font-size: 1.4rem;
  }
  </style>
</head>
<body>
    <div class="container">
      <h1>What's The Weather?</h1>
      <form>
        <fieldset class="form-group">
          <label for="city">Enter the name of a city</label>
          <input type="text" name="city" class="form-control" id="city" placeholder="Eg. Los Angeles, New York">
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div id="weather"><?php
        if($weather){
          echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
        } else{
          echo '<div class="alert alert-danger" role="alert">The weather forecast of the city '.$cityNotFound.' could not be found. Please check your spelling or try again.</div>';
        }
      ?>
      </div>
    </div>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
