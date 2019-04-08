<template>
  <div class="container-fluid">
    <div class="row page">

      <div class="gallery col-lg-4 col-md-4 col-sm-4 col-xs-6">
          <img src="" class="img-responsive center-block image">
      </div>

    </div>
  </div>
</template>

<script>
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'GalleryCharac',
  data: function() {
    return {
      tab:[],
      api:"",
      image:"",
      nameImg:""
    }
  },
  methods: {
            takeOne: function() {
              var self=this;
              var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
              $.getJSON(urlapi, function(data){
                self.api=data;
                var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeOne&id="+self.$route.params.id;
                $.getJSON(url, function (data) {
                    self.tab=data;
                    console.log(data);

                });
              });
            },
            takeTab: function(){
              console.log(this.tab);
            }
          },
          mounted() {
            this.takeOne()

          },
        }
</script>

<style>
.image {
    width: 100%;
}

.gallery {
    margin-bottom: 30px;

}
</style>
