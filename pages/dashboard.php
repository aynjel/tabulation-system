<section class="section dashboard">

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">
                <i class="bi bi-calendar3"></i> Events (<span id="e-events-count" class="text-primary fw-bold">0</span>)
                <button class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addEventModal">
                    <i class="fas fa-plus"></i> Add Event
                </button>
            </h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="e-events-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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