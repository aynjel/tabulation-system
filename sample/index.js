
function GetShowedCriteria() {
    $.ajax({
        url: "./get-showed-criteria.php",
        type: "POST",
        data: {
            event_id: $("#event-id").val()
        },
        async: false,
        success: function (data) {
            var obj = JSON.parse(data);

            if(obj.status == "success"){
                var criteria = obj.data;
                
                $("#showed-criteria").html(criteria.criteria_name);
                $("#showed-criteria-id").val(criteria.id);
            }
        }
    });
}

function GetAllContestants() {
    $.ajax({
        url: "./get-all-contestants.php",
        type: "POST",
        data: {
            event_id: $("#event-id").val()
        },
        async: false,
        success: function (data) {
            var obj = JSON.parse(data);

            if(obj.status == "success"){
                var contestant = obj.data;
                
                var contestant_table = "";

                contestant_table += "<table id='contestants' class='table table-bordered table-striped'>";
                contestant_table += "<thead>";
                contestant_table += "<tr>";
                contestant_table += "<th>Contestant #</th>";
                contestant_table += "<th>Contestant Description</th>";
                contestant_table += "<th>Contestant Name</th>";
                contestant_table += "<th>Score</th>";
                contestant_table += "</tr>";
                contestant_table += "</thead>";
                contestant_table += "<tbody>";


                for(var i = 0; i < contestant.length; i++){
                    contestant_table += "<tr>";
                    contestant_table += "<td>" + contestant[i].contestant_number + "</td>";
                    contestant_table += "<td>" + contestant[i].contestant_description + "</td>";
                    contestant_table += "<td>" + contestant[i].contestant_name + "</td>";

                    var score = 0;

                    $.ajax({
                        url: "./check-contestant-score.php",
                        type: "POST",
                        data: {
                            criteria_id: $("#showed-criteria-id").val(),
                            contestant_id: contestant[i].id
                        },
                        async: false,
                        success: function (data) {
                            var obj = JSON.parse(data);
                
                            if(obj.status == "success"){
                                score = obj.score;
                            }else{
                                score = 0;
                            }
                        }
                    });

                    contestant_table += "<td>";
                    if(score != 0){
                        contestant_table += score;
                    }else{
                        contestant_table += "<form class='form-score'>";
                        contestant_table += "<input type='hidden' name='criteria_id' value='" + $("#showed-criteria-id").val() + "'>";
                        contestant_table += "<input type='hidden' name='contestant_id' value='" + contestant[i].id + "'>";
                        contestant_table += "<input type='number' name='score' class='form-control' placeholder='Enter Score' required>";
                        contestant_table += "</form>";
                    }
                    contestant_table += "</tr>";
                }

                contestant_table += "</tbody>";
                contestant_table += "</table>";
                contestant_table += "<button class='btn btn-primary btn-block' id='btn-save-score'>Save Score</button>";

                $("#contestants").html(contestant_table);
            }
        }
    });
}

$(document).ready(function () {
    GetShowedCriteria();
    GetAllContestants();

    setInterval(function () {
        GetShowedCriteria();
    }, 1000);

    $("#btn-save-score").on("click", function () {
        var forms = $(".form-score");
                
        for (var i = 0; i < forms.length; i++) {
            var form = forms[i];
            var form_data = $(form).serialize();
            $.ajax({
                url: './submit_score.php',
                type: 'POST',
                data: form_data,
                success: function (data) {
                    var obj = JSON.parse(data);
                    
                    if(obj.status == "success"){
                        GetAllContestants();
                    }
                }
            });
        }
    });
});