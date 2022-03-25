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
// $(".modal.updateModal").on("hidden.bs.modal", function(){
//     id = $(this).attr('id')
//       alert("modal closed");
//       alert(id);
//       $(this).find('form').trigger('reset');
//     // $(".modal-body1").html("");
// });

// $('select#kind_mineral').on('change', function() {
//     $('ul#specs_group').empty();
//   alert( this.value );

//   var mineralInfo = $(this).find(':selected').data('mineral-variable');

//   for(let i=0;i<mineralInfo.length; i++){
//       var currentSpec=Object.values(mineralInfo[i]);

//      $(' #specs_group').append(`<li class="list-group-item">${currentSpec[2]}</li>`);

//   }



// });
