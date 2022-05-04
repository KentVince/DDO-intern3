$(document).ready(function () {
    $("#myTable").DataTable();
    $(".modal#ModalEdit2").on("hidden.bs.modal", function (e) {
        $("#updatelForm").trigger("reset");
    });
    $(".modal#ModalEdit2").on("show.bs.modal", function (e) {
        $("select#specs_group_edit").empty();
        var bookId = $(e.relatedTarget).data("form-info");
        bookId = Object.values(bookId);
        $("form#updatelForm").attr("action", `/form/${bookId[0]}`);

        var mineralInfo = $(e.relatedTarget).data("mineral-info");

        if (typeof mineralInfo !== "undefined") {
            var specs_info = $(e.relatedTarget).data("specs-info");

            console.log(bookId);

            $("#kind_mineral2").val(mineralInfo);

            generateMineralSpecs(
                $("select#kind_mineral2")
                    .find(":selected")
                    .data("mineral-variable")
            );
            $("select#specs_group_edit").val(specs_info).change();

            $(e.currentTarget)
                .find('input[name="estimated_value2"]')
                .val(bookId[9]);

            $(e.currentTarget)
                .find('input[name="processing_fee2"]')
                .val(bookId[11]);
            $(e.currentTarget)
                .find('input[name="processing_or2"]')
                .val(bookId[12]);
            $(e.currentTarget)
                .find('input[name="excise_tax2"]')
                .val(bookId[13]);
            $(e.currentTarget).find('input[name="excise_or2"]').val(bookId[14]);
            $(e.currentTarget)
                .find('input[name="extraction_fee2"]')
                .val(bookId[15]);
            $(e.currentTarget)
                .find('input[name="extraction_or2"]')
                .val(bookId[16]);
            $(e.currentTarget).find('input[name="tonnage2"]').val(bookId[8]);
            $(e.currentTarget)
                .find('input[name="num_vehicle2"]')
                .val(bookId[10]);
            // $(e.currentTarget)
            // .find('input[name="processing_fee2"]')
            // .val(bookId[10]);
        } else {
            //      alert("mineral not found"+mineralInfo);
            $("#kind_mineral2").val("");
        }
        $("#province2").val(bookId[3]);
        // GET MUNICIPAL
        var op = " ";

        $.ajax({
            type: "get",
            url: "/findMunicipality",
            data: { id: bookId[3] },
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].citymunCode == bookId[4]) {
                        op +=
                            '<option selected value="' +
                            data[i].citymunCode +
                            '">' +
                            data[i].citymunDesc +
                            "</option>";
                    } else {
                        op +=
                            '<option value="' +
                            data[i].citymunCode +
                            '">' +
                            data[i].citymunDesc +
                            "</option>";
                    }
                }

                $("#municipals2").html(" ");
                $("#municipals2").append(op);
                $("#municipals2 option").each(function () {
                    $(this).text($(this).text().toUpperCase());
                });
            },
        });
        // get baranggay
        var brgy = " ";
        $.ajax({
            type: "get",
            url: "/findBarangay",
            data: { id: bookId[4] },
            dataType: "json",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].brgyCode == bookId[5]) {
                        brgy +=
                            '<option selected value="' +
                            data[i].brgyCode +
                            '">' +
                            data[i].brgyDesc +
                            "</option>";
                    } else {
                        brgy +=
                            '<option value="' +
                            data[i].brgyCode +
                            '">' +
                            data[i].brgyDesc +
                            "</option>";
                    }
                }

                $("#brgy2").html(" ");
                $("#brgy2").append(brgy);
            },
        });

        $(e.currentTarget).find('input[name="otp_number2"]').val(bookId[1]);

        $(e.currentTarget).find('input[name="name_permitte2"]').val(bookId[2]);
        //$(e.currentTarget).find('input[name="province2"]').val(bookId[3]);
        //$(e.currentTarget).find('input[name="municipality2"]').val(bookId[4]);
        // $(e.currentTarget).find('input[name="barangay2"]').val(bookId[5]).trigger('change');
        $(e.currentTarget).find('input[name="name_applicant2"]').val(bookId[6]);
        $(e.currentTarget).find('input[name="applicant_mail2"]').val(bookId[7]);

        $(e.currentTarget).find('input[name="buyer2"]').val(bookId[17]);
        $(e.currentTarget).find('input[name="buyer_mail2"]').val(bookId[18]);
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
            $("select#specs_group").append(
                $("<option>", {
                    value: currentSpec[0],
                    text: currentSpec[2],
                })
            );

            $("select#specs_group_edit").append(
                $("<option>", {
                    value: currentSpec[0],
                    text: currentSpec[2],
                })
            );
        }
    }
    $("select#kind_mineral").on("change", function () {
        $("select#specs_group").empty();

        var mineralInfo = $(this).find(":selected").data("mineral-variable");

        generateMineralSpecs(mineralInfo);
    });
    $("select#kind_mineral2").on("change", function () {
        $("select#specs_group_edit").empty();

        var mineralInfo = $(this).find(":selected").data("mineral-variable");
        generateMineralSpecs(mineralInfo);
    });
    $("#ModalCreate2").on("show.bs.modal", function (e) {
        $("select#specs_group").empty();
        $.ajax({
            url: "/getCurrentOTP",
            type: "GET",

            success: function (res) {
                console.log(res);
                $("#current_otp_number").val(res);
            },
        });
    });

    $(".modal#ModalCreate2").on("hidden.bs.modal", function () {
        id = $(this).attr("id");

        $(this).find("form").trigger("reset");
        $("select#specs_group").empty();
    });
    $(".toggle-alert").click(function () {
        $(".toast").toggle();
    });
    var timeout = setTimeout($(".toast").toast("show", {}), 5000);
    clearTimeout(timeout);
    // $(".toast").toast("show", {
    //     animation: true,
    //     autohide: true,
    //     delay: 100,
    // });

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

    // get municipal based on selected province (ADD)
    $(document).on("change", ".provincesList", function () {
        var prov_id = $(this).val();

        var select = $(this).parent();

        var op = " ";

        $.ajax({
            type: "get",
            url: "/findMunicipality",
            data: { id: prov_id },
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                op +=
                    '<option value="0" selected disabled>Select Municipality</option>';
                for (var i = 0; i < data.length; i++) {
                    op +=
                        '<option value="' +
                        data[i].citymunCode +
                        '">' +
                        data[i].citymunDesc +
                        "</option>";
                }
                $("#municipals").html(" ");
                $("#municipals").append(op);
            },
        });
    });

    // get brgy based on selected municipality (ADD)
    $(document).on("change", ".municipalList", function () {
        var brgy_id = $(this).val();

        var selects = $(this).parent();

        var brgy = " ";
        $.ajax({
            type: "get",
            url: "/findBarangay",
            data: { id: brgy_id },
            dataType: "json",
            success: function (data) {
                brgy += '<option value="0" disabled>Select Brgy</option>';
                for (var i = 0; i < data.length; i++) {
                    brgy +=
                        '<option value="' +
                        data[i].brgyCode +
                        '">' +
                        data[i].brgyDesc +
                        "</option>";
                }
                $("#brgy").html(" ");
                $("#brgy").append(brgy);
            },
        });
    });

    //get municipal based on selected province (Edit)
    $(document).on("change", ".provincesList2", function () {
        var prov_id = $(this).val();

        var select = $(this).parent();

        var op = " ";

        $.ajax({
            type: "get",
            url: "/findMunicipality",
            data: { id: prov_id },
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    op +=
                        '<option value="' +
                        data[i].citymunCode +
                        '">' +
                        data[i].citymunDesc +
                        "</option>";
                }
                $("#municipals2").html(" ");
                $("#municipals2").append(op);
            },
        });
    });

    // get brgy based on selected municipality (Edit)
    $(document).on("change", ".municipalList2", function () {
        var brgy_id = $(this).val();

        var selects = $(this).parent();

        var brgy = " ";
        $.ajax({
            type: "get",
            url: "/findBarangay",
            data: { id: brgy_id },
            dataType: "json",
            success: function (data) {
                brgy += '<option value="0" disabled>Select Brgy</option>';
                for (var i = 0; i < data.length; i++) {
                    brgy +=
                        '<option value="' +
                        data[i].brgyCode +
                        '">' +
                        data[i].brgyDesc +
                        "</option>";
                }

                $("#brgy2").html(" ");
                $("#brgy2").append(brgy);
            },
        });
    });
});

