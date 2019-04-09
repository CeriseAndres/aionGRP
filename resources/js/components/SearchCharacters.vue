<template>
  <div class="container">
    <div class="row">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon">Search</span>
      </div>
      <input type="text" v-model="clef" class="form-control" id="basic-url1" aria-describedby="basic-addon">
      <button type="button" id="inputsearch" class="btn" v-on:click="search">Login</button>
    </div>
    </div>


    <div class="card-group">
      <div class="card-container text-center" v-for="perso in tab">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
          <h2 class="card-title">{{perso.name}}</h2>
          <div class="avatar">
            <img src="/aionGRP/images/1554710433aurene-head-emoji_orig.png" v-if="perso.imgdef==-1" class="imgCharac mx-auto rounded d-block">
            <img v-bind:src="'/aionGRP/'+perso.imgdef" v-if="perso.imgdef!=-1" class="imgCharac mx-auto rounded d-block">
             </div>
          <p class="card-text">{{perso.gender}} - {{perso.race}}</p>
          <p class="card-text">{{perso.player_class}}</p>
          <p class="card-text">{{perso.house}}</p>
          <p class="card-text">{{ perso.description | providerDescription}}</p>
          <div id="bottom">
            <router-link v-bind:to="'/aionGRPlaravel/public/viewcharac/'+perso.character_id" style="color: #ffffff"><button type="button" class="btn btn-lg btn-block">View</button></router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
export default {
  name: 'SearchCharacters',
  data: function() {
    return {
      tab:[],
      api:"",
      clef:""
    }
  },
  methods: {
      search: function() {
        var self=this;
        var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=search&type=name&clef="+self.clef;
          $.getJSON(url, function (data) {
              self.tab=data;
              console.log(data);
          });
        });
      }
    },
   mounted() {
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
    height: 400px;
    background: rgba(154,83,254,0.5);
  }
  #bottom{
  }
  #bottom a:last-child{
  }
  .btn{
    display: inline-block;
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
  #inputsearch{
    height: 40px !important;
    margin-left: 0.5em;
  }
</style>
