var urlParams = new URLSearchParams(window.location.search);

var get_event_id = urlParams.get('event_id');

var event_id = get_event_id;
var criteria_id = 0;

function Toast(status, message) {
    Command: toastr[status](message)

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function SignOut() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to sign out?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, sign out!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./backend/admin/sign-out.php",
                type: "POST",
                success: function (data) {
                    data = JSON.parse(data);

                    if (data.status == "success") {
                        Swal.fire({
                            title: 'Signing out...',
                            text: 'Please wait...',
                            allowOutsideClick: false,
                            timer: 2000,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            },
                            timerProgressBar: true,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                window.location.href = "./auth/login.php";
                            }
                        })
                    } else {
                        Toast("error", "Something went wrong!");
                    }
                }
            });
        }
    })
}

function CheckUser() {
    $.ajax({
        url: "./backend/admin/check-user.php",
        type: "POST",
        success: function (data) {
            var obj = JSON.parse(data);

            if (obj.status == "success") {

                if(obj.data.user_type == "admin"){
                    $(".full-name").html(obj.data.full_name);
                    $(".user-role").html(obj.data.user_type);
                }else{
                    window.location.href = "./auth/login.php";
                }

                var events = obj.events;

                var event_html = "";

                for (var i = 0; i < events.length; i++) {
                    event_html += "<tr>";
                    event_html += "<td>" + events[i].id + "</td>";
                    event_html += "<td>" + events[i].event_name + "</td>";
                    event_html += "<td>" + events[i].event_date + "</td>";
                    event_html += "<td>" + events[i].event_time + "</td>";
                    event_html += "<td>" + events[i].event_venue + "</td>";
                    event_html += "<td>" + events[i].event_description + "</td>";
                    event_html += "<td>" + (events[i].is_start == 'true' ?
                        '<span class="badge bg-success">Started</span>' :
                        '<span class="badge bg-danger">Not Started</span>') + "</td>";
                    event_html +=
                        "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditEvent(" +
                        events[i].id +
                        ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteEvent(" +
                        events[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                    event_html += "</tr>";

                    event_id = events[i].id;
                }
                $("#events-table tbody").html(event_html);
                $("#e-events-count").html(events.length);

                var e_event_html = "";
                for (var i = 0; i < events.length; i++) {
                    e_event_html += "<tr>";
                    e_event_html += "<td>" + events[i].event_name + "</td>";
                    e_event_html += "<td>" + events[i].event_description + "</td>";
                    e_event_html += "<td>" + events[i].event_date + "</td>";
                    e_event_html += "<td>" + events[i].event_time + "</td>";
                    e_event_html += "<td>" + events[i].event_venue + "</td>";
                    e_event_html += "<td>" + (events[i].is_start == 'true' ?
                        '<span class="badge bg-success">Started</span>' :
                        '<span class="badge bg-danger">Not Started</span>') + "</td>";
                    e_event_html +=
                        "<td><div class='btn-group'><a class='btn btn-sm btn-secondary' target='_blank' href='?page=event&event_id=" +
                        events[i].id +
                        "'><i class='bi bi-eye'></i></a><button class='btn btn-sm btn-info text-white' onclick='EditEvent(" +
                        events[i].id +
                        ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteEvent(" +
                        events[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                    e_event_html += "</tr>";
                }
                $("#e-events-table tbody").html(e_event_html);
            } else {
                window.location.href = "./auth/login.php";
            }
        }
    });
}

function FetchEventData(id) {
    $.ajax({
        url: "./backend/admin/fetch-event-data.php",
        type: "POST",
        data: {
            event_id: id
        },
        success: function (data) {
            data = JSON.parse(data);

            var contestant = data.contestants;
            var contestant_html = "";
            for (var i = 0; i < contestant.length; i++) {

                contestant_html += "<tr>";
                contestant_html += "<td>" + contestant[i].contestant_number + "</td>";
                contestant_html += "<td>" + contestant[i].contestant_name + "</td>";
                contestant_html += "<td>" + contestant[i].contestant_description + "</td>";
                contestant_html += "<td><button class='btn btn-sm btn-primary' onclick='ViewContestantResult(" + contestant[
                        i].id + ")'>Result</button></td>";
                contestant_html +=
                    "<td><div class='btn-group'><button class='btn btn-sm btn-danger' onclick='DeleteContestant(" + contestant[i].id + ")'><i class='bi bi-trash'></i></button><button class='btn btn-sm btn-warning' onclick='EditContestant(" + contestant[i].id + ")'><i class='bi bi-pencil'></i></button></div></td>";
                contestant_html += "</tr>";
            }
            $("#e-contestants-table tbody").html(contestant_html);
            $("#e-contestant-count").html(contestant.length);

            var judge = data.judges;
            var judge_html = "";
            for (var i = 0; i < judge.length; i++) {

                judge_html += "<tr>";
                judge_html += "<td>" + judge[i].judge_name + "</td>";
                judge_html += "<td>" + judge[i].judge_username + "</td>";
                judge_html += "<td>" + judge[i].judge_password + "</td>";
                judge_html += `<td><div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Results
                    </button>
                    <ul class="dropdown-menu">`;
                    $.each(data.criterias, function (key, value) {
                        judge_html += `<li><button class="dropdown-item" onclick="ViewJudgeResult(${judge[i].id},${value.id})">${value.criteria_name}</button></li>`;
                    });
                    `</ul></div></td>`;
                judge_html += `<td><div class='btn-group'><button class='btn btn-sm btn-danger' onclick='DeleteJudge(${judge[i].id})'><i class='bi bi-trash'></i></button><button class='btn btn-sm btn-warning' onclick='EditJudge(${judge[i].id })'><i class='bi bi-pencil'></i></button></div></td>`;
                judge_html += "</tr>";
            }
            $("#e-judges-table tbody").html(judge_html);
            $("#e-judge-count").html(judge.length);

            var criteria = data.criterias;
            var criteria_html = "";
            for (var i = 0; i < criteria.length; i++) {

                criteria_html += "<tr>";
                criteria_html += "<td>" + criteria[i].criteria_name + "</td>";
                criteria_html += "<td>" + criteria[i].criteria_percentage + "</td>";

                criteria_html += "<td>";
                if (criteria[i].is_show == 'true') {
                    criteria_html +=
                        '<button type="button" class="btn btn-sm btn-success" onclick="HideCriteria(' +
                        criteria[i].id + ',' + data.event.id + ')">Hide</button>'
                } else {
                    criteria_html +=
                        '<button type="button" class="btn btn-sm btn-danger" onclick="ShowCriteria(' +
                        criteria[i].id + ',' + data.event.id + ')">Show</button>'
                }
                criteria_html += "</td>";

                criteria_html +=
                    "<td><button class='btn btn-sm btn-primary' id='view-criteria-results-btn' onclick='ViewCriteriaResult(" +
                    criteria[i].id +
                    ")'>Result</button></td>";

                criteria_html +=
                    "<td><div class='btn-group' role='group'><button class='btn btn-sm btn-danger' onclick='DeleteCriteria(" +
                    criteria[i].id +
                    ")'><i class='bi bi-trash'></i></button><button class='btn btn-sm btn-warning' onclick='EditCriteria(" +
                    criteria[i].id + ")'><i class='bi bi-pencil'></i></button></div></td>";

                criteria_html += "</tr>";
            }
            $("#e-criterias-table tbody").html(criteria_html);
            $("#e-criteria-count").html(criteria.length);

            var event_btn_html = "";

            event_btn_html += '<div class="btn-group" role="group">';

            if (data.event.is_start == 'true') {
                event_btn_html +=
                    '<button type="button" class="btn btn-sm btn-danger" onclick="StopEvent(' + id +
                    ')">Stop</button>';
            } else {
                event_btn_html +=
                    '<button type="button" class="btn btn-sm btn-success" onclick="StartEvent(' +
                    id + ')">Start</button>';
            }

            event_btn_html +=
                '<button type="button" class="btn btn-sm btn-info text-white" onclick="GotoViewOverallResult(' + id + ')">Overall Result</button>';

            event_btn_html += '</div>';

            $("#e-event-btn").html(event_btn_html);
        }
    });
}

function GotoViewOverallResult(id) {
    // target="_blank"
    window.open("./view-overall-result.php?event_id=" + id, '_blank');
}

function StopEvent(id) {
    $.ajax({
        url: "./backend/admin/stop-event.php",
        type: "POST",
        data: {
            event_id: id
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                Toast(data.status, data.message);
                FetchEventData(id);
            } else {
                Toast(data.status, data.message);
            }
        }
    });
}

function StartEvent(id) {
    $.ajax({
        url: "./backend/admin/start-event.php",
        type: "POST",
        data: {
            event_id: id
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                Toast(data.status, data.message);
                FetchEventData(id);
            } else {
                Toast(data.status, data.message);
            }
        }
    });
}

function GetJudgeScore(judge_id, criteria_id, contestant_id) {
    $.ajax({
        url: "./backend/admin/get-judge-score.php",
        type: "POST",
        data: {
            judge_id: judge_id,
            criteria_id: criteria_id,
            contestant_id: contestant_id
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                $("#score-criteria-result").html(data.score);
                $("#total-score-criteria-result").html(data.score);
            } else {
                Toast(data.status, data.message);
            }
        }
    });
}

function ViewCriteriaResult(criteria_id) {
    Swal.fire({
        title: 'Tallying Criteria Result...',
        text: 'Please wait...',
        icon: 'info',
        allowEscapeKey: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        willOpen: () => {
            Swal.showLoading();
        },
    });
        $.ajax({
            url: "./backend/admin/view-criteria-result.php",
            type: "POST",
            data: {
                criteria_id: criteria_id
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.status == 'success') {
                    $("#e-criterias-result").html(data.html_table);
                    $("#criteria-modal-name").html(data.criteria_name);
                    $("#viewCriteriaResultModal").modal('show');
                    Swal.close();
                }else{
                    Swal.close();
                    Swal.fire({
                        title: 'No result found!',
                        text: data.message,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function (data) {
                console.log(data);
                Swal.close();
            }
        });
}

function PrintCriteriaResult(){
    var printContents = document.getElementById("e-criterias-result").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    // hide print button in print preview
    $("#print-btn-criteria").hide();

    window.print();

    document.body.innerHTML = originalContents;
}

function ViewContestantResult(contestant_id) {
    Swal.fire({
        title: 'Tallying Contestant Result...',
        text: 'Please wait...',
        icon: 'info',
        allowEscapeKey: false,
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        },
    });

    setTimeout(function () {
        $.ajax({
            url: "./backend/admin/view-contestant-result.php",
            type: "POST",
            data: {
                contestant_id: contestant_id
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.status == 'success') {
                    $("#e-contestants-result").html(data.html);
                    $("#contestant-modal-name").html(data.contestant_name);
                    $("#viewContestantResultModal").modal('show');
                    Swal.close();
                } else {
                    Swal.close();
                    Swal.fire({
                        title: 'No result found!',
                        text: data.message,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function (data) {
                console.log(data);
                Swal.close();
            }
        });
    }, 500);
}

function PrintContestantResult(){
    var printContents = document.getElementById("e-contestants-result").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    // hide print button in print preview
    $("#print-btn-contestant").hide();

    window.print();

    document.body.innerHTML = originalContents;
}

function ViewJudgeResult(judge_id, criteria_id) {
    Swal.fire({
        title: 'Tallying Judge Result...',
        text: 'Please wait...',
        icon: 'info',
        allowEscapeKey: false,
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        },
    });

    setTimeout(function () {
        $.ajax({
            url: "./backend/admin/view-judge-result.php",
            type: "POST",
            data: {
                judge_id: judge_id,
                criteria_id: criteria_id
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.status == 'success') {
                    $("#e-judges-result").html(data.html);
                    $("#judge-modal-name").html(data.judge);
                    $("#judge-result-table").DataTable({
                        "paging": false,
                        "info": false,
                        "searching": false,
                        "responsive": true,
                        "dom": '<"top"i>rt<"bottom"flp><"clear">',
                        "language": {
                            "emptyTable": "No contestant found"
                        }
                    });
                    $("#viewJudgeResultModal").modal('show');
                    Swal.close();
                } else {
                    Toast(data.status, data.message);
                }
            },
            error: function (data) {
                console.log(data);
                Swal.close();
            }
        });
    }, 700);
}

function PrintJudgeResult(){
    var printContents = document.getElementById("e-judges-result").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    // hide print button in print preview
    $("#print-btn-judge").hide();

    window.print();

    document.body.innerHTML = originalContents;
}

function ShowCriteria(id, event_id) {
    $.ajax({
        url: "./backend/admin/show-criteria.php",
        type: "POST",
        data: {
            criteria_id: id
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                Toast(data.status, data.message);
                FetchEventData(event_id);
                CurrentShowedCriteria(event_id);
            } else {
                Toast(data.status, data.message);
            }
        }
    });
}

function HideCriteria(id, event_id) {
    $.ajax({
        url: "./backend/admin/hide-criteria.php",
        type: "POST",
        data: {
            criteria_id: id
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                Toast(data.status, data.message);
                FetchEventData(event_id);
                CurrentShowedCriteria(event_id);
            } else {
                Toast(data.status, data.message);
            }
        }
    });
}

function FetchData() {
    $.ajax({
        url: "./backend/admin/fetch-data.php",
        type: "GET",
        success: function (data) {
            data = JSON.parse(data);

            var contestant = data.contestants;
            var contestant_html = "";
            for (var i = 0; i < contestant.length; i++) {

                contestant_html += "<tr>";

                var event_name = '';
                $.ajax({
                    url: "./backend/admin/get-event-name.php",
                    type: "POST",
                    data: {
                        event_id: contestant[i].event_id
                    },
                    async: false,
                    success: function (data) {
                        event_name = data;
                    }
                });

                contestant_html += "<td>" + event_name + "</td>";

                contestant_html += "<td>" + contestant[i].contestant_number + "</td>";
                contestant_html += "<td>" + contestant[i].contestant_name + "</td>";
                contestant_html += "<td>" + contestant[i].contestant_description + "</td>";
                contestant_html +=
                    "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditContestant(" +
                    contestant[i].id +
                    ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteContestant(" +
                    contestant[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                contestant_html += "</tr>";
            }
            $("#contestants-table tbody").html(contestant_html);

            var judge = data.judges;
            var judge_html = "";
            for (var i = 0; i < judge.length; i++) {
                judge_html += "<tr>";

                var event_name = '';
                $.ajax({
                    url: "./backend/admin/get-event-name.php",
                    type: "POST",
                    data: {
                        event_id: judge[i].event_id
                    },
                    async: false,
                    success: function (data) {
                        event_name = data;
                    }
                });

                judge_html += "<td>" + event_name + "</td>";

                judge_html += "<td>" + judge[i].judge_name + "</td>";
                judge_html += "<td>" + judge[i].judge_username + "</td>";
                judge_html += "<td>" + judge[i].judge_password + "</td>";
                judge_html +=
                    "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditJudge(" +
                    judge[i].id +
                    ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteJudge(" +
                    judge[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                judge_html += "</tr>";
            }
            $("#judges-table tbody").html(judge_html);

            var criteria = data.criterias;
            var criteria_html = "";
            for (var i = 0; i < criteria.length; i++) {
                criteria_html += "<tr>";

                var event_name = '';
                $.ajax({
                    url: "./backend/admin/get-event-name.php",
                    type: "POST",
                    data: {
                        event_id: criteria[i].event_id
                    },
                    async: false,
                    success: function (data) {
                        event_name = data;
                    }
                });

                criteria_html += "<td>" + event_name + "</td>";

                criteria_html += "<td>" + criteria[i].criteria_name + "</td>";
                criteria_html += "<td>" + criteria[i].criteria_percentage + "</td>";
                criteria_html += "<td>" + criteria[i].is_show + "</td>";
                criteria_html +=
                    "<td><div class='btn-group'><button class='btn btn-sm btn-primary' onclick='EditCriteria(" +
                    criteria[i].id +
                    ")'><i class='bi bi-pencil-square'></i></button><button class='btn btn-sm btn-danger' onclick='DeleteCriteria(" +
                    criteria[i].id + ")'><i class='bi bi-trash'></i></button></div></td>";
                criteria_html += "</tr>";

                criteria_id = criteria[i].id;
            }
            $("#criterias-table tbody").html(criteria_html);
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function CurrentShowedCriteria(event_id) {
    $.ajax({
        url: "./backend/admin/get-current-showed-criteria.php",
        type: "POST",
        data: {
            event_id: event_id
        },
        success: function (data) {
            // check if returned false
            if (data == false) {
                $("#current-showed-criteria").html("No criteria showed");
            } else {
                $("#showed-criteria").html(data);
                $("#current-showed-criteria").html(data);
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function ShowScore(contestant_id, criteria_id) {
    $.ajax({
        url: "./backend/admin/get-score.php",
        type: "POST",
        data: {
            contestant_id: contestant_id,
            criteria_id: criteria_id
        },
        success: function (data) {
            $("#showScoreModal").modal("show");
            $("#showScoreModalBody").html(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function ShowTotalScore(contestant_id) {
    $.ajax({
        url: "./backend/admin/get-total-score.php",
        type: "POST",
        data: {
            contestant_id: contestant_id
        },
        success: function (data) {
            $("#showTotalScoreModal").modal("show");
            $("#showTotalScoreModalBody").html(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function EditEvent(id) {
    $.ajax({
        url: "./backend/admin/get-event.php",
        type: "POST",
        data: {
            get_event_id: id
        },
        success: function (data) {
            var obj = JSON.parse(data);
            $("#edit_event_id").val(obj.id);
            $("#edit_event_name").val(obj.event_name);
            $("#edit_event_description").val(obj.event_description);
            $("#edit_event_venue").val(obj.event_venue);
            $("#edit_event_date").val(obj.event_date);
            $("#edit_event_time").val(obj.event_time);
            $("#editEventModal").modal("show");
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function EditContestant(id) {
    $.ajax({
        url: "./backend/admin/get-contestant.php",
        type: "POST",
        data: {
            get_contestant_id: id
        },
        success: function (data) {
            var obj = JSON.parse(data);
            $("#edit_contestant_id").val(obj.id);
            $("#edit_contestant_number").val(obj.contestant_number);
            $("#edit_contestant_name").val(obj.contestant_name);
            $("#edit_contestant_description").val(obj.contestant_description);
            $("#editContestantModal").modal("show");
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function EditJudge(id) {
    $.ajax({
        url: "./backend/admin/get-judge.php",
        type: "POST",
        data: {
            get_judge_id: id
        },
        success: function (data) {
            var obj = JSON.parse(data);
            $("#edit_judge_id").val(obj.id);
            $("#edit_judge_name").val(obj.judge_name);
            $("#edit_judge_username").val(obj.judge_username);
            $("#edit_judge_password").val(obj.judge_password);
            $("#editJudgeModal").modal("show");
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function EditCriteria(id) {
    $.ajax({
        url: "./backend/admin/get-criteria.php",
        type: "POST",
        data: {
            get_criteria_id: id
        },
        success: function (data) {
            var obj = JSON.parse(data);
            $("#edit_criteria_id").val(obj.id);
            $("#edit_criteria_name").val(obj.criteria_name);
            $("#edit_criteria_percentage").val(obj.criteria_percentage);
            $("#editCriteriaModal").modal("show");
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function DeleteEvent(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',

        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',

        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./backend/admin/delete-event.php",
                type: "POST",
                data: {
                    delete_event_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "success") {
                        Toast(obj.status, obj.message);
                        CheckUser();
                    } else {
                        Toast(obj.status, obj.message);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
}

function DeleteContestant(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',

        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',

        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./backend/admin/delete-contestant.php",
                type: "POST",
                data: {
                    delete_contestant_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "success") {
                        Toast(obj.status, obj.message);
                        FetchEventData(event_id);
                    } else {
                        Toast(obj.status, obj.message);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
}

function DeleteJudge(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',

        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',

        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./backend/admin/delete-judge.php",
                type: "POST",
                data: {
                    delete_judge_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "success") {
                        Toast(obj.status, obj.message);
                        FetchEventData( event_id );
                    } else {
                        Toast(obj.status, obj.message);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
}

function DeleteCriteria(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',

        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',

        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./backend/admin/delete-criteria.php",
                type: "POST",
                data: {
                    delete_criteria_id: id
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "success") {
                        Toast(obj.status, obj.message);
                        FetchEventData( event_id );
                    } else {
                        Toast(obj.status, obj.message);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
}

$(document).ready(function () {

    $(".toggle-sidebar-btn").on("click", function () {
        $("body").toggleClass("toggle-sidebar");
    });

    CheckUser();
    
    var total_scores = $(".criteria-total-score").length;

    if (window.location.href.indexOf("page=event") > -1) {
        FetchEventData( event_id );
        CurrentShowedCriteria( event_id );
    }

    //add
    $("#form-add-event").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/add-event.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-add-event")[0].reset();
                    CheckUser();
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });

    $("#form-add-contestant").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/add-contestant.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-add-contestant")[0].reset();
                    // FetchEventData(event_id);
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });

    $("#form-add-judge").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/add-judge.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-add-judge")[0].reset();
                    FetchEventData( event_id );
                    FetchData();
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });

    $("#form-add-criteria").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/add-criteria.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-add-criteria")[0].reset();
                    FetchEventData( event_id );
                    FetchData();
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });

    //edit
    $("#form-edit-event").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/edit-event.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-edit-event")[0].reset();
                    $("#editEventModal").modal("hide");
                    CheckUser();
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });

    $("#form-edit-contestant").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/edit-contestant.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-edit-contestant")[0].reset();
                    $("#editContestantModal").modal("hide");
                    FetchEventData( event_id );
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });

    $("#form-edit-judge").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/edit-judge.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-edit-judge")[0].reset();
                    $("#editJudgeModal").modal("hide");
                    FetchEventData( event_id );
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });

    $("#form-edit-criteria").on("submit", function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "./backend/admin/edit-criteria.php",
            type: "POST",
            data: form_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 'success') {
                    $("#form-edit-criteria")[0].reset();
                    $("#editCriteriaModal").modal("hide");
                    FetchEventData( event_id );
                    Toast(obj.status, obj.message);
                } else {
                    Toast(obj.status, obj.message);
                }
            },
            error: function (data) {
                Toast('error', 'Something went wrong!');
                console.log(data);
            }
        });
    });


    $("#resultTable").DataTable({
        paging: false,
        exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6]
        }
    });

});