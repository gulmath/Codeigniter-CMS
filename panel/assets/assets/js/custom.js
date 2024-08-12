$(document).ready(function(){
    $(".remove-btn").click(function(e){
      //  e.preventDefault();  //href ile belirtilen yere gitmesini engeller...
       var $data_url=$(this).data("url");
       //alert($data_url);

        Swal.fire({
            title: "Emin misiniz?",
            text: "Bu işlemi geri alamayacaksınız!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet, Sil!",
            cancelButtonText: "Hayır"
          }).then(function(result)  {
            if (result.isConfirmed) {
              window.location.href=$data_url;
             
            }
          });


    });
   $(".isActive").change(function(e){
     // alert($(this).prop("checked"));
     var $data=$(this).prop("checked");
     var $data_url=$(this).data("url");

     if (typeof $data !== undefined && typeof $data_url !== undefined){
        $.post($data_url,{data:$data},function(response){
         //   alert(response);
        });
     }

   });

});