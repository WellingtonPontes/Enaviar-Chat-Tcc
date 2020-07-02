
 
function estouVendo() {
        
    
        document.addEventListener('keyup', e=>{
            // console.log(e.key);
            
            switch (e.key) {
                case 'Enter':
                enaviar();
                
                    break;
            
                default:
                    break;
            }
        })

        function enaviar() {
            
        let texto=document.querySelector('.pegando').value;
        let palavrao=["porra","puta","foda-se"];
        let status = false

        palavrao.forEach(valor => texto.indexOf(valor) !== -1 ? status = true : status = status)
        if( status ) {

        console.log("Falou palavrão!");
            
        } else {
            
        console.log("Não falou palavrão!");
        document.formulario1.submit();
        }

        }
    }

    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(
        ){
            if(req.readyState == 4 && req.status==200){
                document.getElementById('chat-message-list').innerHTML=req.responseText;
    
            }
        }
        req.open('GET','conversa.php', true);
        req.send();
    
        
        }   setInterval(function(){ajax();}, 1000);
    
    
    // function modoescuro(){
    //     document.getElementById('chat-form').setAttribute('id','chat-form-black');
    //     document.getElementById('search-controler').setAttribute('id','search-controler-black');
    //     document.getElementById('conversation-list').setAttribute('id','conversation-list-black');
    //     document.getElementById('new-menssage-container').setAttribute('id','new-menssage-container-black');
    //     document.getElementById('chat-title').setAttribute('id','chat-title-black');
    //     document.getElementById('chat-message-list').setAttribute('id','chat-message-list-black');
    //     document.getElementById('chat-container').setAttribute('id','chat-container-black');
    //     function black(){
    // var req = new XMLHttpRequest();
    // req.onreadystatechange = function(
    // ){
    //     if(req.readyState == 4 && req.status==200){
    //         document.getElementById('chat-message-list-black').innerHTML=req.responseText;
    
    //     }
    // }
    // req.open('GET','conversablack.php', true);
    // req.send();
    
    
    // }   setInterval(function(){black();}, 1000);
    // }
    // function modoclaro(){
    //     document.getElementById('chat-form-black').setAttribute('id','chat-form');
    //     document.getElementById('search-controler-black').setAttribute('id','search-controler');
    //     document.getElementById('conversation-list-black').setAttribute('id','conversation-list');
    //     document.getElementById('new-menssage-container-black').setAttribute('id','new-menssage-container');
    //     document.getElementById('chat-title-black').setAttribute('id','chat-title');
    //     document.getElementById('chat-message-list-black').setAttribute('id','chat-message-list');
    //     document.getElementById('chat-container-black').setAttribute('id','chat-container');
    //     document.getElementById('mydiv-black').setAttribute('id','mydiv'); 
    // }
    
    
    
    // // emoji
    
    
    
    // modal emoji
    document.getElementsByClassName("tablink")[0].click();
    
    function openCity(evt, cityName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("city");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].classList.remove("w3-light-grey");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.classList.add("w3-light-grey");
    }