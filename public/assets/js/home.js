$(document).ready(function() {


$("#change_password_btn").on("click",function() {
 

$("#reset_password_div").fadeIn("slow").removeClass('hidden');
$("#reset_password_div").attr("hidden",false);
$("#password_gui_form").attr("hidden",true);
$('#change_password_btn').prop('hidden', true);
$('#reset_password_btn').prop('hidden', false);
});
});

function confirmAction(info,status,formId){
  
       if(status=="danger"){
           swal({
               title: `Are you sure you want to delete this ${info}?`,
               text: "Once deleted, your account will be deleted in the database and will be irretrievable.",
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

