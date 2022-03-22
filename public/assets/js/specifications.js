
	$(document).ready( function () {
		$('#specification_table').DataTable(
		
		);
		
	} );
    
	$('.modal#updateModal').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var bookId = $(e.relatedTarget).data('specs-info');
        var mineralInfo = $(e.relatedTarget).data('mineral-info');
        bookId=Object.values(bookId);
        alert(bookId);
        $('form#updateMineralForm').attr('action', `/specification/${bookId[0]}`);
        //populate the textbox
        $(e.currentTarget).find('input[name="specification_name2"]').val(bookId[2]);
        $(e.currentTarget).find('small[name="spec_input"]').text(mineralInfo);
        
        });