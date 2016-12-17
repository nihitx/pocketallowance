    function AppViewModel() {
        var self = this;
        self.alldata = ko.observableArray();
        self.allchildrendata = ko.observableArray();
        self.giveSelectedchild = ko.observable(null);
        self.takeSelectedchild = ko.observable(null);
        
   
        
        /* Vew model for invoices data */
        function allUserInfoViewModel(root /* root not needed */, card) {
            var self = this;
            self.name = card.name;
            self.email = card.email;
            self.card_type = card.card_type;
            self.iban = card.iban;
            self.Amount = card.Amount;
            self.childrensCash = card.childrensCash;
            
             
        };
        
        
        self.viewAllUserCard = function () {
            
            $.ajax({
                type: 'POST',
                url: BASEURL + 'index.php/welcome/cardInfo',
                contentType: 'application/json; charset=utf-8',
            })
            .done(function(cards) {
                self.alldata.removeAll();
                $.each(cards, function (index, card) {
                self.alldata.push(new allUserInfoViewModel(self, card));
                });
            })
            .fail(function(xhr, status, error) {
                alert(status);
            })
            .always(function(data){                 
            });
        };
        self.viewAllUserCard();
        
        
        
        self.viewAllUserChildrenCard = function () {
            
            $.ajax({
                type: 'POST',
                url: BASEURL + 'index.php/welcome/childrenCardInfo',
                contentType: 'application/json; charset=utf-8',
            })
            .done(function(childrencards) {
                self.allchildrendata.removeAll();
                $.each(childrencards, function (index, childrencard) {
                self.allchildrendata.push(childrencard);
                
                });
            })
            .fail(function(xhr, status, error) {
                alert(status);
            })
            .always(function(data){                 
            });
        };
        self.viewAllUserChildrenCard();
        
        //Whenever you use a click binding, knockout passes the current binding's data and event.
        self.giveCashtoChild = function(data, event){
        self.giveSelectedchild(data.id);
       
        window.location.href = BASEURL + 'index.php/welcome/addUserChildrenCash' + "/" + self.giveSelectedchild();
        }
        
        self.takeCashFromChild = function(data, event){
        self.takeSelectedchild(data.id);
        window.location.href = BASEURL + 'index.php/welcome/takeAway' + "/" + self.takeSelectedchild();
        }
        
//        self.GetSelectedChild = function (selectedchild) {
//            
//            self.selectedchild(selectedchild.id);
//            
//            self.giveCashtoChild();
//            
//        };
        
//        self.giveCashtoChild = function(){
//            var id = self.selectedchild();
//            $.ajax({
//                type: 'POST',
//                url: BASEURL + '/index.php/main/addUserChildrenCash/'+id,
//                contentType: 'application/json; charset=utf-8'
//            })
//            .done(function() {
//               
//            })
//            .fail(function(xhr, status, error) {
//                alert(status);
//            })
//            .always(function(data){                 
//            });
//        }
//        
//        

    //Whenever you use a click binding, knockout passes the current binding's data and event.
//        self.giveCashtoChild = function(data, event) {
//        var currentChildId = data.id;
//        
//            $.ajax({
//                type: 'POST',
//                url: BASEURL + '/index.php/main/addUserChildrenCash' + "/" + currentChildId ,
//                contentType: 'application/json; charset=utf-8'
//            })
//            .done(function() {
//
//            })
//            .fail(function(xhr, status, error) {
//                alert(status);
//            })
//            .always(function(data){                 
//            });
//        } 
        //Whenever you use a click binding, knockout passes the current binding's data and event.
//        self.takeCashFromChild = function(data, event){
//            var currentChildId = data.id;
//            $.ajax({
//                type: 'POST',
//                url: BASEURL + '/index.php/main/takeAway' + "/" + currentChildId ,
//                contentType: 'application/json; charset=utf-8'
//            })
//            .done(function() {
//                
//            })
//            .fail(function(xhr, status, error) {
//                alert(status);
//            })
//            .always(function(data){                 
//            });
//        }
    }
    
    
    $(document).ready(function () {
        
        ko.applyBindings(new AppViewModel(), document.getElementById('pocketAllowance_wrapper'));
                      
        
    });
    
  