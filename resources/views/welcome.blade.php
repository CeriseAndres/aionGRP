
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>APPPP</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/aionGRP/style.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>

var name='<?php echo "elineda"?>';
var api='<?php echo "CJdtB26RuTxhD6kSSimX6Je62eI="?>';
var ert="azeazeaz";
var burl="http://localhost/aionGRP/";
console.log(ert.length);
</script>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bar bg-dark">
        <a class="navbar-brand" href="#">AionGRP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/aionGRP/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/aionGRP/index.php?w=online">Who's online ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/aionGRP/index.php?w=char">Character sheets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/forum/">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discord</a>
                </li>

            </ul>

        </div>
    </nav>



</header>



<div class="container">
    <main>
        <div id="title" class="row titre">
            <div class="col-lg-12">
                <h1>Welcome in Aion giant roleplay !</h1>
            </div>
        </div>
        <div class="row acc">
            <div class="col-lg-8">

        <div id="app">
            <h3>Character Sheet</h3>
            <nav class="navapp">
              <ul>
                  <li> <router-link to="/aionGRP/mycharacters"><button type="button" class="btn btn-map">My Characters</button></router-link></li>
                  <li>  <router-link to="/aionGRP/searchcharacters"><button type="button" class="btn btn-map">Search Characters</button></router-link></li>
                  <li> <router-link to="/aionGRP/accountfusion"><button type="button" class="btn btn-map">Import Characters</button></router-link></li>
              </ul>
            </nav>
          <router-view></router-view>
        </div>



    </div>

    <div  id="did" class="col-lg-3 ml-auto leftcol">
        <div class="disc">
            <iframe id="didi" src="https://discordapp.com/widget?id=251027355764523020&theme=dark" width="237" height="400" allowtransparency="true" frameborder="0"></iframe>
        </div>
    </div>

</div>
</main>
</div>
<footer>

</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</body>

</html>
