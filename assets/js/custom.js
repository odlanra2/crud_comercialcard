var	modal	=	$('<div class="modal fade "  tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content modal-iframe"><div class="modal-header"></div><div class="modal-body"></div><div class="modal-footer">Sistema creado por Arnaldo Lameda</div></div></div></div>');
var url = window.location;
//new WOW().init();
function lightbox(){
	btns	=	$(".lightbox");
	btns.each(function(index,v){		
		var btn =	$(v);
		btn.click(function(event){
      make_modal_ajax(btn);
      return false;	
    })
	});	
}
function make_modal_ajax(obj){
	var size		=	obj.data("size");
	var height		=	obj.data("height");if(!height){height='auto';}
	$modal			=	modal.clone();	
	var contenido  	=	$modal.find(".modal-dialog").find(".modal-content");
  $modal.addClass("pgrw_modal_confirm_ajax").attr("aria-labelledby","modalLabel_confirm_ajax").find(".modal-dialog").addClass(size);
  if(size == "modal-sm"){
    $modal.addClass('modal_margin_top');
  }
   contenido.find(".modal-header").html("<h5>"+'<i class=""></i> ' +obj.attr("title")+"</h5><button type='button' class='btn btn-alobranding cancelar' data-dismiss='modal'><b>x</b></button>");
		
    $("body").append($modal);
    $modal.find(".modal-body").html('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>');
    if(obj.data("type")=='iframe'){
      $iframe		=	$('<iframe   src="'+obj.attr("href")+'" frameborder="0" marginwidth="0" marginheight="0" width="100%" height:"100px" /><div class="col-md-12 text-center"><div id="message_iframe"></div></div>');
      $modal.find(".modal-body").height(height).html($iframe);
    }
    $modal.modal({ keyboard: true});	
  
  if(obj.data("event")=='reload'){
    $modal.on('hidden.bs.modal', function (e) {
    url.reload();
		
  })
			

  }
}

$(document).ready(function(){
    lightbox();


   $('.example').DataTable({
     "responsive": true,
     "pageLength": 10,
     "language": {
         "url": './assets/js/Spanish.json'
    },
     dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf'
        ]
  });


   $('.guardar').click(function(e){
       e.preventDefault();

        $forms=$("form");
       //console.log(window.location.href);
       if(inpustRequires($forms)){
	         
	         $('.pre-load').addClass('preload-active');
	         $.ajax({
		       type: 'POST',
		       url:'./productos_handle.php',
		       data: $('form').serialize(),
	           success: function(resultado) {
	           if(resultado){
	                 $('.pre-load').removeClass('preload-active');    
	                 parent.alert('Datos almacenados con exito')

	           	     parent.location.reload();
	           }
	         
	            },error:function(resultado){
	              $(".result").html('errror al enviar el correo');
	              setTimeout(function() {$('.result').fadeOut('fast');}, 3000);

	            }
	          });//fin ajax

       }
      
   });


   $('.aceptar').click(function(e){
    e.preventDefault();

     $forms=$("form");
    //console.log(window.location.href);
    if(inpustRequires($forms)){
        
        $('.pre-load').addClass('preload-active');
        $.ajax({
        type: 'POST',
        url:'./productos_handle.php',
        data: $('form').serialize(),
          success: function(resultado) {
          if(resultado){
             // console.log(JSON.parse(resultado))
              $('.resultados').html(JSON.parse(resultado));
          }
        
           },error:function(resultado){
             $(".result").html('errror al enviar el correo');
             setTimeout(function() {$('.result').fadeOut('fast');}, 3000);

           }
         });//fin ajax

    }
   
});


   $('.delete').click(function(e){
   	    e.preventDefault();

   	    var id_perfil =$(this).attr( 'href' );
        var opcion = confirm("Esta seguro de eliminar este producto")
        if(opcion){
          $('.pre-load').addClass('preload-active');
         $.get('./'+id_perfil, function( data ) {
               $('.pre-load').removeClass('preload-active');    
               location.reload();
         }, "json");
        }
   	  
   })


   $('.vender').click(function(e){
          e.preventDefault();
          
          var id_perfil =$(this).attr( 'href' );
          
          $('.pre-load').addClass('preload-active');
          $.get('./'+id_perfil, function( data ) {
               $('.pre-load').removeClass('preload-active'); 
               //console.log(data);   
               location.reload();
         }, "json");


   });

//funcion para validar los campos
function inpustRequires(form) {
  var return_value	=	true;
  $('.error').fadeIn();
  $('.error').html('');
   var expresion_correo = /^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i;
   form.find('[require]').each(function(index,v){

    if($(v).val()==''){
      $(v).focus().after('<span style="color:red" class="error">los campos no deben estar vacios</span>');
      setTimeout(function() {$('.error').fadeOut('fast');}, 3000);  
       if ($("#accordion").length>0){
         alert("El campo" + ' ' +$(v).eq(0).attr( 'placeholder' ) + ' ' + 'no puede estar vacio');
      }
      return_value  =  false;  
      
      return false;
    }else{
      return_value  =  true;
      
    }
  });

  if (return_value){

    form.find("input[type='email']").each(function(index,v){
      if(!expresion_correo.test($(v).val())){
        if($(v).val()!=''){
            $(v).focus().after('<span style="color:red" class="error">Email no valido</span>');
             setTimeout(function() {$('.error').fadeOut('fast');}, 3000);  
             if ($("#accordion").length>0){
                   alert("El campo" + ' ' +$(v)[0].placeholder + ' ' + 'email no valido');
                   return_value  =  false;
                   return false;
            }

        }  
        return_value  =  false;
        //return false;
      }else{
        return_value  =  true;
        
      }
    });
  }
  if (return_value){
      form.find("input[name='clave']").each(function(index,v){
        
        if($(v).val() === $('.repetir_clave').val()){
              return_value  =  true;
        } else {
             $(v).focus().after('<span style="color:red" class="error">Clave diferente a repetir contraseña</span>');
              setTimeout(function() {$('.error').fadeOut('fast');}, 3000);  
               if ($("#accordion").length>0){
                   alert("Clave diferente a repetir contraseña");
               }
              return_value  =  false;
        }
      
      
      });

   }

   return return_value;
} //fin  inpustRequires



});


