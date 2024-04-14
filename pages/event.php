<?php

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

if(!isset($event_id) || empty($event_id) || !$e) {echo '<script>window.location.href = "./?page=events";</script>';}

$top = new Tops();
$tops = $top->findBy('event_id', $event_id);

$contestant = new Contestant();
$contestants = $contestant->findBy('event_id', $event_id);
?>

<section class="section dashboard">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">

                <div class="col-xxl-12 col-md-12">
                    <div class="card">

                        <div class="card-header">
                            Event Details
                        </div>

                        <div class="card-body">
                            <h1 class="card-title text-center text-uppercase">
                                <?= $e->event_name ?>
                            </h1>

                            <p class="card-text text-center">
                                <?= $e->event_description ?>
                                <br>
                                <i class="bi bi-calendar-date"></i>
                                <?= $e->event_date ?> |
                                <i class="bi bi-clock"></i>
                                <?= $e->event_time ?> |
                                <i class="bi bi-geo-alt"></i>
                                <?= $e->event_venue ?>
                                <br>
                                <span id="event-status"></span>
                            </p>

                            <!-- display current showed criteria -->
                            <p class="card-text text-center">
                                Showed Criteria: <span id="current-showed-criteria"></span>
                            </p>

                            <div class="text-center mx-auto">

                                <div id="e-event-btn"></div>

                            </div>

                            <hr class="my-4">

                            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">

                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100 active" id="e-criterias-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-criteria" type="button" role="tab"
                                        aria-controls="criteria" aria-selected="false">Criteria</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="e-contestants-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-contestant" type="button" role="tab"
                                        aria-controls="contestant" aria-selected="true">Contestant</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="e-judges-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-judge" type="button" role="tab"
                                        aria-controls="judge" aria-selected="false">Judge</button>
                                </li>

                            </ul>

                            <div class="tab-content pt-2 h-100" id="borderedTabJustifiedContent">

                                <div class="tab-pane fade show show active" id="bordered-justified-criteria"
                                    role="tabpanel" aria-labelledby="e-criterias-tab">
                                    <div class="table-responsive">
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <h3 class="card-title">Criterias (<span id="e-criteria-count">0</span>)
                                            </div>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addCriteriaModal">Add Criteria
                                                </button>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-bordered text-center" id="e-criterias-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">For</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Percentage</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Result</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="bordered-justified-contestant" role="tabpanel"
                                    aria-labelledby="e-contestants-tab">
                                    <div class="table-responsive">
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <h3 class="card-title">Contestants (<span
                                                        id="e-contestant-count">0</span>)
                                            </div>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addContestantModal">Add Contestant
                                                </button>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-bordered text-center" id="e-contestants-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Number</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Baranggay</th>
                                                    <th scope="col">Result</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="bordered-justified-judge" role="tabpanel"
                                    aria-labelledby="e-judges-tab">
                                    <div class="table-responsive">
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <h3 class="card-title">Judges (<span id="e-judge-count">0</span>)
                                            </div>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addJudgeModal">Add Judge
                                                </button>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-bordered text-center" id="e-judges-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col">Result</th>
                                                    <th scope="col">Action</th>
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
                </div>

            </div>
        </div>

    </div>
</section>

