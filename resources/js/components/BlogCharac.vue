<template>
  <div class="container">

    <div class="buttonadd">
      <router-link v-bind:to="'/aionGRP/index.php/blogpost/'+$route.params.id" style="color: #ffffff" v-if="verify"><button type="button" class="addpost btn">ADD POST</button></router-link>
    </div>

    <div class="card" v-for="post in tab">
      <div class="card-header blog-header" >
        <div class="title">
          <a  class="card-link" v-on:click="toggle('blog'+post.id)">
            <h4>{{post.title}}</h4>
            <h5>{{post.date_post}}</h5>
          </a>
        </div>
        <div class="buttonedit">
          <router-link v-bind:to="'/aionGRP/index.php/blogedit/'+post.id" style="color: #ffffff" v-if="verify"><button type="button" class="editpost btn">EDIT</button></router-link>
        </div>
      </div>
      <div class="collapse"  v-bind:id="'blog'+post.id">
        <div class="card-body" >
          <p class="card-text"> {{post.content}} </p>

        </div>
      </div>
    </div>


</div>
</template>

<script>
import 'bootstrap';
import 'popper.js';
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'BlogCharac',
  data: function() {
    return {
      tab:[],
      api:"",
      verify:false,
    }
  },
  methods: {
      selectTen: function() {
        var self=this;

          self.api=api;
          var url= burl+"api.php?w=blog&v=selectTen&name="+name+"&api="+self.api+"&off=0&idchar="+self.$route.params.id;
          axios.get(url)
          .then(function (response) {
            self.tab=response.data;
          })
          .catch(function (error) {
            //console.log('erreur'+error);
          });
      },
      toggle: function(id) {
      let idu='#'+id;
      $('.collapse').hide();
      $(idu).show();
      },
      verifyismine: function(){
        var self=this;
        var url=burl+"api.php?w=personnage&v=verifyismine&name="+name+"&api="+self.api+"&idchar="+self.$route.params.id;
        axios.get(url)
                .then(function (response) {
                  self.verify=response.data;
                })
                .catch(function (error) {
                  //console.log(error)
                })
      },
 },
   mounted() {
     this.selectTen();
     this.verifyismine();
    }
  }

</script>
<style scoped>

.container{
  display: flex;
  flex-direction: column;
}
.blog-header{
  display: inline-flex;
}
.blog-header>div:last-child{
  margin-left: auto;
}
.card{
  margin-bottom: 20px;
  border: 1px solid darkgoldenrod;
  border-radius: 12px;
  background: rgba(154,83,254,0.5);
}
.card-link{
  cursor: pointer;
}
h4{
  text-transform: uppercase;
  color:black;
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
  margin-bottom: 20px;
}
</style>
