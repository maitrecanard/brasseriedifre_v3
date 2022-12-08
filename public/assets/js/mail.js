const mail = {

    url: 'http://localhost:8080/api/',
    span: document.querySelector('#newmail'),

    init: function() {

      //  mail.searchNewMail;
        setTimeout(mail.searchNewMail,0000);
        setInterval(mail.searchNewMail,1000);

    },

    searchNewMail: function() {
        const conf = {
            method: "GET",
            mode: 'cors',
            cache: 'no-cache'
        }
        const paramUrl = 'getnewmail';


        fetch(mail.url + paramUrl, conf)
        .then(function(response){
            return response.json();
        }).then(function(reception){
      
            
            if (reception.mail == 0) {
                
                if(mail.span) {
                    mail.span.remove();
                }

            } else {
                
                if(mail.span) {
                    mail.span.remove();
                }
         
                const spanNewMail = document.querySelector('#messagesDropdown');
                const span = document.createElement('span');
                span.setAttribute('id','newmail');
                span.classList.add('badge','badge-danger','badge-counter');
                spanNewMail.appendChild(span);
                span.textContent = reception.mail;
            }
        })
    }

}