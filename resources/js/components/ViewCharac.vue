<template>
  <div class="container">
    <div class="card text-center justify-content-center">

        <!-- <img src="..." class="card-img-top" alt="..."> -->

          <h1 class="card-text">{{tab.name}}</h1>
          <p class="card-text text-left"><strong>GENDER:</strong> {{tab.gender}}</p>
          <p class="card-text text-left"><strong>RACE:</strong> {{tab.race}}</p>
          <p class="card-text text-left"><strong>CLASS:</strong> {{tab.player_class}}</p>
          <p class="card-text text-left"><strong>HOUSE:</strong> {{tab.house}}</p>
          <p class="card-text"><strong>DESCRIPTION:</strong></p>
          <p class="card-text">{{ tab.description}}</p>


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
.card{
  padding: 20px;
  border: 1px solid darkgoldenrod;
  border-radius: 12px;
  width: 400px;
  background: rgba(154,83,254,0.5);
}

</style>
