<script>function loadXMLDoc(filename)
{
if (window.XMLHttpRequest)
  {
  xhttp=new XMLHttpRequest();
  }
else // code for IE5 and IE6
  {
  xhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xhttp.open("GET",filename,false);
xhttp.send();
return xhttp.responseXML;
} 
function getLangText(tagNam) {
        y="./pt/strings.xml";
        var x = document.cookie.split(";"); 
        for (i = 0; i < x.length; i++) {
            if (x[i].indexOf("lan=")>=0) {
                y = x[i].substring(x[i].indexOf("=") + 1);
                break;   
            }
           
        }
    
        xmlDoc = loadXMLDoc(y);
        
        document.write(xmlDoc.getElementsByTagName(tagNam)[0].childNodes[0].nodeValue);
    }</script>

