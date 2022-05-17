$(document).ready(function(){

    $("#collapse").on("click", function() {

        $("#sidebar").toggleClass("active");
        $(".fa-align-left").toggleClass("fa-align-right");

    })
})


// $(document).ready1(function(){
//     $("#button").click(function(){
//         if($("#address".val()=="")){
//             alert("尚未填寫地址!");
//             eval("document.form1['address'].focus()");
//         }
//         else if($("#phone".val()=="")){
//             alert("尚未填寫地址!");
//             eval("document.form1['phone'].focus()");
//         }
//         else if($("#identity".val()=="")){
//             alert("尚未填寫地址!");
//             eval("document.form1['identity'].focus()");
//         }
//         else{
//             document.form1.submit();
//         }
//     })
// })



