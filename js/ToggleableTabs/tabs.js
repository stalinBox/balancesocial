$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = $(e.target).attr("href") // activated tab
	var title
	switch (target) {
	    case "#menu1":
	        title = "<span class='glyphicon glyphicon-th-list'></span> Datos Anuales Sección A";
	        break;
	    case "#menu2":
	        title = "<span class='glyphicon glyphicon-th-list'></span> Datos Anuales Sección B";
	        break;
	    case "#menu3":
	        title = "<span class='glyphicon glyphicon-th-list'></span> Datos Anuales Sección C";
	        break;
	    case "#menu4":
	        title = "<span class='glyphicon glyphicon-th-list'></span> Datos Anuales Sección D";
	        break;
	    case "#menu5":
	        title = "<span class='glyphicon glyphicon-th-list'></span> Datos Anuales Sección E";
	        break;
	    case "#menu6":
	        title = "<span class='glyphicon glyphicon-th-list'></span> Datos Anuales Sección F";
	        break;
	    default:
	    title = "<span class='glyphicon glyphicon-th-list'></span> Datos Anuales Sección A";
	}
  $("#idTitulo").html(title);
});

var name = $("#idFrmFile #idBaseData").val();
    switch (name) {
      case "menu1":
            $('[href="#menu2"]').closest('li').hide();
            $('[href="#menu3"]').closest('li').hide();
            $('[href="#menu4"]').closest('li').hide();
            $('[href="#menu5"]').closest('li').hide();
            $('[href="#menu6"]').closest('li').hide();
            $('[href="#menu1"]').click();
          break;
      case "menu2":
            $('[href="#menu1"]').closest('li').hide();
            $('[href="#menu3"]').closest('li').hide();
            $('[href="#menu4"]').closest('li').hide();
            $('[href="#menu5"]').closest('li').hide();
            $('[href="#menu6"]').closest('li').hide();
            $('[href="#menu2"]').click();
          break;
      case "menu3":
            $('[href="#menu1"]').closest('li').hide();
            $('[href="#menu2"]').closest('li').hide();
            $('[href="#menu4"]').closest('li').hide();
            $('[href="#menu5"]').closest('li').hide();
            $('[href="#menu6"]').closest('li').hide();
            $('[href="#menu3"]').click();
          break;
      case "menu4":
            $('[href="#menu1"]').closest('li').hide();
            $('[href="#menu2"]').closest('li').hide();
            $('[href="#menu3"]').closest('li').hide();
            $('[href="#menu5"]').closest('li').hide();
            $('[href="#menu6"]').closest('li').hide();
            $('[href="#menu4"]').click();
          break;
      case "menu5":
            $('[href="#menu1"]').closest('li').hide();
            $('[href="#menu2"]').closest('li').hide();
            $('[href="#menu3"]').closest('li').hide();
            $('[href="#menu4"]').closest('li').hide();
            $('[href="#menu6"]').closest('li').hide();
            $('[href="#menu5"]').click();
          break;
      case "menu6":
            $('[href="#menu1"]').closest('li').hide();
            $('[href="#menu2"]').closest('li').hide();
            $('[href="#menu3"]').closest('li').hide();
            $('[href="#menu4"]').closest('li').hide();
            $('[href="#menu5"]').closest('li').hide();
            $('[href="#menu6"]').click();
          break;
  } 

  $('[href="#menu1"]').click(function(){
    $("[href='#menu1']").toggleClass("show");  
  });

  $('[href="#menu2"]').click(function(){
    $("[href='#menu2']").toggleClass("show");  
  });

  $('[href="#menu3"]').click(function(){
    $("[href='#menu3']").toggleClass("show");  
  });

  $('[href="#menu4"]').click(function(){
    $("[href='#menu4']").toggleClass("show");  
  });

  $('[href="#menu5"]').click(function(){
    $("[href='#menu5']").toggleClass("show");  
  });

  $('[href="#menu6"]').click(function(){
    $("[href='#menu6']").toggleClass("show");  
  });