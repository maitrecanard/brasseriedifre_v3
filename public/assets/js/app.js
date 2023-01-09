const app = {

    httpHeaders: new Headers(),

    init: function() {
        
        loader.init();
        indiscrete.init();
        mail.init();
        map.init();
        app.httpHeaders.append("Content-Type", "application/json");
        

    }

}

app.init();