$(document).ready(function () {
    $("#form_table").DataTable();

    $(".modal#ModalEdit2").on("show.bs.modal", function (e) {
        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data("form-info");
        bookId = Object.values(bookId);
        $("form#updatelForm").attr("action", `/form/${bookId[0]}`);
        //populate the textbox
        $(e.currentTarget).find('input[name="otp_number2"]').val(bookId[1]);
        $(e.currentTarget)
            .find('input[name="processing_fee2"]')
            .val(bookId[12]);
        $(e.currentTarget).find('input[name="name_permitte2"]').val(bookId[2]);
        $(e.currentTarget).find('input[name="processing_or2"]').val(bookId[13]);
        $(e.currentTarget).find('input[name="municipality2"]').val(bookId[3]);
        $(e.currentTarget).find('input[name="barangay2"]').val(bookId[4]);
        $(e.currentTarget).find('input[name="excise_tax2"]').val(bookId[14]);
        $(e.currentTarget).find('input[name="name_applicant2"]').val(bookId[5]);
        $(e.currentTarget).find('input[name="excise_or2"]').val(bookId[9]);
        $(e.currentTarget).find('input[name="applicant_mail2"]').val(bookId[6]);
        $(e.currentTarget)
            .find('input[name="extraction_fee2"]')
            .val(bookId[16]);
        $(e.currentTarget).find('input[name="kind_mineral2"]').val(bookId[7]);
        $(e.currentTarget).find('input[name="extraction_or2"]').val(bookId[17]);
        $(e.currentTarget).find('input[name="tonnage2"]').val(bookId[8]);
        $(e.currentTarget).find('input[name="buyer2"]').val(bookId[18]);
        $(e.currentTarget)
            .find('input[name="estimated_value2"]')
            .val(bookId[9]);
        $(e.currentTarget).find('input[name="buyer_mail2"]').val(bookId[19]);
        $(e.currentTarget).find('input[name="num_vehicle2"]').val(bookId[10]);
        $(e.currentTarget).find('input[name="specification2"]').val(bookId[11]);
        alert(bookId);
    });
});
