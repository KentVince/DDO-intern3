$(document).ready(function () {
    $("#myTable").DataTable();

    $(".modal#ModalEdit2").on("show.bs.modal", function (e) {
        $("ul#specs_group_edit").empty();
        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data("form-info");
        var mineralInfo = $(e.relatedTarget).data("mineral-info");
        bookId = Object.values(bookId);
        $("#kind_mineral2").val(mineralInfo);
        generateMineralSpecs(
            $("select#kind_mineral2").find(":selected").data("mineral-variable")
        );
        // $(e.currentTarget).find('select[name="kind_mineral2"]').val(mineralInfo);
        $("form#updatelForm").attr("action", `/form/${bookId[0]}`);
        //populate the textbox
        console.log(bookId);
        $(e.currentTarget).find('input[name="otp_number2"]').val(bookId[1]);
        $(e.currentTarget)
            .find('input[name="processing_fee2"]')
            .val(bookId[10]);
        $(e.currentTarget).find('input[name="name_permitte2"]').val(bookId[2]);
        $(e.currentTarget).find('input[name="processing_or2"]').val(bookId[11]);
        $(e.currentTarget).find('input[name="municipality2"]').val(bookId[3]);
        $(e.currentTarget).find('input[name="barangay2"]').val(bookId[4]);
        $(e.currentTarget).find('input[name="excise_tax2"]').val(bookId[12]);
        $(e.currentTarget).find('input[name="name_applicant2"]').val(bookId[5]);
        $(e.currentTarget).find('input[name="excise_or2"]').val(bookId[13]);
        $(e.currentTarget).find('input[name="applicant_mail2"]').val(bookId[6]);
        $(e.currentTarget)
            .find('input[name="extraction_fee2"]')
            .val(bookId[14]);

        $(e.currentTarget).find('input[name="extraction_or2"]').val(bookId[15]);
        $(e.currentTarget).find('input[name="tonnage2"]').val(bookId[7]);
        $(e.currentTarget).find('input[name="buyer2"]').val(bookId[16]);
        $(e.currentTarget)
            .find('input[name="estimated_value2"]')
            .val(bookId[8]);
        $(e.currentTarget).find('input[name="buyer_mail2"]').val(bookId[17]);
        $(e.currentTarget).find('input[name="num_vehicle2"]').val(bookId[9]);
    });
    $("body").on("keyup", "#tonnage", function () {
        var tonnage = parseFloat($(this).val());
        var num_vehicle;
        if (tonnage <= 20) {
            num_vehicle = 1;
            $("#num_vehicle").val(num_vehicle);
        } else {
            num_vehicle = Math.ceil(tonnage / 20);
            $("#num_vehicle").val(num_vehicle);
        }
        var total_estimate_value = num_vehicle * 6000;
        $("#estimated_value").val(total_estimate_value);
        var total_extraction_fee = num_vehicle * 6000 * 0.1;
        $("#extraction_fee").val(total_extraction_fee);
    });
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
    //mer code
    function generateMineralSpecs(mineralInfo) {
        for (let i = 0; i < mineralInfo.length; i++) {
            var currentSpec = Object.values(mineralInfo[i]);
            $("#specs_group").append(`<li>${currentSpec[2]}</li>`);
            $("#specs_group_edit").append(`<li>${currentSpec[2]}</li>`);
        }
    }
    $("select#kind_mineral").on("change", function () {
        $("ul#specs_group").empty();

        var mineralInfo = $(this).find(":selected").data("mineral-variable");

        generateMineralSpecs(mineralInfo);
    });
    $("select#kind_mineral2").on("change", function () {
        $("ul#specs_group_edit").empty();

        var mineralInfo = $(this).find(":selected").data("mineral-variable");
        generateMineralSpecs(mineralInfo);
    });
    $("#ModalCreate2").on("show.bs.modal", function (e) {
        $("ul#specs_group").empty();

        // var mineralInfo = $('select#kind_mineral').find(':selected').data('mineral-variable');
        // var mineralInfo = $(e.relatedTarget).data("form-info");
        // generateMineralSpecs(mineralInfo);

        // $(".modal-body1").html("");
    });
    $(".modal#ModalCreate2").on("hidden.bs.modal", function () {
        id = $(this).attr("id");

        $(this).find("form").trigger("reset");
        $("ul#specs_group").empty();

        // $(".modal-body1").html("");
    });
    $(".toggle-alert").click(function () {
        $(".toast").toggle();
    });
    $(".toast").toast("show", {
        animation: true,
        autohide: true,
        delay: 500,
    });
    $(window).scroll(function () {
        $("#form_notif")
            .stop()
            .animate(
                {
                    marginTop: $(window).scrollTop() + "px",
                    marginLeft: $(window).scrollLeft() + "px",
                },
                "slow"
            );
    });
});

function confirmAction(info, status, formId) {
    var td_name = $("#td_name").text();

    if (status == "danger") {
        swal({
            title: `Are you sure you want to delete this ${info}?`,
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: {
                    text: "I changed my mind.",
                    value: false,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: "Yes, I'm sure.",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
            },
        }).then((value) => {
            if (value == true) {
                $(`#${formId}`).submit();
            }
        });
    }
}
