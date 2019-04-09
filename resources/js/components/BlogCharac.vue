<template>
  <div class="container">
    <div class="buttonadd">
      <router-link v-bind:to="'/aionGRPlaravel/public/blogpost/'+blog.character_id" style="color: #ffffff"><button type="button" class="addpost btn btn-block">Add post</button></router-link>
    </div>
    <div class="accordion" id="allposts" v-for="blog in tab">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              {{blog.title}}-{{blog.date_post}}
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#allposts">
          <div class="card-body">
            {{blog.content}}
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
  name: 'blogCharac',
  data: function() {
    return {
      tab:[],
      api:""
    }
  },
  methods: {
      selectTen: function() {
        var self=this;
        var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url="http://localhost/aionGRP/api.php?w=blog&v=selectTen&name="+name+"&api="+self.api+"&off=0";
          $.getJSON(url, function (data) {
              self.tab=data;

          });
        });
      }
    },
   mounted() {
     this.selectTen()

   },
}


</script>
