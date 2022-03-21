jQuery(($) => {
    $("body").on("keyup", "#tonnages", function () {
        var tonnage = parseFloat($(this).val());
        var num_vehicle;
        if (tonnage <= 20) {
            num_vehicle = 1;
            $("#num_vehicles").val(num_vehicle);
        } else {
            num_vehicle = Math.ceil(tonnage / 20);
            $("#num_vehicles").val(num_vehicle);
        }
        var total_estimate_value = num_vehicle * 6000;
        $("#estimated_values").val(total_estimate_value);
        var total_extraction_fee = num_vehicle * 6000 * 0.1;
        $("#extraction_fees").val(total_extraction_fee);
    });
});
