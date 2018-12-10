
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
// Gallery
// ------------------------------------
function openGalleryImg(imgs) {
    
    var galleryImgView = document.getElementById("galleryImgView");
    
    galleryImgView.src = imgs.src;

    galleryImgView.parentElement.style.display = "block";
}
// -------------------------------------


// ------------------------------------
// Add and removw row in Table
// --------------------------------
$( document ).ready(function() {
    var rows = $('#detailProdTable tbody tr').length;
    if( rows == 1) {
        $('#removeTableRow').attr('style','background-color: #ccc; border-color: #ccc; cursor: not-allowed;');
    }
});

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


// ------------------------
// img checkbox
// ---------------------------
// init the state from the input
$(".image-checkbox").each(function () {
    if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
      $(this).addClass('image-checkbox-checked');
    }
    else {
      $(this).removeClass('image-checkbox-checked');
    }
  });
  
  // sync the state to the input
  $(".image-checkbox").on("click", function (e) {
    $(this).toggleClass('image-checkbox-checked');
    var $checkbox = $(this).find('input[type="checkbox"]');
    $checkbox.prop("checked",!$checkbox.prop("checked"))
  
    e.preventDefault();
  });
// -------------------



// -----------------------------------
// Multi select + search
// -----------------------------------
function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    if ($.trim(params.term) === '') {
      return data;
    }

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
    }

    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (data.text.indexOf(params.term) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text += ' (khớp)';

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
    }

    // Return `null` if the term should not be displayed
    return null;
}

$(document).ready(function() {
    $('.select-multiple').select2({
        matcher: matchCustom,
        placeholder: 'Nhập hoặc chọn tên sản phẩm',
    });
});

// -------------------------------------------------------------