function confirmAction(info, status, formId, formValue) {
    var td_name = $("#td_name").text();

    if (status == "danger") {
        swal({
            title: `Are you sure you want to delete this ${info}?`,
            text: "Once deleted, its connected specifications will also be deleted.",
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
                $(`#${formId}`).attr("action", "/form/" + formValue);
                $(`#${formId}`).submit();
            }
        });
    }
}

//upper case all details in (Add)
$(window).on("keyup", function () {
    var name_permitte = $("#name_permitte").val();
    var uppercase_name_permitte = name_permitte.toUpperCase();
    $("#name_permitte").val(uppercase_name_permitte);

    var name_applicant = $("#name_applicant").val();
    var uppercase_name_applicant = name_applicant.toUpperCase();
    $("#name_applicant").val(uppercase_name_applicant);

    var applicant_mail = $("#applicant_mail").val();
    var uppercase_applicant_mail = applicant_mail.toUpperCase();
    $("#applicant_mail").val(uppercase_applicant_mail);

    var buyer = $("#buyer").val();
    var uppercase_buyer = buyer.toUpperCase();
    $("#buyer").val(uppercase_buyer);

    var buyer_mail = $("#buyer_mail").val();
    var uppercase_buyer_mail = buyer_mail.toUpperCase();
    $("#buyer_mail").val(uppercase_buyer_mail);
});

$(window).on("change", function () {
    $("#kind_mineral option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });

    $("#specs_group option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });
});

$(window).on("change", function () {
    $("#province_id option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });
    $("#municipals option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });
    $("#brgy option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });
});

//upper case all input in (Edit)

$(window).on("keyup", function () {
    var name_permitte2 = $("#name_permitte2").val();
    var uppercase_name_permitte2 = name_permitte2.toUpperCase();
    $("#name_permitte2").val(uppercase_name_permitte2);

    var name_applicant2 = $("#name_applicant2").val();
    var uppercase_name_applicant2 = name_applicant2.toUpperCase();
    $("#name_applicant2").val(uppercase_name_applicant2);

    var applicant_mail2 = $("#applicant_mail2").val();
    var uppercase_applicant_mail2 = applicant_mail2.toUpperCase();
    $("#applicant_mail2").val(uppercase_applicant_mail2);

    var buyer2 = $("#buyer2").val();
    var uppercase_buyer2 = buyer2.toUpperCase();
    $("#buyer2").val(uppercase_buyer2);

    var buyer_mail2 = $("#buyer_mail2").val();
    var uppercase_buyer_mail2 = buyer_mail2.toUpperCase();
    $("#buyer_mail2").val(uppercase_buyer_mail2);
});

$(window).on("click", function () {
    $("#kind_mineral2 option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });

    $("#specs_group_edit option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });
});

$(window).on("click", function () {
    $("#province2 option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });
    $("#brgy2 option").each(function () {
        $(this).text($(this).text().toUpperCase());
    });
});
