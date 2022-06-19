<head>
    <meta charset="UTF-8">
    <title> HeartSIM </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
        .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
        .fa-anchor,.fa-coffee {font-size:200px}
    </style>
</head>
<body>
<div class="w3-row-padding w3-teal w3-padding-64 w3-container w3-center">
    <h3>  Iniciar sessão </h3>
<form method="post" style="text-align:center" action="index.php?action=verifylogin">
    <p>
        Utilizador:
        <input type="text" name="user">
    </p>
    <p>
        Password:
        <input type="password" name="pass">
    </p>
    <div>
    <input type="submit" name="Submit" value="Submeter">
    </div>
</form>
    <div class="w3-bottom">
    <form action="index.php?action=homepage"> <input type="submit" name="submit" value="Voltar" style=" font-size: large" class="w3-teal w3-button"> </form>
    </div>
</div>
</body>