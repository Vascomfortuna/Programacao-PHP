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

        var x = document.cookie.split(";");
        y="";
        for (i = 0; i < x.length; i++) {
            if (x[i].contains("lan=")) {
                var y = x[i].substring(x[i].indexOf("=") + 1);
                alert(x[i]+"   "+y);
                break;   
            }
            else if ((i === x.length - 1)) {
                y = "./pt/strings.xml";
            }
        }
        xmlDoc = loadXMLDoc(y);
        document.write(xmlDoc.getElementsByTagName(tagNam)[0].childNodes[0].nodeValue);
    }</script>

