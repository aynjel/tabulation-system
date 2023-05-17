<?php

$event_id = Input::get('event_id');

$event = new Event();

$e = $event->find($event_id);

if(!isset($event_id) || empty($event_id) || !$e) {echo '<script>window.location.href = "./?page=events";</script>';}

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
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Percentage</th>
                                                    <th scope="col">Status</th>
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

<div class="modal fade" id="viewCriteriaResultModal" tabindex="-1" aria-labelledby="addCriteriaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable" style="max-width: 100%; height: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>View Criteria Result</strong>

                    <div class="text-center mx-auto d-inline" id="print-btn-criteria">
                        <button class="btn btn-primary btn-sm" onclick="PrintCriteriaResult()" id="print-btn-criteria">
                        <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id='e-criterias-result'></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewContestantResultModal" tabindex="-1" aria-labelledby="addContestantModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable" style="max-width: 100%; height: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>View Contestant Result</strong>

                    <div class="text-center mx-auto d-inline" id="print-btn-contestant">
                        <button class="btn btn-primary btn-sm" onclick="PrintContestantResult()" id="print-btn-contestant">
                        <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id='e-contestants-result'></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewJudgeResultModal" tabindex="-1" aria-labelledby="addJudgeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable" style="max-width: 100%; height: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>View Judge Result</strong>

                    <div class="text-center mx-auto d-inline" id="print-btn-judge">
                        <button class="btn btn-primary btn-sm" onclick="PrintJudgeResult()" id="print-btn-judge">
                        <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id='e-judges-result'></div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addContestantModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Contestant</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-contestant" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_contestant_number">Contestant Number</label>
                                <input type="number" name="create_contestant_number" id="create_contestant_number"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_contestant_name">Contestant Name</label>
                                <input type="text" name="create_contestant_name" id="create_contestant_name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_contestant_description">Contestant Description</label>
                                <input type="text" name="create_contestant_description"
                                    id="create_contestant_description" class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="hidden" name="create_event_id" id="create_event_id" value="<?= $event_id ?>">
                            <button type="submit" class="btn btn-primary">Create Contestant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addJudgeModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Judge</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-judge" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_judge_name">Judge Name</label>
                                <input type="text" name="create_judge_name" id="create_judge_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_judge_username">Judge Username</label>
                                <input type="text" name="create_judge_username" id="create_judge_username"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_judge_password">Judge Password</label>
                                <input type="password" name="create_judge_password" id="create_judge_password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="hidden" name="create_event_id" id="create_event_id" value="<?= $event_id ?>">
                            <button type="submit" class="btn btn-primary">Create Judge</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCriteriaModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Criteria</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-criteria" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_criteria_name">Criteria Name</label>
                                <input type="text" name="create_criteria_name" id="create_criteria_name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_criteria_percentage">Criteria Percentage</label>
                                <input type="number" name="create_criteria_percentage" id="create_criteria_percentage"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="hidden" name="create_event_id" id="create_event_id" value="<?= $event_id ?>">
                            <button type="submit" class="btn btn-primary">Create Criteria</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCriteriaModal" tabindex="-1" aria-labelledby="addCriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Edit Criteria</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-criteria" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_criteria_name">Criteria Name</label>
                                <input type="text" name="edit_criteria_name" id="edit_criteria_name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_criteria_percentage">Criteria Percentage</label>
                                <input type="readonly" name="edit_criteria_percentage" id="edit_criteria_percentage"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="hidden" name="edit_criteria_id" id="edit_criteria_id" class="form-control">
                            <button type="submit" class="btn btn-primary">Edit Criteria</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editJudgeModal" tabindex="-1" aria-labelledby="addJudgeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Edit Judge</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-judge" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_judge_name">Judge Name</label>
                                <input type="text" name="edit_judge_name" id="edit_judge_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_judge_username">Judge Username</label>
                                <input type="readonly" name="edit_judge_username" id="edit_judge_username"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_judge_password">Judge Password</label>
                                <input type="password" name="edit_judge_password" id="edit_judge_password" class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="hidden" name="edit_judge_id" id="edit_judge_id" class="form-control">
                            <button type="submit" class="btn btn-primary">Edit Judge</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editContestantModal" tabindex="-1" aria-labelledby="addContestantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Edit Contestant</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-contestant" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_contestant_name">Contestant Name</label>
                                <input type="text" name="edit_contestant_name" id="edit_contestant_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_contestant_number">Contestant Number</label>
                                <input type="text" name="edit_contestant_number" id="edit_contestant_number"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_contestant_description">Contestant Baranggay</label>
                                <input type="text" name="edit_contestant_description" id="edit_contestant_description" class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="hidden" name="edit_contestant_id" id="edit_contestant_id" class="form-control">
                            <button type="submit" class="btn btn-primary">Edit Contestant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>