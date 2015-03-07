$(document).ready(function(){

//*****************active menu

    var url= window.location.href;
    var href= url.substr(url.lastIndexOf("?"), url.lastIndexOf("&"));
    href=href.split('&');
    $('.main-menu a[href*="'+href[0]+'"]').parent().addClass('active');
    $('.main-menu a[href*="'+href[0]+'"]').parent().append('<span class="current-arrow"></span>');

// *****************hide all validate message

    $('.reset').click(function(){
        $('.formError').validationEngine('hideAll');
        showPreview();
    });

});


// TINY Script
tinymce.init({
            selector: "textarea",
            language : 'fa',
            directionality : 'rtl',
            element_format : "html",
            plugins : 'advlist autolink link image lists charmap print preview code image table directionality nonbreaking fullscreen visualchars visualblocks searchreplace pagebreak paste',
            toolbar: "searchreplace | undo redo | paste copy cut | bold italic underline | styleselect | link image | hr | table | charmap | ltr rtl | nonbreaking pagebreak | visualchars | code preview fullscreen print",
            invalid_elements : "span,&nbsp",
            convert_fonts_to_spans : false,
            nonbreaking_force_tab: true,
            pagebreak_separator: "<!-- my page break -->",
         });

        function initialiseInstance(editor){
            $('#submit').click(function(event){
                if(editor.getContent()==""){
                    $('#detail_tbl').validationEngine('showPrompt', '* لطفا فیلد توضیحات را تکمیل نمایید', 'red', 'topRight');
                }else{
                    $('#detail_tbl').validationEngine('hide');
                }
            });
        }
// END TINY Script

function NewWin(url,name)
{
    window.open(url, name,'status=yes,scrollbars=yes,toolbar=yes,resizable=1,menubar=no,location=no,width=570px,height=500px');
}

function DelMsg(id,msg,link)
{
  if(confirm(msg))
  {
    setTimeout('document.location.href="'+link+id+'"',1 )
  }
}
function GoUrl(url)
{
    setTimeout('document.location.href="'+url+'"',1 )

}
function ShowTab(tabNo,idxOfEndTab){
    for(var i=1;i<=idxOfEndTab;i++)
    {
        document.getElementById("tab_"+i).style.display = 'none';
    }
        document.getElementById("tab_"+tabNo).style.display = 'block';
}
function DisEna(id,act){
    var obj = document.getElementById(id);
    obj.disabled = act;
}

// **********************Image preview**********************************
function showPreview(ele){
    $('form #img').attr({
                        'src': '',
                        'alt': 'Image',
                        'width':'0',
                        'height': '0'
                    });
    $('form #img').css('display','none');
    $('form .upload-file .filename').html('لطفا عکس مورد نظر را انتخاب نمایید');

    var size= Math.round(ele.files[0].size/1024);
    var ext = $('form #pic').val().split('.').pop().toLowerCase();
    var prevsize="1024";
    var name= $('form #pic').val().replace(/C:\\fakepath\\/i, '');

    if(ext=='jpeg' || ext=='jpg' || ext=='png' || ext=='bmp' || ext=='gif'){
        if (size<=prevsize){
           $('form #img').fadeIn().css('display','block').attr({
                'src': ele.value,
                'alt': 'Image',
                'width': '200px',
                'height': '100px'
            }); // for IE
            if (ele.files && ele.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('form #img').fadeIn().attr({
                        'src': e.target.result,
                        'alt': 'Image',
                        'width':'200px',
                        'height': '100px'
                    });
                }
                reader.readAsDataURL(ele.files[0]);
                $('form .upload-file .filename').html(name);
            }
        }else{
            alert("حجم فایل انتخابی "+size+"KB میباشد. حجم فایل باید کمتر از "+prevsize+"KB باشد");
            $('form #pic').val("");
            $('form #img').attr({
                        'src': '',
                        'alt': 'Image',
                        'width':'0',
                        'height': '0'
                    });
            $('form .upload-file .filename').html('لطفا عکس مورد نظر را انتخاب نمایید');
        }
    }else{
        alert("پسوند فایل انتخابی باید یکی از موارد زیر باشد: JPEG , JPG , PNG , BMP , GIF");
        $('form #pic').val("");
        $('form #img').attr({
                        'src': '',
                        'alt': 'Image',
                        'width':'0',
                        'height': '0'
                    });
        $('form .upload-file .filename').html('لطفا عکس مورد نظر را انتخاب نمایید');
    }
}
// **********************files browser****************************
function getImgSize(imgSrc){
    var newImg = new Image();
    newImg.src = imgSrc;
    var height = newImg.height;
    var width = newImg.width;
    p = $(newImg).load(function(){
        return {width: newImg.width, height: newImg.height};
    });
    return (p[0]['height']+" * "+p[0]['width']);
}

$(window).load(function(){
    $("a#filesbrowserbtn").click(function(){
        var findpage = $(this).attr('name');
        $('#filesbrowser').fadeIn(500).load('filebrowser.php?item'+findpage,function(){
            $('#filesbrowser').css('display','block');
            
            $('#exit').click(function(){
               $('#filesbrowser').delay(500).fadeOut(1000);
            });

            //*******************************tabbed Boxes

            $(".cat-tabs-wrap").hide();
            $(".cat-tabs-header ul li:first").addClass("active").show();
            $(".cat-tabs-wrap:first").show(); 
            $(".cat-tabs-header ul li").click(function(){
                $(".cat-tabs-header ul li").removeClass("active");
                $(this).addClass("active");
                $(".cat-tabs-wrap").hide();
                var activeTab = $(this).find("a").attr("href");
                $(activeTab).fadeIn();
                return false;
            });
       
        });
        $('#selectbuttton').click(function(){
            $('#filesbrowser').delay(500).fadeOut(1000);
        });
    });
});