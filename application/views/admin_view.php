<script type="text/javascript" src="<?php echo base_url();?>js/admin.js" ></script>

<div style="margin-top: 100px; "class="container">
    <div>
        <h1>Register your  card</h1>
        
        <a href="<?php echo base_url(); ?>index.php/welcome/userCardRegister"class="btn btn-primary">Register</a>
        
        <h2>Your card information</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">Card Owner </th>
                        <th class="text-center">Card name</th>
                        <th class="text-center">IBAN</th>
                        <th class="text-center">Current Amount</th>
<!--                        <th class="text-center">Money After Children Deduction</th>-->
                        <th class="text-center">Add cash</th>
<!--                        <th class="text-center">With Draw</th>-->
                        
                        
                    </tr>
                </thead>
                <tbody data-bind="foreach: alldata">
                    <tr>
                        <td class="text-center"><span data-bind="text : $data.name"></span></td>
                        <td class="text-center"><span data-bind="text: $data.card_type"></span></td>
                            <td class="text-center"><span data-bind="text: $data.iban"></span></td>
                            <td class="text-center"><span data-bind="text: $data.Amount"></span> $</td>
<!--                            <td class="text-center"><span data-bind="text: $data.Amount_total"></span> $</td>-->
                            <td class="text-center"><a href="<?php echo base_url(); ?>index.php/welcome/addUserCash"><span class=" glyphicon glyphicon-euro "></span></a></td>
<!--                            <td class="text-center"><a href="<?php echo base_url(); ?>index.php/welcome/TakeOutCash"><span class=" glyphicon glyphicon-trash "></span></a></td>-->
                        
                       
                    </tr>
                </tbody>
            </table>
        </div> 
        
        
    </div>
    <hr>
    
    <h1> Your families cards </h1> 
        <a href="<?php echo base_url(); ?>index.php/welcome/userCardChildrenRegister"class="btn btn-primary">Register</a>
        
   <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">Family member name</th>
                        <th class="text-center">Family memeber</th>
                        <th class="text-center">Money</th>
                        <th class="text-center">Add money</th>
                        <th class="text-center">Take away</th>
                        
                        
                    </tr>
                </thead>
                <tbody data-bind="foreach: allchildrendata">
                    <tr>
                        
                        <td class="text-center"><span data-bind="text : $data.children_name"></span></td> 
                        <td class="text-center"><span data-bind="text : $data.daugther_son"></span></td>
                        <td class="text-center"><span data-bind="text : $data.amount"></span> $</td>
                        <td class="text-center"><a href="#" data-bind="click: $root.giveCashtoChild" ><span class=" glyphicon glyphicon-send"></span></a></td>
<!--                        <td class="text-center"><a href="#" data-bind="click : $root.GetSelectedChild"><span class=" glyphicon glyphicon-send"></span></a></td>-->
                        <td class="text-center"><a href="#" data-bind="click : $root.takeCashFromChild"><span class=" glyphicon glyphicon-trash"></span></a></td>
                        
                        
                       
                    </tr>
                </tbody>
            </table>
        </div> 
</div>




<script>

</script>