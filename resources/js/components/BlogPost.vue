<template>
  <form>
    <div class="form-group">
      <label for="formInput">TITLE</label>
      <input type="text" class="form-control" v-model="title" name="title"><br>
      <label for="formControlTextarea">CONTENT</label>
      <textarea class="form-control" v-model="content" name="content" rows="3"></textarea>
      <a v-on:click="addpost" class="btn btn-lg btn-block">accept</a>
    </div>
  </form>
</template>

<script>
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'BlogCharac',
  data: function() {
    return {
      tab:[],
      api:"",
      title:"",
      content:""
    }
  },
  methods: {
      addpost: function() {
        var self=this;
        var urlapi= burl+"api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url= burl+"api.php?w=blog&v=addBlog&name="+name+"&api="+self.api+'&id='+self.$route.params.id;
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
     this.addpost();

   },
}
</script>
