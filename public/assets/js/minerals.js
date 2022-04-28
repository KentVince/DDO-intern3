$(document).ready(function () {
    $(".toggle-alert").click(function () {
        $(".toast").toggle();
    });

    $("#minerals_table").DataTable();
    $(".toast").toast("show", {
        animation: true,
        autohide: true,
        delay: 500,
    });
    $(window).scroll(function () {
        $("#mineral_notif")
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
// check if error class is triggered.

if ($("span.invalid-feedback strong#name_of_minerals_err").text() != "") {
    $("#createminerals_modal_btn").trigger("click");
} else {
    console.log($("span.invalid-feedback strong").text());
}
//clear modal error class if detected that it has been closed.
$(".modal#exampleModal").on("hidden.bs.modal", function (e) {
    $("#name_of_minerals").removeClass("is-invalid");
});
//update modal
if ($("span.invalid-feedback strong#name_of_minerals_err2").text() != "") {
    $("#updateminerals_modal_btn").trigger("click");
} else {
    console.log($("span.invalid-feedback strong").text());
}
//clear modal error class if detected that it has been closed.
$(".modal#updateModal").on("hidden.bs.modal", function (e) {
    $("#name_of_minerals2").removeClass("is-invalid");
});

$(".modal#updateModal").on("show.bs.modal", function (e) {
    //get data-id attribute of the clicked element
    var bookId = $(e.relatedTarget).data("mineral-info");
    bookId = Object.values(bookId);
    $("form#updateMineralForm").attr("action", `/minerals/${bookId[0]}`);
    //populate the textbox
    $(e.currentTarget).find('input[name="name_of_minerals2"]').val(bookId[1]);
});

function confirmAction(info, status, formId) {
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
                $(`#${formId}`).submit();
            }
        });
    }
}
// function getCorrectDate(unixTimestamp){
//     converted_dt=unixTimestamp.split(/[T.]/);
// return converted_dt[0]+" "+converted_dt[1];
//     }
// 	var doAjaxSearch = function(searchCat,searchInput) {
// 		if(searchInput==""){
// 			searchInput="blank_value";
// 		}
// 		//alert(searchCat+"CATEGORY")
// 		//("FULL LINK"+'/minerals/search/'+searchCat+'/'+searchInput);
//     $.ajax({
//        url: '/minerals/search/'+searchCat+'/'+searchInput, // .asp?
//        type: 'GET',
//        data: { 'searchCat': searchCat , 'searchInput':searchInput},
//        success: function( response ) {
// 		   console.log("Response"+response);

// 		//    console.log("first value"+Object.values(response[0]));
// 		   var update_table="";
// 		$('#table_results').text(response);
// 		response=Object.values(response);
// 		console.log("hahaha"+response);
// 		Object.entries(response).forEach(([key, val]) => update_table+="<tr><td>"+val['id']+"</td>"+"<td>"+val['name_of_minerals']+"</td>"+"<td>"+getCorrectDate(val['created_at'])+"</td>"+"<td>"+getCorrectDate(val['updated_at'])+"</td></tr>") ;

// 		if(update_table==""){
// 			update_table='<tr><td colspan="12">No Mineral record available.&nbsp; <a href="/minerals/create">Create one here.</a></td></tr>';
// 		}
// 		//alert(update_table);
// 		$('#minerals_table > tbody').html(update_table);
// 		var rowCount = $('#minerals_table tr').length;
// if(rowCount<10){
// 	$("#pagination_btns").hide().css("visibility", "hidden");
// }else{
// 	$("#pagination_btns").show().css("visibility", "visible");
// }
// 	// 	$('#minerals_table').DataTable({
//     //     "ordering": true,
//     //     "data": response,
//     //     "searching": false,
//     //     "columns": [
//     //       {'data':'id'},
//     //       {'data':'name_of_minerals'},
//     //       {'data':'created_at'},
//     //       {'data':'updated_at'}
//     //     ]

//     // });

// // 		for (let key in response) {
// //   alert(response[key]['name_of_minerals']);
// // }

//        },
// 	   error: function (xhr, ajaxOptions, thrownError) {
//     alert(xhr.status);
//     alert(thrownError);
//   }
//     });
// };

// // $('#hide_pagination').click(function() {
// // 	alert("hello");

// // });
// // $('#show_pagination').click(function() {
// // 	alert("hi");

// // });

// // send an href containing the search query.

// // function getSearchQuery(){
// // 	let searchCat = $('select#search_cat').val();
// // 	let searchInput=$('#searchInput').val();
// // alert("Yo"+searchCat+searchInput);
// // $("a#search_btn").attr("href", `/minerals/search/cat/${searchCat}/value/${searchInput}`)

// // }

// // another version of event handling searchQuery
// // $('form#searchForm').attr('action', 'myNewActionTarget.html');
// function getSearchQuery(){
// 	let searchCat = $('select#search_cat').val();
// 	let searchInput=$('#searchInput').val();
// 	// $("a#search_btn_link").attr("href", `/minerals/search/cat/${searchCat}/value/${searchInput}`);
// 	window.location.href =  `/minerals/search/cat/${searchCat}/value/${searchInput}`;

// }
// // $('#searchInput').on("keyup", function(e){
// // 	//do some stuff

// // 	if(e.which==13){
// // 		getSearchQuery();
// // 	}
// //  });

// // 	$('#search_btn').click(function() {
// //     let searchCat = $('select#search_cat').val();
// // 	let searchInput=$('#searchInput').val();
// //     //alert(searchCat+searchInput);
// // 	doAjaxSearch(searchCat,searchInput)

// // });
