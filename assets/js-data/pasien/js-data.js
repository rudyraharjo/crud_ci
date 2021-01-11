    
$(document).ready(function(){

    $('#konfirmasi_hapus').on('show.bs.modal', function(e) { 
      var message = $(e.relatedTarget).data('message');
      $(e.currentTarget).find('.message').text(message);
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    
    $("#js_tarif_biaya").keyup(function(e) {
      let tarif_biaya = this.value;
      let jumlah_hari = $("#js_jumlah_hari").val();
      $("#js_total_tagihan").val(0);

      if (!isNaN(tarif_biaya)) {
        setTimeout(function() { 
          let totalValue = parseFloat(tarif_biaya) * parseFloat(jumlah_hari);
          $("#js_total_tagihan").val(addCommas(totalValue))
        }, 2000);
      } else {
        alert('not a number?');
      }
    });

    $("#js_jumlah_hari").keyup(function(e) {
      let jumlah_hari = this.value;
      let tarif_biaya = $("#js_tarif_biaya").val();
      $("#js_total_tagihan").val(0);

      if (!isNaN(jumlah_hari)) {
        setTimeout(function() { 
          let totalValue = parseFloat(tarif_biaya) * parseFloat(jumlah_hari);
          $("#js_total_tagihan").val(addCommas(totalValue))
        }, 2000);
      } else {
        alert('not a number?');
      }      
    });


    $("#js_get_tarif_biaya").keyup(function(e) {
      let tarif_biaya = this.value;
      let jumlah_hari = $("#js_get_jumlah_hari").val();
      $("#js_get_total_tagihan").val(0);

      if (!isNaN(tarif_biaya)) {
        setTimeout(function() { 
          let totalValue = parseFloat(tarif_biaya) * parseFloat(jumlah_hari);
          $("#js_get_total_tagihan").val(addCommas(totalValue))
        }, 2000);
      } else {
        alert('not a number?');
      }
    });

    $("#js_get_jumlah_hari").keyup(function(e) {
      let jumlah_hari = this.value;
      let tarif_biaya = $("#js_get_tarif_biaya").val();
      $("#js_get_total_tagihan").val(0);

      if (!isNaN(jumlah_hari)) {
        setTimeout(function() { 
          let totalValue = parseFloat(tarif_biaya) * parseFloat(jumlah_hari);
          $("#js_get_total_tagihan").val(addCommas(totalValue))
        }, 2000);
      } else {
        alert('not a number?');
      }      
    });

    $('#PrimaryModalhdbgclEdit').on('show.bs.modal', function(e) { 

      var id = $(e.relatedTarget).data('id');
      var nik = $(e.relatedTarget).data('nik');
      var nama_lengkap = $(e.relatedTarget).data('nama_lengkap');
      var jenis_kelamin = $(e.relatedTarget).data('jenis_kelamin');
      var kelas = $(e.relatedTarget).data('kelas');
      var tarif_biaya = $(e.relatedTarget).data('tarif_biaya');
      var jumlah_hari = $(e.relatedTarget).data('jumlah_hari');
      var total_tagihan = $(e.relatedTarget).data('total_tagihan');      
      
      $(e.currentTarget).find('#js_get_IDNOW').val(id);
      $(e.currentTarget).find('#js_get_nik').val(nik);
      $(e.currentTarget).find('#js_get_nama_lengkap').val(nama_lengkap);
      $('input:radio[id="js_get_jenis_kelamin"][value="'+jenis_kelamin+'"]').prop('checked', true);
      $(e.currentTarget).find('#js_get_kelas').val(kelas);
      $(e.currentTarget).find('#js_get_tarif_biaya').val(tarif_biaya);
      $(e.currentTarget).find('#js_get_jumlah_hari').val(jumlah_hari);
      $(e.currentTarget).find('#js_get_total_tagihan').val(addCommas(total_tagihan));
      
    });
});
     
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
  
  