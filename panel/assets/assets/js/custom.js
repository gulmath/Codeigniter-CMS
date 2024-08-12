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
   

});