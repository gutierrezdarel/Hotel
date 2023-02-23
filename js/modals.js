// ADD ROOM TYPE MODAL
$('#add_roomtype').on('click',function(){
    $('#room-type__modal').css('display','flex')
})
$('#close_add').on('click',function(){
    $('.modal_overlay').css('display','none')
})

// ADD ROOM MODAL
$('#add_room').on('click',function(){
    $('#add_room-modal').css('display','flex')
})
$('#close_add').on('click',function(){
    $('#add_room-modal').css('display','none')
})

// ADD COSTUMER MODAL
$('#add_costumer_modal').on('click',function(){
    $('.modal_overlay').css('display','flex')
})
$('#close').on('click',function(){
    $('.modal_overlay').css('display','none')
})
$('#back').on('click',function(){
    $('.modal_container-add1').fadeIn(300)
    $('.modal_container-add2').css('display','none')
 
})



// ADD COSTUMER VALIDATION IF EMPTY
var required = document.querySelectorAll('.validation')

    for(input of required){
        input.addEventListener('input',function(e){
            var isValid = e.target.reportValidity()
            e.target.setAttribute('aria-invalid',!isValid)
            e.target.reportValidity()
        })
    }
    document.querySelector("#next").addEventListener('click',()=>{
        if(document.querySelector("#next").value == ""){
        
        }
        for(input of required){
            var isValid = input.checkValidity()
            if(!isValid){
                input.setAttribute('aria-invalid',!isValid)
                input.reportValidity()
                break
            } else if ($("#name").val() != "" && $("#contact").val() != "" && $("#address").val() != "" && $("#gender_select").val() != ""){
                $('.modal_container-add1').css('display','none');
                $('.modal_container-add2').fadeIn(300)
              
            }
        }
    })

   