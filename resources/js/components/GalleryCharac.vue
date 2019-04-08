<template>
  <div>
    <div class="row page">
      <div class="gallery col-lg-4 col-md-4 col-sm-4 col-xs-6" v-for="image in tab">
        <div class="content">
          <a v-on:click="toggle(image.id)"  v-show="!show">
            <img class="images img-responsive center-block" v-bind:src="'/aionGRP/'+image.img_path">
          </a>
        </div>
      </div>
    </div>

    <div v-for="image in tab">
      <transition name="fade">
        <div class="modalstyle" v-show="show==image.id" v-on:click="toggle(false)">
          <img class="imgModal" v-bind:src="'/aionGRP/'+image.img_path">
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
        var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url="http://localhost/aionGRP/api.php?w=blog&v=imgtakeall&name="+name+"&api="+self.api+'&idchar='+self.$route.params.id;
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
        }
        else{
          $('#didi').show();
          $('#did').show();
          $('#title').show();
        }
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
}
.content>a {
		margin:  auto;
		border: none;
		padding: 10px;
		cursor: pointer;
}
.modalstyle {
    background: black;
    width: 1000px;
    height: 1000px;
		margin: auto;
		cursor: pointer;
}
.modalimg>.imgModal{
  position: absolute;
  top: -40px;
  left: 110px;
  max-width: 900px;
  max-height: 600px;
}
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    transition: opacity .5s;
  }
</style>
