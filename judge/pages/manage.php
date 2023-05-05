<section class="section dashboard">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">

                <div class="col-xxl-12 col-md-12">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <br />

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addEventModal">
                                        <i class="fas fa-plus"></i> Add Event
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addContestantModal">
                                        <i class="fas fa-plus"></i> Add Contestant
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addJudgeModal">
                                        <i class="fas fa-plus"></i> Add Judge
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addCriteriaModal">
                                        <i class="fas fa-plus"></i> Add Criteria
                                    </button>
                                </div>
                            </div>

                            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100 active" id="event-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-event" type="button" role="tab"
                                        aria-controls="event" aria-selected="true">Event</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="contestant-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-contestant" type="button" role="tab"
                                        aria-controls="contestant" aria-selected="false">Contestant</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="judge-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-judge" type="button" role="tab"
                                        aria-controls="judge" aria-selected="false">Judge</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="criteria-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-criteria" type="button" role="tab"
                                        aria-controls="criteria" aria-selected="false">Criteria</button>
                                </li>
                            </ul>

                            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                <div class="tab-pane fade show active" id="bordered-justified-event" role="tabpanel"
                                    aria-labelledby="event-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="events-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Venue</th>
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
                                    aria-labelledby="contestant-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="contestants-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Event</th>
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
                                <div class="tab-pane fade" id="bordered-justified-judge" role="tabpanel"
                                    aria-labelledby="judge-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="judges-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Event</th>
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
                                <div class="tab-pane fade" id="bordered-justified-criteria" role="tabpanel"
                                    aria-labelledby="criteria-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="criterias-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Event</th>
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
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Event</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-event" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_event_name">Event Name</label>
                                <input type="text" name="create_event_name" id="create_event_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_event_venue">Event Venue</label>
                                <input type="text" name="create_event_venue" id="create_event_venue"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_event_date">Event Date</label>
                                <input type="date" name="create_event_date" id="create_event_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_event_time">Event Time</label>
                                <input type="time" name="create_event_time" id="create_event_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_event_description">Event Description</label>
                                <textarea name="create_event_description" id="create_event_description"
                                    class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Create Event</button>
                        </div>
                    </div>
                </form>
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_event_id">Event</label>
                                <select name="create_event_id" id="create_event_id" class="form-control">
                                    <option selected disabled hidden value="">Select Event</option>
                                    <?php foreach($events as $event): ?>
                                    <option value="<?= $event->id ?>"><?= $event->event_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_event_id">Event</label>
                                <select name="create_event_id" id="create_event_id" class="form-control">
                                    <option selected disabled hidden value="">Select Event</option>
                                    <?php foreach($events as $event): ?>
                                    <option value="<?= $event->id ?>"><?= $event->event_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_judge_name">Judge Name</label>
                                <input type="text" name="create_judge_name" id="create_judge_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_judge_username">Judge Username</label>
                                <input type="text" name="create_judge_username" id="create_judge_username"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_judge_password">Judge Password</label>
                                <input type="password" name="create_judge_password" id="create_judge_password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_event_id">Event</label>
                                <select name="create_event_id" id="create_event_id" class="form-control">
                                    <option selected disabled hidden value="">Select Event</option>
                                    <?php foreach($events as $event): ?>
                                    <option value="<?= $event->id ?>"><?= $event->event_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
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
                            <button type="submit" class="btn btn-primary">Create Criteria</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>