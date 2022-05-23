@extends('layouts.appUser')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Contactez-Nous</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Accueil</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Contactez-Nous</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Prendre contact</span></p>
                <h1 class="mb-4">Contactez-nous pour toute question</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Votre Nom"
                                    required="required" data-validation-required-message="Veuillez entrer votre nom" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Votre E-mail"
                                    required="required"
                                    data-validation-required-message="Veuillez entrer votre adresse e-mail" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Sujet"
                                    required="required" data-validation-required-message="Veuillez entrer un sujet" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="6" id="message" placeholder="Message" required="required"
                                    data-validation-required-message="Veuillez entrer Votre message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
                                    Envoyer un message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <p>
                        Plus D'informations Sur Nous.
                    </p>
                    <div class="d-flex">
                        <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Adresse</h5>
                            <p>Notre adresse</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Email</h5>
                            <p>info@educapp.com</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Téléphone</h5>
                            <p>+216 22 222 222</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Heures d'ouverture</h5>
                            <strong>Dimanche - Vendredi:</strong>
                            <p class="m-0">08:00 - 17:00 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
