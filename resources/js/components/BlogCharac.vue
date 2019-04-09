<template>
  <div class="container">
    <div class="buttonadd">
      <router-link v-bind:to="'/aionGRP/blogpost/'+$route.params.id" style="color: #ffffff"><button type="button" class="addpost btn btn-block">Add post</button></router-link>
    </div>
    <div class="accordion" id="allposts" >
      <div class="card" v-for="post in tab">

        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              {{post.title}}-{{post.date_post}}
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#allposts">
          <div class="card-body">
            {{post.content}}
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
  name: 'BlogCharac',
  data: function() {
    return {
      tab:[],
      api:""
    }
  },
  methods: {
      selectTen: function() {
        var self=this;
        var urlapi= burl+"api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url= burl+"api.php?w=blog&v=selectTen&name="+name+"&api="+self.api+"&off=0&idchar="+self.$route.params.id;
          axios.get(url)
          .then(function (response) {
            self.tab=response.data;
                console.log(url);

              })
             .catch(function (error) {
                    console.log('erreur'+error);
                    console.log(url);

                  });
        });
      }
    },
   mounted() {
     this.selectTen();

   },
}


</script>
