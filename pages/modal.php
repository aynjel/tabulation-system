
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

<div class="modal fade" id="viewTops" tabindex="-1" aria-labelledby="addOverallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>
                        Top
                    </strong>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-create-tops">
                    <input type="hidden" name="event_id" id="event_id" value="<?= $event_id ?>">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    <button type="button" id="submit-create-tops" class="btn btn-primary mt-3">
                        Create
                    </button>
                </form>
                <hr>
                <div id="e-tops-list"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewJudgeOverallResultModal" tabindex="-1" aria-labelledby="addOverallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable" style="max-width: 100%; height: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>
                        <span id="judge-overall-modal-name"></span>
                    </strong>

                    <div class="text-center mx-auto d-inline" id="print-btn-Overall">
                        <button class="btn btn-primary btn-sm" onclick="PrintJudgeOverallResult()" id="print-btn-judge-overall">
                        <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id='e-judge-overall-results-table'></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewOverallResultModal" tabindex="-1" aria-labelledby="addOverallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable" style="max-width: 100%; height: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>
                        <span id="overall-modal-name"></span>
                    </strong>

                    <div class="text-center mx-auto d-inline" id="print-btn-Overall">
                        <button class="btn btn-primary btn-sm" onclick="PrintOverallResult()" id="print-btn-overall">
                        <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id='e-overall-results-table'></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewCriteriaResultModal" tabindex="-1" aria-labelledby="addCriteriaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable" style="max-width: 100%; height: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>
                        <span id="criteria-modal-name"></span>
                    </strong>

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
                    <strong>
                        <span id="contestant-modal-name"></span>
                    </strong>

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
                    <strong>
                        <span id="judge-modal-name"></span>
                    </strong>

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
                            <button type="submit" class="btn btn-primary mt-2">Create</button>
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_top_id">Criteria Top</label>
                                <select name="create_top_id" id="create_top_id" class="form-control">
                                    <option selected hidden disabled>Select Top</option>
                                    <?php
                                        foreach($tops as $t) {
                                            echo '<option value="'.$t->id.'">'.$t->name.'</option>';
                                        }
                                    ?>
                            </div>
                        </div>
                        <div class="mt-5">
                            <input type="hidden" name="create_event_id" id="create_event_id" value="<?= $event_id ?>">
                            <button type="submit" class="btn btn-primary mt-2">Create Criteria</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
