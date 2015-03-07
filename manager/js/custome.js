$(document).ready(function(){

//*****************active menu
	var href=window.location.href;
	var first=href.lastIndexOf("/")+1;
	var last=href.lastIndexOf(".php")+3;
	var lenght=last-first;
	  if(href.indexOf("regcldetail")>0){
      jQuery('ul.mainNav li.class').addClass('active');
    }
    if(href.indexOf("regconfdetail")>0){
      jQuery('ul.mainNav li.conf').addClass('active');
    } 
    if(href.indexOf("regfaqdetail")>0){
      jQuery('ul.mainNav li a.faq').addClass('active');
    } 
    href=href.substr(first,lenght+1);
    $("ul.mainNav li a").each(function(){
    	var linkhref=$(this).attr("href");
    	var linklast=linkhref.lastIndexOf(".php")+3;
    	linkhref=linkhref.substr(0,linklast+1);
		if(linkhref == href){
		  	$(this).addClass("active");
			$(this).parents("ul.mainNav > li").addClass("active");
		}
     });

//*****************textarea animate

    $(document).ready(function(){
	    $('textarea.animatedTextArea').autosize();    
	});


//*****************editor text


  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace( 'edttext',{
      language: 'fa'
  } );

});