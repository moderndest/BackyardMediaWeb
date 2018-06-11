var Podcasters = {};
Podcasters.table = [];

Podcasters.Item = function(show, Topics, Host_Name){
    this.show = show
    this.Topics = Topics
    this.Host_Name = Host_Name
};

Podcasters.addItemToTable = function(show, Topics, Host_Name){
    if(this.table === null)
    {
        this.table = [];        
    }
    for(var i in this.table){
        if(this.cart[i].name === name){
            this.cart[i].count += count;  
            this.saveTable(); 
            return;
        }
    }
    var item = new Podcasters.Item(show, Topics, Host_Name);
    this.table.push(item);
    this.saveTable();

}

//save cart to session storage
Podcasters.saveTable = function () {
    sessionStorage.setItem("Podcasters", JSON.stringify(this.table));
}

//retreive the data from session storage
Podcasters.loadTable = function (){
    this.table = JSON.parse(sessionStorage.getItem("Podcasters"));
}

Podcasters.loadTable();