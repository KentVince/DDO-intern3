
	$(document).ready( function () {
                
		$('#specification_table').DataTable(
		
		);
                $('.toggle-alert').click(function(){
                        $('.toast').toggle();
                      });
                
                  
                    $('.toast').toast('show',{
                        animation: true,
                        autohide: true,
                        delay: 500
                      });
                      $(window).scroll(function(){
                        $("#mineral_notif").stop().animate({"marginTop": ($(window).scrollTop()) + "px", "marginLeft":($(window).scrollLeft()) + "px"}, "slow" );
                      });
               
		
	
    
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
});
function confirmAction(info,status,formId){
        var td_name=$('#td_name').text();
       
        if(status=="danger"){
            swal({
                title: `Are you sure you want to delete this ${info}?`,
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                dangerMode: true,
                buttons:  {   
                    cancel: {
                        text: "I changed my mind.",
                        value: false,
                        visible: true,
                        className: "",
                        closeModal: true
                      },
                    confirm: {
                        text: "Yes, I'm sure.",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true
                      }}
                    
              }).then((value) => {
                  if(value==true){
                    $(`#${formId}`).submit();
                  }
              
              });
    
             
        }
    
    }