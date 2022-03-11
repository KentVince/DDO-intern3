$(document).ready(function () {
    $("#tonnage").keyup(function () {
        var tonnage = $("#tonnage").val();
        var num_vehicle;
        if (tonnage <= 20) {
            num_vehicle = 1;
            $("#num_vehicle").val(num_vehicle);
        } else {
            num_vehicle = tonnage / 20;
            $("#num_vehicle").val(num_vehicle);
        }

        var total_estimate_value = num_vehicle * 6000;
        $("#estimated_value").val(total_estimate_value);

        var total_extraction_fee = num_vehicle * 6000 * 0.1;
        $("#extraction_fee").val(total_extraction_fee);
    });
});
