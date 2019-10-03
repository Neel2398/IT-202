<!DOCTYPE html>
<html>
  <head>
    
    <script>
      
      function pageloaded()
    {

     
      /*var name = prompt("Who are you?");
      let othername;
      alert("Hello!, "+name);*/
      console.log("test");
      /*let myNumber= 0;
      let t=0;
      for (let i=0; i< 10;i++){
        t++;
        myNumber+=0.1;
      }*/
     /* var myParagraph=document.getElementById("myParagraph");
      console.log(myParagraph);
      myParagraph.innerText = "I changed";
      */
      var div = document.createElement("div");
      div.innerText = "new element added";

      console.log("div")
    }
      
    </script>
  </head>

  <body onload = "pageloaded();">
    
    <p
    id = "myParagraph">Something loaded</p>
    <p
    id = "div">new element added</p>
  </body>
</html>
