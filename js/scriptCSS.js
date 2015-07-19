
document.querySelector("iframe").onload=function(){
    var allFrame = document.querySelectorAll('iframe');
    console.log("execute")
    for (var i = 0, n = allFrame.length; i < n; i++) {
        //console.log(document.querySelector(allFrame[i]))
        allFrame[i].style.width = "150px";
    }
}