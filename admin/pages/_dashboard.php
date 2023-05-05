<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-uppercase" href="?page=dashboard">
            <?= Config::get('website/name'); ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=dashboard">Home</a>
                </li> -->
            </ul>

            <!-- dropdown -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $user->getFullName(); ?>
                    </a>
                    <!-- align dropdown to right -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?page=logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container-fluid">

    <div class="card shadow rounded h-100">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <ul class="list-group text-center">
                        <li class="list-group-item" id="d-form-add-event">
                            Add Event
                        </li>
                        <li class="list-group-item" id="d-form-add-contestant">
                            Add Contestant
                        </li>
                        <li class="list-group-item" id="d-form-add-criteria">
                            Add Criteria
                        </li>
                        <li class="list-group-item" id="d-form-add-judge">
                            Add Judge
                        </li>
                    </ul>
                </div>

                <div class="col-9">

                    <form id="form-add-event" class="d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="create_event_name">Event Name</label>
                                    <input type="text" name="create_event_name" id="create_event_name"
                                        class="form-control">
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
                                    <input type="date" name="create_event_date" id="create_event_date"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="create_event_time">Event Time</label>
                                    <input type="time" name="create_event_time" id="create_event_time"
                                        class="form-control">
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

                    <form id="form-add-contestant" class="d-none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_event_id">Event</label>
                                    <select name="create_event_id" id="create_event_id" class="form-control">
                                        <option selected disabled hidden value="">Select Event</option>
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

                    <form id="form-add-criteria" class="d-none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_event_id">Event</label>
                                    <select name="create_event_id" id="create_event_id" class="form-control">
                                        <option selected disabled hidden value="">Select Event</option>
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
                                    <input type="number" name="create_criteria_percentage"
                                        id="create_criteria_percentage" class="form-control">
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create Criteria</button>
                            </div>
                        </div>
                    </form>

                    <form id="form-add-judge" class="d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="create_event_id">Event</label>
                                    <select name="create_event_id" id="create_event_id" class="form-control">
                                        <option selected disabled hidden value="">Select Event</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="create_judge_name">Judge Name</label>
                                    <input type="text" name="create_judge_name" id="create_judge_name"
                                        class="form-control">
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
</main>