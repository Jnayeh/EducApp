@extends('layouts.appUser')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="display-4 font-weight-bold text-white mt-5 mt-lg-0">Une Nouvelle Perspective Pour
                    l'Education
                    Des Enfants</h1>
                <p class="text-white mb-4">Notre service est une service générale et conveniente pour la
                    facilitation
                    des cours.</p>
                <div class="d-grid d-md-block">
                    <a href="/login" class="btn btn-success mx-1 mb-2">Espace Parent</a>
                    <a href="/login" class="btn btn-warning mx-1 mb-2">Espace Professeur</a>
                    <a href="/login" class="btn btn-danger mx-1 mb-2">Espace Administration</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5 mb-3" src="img/header.png" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->

    {{-- <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px 20px;">
                        <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Gestion des matiéres</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px 20px;">
                        <i class="flaticon-035-table h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Gestion des classes</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px 20px;">
                        <i class="flaticon-032-book h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Gestion des bulletins</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px 20px;">
                        <i class="flaticon-040-puzzle h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Gestion des homeworks</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px 20px;">
                        <i class="flaticon-019-pencil h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Gestion des réponses</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px 20px;">
                        <i class="flaticon-014-blackboard h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Gestion des reclamations</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start --> --}}


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">A Propos Nous</span></p>
                    <h1 class="mb-4">Meilleure application d'education</h1>

                    <div class="row pt-2 pb-4">
                        <div class="col-6 col-md-4">
                            <img class="img-fluid rounded" src="img/about-2.jpg" alt="">
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa fa-check text-primary mr-3"></i>Gestion des homeworks</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Gestion
                                    des
                                    classes</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Communication
                                    entre les
                                    enseignants
                                    et les parents</li>
                            </ul>
                        </div>
                    </div>
                    <a href="/about" class="btn btn-primary mt-2 py-2 px-4">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    {{-- <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Gestion des Classes</span></p>
                <h1 class="mb-4">Les Classes Pour Vos Enfants</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="img/class-1.jpg" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Classe Mathématiques</h4>
                        </div>
                        <div class="card-footer bg-transparent px-5 pb-1">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age d'enfants</strong></div>
                                <div class="col-6 py-1">6 - 11 Ans</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Nombre de Chaises</strong>
                                </div>
                                <div class="col-6 py-1">40 Chaises</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Temps de Classe </strong>
                                </div>
                                <div class="col-6 py-1">08:00 - 10:00</div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="img/class-2.jpg" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Langues</h4>

                        </div>
                        <div class="card-footer bg-transparent px-5 pb-1">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age d'enfants</strong></div>
                                <div class="col-6 py-1">6 - 11 Ans</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Nombre de Chaises</strong>
                                </div>
                                <div class="col-6 py-1">40 Chaises</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Temps de Classe </strong>
                                </div>
                                <div class="col-6 py-1">08:00 - 10:00</div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="img/class-3.jpg" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Sciences fondamentales</h4>

                        </div>
                        <div class="card-footer bg-transparent px-5 pb-1">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age d'enfants</strong>
                                </div>
                                <div class="col-6 py-1">6 - 11 Ans</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Nombre de
                                        Chaises</strong>
                                </div>
                                <div class="col-6 py-1">40 Chaises</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Temps de Classe
                                    </strong>
                                </div>
                                <div class="col-6 py-1">08:00 - 10:00</div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Class End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Nos Professeurs</span></p>
                <h1 class="mb-4">Rencontrez Nos Professeurs</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Julia Smith</h4>
                    <i>Enseignante de musique</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Jhon Doe</h4>
                    <i>Enseignant de langue</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Mollie Ross</h4>
                    <i>Enseignante de danse</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Donald John</h4>
                    <i>Enseignant d'art</i>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End --> --}}
@endsection
