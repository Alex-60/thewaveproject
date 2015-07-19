var allFrame = document.querySelectorAll('iframe');
document.querySelector("iframe").onload=function(){
    console.log("execute")
    for (var i = 0, n = allFrame.length; i < n; i++) {
        //console.log(document.querySelector(allFrame[i]))
        allFrame[i].style.width = "150px";
    }
}