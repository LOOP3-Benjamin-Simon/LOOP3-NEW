<?php require_once('includes/header.php');?>


<body>
    <main>

    <header class="bg-dark py-1">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Øg sikkerheden i dine konstruktioner</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Vi tilbyder moderne Strain Gauge-løsninger tilpasset dine behov - vores udstyr overvåger konstant tilstanden på dine konstruktioner</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="#features">Læs mere</a>
                                    <a class="btn btn-outline-warning btn-lg px-4" href="blivkunde.php">Bliv kunde</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="images/straingauge.png" alt="..." /></div>
                    </div>
                </div>
            </header> 

            <section class="py-5" id="features">
                <div class="container px-5 my-5 ">
                    <div class="row gx-5">
                        <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="images/altan.png" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Hvad er en Strain Gauge?</h2>
                            <p class="lead fw-normal text-muted mb-0">En Strain Gauge er en strækmålingssensor, der kan registrere en konstruktions deformation i form af stræk eller kompression. Strain Gaugen monteres på den ønskede konstruktion netop dér, hvor der er størst risiko for brud. 
                                <br>
                                <br>
                                Konstruktionens belastning kan nu monitoreres direkte på vores hjemmeside og du kan derfor altid holde med konstruktionens sikkerhed. 
                                <br>
                                <br>
                                Strain Gaugen kan eksempelvis monteres på din altan, hvor den øjeblikkelige belastning vises på hjemmesiden, som illustreret på billedet til højre.  </p>
                        </div>
                    </div>
                </div>
            </section>

<section class="py-1">
                <div class="container px-5 py-5 my-2 bg-light">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Sådan kommer du igang</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><!--<i class="bi bi-building"></i>--></div>
                                    <h2 class="h5">1. Bliv kunde</h2>
                                    <p class="mb-0">Registrer dine oplysninger under fanen "Bliv kunde", hvorefter vi behandler din ansøgning</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><!--<i class="bi bi-building"></i>--></div>
                                    <h2 class="h5">2. Modtag login</h2>
                                    <p class="mb-0">Når vi har behandlet og godkendt din ansøgning, modtager du et personligt login</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><!--<i class="bi bi-toggles2"></i>--></div>
                                    <h2 class="h5">3. Adgang til personlig side</h2>
                                    <p class="mb-0">Med dit login har du adgang til en personlig side, hvor du kan danne et overblik over dine produkter.</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><!--<i class="bi bi-toggles2"></i>--></div>
                                    <h2 class="h5">4. Overvåg dine konstruktioner</h2>
                                    <p class="mb-0">På din personlige side har du nu mulighed for at overvåge alle dine Strain-Gauge-monitorerede beton- eller stålelementer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Blog preview section-->

            
            <section class="py-1">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Nyheder</h2>
                                <p class="lead fw-normal text-muted mb-5">Seneste nyt fra teamet bag StrainMonitoring</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row gx-5"> 
                        <?php require_once('includes/news.php'); ?>
                    </div>  
                </div>
            </section>
        </main>
        </body>

<br>

<?php 
    require_once('includes/footer.php');
?>