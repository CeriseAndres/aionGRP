<template>
  <div>
    <div class="row page">
      <div class="gallery col-lg-4 col-md-4 col-sm-4 col-xs-6" v-for="image in tab">
        <div class="content">
          <a v-on:click="toggle(image.id)"  v-show="!show">
            <img class="images img-responsive center-block" v-bind:src="'/aionGRP/'+image.img_path">

          </a>
          <a v-on:click="changeAvatar(image.id)" v-if="verify" class="makedefault btn btn-lg">make default</a>
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
      show: false,
      verify:false,
    }
  },
  methods: {
    imgtakeall: function() {
        var self=this;

          self.api=api;
          var url= burl+"api.php?w=blog&v=imgtakeall&name="+name+"&api="+self.api+'&idchar='+self.$route.params.id;
          axios.get(url)
          .then(function (response) {
            self.tab=response.data;
              //console.log(self.tab);
          })
          .catch(function (error) {
              //console.log('erreur'+error);
          });

      },
      verifyismine: function(){
        var self=this;
        var url=burl+"api.php?w=personnage&v=verifyismine&name="+name+"&api="+self.api+"&idchar="+self.$route.params.id;
        axios.get(url)
        .then(function (response) {
          self.verify=response.data;
          //console.log(response.data);
        })
        .catch(function (error) {
          //console.log(error)
        })
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

          self.api=api;
          var url= burl+"api.php?w=blog&v=makedef&name="+name+"&api="+self.api+'&idchar='+self.$route.params.id+'&id='+idimg;
          axios.get(url)
          .then(function (response) {
            //console.log(response);
            self.$router.push({name: 'viewcharac'});
          })
         .catch(function (error) {
            //console.log('erreur'+error);
          });

      },
    },

   mounted() {
     this.imgtakeall();
     this.verifyismine();
   },
}
</script>

<style scoped>
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
.makedefault{
  color: #ffffff;
  position : relative;
  display: block;
  margin: 0 auto;
  padding: 0;
  width: 200px;
  margin-top: 5px;
  font-size: 15px;
  background: rgba(154,83,254,0.5);
}
.btn:hover{
  color: #ffffff;
  background: rgba(154,83,254,1);
}
#filtre{
  position:absolute;
  width:250%;
  left: -210px;
  top: -250px;
  background-color:black;
  z-index:1;
  min-height: 500%;
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

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    transition: opacity .5s;
  }
</style>
