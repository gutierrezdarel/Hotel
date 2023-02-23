        //  EDIT , DELETE ROOM TYPE
        function Editroomtype(id){
            $('#update_roomtype-modal').css('display','flex')
            $('#close_update').on('click',function(){
                $('#update_roomtype-modal').css('display','none')
            })

            $('#roomtype_id').val(id);
            $('#update_roomtype').val($('#r-type-'+id).html());
            $('#update_roomdescription').val($('#r-description-'+id).html());
            var roomprice =  parseFloat($('#r-price-'+id).html())
            $('#update_roomprice').val(roomprice);
            var roomcap = parseFloat($('#r-capacity-'+id).html())
            $('#update_roomcapacity').val(roomcap);
            $('#update_roompackage').val($('#r-package-'+id).html());
        }

        function Deleteroomtype(id){
            $('#delete_roomtype-modal').css('display','flex')
            $('#close_delete').on('click',function(){
                $('#delete_roomtype-modal').css('display','none')
            })
            $('#remove_id').val(id)
            
        }
    //    EDIT,DELETE ROOM TYPE
        function roomtype_action(data){
            var update_roomtype ={ 
            editroom_action: data,
            remove_id: $('#remove_id').val(),
            id: $('#roomtype_id').val(),
            update_roomtype: $('#update_roomtype').val(),
            update_roomdescription: $('#update_roomdescription').val(),
            update_roomprice: $('#update_roomprice').val(),
            update_roomcapacity: $('#update_roomcapacity').val(),
            update_roompackage: $('#update_roompackage').val()
            }

            $.ajax({
                url: "Php/functions.php",
                type: "POST",
                data: update_roomtype,
                success: function(response){
                    if(response == 'roomtype inuse'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'pink', 'color':'red' });
                        $('.message').text("This room type is in use")
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    
                    }else if(response == 'Updated'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'#49be25','color': 'white' });
                        $('.message').text("Successfully Update")
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    }else if(response == 'empty'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'pink', 'color':'red' });
                        $('.message').text("All Field is required");
                        setTimeout(() => {
                            $('.error').removeAttr('style');    
                        }, 1500);
                    }else if(response == 'deleted'){
                        location.reload();
                    }else if(response == 'cannot delete'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'pink', 'color':'red' });
                        $('.message').text("This room type is in use");
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    }
                    console.log(response)
                }
            })
        }

        // EDIT ROOMS
        function Editroom(id) {  
            $('#update_room-modal').css('display','flex')
            $('#close_update').on('click',function(){
                $('#update_room-modal').css('display','none')
            })

            $('#room_id').val(id)
            $('#update_roomnumber').val($('#room-number-'+id).html())
            $('#update_roomtype_select').val($('#room-type-'+id).attr("data-id"))
            $('#update_roomstatus_select').val($('#room-stats-'+id).attr("data-stats"))
        }
        // DELETE ROOMS
        function Deleteroom(id){
            $('#delete_room-modal').css('display','flex')
            $('#close_delete').on('click',function(){
                $('#delete_room-modal').css('display','none')
            })

            $('#remove_id').val(id);
        }

        // AJAX DELETE AND EDIT ROOM
        function room(data) {  
        var room_data = {
            remove_id : $('#remove_id').val(),
            id: $('#room_id').val(),
            room_action: data,
            update_roomnumber: $('#update_roomnumber').val(),
            update_roomtype: $('#update_roomtype_select').val(),
            update_status: $('#update_roomstatus_select').val()
            }

            console.log(room_data);
            $.ajax({
                url:"Php/functions.php",
                type: "POST",
                data: room_data,
                success:function(response){
                    if(response == 'used'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'pink', 'color':'red' });
                        $('.message').text("This room is in use")
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    }else if(response == 'successs'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'#49be25','color': 'white' });
                        $('.message').text("Successfully Update")
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                        
                    }else if(response == 'deleted'){
                        location.reload()
                    }
                
                }
            })
            
        }

    // SELECT ROOM TYPE
    $('#c-roomtype_select').on('change',function(){
        $('#roomnumber_select').empty().append('<option value="">Room Number</option>')
        $('#guest_select').empty().append('<option value="" >Guest</option>')
        var data = $(this).val();
        var room_cap;
        var room_package;
        var room_price;

        $.ajax({
            url:"Php/display.php",
            type: "POST",
            data: "request="+data,
            success:function(response){
                var res = JSON.parse(response);      
                
                if(res == 0){
                    $('#price').val('')
                    $('#package').val('')
                    $('#payment').val('')

                    $('#checkin').attr('disabled','disabled')
                    $('#checkout').attr('disabled','disabled')
                    // $(".error").css("display", "block");
                }else{
                    $(".error").css("display", "none");
                res.forEach(room => {
                                $('#roomnumber_select').append($('<option>',{
                                    value: room.id,
                                    text: room.RoomNumber
                                }))         

                                room_cap = room.RoomCapacity
                                room_package = room.Package
                                room_price = room.RoomPrice
                            });

                            for(var i = 1; i <= room_cap; i++){
                            $('#guest_select').append($('<option>', {
                                value: i,
                                text: i
                            }))
                        }       
                            $('#package').val(room_package);
                            $('#price').val(room_price);
                } 
            }
        })
    })
        // VALIDATION OF ROOM TYPE
        $('#c-roomtype_select').on('click', function(){
            $('#checkin').val('')
            $('#checkout').val('')
            $('#total').val('')
            $('#balance').val('')
            $('#payment').val('')
            $('#price').val('')
        


            if($('#c-roomtype_select').val() > 0){
                $('#checkin').removeAttr('disabled')
                $('#checkout').removeAttr('disabled')
            }else{
                $('#checkin').attr('disabled','disabled')
                $('#checkout').attr('disabled','disabled')
            }
        })

        var today = new Date();
        var current = moment(new Date()).format("YYYY-MM-DD HH:mm");
        $('#checkin').change(function(){
            
            var checnkin = new Date($('#checkin').val());
            
            if(checnkin < today){
                $('#checkin').val(current);
            }
        })
        $('#checkout').change(function(){
            var checkout = new Date($('#checkout').val());
            var date = new Date($('#checkin').val())      
            var date2 = new Date($('#checkout').val())   
            var price  = $('#price').val();          //Price of The Room

            if(checkout < today){
                $('#checkout').val(current);

            }else{
                var diffDays = parseInt((date2 - date)/(1000 * 60 * 60 * 24), 10);
                var total_payment = parseFloat(price) * parseFloat(diffDays); 
                $('#total').val(total_payment) //Total Price
                localStorage.setItem("total_payment" , total_payment)
            }

            // VALIDATION OF DATES
            if($('#checkin').val() == $('#checkout').val()){
                $('#total').val(0)
            }else if($('#checkin').val() > $('#checkout').val()){
                $('#total').val(0)
            }
        })

        // PAYMENT COMPUTATION
        $('#payment').keyup(function(){
            var total_payment = localStorage.getItem("total_payment")
            var payment = Number($("#payment").val());
            var change = total_payment - payment;
                $('#balance').val(change);
            
                if(payment > total_payment){
                    $('#add').attr('disabled','disabled')
                    $('#payment').css('color','red')
                    $('#add').css('opacity','0.7')
                    $('#balance').val(0)
            
                }else{
                    $('#add').removeAttr('disabled')
                    $('#add').css('opacity','1')
                    $('#payment').css('color','black')
                }
        })

        function costumer_action(data){
            var costumer_data = {
                costumer : data,
                id: $('#id').val()  ,
                name: $('#name').val(),
                contact: $('#contact').val(),
                address: $('#address').val(),
                gender: $('#gender_select').val(),
                roomtype: $('#c-roomtype_select').val(),
                checkin: moment($('#checkin').val()).format("YYYY-MM-DD HH:mm"),
                checkout: moment($('#checkout').val()).format("YYYY-MM-DD HH:mm"),
                roomnumber: $('#roomnumber_select').val(),
                guest: $('#guest_select').val(),
                package: $('#package').val(),
                price: $('#price').val(),
                payment: $('#payment').val(),
                total: $('#total').val(),
                balance: $('#balance').val(),
            }
            if(data == 'add_costumer'){
                var required2 = document.querySelectorAll('.validation2')
            for(input of required2){
                        var isValid2 = input.checkValidity()
                        if(!isValid2){
                            input.setAttribute('aria-invalid',!isValid2)
                            input.reportValidity()
                            break
                        } 
                    }
                if($('#c-roomtype_select').val() != "" && 
                $('#checkin').val() != "" &&
                $('#checkout').val() != "" &&  
                $('#guest_select').val() != "" && 
                $('#payment').val() != "" && 
                $('#roomnumber_select').val() != ""){
                    $.ajax({
                        url:"Php/functions.php",
                        type: "POST",
                        data: costumer_data,
                        success:function(response){
                            if(response == 'added'){
                                location.reload()
                            }
                        }
                    })
                }
            }
        }


        // EDIT CHECKIN 
        function Editcheckin(id){
            $('#update_costumer-modal').css('display','flex')

            $('#close_update').on('click',function(){
                $('#update_costumer-modal').css('display','none')
            })
            $('#id').val(id)


            var date = moment(new Date($('#checkout-'+id).html())).format("YYYY-MM-DD HH:mm");
            localStorage.setItem('last_date',date)
            
            $('#update_checkout').val(date)
        var last_amount =   $('#update_amount').val($('#amount-'+id).val())
            localStorage.setItem('last_amount',last_amount.val())

            $('#update_payment').val($('#payment-'+id).val())

        var last_balance = $('#update_balance').val($('#balance-'+id).val())
            localStorage.setItem('last_balance', last_balance.val())

            $('#update_price').val($('#price-'+id).val())
        }

        $('#update_checkout').on('change',function(){
            var now_date = new Date($('#update_checkout').val())
            var last_date = new Date(localStorage.getItem("last_date"))
            var last_amount = parseFloat(localStorage.getItem('last_amount'))
            var last_balance = parseFloat(localStorage.getItem('last_balance'))
            var total_payment  = parseFloat(0)
        
            var price = $('#update_price').val()

            if(last_date > now_date){
                $('#update_checkout').val(moment(last_date).format("YYYY-MM-DD HH:mm"));
                $('#update_amount').val(last_amount)
                $('#update_balance').val(last_balance)

            }else{
                var diffDays = parseInt((now_date - last_date) / (1000 * 60 * 60 * 24),10)
                total_payment = price * parseFloat(diffDays);

                $('#update_amount').val(total_payment + last_amount)
                $('#update_balance').val(total_payment + last_balance)
            }          
        })

        // Check out guest 
            function Checkoutguest(id){
                $('#checkout_guest-modal').css('display','flex')

                $('#close_delete').on('click',function(){
                    $('#checkout_guest-modal').css('display','none')
                })

                $('#checkout_id').val(id)
                $('#roomnumber_id').val($('#roomnumber-'+id).val());
    
                
            }

    

        // UPDATE CHECKIN 
        function checkout(data){
            var checkout_data = {
                checkout_action: data,
                checkout_id: $('#checkout_id').val(),
                roomnumber_id: $('#roomnumber_id').val(),
                id: $('#id').val(),
                update_checkout: moment($('#update_checkout').val()).format("YYYY-MM-DD HH:mm"),
                update_amount: $('#update_amount').val(),
                update_balance: $('#update_balance').val(),
                today: moment(new Date()).format("YYYY-MM-DD HH:mm")
            }

            $.ajax({
                url:"Php/functions.php",
                type: "POST",
                data: checkout_data,
                success:function(response){
                
                    if(response == 'updated'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'#49be25','color': 'white' });
                        $('.message').text("Successfully Update")
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    }else if(response == 'status Updated'){
                        location.reload()
                    }else if(response == 'Remaining balance'){
                        $('.error').css({ 'display': 'flex' , 'background-color':'pink', 'color':'red' });
                        $('.message').text("This Guest has a remaining Balance");
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    }
                
                }
            })
        }

        // Update Payment
        function Editpayment(id){
            $('#update_payment-modal').css('display','flex')
            $('#close_update').on('click',function(){
                $('#update_payment-modal').css('display','none')
                $('#update_payment-trans').val('')
            })
                $('#payment_id').val(id)

            $('#update_amount-trans').val($('#update_amount-'+id).html()) 
            $('#update_balance-trans').val($('#update_balance-'+id).html())
                var trans_lastbalance =  $('#update_balance-'+id).html() 
                localStorage.setItem('trans_lastbalance', trans_lastbalance)   
                var last_payment =  $('#update_payment-'+id).html()
                localStorage.setItem('lastpayment' , last_payment);
        }


            $('#update_payment-trans').keyup(function(){
                var trans_lastamount = $('#update_amount-trans').val()
                var trans_lastpayment = parseFloat(localStorage.getItem('lastpayment'))
                var trans_lastbalance = parseFloat(localStorage.getItem('trans_lastbalance'))
                var payment = Number($('#update_payment-trans').val())
                var change = trans_lastbalance - payment
                var total_payment = payment + trans_lastpayment


                $('#update_balance-trans').val(change);
                $('#total_payment').val(total_payment);

                if(payment > trans_lastbalance){
                    $('#update-btn').attr('disabled','disabled')
                    $('#update-btn').css('opacity','0.7')
                    $('#update_payment-trans').css('color','red')
                    $('#update_balance-trans').val(0)
                }else{
                    $('#update-btn').removeAttr('disabled','disabled')
                    $('#update-btn').css('opacity','1')
                    $('#update_payment-trans').css('color','black')
                }
            })

            function transaction(data){
                var payment_data ={
                    payment_action: data,
                    id:  $('#payment_id').val(),
                    payment : $('#total_payment').val(),
                    balance : $('#update_balance-trans').val()

                }
                // console.log(payment_data)
                $.ajax({
                    url:"Php/functions.php",
                    type: "POST",
                    data: payment_data,
                    success:function(response){
                        if(response == 'updated'){
                            $('.error').css({ 'display': 'flex' , 'background-color':'#49be25','color': 'white' });
                            $('.message').text("Successfully Update")
                            setTimeout(() => {
                                location.reload()
                            }, 1000);
                        }
                    }
            
                })

            }


        $('#fillter_costumer').on('keyup',function(){
            $('tbody').empty()
            var search = $(this).val();

            if(search != ""){
                    $.ajax({
                        url:"Php/display.php",
                        type: "POST",
                        data: {search:search},
                        success:function(response){

                            var cos = JSON.parse(response);
                            cos.forEach(all =>{
                                $('tbody').append('<tr>'+ 
                                                '<td>'+all.Costumer_name +'</td>'+ 
                                                '<td>'+all.roomNumber +'</td>'+ 
                                                '<td>'+all.RoomType+'</td>'+ 
                                                '<td>'+all.Package +'</td>'+ 
                                                '<td>'+all.Guest +'</td>'+ 
                                                '<td>'+all.RoomPrice +'</td>'+ 
                                                '<td>'+all.Amount +'</td>'+ 
                                                '<td>'+all.Payments +'</td>'+ 
                                                '<td>'+all.Balance +'</td>'+ 
                                                '<td>'+'<button type="button" class="edit_icon" onclick = "Editpayment('+all.id+')"><i class="fa-regular fa-pen-to-square"></i></button>'+'</td>'+
                                                '</tr>')
                            })
                        
                        }
                        
                    })    
                }else{
                    location.reload()   
                } 
        })  


