const app = {

    httpHeaders: new Headers(),

    init: function() {
        
        map.init();
        app.httpHeaders.append("Content-Type", "application/json");

    }

}

app.init();