
// ---------------------------------------
/* DATA TABLES */
$('#datatable1').dataTable();
$('#datatable2').dataTable();
$('#datatable3').dataTable();
$('#datatable4').dataTable();
$('#datatable5').dataTable();
$('#datatable6').dataTable();


//-------------------------------------
// Alert



// -------------------------------------------
// Confirm password


// ------------------------------------
// Add and removw row in Table
// --------------------------------

// Add
$( "#addTableRow" ).click(function() {
    $('#detailProdTable').append(`<tr><td><select name="size[]" id="size" class="form-control" required><option value="Freesize">Freesize</option><option value="S">S</option><option value="M">M</option><option value="L">L</option><option value="XL">Xl</option><option value="XXL">XXL</option><option value="XXXL">XXL</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option></select></td><td><input id="color" name="color[]" class="form-control" required placeholder="Nhập màu sắc" value="None" type="text"></td><td><input id="quantity" name="quantity[]" class="form-control" required value="1" min="1" type="number"></td></tr>`);
    if( $('#removeTableRow').attr('style') ){
        $('#removeTableRow').removeAttr('style');
    }
});

//Remove
$('#removeTableRow').click(function(){
    var rows = $('#detailProdTable tbody tr').length;
    if( rows > 1) {
        $('#detailProdTable tbody tr:last').remove();
        var curRows =  $('#detailProdTable tbody tr').length;
        if( curRows == 1) {
            $('#removeTableRow').attr('style','background-color: #ccc; border-color: #ccc; cursor: not-allowed;');
        }
    }
});

// --------------------------------
