$(document).ready(function () {
    $("#form_table").DataTable();
    $(".modal#ModalEdit2").on("hidden.bs.modal", function (e) {
        $("#updatelForm").trigger("reset");
    });
    $(".modal#ModalEdit2").on("show.bs.modal", function (e) {
        $("select#specs_group_edit").empty();
        //bookId = formInfo
        var bookId = $(e.relatedTarget).data("form-info");
        bookId = Object.values(bookId);
        $("form#updatelForm").attr("action", `/form/${bookId[0]}`);
        //get data-id attribute of the clicked element
        var mineralInfo = $(e.relatedTarget).data("mineral-info");
        //alert(typeof mineralInfo);
        if (typeof mineralInfo !== "undefined") {
            //the array is defined and has at least one element
            var specs_info = $(e.relatedTarget).data("specs-info");
            console.log(bookId);
            //alert("mineral info found"+mineralInfo);
            $("#kind_mineral2").val(mineralInfo);
            //$("#specs_group_edit").val(specs_info);
            generateMineralSpecs(
                $("select#kind_mineral2")
                    .find(":selected")
                    .data("mineral-variable")
            );
            $("select#specs_group_edit").val(specs_info).change();
            //alert(bookId);
            //provinces muni brgy
            //$(this).find('select[name="province2"]').val(bookId[3]);
            //$(this).find('select[name="municipality2"]').val(bookId[4]);
            //$(this).find('select[name="municipality2"]').val(bookId[4]);
            //$("select#province2").val(bookId[3]);
            //console.log(bookId[3]);
            //$("select#municipals2").val(bookId[4]);
            //alert(typeof bookId[4]);
            //$("select#brgy2").val(bookId[5]);
            //console.log(bookId[5]);
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
            //alert("mineral not found"+mineralInfo);
            $("#kind_mineral2").val("");
        }
        $("#province2").val(bookId[3]);
        // dispaly municipal on (VIEW)
        var op = " ";
        $.ajax({
            type: "get",
            url: "/findMunicipality",
            data: { id: bookId[3] },
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                console.log(data);
                console.log("success");
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
            },
        });
        // dispaly baranggay on (VIEW)
        var brgy = " ";
        $.ajax({
            type: "get",
            url: "/findBarangay",
            data: { id: bookId[4] },
            dataType: "json",
            success: function (data) {
                console.log("barangayss" + data);
                console.log("success");
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
        //$(e.currentTarget).find('input[name="barangay2"]').val(bookId[5]).trigger('change');
        $(e.currentTarget).find('input[name="name_applicant2"]').val(bookId[6]);
        $(e.currentTarget).find('input[name="applicant_mail2"]').val(bookId[7]);
        $(e.currentTarget).find('input[name="buyer2"]').val(bookId[17]);
        $(e.currentTarget).find('input[name="buyer_mail2"]').val(bookId[18]);
    });

    //auto compute on (ADD)
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

    // auto compute on (EDIT)
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
            // $("#specs_group").append(`<li>${currentSpec[2]}</li>`);
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
        // $("ul#specs_group").empty();
        // var mineralInfo = $('select#kind_mineral').find(':selected').data('mineral-variable');
        // var mineralInfo = $(e.relatedTarget).data("form-info");
        // generateMineralSpecs(mineralInfo);
        // $(".modal-body1").html("");
    });
    $(".modal#ModalCreate2").on("hidden.bs.modal", function () {
        id = $(this).attr("id");
        $(this).find("form").trigger("reset");
        $("select#specs_group").empty();
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
                console.log(data);
                console.log("success");
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
                console.log(data);
                console.log("success");
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
                console.log(data);
                console.log("success");
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
        console.log(brgy_id);
        var selects = $(this).parent();
        var brgy = " ";
        $.ajax({
            type: "get",
            url: "/findBarangay",
            data: { id: brgy_id },
            dataType: "json",
            success: function (data) {
                console.log("barangayss" + data);
                console.log("success");
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
