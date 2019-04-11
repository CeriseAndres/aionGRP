<template>
  <div class="container">
    <div class="row">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon">Search</span>
        </div>
        <input type="text" v-model="clef" class="form-control" id="basic-url1" aria-describedby="basic-addon">
        <button type="button" id="inputsearch" class="btn btn-block" v-on:click="search">Login</button>
      </div>
    </div>


    <div class="card-group">
      <div class="card-container text-center col-md-6" v-for="perso in tab">
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
            <router-link v-bind:to="'/aionGRP/viewcharac/'+perso.character_id" style="color: #ffffff"><button type="button" class="btn btn-block">View</button></router-link>
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

        self.api=api;
        var url= burl+"api.php?w=personnage&name="+name+"&api="+self.api+"&v=search&type=name&clef="+self.clef;
        $.getJSON(url, function (data) {
          self.tab=data;
          //console.log(data);
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
    max-width: none !important;
    width: auto !important;
    height: 500px !important;
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
    height: 39px !important;
    margin-left: 0.5em;
  }
  #bottom{
    margin-top:auto;
  }
  #basic-addon{
    background: rgba(154,83,254,1);
    color: #ffffff !important;
    text-transform: uppercase;
    height: 38px;
  }
  .btn{
    display: inline-block;
    text-decoration: none !important;
    background: rgba(154,83,254,0.5);
    border-radius:3px;
    width: 80px;
    color: #ffffff !important;
    text-transform: uppercase;
  }
  .btn:hover{
    text-decoration: none;
    background: rgba(154,83,254,1);
  }
  .imgCharac{
    margin-bottom: 20px;
    max-width: 150px !important;
  }
</style>
