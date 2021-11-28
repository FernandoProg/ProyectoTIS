<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Municipalidad</title>
        <?php require("../user/head.php")?>
    </head>
    <body>
    <?php
        session_start();
        if(isset($_SESSION['nombre_usuario'])){
            if($_SESSION['rol'] == "usuario"){
                require("navbar_user.php");
            }else{
                header("Location: ../index.php");
            }
        }else{
            require("navbar_user.php");
        }
    ?>
        <div class="container">
            <div class="row col-lg-12">
                <div class="card col-lg-3">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>

                <div class="row col-lg-9">
                    <div class="row col-lg-12 ">
                        <div class="card col-lg-4">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>

                        <div class="card col-lg-4">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>

                        <div class="card col-lg-4">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>

                    </div>
                    <div class="row col-lg-12">
                        <div class="card col-lg-4">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>

                        <div class="card col-lg-4">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>

                        <div class="card col-lg-4">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        
        
            
    </body>
</html>