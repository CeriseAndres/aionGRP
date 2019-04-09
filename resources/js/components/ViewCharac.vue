<template>
  <div class="container">
    <div class="card">
      <div class="row">
        <div class="col-sm-6">
          <div class="avatar">
            <h1>{{tab.name}}</h1>
            <div class="avatar">
              <img src="/aionGRP/images/kEzzp4YyCZ6cwJ-RWFBqRG5Yk3E.jpg" v-if="tab.imgdef==-1" class="imgCharac mx-auto rounded d-block">
              <img v-bind:src="'/aionGRP/'+tab.imgdef" v-if="tab.imgdef!=-1" class="imgCharac mx-auto rounded d-block">
            </div>
          </div>
          <div class="traits card text-center justify-content-center">
              <router-link v-bind:to="'/aionGRP/gallerycharac/'+tab.character_id" style="color: #ffffff"><button type="button" class="btn btn-lg btn-block btngallery">Gallery</button></router-link>
              <p class="card-text text-left"><strong>GENDER:</strong> {{tab.gender}}</p>
              <p class="card-text text-left"><strong>RACE:</strong> {{tab.race}}</p>
              <p class="card-text text-left"><strong>CLASS:</strong> {{tab.player_class}}</p>
              <p class="card-text text-left"><strong>HOUSE:</strong> {{tab.house}}</p>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="blog" style="width: 300px; height: 300px; background-color: black;">
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="description">
                  <p><strong>DESCRIPTION:</strong></p>
                  <p>{{ tab.description}}</p>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
export default {
  name: 'ViewCharac',
  data: function() {
    return {
      tab:"",
      api:"",
    }
  },

  methods: {
      takeOne: function() {
        var self=this;
        var urlapi= burl+"api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url= burl+"api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeOne&id="+self.$route.params.id;
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
.traits {
  position: relative;
  margin-top: 20px;
  margin-bottom: 20px;
}
.imgCharac{
  max-height: 266px
}
.traits>a {
  z-index: 1;
  position: absolute;
  top: 5px;
  right: 105px;
}
.btngallery {
  position : relative;
  z-index : 2;
  width: 100px;
  left: 100px;
  background: rgba(154,83,254,0.5);
}
.card{
  display: flex;
  padding: 20px;
  border: 1px solid darkgoldenrod;
  border-radius: 12px;
  background: rgba(154,83,254,0.5);
}

</style>
