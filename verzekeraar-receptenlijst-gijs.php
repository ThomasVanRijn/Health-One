<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>verzekering-gijs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/24821f9d87.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>zorgverzeraar</p>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="index.php">Healt One</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="verzekeraar-klant-gijs.php">Klant berheren<span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="verzekeraar-arts-gijs.php">Arts beheren<span class="sr-only"></span> </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="verzekeraar-receptenlijst-gijs.php">Receptenlijst<span class="sr-only">current</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="verzekeraar-medicijn-gijs.php">Medicijn beheren<span class="sr-only"></span>
                </a>
            </li>
        </ul>
    </div>

</nav>

<br>

<div class="container">
    <div class="row">
        <div class="col-lg">
            <div class="form-group">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <table class="table table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th scope="col">klant</th>
                    <th scope="col">medicijn</th>
                    <th scope="col">hoeveelheid</th>
                    <th scope="col">herhaalrecept</th>
                </tr>
                </thead>
                <tbody>
                    <td>Xingoe van Nimwegen</td>
                    <td>levocetirizine</td>
                    <td>30 stuks</td>
                    <td>ja</td>
                </tr>
                <tr>
                    <td>Chikai Moerbeek</td>
                    <td>pantaprozol</td>
                    <td>30 stuks</td>
                    <td>nee</td>
                </tr>
                <tr>
                    <td>Chikai Moerbeek</td>
                    <td>Vitamine D</td>
                    <td>20 eenheden</td>
                    <td>ja</td>
                </tr>
                <tr>
                    <td>Olivier de Jong</td>
                    <td>ibruprufen</td>
                    <td>10 stuks</td>
                    <td>nee</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>