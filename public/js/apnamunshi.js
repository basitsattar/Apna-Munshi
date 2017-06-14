/****************************************************************************************
                  Custom Code
/*****************************************************************************************/

//function for loading child category in products
function LoadProductCategory(){
  var url="/products/child_category";
  var id=$('#category').val();
  $('.product_preloader').show();
  $.ajax({
    url: url,
      data: ({category_id:id}),
    type: 'POST',
    success: function(data) {
      $('#child_category').html(data);
      $('.product_preloader').hide();
      $("#child_category.select2").select2();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert(errorThrown);
    },
    dataType: "html",
    async: false
  });
}
//function for loading price table in prices
function LoadPriceTable(){
  var url="/clients/prices";
  var id=$('#client').val();
  $('.price_preloader').show();
  $.ajax({
    url: url,
      data: ({client_id:id}),
    type: 'POST',
    success: function(data) {
      $('#price_table').html(data);
      $('.price_preloader').hide();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert(errorThrown);
    },
    dataType: "html",
    async: false
  });
}
function get_bill_fields(x){

  var output="<div class='form-group row'>";
    output+="<div class='col-md-5'>";
    output+="<p><select name='bill["+x+"][item]' id='item_bill_"+x+"' data-id='"+x+"' class='select2'>";
  $("#item_bill_1 option").each(function()
  {
    output+="<option value="+$(this).val()+">"+$(this).text()+"</option>"
  });
  output+="</select></div>";
  output+="";
  output+="<div class='col-md-2'>";
  output+="<input type='text' class='form-control' name='bill["+x+"][quantity]' id='bill_quantity_"+x+"' placeholder='Quantity' data-id='"+x+"' >";
  output+="</div>";
  output+="<div class='col-md-2'>";
  output+="<input type='text' class='form-control' name='bill["+x+"][price]' id='bill_price_"+x+"' placeholder='Price' data-id='"+x+"' >";
  output+="</div>";
  output+="<div class='col-md-2'>";
  output+="<input type='text' class='form-control' name='total' id='bill_total_"+x+"' placeholder='Total' data-id='"+x+"'>";
  output+="</div>";
  output+="<a class='remove_field'><i class='fa fa-times'></i></a></>";

  output+="</div>"
  return output;
}

function get_item_price(client_id,item_id,counter){
  var url="/clients/item_price";
  $.ajax({
    url: url,
      data: ({client_id:client_id,item_id:item_id}),
    type: 'POST',
    success: function(data) {
      $('#bill_price_'+counter).val(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert(errorThrown);
    },
    dataType: "html",
    async: false
  });
  return false;
}
//Adding New Fields in Bill
$(document).ready(function() {

    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var totalPoints=0;
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
            x++; //text box increment
            $(wrapper).append(get_bill_fields(x)); //add input box
            $('#item_bill_'+x+'.select2').select2();
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })


    $('.datepicker').datepicker({format: 'dd/mm/yyyy'});
    var today = new Date();
    var t = today.getMonth()+1+ "/" + today.getDate() + "/" + today.getFullYear();
   $('.datepicker').val(t);
  
  //Loading 2nd drop down when parent category selected in products
  $("select#category").change(function(){
      LoadProductCategory();
    });

  $("select#client").change(function(){
      LoadPriceTable();
    });

    $("select#client_bill").change(function(){
      $('input[type=text]#name').val($("select#client_bill option:selected").text());

    });

    $(document).on('change',"select#client_bill",function(){
      var client_id=$("select#client_bill option:selected").val();
      $("select[id^='item_bill_']").each(function(){
        var item_id=$(this).find('option:selected').val();
        var item_no=$(this).attr("data-id");
          $('input[type=text]#bill_price').val(get_item_price(client_id,item_id,item_no));
      });
    });
    $(document).on('change',"select[id^='item_bill_']",function(){
      var client_id=$("select#client_bill option:selected").val();
      var item_id=$(this).find('option:selected').val();
      var item_no=$(this).attr("data-id");
        $('input[type=text]#bill_price').val(get_item_price(client_id,item_id,item_no));
    });
    $(document).on('input propertychange paste','input[id^="bill_quantity"],input[id^="bill_price"]', function() {
      var id=$(this).attr("data-id");
      var quanity=$('#bill_quantity_'+id).val();
      $('#bill_total_'+id).prop("disabled",false);
      var price=$('#bill_price_'+id).val();
      var total=quanity*price;
      $('#bill_total_'+id).val(total);
    });



    $(document).on('input propertychange paste','input[id^="bill_total"]', function() {
      var id=$(this).attr("data-id");
      var quanity=$('#bill_quantity_'+id).val();
      var total=$(this).val();
      if(quanity!=0 && quanity!=null){
        var price=total/quanity;
        $('#bill_price_'+id).val(price);
      }
      calculate_bill();
    });

     $(document).on('input propertychange paste','input#bill_discount', function() {

        var totalPoints=parseInt($('input#bill_final_total').val(),10); 
        var discount = parseInt($(this).val(),10); 
        var grand_total=totalPoints-discount;
        $('input#bill_grand_total').val(grand_total);
     });


     $(document).on('focus','input[id^="bill_total"]', function() {
      var id=$(this).attr("data-id");
      var quanity=$('#bill_quantity_'+id).val();
      if(quanity==0 || quanity==null){
        $('#bill_total_'+id).prop("disabled",true);
      }else{
        $('#bill_total_'+id).prop("disabled",false);
      }
    });

});
function calculate_bill(){
      totalPoints=0;
      $('input[id^="bill_total"]').each(function(){
        totalPoints += parseInt($(this).val(),10); 
      });
      $('input#bill_final_total').val(totalPoints);
      var discount = parseInt($('input#bill_discount').val(),10); 
      var grand_total=totalPoints-discount;
       $('input#bill_grand_total').val(grand_total);
}