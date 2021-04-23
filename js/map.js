     
      $(function (){
        var map = new GMaps({
          el: "#map",
          lat: -0.741416,
          lng: 118.494551,
          zoom: 4
        });

        var id_m = $("#id_m").val();
        $.ajax({
            type: "POST",
            url: "aksi/distributor_kami/marker.php",
            dataType: 'JSON',  
            data: {
                id:id_m
            },
           success: function(data) {

                  for (var i =0; i<data.length; i++){

                      map.addMarker({
                        lat: data[i].lat,
                        lng: data[i].lng,
                        title : data[i].judul,
                        infoWindow : { content : data[i].isi }
                      });

                  } 

            }
        });
      });