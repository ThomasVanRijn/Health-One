<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health One</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body id="arts">

<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Selecteer uw account</p>

    <div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:25%"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col">
            <div class="form-group">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>gebruikernaam</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <tr class="clickable"
                    onclick="window.location='patient-zoekpagina.php'"">
                    <td>Mathijs</td>
                    <td>302974175</td>
                </tr>
                <tr class="clickable"
                    onclick="window.location='patient-zoekpagina.php'"">
                    <td>Brahim</td>
                    <td>302837783</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase().trim();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>