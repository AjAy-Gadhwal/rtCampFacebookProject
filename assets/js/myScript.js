$(document).ready(function(){
       
    var container = $('.container').offset().top;
    var headerProfile = true;
    
    $(window).scroll(function() { //when window is scrolled
        console.log($(".profileImageLeft").css("left"));
        if(container > (container - $(window).scrollTop()))
        {
            if(headerProfile) {
                $(".profile > .profileImage").css({"left":"0vw"}).find("img");
                $(".profile > .profileName").css({"padding":".625rem 10rem"});
                $(".header").css({"background-color":"rgba(0, 0, 0, 0.7)"});
                $(".header > .menu > ul > li").css({"background-color":"rgba(0, 0, 0, 0.7)"});
                setTimeout(function(){ 
                    $(".profile > .profileImage").css({"top":"0vw"}).find("img").css({"width": $(".profileImageLeft").css("width"),"height": $(".profileImageLeft").css("width")});
                }, 1000); 
                headerProfile = false;
            }
        } else {
            if(!headerProfile) {
                $(".profile > .profileImage").css({"top":"15vh"}).find("img").css({"width":"14em","height":"14em"});            
                $(".profile > .profileName").css({"padding":".625rem 0rem"});
                $(".header").css({"background-color":"rgba(0, 0, 0, 0.3)"});
                $(".header > .menu > ul > li").css({"background-color":"rgba(0, 0, 0, 0.3)"});
                setTimeout(function(){                 
                    $(".profile > .profileImage").css({"left": $(".profileImageLeft").css("left") }).find("img");
                }, 1000); 
                headerProfile = true;
            }
        }
    });

    $(".gridContainer > .gridItem").on("click", "label", function() {
        if($(this).find("input[type='checkbox']").prop("checked") == true) {
            $(this).find("i").removeClass("fa fa-square-o");
            $(this).find("i").addClass("fa fa-check-square-o");
        } else {
            $(this).find("i").removeClass("fa fa-check-square-o");
            $(this).find("i").addClass("fa fa-square-o");
        }
    });

    
    $(".gridContainer > .gridItem").on("click", "i.downloadAlbum", function(){
        var dataUrl = baseUrl+"/download?"+$(this).attr("data-url");
        $(".modelDiv").show().animate({"height":"100vmax"}, 1000);
        $("body").css({"overflow":"hidden"});

        $.ajax({
            url: dataUrl,
            type: "GET",
            success: function(downloadUrl) {
                // window.location = "../"+downloadUrl;
                $(".modelDiv .modelFooter > .modelBtn").attr("disabled", false);
                $(".modelDiv .modelFooter > .downloadZip").prop("href", "../"+downloadUrl);                
            }
        });    
    });

    $(".header > .menu").on("click", "a.downloadSelectedAlbum", function(){
        var dataUrl = baseUrl+"/downloadSelected";
        downloadOrDriveSelectedAlbums(dataUrl); 
    });

    $(".header > .menu").on("click", "a.downloadAllAlbum", function(){        
        $(".gridContainer .imageName > label > input[type='checkbox']").prop("checked", true);
        var dataUrl = baseUrl+"/downloadSelected";
        downloadOrDriveSelectedAlbums(dataUrl);
    });

    $(".header > .menu").on("click", "a.driveSelectedAlbum", function(){
        var dataUrl = baseUrl+"/googleDrive";
        downloadOrDriveSelectedAlbums(dataUrl); 
    });

    $(".header > .menu").on("click", "a.driveAllAlbum", function(){
        $(".gridContainer .imageName > label > input[type='checkbox']").prop("checked", true);
        $('#albums').submit(); 
    });

    $(".mobileMenu").on("click", function(){
        $(".mobileMenu > i").toggleClass("fa-bars");
        $(".menu > ul").toggle(1000);
    });

    $(".container > .grid-container").on("click", ".grid-item", function() {
        var imgUrl = $(this).css("background-image").trim();
        imgUrl = imgUrl.substring(5, imgUrl.length - 2);   
        // $(".imageModal").css({"opacity": '1'});     
        // $(".imageModal").animate({height: $(".imageModal > center > img").height}, 1000 );
        $(".imageModal > center > img").attr("src", imgUrl);
    });

    $(".modelDiv .modelFooter").on("click", ".modelBtn", function(){
        $(".modelDiv").animate({"height":"0"}, 1000).hide();
        $("body").css({"overflow":"auto"});
    });

});


function downloadOrDriveSelectedAlbums(dataUrl) {    
    var selectedAlbums = [];

    $(".gridContainer .imageName > label").find("input:checked").each(function (i, ob) { 
        var idName = $(ob).val().split("~/~");
        var album = {
            "id": idName[0],
            "name" : idName[1]
        };
        selectedAlbums.push(album);
    });

    $(".gridContainer .imageName > label > input[type='checkbox']").prop("checked", false);
    $(".gridContainer .imageName > label > input[type='checkbox']").siblings("i").removeClass("fa fa-check-square-o");
    $(".gridContainer .imageName > label > input[type='checkbox']").siblings("i").addClass("fa fa-square-o");

    $(".modelDiv").show().animate({"height":"100vmax"}, 1000);
    $("body").css({"overflow":"hidden"});

    $.ajax({
        url: dataUrl,
        type: "POST",
        data : { "selectedAlbums" : selectedAlbums },
        success: function(downloadUrl) {
            window.location = "../"+downloadUrl;
            $(".modelDiv").animate({"height":"0"}, 1000).hide();
            $("body").css({"overflow":"auto"});
        }
    }); 
}



var i = 0;
var count = document.querySelectorAll(".slide").length;    
var flagPlayPause = true;

function playSlide(event) { 

    if(flagPlayPause){
        flagPlayPause = false;
        event.srcElement.classList.remove("fa-play");   
        event.srcElement.classList.add("fa-pause");   

        playSider = setInterval(function(){          
            slide(i);
            if(i != 0){               
                document.getElementsByClassName('slide')[i-1].classList.remove("show");
                document.getElementsByClassName('slide')[i-1].classList.add("hide");
            }  
            i++;
        }, 3000);
    } else {
        flagPlayPause = true;
        event.srcElement.classList.remove("fa-pause");   
        event.srcElement.classList.add("fa-play");  
        clearInterval(playSider); 
    }    
}

function nextSlide() {    
    i++;
    slide();      
    if(i != 0){               
        document.getElementsByClassName('slide')[i-1].classList.remove("show");
        document.getElementsByClassName('slide')[i-1].classList.add("hide");
    }  
}

function prevSlide() {
    i--;
    if(i == -1) {
        i = count - 1;
    }
    slide();  
    if(i != count-1){               
        document.getElementsByClassName('slide')[i+1].classList.remove("show");
        document.getElementsByClassName('slide')[i+1].classList.add("hide");
    }
    
    if(i == count-1){               
        document.getElementsByClassName('slide')[0].classList.remove("show");
        document.getElementsByClassName('slide')[0].classList.add("hide");
    }      
}

function slide() {
    if(count == i){
        i = 0;            
        document.getElementsByClassName('slide')[count-1].classList.remove("show");
        document.getElementsByClassName('slide')[count-1].classList.add("hide");
    }
    
    document.getElementsByClassName('slide')[i].classList.remove("hide");
    document.getElementsByClassName('slide')[i].classList.add("show");            
}