<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../style/register.css">
</head>
<body>
    <!-- -------------------------------- INFO MODAL ----------------------------- !-->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Informatique Notes</h5>
                            <form class="form-signin" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputMath" class="form-control" placeholder="math" name="math">
                                            <label for="inputMath">math</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputPhy" class="form-control" placeholder="physique" name="physique">
                                            <label for="inputPhy">physique</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputAlgo" class="form-control" placeholder="algo" name="algo">
                                            <label for="inputAlgo">algo</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputTic" class="form-control" placeholder="tic" name="tic">
                                            <label for="inputTic">Tic</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- --------------------------------------   !-->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputBD" class="form-control" placeholder="bd" name="bd">
                                            <label for="inputMinputBDath">BD</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputArab" class="form-control" placeholder="arabe" name="arabe">
                                            <label for="inputArab">Arabe</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputFr" class="form-control" placeholder="francais" name="francais">
                                            <label for="inputFr">Francais</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputAng" class="form-control" placeholder="anglais" name="anglais">
                                            <label for="inputAng">Anglais</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputPhilo" class="form-control" placeholder="philo" name="philo">
                                            <label for="inputPhilo">Philo</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputSp" class="form-control" placeholder="sport" name="sport">
                                            <label for="inputSp">Sport</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="inputOp" class="form-control" placeholder="option" name="option">
                                            <label for="inputOp">option</label>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                </div>

                                <hr class="my-4">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -------------------------------- SCIENCE MODAL ----------------------------- !-->
    <!-- <div class="modal fade" id="scModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                                        <div class="card card-signin my-5">
                                            <div class="card-body">
                                                <h5 class="card-title text-center"> Science Notes</h5>
                                                <form class="form-signin" method="POST">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputMathSc" class="form-control" placeholder="math" name="math">
                                                                <label for="inputMathSc">math</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputPhySc" class="form-control" placeholder="physique" name="physique">
                                                                <label for="inputPhySc">physique</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputSc" class="form-control" placeholder="science" name="science">
                                                                <label for="inputSc">Science</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputArabSc" class="form-control" placeholder="arabe" name="arabe">
                                                                <label for="inputArabSc">Arabe</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputFrSc" class="form-control" placeholder="francais" name="francais">
                                                                <label for="inputFrSc">Francais</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputAngSc" class="form-control" placeholder="anglais" name="anglais">
                                                                <label for="inputAngSc">Anglais</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputPhiloSc" class="form-control" placeholder="philo" name="philo">
                                                                <label for="inputPhiloSc">Philo</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputInfo" class="form-control" placeholder="informatique" name="informatique">
                                                                <label for="inputInfo">Info</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputOpSc" class="form-control" placeholder="option" name="option">
                                                                <label for="inputOpSc">option</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputSpSc" class="form-control" placeholder="sport" name="sport">
                                                                <label for="inputSpSc">Sport</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> !-->

</body>
</html>