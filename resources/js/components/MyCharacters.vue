<template>
  <div class="container">
      <div class="card-group">
        <div class="card-container text-center" v-for="perso in tab">
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h2 class="card-title">{{perso.name}}</h2>
            <p class="card-text">{{perso.gender}} - {{perso.race}}</p>
            <p class="card-text">{{perso.player_class}}</p>
            <p class="card-text">{{perso.house}}</p>
            <p class="card-text">{{ perso.description | providerDescription}}</p>

            <a href="#" class="btn btn-lg btn-block">
              <router-link v-bind:to="'/aionGRPlaravel/public/modifcharac/'+perso.character_id" style="color: #ffffff">Modify</router-link>
            </a>

          </div>
        </div>
      </div>
  </div>
</template>

<script>
import $ from 'jquery'
export default {
  name: 'MyCharacters',
  data: function() {
    return {
      tab:[],
      api:"",
      providerDescription :""
    }
  },

  methods: {
      takeTen: function() {
        var self=this;
        var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeTen&off=0";
          $.getJSON(url, function (data) {
              self.tab=data;
              console.log(data);
            var truc="mehakihazoiehaozihdaz";

          });
        });
      }
    },
   mounted() {
     this.takeTen()

   },
   watch: {
     '$route' (to, from) {
       this.takeTen();
     }
   },
   beforeRouteUpdate (to, from, next) {
     this.takeTen();
   },
   filters: {
        providerDescription: function(value) {
            if (!value) return '';
            if (value.length < 25) {

               var result = value;
            }
            else {

               var result = value.substring(0, 25) + ' [...]';
            }

            return result;

        }
    }
}
</script>

<style>
.card-container{
    padding:10px;
}
.card-body{
  display: flex;
  flex-direction: column;
  border: 1px solid darkgoldenrod;
  border-radius: 12px;
  width: 200px;
  max-width: 200px;
  box-style: border-box;
  background: rgba(154,83,254,0.5);
}
.btn{
  margin-top: auto;
  background-color: rgba(154,83,254,1);
}
h2{
  width:95%;
  color: #ffffff;

  font-weight:bold;
  margin:5px 0;
}
p{
  width:100%;
  color: black;

}
</style>
