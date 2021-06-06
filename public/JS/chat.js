var interval = null;
var previousMessages = null;

function searchFunction(userId){
    var x = document.getElementById("nameSearch").value;
    if (x.length>0){
        $.get("/chat/searchUser/"+x, function(data, status){
            //console.log("Data: " + data + "\nStatus: " + status);
            if (status=="success"){
                var listaUsers = document.getElementById("userListbody");
                var headerlistaUsers = document.getElementById("userListheader");
                listaUsers.innerHTML = "";
                headerlistaUsers.innerHTML = "Search Results:";
                //listaUsers.innerHTML = JSON.stringify(data)
                for (var i in data){
                    if (data[i].IdUser!=userId){
                        listaUsers.innerHTML += "<a onclick=loadChat("+userId+","+data[i].IdUser+")><div class=p-2>" +
                        "<img id=searchResultImage src=img/"+ data[i].imagem +"> " + data[i].Username + "</div></a>"
                    }
                    
                }
            }else{
                console.log("Something Went Wrong")
            }
    
          });
    }
    else {
        clearSearch(userId);
    }
}

function clearSearch(id){
    var x = document.getElementById("userListbody").innerHTML = ""; 
    document.getElementById("nameSearch").value = "";
    previousMessages = null
    getPastMessages(id);
    var headerlistaUsers = document.getElementById("userListheader");
    headerlistaUsers.innerHTML = "Previous Messages:";
}


function loadChat(sender,receiver){
    clearSearch(sender);
    clearInterval(interval);
    previousMessage = null;
    interval = setInterval(function(){
        $.get("/chat/messages/"+sender+"/"+receiver, function(data, status){
            //console.log(data.length)
            if (previousMessage==null || data.length!=previousMessage.length){                
                //console.log(sender,receiver)
                if (status=="success"){
                    clearSearch(sender);
                    getUserInfoPM(receiver)
                    var chatArea = document.getElementById("chatTextBody");
                    chatArea.innerHTML = "";
                    for (var i in data){
                        diaHora = data[i].time.split(' ')
                        if (data[i].sender == sender){                            
                            chatArea.innerHTML += "<div id=sentChat class='d-flex justify-content-center'>" +
                            "<div id=data class=mx-1>" + diaHora[1]+"</div>" +
                            "<div id=sent class='border px-2 my-1'>" + data[i].message + "</div></div>"
                        }else{
                            chatArea.innerHTML += "<div id=receivedChat class='d-flex justify-content-center'>"
                            + "<div id=receivedImage class='receivedImage'></div>"
                            + "<div id=received class='border px-2 my-1'>" + data[i].message + "</div>"
                            + "<div id=data class=mx-1>" + diaHora[1]+"</div></div>"
                        }
                    }
                }else{
                    console.log("Something Went Wrong")
                }
                previousMessage=data
            }
        });

    }, 500);

    document.getElementById("sendText").innerHTML =  
    '<form name=sendText id="sendText" onsubmit=return sendMessage('+sender+','+receiver+')>' +
    '<label for="send">Send Message:</label>' +   
    '<input type="text" id="send" name="send" required' +
          'minlength="3" maxlength="200" size="10">' +
    '<button id="sendTextButton" onclick=sendMessage('+sender+','+receiver+')>Send</button></form>'

}

function sendMessage(sender,receiver){
    $("#sendText").submit(function(e) {
        e.preventDefault();
    });
    var message = document.getElementById("send").value

    $.post("/chat/message/", {sender: sender, receiver: receiver, message: message},function(data, status){
        //console.log("Data: " + data + "\nStatus: " + status);
        if (status=="success"){
            
        }else{
            console.log("Something Went Wrong")
        }

      });

      document.getElementById("send").value = "";
}




function getPastMessages(userId){
    
    $.get("/chat/messages/"+userId, function(data, status){
        if(previousMessages == null || data.length!=previousMessages.length) {
            //console.log("Data: " + data + "\nStatus: " + status);
            previousMessages = data
            if (status=="success"){
                //console.log(data)
                contacts = []
                for (i in data){
                    if (data[i].receiver == userId){
                        contacts.push(data[i].sender)
                    }
                    else if (data[i].sender == userId){
                        contacts.push(data[i].receiver)
                    }
                }
                contactsFiltered = contacts.filter(onlyUnique)
                //console.log(contactsFiltered)
                for (i in data){
                    if (data[i].receiver == contactsFiltered[0]){
                        //console.log(data[i])
                        contactsFiltered.shift()
                        getUserInfoList(userId, data[i].receiver)
                    }
                    else if (data[i].sender == contactsFiltered[0]){
                        //console.log(data[i])
                        contactsFiltered.shift()
                        getUserInfoList(userId, data[i].sender)
                    }
                    //console.log(contactsFiltered)
                    if (contactsFiltered.length == 0)
                        break
                }
            }else{
                console.log("Something Went Wrong")
            }
        }
        });
    }

function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
  }

// Recebe id do User e do Sender
function getUserInfoList(userId, id){
    //console.log(userId, id)
    $.get("/user/"+id, function(data, status){
        if (status=="success"){
            //console.log(data)
            var listaUsers = document.getElementById("userListbody");
            //listaUsers.innerHTML = JSON.stringify(data)
            listaUsers.innerHTML += "<a onclick=loadChat("+userId+","+data.IdUser+")><div class=p-2>" +
            "<img id=searchResultImage src=img/"+ data.imagem +"> " + data.Username + "</div></a>"
        
        }else{
            console.log("Something Went Wrong")
        }
        return data
    });
}

function getUserInfoPM(id){
    $.get("/user/"+id, function(data, status){
        if (status=="success"){
            
            var chatArea = document.getElementById("chatTextHeader");
            chatArea.innerHTML = data.Username;
            var chatAreaImage = document.getElementsByClassName("receivedImage");
            //console.log(chatAreaImage)

            for (var i = 0; i < chatAreaImage.length; i++) {
                const image = document.createElement('img')
                image.width = "25"
                image.src  = '/img/'+data.imagem
                chatAreaImage[i].appendChild(image)
            }              
        
            

        }else{
            console.log("Something Went Wrong")
        }
        return data
    });
}
