<template>
  <div>
    <div class="row page">
      <div class="gallery col-lg-4 col-md-4 col-sm-4 col-xs-6" v-for="image in tab">
        <div class="content">
          <a v-on:click="toggle(image.id)"  v-show="!show">
            <img class="images img-responsive center-block" v-bind:src="'/aionGRP/'+image.img_path">

          </a>
          <a v-on:click="changeAvatar(image.id)" class="makedefault btn btn-lg">make default</a>
        </div>
      </div>
    </div>

    <div v-for="image in tab">
      <transition name="fade">
        <div  class="modalstyle" v-show="show==image.id" v-on:click="toggle(false)">
          <div id="filtre">
            <img class="imgModal" v-bind:src="'/aionGRP/'+image.img_path">

          </div>

        </div>
     </transition>
   </div>
  </div>
</template>

<script>
import 'bootstrap';
import 'popper.js';
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'GalleryCharac',
  data: function() {
    return {
      tab:[],
      api:"",
      show: false
    }
  },
  methods: {
    imgtakeall: function() {
        var self=this;
        var urlapi= burl+"api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url= burl+"api.php?w=blog&v=imgtakeall&name="+name+"&api="+self.api+'&idchar='+self.$route.params.id;
          axios.get(url)
          .then(function (response) {
            self.tab=response.data;
                console.log(self.tab);
              })
             .catch(function (error) {
                    console.log('erreur'+error);
                    console.log(url);

                  });
        });
      },
      toggle: function(id) {
   			this.show = id;
        if (id){
          $('#didi').hide();
          $('#did').hide();
          $('#title').hide();
          $('#filtre').show();
        }
        else{
          $('#didi').show();
          $('#did').show();
          $('#title').show();
          $('#filtre').hide();
        }
   		},
      changeAvatar: function(idimg) {
        var self=this;
        var urlapi= burl+"api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url= burl+"api.php?w=blog&v=makedef&name="+name+"&api="+self.api+'&idchar='+self.$route.params.id+'&id='+idimg;
          axios.get(url)
          .then(function (response) {
                console.log(response);
                alert('done');
              })
             .catch(function (error) {
                    console.log('erreur'+error);
                    console.log(url);

                  });
        });
      },
    },

   mounted() {
     this.imgtakeall()
   },
}
</script>

<style>
.images {
  max-width: 200px;
  max-height: 300px;
}
.gallery {
    margin-bottom: 30px;
    display: flex;
    margin-top: auto;
    justify-content: space-between;
}

.content>a {
		margin:  auto;
		border: none;
		padding: 10px;
		cursor: pointer;
}
#filtre{
  position:absolute;
  width:179%;
  left: -110px;
  top: -110px;
  background-color:black;
  z-index:1;
  min-height: 300%;
}
.imgModal{
  position: relative;
  max-width: 900px;
  cursor: pointer;
  z-index:2;
  display: block;
  margin: auto;
  margin-top: 5em;
  margin-bottom: 5em;
}
.makedefault{
  position : relative;
  display: block;
  margin: 0 auto !important;
  padding: 0 !important;
  background: rgba(154,83,254,0.5);
  width: 200px;
  margin-top: 5px !important;
  font-size: 15px !important;
}
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    transition: opacity .5s;
  }
</style>
