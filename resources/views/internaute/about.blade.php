@extends('layouts.appUser')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">A Propos Nous</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Accueil</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">A Propos Nous</p>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">A Propos Nous</span></p>
                    <h1 class="mb-4">Meilleure Application d'Education</h1>

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

    <!-- Header End -->
    <!-- Facilities Start -->
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
    <!-- Facilities Start -->
@endsection
