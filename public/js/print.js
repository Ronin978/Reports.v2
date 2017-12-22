function CallPrint(strid) 
{ 
    var prtContent = document.getElementById(strid); 
    var WinPrint = window.open('', '', 'left=50,top=50,width=screen.availWidth, height=screen.availHeight,toolbar=0,scrollbars=1,status=0, onload=1'); 
    
    WinPrint.document.write('<html><head><title></title><link rel="stylesheet" type="text/css" href="{{asset("css/admin.css")}}"><link rel="stylesheet" type="text/css" href="{{asset("css/main.css")}}"><link rel="stylesheet" type="text/css" href="{{asset("css/app.css")}}"><script src="{{asset("js/jquery.min.js")}}"><\/script></head><body>'); 
    WinPrint.document.write(prtContent.innerHTML); 
    WinPrint.document.write("<script src='{{ asset('js/app.js') }}'><\/script><script src='{{asset('js/skel.min.js')}}'><\/script><script src='{{asset('js/skel-viewport.min.js')}}'><\/script><script src='{{asset('js/util.js')}}'><\/script><script src='{{asset('js/main.js')}}'><\/script><script src='{{asset('js/myFunction.js')}}'><\/script><script>window.onload=function(){ window.print(); window.close(); }<\/script></body></html>"); 

    WinPrint.document.close(); 
    WinPrint.focus(); 
  //  WinPrint.print(); 
  //  WinPrint.close();
     
}