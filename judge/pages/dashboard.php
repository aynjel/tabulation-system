
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
                        <table class="table table-hover table-bordered" id="j-contestants-table"
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
                                <?php 
                                $contestant = new Contestant();
                                $contestants = $contestant->findBy('event_id', $e->id);

                                foreach($contestants as $con) : ?>
                                <tr>
                                    <td class="text-center"><?= $con->contestant_number; ?></td>
                                    <td class="text-center"><?= $con->contestant_description; ?></td>
                                    <td class="text-center"><?= $con->contestant_name; ?></td>
                                    <td class="text-center">
                                        <form class="form-score" id="form-score-judge">
                                            <input type="hidden" name="contestant_id" value="<?= $con->id; ?>">
                                            <input type="hidden" name="judge_id" value="<?= Session::get('judge_id'); ?>">
                                            <input type="hidden" name="event_id" value="<?= $e->id; ?>">
                                            <input type="number" class="form-control shadow border-dark text-center w-50 mx-auto" name="score" id="score"
                                            min="1" max="10" step="0.01" required>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type='button' id='submit-all-score'
                            class='mt-3 btn btn-primary btn-lg text-center mx-auto'>Submit</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>