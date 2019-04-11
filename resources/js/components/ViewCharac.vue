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
          <div class="card text-center justify-content-center">
            <div class="btn-grp buttons">
              <router-link v-bind:to="'/aionGRP/gallerycharac/'+tab.character_id" style="color: #ffffff"><button type="button" class="btn btn-block btngallery">GALLERY</button></router-link>
              <router-link v-bind:to="'/aionGRP/blogcharac/'+tab.character_id" style="color: #ffffff"><button type="button" class="btn btn-block btnblog">BLOG</button></router-link>
            </div>
            <p class="card-text text-left"><strong>GENDER :</strong> {{tab.gender}}</p>
            <p class="card-text text-left"><strong>FACTION :</strong> {{tab.race}}</p>
            <p class="card-text text-left"><strong>CLASS :</strong> {{tab.player_class}}</p>
            <p class="card-text text-left"><strong>HOUSE :</strong> {{tab.house}}</p>
            <p class="card-text text-left"><strong>AGE :</strong> {{tab.age}}</p>
            <p class="card-text text-left"><strong>RACE :</strong> {{tab.racerp}}</p>
            <p class="card-text text-left"><strong>SIZE :</strong> {{tab.size}}</p>
            <p class="card-text text-left"><strong>WEIGHT :</strong> {{tab.weight}}</p>
          </div>
        </div>

        <div class="col-sm-6 cardBlog">
          <div class="card">
            <h3 style="text-align:center;">LAST ENTRIES</h3>
            <div v-for="post in blog">
              <div class="card card-body">
                <h5>{{post.date_post }}</h5>
                <h4>{{ post.title}}</h4>
                <p class="card-text"> {{post.content | providerContent}} </p>
              </div>
            </div>
            <div class="buttonadd">
              <router-link v-bind:to="'/aionGRP/blogpost/'+$route.params.id" style="color: #ffffff" v-if="verify"><button type="button" class="addpost btn">ADD POST</button></router-link>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="description">
                  <h4><strong>DESCRIPTION:</strong></h4>
                  <p>{{ tab.description}}</p>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'ViewCharac',
  data: function() {
    return {
      tab:"",
      api:"",
      blog:[],
      providerContent :"",
      verify:false,
    }
  },

  methods: {
      takeOne: function() {
        var self=this;

          self.api=api;
          var url= burl+"api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeOne&id="+self.$route.params.id;
          $.getJSON(url, function (data) {
              self.tab=data;
              console.log(data);

          });

      },
      takeTab: function(){
        console.log(this.tab);
      },
      selectTwo: function() {
        var self=this;

          self.api=api;
          var url= burl+"api.php?w=blog&v=selectTen&name="+name+"&api="+self.api+"&off=0&idchar="+self.$route.params.id;
          axios.get(url)
          .then(function (response) {
            let blog=[];
            for (var i = 0; i < 2; i++) {
              if (typeof response.data[i] !="undefined" ) {
                blog.push(response.data[i]);
              }

            }
            self.blog=blog;
                console.log(self.blog);

          })
          .catch(function (error) {
            console.log('erreur'+error);
            console.log(url);

          });
      },
      verifyismine: function(){
        var self=this;
        var url=burl+"api.php?w=personnage&v=verifyismine&name="+name+"&api="+self.api+"&idchar="+self.$route.params.id;
        axios.get(url)
                .then(function (response) {
                  self.verify=response.data;
                  console.log(response.data);
                })
                .catch(function (error) {
                  console.log(error)
                })
      },
    },
    filters: {
         providerContent: function(value) {
             if (!value) return '';
             if (value.length < 100) {
                var result = value;
             }
             else {
                var result = value.substring(0, 100) + ' [...]';
             }
             return result;
         }
     },

   mounted() {
     this.takeOne();
     this.selectTwo();
     this.verifyismine();
   },
}
</script>

<style scoped>
.imgCharac{
  max-height: 266px;
  margin-bottom: 20px;
}
.card{
  display: flex;
  padding: 20px;
  border: 1px solid darkgoldenrod;
  border-radius: 12px;
  background: rgba(154,83,254,0.5);
}
.cardBlog{
  padding-top: 10%;
}
.card-body{
  margin:9px;
}
.btn{
  color: #ffffff;
  background: rgba(154,83,254,0.5);
  border-radius:3px;
}
.btn:hover{
  text-decoration: none;
  background: rgba(154,83,254,1);
}
.buttonadd{
  position: relative;
  margin: 0 auto;
  margin-top: 10px;
}
.buttons{
  display: flex;
  margin-top: auto;
  justify-content: space-between;
  margin-bottom: 20px;
}
.buttons>a{
  background: rgba(154,83,254,0.5);
  border-radius:3px;
  width: 100px;
  padding: 0 auto !important;
}
.buttons>a:hover{
  text-decoration: none;
  background: rgba(154,83,254,1);
}
h1{
  margin-left: 20px;
  text-transform: uppercase;
  font-size: 50px;
}
.description{
  padding-top: 20px;
}

</style>
