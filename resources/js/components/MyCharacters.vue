<template>
  <div class="container">
      <div class="card-group ">
        <div class="card-container text-center col-md-6" v-for="perso in tab">

          <div class="card-body ">
            <h2 class="card-title">{{perso.name}}</h2>
            <div class="avatar">
              <img src="/aionGRP/images/kEzzp4YyCZ6cwJ-RWFBqRG5Yk3E.jpg" v-if="perso.imgdef==-1" class="imgCharac mx-auto rounded d-block">
              <img v-bind:src="'/aionGRP/'+perso.imgdef" v-if="perso.imgdef!=-1" class="imgCharac mx-auto rounded d-block">
            </div>
            <p class="card-text">{{perso.gender}} - {{perso.race}}</p>
            <p class="card-text">{{perso.house}}</p>
            <p class="card-text">{{ perso.description | providerDescription}}</p>
            <div class="btn-grp buttons">
              <router-link v-bind:to="'/aionGRP/index.php/modifcharac/'+perso.character_id" style="color: #ffffff"><button type="button" class="btn btn-block">EDIT</button></router-link>
              <router-link v-bind:to="'/aionGRP/index.php/viewcharac/'+perso.character_id" style="color: #ffffff"><button type="button" class="btn btn-block">VIEW</button></router-link>
              <router-link v-bind:to="'/aionGRP/index.php/blogcharac/'+perso.character_id" style="color: #ffffff"><button type="button" class="btn btn-block">BLOG</button></router-link>
            </div>
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

          self.api=api;
          var url=burl+"api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeMy&off=0";
          $.getJSON(url, function (data) {
              self.tab=data;

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
            if (value.length < 150) {

               var result = value;
            }
            else {

               var result = value.substring(0, 150) + ' [...]';
            }

            return result;

        }
    }
}
</script>

<style scoped>
.card-container{
    padding:10px;
}
.card-body{
  display: flex;
  flex-direction: column;
  border: 1px solid darkgoldenrod;
  border-radius: 12px;
  background: rgba(154,83,254,0.5);
  max-width: none;
  width: auto;
  height: 500px;
}
.imgCharac{
  margin-bottom: 20px;
  max-width: 150px !important;
}
.btn{
  color: #ffffff !important;
}
.buttons{
  display: flex;
  margin-top: auto;
  justify-content: space-between;
}
.buttons>a{
  background: rgba(154,83,254,0.5);
  border-radius:3px;
  width: 80px;
}
.buttons>a:hover{
  text-decoration: none;
  background: rgba(154,83,254,1);
}
h2{
  width:95%;
  color: #ffffff;

  font-weight:bold;
margin:5px 0;
}
p{
  color: black;
}
</style>
