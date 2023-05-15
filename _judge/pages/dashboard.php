
<section class="section dashboard" id="judge-content">
    <div class="row">

        <div class="col-xxl-12 col-md-12">
            <div class="card info-card revenue-card text-center">

                <div class="card-header">
                    <h1 class="h1 display-6 text-primary text-uppercase">
                        <?= $e->event_name; ?>
                    </h1>

                    <h5 class="card-text">
                        <i class="bi bi-calendar-event"></i>
                        <?= $e->event_date; ?> |
                        <i class="bi bi-clock"></i>
                        <?= $e->event_time; ?> |
                        <i class="bi bi-geo-alt"></i>
                        <?= $e->event_venue; ?>
                        <br>
                        <?= $e->event_description; ?>
                    </h5>

                    <h3 class="card-text">
                        <span class="text-uppercase" id="criteria-name"></span>
                    </h3>
                </div>

                <div class="card-body">
                    <h4 class="text-uppercase" id="criteria-label"></h4>
                    <h4 class="text-uppercase" id="criteria-id" hidden></h4>

                    <div class="table-responsive" id="table-responsive">
                        <table class="table table-hover table-bordered align-middle" id="j-contestants-table"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Number</th>
                                    <th scope="col" class="text-center">Baranggay</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Score (1-10)</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>