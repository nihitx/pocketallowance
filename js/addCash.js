    function AppViewModel() {
        var self = this;
        
        self.cash = ko.observable(null);
        self.paytrailToken = ko.observable(null);
        self.userId = ko.observable($('#user_id').data('value'));
        
        
        self.getPaytrailTokenWithAjax = function () {
            if(self.cash() < 1  ){
                alert("please enter a amount");
            }else{
                $.ajax({
                type: 'POST',
                url: BASEURL + 'index.php/paytrail/getPaytrailTokenWithAjax/' + self.cash() + "/" + self.userId(),
                contentType: 'application/json; charset=utf-8'
                })
                .done(function(data) {
                    self.paytrailToken(data.paytrail_token);
                    self.payUserMoney();
               
                             
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    alert(  errorThrown + textStatus);
            })
            .always(function(data){
            }); 
            }
            
        };
        
//        self.getPaytrailTokenWithAjax = function(){
//        
//        window.location.href = BASEURL + '/index.php/paytrail/getPaytrailTokenWithAjax' + "/" + self.cash();
//        }
        
        /* This function is an alternative, that can be called if there are errors
         * loading the actual Paytrail wdget. */
        self.payUserMoney = function () {
            window.location.href = "https://payment.paytrail.com/payment/load/token/" + self.paytrailToken();
        };   
        
    }
    
    
    $(document).ready(function () {
        
        ko.applyBindings(new AppViewModel(), document.getElementById('pocketAllowance_wrapper'));
                      
        
    });
    
  