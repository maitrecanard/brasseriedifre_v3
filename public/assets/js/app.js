const app = {

    httpHeaders: new Headers(),

    init: function() {
        
        loader.init();
        mail.init();
        map.init();
        app.httpHeaders.append("Content-Type", "application/json");
        

    }

}

app.init();